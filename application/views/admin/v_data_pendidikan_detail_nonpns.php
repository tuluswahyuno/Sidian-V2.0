<title><?= $title; ?></title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
          <div class="col-sm-12">

            <ul class="nav nav-tabs">
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/Datapegawai/detail_pegawai_nonpns/').$detail->nip ?>">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/Datapegawai/detail_pendidikan_nonpns/').$detail->nip ?>">Pendidikan</a>
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
          <a>Data Pendidikan <?php echo "<strong>".$detail->nama_lengkap."</strong>" ?></a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Data Pendidikan</a>
          </button>

         
          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Jenjang</th>
              <th>Nama Kampus</th>
              <th>Jurusan</th>
              <th>Tahun Lulus</th>
              <th>Ijazah</th>
              <th>Transkrip</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($pendidikan as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->pendidikan ?></td>
                <td style="text-align: center;"><?php echo $us->nama_sekolah ?></td>
                <td style="text-align: center;"><?php echo $us->jurusan ?></td>
                <td style="text-align: center;"><?php echo $us->tgl_lulus ?></td>
                
                <td style="text-align: center;">
                   <?php
                    if ($us->ijazah == NULL) { ?>

                     <span class='badge badge-danger'>No File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/pendidikan/' . $us->ijazah ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/non-pns/pendidikan/' . $us->ijazah ?>" download> Unduh <i class="fas fa-download"> </a></i>


                   <?php } ?>

                 </td>


                 <td style="text-align: center;">
                   <?php
                    if ($us->transkrip == NULL) { ?>

                     <span class='badge badge-danger'>No File</span>

                   <?php } else { ?>

                     <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'uploads/non-pns/pendidikan/' . $us->transkrip ?>" target="_blank"> Lihat <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/non-pns/pendidikan/' . $us->transkrip ?>" download> Unduh <i class="fas fa-download"> </a></i>


                   <?php } ?>

                 </td>

                 <td style="text-align: center;">

                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_pendidikan; ?>">
                  <i class="fas fa-edit"> </i></a>
                  </a>
            
                  <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('nonpns/Pendidikan/delete_pendidikan_detail/').$us->id_pendidikan ?>"><i class="fas fa-trash"></i></a>
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
                <form method="POST" action="<?php echo base_url('nonpns/pendidikan/tambah_pendidikan_detail') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">
                    

                    <div class="form-group">
                        <label>Jenjang Pendidikan</label>
                    <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >

                        <select name="jenjang" class="select2pendidikan form-control input-lg select2-single">
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

                    <div class="form-group">
                    <label>Tanggal Lulus</label>
                    <input type="date" name="tgl_lulus" class="form-control" placeholder="Masukkan Tgl Lulus" required>
                    </div>

                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Ijazah</label>
                    <input type="file" name="ijazah" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Transkrip</label>
                    <input type="file" name="transkrip" class="form-control" required>
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
                <form method="POST" action="<?php echo base_url('nonpns/pendidikan/update_pendidikan_detail') ?>" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                       <label>Jenjang Pendidikan</label>
                       <input type="hidden" name="nip" value="<?php echo $detail->nip; ?>" >
                       <input type="hidden" name="id_pendidikan" class="form-control" value="<?php echo $us->id_pendidikan; ?>">
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


                    <div class="form-group">
                    <label>Tahun Lulus</label>
                    <input type="date" name="tgl_lulus" class="form-control" value="<?php echo $us->tgl_lulus; ?>" required>
                    </div>

                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Ijazah</label>
                    <input type="file" name="ijazah" class="form-control">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Transkrip</label>
                    <input type="file" name="transkrip" class="form-control">
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
