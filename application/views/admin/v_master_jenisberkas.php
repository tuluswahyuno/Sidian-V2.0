<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Data Jenis Bekas</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Jenis Bekas</li>
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
          <a>Manajemen Data Jenis Berkas</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Jenis</a>
          </button>

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Jenis Berkas</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($jenisberkas as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td ><?php echo $us->jenis_berkas ?></td>
                <td style="text-align: center;">
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_jenisberkas; ?>">
                  <i class="fas fa-edit"></i> Edit</a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/Jenisberkas/delete_jenisberkas/').$us->id_jenisberkas ?>"><i class="fas fa-trash"></i> Hapus</a>
                </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

          <!-- MODAL TAMBAH DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Pangkat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Jenisberkas/tambah_jenisberkas') ?>">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>Nama Jenis Berkas</label>
                    <input type="text" name="jenis_berkas" class="form-control" placeholder="Masukkan Jenis Berkas" required>
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
          foreach ($jenisberkas as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editmodal<?php echo $us->id_jenisberkas; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Jenis Berkas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Jenisberkas/update_jenisberkas') ?>">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>Pangkat dan Golongan</label>
                      <input type="hidden" name="id_jenisberkas" value="<?php echo $us->id_jenisberkas; ?>" >
                      <input type="text" name="jenis_berkas" class="form-control" value="<?php echo $us->jenis_berkas; ?>" required>
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



