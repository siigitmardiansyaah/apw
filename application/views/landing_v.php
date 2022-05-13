<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url() ?>assets/data.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/data.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?><?php echo base_url()?>assets/landing/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/landing/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets/landing/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Shuffle - v4.7.0
  * Template URL: https://bootstrapmade.com/bootstrap-3-one-page-template-free-shuffle/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-background"><img src="<?php echo base_url()?>assets/landing/img/slide/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>APW</span></h2>
                <p class="animate__animated animate__fadeInUp">Aplikasi Pendataan Warga (APW) adalah sebuah aplikasi yang digunakan untuk mendata warga desa Pasirangin</p>
                <a href="<?php echo base_url('login')?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url()?>assets/landing/img/slide/2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Mendata Warga</h2>
                <p class="animate__animated animate__fadeInUp">Seperti nama aplikasinya, aplikasi ini digunakan untuk mendata warga desa pasirangin secara online agar memudahkan melakukan pendataan warganya tanpa melakukan data secara door to door atau secara tertulis</p>
                <a href="<?php echo base_url('login')?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-background"><img src="<?php echo base_url()?>assets/landing/img/slide/3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Sistem Pengambilan Keputusan Pemberian Bantuan</h2>
                <p class="animate__animated animate__fadeInUp">Selain digunakan untuk pendataan warga, aplikasi ini juga memiliki fungsi sebagai pengambilan keputusan pemberian bantuan, dimana hasil dari dapat dipercaya dan akurat.</p>
                <a href="<?php echo base_url('login')?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="<?php echo base_url()?>"><span>A.P.W</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/data.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#team">Kontak RT & RW</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url('login')?>">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch text-center">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $total_warga ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Total</strong> Warga </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $total_rt ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Total</strong> RT </p>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $total_kk ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Total</strong> Kepala Keluarga</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Kontak RW & Para RT</h2>
        </div>

        <div class="row">
          <?php
          foreach($rw as $w) :
          if($w['foto'] == null)
          {
            $foto = 'team-1.jpg';
          }else{
            $foto = $w['foto'];
          }
          ?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="member">
              <img src="<?php echo base_url()?>upload/<?php echo $foto ?>" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?php echo $w['nama']?></h4>
                  <h4><strong><?php echo $w['role']?></strong></h4>
                  <span><?php echo $w['no_telepon']?></span>
                  <span><?php echo $w['alamat']?></span>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

          <?php
          foreach($rt as $w) :
          if($w['foto'] == null)
          {
            $foto = 'team-3.jpg';
          }else{
            $foto = $w['foto'];
          }
          ?>
          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div class="member">
              <img src="<?php echo base_url()?>upload/<?php echo $foto ?>" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                <h4><?php echo $w['nama']?></h4>
                  <h4><strong><?php echo $w['role']?> <?php echo $w['no_rt']?> </strong></h4>
                  <span><?php echo $w['no_telepon']?></span>
                  <span><?php echo $w['alamat']?></span>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

          

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Contact Us Section ======= -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Fita</span></strong>. All Rights Reserved
      </div>
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/landing/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url()?>assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url()?>assets/landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>assets/landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/landing/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo base_url()?>assets/landing/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/landing/js/main.js"></script>

</body>

</html>