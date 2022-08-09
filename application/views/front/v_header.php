<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $title ?></title>
  <!-- <meta content="" name="descriptison">
  <meta content="" name="keywords"> -->
  <meta name="keywords" content="Sayur murah, Jual beli sayur, UMKM lokal">
  <meta name="description" content="Indobarter.id merupakan platform jual beli sayur dan bumbu dapur murah area Surakarta kota dan sekitarnya">
  <meta name="author" content="BayuSAPP, KrisnaWAR">
  <?php $url_bootstrap = base_url('assets/front/') ?>
  <?php
  if ($perusahaan->icon_website != '' || $perusahaan->icon_website != null) {
    echo '<link href="' . base_url($perusahaan->icon_website) . '" rel="icon">';
    echo '<link href="' . base_url($perusahaan->icon_website) . '" rel="apple-touch-icon">';
  } else {
    echo '<link href="' . base_url('assets/') . 'img/favicon.png" rel="icon">';
    echo '<link href="' . base_url('assets/') . 'img/apple-touch-icon.png" rel="apple-touch-icon">';
  }
  ?>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/owl.carousel/<?= $url_bootstrap ?>owl.carousel.min.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= $url_bootstrap ?>css/style.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Company - v2.1.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <!-- <h1 class="logo mr-auto"><a href="index.html"><span>Com</span>pany</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="<?= base_url() ?>" class="logo mr-auto"><img src="<?= base_url($perusahaan->logo_perusahaan) ?>" alt="" class="img-fluid">&nbsp&nbsp<h4 style="color:#5ab9f7; display:inline">INDO</h4>
        <h4 style="color:#ffd700; display:inline">BARTER</h4>
      </a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <?php
          if (uri('1') == null && uri('2') == null) {
            echo '<li class="active">';
          } else {
            echo '<li>';
          }
          ?>
          <a href="<?= base_url() ?>">Beranda</a></li>
          <?php
          if (uri('1') == 'produk') {
            echo '<li class="active">';
          } else {
            echo '<li>';
          }
          ?>
          <a href="<?= base_url('produk') ?>">Produk</a></li>
          <?php
          if (uri('1') == 'harga') {
            echo '<li class="active">';
          } else {
            echo '<li>';
          }
          ?>
          <a href="<?= base_url('harga') ?>">Harga</a></li>
          <?php
          if (uri('1') == 'testimoni') {
            echo '<li class="active">';
          } else {
            echo '<li>';
          }
          ?>
          <a href="<?= base_url('testimoni') ?>">Testimoni</a></li>
          <?php
          if (uri('1') == 'tentangkami') {
            echo '<li class="active">';
          } else {
            echo '<li>';
          }
          ?>
          <a href="<?= base_url('tentangkami') ?>">Tentang Kami</a></li>
          <?php
          if (uri('1') == 'kontak') {
            echo '<li class="active">';
          } else {
            echo '<li>';
          }
          ?>
          <a href="<?= base_url('kontak') ?>">Kontak</a></li>
          <li>
            <!-- <div class="dropdown"> -->
            <!-- <button class="btn btn-primary btn-sm dropdown-toggle my-auto" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </button> -->
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Link</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" target="_blank" href="https://www.tokopedia.com/indobarter/">Tokopedia</a>
              <a class="dropdown-item" target="_blank" href="https://shopee.com/">Shopee*</a>
            </div>
            <!-- </div> -->
          </li>
        </ul>
      </nav>
      <div class="header-social-links">
        <?php
        // if ($perusahaan->facebook_perusahaan) {
        //   echo '<a href="' . $perusahaan->facebook_perusahaan . '" target="_blank" class="facebook"><i class="icofont-facebook"></i></a> ';
        // }
        // if ($perusahaan->twitter_perusahaan) {
        //   echo '<a href="' . $perusahaan->twitter_perusahaan . '" target="_blank" class="twitter"><i class="icofont-twitter"></i></a> ';
        // }
        if ($perusahaan->instagram_perusahaan) {
          echo '<a href="' . $perusahaan->instagram_perusahaan . '" target="_blank" class="instagram"><i class="icofont-instagram"></i></a> ';
        }
        if ($perusahaan->whatsapp_perusahaan) {
          echo '<a href="http://wa.me/' . $perusahaan->whatsapp_perusahaan . '" target="_blank" class="facebook"><i class="icofont-whatsapp"></i></a> ';
        }
        ?>
      </div>
    </div>
  </header>