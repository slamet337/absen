<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kemahasiswaan Universitas Tadulako</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>/assets/img/logo.png" rel="icon">
  <link href="<?= base_url() ?>/assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>/assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/landing/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/assets/landing/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Butterfly - v4.9.1
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="#" class="logo">Kemahasiswaan Universitas Tadulako</a>

      <nav id="navbar" class="navbar">
        <!-- <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#hama">Hama</a></li>
          <li><a class="nav-link scrollto" href="#penyakit">Penyakit</a></li>
          <li><a class="nav-link scrollto " href="#gejala">Gejala</a></li>
        </ul> -->
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container mt-5">
      <div class="row mt-5">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 flex-column justify-content-center">
          <h1>Welcome To<br>Kemahasiswaan Untad</h1>
          <h2>Website ini menampilkan informasi mengenai kegiatan Kemahasiswaan pada Universitas Tadulako. Aplikasi ini dirancang dengan tujuan utama untuk memberikan wadah yang efisien dan efektif bagi mahasiswa dalam mengakses informasi terkini mengenai lomba-lomba yang akan diadakan dalam waktu dekat</h2>
          <div><a href="<?= base_url() ?>login" class="btn-get-started scrollto">Get Started</a></div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="<?= base_url() ?>/assets/landing/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Count Section ======= -->
    <section id="count" class="section-bg">
      <div class="container mt-5">

        <div class="section-title">
          <h2>Jumlah Data</h2>
          <p>Jumlah Data Pada Website Kemahasiswaan</p>
        </div>

        <div class="row counters position-relative">

          <div class="col-lg-4 col-6 text-center">
            <h1 data-purecounter-start="0" data-purecounter-end="<?= $mhs; ?>" data-purecounter-duration="1" class="purecounter text-primary"></h1>
            <p>Mahasiswa</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <h1 data-purecounter-start="0" data-purecounter-end="<?= $registed; ?>" data-purecounter-duration="1" class="purecounter text-primary"></h1>
            <p>Registrasi</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <h1 data-purecounter-start="0" data-purecounter-end="<?= $unregist; ?>" data-purecounter-duration="1" class="purecounter text-primary"></h1>
            <p>Belum Registrasi</p>
          </div>

          <!-- <div class="col-lg-3 col-6 text-center">
            <h1 data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter text-primary"></h1>
            <p>Diagnosa</p>
          </div> -->

        </div>

      </div>
    </section>
    <!-- End Count Section -->

    <!-- ======= Hama Section ======= -->
    <!-- <section id="hama" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Hama</h2>
          <p>Macam - macam Hama pada Kedelai.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-cash-stack" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Nama Hama</a></h4>
              <p class="description">Ketengan Tengntang Hama</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-calendar4-week" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Nama Hama</a></h4>
              <p class="description">Ketengan Tengntang Hama</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-wow-delay="0.1s">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-chat-text" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Nama Hama</a></h4>
              <p class="description">Ketengan Tengntang Hama</p>
            </div>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End Hama Section -->

    <!-- ======= Penyakit Section ======= -->
    <!-- <section id="penyakit" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Penyakit</h2>
          <p>Macam - macam Penyakit pada Kedelai.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-capsule text-success"></i></div>
              <h4 class="title"><a href="">Nama Penyakit</a></h4>
              <p class="description">Ketengan Tengntang Penyakit</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-capsule text-success"></i></div>
              <h4 class="title"><a href="">Nama Penyakit</a></h4>
              <p class="description">Ketengan Tengntang Penyakit</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-capsule text-success"></i></div>
              <h4 class="title"><a href="">Nama Penyakit</a></h4>
              <p class="description">Ketengan Tengntang Penyakit</p>
            </div>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End Penyakit Section -->

    <!-- ======= Gejala Section ======= -->
    <!-- <section id="gejala" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Gejala</h2>
          <p>Macam - macam Gejala pada Kedelai.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-calendar4-week text-danger"></i></div>
              <h4 class="title"><a href="">Nama Gejala</a></h4>
              <p class="description">Ketengan Tengntang Gejala</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-calendar4-week text-danger"></i></div>
              <h4 class="title"><a href="">Nama Gejala</a></h4>
              <p class="description">Ketengan Tengntang Gejala</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-calendar4-week text-danger"></i></div>
              <h4 class="title"><a href="">Nama Gejala</a></h4>
              <p class="description">Ketengan Tengntang Gejala</p>
            </div>
          </div>

        </div>
    </section> -->
    <!-- End Gejala Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        <span>2023</span>
        &copy; Copyright <strong><a href="https://www.instagram.com/agrhi_/" target="_blank">Creative Software Engineer</a></strong>
      </div>
      <div class="credits">

      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/assets/landing/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url() ?>/assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>/assets/landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>/assets/landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/landing/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/assets/landing/js/main.js"></script>

</body>

</html>