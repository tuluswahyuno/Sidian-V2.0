<title><?= $title; ?></title>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Data Diklat</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('pns/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Diklat</li>
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
          <a>Data Diklat</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              
              <th>Nama Diklat</th>
              <th>Penyelenggara</th>
              <th>No Sertifikat</th>
              <th>Expired</th>
              <th>Sertifikat</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($diklat as $us) : ?>

              <tr style="text-align: center;">
                <td><?php echo $no++; ?></td>
                <td ><?php echo $us->nama_diklat ?></td>
                <td><?php echo $us->institusi ?></td>

                <td style="text-align: center;"><?php echo $us->nomor ?><br>
                  <hr style='margin-bottom:0;margin-top:0'>
                  <span class="badge badge-info"><?php echo "Total JP : ".$us->durasi_jp ?></span>
                </td>

                <td style="text-align: center;">
                  <?php 
                  
                  $tmt = $us->berlaku_sampai;

                  if($tmt != '0000-00-00') {

                  $bday = new DateTime($tmt); // Your date of birth
                  $today = new Datetime(date('m.d.y'));
                  $diff = $bday->diff($today);
                  
                  printf("<span class='badge badge-warning'>%d Tahun, %d Bulan, %d Hari</span>", $diff->y, $diff->m, $diff->d);

                  printf("\n");

                     echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-primary'>Expired : $us->berlaku_sampai</span>";

                  }else{

                      echo "<span class='badge badge-success'>Tidak Ada</span>";
                  }

                  
                   ?>
                </td>

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                    <a class="btn btn-sm btn-danger" href="#"> Tidak Ada File <i class="fas fa-times-circle"> </a></i>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/diklat/' . $us->file ?>" target="_blank"> Lihat </a>


                   <?php } ?>

                 </td>

                <td>
                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_user; ?>">
                  <i class="fas fa-edit"></i> Selesai</a>
            
                  </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

          <!-- MODAL UPDATE DATA -->
          <?php 
          $no = 0;
          foreach ($diklat as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editmodal<?php echo $us->id_user; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Diklat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/Diklat/update_diklat_expired') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>Berlaku Sampai</label>
                      <input type="hidden" name="id_diklat" value="<?php echo $us->id_diklat; ?>" >
                      <input type="date" name="berlaku_sampai" class="form-control" value="<?php echo $us->berlaku_sampai; ?>" required>
                    </div>

                    <label>File Sertifikat</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png">

                    <div class="mt-1">
                    <span class="text-secondary">File yang diupload harus dalam format : .pdf, .jpg, .jpeg, .png</span>

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



