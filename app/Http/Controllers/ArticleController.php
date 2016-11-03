<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Posts;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\TagsPosts;
use App\Tags;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;
use DB;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
             $post = Posts::with('users')
                        ->orderBy('updated_at', 'desc')
                        ->get();
             return Datatables::of($post)
                ->addColumn('action', function ($posts)
                {
                    return view('blogs.admin._actionArticle',[
                            'model'           => $posts,
                            'form_url'        => route('blog.admin.articles.destroy', $posts->id),
                            'edit_url'        => route('blog.admin.articles.edit', $posts->id),
                            'confirm_message' => 'Yakin mau menghapus ' .$posts->post_title .'?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'post_title', 'name' => 'post_title', 'title' => 'Article Title'])
            ->addColumn(['data' => 'users.name', 'name' => 'users.name', 'title' => 'Post Author'])
            ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Date'])
            ->addColumn(['data'=>'action', 'name'=>'action','title'=>'','orderable'=>false, 'searchable' => false]);

        return view('blogs.admin.viewarticles')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.admin.articles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['tags'=>'required',
                                    'post_title'=>'required|max:50', 
                                    'post_content'=>'required', 
                                    'post_image' => 'required|mimes:jpg,jpeg,png,bmp'
                                ]);
        $user = Auth::user();
        $dom = new \DomDocument();
        $contents = $request->post_content;
        $dom->loadHtml($contents, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if img source is url
            if (preg_match('/data:image/', $src)) {
                // get the mime type
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];

                // generating random file
                $filename = uniqid();
                $filepath = "/img/cover/$filename" . '.' . "$mimetype";

                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    ->resize(300, null) 
                    ->encode($mimetype, 100)
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src',$new_src);
            } 
        }
        $postscontent = new Posts;
        $postscontent->post_author = $user->id;
        $postscontent->post_title = $request->post_title;
        $postscontent->post_content = $dom->saveHTML();
        $postscontent->post_image = $this->upload($request->file('post_image'));
        $postscontent->created_at = Carbon::now('Asia/Jakarta');
        $postscontent->updated_at = Carbon::now('Asia/Jakarta');
        $postscontent->save();
        $postscontent->Tagss()->sync((array)$request->get('tags'));

        $request->session()->flash("flash_notification", [
                                    "level"=>"success",
                                    "message"=>"Success $postscontent->post_title"
                                    ]);
        
        return redirect()->route('blog.admin.articles.index');

        
        // foreach ((array)$request->get('tags') as $result) {
        //     $tagss = new TagsPosts;
        //     $tagss->post_id = $postscontent->id;
        //     $tagss->tags_id = $result;
        //     $tagss->save();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('blogs.admin.articlesEdit')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        $this->validate($request,['post_title'=>'required|max:50', 'post_content'=>'required']);
        $user = Auth::user();
        $post->post_author = $user->id;
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->updated_at = Carbon::now('Asia/Jakarta');
        $post->save();
        return redirect()->route('blog.admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        DB::table('posts_tags')->where('post_id', $id)->delete();
       
        return redirect()->route('blog.admin.articles.index');
    }

    public function upload(UploadedFile $file)
    {
        $original = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $sanitize = preg_replace('/[^a-zA-Z0-9]+/', '-', $original);
        $fileName = $sanitize . '.' . $file->getClientOriginalExtension();
        $destination = public_path() . DIRECTORY_SEPARATOR . 'img/cover';

        $uploaded = $file->move($destination, $fileName);

        return $fileName;
    }
}
