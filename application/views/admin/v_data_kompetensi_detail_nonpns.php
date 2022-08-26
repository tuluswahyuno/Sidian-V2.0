<title><?= $title; ?></title>



  <title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/Datapegawai/detail_sipstr_nonpns/').$detail->nip ?>">SIP/STR</a>
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
          <a>Data SIP/STR <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>

        <div class="card-body">

          

          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>

         



          <!-- Button trigger modal -->

          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">

            <i class="fas fa-plus-square"> </i> Tambah Data Kompetensi</a>

          </button>


          <table class="table table-hover table-striped table-bordered" id="table1">

            <thead style="text-align: center;">

              <th>#</th>
              <th>Jenis</th>
              <th>Profesi</th>
              <th>Nomor</th>
              <th>Tgl Terbit</th>
              <th>Tgl Expired</th>
              <th>File</th>
              <th style="text-align: center;">Action</th>

            </thead>





            <tbody>

              <?php 



              $no = 1;

              foreach ($kompetensi as $us) : ?>



              <tr>

                <td style="text-align: center;"><?php echo $no++; ?></td>

                <td><?php echo $us->jenis_kompetensi ?></td>
                <td><?php echo $us->profesi ?></td>

                <td><?php echo $us->no_surat ?></td>


                <td style="text-align: center;"><?php echo $us->tgl_terbit ?></td>





                <td style="text-align: center;">

                  

                   <?php 

                  

                  $tmt = $us->tgl_expired;



                  if($tmt != '0000-00-00') {



                  $bday = new DateTime($tmt); // Your date of birth

                  $today = new Datetime(date('m.d.y'));

                  $diff = $bday->diff($today);

                  

                  printf("<span class='badge badge-primary'>%d Tahun, %d Bulan, %d Hari</span>", $diff->y, $diff->m, $diff->d);



                  printf("\n");



                     echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-danger'>Expired : $us->tgl_expired</span>";



                  }else{



                    echo "<span class='badge badge-success'>Tidak Ada</span>";

                  }



                  

                   ?>

                </td>







                <td style="text-align: center;">

                   <?php

                    if ($us->file == NULL) { ?>



                     <span class='badge badge-danger'>No File</span>



                   <?php } else { ?>



                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/kompetensi/' . $us->file ?>" target="_blank"> Lihat </a>



                   <?php } ?>



                 </td>



                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_kompetensi; ?>">

                  <i class="fas fa-edit"> </i> Edit</a>

                  </a>

            

                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('nonpns/Kompetensi/delete_data_detail/').$us->id_kompetensi ?>"><i class="fas fa-trash"></i> Hapus</a>

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

                  <h5 class="modal-title">Tambah Data Kompetensi</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>

                </div>



                <div class="modal-body">

                <form method="POST" action="<?php echo base_url('nonpns/Kompetensi/tambah_kompetensi_detail') ?>" enctype="multipart/form-data">



                    <div class="row">

                    



                     <div class="col-sm-6">
                         <div class="form-group">
                          <label>Jenis Kompetensi</label>
                          <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                          <select class="form-control" name="jenis_kompetensi" required>
                            <option value="STR">STR</option>
                            <option value="SIP">SIP</option>
                            
                          </select>
                          </div>
                      </div>


                       <div class="col-sm-6">
                         <div class="form-group">
                          <label>Profesi</label>
                          <select class="form-control" name="profesi" required>
                            <option value="Dokter">Dokter</option>
                            <option value="Perawat">Perawat</option>
                            <option value="Bidan">Bidan</option>
                            <option value="Apoteker">Apoteker</option>
                            <option value="Asisten Apoteker">Asisten Apoteker</option>
                            <option value="Sanitarian">Sanitarian</option>
                            <option value="Elektromedis">Elektromedis</option>
                            <option value="Radiologi">Radiologi</option>
                            <option value="Fisioterapi">Fisioterapi</option>
                            <option value="Analis Kesehatan">Analis Kesehatan</option>
                          </select>
                          </div>
                      </div>


                    <div class="col-md-12">
                    <div class="form-group">

                    <label>Nomor Surat</label>

                    <input type="text" name="no_surat" class="form-control" placeholder="Masukkan Nomor Surat" >

                    </div>



                    </div>




                    <div class="col-md-6">

                    <div class="form-group">

                    <label>Tanggal Terbit</label>

                    <input type="date" name="tgl_terbit" class="form-control">

                    </div>

                    </div>



                    <div class="col-md-6">

                    <div class="form-group">

                    <label>Tanggal Expired</label>

                    <input type="date" name="tgl_expired" class="form-control">

                    </div>

                    </div>


                    <div class="col-md-12">

                    <label>File</label>

                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png" required>

                    </div>





                    <div class="col-md-12">

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

          foreach ($kompetensi as $us) : $no++; ?>

          <div aria-hidden="true" tabindex="-1" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_kompetensi; ?>" class="modal fade">

            <div class="modal-dialog" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title">Update Data Kompetensi</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>

                </div>



                <div class="modal-body">

                <form method="POST" action="<?php echo base_url('nonpns/Kompetensi/update_data_detail') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-sm-6">
                    <div class="form-group">

                    <label>Jenis Kompetensi</label>

                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                    <input type="hidden" name="id_kompetensi" class="form-control" value="<?php echo $us->id_kompetensi; ?>" required>

                    <select class="form-control" name="jenis_kompetensi" required>
                            <option value="<?php echo $us->jenis_kompetensi; ?>"><?php echo $us->jenis_kompetensi; ?></option>
                            <option value="STR">STR</option>
                            <option value="SIP">SIP</option>
                            
                          </select>
                    </div>
                    </div>


                    <div class="col-sm-6">
                         <div class="form-group">
                          <label>Profesi</label>
                          <select class="form-control" name="profesi" required>
                            <option value="<?php echo $us->profesi; ?>"><?php echo $us->profesi; ?></option>
                            <option value="Dokter">Dokter</option>
                            <option value="Perawat">Perawat</option>
                            <option value="Bidan">Bidan</option>
                            <option value="Apoteker">Apoteker</option>
                            <option value="Asisten Apoteker">Asisten Apoteker</option>
                            <option value="Sanitarian">Sanitarian</option>
                            <option value="Elektromedis">Elektromedis</option>
                            <option value="Radiologi">Radiologi</option>
                            <option value="Fisioterapi">Fisioterapi</option>
                            <option value="Analis Kesehatan">Analis Kesehatan</option>
                          </select>
                          </div>
                    </div>


                    <div class="col-md-12">
                    <div class="form-group">

                    <label>No Surat</label>

                    <input type="text" name="no_surat" class="form-control" value="<?php echo $us->no_surat; ?>" >

                    </div>
                    </div>

                    



                    <div class="col-md-6">

                    <div class="form-group">

                    <label>Tanggal Terbit</label>

                    <input type="date" name="tgl_terbit" class="form-control" value="<?php echo $us->tgl_terbit; ?>" >

                    </div>

                    </div>



                    <div class="col-md-6">

                    <div class="form-group">

                    <label>Tanggal Expired</label>

                    <input type="date" name="tgl_expired" class="form-control" value="<?php echo $us->tgl_expired; ?>" >

                    </div>

                    </div>

                

                    <div class="col-md-12">

                    <label>File</label>

                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png">

                    </div>





                    <div class="col-md-12">

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

