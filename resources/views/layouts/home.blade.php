<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{ asset('assets/home/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/home/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/home/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/home/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/home/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/home/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/home/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/home/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/home/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @include('sweetalert::alert')
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('home') }}">PijatIn</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Alternatif</a></li>
          <li><a class="nav-link scrollto" href="#services">Kriteria</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Pesanan</a></li>
          @if (Auth::check())
          <li><a class="nav-link scrollto" href="#contact">Rating</a></li>
          @endif
          <li><a class="nav-link scrollto" href="#cta">Rekomendasi</a></li>
          @if (Auth::check())
          <li class="dropdown">
            <a href="#">
              <span>{{ Auth::user()->name }}</span>
              <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <a href="javascript:void(0)" onclick="event.preventDefault();
                  this.closest('form').submit();">
                    Logout
                  </a>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Mari Mulai</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Kenapa Harus PijatIn?</h1>
          <h2>
            PijatIn adalah aplikasi yang menyediakan layanan pijat panggilan yang dapat diakses dengan mudah dan
            cepat.
          </h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            @if (Auth::check())
            <a href="#portfolio" class="btn-get-started scrollto">Pesan Sekarang!</a>
            @else
            <a href="{{ route('login') }}" class="btn-get-started scrollto">Mari Mulai</a>
            @endif
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/home/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PijatIn</h3>
            <p>
              Yogyakarta <br><br>
              <strong>Phone:</strong> 085963258741<br>
              <strong>Email:</strong> pijatin@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Alternatif</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kriteria</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pensanan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/home/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/home/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/home/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/home/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/home/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/home/js/main.js') }}"></script>

</body>

</html>