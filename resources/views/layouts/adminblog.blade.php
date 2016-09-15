<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Febriyant Blog's</title>                                    
            <!-- Bootstrap -->
            <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'>
            <!-- default or custom css -->
            <link href="{{ asset('css/default-admin.css') }}" rel="stylesheet">
        </head>
        <body>
            <div class="container-fluid display-table">
                <div class="row display-table-row">
                    <!-- side-menu -->
                    <div class="col-md-2 col-sm-1 display-table-cell valign-top hidden-xs" id="side-menu">
                        <h1 class="hidden-sm hidden-xs">Navigation</h1>
                        <ul>
                            <?php 
                                $url = Request::segment(3);
                            ?>
                            <li class="link @if($url=="dashboard") active @endif">
                                <a href="{{route('blog.admin.dashboard.index')}}">
                                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                                    <span class="hidden-xs hidden-sm">Dashboard</span>
                                </a>
                            </li>
                            <li class="link @if($url=="articles") active @endif">
                                <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                    <span class="hidden-xs hidden-sm">Article</span>
                                    <span class="label label-success pull-right hidden-xs hidden-sm">20</span>
                                </a>
                                <ul class="collapse collapseable" id="collapse-post">
                                    <li><a href="{{ route('blog.admin.articles.index')}}">Create New</a></li>
                                    <li><a href="articles.html">View Article</a></li>
                                </ul>
                            </li>
                            <li class="link">
                                <a href="#collapse-comment" data-toggle="collapse" aria-controls="collapse-comment">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    <span class="hidden-xs hidden-sm">Comments</span>
                                </a>
                                <ul class="collapse collapseable" id="collapse-comment">
                                    <li>
                                        <a href="new-article.html">Approved
                                        <span class="label label-success pull-right hidden-xs hidden-sm">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="article.html">Unapproved
                                        <span class="label label-warning pull-right hidden-xs hidden-sm">20</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="link">
                                <a href="commenters.html">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                <span class="hidden-xs hidden-sm">Commenters</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href="tags.html">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                    <span class="hidden-xs hidden-sm">Tags</span>
                                </a>
                            </li>
                            <li class="link settings-btn">
                                <a href="settings.html">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                    <span class="hidden-xs hidden-sm">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- main container -->
                    <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                        <div class="row">
                            <!-- header start here -->
                            <header id="nav-headers" class="clearfix">
                            <div class="col-md-5">
                                <!-- button menu responsive start here -->
                                <nav class="navbar-default pull-left">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                </nav>
                                <!-- button menu responsive end here -->
                                <input type="text" class="hidden-sm hidden-xs" id="header-search-field" placeholder="Search For Something ...">
                            </div>
                            <div class="col-md-7">
                    <ul class="pull-right">
                    <li id="welcome" class="hidden-xs">Welcome To Your Administration Area</li>
                    <li class="fixed-width">
                    <a href="">
                    <span class="glyphicon glyphicon-bell" aria-hidden="true"> </span>
                    <span class="label label-warning"> 3</span>
                    </a>
                    </li>
                    <li class="fixed-width">
                    <a href="">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>
                    <span class="label label-message"> 3</span>
                    </a>
                    </li>
                    <li>
                    <a href="{{ url('blog/admin/logout') }}" class="logout">
                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                    Logout
                    </a>
                    </li>
                    </ul>
                    </div>
                    </header>
                    <!-- header end here -->
                    </div>
                            <div id="content">
                                @yield('content')
                            </div>
                            <div class="row">
                                <footer id="admin-footer" class="clearfix">
                                    <div class="pull-left"><b>Copyright</b> &copy; 2015</div>
                                    <div class="pull-right">Admin System</div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>                                    
            <!-- js for jquery and bootstrap --> 
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/default-admin.js') }}"></script>
        </body>
    </html>