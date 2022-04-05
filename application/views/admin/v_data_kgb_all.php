<title><?= $title; ?></title>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Kenaikan Gaji Berkala</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Kenaikan Gaji Berkala</li>
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
          <a>Kenaikan Gaji Berkala</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>NIP</th>
              <th>Nama Pegawai</th>
              <th>Unit Kerja</th>
              <th>Pangkat & Jabatan</th>
              <th>Tanggal KGB</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pegawai as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td ><?php echo $us->nip ?></td>
                <td ><?php echo $us->nama_lengkap ?></td>
                <td style="text-align: center;"><?php echo $us->nama_unitkerja ?></td>
                <td style="text-align: center;"><span class='badge badge-success'><?php echo $us->nama_pangkat ?></span><br>
                     <hr style='margin-bottom:0;margin-top:0'>
                     <span class='badge badge-primary'><?php echo $us->nama_jabatan ?></td></span>

                <td style="text-align: center;">
                  <?php 
                  
                  $tmt = $us->kgb_mendatang;

                  if($tmt != '0000-00-00') {

                  $bday = new DateTime($tmt); // Your date of birth
                  $today = new Datetime(date('m.d.y'));
                  $diff = $bday->diff($today);
                  
                  printf("<span class='badge badge-success'>%d Tahun, %d Bulan, %d Hari</span>", $diff->y, $diff->m, $diff->d);

                  printf("\n");

                     echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-danger'>Deadline : $us->kgb_mendatang</span>";

                  }else{

                      echo "<span class='badge badge-success'>Tanggal Belum Diset</span>";
                  }

                  
                   ?>
                </td>

                <td>
                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_user; ?>">
                  <i class="fas fa-edit"></i> Selesai</a>
            
                  <!-- <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/Datapegawai/delete_jabatan/').$us->id_user ?>"><i class="fas fa-trash"></i></a> -->
                  </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

          <!-- MODAL UPDATE DATA -->
          <?php 
          $no = 0;
          foreach ($pegawai as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editmodal<?php echo $us->id_user; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data KGB Pegawai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Datapegawai/update_kgb') ?>">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>KGB Terakhir</label>
                      <input type="hidden" name="id_user" value="<?php echo $us->id_user; ?>" >
                      <input type="date" name="kgb_terakhir" class="form-control" value="<?php echo $us->kgb_terakhir; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>KGB Akan Datang</label>
                      <input type="date" name="kgb_mendatang" class="form-control" value="<?php echo $us->kgb_mendatang; ?>" required>
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



