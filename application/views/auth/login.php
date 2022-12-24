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
	<div class="container">
		<div class="row vh-100 justify-content-center align-items-center">
			<div class="col-10 col-md-8 col-lg-4">
				<div class="card border border-primary border-1">
					<div class="card-body">
						<div class="login-title mb-3">
							<h3>Login</h3>
						</div>
						<div class="form-floating mb-3">
							<input type="email" class="form-control" id="floatingEmail" placeholder="Email">
							<label for="floatingEmail">Email</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
							<label for="floatingPassword">Password</label>
						</div>
						<div class="d-grid mb-2">
							<div class="btn btn-primary">Login</div>
						</div>
						<small class="d-block text-center">Belum memiliki akun? <a href="<?= base_url('register') ?>">Register</a></small>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('public/assets/js/bootstrap.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/app.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/pages/dashboard.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/pages/horizontal-layout.js') ?>"></script>
</body>

</html>
