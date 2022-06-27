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
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/Datapegawai/detail_anak/').$detail->nip ?>">Anak</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_diklat/').$detail->nip ?>">Diklat</a>
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
          <a>Data Anak <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Anak</a>
          </button>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Anak</th>
              <th>TTL</th>
              <th>Anak Ke</th>
              <th>Pekerjaan</th>
              <th>File</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($anak as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $us->nama_anak ?><br>
                  <?php
                    if ($us->tunjangan == 'Dapat Tunjangan') { ?>
                    <span class="badge badge-success"><?php echo $us->tunjangan ?></span>
                  
                  <?php } else { ?>

                    <span class="badge badge-warning"><?php echo $us->tunjangan ?></span>

                   <?php } ?>
                </td>
                <td><?php echo $us->tempat_lahir ?>, <?php echo $us->tgl_lahir ?></td>
                <td style="text-align: center;"><?php echo $us->anak_ke ?></td>
                <td style="text-align: center;"><?php echo $us->pekerjaan ?></td>
                

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>No File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/anak/' . $us->file ?>" target="_blank"> Akte Lahir </a>

                     <!-- <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/anak/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i> -->


                   <?php } ?>

                 </td>
                
                

                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailmodal<?php echo $us->id_anak; ?>">
                  <i class="fas fa-eye"> </i> Detail</a>

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_anak; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>
                  </a>

                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('pns/Anak/delete_anak_detail/').$us->id_anak ?>"><i class="fas fa-trash"></i> Hapus</a>
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
                  <h5 class="modal-title">Tambah Data Anak</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/Anak/tambah_anak_detail') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Nama Anak</label>
                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                    <input type="text" name="nama_anak" class="form-control" placeholder="Masukkan Nama Anak" required>
                    </div>

                    <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                    </div>

                    </div>

                    <div class="col-md-7">

                    <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                    </div>
                    </div>

                    <div class="col-md-5">
                    <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan Tgl Lahir" required>
                    </div>
                    </div>

                    <div class="col-md-2">
                     <div class="form-group">
                      <label>Anak Ke</label>
                      <select class="form-control" name="anak_ke" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        
                      </select>
                      </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" name="agama" required>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                        
                      </select>
                      </div>
                     </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" required>
                    </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status" required>
                        <option value="Anak Kandung">Anak Kandung</option>
                        <option value="Anak Tiri">Anak Tiri</option>
                      </select>
                      </div>
                     </div>

                     <div class="col-md-6">
                      <div class="form-group">
                      <label>Tunjangan</label>
                      <select class="form-control" name="tunjangan" required>
                        <option value="Dapat Tunjangan">Dapat Tunjangan</option>
                        <option value="Tidak Dapat Tunjangan">Tidak Dapat Tunjangan</option>
                      </select>
                      </div>
                     </div>


                     <div class="col-md-12">
                    <label>Akta Kelahiran</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png" required>
                    <div class="mt-1">
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
          foreach ($anak as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="editmodal<?php echo $us->id_anak; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Anak</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/Anak/update_anak_detail') ?>" enctype="multipart/form-data">

                    <div class="row">
                    
                    <div class="col-md-12">

                    


                    </div>

                    <div class="col-md-7">

                    <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $us->tempat_lahir; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-5">
                    <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $us->tgl_lahir; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-2">
                     <div class="form-group">
                      <label>Anak Ke</label>
                      <select class="form-control" name="anak_ke" required>
                        <option value="<?php echo $us->anak_ke; ?>"><?php echo $us->anak_ke; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        
                      </select>
                      </div>
                      </div>

                      <div class="col-md-4">
                      <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" name="agama" required>
                        <option value="<?php echo $us->agama; ?>"><?php echo $us->agama; ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                        
                      </select>
                      </div>
                     </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="<?php echo $us->pekerjaan; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status" required>
                        <option value="<?php echo $us->status; ?>"><?php echo $us->status; ?></option>
                        <option value="Anak Kandung">Anak Kandung</option>
                        <option value="Anak Tiri">Anak Tiri</option>
                      </select>
                      </div>
                     </div>

                     <div class="col-md-6">
                      <div class="form-group">
                      <label>Tunjangan</label>
                      <select class="form-control" name="tunjangan" required>
                        <option value="<?php echo $us->tunjangan; ?>"><?php echo $us->tunjangan; ?></option>
                        <option value="Dapat Tunjangan">Dapat Tunjangan</option>
                        <option value="Tidak Dapat Tunjangan">Tidak Dapat Tunjangan</option>
                      </select>
                      </div>
                     </div>


                     <div class="col-md-12">
                    <label>Akta Kelahiran</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png">
                    <div class="mt-1">
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
          foreach ($anak as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="detailmodal<?php echo $us->id_anak; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Data Anak</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                

                    <div class="row">
                    
                    <div class="col-md-12">

                      <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->nama_anak; ?>">
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->nik; ?>">
                    </div>
                    </div>


                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">T T L</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->tempat_lahir.", ".date('d-M-Y', strtotime($us->tgl_lahir)); ?>">
                    </div>
                    </div>


                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Agama</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->agama; ?>">
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->pekerjaan; ?>">
                    </div>
                    </div>


                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->status; ?>">
                    </div>
                    </div>


                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Anak ke</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->anak_ke; ?>">
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Tunjangan</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->tunjangan; ?>">
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
