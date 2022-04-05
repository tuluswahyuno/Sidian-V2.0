<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
          <div class="col-sm-12">

            <ul class="nav nav-tabs">
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pegawai/').$detail->nip ?>">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pendidikan/').$detail->nip ?>">Pendidikan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pangkat/').$detail->nip ?>">Kepangkatan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_jabatan/').$detail->nip ?>">Jabatan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pasangan/').$detail->nip ?>">Pasangan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_anak/').$detail->nip ?>">Anak</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_diklat/').$detail->nip ?>">Diklat</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_berkas/').$detail->nip ?>">Berkas</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/datapegawai/detail_mutasi/').$detail->nip ?>">Mutasi Ruang</a>
            </li>
          </ul>


          </div>
          
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
          <a>Data Riwayat Mutasi <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Pangkat Golongan</a>
          </button> -->


          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Ruang Asal</th>
              <th>Ruang Sekarang</th>
              <th>TMT</th>
              <th>File SK</th>
              <!-- <th style="text-align: center;">Action</th> -->
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($mutasi as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nip ?></td>
                <td><?php echo $us->nama_lengkap ?></td>
                <!-- <td ><?php echo $us->asal ?></td> -->

                <td style="text-align: center;">
                <a class="btn btn-sm btn-info" href="#"> <?php echo $us->asal ?></a>
                </td>

                <td style="text-align: center;">
                <a class="btn btn-sm btn-warning" href="#"> <?php echo $us->nama_unitkerja ?></a>
                </td>

                <td ><?php echo $us->tmt_mutasi ?></td>
                <!-- <td ><?php echo $us->file ?></td> -->

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tida Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/mutasi/' . $us->file ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/mutasi/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i>

                   <?php } ?>

                 </td>

                <!-- <td>
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_mutasi; ?>">
                  <i class="fas fa-edit"> </i></a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/Mutasi/delete_data/').$us->id_mutasi ?>"><i class="fas fa-trash"></i></a>
                </td> -->

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
