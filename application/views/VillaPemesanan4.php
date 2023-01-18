<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pande House Villa Bali</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?= base_url('public/template_user/css/bootstrap.min.css')?> ">
      <!-- style css -->
      <link rel="stylesheet" href="<?= base_url('public/template_user/css/style.css')?> ">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?= base_url('public/template_user/css/responsive.css')?> ">
      <!-- fevicon -->
      <link rel="icon" href="<?= base_url('public/template_user/images/fevicon.png')?>" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?= base_url('public/template_user/css/jquery.mCustomScrollbar.min.css')?>">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="<?= base_url('public/template_user/images/loading.gif')?> " alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="mb-2">
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                           		<a href="index.html"><img src="<?= base_url('public/template_user/images/logo.png')?>."width=150 height=150" alt="#" /></a>

                              <!-- <a style="color:#fe0000;" class="h5" href="index.html">Pande House <br> Villa Bali</a> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo base_url('VillaHome')?>">Home</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link">Pemesanan</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <!-- end banner -->
      <!-- about -->
      
      <!-- end about -->
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Transaksi Berhasil</h2>
                     <p>Silahkan cetak invoice anda</p>
                  </div>
               </div>
            </div>
            <a href="<?php echo base_url('VillaPemesanan/BuatPDF')?>"><div id="reques" class="main_form">
                  <div class="row justify-content-center">
                     <button class="send_btn col-md-12 justify-content-center">Cetak</button>
                  </div>
            </div></a>
            <a href="<?php echo base_url('VillaHome')?>"><div id="reques" class="main_form">
                  <div class="row justify-content-center">
                     <button class="send_btn col-md-12 justify-content-center">Home</button>
                  </div>
            </div></a>
            
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <p>
                        © 2023 SIP Kelompok 5 Yoi</p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="<?= base_url('public/template_user/js/jquery.min.js')?>"></script>
      <script src="<?= base_url('public/template_user/js/bootstrap.bundle.min.js')?>"></script>
      <script src="<?= base_url('public/template_user/js/jquery-3.0.0.min.js')?>"></script>
      <!-- sidebar -->
      <script src="<?= base_url('public/template_user/js/jquery.mCustomScrollbar.concat.min.js')?>"></script>
      <script src="<?= base_url('public/template_user/js/custom.js')?>"></script>
   </body>
</html>