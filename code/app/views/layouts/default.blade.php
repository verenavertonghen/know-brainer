<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Knowbrainer</title>
    <meta name="description" content="Knowbrainer"/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-embossed palette-midnight-blue" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="/">Know-brainer</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="over">Over ons</a></li>
            <li><a href="opstellen">Opstellen</a></li>
            <li><a href="overzicht">Overzicht</a></li>
          @if(Auth::check())
          <li>
            <div class="btn-group">
              <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"> <img src="{{ Auth::user()->avatar }}" width="30" height="30">{{ Auth::user()->username }}<span class="caret"></span></button>
              <ul role="menu" class="dropdown-menu">
                <li><a href="/users/{{ Auth::user()->id }}">Mijn profiel</a></li>
                <li class="divider"></li>
                <li><a href="/logout">Log out</a></li>
              </ul>
            </div>
          </li>
                
          @else
            <li {{ (Request::segment(1) == 'login') ? 'class="active"' : '' }} ><a href="login">Inloggen</a></li>
          @endif
           </ul>
           <!--Zoekbalk-->
    <form class="navbar-form navbar-right" action="#" role="search">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control palette-clouds" id="navbarInput-01" type="search" placeholder="Zoeken">
          <span class="input-group-btn">
            <button type="submit" class="btn"><span class="fui-search"></span></button>
          </span>
        </div>
      </div>
    </form>
        </div><!-- /.navbar-collapse -->
      <!--</div>-->
    </nav><!-- /navbar -->
    </div>


      @yield('content')

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/flat-ui.min.js"></script>
    <script src="docs/assets/js/application.js"></script>

    <script>
      videojs.options.flash.swf = "dist/js/vendors/video-js.swf"
    </script>
  </body>
</html>