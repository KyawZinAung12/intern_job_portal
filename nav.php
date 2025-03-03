<?php session_start();
ob_start();
 ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>JOBSPORTAL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">		
        <link rel="icon" href="Frontend/assets/img/logo/logo.png" sizes="16x16">


		<!-- CSS here -->
            <link rel="stylesheet" href="Frontend/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="Frontend/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="Frontend/assets/css/flaticon.css">
            <link rel="stylesheet" href="Frontend/assets/css/price_rangs.css">
            <link rel="stylesheet" href="Frontend/assets/css/slicknav.css">
            <link rel="stylesheet" href="Frontend/assets/css/animate.min.css">
            <link rel="stylesheet" href="Frontend/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="Frontend/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="Frontend/assets/css/themify-icons.css">
            <link rel="stylesheet" href="Frontend/assets/css/slick.css">
            <link rel="stylesheet" href="Frontend/assets/css/nice-select.css">
            <link rel="stylesheet" href="Frontend/assets/css/style.css">
   </head>

   <body>
    
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.php"><img src="Frontend/assets/img/logo/job.png" width="199" height="68" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="job_listing.php">Find a Jobs </a></li>
                                            <li><a href="about.html">About</a></li>
                                            <!-- <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li> -->
                                            <li><a href="contact.html">Contact</a></li>
                                            <?php if (isset($_SESSION['loginuser'])): ?>
                                                <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navdropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <?= $_SESSION['loginuser']['name'] ?>
                                              </a>
                                              <div class="dropdown-menu" aria-labelledby="navdropdown">
                                                  <a class="dropdown-item py-0" href="logout.php">Logout</a>
                                              </div>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <?php if (!isset($_SESSION['loginuser'])): ?>
                                <div class="header-btn d-none f-right d-lg-block">
                                  
                                    <div class="header-btn d-none f-right d-lg-block">
                                        <a href="register.php" class="btn head-btn1">Register</a>
                                        <a href="login.php" class="btn head-btn2">Login</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>