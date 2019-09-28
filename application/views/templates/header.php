<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Coin Solb">
  
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
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php if ( isset($page)) { if ( $page == 'landing' ) { ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link js-scroll-trigger scroll" href="#banner-section">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger scroll" href="#about-section">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger scroll" href="#features-section">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger scroll" href="#accomplish-section">Accomplishments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger scroll" href="#faq-section">FAQ's</a>
          </li>
          <li class="nav-item">
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
              <a class="dropdown-item" href="<?php echo base_url('login'); ?>">Login</a>
              <a class="dropdown-item" href="<?php echo base_url('register'); ?>">Register</a>
            </div>
          </li>
        <?php } ?>
        </ul>
      <?php } else { ?>
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
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
      <?php } } ?>
      </div>
    </div>
  </nav>