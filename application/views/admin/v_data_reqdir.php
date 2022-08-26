<title><?= $title; ?></title>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Data PNS</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
          <a>Manajemen Data PNS</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>NIP</th>
              <th>NAMA</th>
              <th>ALAMAT</th>
              <th>TEMPAT LAHIR</th>
              <th>TGL LAHIR</th>
              <th>NO WA</th>
              <th>STATUS PEGAWAI</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pegawai as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nip ?></td>
                <td><?php echo $us->nama_lengkap ?></td>
                <td><?php echo $us->alamat ?></td>
                <td><?php echo $us->tempat_lahir ?></td>
                <td><?php echo $us->tgl_lahir ?></td>
                <td><?php echo $us->no_hp ?></td>
                
                <td style="text-align: center;">

                  <?php if ($us->status_pegawai == '1'){?>

                    <?php echo "PNS" ?>

                  <?php }elseif($us->status_pegawai == '2'){ ?>

                    <?php echo "PPPK" ?>

                  <?php }elseif($us->status_pegawai == '3'){ ?>

                    <?php echo "Non PNS" ?>

                  <?php }else{ ?>

                      <?php echo "-" ?>

                    <?php } ?>
                </td>


                <td style="text-align: center;">
                    <a href="<?php echo base_url('admin/Datapegawai/detail_pegawai/').$us->nip ?>" class="btn btn-sm btn-primary">Detail <i class="fas fa-info-circle"></i></a>
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



