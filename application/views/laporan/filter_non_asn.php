<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2><?php echo $title ?? '-'?></h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Profesi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          
         <div class="container">
      <!-- <br>
      <h3 align="center"><?php echo $title ?? '-'?></h3>
      <br> -->

    <div class="row">
      <div class="col-md-3">
        <form action="" id="FormLaporan">
          <label>Profesi</label>
          <select name="" id="profesi" class="form-control">
            <option value="0">Show All</option>
            <?php foreach ($profesi as $row) : ?>
              <option value="<?php echo $row->id_profesi ?>"><?php echo $row->nama_profesi ?></option>
            <?php endforeach ?>
          </select>
          <!-- <label>Status Pegawai</label>
          <select name="" id="status" class="form-control">
            <option value="0">Show All</option>
            <?php foreach ($status as $row) : ?>
              <option value="<?php echo $row->id_jenispegawai ?>"><?php echo $row->jpegawai ?></option>
            <?php endforeach ?>
          </select> -->
          <br>
          <button type="submit" class="btn btn-primary">Show Data</button>
          
        </form>
      </div>
      
      <div class="col-md-9">
        <div id="result"></div>
    </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script>
    $(document).ready(function(){
      $("#FormLaporan").submit(function(e){
        e.preventDefault();
        var id = $("#profesi").val();
        // console.log(id);

        var url = "<?= site_url('admin/CetakNonASN/filter/')?>" + id;
        $('#result').load(url);
      })
    });
  </script>

          


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



