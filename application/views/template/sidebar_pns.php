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
      <div class="user-panel mt-2 pb-2 mb-2 d-flex">
        <!-- <div class="image">
          <img src="<?php echo base_url().'uploads/foto/'.$pegawai->foto ?>" class="user-image img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a class="d-block">
            <?php echo $this->fungsi->user_login()->nama_lengkap ?><br>
            <?php echo $this->fungsi->user_login()->nip ?>
                </a>
              </div>
            </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">DASHBOARD</li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Dashboard/timeline') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                  </p>
                </a>
              </li>

         

          <li class="nav-header">DATA KEPEGAWAIAN</li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-hospital-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Pendidikan') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Pendidikan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Pangkat') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Kepangkatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Jabatan') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Jabatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Pasangan') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Keluarga
              </p>
            </a>
          </li>
         

          
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Berkas') ?>" class="nav-link">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                Berkas
              </p>
            </a>
          </li>


          <li class="nav-header">SERTIFIKAT KOMPETENSI</li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Kompetensi') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-medical"></i>
              <p>
                STR/SIP
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Diklat') ?>" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Diklat
              </p>
            </a>
          </li>

          
           <li class="nav-header">CUTI TAHUNAN</li>
          <li class="nav-item">
            <a href="<?php echo base_url('pns/Cuti') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pengajuan Cuti
              </p>
                  <!-- <?php if ($diklat_bulan_ini != null) {?>
                  <span class="right badge badge-danger"><?php echo $diklat_bulan_ini; ?> Diklat</span>
                  <?php }else{} ?> -->
            </a>
          </li>


          <li class="nav-header">PERLU PERPANJANG</li>
           <li class="nav-item">
            <a href="<?php echo base_url('pns/Kompetensi/kompetensi_expired') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-medical"></i>
              <p>
                STR/SIP
              </p>
                  <?php if ($kompetensi_bulan_ini != null) {?>
                  <span class="right badge badge-danger"><?php echo $kompetensi_bulan_ini; ?> STR/SIP </span>
                  <?php }else{} ?>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('pns/Diklat/diklat_perpanjang') ?>" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Diklat
              </p>
                  <?php if ($diklat_bulan_ini != null) {?>
                  <span class="right badge badge-danger"><?php echo $diklat_bulan_ini; ?> Diklat </span>
                  <?php }else{} ?>
            </a>
          </li>

         


          <li class="nav-header">MUTASI RUANG</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Mutasi/mutasiruang') ?>" class="nav-link">
              <i class="nav-icon fas fa-hospital"></i>              
              <p>
                Mutasi Ruang
              </p>
              <?php if ($belum_dibaca != null) {?>
                  <span class="right badge badge-danger"><?php echo $belum_dibaca; ?> Surat</span>
                  <?php }else{} ?>
            </a>
          </li>

          <li class="nav-header">BANK DATA</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Bankdata/datapns') ?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Bank Data
              </p>
            </a>
          </li>

        

          

          
          <li class="nav-header">KELUAR APLIKASI</li>
          
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