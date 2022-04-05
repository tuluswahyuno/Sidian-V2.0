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
            <h2>Mutasi Ruang Pegawai</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Mutasi</li>
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
          <a>Data Mutasi Pegawai</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Mutasi</a>
          </button>

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Asal</th>
              <th>Sekarang</th>
              <th>TMT</th>
              <th>File SK</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($mutasi as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td ><?php echo $us->nip ?></td>
                <td ><?php echo $us->nama_lengkap ?></td>
                <td style="text-align: center;"><?php echo $us->asal ?></td>
                <!-- <td ><?php echo $us->nama_unitkerja ?></td> -->

                <td style="text-align: center;">
                <a class="btn btn-sm btn-warning" href="#"> <?php echo $us->nama_unitkerja ?></a>
                </td>

                <td ><?php echo date('d-M-Y', strtotime($us->tmt_mutasi))  ?></td>

                <!-- <td ><?php echo $us->file ?></td> -->

                <td style="text-align: center;">
                   <?php
                    if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tida Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/mutasi/' . $us->file ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/mutasi/' . $us->file ?>" download> Unduh <i class="fas fa-download"> </a></i>

                   <?php } ?>

                 </td>

                <td>
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_mutasi; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/Mutasi/delete_data/').$us->id_mutasi ?>"><i class="fas fa-trash"></i> Hapus</a>
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
                  <h5 class="modal-title">Tambah Data Mutasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Mutasi/tambah_data') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label>NIP</label>
                    <select name="nip" class="select2nip form-control input-lg select2-single" required>
                          <option value=""></option>
                    </select>
                    </div>

                    <!-- <div class="form-group">
                        <label>Nama Pegawai</label>
                        <select name="nama" class="select2pegawai form-control input-lg select2-single">
                          <option value=""></option>
                        </select>
                    </div> -->
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Asal Ruang</label>
                        <select name="asal" class="select2unitkerja form-control input-lg select2-single" required>
                          <option value=""></option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Ruang Sekarang</label>
                        <select name="tujuan" class="select2unitkerjatujuan form-control input-lg select2-single" required>
                          <option value=""></option>
                        </select>
                    </div>
                    </div>


                    <div class="col-md-7">
                    <div class="form-group">
                    <label>Nomor SK</label>
                    <input type="text" name="no_surat" class="form-control" placeholder="Masukkan No SK" required>
                    </div>
                    </div>


                    <div class="col-md-5">
                    <div class="form-group">
                    <label>TMT</label>
                    <input type="date" name="tmt" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                    <label>File Surat Keputusan (SK)</label>
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
          foreach ($mutasi as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_mutasi; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Pangkat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Mutasi/update_data') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">
                    
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="hidden" name="id_mutasi" value="<?php echo $us->id_mutasi; ?>" >
                        <select name="nip" class="select2nip form-control input-lg select2-single" required>
                          <option value="<?php echo $us->nip; ?>"><?php echo $us->nip; ?></option>
                          <option value=""></option>
                        </select>
                    </div>

                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Asal Ruang</label>
                        <select name="asal" class="select2unitkerja form-control input-lg select2-single" required>
                          <option value="<?php echo $us->asal; ?>"><?php echo $us->asal; ?></option>
                          <option value=""></option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Ruang Sekarang</label>
                        <select name="tujuan" class="select2unitkerjatujuan form-control input-lg select2-single" required>
                          <option value="<?php echo $us->id_unitkerja; ?>"><?php echo $us->nama_unitkerja; ?></option>
                          <option value=""></option>
                        </select>
                    </div>
                    </div>


                    <div class="col-md-7">
                    <div class="form-group">
                    <label>Nomor SK</label>
                    <input type="text" name="no_surat" class="form-control" value="<?php echo $us->no_surat; ?>" required>
                    </div>
                    </div>


                    <div class="col-md-5">
                    <div class="form-group">
                    <label>TMT</label>
                    <input type="date" name="tmt" class="form-control" value="<?php echo $us->tmt_mutasi; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-9">
                    <div class="form-group">
                    <label>File Surat Keputusan (SK)</label>
                    <input type="file" name="file" class="form-control" accept=".pdf, .jpg, .jpeg, .png">
                    </div>
                    </div>

                    <div class="col-md-3">


                    <div class="form-group">
                    <label>Lihat File</label><br>
                    <?php
                      if ($us->file == NULL) { ?>

                     <span class='badge badge-danger'>Tida Ada File</span>

                       <?php } else { ?>

                         <a class="btn btn-primary" href="<?php echo base_url() . 'uploads/mutasi/' . $us->file ?>" target="_blank"> Lihat File</a>

                       <?php } ?>
                        </div>

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
       const el = $('.select2unitkerja');
       const select2 = el.select2({
         theme: "bootstrap",
         width: '100%',
         placeholder: '-- Pilih Unit Kerja --',
         ajax: {
           url: function(params) {
             return '<?= base_url('admin/Mutasi/select2unitkerja') ?>';
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
       const el = $('.select2unitkerjatujuan');
       const select2 = el.select2({
         theme: "bootstrap",
         width: '100%',
         placeholder: '-- Pilih Unit Kerja --',
         ajax: {
           url: function(params) {
             return '<?= base_url('admin/Mutasi/select2unitkerjatujuan') ?>';
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
       const el = $('.select2pegawai');
       const select2 = el.select2({
         theme: "bootstrap",
         width: '100%',
         placeholder: '-- Pilih Pegawai --',
         ajax: {
           url: function(params) {
             return '<?= base_url('admin/User/select2pegawai') ?>';
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
       const el = $('.select2nip');
       const select2 = el.select2({
         theme: "bootstrap",
         width: '100%',
         placeholder: '-- Pilih NIP --',
         ajax: {
           url: function(params) {
             return '<?= base_url('admin/Datapegawai/select2nip') ?>';
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