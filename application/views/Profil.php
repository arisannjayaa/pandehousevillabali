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
                              <li class="nav-item ">
                                 <a class="nav-link" href="<?php echo base_url('VillaHome')?>">Home</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" >Profil</a>
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
      if (null !==($this->session->userdata("alert_home"))) { ?>
        <div class="alert alert-danger text-center">
            <strong><?php echo $this->session->userdata("alert_home"); ?></strong>
         </div>
      <?php } ?>
      <div class="contact">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Profil</h2>
                  </div>
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-4">
                  <form id="request" class="main_form">
                     <div class="row justify-content-center">
                        <div class="col-md-12 ">
                           <p>Nama</a></p>
                           <input class="contactus" placeholder="Username" type="type" name="username" value="<?php foreach ($profil->result_array() as $profil_data){
                              echo $profil_data['nama']; 
                              }?>" disabled> 
                        </div>
                        <div class="col-md-12 ">
                           <p>Username</a></p>
                           <input class="contactus" placeholder="Username" type="type" name="username" value="<?php foreach ($profil->result_array() as $profil_data){
                              echo $profil_data['username']; 
                              }?>" disabled> 
                        </div>
                        <?php if ($this->session->userdata("tipe_user") == 'customer') { ?>
                        <div class="col-md-12 ">
                           <p>Nomer Telepon</a></p>
                           <input class="contactus" placeholder="Username" type="type" name="username" value="<?php foreach ($profil->result_array() as $profil_data){
                              echo $profil_data['nomer_telepon']; 
                              }?>" disabled> 
                        </div>
                        <?php } ?>
                     </div>
                  </form>
                  <div class="container">
                     <a href="<?php echo base_url('Profil/EditProfil')?>"><div id="reques" class="main_form">
                           <div class="row justify-content-center">
                              <button class="send_btn col-md-12 justify-content-center">Edit Profil</button>
                           </div>
                     </div></a>
                     <a href="<?php echo base_url('Login/logout_akun')?>"><div id="reques" class="main_form">
                           <div class="row justify-content-center">
                              <button class="send_btn col-md-12 justify-content-center">Logout</button>
                           </div>
                     </div></a>
                              
                  </div>
         
            
         </div>

                  
                        
                        
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
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