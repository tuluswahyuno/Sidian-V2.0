<title><?= $title; ?></title>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <section class="content-header">

          <div class="col-sm-12">

            <ul class="nav nav-tabs">

            <li class="nav-item">

              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/datapegawai/detail_pegawai/').$detail->nip ?>">Profile</a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_pendidikan/').$detail->nip ?>">Pendidikan</a>

            </li>



            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_pangkat/').$detail->nip ?>">Pangkat</a>

            </li>



            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_jabatan/').$detail->nip ?>">Jabatan</a>

            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_kgb/').$detail->nip ?>">KGB</a>
            </li>



            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_pasangan/').$detail->nip ?>">Pasangan</a>

            </li>



            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_anak/').$detail->nip ?>">Anak</a>

            </li>



            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_diklat/').$detail->nip ?>">Diklat</a>

            </li>


            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo base_url('admin/Datapegawai/detail_sipstr/').$detail->nip ?>">SIP/STR</a>
            </li>



            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_berkas/').$detail->nip ?>">Berkas</a>

            </li>



            <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_mutasi/').$detail->nip ?>">Mutasi Ruang</a>

            </li>

          </ul>





          </div>

          

    </section>

    



    <!-- Main content -->

    <section class="content">



      <!-- Default box -->

      <div class="card">

        <!-- <div class="card-header">

          <h3 class="card-title"></h3>

          <a></a>

        </div> -->

        <div class="card-body">

          

          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>

          



          <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Profile Pegawai</h3>

          </div>

              <!-- /.card-header -->

          <div class="card-body">

                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>

    <section class="content">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-4">

  <div class="card card-primary card-outline">
  <div class="card-body box-profile">
  <div class="text-center">
  <img class="profile-user-img img-fluid img-box" src="<?php echo base_url().'uploads/foto/'.$detail->foto ?>" alt="User profile picture">
  </div>
  <h3 class="profile-username text-center"><?php echo $detail->nama_lengkap; ?></h3>
  <p class="text-muted text-center"><?php echo $detail->nip; ?></p>
  <ul class="list-group list-group-unbordered mb-3">
  <li class="list-group-item">
    <b><?php echo $detail->jpegawai; ?></b> <a class="float-right">Status Pegawai</a>
  </li>
  <li class="list-group-item">
    <b><?php echo $detail->nama_pangkat; ?></b> <a class="float-right">Pangkat</a>
  </li>
  <li class="list-group-item">
    <b><?php echo $detail->nama_jabatan; ?></b> <a class="float-right">Jabatan</a>
  </li>
  <li class="list-group-item">
    <b><?php echo $detail->jenis_jabatan; ?></b> <a class="float-right">Jenis Jabatan</a>
  </li>
  <li class="list-group-item">
    <b><?php echo $detail->nama_profesi; ?></b> <a class="float-right">Profesi</a>
  </li>
  <li class="list-group-item">
    <b><?php echo $detail->nama_unitkerja; ?></b> <a class="float-right">Unit Kerja</a>
  </li>
  </ul>
  <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#update-foto"><b>Update Foto</b></a>
  <a href="<?php echo base_url('admin/Datapegawai/detail_pegawai_update/').$detail->nip ?>" class="btn btn-danger btn-block"><b>Update Data</b></a>
  </div>

  </div>


  

  </div>

  <div class="col-md-8">
  <div class="card">
  <div class="card-header p-2">
  <ul class="nav nav-pills">
  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
    <!-- <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab">Profesi</a></li> -->

  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">KP & KGB</a></li>
  </ul>
  </div>
  <div class="card-body">
  <div class="tab-content">

  <!-- <div class="tab-pane" id="about">
    <div class="card card-primary">
  
  <div class="card-body">
  <strong><i class="fas fa-user-md"></i> Profesi</strong>
  <p class="text-muted">
    <?php echo $detail->nama_profesi; ?>
  </p>
  <hr>
  <strong><i class="fas fa-hospital-user mr-1"></i> Unit Kerja</strong>
  <p class="text-muted">
    <?php echo $detail->nama_unitkerja; ?>
  </p>
  <hr>
  <strong><i class="fas fa-user mr-1"></i> TTL</strong>
  <p class="text-muted">
  <?php echo $detail->tempat_lahir.", "; ?><?php echo date('d-M-Y', strtotime($detail->tgl_lahir))  ?>

  </p>
  
  <hr>
  <strong><i class="fas fa-venus-mars"></i> Jenis Kelamin</strong>
  <p class="text-muted">
    <?php echo $detail->gender; ?><br> 
  </p>



  </div>

  </div>
  </div> -->
  

  <div class="tab-pane" id="timeline">

  <div class="timeline timeline-inverse">

  <div class="time-label">
  <span class="bg-secondary">
    Masa Kerja
  </span>
  </div>


  <div>
  <i class="fas fa-user-md bg-gray"></i>
  <div class="timeline-item">
  <!-- <span class="time"><i class="far fa-clock"></i> 12:05</span> -->
  <h3 class="timeline-header"><a>TMT PNS anda adalah</a> 
    <span class="badge badge-primary"><?php echo date('d-M-Y', strtotime($detail->tmt))  ?></span>
  </h3>
  <div class="timeline-body">
    Keseluruhan masa kerja anda adalah 
    <?php 
                  
                  $tmt = $detail->tmt;

                  if($tmt != '0000-00-00') {

                  $bday = new DateTime($tmt); // Your date of birth
                  $today = new Datetime(date('m.d.y'));
                  $diff = $today->diff($bday);
                  
                  printf("<span class='badge badge-primary'>%d Tahun, %d Bulan, %d Hari</span>", $diff->y, $diff->m, $diff->d);

                  printf("\n");

                     // echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-warning'>TMT : $detail->tmt</span>";

                  }else{

                      echo "<span class='badge badge-danger'>TMT Belum Diset</span>";
                  }

                  
                   ?>
  </div>
  
  </div>
  </div>

  <div class="time-label">
  <span class="bg-secondary">
  Kenaikan Pangkat
  </span>
  </div>

  <div>
  <i class="fas fa-user-md bg-gray"></i>
  <div class="timeline-item">
  <!-- <span class="time"><i class="far fa-clock"></i> 27 mins ago</span> -->
  <h3 class="timeline-header"><a>Kenaikan Pangkat Terakhir anda adalah</a>
    <span class="badge badge-success"><?php echo date('d-M-Y', strtotime($detail->kp_terakhir))  ?></span>
  </h3>
  <div class="timeline-body">
    Kenaikan Pangkat Anda yang akan datang pada 
    <span class="badge badge-success"><?php echo date('d-M-Y', strtotime($detail->kp_mendatang))  ?></span>
  </div>
  
  </div>
  </div>


  <div class="time-label">
  <span class="bg-secondary">
  Kenaikan Gaji Berkala
  </span>
  </div>


  <div>
  <i class="fas fa-user-md bg-gray"></i>
  <div class="timeline-item">
  <!-- <span class="time"><i class="far fa-clock"></i> 27 mins ago</span> -->
  <h3 class="timeline-header"><a>Kenaikan Gaji Berkala Terakhir anda adalah</a>
    <span class="badge badge-warning"><?php echo date('d-M-Y', strtotime($detail->kgb_terakhir))  ?></span>
  </h3>
  <div class="timeline-body">
    Kenaikan Gaji Berkala Anda yang akan datang pada 
    <span class="badge badge-warning"><?php echo date('d-M-Y', strtotime($detail->kgb_mendatang))  ?></span>
  </div>
  
  </div>
  </div>

  <div>
  <i class="far fa-clock bg-gray"></i>
  </div>
  </div>
  </div>

  <div class="active tab-pane" id="profile">
  <form class="form-horizontal">
  

  <div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">Pendidikan</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputName" value="<?php echo $detail->pendidikan." ".$detail->prodi; ?>">
  </div>
  </div>

  <div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">TTL</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputName" value="<?php echo $detail->tempat_lahir.", "; ?><?php echo date('d-M-Y', strtotime($detail->tgl_lahir))  ?>">
  </div>
  </div>

  <div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputName" value="<?php echo $detail->gender; ?>">
  </div>
  </div>

  <div class="form-group row">
  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
  <input type="email" class="form-control" id="inputEmail" value="<?php echo $detail->email; ?>">
  </div>
  </div>
  <div class="form-group row">
  <label for="inputName2" class="col-sm-2 col-form-label">Agama</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputName2" value="<?php echo $detail->agama; ?>">
  </div>

  </div>
  <div class="form-group row">
  <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
  <div class="col-sm-10">
  <textarea class="form-control" id="inputExperience"><?php echo $detail->alamat; ?>
  </textarea>
  </div>
  </div>

  <div class="form-group row">
  <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputName" value="<?php echo $detail->nik; ?>">
  </div>
  </div>
  
  <div class="form-group row">
  <label for="inputSkills" class="col-sm-2 col-form-label">No BPJS</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputSkills" value="<?php echo $detail->bpjs; ?>">
  </div>
  </div>
  <div class="form-group row">
  <label for="inputSkills" class="col-sm-2 col-form-label">NPWP</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputSkills" value="<?php echo $detail->npwp; ?>">
  </div>
  </div>
  <div class="form-group row">
  <label for="inputSkills" class="col-sm-2 col-form-label">No HP Aktif</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="inputSkills" value="<?php echo $detail->no_hp; ?>">
  </div>
  </div>
  
  <!-- <div class="form-group row">
  <div class="offset-sm-2 col-sm-10">
  <button type="submit" class="btn btn-danger">Update Data</button>
  </div>
  </div> -->
  </form>
  </div>

  </div>

  </div>
  </div>

  </div>

  </div>

  </div>
  </section>


  </div>

              </div>

              <!-- /.card-body -->

            </div>



        </div>

        <!-- /.card-body -->

        

        <!-- /.card-footer-->

      </div>

      <!-- /.card -->



    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->



  <!-- MODAL UPDATE FOTO -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="update-foto" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Foto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/Dashboard/update_foto_detail') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Foto Profile</label>
                    <input type="hidden" name="nip" class="form-control" value="<?php echo $detail->nip; ?>" hidden>
                    <input type="file" name="foto" class="form-control" required>
                    </div>

                    </div>

                    </div>

                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
                </form>
              </div>
            </div>
          </div>
        <!-- AKHIR MODAL MODAL UPDATE FOTO -->







