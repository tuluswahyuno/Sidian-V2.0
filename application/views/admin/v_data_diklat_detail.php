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
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_jabatan/').$detail->nip ?>">Jabatan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pasangan/').$detail->nip ?>">Pasangan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_anak/').$detail->nip ?>">Anak</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/Datapegawai/detail_diklat/').$detail->nip ?>">Diklat</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_berkas/').$detail->nip ?>">Berkas</a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_mutasi/').$detail->nip ?>">Mutasi Ruang</a>
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
          <a>Data Diklat <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Diklat</a>
          </button>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Diklat</th>
              <th>Penyelenggara</th>
              <th>Nomor</th>
              <th>JP</th>
              <th>Expired</th>
              <th>Sertifikat</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($diklat as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $us->nama_diklat ?></td>
                <td style="text-align: center;"><?php echo $us->institusi ?></td>
                <td style="text-align: center;"><?php echo $us->nomor ?></td>
                <td style="text-align: center;"><?php echo $us->durasi_jp ?></td>
                
                <td style="text-align: center;">
                <span class="badge badge-warning"><?php echo $us->berlaku_sampai ?></span>
                </td>

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>No File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/diklat/' . $us->file ?>" target="_blank"> Lihat </a>

                     <!-- <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/diklat/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i> -->


                   <?php } ?>

                 </td>

                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailmodal<?php echo $us->id_diklat; ?>">
                  <i class="fas fa-eye"> </i> Detail</a>

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_diklat; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>
                  </a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('pns/Diklat/delete_diklat_detail/').$us->id_diklat ?>"><i class="fas fa-trash"></i> Hapus</a>
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
                  <h5 class="modal-title">Tambah Data Diklat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/Diklat/tambah_diklat_detail') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama Diklat</label>
                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                    <input type="text" name="nama_diklat" class="form-control" placeholder="Masukkan Nama Diklat" required>
                    </div>

                    <div class="form-group">
                    <label>Institusi Penyelenggara</label>
                    <input type="text" name="institusi" class="form-control" placeholder="Masukkan Institusi Penyelenggara" required>
                    </div>

                    </div>

                    <div class="col-md-7">

                    <div class="form-group">
                    <label>Nomor Sertifikat</label>
                    <input type="text" name="nomor" class="form-control" placeholder="Masukkan Nomor Sertifikat" required>
                    </div>
                    </div>

                    <div class="col-md-5">
                    <div class="form-group">
                    <label>Durasi JP</label>
                    <input type="text" name="durasi_jp" class="form-control" placeholder="Masukkan JP" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control" placeholder="Masukkan Tanggal Mulai" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control" placeholder="Masukkan Tanggal Selesai" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Expired</label>
                    <input type="date" name="berlaku_sampai" class="form-control" placeholder="Masukkan Tanggal Selesai" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <label>File Sertifikat</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png" required>
                    </div>

                    <div class="col-md-12">
                      <div class="mt-1">
                        <!-- accept=".pdf, .jpg, .jpeg, .png" -->
                      <span class="text-secondary">File yang diupload harus dalam format : .pdf, .jpg, .jpeg, .png</span>
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
          foreach ($diklat as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="editmodal<?php echo $us->id_diklat; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Diklat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/Diklat/update_diklat_detail') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama Diklat</label>
                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                    <input type="hidden" name="id_diklat" class="form-control" value="<?php echo $us->id_diklat; ?>" required>
                    <input type="text" name="nama_diklat" class="form-control" value="<?php echo $us->nama_diklat; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>Institusi Penyelenggara</label>
                    <input type="text" name="institusi" class="form-control" value="<?php echo $us->institusi; ?>" required>
                    </div>

                    </div>

                    <div class="col-md-7">

                    <div class="form-group">
                    <label>Nomor Sertifikat</label>
                    <input type="text" name="nomor" class="form-control" value="<?php echo $us->nomor; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-5">
                    <div class="form-group">
                    <label>Durasi JP</label>
                    <input type="text" name="durasi_jp" class="form-control" value="<?php echo $us->durasi_jp; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control" value="<?php echo $us->tgl_mulai; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control" value="<?php echo $us->tgl_selesai; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Expired</label>
                    <input type="date" name="berlaku_sampai" class="form-control" value="<?php echo $us->berlaku_sampai; ?>" required>
                    </div>
                    </div>


                    <div class="col-md-6">
                    <label>File Sertifikat</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png">
                    </div>

                    <div class="col-md-12">
                      <div class="mt-1">
                        <!-- accept=".pdf, .jpg, .jpeg, .png" -->
                      <span class="text-secondary">File yang diupload harus dalam format : .pdf, .jpg, .jpeg, .png</span>
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


        <!-- MODAL DETAIL DATA -->
        <?php 
        $no = 0;
        foreach ($diklat as $us) : $no++; ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="detailmodal<?php echo $us->id_diklat; ?>" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail Data Diklat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                    <div class="row">

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama Diklat</label>
                    <input type="text" name="nama_diklat" class="form-control" value="<?php echo $us->nama_diklat; ?>" readonly>
                    </div>

                    <div class="form-group">
                    <label>Institusi Penyelenggara</label>
                    <input type="text" name="institusi" class="form-control" value="<?php echo $us->institusi; ?>" readonly>
                    </div>

                    </div>

                    <div class="col-md-9">

                    <div class="form-group">
                    <label>Nomor Sertifikat</label>
                    <input type="text" name="nomor" class="form-control" value="<?php echo $us->nomor; ?>" readonly>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">
                    <label>Durasi JP</label>
                    <input type="text" name="durasi_jp" class="form-control" value="<?php echo $us->durasi_jp; ?>" readonly>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>Tgl Mulai</label>
                    <input type="text" name="tgl_mulai" class="form-control" value="<?php echo $us->tgl_mulai; ?>" readonly>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>Tgl Selesai</label>
                    <input type="text" name="tgl_selesai" class="form-control" value="<?php echo $us->tgl_selesai; ?>" readonly>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>Expired</label>
                    <input type="text" name="berlaku_sampai" class="form-control" value="<?php echo $us->berlaku_sampai; ?>" readonly>
                    </div>
                    </div>
                    

                    </div>

                  
                </div>

              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
        <!-- AKHIR MODAL DETAIL DATA -->


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
