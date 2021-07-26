<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>iCAPiCIP Family</title>
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

  <!-- Navigation -->
  <div class="fixed-top">
		
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container">
        <a class="navbar-brand ml-2" href="<?= base_url(); ?>">iCAPiCIP<strong>Family</strong></a>
  
        <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
  
        <div class="collapse navbar-collapse p-3" id="navbarResponsive">
  
  
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-list"></i> Kategori
              </a>
              <div class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
                <?php foreach($kategori as $kt) : ?>
                <a class="dropdown-item" href="<?= base_url('c/').$kt['kategori']; ?>"><?= strtoupper($kt['kategori']); ?></a>
                <?php endforeach; ?>
              </div>
            </li>
            <form class="form-inline navbar-form" action="" method="post" enctype="multipart/form-data">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search"
                  aria-describedby="basic-addon1">
              </div>
            </form>
  
            
          </ul>
        </div>
        <div class="collapse navbar-collapse p-3" id="navbarResponsive">
  
          <ul class="navbar-nav ml-auto">
            <?php if(!$this->session->userdata('id_user')) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('login') ?>"> <i class="fa fa-sign-in"></i> Login</a>
              </li>
            <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="modal" data-target="#myCart"><?= $this->cart->total_items(); ?> <i class="fa fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('transaksi'); ?>">Transaksi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('user'); ?>"><?= ucfirst($usx['username']); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Yakin?')" href="<?= base_url('logout'); ?>"> <i class="fa fa-sign-out"></i> Logout</a>
            </li>
            <?php endif; ?>
          </ul>

        </div>
  
      </div>
    </nav>
  </div>
  <br><br><br><br><br>
