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
            <h2>Data User</h2>
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
          <a>Manajemen Data User</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Pegawai</a>
          </button>


          <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#import-data">
            <i class="fas fa-solid fa-file-import"></i> Import Data</a>
          </button>


          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Pegawai</th>
              <th>Email</th>
              <th style="text-align: center;">Hak Akses</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($user as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nama_lengkap ?><br>
                  <span class="badge badge-success"><?php echo $us->nip ?></span>
                </td>
                <td><?php echo $us->email ?></td>
                <td style="text-align: center;">
                  <?php 
                      if($us->role == '1'){
                          echo "<span class='badge badge-warning'>Administrator Sistem</span>";
                      }elseif($us->role == '2'){
                          echo "<span class='badge badge-success'>Aparatur Sipil Negara</span>";
                      }elseif($us->role == '3'){
                          echo "<span class='badge badge-primary'>Non Aparatur Sipil Negara</span>";
                      }
                  ?></td>

                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_user; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>
                  </a>

                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/User/delete_user/').$us->id_user ?>"><i class="fas fa-trash"></i> Hapus</a>
                
                </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

          <!-- MODAL TAMBAH DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="tambah-data" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/User/tambah_user') ?>">

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="hidden" name="id_user" >
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Pegawai" required>
                    </div>

                    <div class="form-group">
                    <label>NIP (PNS) / NIK (Non PNS)</label>
                    <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                    </div>

                    <div class="form-group">
                          <label>Status Pegawai</label>
                          <select class="form-control" name="status_pegawai" required>
                            <?php foreach($jenispegawai as $jp) : ?>
                            <option value="<?php echo $jp->id_jenispegawai;?>"> <?php echo $jp->jpegawai; ?></option>
                           <?php endforeach; ?>
                            </select>
                    </div>

                    <!-- <div class="form-group">
                        <label>Pangkat</label>
                        <select name="pangkat" class="select2pangkat form-control input-lg select2-single">
                          <option value="<?php echo $detail->id_masterpangkat; ?>"><?php echo $detail->nama_pangkat; ?></option>
                          <option value=""></option>
                        </select>
                      </div> -->

                    <!-- <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="select2jabatan form-control input-lg select2-single">
                          <option value=""></option>
                        </select>
                    </div> -->

                    
                    </div>

                    <div class="col-md-6">

                        

                    <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>


                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <div class="form-group">
                    <label>Hak Akses</label>
                    <select class="form-control" name="role" required>
                      <option value="">--Pilih Hak akses--</option>
                      <option value="1">Administrator</option>
                      <option value="2">Aparatur Sipil Negara</option>
                      <option value="3">Non Aparatur Sipil Negara</option>
                    </select>

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
          foreach ($user as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editmodal<?php echo $us->id_user; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/User/update_user') ?>">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="hidden" name="id_user" value="<?php echo $us->id_user; ?>" >
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $us->nama_lengkap; ?>" readonly>
                    </div>

                    <div class="form-group">
                    <label>NIP </label>
                    <input type="text" name="nip" class="form-control" value="<?php echo $us->nip; ?>" readonly>
                    </div>

                    <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $us->email; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>Hak Akses</label>
                    <select class="form-control" name="role" required>
                      <option value="<?php echo $us->role; ?>">
                      <?php 
                        if($us->role == '1'){
                          echo "Administrator";
                        }elseif($us->role == '2'){
                          echo "Pegawai Negeri Sipil";
                        }elseif($us->role == '3'){
                          echo "Non Pegawai Negeri Sipil";
                        }
                        ?>
                     </option>
                      <!-- <option value="0">Pegawai</option> -->
                      <option value="1">Administrator</option>
                      <option value="2">Pegawai Negeri Sipil</option>
                      <option value="3">Non Pegawai Negeri Sipil</option>
                    </select>
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



          <!-- MODAL IMPORT DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" id="import-data" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Import Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <form method="POST" action="<?= site_url('admin/user/excel') ?>" enctype="multipart/form-data">
                       
                      <div class="col-md-12">


                      <label class="col-form-label text-md-left">Upload File</label> 
                          <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                          <div class="mt-1">
                              <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                          </div>
                          <?= form_error('file','<div class="text-danger">','</div>') ?>

                          <?php { ?>
                                       
                        </div>

                        <div class="col-md-12">

                            <label class="col-form-label text-md-left">Format File</label> 
                        <button class="btn btn-success btn-sm" type="submit" onclick="window.open('<?php echo base_url() . 'uploads/Template_import.xlsx' ?>')">Download Excel</button>

                       <?php } ?>
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
          <!-- AKHIR IMPORT DATA -->


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
       // const text = '-- Pilih Pangkat --';
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



     $(function() {
       // const id = 0;
       // const text = '-- Pilih Pangkat --';
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