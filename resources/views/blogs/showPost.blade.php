@extends('layouts.detilBlog')
@foreach ($dtlpost as $dtlposts)
    @section('title')
         {{ $dtlposts->post_title }}
    @stop
    @section('posted')
        {{ $dtlposts->users->name }}
    @stop
    @section('datess')
        {{ $dtlposts->updated_at->toFormattedDateString() }}
    @stop
    @section('postimage')
        {!! $dtlposts->post_image !!}
    @stop
    @section('content')
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ $dtlposts->post_content }}
        </div>
    @stop
@endforeach