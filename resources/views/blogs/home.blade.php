@extends('layouts.appblog')
@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @foreach ($post as $potss)  
            <div class="post-preview">
                <a href="{{ route('blog.shows.show', $potss->id) }}">
                    <h2 class="post-title">
                        {{ $potss->post_title }}
                    </h2>
                    <h3 class="post-subtitle">
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">{{ $potss->users->name }}</a> {{ $potss->updated_at->toFormattedDateString() }} </p>
            </div>
            <hr>
        @endforeach
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="{{ $post->nextPageUrl() }}">Older Posts &rarr;</a>
                        <a href="{{ $post->previousPageUrl() }}">&larr; News't Posts </a>
                    </li>
                </ul>
            </div>
@stop