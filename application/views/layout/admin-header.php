<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>icapicip | Dashboard</title>
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
		
   
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
      
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>icapicip | </span><strong> Dashboard</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>YZs</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
               
       
               
             
                <!-- Logout    -->
                <li class="nav-item"><a href="<?= base_url('logout'); ?>" onclick="return confirm('Yakin?')" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><i class="fa fa-user-secret fa-3x"></i></div>
            <div class="title">
              <h1 class="h4"><?= ucfirst($usx['nama']); ?></h1>
              <p>Administrator</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li><a href="<?= base_url('admin'); ?>"> <i class="icon-home"></i>Home </a></li>
            <li><a href="#promoDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-newspaper-o"></i>Promo </a>
                <ul id="promoDropdown" class="collapse list-unstyled ">
                    <li><a href="<?= base_url('admin/promo/add'); ?>"><i class="fa fa-pencil"></i> Tambah</a></li>
                    <li><a href="<?= base_url('admin/promo'); ?>"><i class="fa fa-briefcase"></i> Data</a></li>
                
                </ul>
            </li>
            <li><a href="#produkDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-basket"></i>Produk </a>
                <ul id="produkDropdown" class="collapse list-unstyled ">
                    <li><a href="<?= base_url('admin/produk/add'); ?>"><i class="fa fa-pencil"></i> Tambah</a></li>
                    <li><a href="<?= base_url('admin/produk'); ?>"><i class="fa fa-briefcase"></i> Data</a></li>
                
                </ul>
            </li>
            <li><a href="<?= base_url('admin/transaksi'); ?>"> <i class="fa fa-shopping-cart"></i>Transaksi </a></li>
            <li><a href="#userDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>User </a>
              <ul id="userDropdown" class="collapse list-unstyled ">
              <li><a href="<?= base_url('admin/user/add'); ?>"><i class="fa fa-pencil"></i> Tambah</a></li>
                    <li><a href="<?= base_url('admin/user'); ?>"><i class="fa fa-database"></i> Data</a></li>
              </ul>
            </li>
            
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
