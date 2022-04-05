 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/landing/assets/ico.ico" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block">
      <a>Selamat Datang <b><?php echo $this->fungsi->user_login()->nama_lengkap ?></b></a>

      </li> -->

      <!-- li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
     <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lx dropdown-menu-right">
         
          <a href="<?php echo base_url('Auth/logout') ?>" class="dropdown-item dropdown-footer">Log Out</a>
        </div>
      </li> -->
      

      <!-- <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="<?php echo base_url() ?>assets/template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
      <span class="hidden-xs"><?php echo $this->fungsi->user_login()->nama_lengkap ?></span>
      </a>
      <ul class="dropdown-menu">

      <div class="card card-primary card-outline">
      <div class="card-body box-profile">
      <div class="text-center">
      <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>assets/template/dist/img/user2-160x160.jpg" alt="User profile picture">
      </div>
      <h4 class="profile-username text-center"><?php echo $this->fungsi->user_login()->nama_lengkap ?> </h4>
      <p class="text-muted text-center"><?php echo $this->fungsi->user_login()->email ?></p>
      
      <a href="#" class="btn btn-primary btn-block"><b>Profile</b></a>
      <a href="<?php echo base_url('Auth/logout') ?>" class="btn btn-danger btn-block"><b>Sign Out</b></a>
      </div>
      </div>
    </li> -->


    <li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

      

    <!-- <img src="<?php echo base_url() ?>assets/template/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image"> -->
    <span class="d-none d-md-inline"><?php echo $this->fungsi->user_login()->nama_lengkap ?> </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

    <li class="user-header bg-primary">

    <img src="<?php echo base_url() ?>uploads/foto/bwa.jpg" class="img-circle elevation-2" alt="User Image">

    <p>
    <?php echo $this->fungsi->user_login()->nama_lengkap ?> 
    <small><?php echo $this->fungsi->user_login()->email ?></small>
    </p>
    </li>

    <!-- <li class="user-body">
    <div class="row">
    <div class="col-4 text-center">
    <a href="#">Pendidikan</a>
    </div>
    <div class="col-4 text-center">
    <a href="#">Pangkat</a>
    </div>
    <div class="col-4 text-center">
    <a href="#">Jabatan</a>
    </div>
    </div> -->

    </li>

    <li class="user-footer">
    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
    <a href="<?php echo base_url('Auth/logout') ?>" class="btn btn-default btn-flat float-right">Sign out</a>
    </li>
    </ul>
    </li>



    </ul>
   


  </nav>
  <!-- /.navbar -->


  
