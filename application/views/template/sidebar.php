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
          <img src="<?php echo base_url() ?>assets/template/dist/img/bwa.jpg" class="img-circle elevation-2" alt="User Image">
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
            <a href="<?php echo base_url('admin/Dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                  </p>
                </a>
              </li>

          <li class="nav-header">DATA MASTER</li>
          <li class="nav-item">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
            <li class="nav-item">
                <a href="<?php echo base_url('admin/Profesi') ?>" class="nav-link">
                 <i class="fas fa-user-nurse nav-icon"></i>
                  <p>Profesi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/pangkat') ?>" class="nav-link">
                  <i class="far fa-address-book nav-icon"></i>
                  <p>Pangkat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/Jabatan') ?>" class="nav-link">
                 <i class="fas fa-user-md nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url('admin/Pendidikan') ?>" class="nav-link">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/Unitkerja') ?>" class="nav-link">
                  <i class="fas fa-hospital nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/Jpegawai') ?>" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                  <p>Jenis Pegawai</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/Jenisberkas') ?>" class="nav-link">
                <i class="nav-icon fas fa-file-pdf"></i>
                  <p>Jenis Berkas</p>
                </a>
              </li>

            </ul>
              
            
          </li>

          <li class="nav-header">DATA KEPEGAWAIAN</li>
          
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/pns') ?>" class="nav-link">
              <!-- <i class="nav-icon fas fa-user-md"></i> -->
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Data PNS
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/pppk') ?>" class="nav-link">
              <!-- <i class="nav-icon fas fa-user-md"></i> -->
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                PPPK (P3K)
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/nonpns') ?>" class="nav-link">
              <!-- <i class="nav-icon fas fa-user-nurse"></i> -->
              <i class="nav-icon fas fa-user-nurse"></i>
              <p>
                Non ASN
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/tidakaktif') ?>" class="nav-link">
              <!-- <i class="nav-icon fas fa-user-nurse"></i> -->
              <i class="nav-icon fas fa-user-nurse"></i>
              <p>
                Tidak Aktif
              </p>
            </a>
          </li>

          <li class="nav-header">KENAIKAN PANGKAT & GAJI</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/kp') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-contract"></i>
              <!-- <i class="nav-icon fas fa-solid fa-calendar-circle-user"></i> -->
              <p>
                Naik Pangkat
              </p>
                  <?php if ($kp_bulan_ini != null) {?>
                  <span class="right badge badge-danger"><?php echo $kp_bulan_ini; ?> Orang</span>
                  <?php }else{} ?>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/kgb') ?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Naik Gaji
              </p>
              </p>
                  <?php if ($kgb_bulan_ini != null) {?>
                  <span class="right badge badge-danger"><?php echo $kgb_bulan_ini; ?> Orang</span>
                  <?php }else{} ?>
            </a>
          </li>


          <li class="nav-header">DIKLAT & KOMPETENSI</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/diklat') ?>" class="nav-link">
              <i class="nav-icon fas fa-award"></i>
              <p>
                Diklat Expired
              </p>
                  <?php if ($diklat_bulan_ini != null) {?>
                  <span class="right badge badge-danger"><?php echo $diklat_bulan_ini; ?> Orang</span>
                  <?php }else{} ?>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Datapegawai/kompetensi ') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                SIP/STR Expired
              </p>
                  <?php if ($kompetensi_expired != null) {?>
                  <span class="right badge badge-danger"><?php echo $kompetensi_expired; ?> Orang</span>
                  <?php }else{} ?>
            </a>
          </li>


          <li class="nav-header">MUTASI RUANG</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Mutasi') ?>" class="nav-link">
              <i class="nav-icon fas fa-hospital"></i>
              <p>
                Mutasi Ruang
              </p>
            </a>
          </li>

          <li class="nav-header">BANK DATA</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Bankdata') ?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Bank Data
              </p>
            </a>
          </li>


          <li class="nav-header">CETAK DATA</li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/Cetak') ?>" class="nav-link">
              <i class="nav-icon far fa-paper-plane"></i>
              <p>
                Data ASN
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/CetakNonASN') ?>" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Data Non ASN
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Pendidikan/All') ?>" class="nav-link">
              <i class="fas fa-user-graduate nav-icon"></i>
              <p>
                Data Pendidikan
              </p>
            </a>
          </li>


          <li class="nav-header">PENGATURAN USER</li>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('ImportController') ?>" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Import User
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/User') ?>" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Pengaturan User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/User/ganti_password') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Ganti Password
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