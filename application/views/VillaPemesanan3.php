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
      <title>keto</title>
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
      <?php 
      if ($ketersediaan == 'ada') {
      ?>
      <div class="contact">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Villa Tersedia</h2>
                     <p>Silahkan lengkapi data di bawah ini untuk memesan</p>
                  </div>
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-4">
                  <form id="request" class="main_form" action="<?php echo base_url('VillaPemesanan/BuatTransaksi')?>" method="post">
                     <div class="row justify-content-center">
                        <input class="contactus" placeholder="Username" type="type" name="id_villa" value="<?php echo $id;?>" hidden>
                        <input class="contactus" placeholder="Username" type="type" name="tgl_dari" value="<?php echo $tgl_dari;?>" hidden>
                        <input class="contactus" placeholder="Username" type="type" name="tgl_sampai" value="<?php echo $tgl_sampai;?>" hidden>
                        <div class="dropdown col-md-12">
                           <select class="contactus" id="language" name='tipe_transaksi'>
                              <option value="Sewa">Jenis Pemesanan -> Sewa</option>
                              <option value="Booking">Jenis Pemesanan -> Booking</option>
                           </select>
                        </div>
                        <div class="dropdown col-md-12">
                           <select class="contactus" id="language" name='pembayaran'>
                              <?php foreach ($pembayaran->result_array() as $pembayaran_data){ ?>
                              <option value="<?php echo $pembayaran_data['id_metode_pembayaran']; ?>">Pembayaran -> <?php echo $pembayaran_data['jenis_pembayaran']; ?>
                              </option>
                              <?php }?>
                           </select>
                        </div>
                           <button class="send_btn col-md-12 justify-content-center">Pesan</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
      }elseif ($ketersediaan == 'tidak_ada') {
      ?>
      <div class="contact">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Villa Tidak Tersedia</h2>
                     <p>Tanggal yang anda pilih tidak tersedia, silahkan pilih kembali tanggal menginap anda</p>
                  </div>
               </div>
            </div>
            <a href="<?php echo base_url('VillaPemesanan/LamaMenginap/').$id;?>"><div id="reques" class="main_form">
                  <div class="row justify-content-center">
                     <button class="send_btn col-md-12 justify-content-center">Kembali</button>
                  </div>
            </div></a>
            
         </div>
      </div>
      <?php
      }elseif ($ketersediaan == 'tgl_salah') {
      ?>
      <div class="contact">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Tanggal Salah / Terlewat</h2>
                     <p>Tanggal yang anda masukkan salah / sudah terlewat</p>
                  </div>
               </div>
            </div>
            <a href="<?php echo base_url('VillaPemesanan/LamaMenginap/').$id;?>"><div id="reques" class="main_form">
                  <div class="row justify-content-center">
                     <button class="send_btn col-md-12 justify-content-center">Kembali</button>
                  </div>
            </div></a>
            
         </div>
      </div>
      <?php
      }elseif ($ketersediaan == 'tgl_lewat') {
      ?>
      <div class="contact">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Tanggal Lewat</h2>
                     <p>Tanggal yang anda masukkan sudah lewat dari hari ini</p>
                  </div>
               </div>
            </div>
            <a href="<?php echo base_url('VillaPemesanan/LamaMenginap/').$id;?>"><div id="reques" class="main_form">
                  <div class="row justify-content-center">
                     <button class="send_btn col-md-12 justify-content-center">Kembali</button>
                  </div>
            </div></a>
            
         </div>
      </div>
      <?php }?>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="about.html"> about</a></li>
                        <li><a href="room.html">Our Room</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribeddddddddddddd</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <p>
                        © 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a>
                        <br><br>
                        Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                        </p>

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