<title><?= $title; ?></title>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>SIP/STR Expired</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">SIP/STR Expired</li>
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
          <a>SIP/STR Expired</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Pegawai</th>
              <th>STR/SIP</th>
              <th>Expired</th>
              <th>Sertifikat</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pegawai as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td ><?php echo $us->nama_lengkap ?><br>
                  <span class="badge badge-info">
                    <?php if ($us->status_pegawai == 1 || $us->status_pegawai == 2 )
                    {
                      echo "NIP : ".$us->nip;
                    }else{
                      echo "NIK : ".$us->nip;
                    } 
                    ?></span>
                </td>
                <td style="text-align: center;"><?php echo $us->jenis_kompetensi ?></td>

                <td style="text-align: center;">
                  <?php 
                  
                  $tmt = $us->tgl_expired;

                  if($tmt != '0000-00-00') {

                  $bday = new DateTime($tmt); // Your date of birth
                  $today = new Datetime(date('m.d.y'));
                  $diff = $bday->diff($today);
                  
                  printf("<span class='badge badge-warning'>%d Tahun, %d Bulan, %d Hari</span>", $diff->y, $diff->m, $diff->d);

                  printf("\n");

                     echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-primary'>Expired : $us->tgl_expired</span>";

                  }else{

                      echo "<span class='badge badge-success'>Tidak Ada</span>";
                  }

                  
                   ?>
                </td>

                <td style="text-align: center;">
                   <?php
                    if ($us->file != NULL && $us->status_pegawai == 3) { ?>

                    <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/diklat/' . $us->file ?>" target="_blank"> Lihat </a>

                   <?php } elseif ($us->file != NULL && $us->status_pegawai == 1 || $us->status_pegawai == 2) { ?>

                    <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/diklat/' . $us->file ?>" target="_blank"> Lihat</a>

                   <?php }else{ ?>

                    <a class="btn btn-sm btn-danger" href="#"> Tidak Ada File</a>

                   <?php } ?>

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
                  <h5 class="modal-title">Update Data Diklat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Datapegawai/update_kompetensi') ?>">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>Berlaku Sampai</label>
                      <input type="hidden" name="id_kompetensi" value="<?php echo $us->id_kompetensi; ?>" >
                      <input type="date" name="tgl_expired" class="form-control" value="<?php echo $us->tgl_expired; ?>" required>
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



