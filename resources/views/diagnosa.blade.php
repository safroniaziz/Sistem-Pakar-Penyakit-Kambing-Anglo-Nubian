<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Diagnosa Penyakit Kambing Perah- Index</title>
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
          <li><a class="nav-link scrollto active" href="{{ route('welcome') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('welcome') }}">Artikel</a></li>
          <li><a class="nav-link scrollto" href="{{ route('welcome') }}">Penyakit Kambing</a></li>
          <li><a class="nav-link scrollto" href="#diagnosa_penyakit">Diagnosa Penyakit</a></li>
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
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main">
    <!-- ======= Cta Section ======= -->
    <section id="diagnosa_penyakit" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Diagnosa Penyakit</h3>
            <p>
              Selamat datang di halaman diagnosa penyakit, silahkan diagnosa penyakit kambing anglo nubian peliharaan anda
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Diagnosa Penyakit</h2>
          </div>
  
          <div class="row">
            @if ($message = Session::get('error'))
              <div class="col-md-12">
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>
              </div>
            @endif
            @if (isset($hasil))
              <div class="col-md-12">
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                      <strong>Hasil diagnosa berhasil didapatkan</strong>
                  </div>
              </div>
              <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th colspan="4">Berikut penyakit yang ditemukan pada gejala yang anda pilih</th>
                      </tr>
                      <tr>
                        <th>No</th>
                        <th>Kode Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Nilai CF</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($hasil as $index => $hasil)
                        @php
                            $nama_penyakit = \App\Models\DataPenyakit::select('nama_penyakit')->where('kode_penyakit',$hasil['kode_penyakit'])->first();
                        @endphp
                          <tr>
                            <td>{{ $index+1 }}</td>
                            <td>KP {{ $hasil['kode_penyakit'] }}</td>
                            <td>{{ $nama_penyakit->nama_penyakit }}</td>
                            <td>{{ $hasil['nilai_cf'] }}</td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th colspan="3">Berikut penyakit hasil diagnosa dengan persentase paling tinggi</th>
                    </tr>
                    <tr>
                      <th>Kode Penyakit</th>
                      <th> : </th>
                      <td>KP {{ $diagnosa->kode_penyakit }}</td>
                    </tr>
                    <tr>
                      <th>Nama Penyakit</th>
                      <th> : </th>
                      <td>{{ $diagnosa->dataPenyakit->nama_penyakit }}</td>
                    </tr>
                    <tr>
                      <th>Nilai CF</th>
                      <th> : </th>
                      <td>{{ $diagnosa->nilai_cf }}</td>
                    </tr>
                    <tr>
                      <th>Persentase</th>
                      <th> : </th>
                      <td>{{ $diagnosa->persentase }}%</td>
                    </tr>
                  </thead>
                </table>
              </div>
            @endif
            <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="{{ route('diagnosa.post') }}" method="post"  class="php-email-form">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="name">Your Name</label>
                    <select name="gejala_id[]" class="form-control js-example-basic-single" multiple="multiple" id="" required>
                        <option disabled>-- pilih gejala --</option>
                        @foreach ($gejalas as $gejala)
                            <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama_gejala }}</option>
                        @endforeach
                    </select>
                  </div>
                  
                </div>
                <div class="text-center">
                    <button type="submit">Proses Diagnosa</button>
                </div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
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
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/waypoints/noframework.waypoints.js') }}"></script>
  {{-- Font Awesome --}}
  <script src="https://kit.fontawesome.com/055120b175.js" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
  </script>

</body>

</html>