<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="col-sm-12">

            <ul class="nav nav-tabs">
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pegawai_nonpns/').$detail->nip ?>">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pendidikan_nonpns/').$detail->nip ?>">Pendidikan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pasangan_nonpns/').$detail->nip ?>">Pasangan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_anak_nonpns/').$detail->nip ?>">Anak</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_diklat_nonpns/').$detail->nip ?>">Diklat</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_sipstr_nonpns/').$detail->nip ?>">SIP/STR</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/Datapegawai/detail_berkas_nonpns/').$detail->nip ?>">Berkas</a>
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
          <a>Data Berkas <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Berkas</a>
          </button>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Berkas</th>
              <th>File</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($berkas as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $us->nama_berkas ?></td>

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tida Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/berkas/' . $us->file ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/non-pns/berkas/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i>


                   <?php } ?>

                 </td>

                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_berkas; ?>">
                  <i class="fas fa-edit"> </i></a>
                  </a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('nonpns/Berkas/delete_berkas_detail/').$us->id_berkas ?>"><i class="fas fa-trash"></i></a>
                </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

          <!-- MODAL TAMBAH DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="tambah-data" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Berkas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('nonpns/Berkas/tambah_berkas_detail') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama Berkas</label>
                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                    <input type="text" name="nama_berkas" class="form-control" placeholder="Masukkan Nama Berkas" required>
                    </div>

                    <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" class="form-control" required>
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
          foreach ($berkas as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="editmodal<?php echo $us->id_berkas; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Berkas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('nonpns/Berkas/update_berkas_detail') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama berkas</label>
                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                    <input type="hidden" name="id_berkas" class="form-control" value="<?php echo $us->id_berkas; ?>" required>
                    <input type="text" name="nama_berkas" class="form-control" value="<?php echo $us->nama_berkas; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" class="form-control" value="<?php echo $us->file; ?>">
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
