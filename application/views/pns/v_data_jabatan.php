<title><?= $title; ?></title>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Riwayat Jabatan</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riwayat Jabatan</li>
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
          <a>Riwayat jabatan Golongan</a>
        </div> -->
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Jabatan</a>
          </button>

          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Mohon <strong>diurutkan</strong> dari jabatan pertama sampai dengan jabatan terakhir.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Jabatan</th>
              <th>No SK</th>
              <th>Kelas</th>
              <th>TMT</th>
              <th>File SK</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($jabatan as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nama_jabatan ?><br>
                  <span class="badge badge-success"><?php echo $us->jenis_jabatan ?></span>
                </td>


                <td><?php echo $us->no_surat ?><br>
                  <span class="badge badge-primary"><?php echo "Tgl SK : ".date('d-M-Y', strtotime($us->tgl_surat))  ?></span>
                </td>
              
                <!-- <td style="text-align: center;"><span class="badge badge-warning"><?php echo "Kelas ".$us->kelas_jabatan ?></span></td> -->

                <td style="text-align: center;">
                <a class="badge badge-warning" href="#"> <?php echo "Kelas ".$us->kelas_jabatan ?></a>
                </td>

                <td style="text-align: center;"><?php echo date('d-M-Y', strtotime($us->tmt_jabatan))  ?></td>


                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <a class="btn btn-sm btn-danger" href="#"> Tidak Ada File <i class="fas fa-times-circle"> </a></i>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/jabatan/' . $us->file ?>" target="_blank"> Lihat </a>

                     <!-- <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/jabatan/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i> -->


                   <?php } ?>

                 </td>
                
                

                 <td style="text-align: center;">

                  
                  <!-- <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailmodal<?php echo $us->id_jabatan; ?>">
                  <i class="fas fa-eye"> </i> Detail</a> -->

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_jabatan; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>

                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('pns/jabatan/delete_jabatan/').$us->id_jabatan ?>">
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
                  <h5 class="modal-title">Tambah Data Jabatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/jabatan/tambah_jabatan') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="select2jabatan form-control input-lg select2-single">
                          <option value=""></option>
                        </select>
                    </div>

                    </div>

                    <div class="col-md-8">

                    <div class="form-group">
                          <label>Jenis Jabatan</label>
                          <select class="form-control" name="jenis_jabatan" required>
                          <option value="Fungsional Tertentu">Fungsional Tertentu</option>
                          <option value="Fungsional Umum">Fungsional Umum</option>
                          <option value="Struktural">Struktural</option>
                        </select>
                      </div>
                    
                    </div>

                    <div class="col-md-4">

                    <div class="form-group">
                    <label>Kelas Jabatan</label>
                    <input type="text" name="kelas_jabatan" class="form-control" placeholder="Kelas Jabatan" required>
                    </div>
                    </div>

                    <div class="col-md-12">
                    
                    <div class="form-group">
                    <label>No Surat Keputusan</label>
                    <input type="text" name="no_surat" class="form-control" placeholder="Masukkan Nomor SK" required>
                    </div>

                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat Keputusan</label>
                    <input type="date" name="tgl_surat" class="form-control" placeholder="Masukkan Tanggal SK" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>TMT Jabatan</label>
                    <input type="date" name="tmt_jabatan" class="form-control" placeholder="Masukkan TMT jabatan" required>
                    </div>
                     </div>

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
          foreach ($jabatan as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_jabatan; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Jabatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/jabatan/update_jabatan') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">


                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $us->id_jabatan; ?>">
                        <input type="hidden" name="nip" class="form-control" value="<?php echo $us->nip; ?>">
                        <select name="jabatan" class="select2jabatan form-control input-lg select2-single">
                          <option value="<?php echo $us->id_jabatan; ?>"><?php echo $us->nama_jabatan; ?></option>
                          <option value=""></option>
                        </select>
                    </div>

                    </div>

                    
                   <div class="col-md-8"> 

                  <div class="form-group">
                      <label>Jenis Jabatan</label>
                      <select class="form-control" name="jenis_jabatan" required>
                      <option value="<?php echo $us->jenis_jabatan; ?>"><?php echo $us->jenis_jabatan; ?></option>
                      <option value="Fungsional Tertentu">Fungsional Tertentu</option>
                      <option value="Fungsional Umum">Fungsional Umum</option>
                      <option value="Struktural">Struktural</option>
                    </select>
                  </div>
                      
                    </div>


                    <div class="col-md-4">

                    <div class="form-group">
                    <label>Kelas Jabatan</label>
                    <input type="text" name="kelas_jabatan" class="form-control" value="<?php echo $us->kelas_jabatan ?>" required>
                    </div>
                    </div>

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>No Surat Keputusan</label>
                    <input type="text" name="no_surat" class="form-control" value="<?php echo $us->no_surat; ?>" >
                    </div>

                    
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat Keputusan</label>
                    <input type="date" name="tgl_surat" class="form-control" value="<?php echo $us->tgl_surat; ?>" >
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>TMT Jabatan</label>
                    <input type="date" name="tmt_jabatan" class="form-control" value="<?php echo $us->tmt_jabatan; ?>" >
                    </div>
                     </div>


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
          foreach ($jabatan as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="detailmodal<?php echo $us->id_jabatan; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Jabatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/jabatan/update_jabatan') ?>">

                    <div class="row">
                    <div class="col-md-12">


                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="id_jabatan" class="form-control" value="<?php echo $us->nama_jabatan; ?>" readonly>
                    </div>

                    </div>

                    <div class="col-md-8">

                      <div class="form-group">
                          <label>Jenis Jabatan</label>
                          <input type="text" name="jenis_jabatan" class="form-control" value="<?php echo $us->jenis_jabatan; ?>" readonly>
                      </div>
                    
                    </div>


                    <div class="col-md-4">

                      <div class="form-group">
                          <label>Kelas Jabatan</label>
                          <input type="text" name="kelas_jabatan" class="form-control" value="<?php echo $us->kelas_jabatan; ?>" readonly>
                      </div>
                    
                    </div>

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>No Surat Keputusan</label>
                    <input type="text" name="no_surat" class="form-control" value="<?php echo $us->no_surat; ?>" readonly>
                    </div>

                    
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat Keputusan</label>
                    <input type="date" name="tgl_surat" class="form-control" value="<?php echo $us->tgl_surat; ?>" readonly>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>TMT Jabatan</label>
                    <input type="date" name="tmt_jabatan" class="form-control" value="<?php echo $us->tmt_jabatan; ?>" readonly>
                    </div>
                     </div>

                    </div>

                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
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
       // const id = 0;
       // const text = '-- Pilih jabatan --';
       const el = $('.select2jabatan');
       const select2 = el.select2({
         theme: "bootstrap",
         width: '100%',
         placeholder: '-- Pilih Jabatan --',
         ajax: {
           url: function(params) {
             return '<?= base_url('admin/Jabatan/select2jabatan') ?>';
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

