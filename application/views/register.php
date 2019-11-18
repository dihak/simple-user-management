<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>AdminLTE 3 | Registration Page</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition register-page">
		<div class="register-box">
			<div class="register-logo">
				<a href="<?= site_url(); ?>"><b>Admin</b>LTE</a>
			</div>

			<div class="card">
				<div class="card-body register-card-body">
					<p class="login-box-msg">Register a new membership</p>
					<?= validation_errors('<div class="text-danger">', '</div>'); ?>
					<form action="<?= site_url('register'); ?>" method="post" class='mt-2'>
						<div class="input-group mb-3">
							<?= form_input($input_nama); ?>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<?= form_input($input_email); ?>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<?= form_input($input_password); ?>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<?= form_input($input_passconf); ?>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<div class="icheck-primary">
									<input type="checkbox" id="agreeTerms" name="terms" value="agree">
									<label for="agreeTerms">
										I agree to the <a href="#">terms</a>
									</label>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-4">
								<button type="submit" class="btn btn-primary btn-block">Register</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
					<a href="<?= site_url('login'); ?>" class="text-center">I already have a membership</a>
				</div>
				<!-- /.form-box -->
			</div><!-- /.card -->
		</div>
		<!-- /.register-box -->

		<!-- jQuery -->
		<script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
		<!-- Bootstrap 4 -->
		<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url('dist/js/adminlte.min.js'); ?>"></script>
	</body>
</html>
