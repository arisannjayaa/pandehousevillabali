<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?= $title ?></title>

	<link rel="stylesheet" href="<?= base_url('public/assets/css/main/app.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('public/assets/css/main/app-dark.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('public/assets/css/pages/fontawesome.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/assets/css/pages/datatables.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.svg') ?>" type="image/x-icon" />
	<link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.png') ?>" type="image/png" />
	<style>
		/* * {
			font-family: 'Poppins', sans-serif;
			font-weight: 600;
		} */
	</style>
</head>

<body>
	<div id="app">
		<div id="sidebar" class="active">
			<div class="sidebar-wrapper active">
				<div class="sidebar-header position-relative">
					<div class="d-flex justify-content-between align-items-center">
						<div class="logo">
							<a class="h2" href="<?= base_url('dashboard') ?>">Pande House <br> Villa Bali</a>
						</div>
						<div class="sidebar-toggler x">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<div class="sidebar-menu">
					<ul class="menu mt-0">
						<li class="sidebar-title">Menu</li>

						<li class="sidebar-item <?= (uri_string() == 'AdminDashboard') ? 'active' : '' ?>">
							<a href="<?= base_url('AdminDashboard') ?>" class="sidebar-link">
								<i class="bi bi-grid-fill"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="sidebar-item <?= (uri_string() == 'AdminPemesanan') ? 'active' : '' ?>">
							<a href="<?= base_url('AdminPemesanan') ?>" class="sidebar-link">
								<i class="bi bi-ticket-perforated-fill"></i>
								<span>Pemesanan</span>
							</a>
						</li>
						<li class="sidebar-item has-sub <?= (uri_string() == 'AdminVilla/ketersediaan' || uri_string() == 'AdminVilla/datavilla' || uri_string() == 'AdminVilla/fasilitas') ? 'active' : '' ?>">
							<a href="<?= base_url('AdminVilla/data') ?>" class="sidebar-link">
								<i class="bi bi-house-fill"></i>
								<span>Villa</span>
							</a>
							<ul class="submenu <?= (uri_string() == 'AdminVilla/datavilla') ? 'active' : '' ?>">
								<li class="submenu-item">
									<a href="<?= base_url('AdminVilla/datavilla') ?>">Data Villa</a>
								</li>
								<li class="submenu-item <?= (uri_string() == 'AdminVilla/ketersediaan') ? 'active' : '' ?>">
									<a href="<?= base_url('AdminVilla/ketersediaan') ?>">Informasi Ketersediaan</a>
								</li>
								<li class="submenu-item <?= (uri_string() == 'AdminVilla/fasilitas') ? 'active' : '' ?>">
									<a href="<?= base_url('AdminVilla/fasilitas') ?>">Fasilitas</a>
								</li>
							</ul>
						</li>
						<li class="sidebar-item <?= (uri_string() == 'AdminContactPerson') ? 'active' : '' ?>">
							<a href="<?= base_url('AdminContactPerson') ?>" class="sidebar-link">
								<i class="bi bi-person-vcard-fill"></i>
								<span>Contact Person</span>
							</a>
						</li>
						<li class="sidebar-item <?= (uri_string() == 'AdminMetodePembayaraan') ? 'active' : '' ?>">
							<a href="<?= base_url('AdminMetodePembayaran') ?>" class="sidebar-link">
								<i class="bi bi-ticket-perforated-fill"></i>
								<span>Metode Pembayaran</span>
							</a>
						</li>
						<li class="sidebar-item <?= (uri_string() == 'AdminLaporan') ? 'active' : '' ?>">
							<a href="<?= base_url('AdminLaporan') ?>" class="sidebar-link">
								<i class="bi bi-printer-fill"></i>
								<span>Laporan</span>
							</a>
						</li>

						<li class="sidebar-title">Akun</li>
						<li class="sidebar-item <?= (uri_string() == 'Profil') ? 'active' : '' ?>">
							<a href="<?= base_url('Profil') ?>" class="sidebar-link">
								<i class="bi bi-file-earmark-person-fill"></i>
								<span>Profil</span>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<div id="main" class="layout-navbar navbar-fixed">
			<header>
				<nav class="navbar navbar-expand navbar-light navbar-top">
					
				</nav>
			</header>
			<div id="main-content">
				<div class="page-heading">
					<div class="page-title">
						<div class="row">
							<div class="col-12 col-md-12 order-md-1 order-last">
								<div class="card border border-1">
									<div class="card-body">
										<h4><?= $heading ?></h4>
										<p class="text-subtitle text-muted"><?= $desc ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<section class="section">
