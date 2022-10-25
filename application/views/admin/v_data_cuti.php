<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Cuti Tahunan</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Cuti Tahunan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
          <a>Cuti Tahunan</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Ajukan Cuti</a>
          </button> -->

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Lengkap</th>
              <th>Keperluan</th>
              <th>Tgl Mulai</th>
              <th>Tgl Selesai</th>
              <th>Lama Cuti</th>
              <th>Status</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($cuti as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nama_lengkap ?><br>
                  <span class="badge badge-primary"><?php echo $us->nip ?></span>
                </td>
                <td><?php echo $us->keperluan ?></td>
                <td style="text-align: center;">
                  <span class="badge badge-danger">
                  <?php echo $us->tgl_mulai ?>
                  </span>
                </td>
                <td style="text-align: center;">
                  <span class="badge badge-primary">
                  <?php echo $us->tgl_selesai ?></span></td>
                
                <?php 
                  $date1 = $us->tgl_mulai;
                  $date2 = $us->tgl_selesai;
                  $days = (strtotime($date2) - strtotime($date1)) / (60 * 60 * 24);
                 ?>

                <td style="text-align: center;">
                  <span class="badge badge-success">
                  <?php print $days." Hari"; ?></span></td>

                <td style="text-align: center;">
                    
                  <?php $st = $us->status; if ($st == 0 ){ ?>
                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                  <?php }elseif ($st == 1 ){ ?>
                    <span class="badge badge-success">Disetujui</span>
                  <?php }elseif ($st == 2 ){ ?>
                    <span class="badge badge-primary">Ditangguhkan</span>
                  <?php }else{ ?>
                    <span class="badge badge-danger">Ditolak</span>
                  <?php } ?>

                  </td>
                
               <td style="text-align: center;">

                  
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_cuti; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>

                  <?php if ($us->status == 1 ) {
                  }else{?>

                    <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/Cuti/delete_data/').$us->id_cuti ?>">
                  <i class="fas fa-trash"></i> Hapus</a>

                  <?php } ?>

                  <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/Cuti/Cetakcuti/'.$us->id_cuti) ?>" target="_blank"><i class="fas fa-print"></i> Cetak</a>

                </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

         


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <!-- Footer -->
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <!-- MODAL TAMBAH DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="tambah-data" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ajukan Cuti</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Cuti/tambah_cuti') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">

                     <div class="form-group">
                      <label>Jenis Cuti</label>
                      <select class="form-control" name="jenis_cuti" required>
                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                        <option value="Cuti Besar">Cuti Besar</option>
                        <option value="Cuti Sakit">Cuti Sakit</option>
                        <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                        <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                        <option value="Cuti di Luar Tanggungan Negara">Cuti di Luar Tanggungan Negara</option>
                      </select>
                      </div>

                    <div class="form-group">
                      <label>Keperluan</label>
                      <textarea type="text" name="keperluan" class="form-control" placeholder="Keperluan Cuti" required></textarea> 
                    </div>
                    
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input id="date_picker" type="date" name="tgl_mulai" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input id="date_picker" type="date" name="tgl_selesai" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat Selama Cuti</label>
                      <textarea type="text" name="alamat_cuti" class="form-control" placeholder="Alamat Selama Cuti" required></textarea> 
                    </div>


                    <div class="form-group">
                      <label>Atasan</label>
                      <select class="form-control" name="nama_atasan" required>
                        <option value="TRI DARSONO, S.Sos., M.M.">TRI DARSONO, S.Sos., M.M.</option>
                        <option value="IMAS WULANDARI, S.Kom., M.Eng.">IMAS WULANDARI, S.Kom., M.Eng.</option>
                        <option value="dr. MAYASARI AYU HENDRAWATI">dr. MAYASARI AYU HENDRAWATI</option>
                      </select>
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
          <!-- AKHIR MODAL TAMBAH DATA -->




          <!-- MODAL UPDATE DATA -->
          <?php 
          $no = 0;
          foreach ($cuti as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_cuti; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/cuti/update_cuti') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">

                     <div class="form-group">
                      <label>Jenis Cuti</label>
                      <input type="hidden" name="id_cuti" value="<?php echo $us->id_cuti; ?>">
                      <select class="form-control" name="jenis_cuti" required>
                        <option value="<?php echo $us->jenis_cuti; ?>">
                          <?php echo $us->jenis_cuti; ?></option>
                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                        <option value="Cuti Besar">Cuti Besar</option>
                        <option value="Cuti Sakit">Cuti Sakit</option>
                        <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                        <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                        <option value="Cuti di Luar Tanggungan Negara">Cuti di Luar Tanggungan Negara</option>
                      </select>
                      </div>

                    <div class="form-group">
                      <label>Keperluan</label>
                      <textarea type="text" name="keperluan" class="form-control" required><?php echo $us->keperluan; ?></textarea> 
                    </div>
                    
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input id="date_picker" type="date" name="tgl_mulai" class="form-control" value="<?php echo $us->tgl_mulai; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input id="date_picker" type="date" name="tgl_selesai" class="form-control" value="<?php echo $us->tgl_selesai; ?>"required>
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat Selama Cuti</label>
                      <textarea type="text" name="alamat_cuti" class="form-control" placeholder="Alamat Selama Cuti" required><?php echo $us->alamat_cuti; ?></textarea>
                    </div>


                    <div class="form-group">
                      <label>Atasan</label>
                      <select class="form-control" name="nama_atasan" required>
                        <option value="<?php echo $us->nama_atasan; ?>">
                          <?php echo $us->nama_atasan; ?></option>
                        <option value="TRI DARSONO, S.Sos., M.M.">TRI DARSONO, S.Sos., M.M.</option>
                        <option value="IMAS WULANDARI, S.Kom., M.Eng.">IMAS WULANDARI, S.Kom., M.Eng.</option>
                        <option value="dr. MAYASARI AYU HENDRAWATI">dr. MAYASARI AYU HENDRAWATI</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <label>Status Pengajuan</label>
                      <select class="form-control" name="status" required>
                        <option value="1">Disetujui</option>
                        <option value="2">Ditangguhkan</option>
                        <option value="3">Ditolak</option>
                      </select>
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
        <?php endforeach; ?>
        <!-- AKHIR MODAL UPDATE DATA -->



        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
      </script>


