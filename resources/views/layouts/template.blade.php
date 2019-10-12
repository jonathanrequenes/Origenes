<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laura Bootstrap Theme</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- =======================================================
    Theme Name: Laura
    Theme URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<body>
    <div id="app">
      <div class="header">
        <div class="bg-color">
          <header id="main-header">
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lauraMenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Origenes</a>
                </div>
                <div class="collapse navbar-collapse" id="lauraMenu">
                  <ul class="nav navbar-nav navbar-right navbar-border">
                    <li class="active"><a href="#main-header">Inicio</a></li>
                    <li><a href="{{ route('cerveza.index') }}">Cervezas</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>
          <div class="wrapper">
            <div class="container">
              <div class="row">
                <div class="col-md-12 wow fadeIn delay-05s">
                  <div class="banner-text">
                    <h2>Somos <span>Cerveza Origenes</span></h2>
                    <p>Cerveza Artesanal <br>100% Mexicana</p>
                  </div>
                  <div class="overlay-detail text-center">
                    <a href="#about"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <main class="py-4">
        @yield('content')
      </main>
    </div>
    <footer class="footer-2 text-center-xs bg--white">
      <div class="container">
        <!--end row-->
        <div class="row">
          <div class="col-md-6">
            <div class="footer">
              © Copyright Laura Theme. All Rights Reserved
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Laura
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 text-right">
            <ul class="social-list">
              <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-dribbble"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-vimeo"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
              </li>
            </ul>
          </div>

        </div>
        <!--end row-->
      </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
</body>
</html>
