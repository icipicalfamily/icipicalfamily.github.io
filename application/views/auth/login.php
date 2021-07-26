<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>iCAPiCIP | Login</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="all,follow">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>css/fontastic.css">
	<!-- Google fonts - Poppins -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>css/custom.css">
	<!-- Owl Carouse -->
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>vendor/owlcarousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>vendor/owlcarousel/css/owl.theme.default.min.css">

	<!-- Tweaks for older IEs-->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
	<div class="page login-page">
		<div class="container d-flex align-items-center">
			<div class="form-holder has-shadow">
				<div class="row">
					
					<!-- Logo & Information Panel-->
					<div class="col-lg-6">
						<div class="info d-flex align-items-center bg-warning">
							<div class="content">
								<div class="logo text-dark">
									<h1>Login</h1>
								</div>
								<p>by <a class="text-dark" href="<?= base_url(); ?>">iCAPiCIP</a></p>
							</div>
						</div>
					</div>
					<!-- Form Panel    -->
					<div class="col-lg-6 bg-white">
						<div class="form d-flex align-items-center">
							<div class="content">
							<?= $this->session->flashdata('message'); ?>
								<form action="" method="post" class="form-validate">
									<div class="form-group">
										<input id="login-username" type="text" name="username"  class="input-material">
										<label for="login-username" class="label-material">User Name</label>
										<?= form_error('username', '<small class="text-danger pl-1">','</small>'); ?>
									</div>
									<div class="form-group">
										<input id="login-password" type="password" name="password" class="input-material">
										<label for="login-password" class="label-material">Password</label>
										<?= form_error('password', '<small class="text-danger pl-1">','</small>'); ?>
									</div>
									
									<button type="submit" id="login" class="btn btn-warning"><i class="fa fa-sign-in"></i> Login</button>
									<!-- This should be submit button but I replaced it with <a> for demo purposes-->
								</form>
								<br><small>Do not have an
									account? </small><a href="<?= base_url('register'); ?>" class="text-dark signup">Signup</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyrights text-center">
			<p>Design by <a href="<?= base_url(); ?>" class="external text-secondary">iCAPiCIP</a>
				<!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
			</p>
		</div>
	</div>
	<!-- JavaScript files-->
	<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('asset/'); ?>vendor/popper.js/umd/popper.min.js"> </script>
	<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/'); ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
	<script src="<?= base_url('asset/'); ?>vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?= base_url('asset/'); ?>vendor/owlcarousel/js/owl.carousel.min.js"></script>
	<!-- Main File-->
	<script src="<?= base_url('asset/'); ?>js/front.js"></script>
</body>

</html>
