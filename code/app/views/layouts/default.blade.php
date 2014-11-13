<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Knowbrainer  - @yield('title')</title>
    <meta name="description" content="Knowbrainer"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{ URL::asset('css/vendor/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="{{ URL::asset('css/flat-ui.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">


    <link rel="shortcut icon" href="{{ URL::asset('img/logo/yv1.png') }}">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div class="wrapper">
      <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-embossed navbar-lg museo-heading" role="navigation">
            <div class="container">
              <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                  <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" href="/">Know-brainer</a>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse-01">
                <ul class="nav navbar-nav navbar-left">
                  <li {{ (Request::segment(1) == 'over-ons') ? 'class="active"' : '' }}><a href="/over-ons">Over ons</a></li>
                  <li {{ (Request::segment(1) == 'workshop') ? 'class="active"' : '' }}><a href="/workshop">Workshops</a></li>
                @if(!Auth::check())
                  <li {{ (Request::segment(1) == 'login') ? 'class="active"' : '' }} ><a href="/login">Inloggen</a></li>
                  <li {{ (Request::segment(1) == 'registreer') ? 'class="active"' : '' }} ><a href="/registreer">Registreren</a></li>
                @endif

                  <li>
                    <!--Zoekbalk-->
                    <form class="navbar-form" action="#" role="search">
                      <div class="form-group">
                        <div class="input-group">
                          <input class="form-control" id="navbarInput-01" type="search" placeholder="Zoeken">
                          <span class="input-group-btn">
                            <button type="submit" class="btn"><span class="fui-search"></span></button>
                          </span>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>

                @if(Auth::check())
                <div class="btn-group navbar-nav navbar-right">
                  <button data-toggle="dropdown" class="btn dropdown-toggle" type="button">
                    <img class="img-circle" src="{{ Auth::user()->avatar }}" width="30" height="30">{{{ Auth::user()->username }}}<span class="caret"></span>
                  </button>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href="/users/{{ Auth::user()->id }}">Mijn profiel</a></li>
                    @if(Auth::user()->role === 0)
                     <li><a href="/users">Alle gebruikers</a></li>
                     <li><a href="/workshops">Alle Workshops</a></li>
                    @endif
                      <li class="divider"></li>
                      <li><a href="/logout">Log out</a></li>
                    </ul>
                </div>
                @endif


              </div><!-- /.navbar-collapse -->
            </div> <!--</div>-->
          </nav><!-- /navbar -->




          <div class="container">
            @yield('container')
          </div> <!-- /container -->
      </div>
      <div class='push'></div>
  </div>

    <div class="footer">
    <footer class="sitefooter palette-sun-flower">
      <div class="container ">
        <div class="row">
          <div class="col-xs-7 ">
            <h3 class="">Know-brainer</h3>

            <a class="fui-facebook social-icon" href=""></a>
            <a class="fui-twitter social-icon" href=""></a>
            <a class="fui-youtube social-icon" href=""></a>
            <a class="fui-vimeo social-icon" href=""></a>

          </div> <!-- /col-xs-7 -->
          <!--
          <div class="col-xs-5 ">
            <div class="footer-banner ">
                <a href="/"><img class="kb-logo" src="{{ URL::asset('img/logo/yv1.png') }}" alt=""/></a>
            </div>
          </div>
          -->
        </div>
      </div>
    </footer>
    </div>
    <script src="{{ URL::asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/flat-ui.min.js') }}"></script>
    <script src="{{ URL::asset('docs/assets/js/application.js') }}"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <script>
      videojs.options.flash.swf = "{{ URL::asset('dist/js/vendors/video-js.swf') }}"
    </script>
  </body>
</html>