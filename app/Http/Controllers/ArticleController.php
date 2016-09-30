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
use App\Tags;
use Carbon\Carbon;


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
            ->addColumn(['data' => 'users.name', 'name' => 'users.name', 'title' => 'Post Author', 'orderable'=> false])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Date'])
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
    public function store(ArticleRequest $request)
    {
        // $this->validate($request,['title'=>'required|max:50', 'content'=>'required']);
        $user = Auth::user();
        $postscontent = new Posts;
        $postscontent->post_author = $user->id;
        $postscontent->post_title = $request->title;
        $postscontent->post_content = $request->content;
        $postscontent->save();
        return redirect()->route('blog.admin.articles.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
