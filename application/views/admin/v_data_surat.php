<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Pengajuan Surat</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Pengajuan Surat</li>
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
          <a>Pengajuan Surat</a>
        </div>
        <div class="card-body">
          
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
         

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah-data">
            <i class="fas fa-plus-square"> </i> Tambah Surat</a>
          </button>

          <table class="table table-hover table-striped table-bordered" id="table1">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Nama Pemohon</th>
              <th>No Surat</th>
              <th>Tgl Surat</th>
              <th>Keperluan</th>
              <th>Status</th>
              <th style="text-align: center;">Action</th>
            </thead>


            <tbody>
              <?php 

              $no = 1;
              foreach ($surat as $us) : ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $us->nama_lengkap; ?><br>
                  <span class="badge badge-primary"><?php echo $us->nip; ?></span>
                </td>
                <td><?php echo $us->display_nosurat; ?></td>
                <td><?php echo tgl_indo(date($us->tgl_surat)); ?></td>
                <td><?php echo $us->keperluan; ?></td>
                
                <td style="text-align: center;">
                    
                  <?php $st = $us->status; if ($st == 0 ){ ?>
                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                  <?php }elseif ($st == 1 ){ ?>
                    <span class="badge badge-success">Disetujui</span>
                  <?php }else{ ?>
                    <span class="badge badge-danger">Ditolak</span>
                  <?php } ?>

                </td>
                
               <td style="text-align: center;">


                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal<?php echo $us->id_surat; ?>">
                  <i class="fas fa-edit"> </i> Edit</a>

                  <?php if ($us->status == 1 ) {
                  }else{?>

                    <a class="btn btn-sm btn-danger tombol-hapus" href="<?php echo base_url('admin/Surat/delete_data/').$us->id_surat ?>">
                    <i class="fas fa-trash"></i> Hapus</a>

                  <?php } ?>

                  

                  <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/Surat/Cetaksurat/'.$us->id_surat) ?>" target="_blank"><i class="fas fa-print"></i> Cetak Surat</a>

                </td>

              </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

         


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


<!-- TANGGAL FORMAT INDONESIA -->

<?php
    function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}?>

<!-- END TANGGAL FORMAT INDONESIA -->



  <!-- MODAL TAMBAH DATA -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="tambah-data" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Surat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Surat/tambah_surat') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="hidden" name="no_surat" class="form-control" value="<?php echo $no_surat; ?>">
                      <input type="text" name="display_nosurat" class="form-control" value="<?php echo "800 / ".$no_surat." / 05.1.2 / ".date('Y');?>" readonly>
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Keperluan</label>
                      <textarea type="text" name="keperluan" class="form-control" placeholder="Keperluan Surat" required></textarea> 
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
          foreach ($surat as $us) : $no++; ?>
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="editmodal<?php echo $us->id_surat; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/Surat/update_data') ?>" enctype="multipart/form-data">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <input type="hidden" name="id_surat" class="form-control" value="<?php echo $us->id_surat;?>" readonly>

                      <input type="text" name="display_nosurat" class="form-control" value="<?php echo $us->display_nosurat;?>" readonly>
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control" value="<?php echo $us->tgl_surat; ?>" required>
                    </div>
                    </div>

                    <div class="col-md-12">

                    <div class="form-group">
                    <label>Keperluan</label>
                      <textarea type="text" name="keperluan" class="form-control" required><?php echo $us->keperluan; ?></textarea> 
                    </div>

                    <div class="form-group">
                      <label>Status Pengajuan</label>
                      <select class="form-control" name="status" required>
                        <option value="1">Disetujui</option>
                        <option value="2">Ditolak</option>
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



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-timezone-with-data-10-year-range.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#telepon").on("input", function(){

            if($(this).val()[0] == "0"){

                    $(this).val("");
            }

            });

        });

        $(document).ready(function(){
            var d = new Date().toISOString();
            d = moment.tz(d, "Asia/Jakarta").format();
            var minDate = d.substring(0, 11) + "00:00";
            console.log(minDate);

            $(".datetimepicker").attr({
                "value" : minDate,
                "min" : minDate,
            });
        });
    </script>
    
    
    
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

