<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('public/assets/css/main/app.css') ?>" />
	<title>Pande House Villa Bali</title>
</head>

<body>
	<div id="id">
		<div id="main" class="layout-horizontal">
			<header class="mb-0">
				<div class="header-top">
					<div class="container">
						<div class="logo">
							<a class="h4" href="index.html">Pande House Villa</a>
						</div>
						<div class="header-top-right">
							<?php if ($this->session->userdata('login') == false) { ?>
								<div id="login">
									<a href="<?= base_url('login') ?>">
										<div class="btn btn-primary">Login</div>
									</a>
								</div>
							<?php } else { ?>
								<div class="dropdown">
									<a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
										<div class="avatar avatar-md2">
											<img src="<?= base_url('public/assets/images/faces/1.jpg') ?>" alt="Avatar">
										</div>
										<div class="text">
											<h6 class="user-dropdown-name">User</h6>
											<p class="user-dropdown-status text-sm text-muted">Customer</p>
										</div>
									</a>

									<ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
										<li><a class="dropdown-item" href="#">Akun Saya</a></li>
										<li><a class="dropdown-item" href="#">Pengaturan</a></li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="auth-login.html">Logout</a></li>
									</ul>
								</div>
							<?php	} ?>

							<!-- Burger button responsive -->
							<a href="#" class="burger-btn d-block d-xl-none">
								<i class="bi bi-justify fs-3"></i>
							</a>
						</div>
					</div>
				</div>
				<nav class="main-navbar">
					<div class="container">
						<ul>
							<li class="menu-item  ">
								<a href="<?= base_url('') ?>" class='menu-link'>
									<span>Home</span>
								</a>
							</li>
							<li class="menu-item  ">
								<a href="<?= base_url('') ?>" class='menu-link'>
									<span>Villas</span>
								</a>
							</li>
							<li class="menu-item  ">
								<a href="<?= base_url('') ?>" class='menu-link'>
									<span>Lokasi</span>
								</a>
							</li>
							<li class="menu-item  ">
								<a href="<?= base_url('') ?>" class='menu-link'>
									<span>Pesan</span>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="<?= base_url('public/assets/images/villa/jumbotron.png') ?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="<?= base_url('public/assets/images/villa/jumbotron.png') ?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="<?= base_url('public/assets/images/villa/jumbotron.png') ?>" class="d-block w-100" alt="...">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</a>
			</div>
			<section id="pesan" class="mt-md-0 mt-lg-5 mt-0" style="margin-top: -150px;">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-6">
						<div class="card border border-1 border-primary">
							<div class="card-content">
								<form action="<?= base_url('') ?>" method="post">
									<div class="card-body">
										<h4 class="card-title mb-3">Temukan Villa</h4>
										<div class="form-group">
											<label for="basicInput">Kota Tujuan</label>
											<input type="text" class="form-control" id="basicInput" placeholder="Badung">
										</div>
										<div class="row">
											<div class="col">
												<div class="form-group">
													<label for="basicInput">Check-In</label>
													<input type="date" class="form-control" id="basicInput" placeholder="Badung">
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label for="basicInput">Check-Out</label>
													<input type="date" class="form-control" id="basicInput" placeholder="Badung">
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label for="basicInput">Durasi</label>
													<input type="text" class="form-control" id="basicInput" placeholder="Badung">
												</div>
											</div>

										</div>
										<button class="btn btn-primary">Temukan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script src="<?= base_url('public/assets/js/bootstrap.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/app.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/pages/dashboard.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/pages/horizontal-layout.js') ?>"></script>
</body>

</html>
