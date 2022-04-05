<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Data Profile Pegawai</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
                <form method="POST" action="<?php echo base_url('pns/dashboard/update_data') ?>" enctype="multipart/form-data">
                  
                  <div class="row">
                    <div class="col-sm-6">
                      
                      <div class="row">
                      <div class="col-sm-8">
                      <div class="form-group">
                          <label>NIP</label>
                          <input type="text" name="nip" class="form-control" value="<?php echo $pegawai->nip; ?>" readonly>
                      </div>
                      </div>

                      <div class="col-sm-4">
                      <div class="form-group">
                          <label>Status Pegawai</label>
                          <input type="text" name="status_pegawai" class="form-control" value="<?php echo $pegawai->jpegawai; ?>" disabled>
                      </div>
                      </div>
                      </div>
                      
                      <div class="form-group">
                          <label>Nama Pegawai</label>
                              
                          <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $pegawai->nama_lengkap; ?>" readonly>
                      </div>
                      

                      <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $pegawai->tempat_lahir; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $pegawai->tgl_lahir; ?>" readonly>
                          </div>
                      </div>
                      </div>


                      <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <input type="text" name="gender" class="form-control" value="<?php echo $pegawai->gender; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>Agama</label>
                          <input type="text" name="agama" class="form-control" value="<?php echo $pegawai->agama; ?>" readonly>
                          </div>
                      </div>
                      </div>

                      <div class="form-group">
                          <label>Alamat Lengkap</label>
                          <input type="text" name="alamat" class="form-control" value="<?php echo $pegawai->alamat; ?>" readonly>
                      </div>

                      <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Longitude</label>
                          <input type="text" name="longitude" class="form-control" value="<?php echo $pegawai->longitude; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Longitude</label>
                          <input type="text" name="latitude" class="form-control" value="<?php echo $pegawai->latitude; ?>" readonly>
                        </div>
                      </div>
                      </div>


                      <div class="form-group">
                          <label>Pangkat</label>
                          <input type="text" name="pangkat" class="form-control" value="<?php echo $pegawai->nama_pangkat; ?>" readonly>
                      </div>


                      <div class="form-group">
                          <label>Jabatan</label>
                          <input type="text" name="jabatan" class="form-control" value="<?php echo $pegawai->nama_jabatan; ?>" readonly>
                      </div>


                      

                      
                      
                    </div>

                    <div class="col-sm-6">

                      <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                          <label>Jenis Jabatan</label>
                          <input type="text" name="jenis_jabatan" class="form-control" value="<?php echo $pegawai->jenis_jabatan; ?>" readonly>
                      </div>
                      </div>


                      <div class="col-sm-6">
                      <div class="form-group">
                          <label>Profesi</label>
                          <input type="text" name="profesi" class="form-control" value="<?php echo $pegawai->nama_profesi; ?>" readonly>
                      </div>
                      </div>


                      </div>

                      <div class="form-group">
                          <label>Unit Kerja</label>
                          <input type="text" name="divisi" class="form-control" value="<?php echo $pegawai->nama_unitkerja; ?>" readonly>
                      </div>
                       
                       <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $pegawai->email; ?>" readonly>
                      </div>

                       <div class="form-group">
                          <label>NIK</label>
                          <input type="text" name="nik" class="form-control" value="<?php echo $pegawai->nik; ?>" readonly>
                      </div>
                      
                      
                      <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                          <label>NPWP</label>
                          <input type="text" name="npwp" class="form-control" value="<?php echo $pegawai->npwp; ?>" readonly>
                      </div>
                      </div>

                      <div class="col-sm-6">
                      <div class="form-group">
                          <label>Nomor BPJS</label>
                          <input type="text" name="bpjs" class="form-control" value="<?php echo $pegawai->bpjs; ?>" readonly>
                      </div>
                      </div>
                      </div>


                      <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                          <label>No Handphone</label>
                          <input type="text" name="no_hp" class="form-control" value="<?php echo $pegawai->no_hp; ?>" readonly>
                      </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                          <label>TMT PNS</label>
                          <input type="text" name="tmt" class="form-control" value="<?php echo $pegawai->tmt; ?>" readonly>
                          </div>
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>KP Terakhir</label>
                          <input type="text" name="kp_terakhir" class="form-control" value="<?php echo $pegawai->kp_terakhir; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>KP Akan Datang</label>
                          <input type="text" name="kp_mendatang" class="form-control" value="<?php echo $pegawai->kp_mendatang; ?>" readonly>
                          </div>
                      </div>
                      </div>

                       <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>KGB Terakhir</label>
                          <input type="text" name="kgb_terakhir" class="form-control" value="<?php echo $pegawai->kgb_terakhir; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                          <label>KGB Akan Datang</label>
                          <input type="text" name="kgb_mendatang" class="form-control" value="<?php echo $pegawai->kgb_mendatang; ?>" readonly>
                          </div>
                      </div>
                      </div>


                    
                    </div>

                    
                  </div>

            
                
                  <div align="right">
                  <!-- <button type="resert" class="btn btn-secondary">Reset</button> -->
                  <button type="submit" class="btn btn-primary">Update Data</button>
                  </div>
                </form>
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



