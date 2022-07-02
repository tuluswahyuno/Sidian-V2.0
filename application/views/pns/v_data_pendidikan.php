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
            <h2>Data Pendidikan</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pendidikan</li>
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
          <a>Data Pendidikan</a>
        </div> -->
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Pendidikan</a>
          </button>

          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Mohon <strong>diurutkan</strong> dari pendidikan awal sampai dengan pendidikan terakhir.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Jenjang</th>
              <th>Kampus / Jurusan</th>
              <th>No Ijazah</th>
              <th>File</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pendidikan as $us) : ?>

              <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $us->pendidikan ?><br>

                  <?php
                    if ($us->pterakhir == "0") { ?>

                     <span class='badge badge-warning'>Bukan Pend Terakhir</span>

                   <?php } else { ?>

                     <span class='badge badge-success'>Pendidikan Terakhir</span>


                   <?php } ?>

                </td>
                <td><?php echo $us->nama_sekolah ?><br>
                    <?php 
                      if ($us->jurusan == "-") { }else{ ?>
                        <span class="badge badge-primary"><?php echo $us->jurusan ?></span>
                  <?php } ?>
                </td>

                <td><?php echo $us->no_ijazah ?><br>
                  <span class="badge badge-info"><?php echo "Tgl Lulus : ".date('d-M-Y', strtotime($us->tgl_lulus))  ?></span>
                </td>

                <td style="text-align: center;">
                   <?php
                    if ($us->ijazah == NULL) { ?>

                     <span class='badge badge-danger'>Tidak Ada File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'uploads/pendidikan/' . $us->ijazah ?>" target="_blank"> Ijazah </a>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/pendidikan/' . $us->transkrip ?>" target="_blank"> Transkrip </a>



                   <?php } ?>

                 </td>
                 
                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_pendidikan; ?>">
                  <i class="fas fa-edit"> </i>Edit</a>
                  </a>

            
            
            <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('pns/pendidikan/delete_pendidikan/').$us->id_pendidikan ?>"><i class="fas fa-trash"></i>Hapus</a>
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
                  <h5 class="modal-title">Tambah Data Pendidikan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/pendidikan/tambah_pendidikan') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">

                    <div class="form-group">
                        <label>Jenjang Pendidikan</label>
                        <select name="jenjang" class="select2pendidikan form-control input-lg select2-single">
                        <!-- <select name="jenjang" class="form-control select2pendidikan" style="width: 100%;"> -->
                          <option value=""></option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Nama Kampus</label>
                    <input type="text" name="nama_sekolah" class="form-control" placeholder="Masukkan Nama Kampus" required>
                    </div>

                    <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" required>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>No Ijazah</label>
                    <input type="text" name="no_ijazah" class="form-control" placeholder="Masukkan No Ijazah" required>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>Tanggal Lulus</label>
                    <input type="date" name="tgl_lulus" class="form-control" placeholder="Masukkan Tgl Lulus" required>
                    </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                          <label>Pend Terakhir</label>
                          <select class="form-control" name="pterakhir" required>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                          </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Ijazah</label>
                    <input type="file" name="ijazah" class="form-control" accept=".pdf, .jpg, .jpeg, .png" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Transkrip</label>
                    <input type="file" name="transkrip" class="form-control" accept=".pdf, .jpg, .jpeg, .png" required>
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
          <!-- AKHIR MODAL TAMBAH DATA -->


          <!-- MODAL UPDATE DATA -->
          <?php 
          $no = 0;
          foreach ($pendidikan as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_pendidikan; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data Pendidikan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('pns/pendidikan/update_pendidikan') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">
                   
                    <div class="form-group">
                       <label>Jenjang Pendidikan</label>
                       <input type="hidden" name="id_pendidikan" class="form-control" value="<?php echo $us->id_pendidikan; ?>">
                       <input type="hidden" name="nip" class="form-control" value="<?php echo $us->nip; ?>">
                       <select name="jenjang" class="select2pendidikan form-control input-lg select2-single">
                        <option value="<?php echo $us->id_masterpendidikan; ?>"><?php echo $us->pendidikan; ?></option>
                         <option value=""></option>
                       </select>
                    </div>

                    <div class="form-group">
                    <label>Nama Kampus</label>
                    <input type="text" name="nama_sekolah" class="form-control" value="<?php echo $us->nama_sekolah; ?>" required>
                    </div>

                    <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $us->jurusan; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>No Ijazah</label>
                    <input type="text" name="no_ijazah" class="form-control" value="<?php echo $us->no_ijazah; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                    <label>Tanggal Lulus</label>
                    <input type="date" name="tgl_lulus" class="form-control" value="<?php echo $us->tgl_lulus; ?>" required>
                    </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                          <label>Pend Terakhir</label>
                          <select class="form-control" name="pterakhir" required>
                            <option value="<?php echo $us->pterakhir; ?>">
                                <?php
                                  if ($us->pterakhir == "0") { echo "Tidak"; } else {echo "Ya";} 
                                ?>
                              </option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                          </select>
                        </div>
                    </div>
                    

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Ijazah</label>
                    <input type="file" name="ijazah" class="form-control" accept=".pdf, .jpg, .jpeg, .png">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Transkrip</label>
                    <input type="file" name="transkrip" class="form-control" accept=".pdf, .jpg, .jpeg, .png">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js">
</script>

<script>
     $(function() {
       /*const id = 0;*/
       /*const text = '-- Pilih Petugas --';*/
       const el = $('.select2pendidikan');
       const select2 = el.select2({
         theme: "bootstrap",
         width: '100%',
         placeholder: '-- Pilih Jenjang Pendidikan --',
         ajax: {
           url: function(params) {
             return '<?= base_url('pns/Pendidikan/select2pendidikan') ?>';
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