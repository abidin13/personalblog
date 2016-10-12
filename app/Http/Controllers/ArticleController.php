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
// use Symfony\Component\HttpFoundation\File\UploadedFile;
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
             $post = Posts::with('users')->get();
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
                                    'post_image' => 'required'
                                ]);
        $user = Auth::user();
        $postscontent = new Posts;
        $postscontent->post_author = $user->id;
        $postscontent->post_title = $request->post_title;
        $postscontent->post_content = $request->post_content;
        $postscontent->post_image = $this->upload($request->file('post_image'));
        $postscontent->created_at = Carbon::now('Asia/Jakarta');
        $postscontent->updated_at = Carbon::now('Asia/Jakarta');
        $postscontent->save();
        $postscontent->Tagss()->sync((array)$request->get('tags'));

        // foreach ((array)$request->get('tags') as $result) {
        //     $tagss = new TagsPosts;
        //     $tagss->post_id = $postscontent->id;
        //     $tagss->tags_id = $result;
        //     $tagss->save();
        // }
        return $postscontent;
        // return redirect()->route('blog.admin.articles.index');
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
        return redirect()->route('blog.admin.articles.index');
    }

    public function upload($postimage)
    {
        if ($postimage->hasFile('post_image')) {
            // mengambil file yang diupload
            $uploaded_cover = $this->postimage;

            // mengambil extension file
            $extension = $uploaded_cover->getClientOriginalExtension();

            //membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/cover';
            $uploaded_cover->move($destinationPath, $filename);

            // mengisi field cover di book dengan filename yang baru di buat
            return $filename;   
        }
    }
}
