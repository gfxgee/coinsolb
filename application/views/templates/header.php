<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148337774-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-148337774-1');
  </script>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Coin Solb">

  <meta property="og:title"              content="Coinsolb" />
  <meta property="og:description"        content="Improve your math skills with Coinsolb! Your time will not be wasted becuase you earn points and improve your math skill while playing." />
  <!-- <meta property="og:image"              content="<?php echo base_url(); ?>assets/images/banner.jpg" />  -->

  <meta name="directory" content="public">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="solve, math problems, simple math, addition, substration, multiplication, division, earn, play, motive, time, coinsolb" name="keywords">
  <meta content="Improve your math skills with Coinsolb! Your time will not be wasted becuase you earn points and improve your math skill while playing." name="description">
  
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/300ppi/favicon.png" sizes="32x32">


  <title><?php if(isset($page_title)) echo $page_title; ?></title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  
  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/custom.css" rel="stylesheet">
  
  <!-- DataTable css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/data-tables/datatables.min.css"/>


  <!-- Game theme -->
  <link href="<?php echo base_url(); ?>assets/game_library/style.css" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/61cd694d48.js" crossorigin="anonymous"></script>


</head>

<body id="<?php if(isset($page)) echo $page.'_page'; ?>">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-main-color" id="main-nav">
    <div class="container">
      <a class="navbar-brand p-0" href="<?php echo base_url(); ?>">
        <img id="navbar-logo" src="<?php echo base_url(); ?>assets/images/300ppi/logo.png" width="200px;" alt="">
      </a>
      <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white"><i class="fas fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item <?php echo ( $page == 'landing') ? 'active' : ''; ?>">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item <?php echo ( $page == 'about') ? 'active' : ''; ?>">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('about-us'); ?>">About</a>
          </li>
          <li class="nav-item <?php echo ( $page == 'faq') ? 'active' : ''; ?>">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('faq'); ?>">FAQ's</a>
          </li>
          <li class="nav-item <?php echo ( $page == 'contact') ? 'active' : ''; ?>">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('contact'); ?>">Contact</a>
          </li>
          <?php if($this->ion_auth->logged_in()) {?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('logout'); ?>">Logout</a>
          </li>
          <?php } else { ?>
            <li class="nav-item dropdown <?php echo ( $page == 'login' || $page == 'register') ? 'active' : ''; ?>">
              <a class="nav-link dropdown-toggle login-button" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login / Register
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item <?php echo ( $page == 'login') ? 'active' : ''; ?>" href="<?php echo base_url('login'); ?>">Login</a>
                <a class="dropdown-item <?php echo ( $page == 'register') ? 'active' : ''; ?>" href="<?php echo base_url('register'); ?>">Register</a>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>