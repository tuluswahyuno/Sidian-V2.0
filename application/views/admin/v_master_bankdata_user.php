<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">


      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Bank Data</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Bank Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Default box -->
      <div class="card">
        
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Bank Data</a>
          </button> -->

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Berkas</th>
              <th>File</th>
              <!-- <th style="text-align: center;">Action</th> -->
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($bankdata as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $us->nama_file ?></td>

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tida Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/bankdata/' . $us->file ?>" target="_blank"> Lihat File <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/bankdata/' . $us->file ?>" download> Download <i class="fas fa-download"> </a></i>

                   <?php } ?>

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
                  <h5 class="modal-title">Tambah Bank Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Bankdata/tambah_data') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama File</label>
                    <input type="text" name="nama_file" class="form-control" placeholder="Masukkan Nama File" required>
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
          foreach ($bankdata as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="editmodal<?php echo $us->id_bankdata; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Bank Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Bankdata/update_data') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama berkas</label>
                    <input type="hidden" name="id_bankdata" class="form-control" value="<?php echo $us->id_bankdata; ?>" required>
                    
                    <input type="text" name="nama_file" class="form-control" value="<?php echo $us->nama_file; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" class="form-control" value="<?php echo $us->file; ?>">
                    </div>


                    <div class="form-group">
                    <label>Lihat File</label><br>
                    <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tida Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'uploads/bankdata/' . $us->file ?>" target="_blank"> Lihat File</a>

                   <?php } ?>
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
