<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Cerveza Origenes</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
  <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

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
                    <li><a href="#about">Nosotros</a></li>
                    <li><a href="#portfolio">Nuestro trabajo</a></li>
                    <li><a href="#portfolio">Productos</a></li>
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Registro</a></li>
                    @else
                    @if (Auth::user()->id == 1)
                    <li><a href="{{ route('admin') }}">Administrador</a></li>
                    @endif
                    <li><a>Bienvenido: {{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                    @endguest
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <main class="py-4">
        @yield('content')
      </main>
      <section id="about" class="section-padding wow fadeIn delay-05s">
        <div class="section-padding container">
          <div class="row">
            <div class="col-md-6 text-right">
              <h2 class="title-text">
                Conoce<br><span class="deco">Cerveza Origenes</span>
              </h2>
            </div>
            <div class="col-md-6 text-left">
              <div class="about-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>&nbsp;</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>&nbsp;</p>
                <ul class="abt-list">
                  <li>- Excepteur sint occaecat cupidatat non proident.</li>
                  <li>- Duis aute irure dolor in reprehenderit.</li>
                  <li>- Ask the experts.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="portfolio" class="section-padding wow fadeInUp delay-05s">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-center"><span class="deco">Nuestro trabajo</span></h2>
            </div>
            <div class="col-md-12">
              <div id="myGrid" class="grid-padding">
                <div class="col-md-4 col-sm-4 padding-right-zero">
                  <img src="img/maceracion.jpeg" class="img-responsive">
                  <img src="img/semillas1.jpeg" class="img-responsive">
                  <img src="img/semillas2.jpeg" class="img-responsive">
                  <img src="img/cerveza1.jpeg" class="img-responsive">
                </div>
                <div class="col-md-4 col-sm-4 padding-right-zero">
                  <img src="img/semillas3.jpeg" class="img-responsive">
                  <img src="img/semillas4.jpeg" class="img-responsive">
                  <img src="img/semillas5.jpeg" class="img-responsive">
                  <img src="img/cerveza2.jpeg" class="img-responsive">
                </div>
                <div class="col-md-4 col-sm-4 padding-right-zero">
                  <img src="img/lupulo.jpeg" class="img-responsive">
                  <img src="img/cerveza3.jpeg" class="img-responsive">
                  <img src="img/cev_02.jpeg" class="img-responsive">
                  <img src="img/port03.jpg" class="img-responsive">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="footer-2 text-center-xs bg--white">
      <div class="container">
        <!--end row-->
        <div class="row">
          <div class="col-md-6">
            <div class="footer">
              © Copyright Cerveza Origenes. Todos los derechos reservados
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
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
