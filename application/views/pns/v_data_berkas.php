<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Data Berkas</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Berkas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <!-- <div class="card-header">
          <h3 class="card-title"></h3>
          <a>Data Berkas</a>
        </div> -->
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Berkas</a>
          </button>


          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Berkas Wajib : </strong> Kartu Keluarga (KK), KTP, NPWP, BPJS, Karpeg, Karis/karsu, Taspen, Tapera.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Jenis Berkas</th>
              <th>Keterangan</th>
              <th>File</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($berkas as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td style="text-align: center;"><?php echo $us->jenis_berkas ?></td>
                <td style="text-align: center;"><?php echo $us->nama_berkas ?></td>
                <!-- <td style="text-align: center;"><?php echo $us->file ?></td> -->

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tida Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/berkas_pns/' . $us->file ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/berkas_pns/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i>


                   <?php } ?>

                 </td>

                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_berkas; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>
                  </a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('pns/Berkas/delete_berkas/').$us->id_berkas ?>"><i class="fas fa-trash"></i> Hapus</a>
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
                <form method="POST" action="<?php echo base_url('pns/Berkas/tambah_data') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                      <label>Jenis Berkas</label>
                      <select class="form-control" name="jberkas" required>
                           <!--  <option value="<?php echo $pegawai->profesi; ?>"><?php echo $pegawai->nama_profesi; ?></option> -->
                            
                            <?php foreach($jenisberkas as $jp) : ?>
                            <option value="<?php echo $jp->id_jenisberkas;?>"> <?php echo $jp->jenis_berkas; ?></option>
                           <?php endforeach; ?>

                      </select>
                    </div>

                    <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="nama_berkas" class="form-control" placeholder="Masukkan Nama Berkas" required>
                    </div>

                    <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png" required>
                      <div class="mt-1">
                          <span class="text-secondary">File yang diupload harus dalam format : .pdf, .jpg, .jpeg, .png</span>
                       </div>
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
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_berkas; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Berkas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/Berkas/update_berkas') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">

                    <div class="form-group">
                      <label>Jenis Berkas</label>
                      <select class="form-control" name="jberkas" required>
                           <option value="<?php echo $us->jberkas; ?>"><?php echo $us->jenis_berkas; ?></option>
                            
                            <?php foreach($jenisberkas as $jp) : ?>
                            <option value="<?php echo $jp->id_jenisberkas;?>"> <?php echo $jp->jenis_berkas; ?></option>
                           <?php endforeach; ?>

                      </select>
                    </div>

                    <div class="form-group">
                    <label>Nama berkas</label>
                    <input type="hidden" name="id_berkas" class="form-control" value="<?php echo $us->id_berkas; ?>" required>
                    <input type="text" name="nama_berkas" class="form-control" value="<?php echo $us->nama_berkas; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png">
                      <div class="mt-1">
                          <span class="text-secondary">File yang diupload harus dalam format : .pdf, .jpg, .jpeg, .png</span>
                       </div>
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
