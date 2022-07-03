<title><?= $title; ?></title>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Data Pendidikan Pegawai</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Pendidikan Pegawai</li>
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
          <a>Data Pendidikan Pegawai</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>NIP/NIK</th>
              <th>Nama Pegawai</th>
              <th>Status Pegawai</th>
              <th>Kampus</th>
              <th>Jenjang</th>
              <th>Jurusan</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pegawai as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td style="text-align: center;">
                    <?php if ($us->status_pegawai == 1 || $us->status_pegawai == 2 ){  ?>
                      <span class="badge badge-success"><?php echo $us->nip;  ?></span>
                    <?php }else{ ?>
                      <span class="badge badge-primary"><?php echo $us->nip; ?></span>
                    <?php } ?>
                <td ><?php echo $us->nama_lengkap ?></td>

                <td style="text-align: center;">
                  <?php if ($us->status_pegawai == 1 || $us->status_pegawai == 2 ){  ?>
                      <?php echo "ASN";  ?>
                    <?php }else{ ?>
                      <?php echo "Non ASN"; ?>
                    <?php } ?>
                </td>

                <td><?php echo $us->nama_sekolah ?><br></td>
                <td style="text-align: center;"><?php echo $us->pendidikan ?><br></td>
                <td><?php echo $us->jurusan ?><br></td>
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



