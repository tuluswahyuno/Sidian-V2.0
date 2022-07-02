<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Riwayat Mutasi Ruang</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Riwayat Mutasi Ruang</li>
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
          <a>Data Mutasi Pegawai</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
         <!--  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Mutasi</a>
          </button> -->

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama</th>
              <th>R. Asal</th>
              <th>R. Sekarang</th>
              <th>TMT</th>
              <th>File SK</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($mutasi as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nama_lengkap ?><br>
                  <span class="badge badge-success"><?php echo "NIP : ".$us->nip ?></span>
                </td>
                <td style="text-align: center;">
                  <span class="badge badge-warning"><?php echo $us->asal ?></span>
                </td>
                <td style="text-align: center;">
                  <span class="badge badge-primary"><?php echo $us->nama_unitkerja ?></span>
                </td>
                <td style="text-align: center;"><?php echo date('d-M-Y', strtotime($us->tmt_mutasi))  ?></td>

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <a class="btn btn-sm btn-danger" href="#"> Tidak Ada File </a>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/mutasi/' . $us->file ?>" target="_blank"> Lihat </a>

                   <?php } ?>

                 </td>

                <td>
                  
                  <?php if ($us->status_baca == 0 ){ ?>

                    
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/Mutasi/sudah_baca/').$us->id_mutasi ?>">Sudah dibaca <i class="far fa-folder-open"></i> </a>

                  <?php }else{ ?>


                  <?php } ?>
            
                  
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

