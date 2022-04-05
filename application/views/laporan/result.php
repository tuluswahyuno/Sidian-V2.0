<table class="table table-striped">
	<tr>
		<th>#</th>
		<th>NIP</th>
        <th>Nama</th>
        <th>Pangkat</th>
        <th>Jabatan</th>
        <th>Profesi</th>
        <th>No Hp</th>
	</tr>

	<?php $no=1; foreach ($pegawai as $row) : ?>
		<tr>
			<td><?php echo $no++; ?></td>
            <td><?php echo $row->nip; ?></td>
            <td><?php echo $row->nama_lengkap; ?></td>
            <td><?php echo $row->nama_pangkat; ?></td>
            <td><?php echo $row->nama_jabatan; ?></td>
            <td><?php echo $row->nama_profesi; ?></td>
            <td><?php echo $row->no_hp; ?></td>

		</tr>
	<?php endforeach ?>
</table>


<a href="<?= site_url('admin/Cetak/print/'.$profesi) ?>" target="_blank" class="btn btn-danger">Cetak Data Pegawai</a>


