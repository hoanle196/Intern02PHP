<!--Template Name: vacayhome
File Name: home.html
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->
<?php
$action = $_GET['a'] ?? 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./public/temp/client/images/icons/favicon.png" />
  <title>MoTel</title>

  <!-- Bootstrap core CSS -->
  <link href="./public/temp/client/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="./public/temp/client/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Custom styles for this template -->
  <link href="./public/temp/client/css/style.css" rel="stylesheet">
  <link href="./public/css/styles-custom.css" rel="stylesheet">
  <link href="./public/temp/client/fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
  <link href="./public/temp/client/css/lightbox.min.css" rel="stylesheet">
  <link href="./public/temp/client/css/responsive.css" rel="stylesheet">
  <link href="./public/css/styles-custom.css" rel="stylesheet">
  <script defer src="./public/temp/client/js/jquery.min.js" type="text/javascript"></script>
  <script defer src="./public/temp/admin/dist/js/jquery.validate.min.js"></script>
  <script defer src="./public/temp/client/js/bootstrap.min.js" type="text/javascript"></script>
  <script defer src="./public/temp/client/js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
  <script defer src="./public/temp/client/js/instafeed.min.js" type="text/javascript"></script>
  <script defer src="./public/temp/client/js/custom.js" type="text/javascript"></script>
  <script defer src="./public/js/script.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- <script defer src="./public/js/validate.js"></script> -->
  <!-- <script defer src="./public/js/script.js"></script> -->
  <!-- <script defer src="./public/js/validate.js"></script> -->
</head>

<body>
  <div id="page">
    <!---header top---->
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php if ((isset($_SESSION['login']['role']) & $_SESSION['login']['role'] == 1) || (isset($_SESSION['login']['role']) & $_SESSION['login']['role'] == 0)) : ?>
              <a href="?a=dashboard">
                <div class="info-block"><i class="fa fa-map"></i>Go to dashboard</div>
              </a>/
              <a href="?a=logout">
                <div class="info-block"><i class="fa fa-sign-out"></i>Logout</div>
              </a>
            <?php else : ?>
              <a href="?a=logout">
                <div class="info-block"><i class="fa fa-sign-out"></i>Logout</div>
              </a>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <div class="social-grid">
              <ul class="list-unstyled text-right">
                <li><a><i class="fa fa-facebook"></i></a></li>
                <li><a><i class="fa fa-twitter"></i></a></li>
                <li><a><i class="fa fa-linkedin"></i></a></li>
                <li><a><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--header--->
    <header class="header-container">
      <div class="container">
        <div class="top-row">
          <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-6">
              <div id="logo">
                <!--<a href="index.html"><img src="images/logo.png" alt="logo"></a>-->
                <a href="?a=index"><span>Motel</span>home</a>
              </div>
            </div>
            <div class="col-sm-6 visible-sm">
              <div class="text-right"><button type="button" class="book-now-btn">Book Now</button></div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
              <nav class="navbar navbar-default">
                <div class="navbar-header page-scroll">
                  <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                </div>
                <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                  <ul class="list-unstyled nav1 cl-effect-10">
                    <li><a data-hover="Home" href="?a=index" class="<?= $action == 'index' ? 'active' : '' ?>"><span>Home</span></a></li>
                    <li><a data-hover="About" href="?a=about" class="<?= $action == 'about' ? 'active' : '' ?>"><span>About</span></a></li>
                    <li><a data-hover="Rooms" href="?a=room" class="<?= $action == 'room' ? 'active' : '' ?>"><span>Rooms</span></a></li>
                    <li><a data-hover="My Order" href="?a=myOrder" class="<?= $action == 'myOrder' ? 'active' : '' ?>"><span>My Order</span></a></li>
                    <li><a data-hover="Dinning" href="?a=dinning" class="<?= $action == 'dinning' ? 'active' : '' ?>"><span>Dinning</span></a></li>
                    <li><a data-hover="News" href="?a=details" class="<?= $action == 'details' ? 'active' : '' ?>"><span>News</span></a></li>
                    <li><a data-hover="Contact Us" href="?a=contact" class="<?= $action == 'contact' ? 'active' : '' ?>"><span>contact Us</span></a></li>
                  </ul>
                </div>
              </nav>
            </div>
            <!-- <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
              <div class="text-right"><button type="button" class="book-now-btn">Book Now</button></div>
            </div> -->
          </div>
        </div>
      </div>
    </header>