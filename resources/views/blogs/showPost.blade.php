@extends('layouts.detilBlog')
@section('content')
    @foreach ($dtlpost as $dtlposts)
        <header class="intro-header" style="background-image: url('{{ asset('img/cover/'.$dtlposts->post_image) }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="post-heading">
                                <h1>{{ $dtlposts->post_title }}</h1>
                                <h2 class="subheading"></h2>

                                <span class="meta">Posted by <a href="#">{{ $dtlposts->name }}</a> on {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dtlposts->updated_at)->toFormattedDateString() }}  </span>
                            </div>
                        </div>
                    </div>
                </div>
        </header>
        <!-- Post Content -->
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        {!! html_entity_decode($dtlposts->post_content) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="col-md-2">Tags :</div>
                        <div class="col-md-8"> 
                            @foreach ($tagspost as $tagss)
                                {!! $tagss->name !!},
                            @endforeach
                        </div>  
                    </div>
                </div>
            </div>
        </article>
        <hr>
    @endforeach
@stop