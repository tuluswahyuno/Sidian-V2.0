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
              <li class="breadcrumb-item active">Data PNS</li>
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
         

          <!-- Button trigger modal -->
          <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> BELUM FIX Tambah Data Pegawai</a>
          </button> -->

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Pegawai</th>
              <th>Gender / Usia</th>
              <th>Masa Kerja</th>
              <th>Status Pegawai</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pegawai as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td ><?php echo $us->nama_lengkap ?><br>
                  <span class="badge badge-success"><?php echo "NIP/NIK : ".$us->nip ?></span>
                </td>

                <td style="text-align: center;">
                <?php echo $us->gender ?><br>
                <hr style='margin-bottom:0;margin-top:0'>
                  <?php 
                  
                  $tmt = $us->tgl_lahir;

                  if($tmt != '0000-00-00') {

                  $bday = new DateTime($tmt); // Your date of birth
                  $today = new Datetime(date('m.d.y'));
                  $diff = $today->diff($bday);
                  
                  printf("<span class='badge badge-primary'>%d Tahun, %d Bulan </span>", $diff->y, $diff->m, $diff->d);

                  printf("\n");

                     // echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-warning'>TL : $us->tgl_lahir</span>";

                  }else{

                      echo "<span class='badge badge-danger'>Tgl Lahir Belum Diisi</span>";
                  }

                  
                   ?>
                </td>

               

                

                <td style="text-align: center;">
                  <?php 
                  
                  $tmt = $us->tmt;

                  if($tmt != '0000-00-00') {

                  $bday = new DateTime($tmt); // Your date of birth
                  $today = new Datetime(date('m.d.y'));
                  $diff = $today->diff($bday);
                  
                  printf("<span class='badge badge-success'>%d Tahun, %d Bulan, %d Hari</span>", $diff->y, $diff->m, $diff->d);

                  printf("\n");

                     echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-warning'>TMT : $us->tmt</span>";

                  }else{

                      echo "<span class='badge badge-danger'>TMT Belum Diset</span>";
                  }

                  
                   ?>
                </td>
                <td style="text-align: center;">
                    <?php if($us->status_pegawai == '1'){ ?>
                      <span class="badge badge-success">Pegawai Negeri Sipil</span>
                    <?php }elseif($us->status_pegawai == '2'){?>
                      <span class="badge badge-warning">PPPK</span>
                    <?php }else{ ?>
                      <span class="badge badge-primary">Non ASN</span>
                    <?php } ?>
                </td>

                <td>
                    <a href="<?php echo base_url('admin/Datapegawai/detail_pegawai/').$us->nip ?>" class="btn btn-sm btn-success">Detail <i class="fas fa-eye"></i></a>

                    <!-- <a href="<?php echo base_url('admin/Datapegawai/delete_pegawai/').$us->nip ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
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



