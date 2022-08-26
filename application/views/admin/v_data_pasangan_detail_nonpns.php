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
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/Datapegawai/detail_pasangan_nonpns/').$detail->nip ?>">Pasangan</a>
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
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_berkas_nonpns/').$detail->nip ?>">Berkas</a>
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
          <a>Data Pasangan <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Pasangan</a>
          </button>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Pasangan</th>
              <th>Pekerjaan</th>
              <th>Tgl Nikah</th>
              <th>File</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pasangan as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $us->nama_pasangan ?><br>
                  <?php
                    if ($us->tunjangan == 'Dapat Tunjangan') { ?>
                    <span class="badge badge-success"><?php echo $us->tunjangan ?></span>
                  
                  <?php } else { ?>

                    <span class="badge badge-warning"><?php echo $us->tunjangan ?></span>

                   <?php } ?>
                </td>
                <td style="text-align: center;"><?php echo $us->pekerjaan ?></td>
                <td style="text-align: center;"><?php echo $us->tgl_nikah ?></td>

            
                <td style="text-align: center;">
                   <?php
                    if ($us->akta_nikah == NULL && $us->akta_cerai == NULL) { ?>

                     <a class="btn btn-sm btn-danger" href="#"> Tidak Ada File </a>

                   <?php } elseif ($us->akta_nikah != NULL && $us->akta_cerai != NULL) { ?>

                    <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_nikah ?>" target="_blank"> Akta Nikah </a>

                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_nikah ?>" target="_blank"> Akta Cerai </a>

                  <?php } elseif ($us->akta_nikah != NULL && $us->akta_cerai == NULL) { ?>

                    <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_nikah ?>" target="_blank"> Akte Nikah </a>

                  <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_cerai ?>" target="_blank"> Akta Cerai </a>

                   <?php } ?>

                 </td>                
                

                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailmodal<?php echo $us->id_pasangan; ?>">
                  <i class="fas fa-eye"> </i> Detail</a>

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_pasangan; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>
                  </a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('nonpns/Pasangan/delete_pasangan_detail/').$us->id_pasangan ?>"><i class="fas fa-trash"></i> Hapus</a>
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
                  <h5 class="modal-title">Tambah Data Pasangan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('nonpns/Pasangan/tambah_pasangan_detail') ?>" enctype="multipart/form-data">



                    <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                      <label>Pasangan</label>
                      <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                      <select class="form-control" name="pasangan" required>
                        <option value="Suami">Suami</option>
                        <option value="Istri">Istri</option>
                      </select>
                      </div>
                     </div>

                    <div class="col-md-9">

                    <div class="form-group">
                    <label>Nama Pasangan</label>
                    <input type="text" name="nama_pasangan" class="form-control" placeholder="Masukkan Suami/Istri" required>
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
                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" required>
                    </div>
                    </div>

                    <div class="col-md-5">
                    <div class="form-group">
                    <label>Tanggal Menikah</label>
                    <input type="date" name="tgl_nikah" class="form-control" placeholder="Masukkan Tanggal Menikah" required>
                    </div>
                    </div>

                    <div class="col-md-3">
                     <div class="form-group">
                      <label>Pasangan Ke</label>
                      <select class="form-control" name="pasangan_ke" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
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
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" required>
                    </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                      <label>Status Hidup</label>
                      <select class="form-control" name="status_hidup" required>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                      </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                      <label>Status Pernikahan</label>
                      <select class="form-control" name="status_pernikahan" required>
                        <option value="Menikah">Menikah</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                      </select>
                      </div>
                    </div>

                    <div class="col-md-5">
                      <div class="form-group">
                      <label>Tunjangan</label>
                      <select class="form-control" name="tunjangan" required>
                        <option value="Dapat Tunjangan">Dapat Tunjangan</option>
                        <option value="Tidak Dapat Tunjangan">Tidak Dapat Tunjangan</option>
                      </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                    <label>Akta Nikah</label>
                    <input type="file" name="akta_nikah" class="form-control">
                    </div>

                    <div class="col-md-6">
                    <label>Akta Cerai</label>
                    <input type="file" name="akta_cerai" class="form-control">
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
          foreach ($pasangan as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="editmodal<?php echo $us->id_pasangan; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Pasangan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('nonpns/Pasangan/update_pasangan_detail') ?>" enctype="multipart/form-data">

                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                    <input type="hidden" name="id_pasangan" class="form-control" value="<?php echo $us->id_pasangan; ?>" required>

                    <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                      <label>Pasangan</label>
                      <select class="form-control" name="pasangan" required>
                        <option value="<?php echo $us->pasangan; ?>"><?php echo $us->pasangan; ?></option>
                        <option value="Suami">Suami</option>
                        <option value="Istri">Istri</option>
                      </select>
                      </div>
                     </div>

                    <div class="col-md-9">

                    <div class="form-group">
                    <label>Nama Suami/Istri</label>
                    <input type="hidden" name="id_pasangan" class="form-control" value="<?php echo $us->id_pasangan; ?>" required>
                    <input type="text" name="nama_pasangan" class="form-control" value="<?php echo $us->nama_pasangan; ?>" required>
                    </div>

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

                     <div class="col-md-5">
                    <div class="form-group">
                    <label>Tanggal Menikah</label>
                    <input type="date" name="tgl_nikah" class="form-control" value="<?php echo $us->tgl_nikah; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-3">
                     <div class="form-group">
                      <label>Anak Ke</label>
                      <select class="form-control" name="pasangan_ke" required>
                        <option value="<?php echo $us->pasangan_ke; ?>"><?php echo $us->pasangan_ke; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        
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
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo $us->nik; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="<?php echo $us->pekerjaan; ?>" required>
                    </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">
                      <label>Status Hidup</label>
                      <select class="form-control" name="status_hidup" required>
                        <option value="<?php echo $us->status_hidup; ?>"><?php echo $us->status_hidup; ?></option>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                      </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                      <label>Status Pernikahan</label>
                      <select class="form-control" name="status_pernikahan" required>
                        <option value="<?php echo $us->status_pernikahan; ?>"><?php echo $us->status_pernikahan; ?></option>
                        <option value="Menikah">Menikah</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                      </select>
                      </div>
                    </div>

                    <div class="col-md-5">
                      <div class="form-group">
                      <label>Tunjangan</label>
                      <select class="form-control" name="tunjangan" required>
                        <option value="<?php echo $us->tunjangan; ?>"><?php echo $us->tunjangan; ?></option>
                        <option value="Dapat Tunjangan">Dapat Tunjangan</option>
                        <option value="Tidak Dapat Tunjangan">Tidak Dapat Tunjangan</option>
                      </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                    <label>Akta Nikah</label>
                    <input type="file" name="akta_nikah" class="form-control">
                    </div>

                    <div class="col-md-6">
                    <label>Akta Cerai</label>
                    <input type="file" name="akta_cerai" class="form-control">
                    </div>

                    <div class="col-md-6">
                    <br><label>File Akta Nikah</label><br>
                   <?php
                    if ($us->akta_nikah == NULL) { ?>

                     <a class="btn btn-sm btn-danger" href="#"> Tidak Ada File <i class="fas fa-times-circle"> </a></i>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_nikah ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_nikah ?>" download> Unduh <i class="fas fa-download"> </a></i>


                   <?php } ?>

                    </div>


                    <div class="col-md-6">
                    <br><label>File Akta Cerai</label><br>
                   <?php
                    if ($us->akta_cerai == NULL) { ?>

                     <a class="btn btn-sm btn-danger" href="#"> Tidak Ada File <i class="fas fa-times-circle"> </a></i>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_cerai ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/non-pns/pasangan/' . $us->akta_cerai ?>" download> Unduh <i class="fas fa-download"> </a></i>


                   <?php } ?>

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
          foreach ($pasangan as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="detailmodal<?php echo $us->id_pasangan; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Pasangan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
               
                  <div class="row">
                    
                    
                    <div class="col-md-12">
                      
                      <div class="col-md-12">

                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->pasangan." Ke-".$us->pasangan_ke; ?>">
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->nama_pasangan; ?>">
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
                    <label for="inputName" class="col-sm-3 col-form-label">Tgl Nikah</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo date('d-M-Y', strtotime($us->tgl_nikah)); ?>">
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
                    <label for="inputName" class="col-sm-3 col-form-label">Status Hidup</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->status_hidup; ?>">
                    </div>
                    </div>


                    <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Status Nikah</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" value="<?php echo $us->status_pernikahan; ?>">
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
