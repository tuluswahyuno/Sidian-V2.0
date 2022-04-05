 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="<?php echo base_url() ?>assets/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <!-- <i class="far fa-hospital"></i> -->
       <center> 
      <h2><span class="brand-text"><b>S I - D I A N</b></span></h2>
      </center>
     
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">DASHBOARD</li>
          <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Dashboard/timeline') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                  </p>
                </a>
              </li>

         

          <li class="nav-header">DATA KEPEGAWAIAN</li>
          <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-hospital-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Pendidikan') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Pendidikan
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Pangkat') ?>" class="nav-link">
              <i class="nav-icon fas fa-hospital-user"></i>
              <p>
                Pangkat/Golongan
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Pasangan') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Keluarga
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Diklat') ?>" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Diklat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Berkas') ?>" class="nav-link">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                Berkas
              </p>
            </a>
          </li>

          <li class="nav-header">MUTASI RUANG</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Mutasi/mutasiruang_nonpns') ?>" class="nav-link">
              <i class="nav-icon fas fa-hospital"></i>              
              <p>
                Mutasi Ruang
              </p>
              <?php if ($belum_dibaca != null) {?>
                  <span class="right badge badge-danger"><?php echo $belum_dibaca; ?> Surat</span>
                  <?php }else{} ?>
            </a>
          </li>

          <li class="nav-header">DIKLAT / KOMPETENSI</li>
          <li class="nav-item">
            <a href="<?php echo base_url('nonpns/Diklat/diklat_perpanjang') ?>" class="nav-link">
              <i class="nav-icon fas fa-award"></i>
              <p>
                Perlu Perpanjang
              </p>
                  <?php if ($diklat_bulan_ini != null) {?>
                  <span class="right badge badge-danger"><?php echo $diklat_bulan_ini; ?> Diklat</span>
                  <?php }else{} ?>
            </a>
          </li>

          <li class="nav-header">KELUAR APLIKASI</li>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('admin/User/ganti_password_nonpns') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Ganti Password
              </p>
            </a>
          </li> -->
          <li class="nav-item mb-5">
            <a href="<?php echo base_url('Auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

         
    </nav>
    </div>
  </aside>