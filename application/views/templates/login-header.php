<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CoinSolb</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  
  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/custom.css" rel="stylesheet">
  
  <!-- DataTable css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  <!-- Game theme -->
  <link href="<?php echo base_url(); ?>assets/game_library/style.css" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/61cd694d48.js" crossorigin="anonymous"></script>
  

</head>

<body id="<?php if(isset($page_title)) echo $page_title; ?>">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light" id="loginNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url('/dashboard'); ?>">CoinSolb</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <?php if ( !$this->ion_auth->logged_in() ) { ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('register'); ?>">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('login'); ?>">Login</a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('account'); ?>">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo base_url('logout'); ?>">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger play-now-button" href="<?php echo base_url('play'); ?>">Play Now</a>
          </li>
          <li class="nav-item">
            <button href="<?php echo base_url('play'); ?>" class="btn bg-custom-orange text-white rounded-100">
              <small class="font-weight-bold">My Current Earnings:</small> <span class="badge badge-light"><?php if(isset($current_earnings_left)) echo '$'.$current_earnings_left; ?></span>
            </button>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>