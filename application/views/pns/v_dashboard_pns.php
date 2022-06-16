<title><?= $title; ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemutakhiran Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
<div class="card-header">
<h3 class="card-title">
<i class="ion ion-clipboard mr-1"></i>
Pemberitahuan !
</h3>
<div class="card-tools">

</div>
</div>

<div class="card-body">
<ul class="todo-list" data-widget="todo-list">
<li>

<span class="handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>

<div class="icheck-primary d-inline ml-2">
<input type="checkbox" value="" name="todo1" id="todoCheck1">
<label for="todoCheck1"></label>
</div>

<span class="text">Design a nice theme</span>

<small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>

<div class="tools">
<i class="fas fa-edit"></i>
<i class="fas fa-trash-o"></i>
</div>
</li>

</ul>
</div>


</div>


        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-blue">Pemutakhiran Data</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                  <h3 class="timeline-header"><a href="#">Data yang perlu disiapkan untuk pemutrakhiran data pada SI DIAN (Sistem Digitalisasi Arsip Kepegawaian)</a></h3>

                  <div class="timeline-body">
                    1. Data Pribadi 
                    <br>2. Data Pendidikan
                    <br>3. Data Pangkat/Golongan
                    <br>4. Data Jabatan
                    <br>5. Data Keluarga
                    <br>6. Data Diklat
                    <br>7. Berkas Pendukung
                  </div>
                  <!-- <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                  </div> -->
                </div>
              </div>
              
              <div class="time-label">
                <span class="bg-green">Kenaikan Pangkat</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-address-card bg-green"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#">Berkas yang perlu disiapkan untuk Kenaikan Pangkat (KP)</a> </h3>
                  <div class="timeline-body">
                    1. SK KP terakhir 
                    <br>2. SK JabFung
                    <br>3. PAK terakhir
                    <br>4. Ijazah
                    <br>5. Transkip
                    <br>6. Suket (ijin sekolah/ijin gelar/disiplin kerja dll)
                    <br>7. SKP 2 th terakhir
                  </div>
                </div>
              </div>


              <div class="time-label">
                <span class="bg-primary">Kenaikan Gaji Berkala</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-address-card bg-primary"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#">Berkas yang perlu disiapkan untuk Kenaikan Gaji Berkala (KGB)</a> </h3>
                  <div class="timeline-body">
                    1. SK Jabatan 
                    <br>2. SK Pangkat Terakhir
                    <br>3. SK KGB Terakhir
                    <br>4. SKP 1 th terakhir
                    <br>5. FIP 01 Simpeg
                    <br>6. FIP 02 Simpeg
                  </div>
                </div>
              </div>


              <div class="time-label">
                <span class="bg-red">Tutorial Penggunaan</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-file-pdf bg-red"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#">Manual Book Penggunaan Sistem</a> </h3>
                  <div class="timeline-body">
                    Manual Book penggunaan sistem bisa didownload disini . .
                    
                    <?php { ?>

                      <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'uploads/Manual Book SI DIAN.pdf' ?>" target="_blank"> Baca Panduan <i class="fas fa-eye"> </a></i>

                     <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'uploads/Manual Book SI DIAN.pdf' ?>" download> Download <i class="fas fa-download"> </a></i>


                   <?php } ?>

                   
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
      </section>

