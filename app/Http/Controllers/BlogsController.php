<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Posts;
use App\Users;
use App\Tags;
use App\TagsPosts;
use Carbon\Carbon;
use DB;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::with('users')
                ->orderBy('updated_at','desc')
                ->simplePaginate(5);
        return view('blogs.home')->with(compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $dtlpost = DB::table('posts')
                        ->select('*')
                        ->join('users', 'posts.post_author', '=', 'users.id')
                        ->where('posts.id','=',$id)
                        ->where('posts.post_status', '=','1')
                        ->get();
        $tagspost = DB::table('posts_tags')
                    ->select ('*')
                    ->join('tags','posts_tags.tags_id', '=','tags.id')
                    ->where('posts_tags.post_id', '=',$id)
                    ->whereNotIn('posts_tags.tags_id',[0])
                    ->get();
        
        // $dtlpost = Posts::with('users')
        //             ->findOrFail($id)
        //             ->get();
        return view('blogs.showPost', compact('dtlpost','tagspost'));
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
