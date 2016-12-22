<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Febriyant</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link href="{{ asset('css/default.css') }}" rel='stylesheet' type='text/css'>
</head>

<body>
<a id="top"></a>
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><;/></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" id="list-menu">
              <li><a href="#top">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#education">Education</a></li>
              <li><a href="{{route('blogs.home')}}" target="_blank">Blog</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
  </nav>
<div class="intro_header" id="intro-header">
  <div class="container">
    <div class="row"> 
      <div class="col-lg-12">
        <div class="intro_message">
          <h1>Hello, I'm Febriyant</h1>
          <h1><hr></h1>
          <h3>Geek Boy, With Cycling Hobby</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-a" id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title"> 
          <h1><i class="fa fa-user fa-1x"></i> About</h1>
        </div>
      </div>
    </div>
    <div class="row">
         <div class="col-md-3 col-sm-2">
            <div class="foto-profil">
              <img src="{{ asset('img/test1.jpg') }}" alt="" class="img-thumbnail">    
            </div>
         </div> 
         <div class="col-md-9 col-sm-10">
             <div class="about_inner">
                <h1>Hello i'm, Febriyant</h1>
                <p>
                    I was a son to the second of three children, I am now working at one company in Bandung West Java Indonesia, as a Database Administrator. <br>
                    Besides, I am also still working as a web developer either alone or with the community.<br>
                    I also have a hobby of cycling, I often spent the morning at the end of the week with cycling.
                    Thus my introduction I hope we can establish good relationships. Thanks.
                </p>
             </div>
         </div>
    </div>
  </div>
</div>
<div class="visible-section-b section-b" id="education">
      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title"> 
                <h1><i class="fa fa-graduation-cap fa-1x"></i> Education</h1>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="isi-satu">
                  <h4>Primary School<small> 1997 - 2003 </small><i class = "hidden-xs fa fa-dot-circle-o"></i></h4>
                  <p>
                    SD Tamansiswa <br>Bandarlampung, Indonesia.
                  </p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 ">
              <div class="isi-dua">
                  <h4><i class="hidden-xs fa fa-dot-circle-o"></i><small> 2006 - 2009 </small>Junior High School</h4>
                  <p>
                    SMK Tehnik Tamansiswa <br>
                    Bandarlampung, Indonesia.
                  </p>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-6 ">
              <div class="isi-tiga">
                  <h4>Senior High School<small> 2003 - 2006 </small><i class="hidden-xs fa fa-dot-circle-o"></i></h4>
                  <p>
                    SMP Negeri 15 <br>
                    Bandarlampung, Indonesia.
                  </p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 ">
              <div class="isi-empat">
                  <h4><i class="hidden-xs fa fa-dot-circle-o"></i><small> 2009 - 2012 </small>Diploma Degree (D-3)</h4>
                  <p>
                    AMIK Master Lampung <br>
                    Bandarlampung, Indonesia.
                  </p>
              </div>
            </div>
          </div>
      </div>
</div>
<div class="section-c visible-section-c" id="experience">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="title"> 
            <h1><i class="fa fa-file-text-o fa-1x"></i> Experience</h1>
          </div>
        </div>
    </div>
    <div class="row"> 
      <div class="col-md-4">
        <div class="backend_list">
          <h3>S Q L</h3>
          <p>
            Intermediate Experience For Manage Database, SQL, PLSQL, MySQL, SQL Server.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="backend_list">
          <h3>Backend</h3>
          <p>
            Intermediate Experience For PHP (Object Oriented), Beginner Experience For NodeJS.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="frontend_list">
          <h3> Frontend</h3>
          <p>
            Intermediate Experience HTML5, CSS3, Javascript,Bootstrap, PSD To HTML, Beginner Experience Gulp
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-d" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title"> 
          <h1><i class="fa fa-mobile fa-1x"></i> Contact</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline" id="list-social">
          <li><a href="mailto:febriyantabidin@gmail.com" target="_top" class="btn btn-default btn-lg"><i class="fa fa-envelope fa-fw"></i> febriyantabidin@gmail.com</a></li>
          <li><a href="https://www.facebook.com/nax.gmbel" class="btn btn-default btn-lg"><i class="fa fa-facebook"></i> Febriyant Abidin</a></li>
          <li><a href="https://twitter.com/embebidin" class="btn btn-default btn-lg"><i class="fa fa-twitter"></i> @embebidin</a></li>
          <li><a href="https://github.com/abidin13" class="btn btn-default btn-lg"><i class="fa fa-github"></i> abidin13</a></li>
          <li><a href="https://id.linkedin.com/in/febriyant" class="btn btn-default btn-lg"><i class="fa fa-linkedin"></i> Febriyant Abidin</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="strava"> 
          <h3>"If You Have A Hobby Of Cycling Follow Me On Strava"</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="strava"> 
          <a class="strava-button" href='http://strava.com/athletes/12315899/badge' target="_clean">Follow me on
            <img src='http://badges.strava.com/logo-strava.png' alt='Strava' style='margin-left:2px;vertical-align:text-bottom' height=13 width=51 />
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer" id="footer">
  <div class="container">
      <div class="row"> 
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="pull-left">
            Copyright &copy; 2016. All Right Reserved <br>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="pull-right">
            febriyant.me v.0.1
          </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.min.js') }}"></script>
<script src="{{ asset('js/analytic.min.js') }}"></script>
</body>
</html>