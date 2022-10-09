<!DOCTYPE html>
<html>
<head>
	<title>Surat Keterangan</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td><img src="<?php echo base_url() ?>assets/template/dist/img/KOP.png" width="80" height="80"></td>
				<td>
				<center>
					<font size="4"><b>PEMERINTAH KABUPATEN SRAGEN</b></font><br>
					<font size="3"><b>RUMAH SAKIT UMUM DAERAH dr. SOERATNO GEMOLONG</b></font><br>
					<font size="2">Jl. R.Ngt Tjitrosantjoko 10 Gemolong Telp. 0271-6811839  Fax. 0271-6811439</font><br>
					<font size="2">e-mail : rsudgemolong@gmail.com Website:http://rssg.sragenkab.go.id Kode Pos 57274</font>
				</center>
				</td>
			</tr>
			<tr>
				<td><img src="<?php echo base_url() ?>assets/template/dist/img/line.png" width="100" height="10"></td>
			</tr>
		
		<table width="625">
			<tr>
				<td class="text"><font size="4"><u><b>SURAT KETERANGAN</b></u></td>
			</tr>
			<tr>
				<td class="text"><font size="3"><b>No  : 800 / <?php echo $surat->no_surat; ?> / 05.1.2 / <?php echo date('Y'); ?></b></td>
			</tr>
		</table>

		<br>
		<table width="560">
			<tr>
		       <td>
			       <font size="2">Yang bertanda tangan dibawah ini :</font>
		       </td>
		    </tr>
		</table>
	
		
		<table>
			<tr class="text2">
				<td width="180">Nama</td>
				<td width="357">: dr. KINIK DARSONO, M.Pd.Ked</td>
			</tr>
			<tr>
				<td>NIP</td>
				<td>: 19710415 200903 1 001</td>
			</tr>
			<tr>
				<td>Pangkat / Gol Ruang</td>
				<td>: Pembina (IV/a)</td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>: Direktur RSUD dr. Soeratno Gemolong</td>
			</tr>
		</table>


		<table width="560">
			<tr>
		       <td>
			       <font size="2">Dengan ini menerangkan bahwa :</font>
		       </td>
		    </tr>
		</table>

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

		<table width="560">
			<tr>
		       <td>
			     <font size="2">Adalah benar yang bersangkutan merupakan pegawai RSUD dr. Soeratno Gemolong Kab. Sragen dan surat keterangan ini digunakan sebagai salah satu syarat <?php echo $surat->keperluan; ?>.<br><br>Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.
				</font>
		       </td>
		    </tr>
		</table>

		

		<br>
		<table width="560">
			<tr>
				<td width="240"><br><br><br><br></td>
				<td class="text" align="center">Gemolong , <?php echo tgl_indo(date('Y-m-d')); ?><br>
					Direktur RSUD dr. Soeratno Gemolong<br>
					Kabupaten Sragen<br>
					<br><br><br><br><u>dr. KINIK DARSONO, M.Pd.Ked</u>
					<br>NIP. 19710415 200903 1 001</td>
			</tr>
	     </table>
	</center>

	<!-- <script type="text/javascript">
	window.print();
	</script> -->

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