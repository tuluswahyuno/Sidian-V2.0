<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Ganti Password User</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
          <a>Ganti Password User</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         


          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Pegawai</th>
              <th>NIP</th>
              <th>Email</th>
              <!-- <th>Jabatan</th> -->
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($user as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nama_lengkap ?></td>
                <td><?php echo $us->nip ?></td>
                <td><?php echo $us->email ?></td>
                <!-- <td style="text-align: center;"><?php echo "<span class='badge badge-primary'>$us->jabatan</span>"; ?></td> -->
                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#editmodal<?php echo $us->id_user; ?>">
                  <i class="fas fa-user-lock"> </i> Ganti Password</a>
                  </a>

            
            
            <!-- <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/User/delete_user/').$us->id_user ?>"><i class="fas fa-trash"></i></a> -->
          </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>


          <!-- MODAL GANTI PASSWORD -->
          <?php 
          $no = 0;
          foreach ($user as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editmodal<?php echo $us->id_user; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ganti Password User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/User/update_password') ?>">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="hidden" name="id_user" value="<?php echo $us->id_user; ?>" >
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $us->nama_lengkap; ?>" readonly>
                    </div>

                    <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" value="<?php echo $us->nip; ?>" readonly>
                    </div>


                    <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $us->email; ?>" readonly>
                    </div>

                  

                    <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control" required>
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
          <!-- AKHIR MODAL GANTI PASSWORD -->


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



