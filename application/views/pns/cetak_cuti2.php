<!DOCTYPE html>
<html>
<style type="text/css">
    div {
      text-align: justify;
      text-justify: inter-word;
    }
    body{
        margin: 0.5cm 1cm 1cm 2.5cm!important;
    }
    h6{
        font-size: 14pt!important;
    }
    h5{
        font-size: 15pt!important;
    }
    .table1 {
        background: #fff;
        padding: 5px;
        border-collapse: collapse;
    }
    .table1 tr, .table1 td, .table1 th {
        border: table-cell;
        border: 1px  solid #444;
    }
    th{
        height: 30px;
        vertical-align: middle!important;
    }
    tr,td{
        vertical-align: top!important;
    }
    #right {
        border-right: none !important;
    }
    #left {
        border-left: none !important;
    }
    .disp {
        text-align: center;
        margin-bottom: .5rem;
    }
    .judul {
        font-size: 16pt;
        font-weight: bold;
    }
    .logodisp {
        width: 120px;
        height: 150px;
        
        position: absolute;
        left: 0px;
        top: 25px;
        z-index: -1;
    }
    #lead {
        width: auto;
        position: relative;
        margin: 15px 0px 0px 75%;
    }
    .lead {
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: -10px;
    }
    .tgh {
        text-align: center;
    }
    .rata {
        text-align: justify;
    }
    .lt{
        text-align: left;
    }
    .rgt{
        text-align: right;
    }
    #nama {
        font-size: 2.1rem;
        margin-bottom: -1rem;
    }
    #alamat {
        font-size: 16pt;
    }
    .up {
        
        margin: 0px;
        line-height: 1.7rem;
        font-size: 1.5rem;
    }
    .status {
        margin: 0;
        font-size: 1.3rem;
        margin-bottom: .1rem;
    }
    .separator {
        border-bottom: 2px solid #616161;
        margin: -1.3rem 0 1.5rem;
    }
    @media print{
        body {
            margin: 0.5cm 1cm 1cm 2.0cm!important;
            background-color: yellow;
            font-family:Times New Roman;
            font-size: 14pt;
        }

        #colres {
            
        }
        h6{
           font-size: 14pt!important;
       }
       h5{
           font-size: 15pt!important;
       }
       nav {
        display: none;
    }
    .table1 {
        font-size: 12pt!important;
        color: #212121;
        width: 100%;
    }
    .table1 thead{
        text-align: center;
    }
    th{
        height: 30px!important;
        vertical-align: middle!important;
    }
    tr,td{
        vertical-align: top!important;
    }
    .table1 tr, .table1 td , .table1 th{
        height: 20px;
        border: table-cell;
        border: 1px  solid #444;
        padding: 2px!important;

    }
    #prn{
        min-width: 100pt!important;
    }
    table{
        font-size: 14pt;
    }
    .ttd{
        text-align: center;
    }
    .tgh {
        text-align: center;
    }
    .rata {
        text-align: justify;
    }
    .disp {
        text-align: center;
        margin-left: 80px;

    }
    .logodisp {

        position: absolute;
        left: 2.0cm;
        top: 25px;
        z-index: -1;

        width: 80px;
        height: 110px;

    }
    #surat {
        width: auto;
        position: relative;

    }
    #lead {
        width: auto;
        position: relative;

    }
    .lead {
        font-weight: bold;
        text-decoration: underline;

    }
    #nama {
        font-weight: bold;

    }
    .up {
        font-weight: bold;
    }
    .status {
        font-size: 14pt!important;
        font-weight: normal;

    }
    #alamat {
        font-size: 11pt;
    }
    #lbr {
        font-size: 17px;
        font-weight: bold;
    }
    .judul {
        font-size: 16pt;
        font-weight: bold;
        margin-bottom: 0px;
    }
    .separator {
        border-bottom: 5px solid #616161;
    }

}
</style><html>
<head>
	<title>Surat Keterangan</title>
</head>


        <body onload="window.print()" >

        <!-- Container START -->
            <div id="colres" >
            <div class="disp" ><img class="logodisp" src="<?php echo base_url() ?>assets/template/dist/img/kab.jpg"/><h6 class="up">P E M E R I N T A H  &ensp;K A B U P A T E N  &ensp;S R A G E N </h6>
            
            <h5 class="up" id="nama">RUMAH SAKIT UMUM DAERAH dr. SOERATNO GEMOLONG </h5>
            
            <br/><h6 class="status">Jl. R.Ngt Tjitrosantjoko 10 Gemolong Telp. 0271-6811839  Fax. 0271-6811439</h6><span id="alamat">Website: https://rsudgemolong.sragenkab.go.id E-mail: <u><a href="">rsudgemolong@gmail.com</a></u> Kode Pos: 57274</span>
                
                </div><div class="line-separator" style="height:5px;
                    background:#717171;
                    border-bottom:1px solid #313030;"></div>
                                   <div class="line-separator" style="height:1.5px;
                    background:#717171;
                    border-bottom:5px solid #313030;"></div>

                <center><p></p>
				
                <u><p class="judul">SURAT KETERANGAN</p></u>
				<p class="judul">No  : 800 / <?php echo $surat->no_surat; ?> / 05.1.2 / <?php echo date('Y'); ?></p>

                </center>

                <p style="text-indent: 0cm";>Yang bertanda tangan dibawah ini :
				
            <table>
            <tr>
                <td width="180">Nama</td>
                <td width="357">: dr. KINIK DARSONO, M.Pd.Ked</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: 19710415 200903 1 001</td>
            </tr>
            <tr>
                <td>Pangkat / Gol Ruang</td>
                <td>: Pembina / IVa</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Direktur RSUD dr. Soeratno Gemolong</td>
            </tr>
            </table>

            <p style='text-indent: 0cm;'>Dengan ini menerangkan bahwa :</p>

            <table>
            <tr class="text2">
                <td width="180">Nama</td>
                <td width="357">: <?php echo $surat->nama_lengkap; ?></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: <?php echo $surat->nip; ?></td>
            </tr>
            <tr>
                <td>Pangkat / Gol Ruang</td>
                <td>: <?php echo $surat->nama_pangkat; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: <?php echo $surat->nama_jabatan; ?></td>
            </tr>
            </table>

            <p></p>
            <div>Adalah benar yang bersangkutan merupakan pegawai RSUD dr. Soeratno Gemolong Kab. Sragen dan surat keterangan ini digunakan sebagai salah satu syarat <?php echo $surat->keperluan; ?>.<br><br>Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.<div>
            
            <br>
            <br>
				
           
			<table class="ttd" align="right"><tr><td>Gemolong , <?php echo tgl_indo(date('Y-m-d')); ?></td></tr><tr><td>Direktur RSUD dr. Soeratno Gemolong<br />
Kabupaten Sragen<br />
 <br> <br> <br> <br> </td></tr><tr><td><u>dr. KINIK DARSONO M.Pd.Ked</u><br>Pembina<br> NIP. 19710415 200903 1 001</td><td></td></tr></table> </div>
			<div style="height: 200px;"></div>
			<!-- <p > TEMBUSAN : </P>
			<p> Yth. Bupati Sragen (Sebagai laporan)</p> -->
        </div>
        <div class="jarak2"></div>
    <!-- Container END -->

    </body>
</html>


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