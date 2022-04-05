<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><!-- <?= $title_pdf;?> -->Data Pegawai</title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3> Data Pegawai Non ASN RSUD dr. Soeratno Gemolong Kab. Sragen</h3>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Profesi</th>
                    <th>No Hp</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($pegawai as $row) : ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->nip; ?></td>
                      <td><?php echo $row->nama_lengkap; ?></td>
                      <td><?php echo $row->nama_jabatan; ?></td>
                      <td><?php echo $row->nama_profesi; ?></td>
                      <td><?php echo $row->no_hp; ?></td>
                  </tr>
              <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>
  <title>Data Pegawai</title>



  