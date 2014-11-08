<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Know-brainer</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/assets/dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/assets/dist/css/flat-ui.css" rel="stylesheet">
    <link href="/assets/docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="/assets/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="/assets/dist/js/vendor/html5shiv.js"></script>
      <script src="/assets/dist/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-embossed palette-silver" role="navigation">
      <!--<div class="container">-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="/">Know-brainer</a>
                  </div>
                  <div class="collapse navbar-collapse" id="navbar-collapse-01">
                    <ul class="nav navbar-nav navbar-left">
                      <li><a href="/about">Over ons</a></li>
                      <li><a href="/workshop/create">Opstellen</a></li>
                      <li><a href="/workshop">Overzicht</a></li>
                      <li><a href="/login">Inloggen</a></li>
                     </ul>
                  </div><!-- /.navbar-collapse -->
                <!--</div>-->
          </nav><!-- /navbar -->
          @yield('search')
          <div class="container">
          @yield('container')
          </div> <!-- /container -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-xs-7">
            <h3 class="footer-title">Know-brainer</h3>
            <p>Volg ons op:</p>
            <a class="footer-brand" href="http://designmodo.com" target="_blank">
              <!--<img src="docs/assets/img/footer/logo.png" alt="Designmodo.com" />-->
            </a>
          </div> <!-- /col-xs-7 -->
          <div class="col-xs-5">
            <div class="footer-banner">
              <h3 class="footer-title">Know-brainer</h3>
              <p>Volg ons op:</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="/assets/dist/js/vendor/jquery.min.js"></script>
    <script src="/assets/dist/js/flat-ui.min.js"></script>
    <script src="/assets/docs/assets/js/application.js"></script>

    <script>
      videojs.options.flash.swf = "/assets/dist/js/vendors/video-js.swf"
    </script>
  </body>
</html>
