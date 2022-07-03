<title><?= $title; ?></title>



<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="col-sm-12">

            <ul class="nav nav-tabs">
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_pegawai/').$detail->nip ?>">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_pendidikan/').$detail->nip ?>">Pendidikan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_pangkat/').$detail->nip ?>">Pangkat</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_jabatan/').$detail->nip ?>">Jabatan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/datapegawai/detail_kgb/').$detail->nip ?>">KGB</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo base_url('admin/datapegawai/detail_pasangan/').$detail->nip ?>">Pasangan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_anak/').$detail->nip ?>">Anak</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_diklat/').$detail->nip ?>">Diklat</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/datapegawai/detail_berkas/').$detail->nip ?>">Berkas</a>
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
          <a>Data Riwayat Kenaikan Gaji Berkala <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Gaji Berkala</a>
          </button>


          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Mohon <strong>diurutkan</strong> dari kgb pertama sampai dengan kbg terakhir.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Pangkat/Golongan</th>
              <th>No Surat</th>
              <!-- <th>KGB Mendatang</th> -->
              <th>Gaji Lama</th>
              <th>Gaji Baru</th>
              <th>File SK KGB</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($gajiberkala as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $us->nama_pangkat ?><br>
                  <span class="badge badge-success"><?php echo "TMT : ".date('d-M-Y', strtotime($us->tmt))  ?></span>
                </td>
                <td><?php echo $us->no_surat ?><br>
                  <span class="badge badge-primary"><?php echo "Tgl : ".date('d-M-Y', strtotime($us->tgl_surat))  ?></span>
                </td>
                <!-- <td style="text-align: center;"><?php echo date('d-M-Y', strtotime($us->kgb_mendatang))  ?></td> -->
                <td>
                  <span class="badge badge-warning">
                  <?php echo "Rp. ".number_format($us->gaji_lama) ?></td>
                  </span>
                <td>
                  <span class="badge badge-success">
                  <?php echo "Rp. ".number_format($us->gaji_baru) ?>
                  </span>
                </td>

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tidak Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/gajiberkala/' . $us->file ?>" target="_blank"> Lihat </a>

                     <!-- <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/gajiberkala/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i> -->

                   <?php } ?>
                 </td>

                 <td style="text-align: center;">
                  <!-- <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailmodal<?php echo $us->id_gajiberkala; ?>">
                  <i class="fas fa-eye"> </i> Detail</a> -->

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_gajiberkala; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>

                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('pns/gajiberkala/delete_pangkat/').$us->id_gajiberkala ?>">
                  <i class="fas fa-trash"></i> Hapus</a>
                </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

          <!-- MODAL TAMBAH DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="tambah-data" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Riwayat Gaji Berkala</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/GajiBerkala/tambah_gajiberkala') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                        <label>Pangkat Golongan</label>
                        <select name="pangkat" class="select2pangkat form-control input-lg select2-single">
                          <option value=""></option>

                        </select>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>No Surat</label>
                    <input type="text" name="no_surat" class="form-control" placeholder="Nomor SK" required>
                    </div>
                    </div>
                   

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" placeholder="Tanggal SK" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Gaji Lama</label>
                    <input type="text" name="gaji_lama" class="form-control" placeholder="Gaji Lama" required>
                    </div>
                    </div>
                   

                   <div class="col-md-6">
                    <div class="form-group">
                    <label>Gaji Baru</label>
                    <input type="text" name="gaji_baru" class="form-control" placeholder="Gaji Baru" required>
                    </div>
                    </div>


                    <div class="col-md-12">
                    <div class="form-group">
                    <label>TMT KGB</label>
                    <input type="date" name="tmt" class="form-control" required>
                    </div>
                    </div>

                    <!-- <div class="col-md-6">
                    <div class="form-group">
                    <label>KGB Akan Datang</label>
                    <input type="date" name="kgb_mendatang" class="form-control" required>
                    </div>
                    </div> -->
                    

                    <div class="col-md-12">   
                    <label>File SK (Surat Keputusan)</label>
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
          foreach ($gajiberkala as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_gajiberkala; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data KGB</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/GajiBerkala/update_gajiberkala') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Pangkat Golongan</label>
                      <input type="hidden" name="id_gajiberkala" class="form-control" value="<?php echo $us->id_gajiberkala; ?>">
                      <input type="hidden" name="nip" class="form-control" value="<?php echo $us->nip; ?>">
                      <select name="pangkat" class="select2pangkat form-control input-lg select2-single">
                      <option value="<?php echo $us->id_masterpangkat; ?>"><?php echo $us->nama_pangkat; ?></option>
                      <option value=""></option>
                      </select>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="<?php echo $us->no_surat; ?>" required>
                    </div>
                    </div>
                   

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="<?php echo $us->tgl_surat; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Gaji Lama</label>
                    <input type="text" name="gaji_lama" class="form-control" value="<?php echo $us->gaji_lama; ?>" required>
                    </div>
                    </div>
                   

                   <div class="col-md-6">
                    <div class="form-group">
                    <label>Gaji Baru</label>
                    <input type="text" name="gaji_baru" class="form-control" value="<?php echo $us->gaji_baru; ?>" required>
                    </div>
                    </div>


                    <div class="col-md-12">
                    <div class="form-group">
                    <label>TMT KGB</label>
                    <input type="date" name="tmt" class="form-control" value="<?php echo $us->tmt; ?>"required>
                    </div>
                    </div>

                    <!-- <div class="col-md-6">
                    <div class="form-group">
                    <label>KGB Akan Datang</label>
                    <input type="date" name="kgb_mendatang" class="form-control" value="<?php echo $us->kgb_mendatang; ?>"required>
                    </div>
                    </div> -->
                    

                    <div class="col-md-12">   
                    <label>File SK (Surat Keputusan)</label>
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
        foreach ($gajiberkala as $us) : $no++; ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="detailmodal<?php echo $us->id_gajiberkala; ?>" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail Data KGB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
              <form method="POST" action="#">

               <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Pangkat Golongan</label>
                      <input type="text" name="no_surat" class="form-control" value="<?php echo $us->nama_pangkat; ?>" readonly>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>No Surat</label>
                    <input type="text" name="no_surat" class="form-control" value="<?php echo $us->no_surat; ?>" readonly>
                    </div>
                    </div>
                   

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="<?php echo $us->tgl_surat; ?>" readonly>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Gaji Lama</label>
                    <input type="text" name="gaji_lama" class="form-control" value="<?php echo "Rp. ".number_format($us->gaji_lama); ?>" readonly>
                    </div>
                    </div>
                   

                   <div class="col-md-6">
                    <div class="form-group">
                    <label>Gaji Baru</label>
                    <input type="text" name="gaji_baru" class="form-control" value="<?php echo "Rp. ".number_format($us->gaji_baru); ?>" readonly>
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                    <label>TMT KGB</label>
                    <input type="date" name="tmt" class="form-control" value="<?php echo $us->tmt; ?>"readonly>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>KGB Akan Datang</label>
                    <input type="date" name="kgb_mendatang" class="form-control" value="<?php echo $us->kgb_mendatang; ?>"readonly>
                    </div>
                    </div>
                    
                    </div>   

                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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



<script src="<?= base_url('assets/js/js/jquery.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
     $(function() {
       /*const id = 0;*/
       /*const text = '-- Pilih Petugas --';*/
       const el = $('.select2pangkat');
       const select2 = el.select2({
         theme: "bootstrap",
         width: '100%',
         placeholder: '-- Pilih Pangkat --',
         ajax: {
           url: function(params) {
             return '<?= base_url('pns/Pangkat/select2pangkat') ?>';
           },
           dataType: 'json',
           delay: 250,
           data: function(params) {
             return {
               q: params.term, // search term
               page: params.page,
               limit: 10
             };
           },
           processResults: (data, params) => {
             params.page = params.page || 1
             return {
               results: data.items,
               pagination: {
                 more: params.page * data.limit < data.total_count
               }
             };
           },
           transport: function(params, success, failure) {
             const $request = $.ajax(params);

             $request.then(success);
             $request.fail(failure);

             return $request;
           },
           cache: true
         }
       });

       // parameters class option
       // view text, view id, enable view id, enable, view text
       const opt = new Option(true, true);
       el.append(opt).trigger('change');
     });
   </script>

