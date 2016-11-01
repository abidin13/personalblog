<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tags;
use Carbon\Carbon;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
             $tagss = Tags::select(['name','updated_at'])->orderBy('name','asc');
             return Datatables::of($tagss)->make(true);
                // ->addColumn('action', function ($posts)
                // {
                //     return view('blogs.admin._actionArticle',[
                //             'model'           => $posts,
                //             'form_url'        => route('blog.admin.articles.destroy', $posts->id),
                //             'edit_url'        => route('blog.admin.articles.edit', $posts->id),
                //             'confirm_message' => 'Yakin mau menghapus ' .$posts->post_title .'?'
                //         ]);
                // })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Tags Name'])
            ->addColumn(['data' => 'updated_at','name' => 'updated_at', 'title' => 'Date']);
            // ->addColumn(['data'=>'action', 'name'=>'action','title'=>'','orderable'=>false, 'searchable' => false]);

        return view('blogs.admin.viewtags')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.admin.tags');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required|unique:tags']);
        $tagss = Tags::create($request->only('name'));
        // $request->session()->flash("flash_notification", [
        //                             "level"=>"success",
        //                             "message"=>"Berhasil Menyimpan $author->name"
        //                             ]);       
        return redirect()->route('blog.admin.tags.index');
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
