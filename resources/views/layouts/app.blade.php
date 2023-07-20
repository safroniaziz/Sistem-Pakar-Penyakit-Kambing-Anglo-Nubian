<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Diagnosa Penyakit Ayam KUB- Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/frontend/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Diagnosa</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#artikel">Artikel</a></li>
          <li><a class="nav-link scrollto" href="#penyakit_kambing">Penyakit Ayam KUB</a></li>
          <li><a class="nav-link scrollto" href="#diagnosa_penyakit">Diagnosa Penyakit</a></li>
          <li>
            @if (Auth::check())
              <li>
                <a class="nav-link scrollto" >{{ Auth::user()->nama_pengguna }}</a>
              </li>
              <li style="padding-left:2px;">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       <span class="text-danger">Logout</span>
                  </a>
              
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
            @else
              <li>
                <a class="nav-link scrollto" href="{{ route('login') }}">Login</a>
              </li>
            @endif
          </li>
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
          <h1>Selamat Datang di Sistem Informasi</h1>
          <h2>Diagnosa Penyakit Ayam KUB ANGLO NUBIAN</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ route('diagnosa') }}" class="btn-get-started scrollto">Mulai Diagnosa</a>
            <a href="https://www.youtube.com/watch?v=igK8BmBwqJA"  class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Ayam KU</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('/assets/frontend/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

        <!-- ======= Team Section ======= -->
        <section id="artikel" class="team section-bg">
            <div class="container" data-aos="fade-up">
      
              <div class="section-title">
                <h2>Artikel</h2>
                <p>
                  Berikut adalah artikel-artikel yang dikumpulkan dari berbagai macam sumber website yang membahas tentang Ayam KU, 
                </p>
              </div>
      
                <div class="row">
                    @foreach ($artikels as $artikel)
                        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom: 15px !important;">
                            <div class="member d-flex align-items-start">
                                <div class="pic"><img src="https://gibasbarokah.com/pub/media/catalog/product/cache/cf3f2243ef4940fd5c66f2ff035145ac/w/h/3761/5458/kambing-anglo-nubian-jantan.jpeg" class="img-fluid" alt=""></div>
                                <div class="member-info">
                                <h4>{{ $artikel->judul }}</h4>
                                <span><a target="_blank" href="{{ $artikel->sumber }}"><i>{{ $artikel->sumber }}</i></a></span>
                                <p>{{ $artikel->short_judul }}</p>
                                  <a href="#diagnosa_penyakit" class="btn-get-started scrollto" style="
                                  font-weight: 500;
                                  font-size: 12px;
                                  letter-spacing: 1px;
                                  display: inline-block;
                                  padding: 10px 15px 10px 15px;
                                  border-radius: 50px;
                                  transition: 0.5s;
                                  margin: 10px 0 0 0;
                                  color: #fff;
                                  background: #47b2e4;">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
      
            </div>
          </section><!-- End Team Section -->

    <!-- ======= Services Section ======= -->
    <section id="penyakit_kambing" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Data Penyakit Ayam KUB</h2>
          <p>
            Berikut adalah data penyakit ayam kub yang diambil dari berbagai sumber, dan akan dilakukan proses sistem pakar pada penelitian
          </p>
        </div>

        <div class="row">
          @foreach ($penyakits as $penyakit)
            @if ($penyakit->video != null && $penyakit->video != "")
              @php
                  $url2 = "https://www.youtube.com/watch?v=".$penyakit->video;
              @endphp
            @endif
              <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                  <div class="icon">
                    <img src="{{ asset('upload/foto_penyakit/'.$penyakit->foto) }}" width="100%" alt="">
                  </div>
                  <h4><a href="">{{ $penyakit->nama_penyakit }}</a></h4>
                  <small>
                    <a href="{{ $url2 }}" target="_blank"><i class="fa fa-youtube-play"></i>&nbsp; Klik untuk melihat video</a>
                  </small>

                  <p>{{ $penyakit->deskripsi }}</p>
                </div>
              </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="diagnosa_penyakit" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Diagnosa Penyakit</h3>
            <p>
              Untuk melakukan diagnosa penyakit Ayam KU, silahkan klik pada tombol di samping
            </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ route('diagnosa') }}">Mulai Diagnosa</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/frontend/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/php-email-form/validate.js') }}"></script>
  {{-- Font Awesome --}}
  <script src="https://kit.fontawesome.com/055120b175.js" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>

</html>