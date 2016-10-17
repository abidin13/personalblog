@extends('layouts.detilBlog')
@section('fbmeta')
    @foreach ($dtlpost as $dtlposts)
        <meta property="og:url"           content="{{ Request::fullUrl()}}" />
        <meta property="og:type"          content= "Blog" />
        <meta property="og:title"         content="{{ 'Febriyant Blogs ' . $dtlposts->post_title }}" />
        <meta property="og:description"   content="{{ $dtlposts->post_title }}" />
        <meta property="og:image"         content="{{ asset('img/cover/'.$dtlposts->post_image) }}" />
    @endforeach
@stop
@section('content')
    @foreach ($dtlpost as $dtlposts)
        @section('title')
            {{ $dtlposts->post_title }}
        @stop
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
                        <div class="col-md-1 " style="font-family:'Open Sans'"><small>Tags:</small></div>
                        <div class="col-md-9"> 
                            @foreach ($tagspost as $tagss)
                                <span class="label label-info" style="font-family:'Open Sans'"><small>{!! $tagss->name !!}</small></span>
                            @endforeach
                        </div>  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="col-md-5">
                                <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a>
                        </div>
                        <div class="col-md-5">
                        <iframe src="https://www.facebook.com/plugins/share_button.php?href={{Request::root().'%2F'.Request::segment(1).'%2F'.Request::segment(2).'%2F'.Request::segment(3)}}&layout=button&size=small&mobile_iframe=true&appId=207976409278397&width=71&height=20" width="71" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = '//febriyant-me.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>
                            Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                        </noscript>
                    </div>
                </div>
                                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </article>
    @endforeach
@stop