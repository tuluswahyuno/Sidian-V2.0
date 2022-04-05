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

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


    <li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
    <img src="<?php echo base_url().'uploads/foto/'.$pegawai->foto ?>" class="user-image img-circle elevation-2" alt="User Image">
    <span class="d-none d-md-inline"><?php echo $this->fungsi->user_login()->nama_lengkap ?> </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

    <li class="user-header bg-primary">

    <img src="<?php echo base_url().'uploads/foto/'.$pegawai->foto ?>" class="img-circle elevation-2" alt="User Image">

    <p>
    <?php echo $this->fungsi->user_login()->nama_lengkap ?> 
    <small><?php echo $this->fungsi->user_login()->email ?></small>
    </p>
    </li>

    <li class="user-body">
    <div class="row">
    <div class="col-4 text-center">
    <a href="<?php echo base_url('nonpns/Dashboard') ?>">Profile</a>
    </div>
    <div class="col-4 text-center">
    <a href="<?php echo base_url('nonpns/Pendidikan') ?>">Pendidikan</a>
    </div>
    <div class="col-4 text-center">
    <a href="<?php echo base_url('nonpns/Pasangan') ?>">Keluarga</a>
    </div>
    </div>

    </li>

    <li class="user-footer">
    <a class="btn btn-default btn-flat" data-toggle="modal" data-target="#gantipassword">Ganti Password</a>
    <!-- <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#tambah-data"><b>Update Foto</b></a> -->
    <a href="<?php echo base_url('Auth/logout') ?>" class="btn btn-default btn-flat float-right">Log out</a>
    </li>
    </ul>
    </li>



    </ul>
   


  </nav>
  <!-- /.navbar -->


  <!-- MODAL TAMBAH DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="gantipassword" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Berkas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                 

                    <form action="<?php echo base_url('admin/User/update_password_nonpns') ?>" method="post">
                      <div class="input-group mb-3">
                        <input type="hidden" name="id_user" class="form-control" value="<?php echo $pegawai->id_user; ?>" >
                        <input type="password" name="email" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Ulangi Password" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                          <button type="submit" name="login" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

                    </div>

                    </div>

                  
                </div>
                
                
                
              </div>
            </div>
          </div>
          <!-- AKHIR MODAL TAMBAH DATA -->


  
