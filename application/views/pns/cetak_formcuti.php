<p style="margin-top:0pt; margin-left:238.5pt; margin-bottom:0pt; line-height:normal; font-size:9pt;"><span style="font-family:Arial;">&nbsp;</span></p>
<p style="margin-top:0pt; margin-left:261pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">Sragen, <?php echo tgl_indo(date('Y-m-d')); ?></span></p>
<p style="margin-top:0pt; margin-left:261pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">Kepada</span></p>
<p style="margin-top:0pt; margin-left:261pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">Yth. Direktur RSUD dr. Soearatno Gemolong</span></p>
<p style="margin-top:0pt; margin-left:261pt; margin-bottom:0pt; line-height:normal; font-size:12pt;">di Sragen</p>
<p style="margin-top:0pt; margin-left:274.5pt; margin-bottom:0pt; line-height:normal; font-size:10pt;"><span style="font-family:Arial;">&nbsp;</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:normal; font-size:14pt;"><span style="font-family:'Times New Roman';">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:normal; font-size:10pt;"><strong><span style="font-family:Arial;">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border:0.75pt solid #000000; border-collapse:collapse;">

    <body onload="window.print()" >

    <tbody>
        <tr>
            <td colspan="4" style="width:560.7pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:12.03pt; padding-left:14.97pt; font-family:'Times New Roman'; font-size:11pt; font-weight:bold;">DATA &nbsp;PEGAWAI</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="width:79.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Nama</span></p>
            </td>
            <td style="width:254.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;<?php echo $surat->nama_lengkap; ?></span></p>
            </td>
            <td style="width:61.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">NIP</span></p>
            </td>
            <td style="width:133.2pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;<?php echo $surat->nip; ?></span></p>
            </td>
        </tr>
        <tr>
            <td style="width:79.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Jabatan</span></p>
            </td>
            <td style="width:254.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;<?php echo $surat->nama_jabatan; ?></span></p>
            </td>
            <td style="width:61.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Masa Kerja</span></p>
            </td>
            <td style="width:133.2pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                <?php 
                  
                    $tmt = $surat->tmt;

                    if($tmt != '0000-00-00') {

                    $bday = new DateTime($tmt); // Your date of birth
                    $today = new Datetime(date('m.d.y'));
                    $diff = $today->diff($bday);
                    
                    printf("<span class='badge badge-primary'>%d Tahun, %d Bulan, %d Hari</span>", $diff->y, $diff->m, $diff->d);
                    printf("\n");
                       // echo "<hr style='margin-bottom:0;margin-top:0'><span class='badge badge-warning'>TMT : $surat->tmt</span>";
                    }else{
                        echo "TMT Belum Diisi";
                    }
                    ?>

                </span></p>
            </td>
        </tr>
        <tr>
            <td style="width:79.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Unit Kerja</span></p>
            </td>
            <td colspan="3" style="width:470.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;<?php echo $surat->nama_unitkerja; ?></span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:normal; font-size:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border:0.75pt solid #000000; border-collapse:collapse;">
    <tbody>
        <tr>
            <td colspan="4" style="width:560.7pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="2" style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:15.08pt; padding-left:11.92pt; font-family:'Times New Roman'; font-size:11pt;font-weight:bold;"><strong>JENIS CUTI YANG DIAMBIL</strong> **</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="width:209.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">Cuti Tahunan</li>
                </ol>
            </td>
            <td style="width:43.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-left:12.6pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;
                    
                        <?php 
                            $jenis = $surat->jenis_cuti; 
                            if ($jenis == '1')
                            {?>
                            (<span style="font-family:Webdings;"></span>)
                            <?php }else{}
                        ?>

                </span></p>
            </td>
            <td style="width:232.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="2" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:16.85pt; padding-left:0.25pt; font-family:'Times New Roman'; font-size:11pt;">Cuti Besar</li>
                </ol>
            </td>
            <td style="width:43.2pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-left:12.6pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php $jenis = $surat->jenis_cuti; 
                        if ($jenis == '2')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php }else{}
                     ?>

                </span></p>
            </td>
        </tr>
        <tr>
            <td style="width:209.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="3" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">Cuti Sakit</li>
                </ol>
            </td>
            <td style="width:43.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-left:12.6pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php $jenis = $surat->jenis_cuti; 
                        if ($jenis == '3')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php }else{}
                     ?>

                </span></p>
            </td>
            <td style="width:232.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="4" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:16.85pt; padding-left:0.25pt; font-family:'Times New Roman'; font-size:11pt;">Cuti Melahirkan</li>
                </ol>
            </td>
            <td style="width:43.2pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-left:12.6pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php $jenis = $surat->jenis_cuti; 
                        if ($jenis == '4')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php }else{}
                     ?>

                </span></p>
            </td>
        </tr>
        <tr>
            <td style="width:209.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="5" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">Cuti Karena Alasan Penting</li>
                </ol>
            </td>
            <td style="width:43.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-left:12.6pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php $jenis = $surat->jenis_cuti; 
                        if ($jenis == '5')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php }else{}
                     ?>

                </span></p>
            </td>
            <td style="width:232.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="6" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:16.85pt; padding-left:0.25pt; font-family:'Times New Roman'; font-size:11pt;">Cuti di Luar Tanggungan Negara</li>
                </ol>
            </td>
            <td style="width:43.2pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-left:12.6pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php $jenis = $surat->jenis_cuti; 
                        if ($jenis == '6')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php }else{}
                     ?>

                </span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border:0.75pt solid #000000; border-collapse:collapse;">
    <tbody>
        <tr>
            <td style="width:560.7pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="3" style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:20.59pt; padding-left:6.41pt; font-family:'Times New Roman'; font-size:11pt; font-weight:bold;">ALASAN CUTI</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="width:560.7pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;<?php echo $surat->keperluan; ?></span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border:0.75pt solid #000000; border-collapse:collapse;">
    <tbody>
        <tr>
            <td colspan="6" style="width:560.7pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="4" style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:19.97pt; padding-left:7.03pt; font-family:'Times New Roman'; font-size:11pt; font-weight:bold;">LAMANYA CUTI</li>
                </ol>
            </td>
        </tr>
        <tr style="height:18.4pt;">
            <td style="width:38.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Selama</span></p>
            </td>
            <td style="width:142.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span><span style="font-family:'Times New Roman';"></span><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">
                    
                <?php 
                  $date1 = $surat->tgl_mulai;
                  $date2 = $surat->tgl_selesai;
                  $days = (strtotime($date2) - strtotime($date1)) / (60 * 60 * 24);
                ?>
                <?php print $days." Hari"; ?>

                </span></p>
            </td>
            <td style="width:74.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Mulai Tanggal</span></p>
            </td>
            <td style="width:115.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; text-align:center; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;<?php echo tgl_indo(date($surat->tgl_mulai)) ?></span></p>
            </td>
            <td style="width:25.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">s/d</span></p>
            </td>
            <td style="width:110.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; text-align:center; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;<?php echo tgl_indo(date($surat->tgl_selesai)) ?></span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border:0.75pt solid #000000; border-collapse:collapse;">
    <tbody>
        <tr>
            <td colspan="5" style="width:560.7pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <ol start="5" style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:19.97pt; padding-left:7.03pt; font-family:'Times New Roman'; font-size:11pt; font-weight:bold;">CATATAN</strong><strong>&nbsp;&nbsp;</strong><strong>CUTI</strong> ***</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:187.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <ol style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">CUTI TAHUNAN</li>
                </ol>
            </td>
            <td style="width:250.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <ol start="2" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">CUTI BESAR</li>
                </ol>
            </td>
            <td style="width:101.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:52.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Tahun</span></p>
            </td>
            <td style="width: 15.4653%; border-style: solid; border-width: 0.75pt; padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle;">
                <div style="text-align: center;">Sisa</div>
            </td>
            <td style="width:56.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Keterangan</span></p>
            </td>
            <td style="width:250.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="3" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">CUTI SAKIT</li>
                </ol>
            </td>
            <td style="width:101.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:52.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">N-2</span></p>
            </td>
            <td style="width:56.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:56.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:250.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <ol start="4" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">CUTI MELAHIRKAN</li>
                </ol>
            </td>
            <td style="width:101.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:52.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">N-1</span></p>
            </td>
            <td style="width:56.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:56.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:250.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <ol start="5" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">CUTI &nbsp;KARENA ALASAN PENTING</li>
                </ol>
            </td>
            <td style="width:101.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:52.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">N</span></p>
            </td>
            <td style="width:56.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:56.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:250.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <ol start="6" style="margin:0pt; padding-left:0pt;" type="1">
                    <li style="margin-left:12.6pt; font-family:'Times New Roman'; font-size:11pt;">CUTI DI LUAR TANGGUNGAN NEGARA</li>
                </ol>
            </td>
            <td style="width:101.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border:0.75pt solid #000000; border-collapse:collapse;">
    <tbody>
        <tr>
            <td colspan="3" style="width:560.7pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="6" style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:19.97pt; padding-left:6.13pt; font-family:'Times New Roman'; font-size:11pt; font-weight:bold;">ALAMAT SELAMA MENJALANKAN CUTI</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="width:200.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Alamat Lengkap</span></p>
            </td>
            <td style="width:101.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Telpon</span></p>
            </td>
            <td rowspan="2" style="width:236.7pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">Hormat Saya,</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">(</span><u><span style="font-family:'Times New Roman';"><?php echo $surat->nama_lengkap; ?>)</span></u></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">NIP. <?php echo $surat->nip; ?></span></p>
            </td>
        </tr>
        <tr>
            <td style="width:200.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span><?php echo $surat->alamat_cuti; ?></p>
            </td>
            <td style="width:101.7pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; text-align: center; margin-bottom:0pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span><?php echo $surat->no_hp; ?></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border-collapse:collapse;">
    <tbody>
        <tr>
            <td colspan="4" style="width:560.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="7" style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:24.26pt; padding-left:1.84pt; font-family:'Times New Roman'; font-size:11pt; font-weight:bold;">PERTIMBANGAN ATASAN LANGSUNG **</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="width:74.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">DISETUJUI</span></p>
            </td>
            <td style="width:101.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">PERUBAHAN ****</span></p>
            </td>
            <td style="width:115.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">DITANGGUHKAN ****</span></p>
            </td>
            <td style="width:236.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">TIDAK DISETUJUI ****</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:74.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php 
                        $atasan_langsung = $surat->status_atasan; 
                        if ($atasan_langsung == '1')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php }else{}
                    ?>

                </span></p>
            </td>
            <td style="width:101.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                        <?php 
                            $atasan_langsung = $surat->status_atasan; 
                            if ($atasan_langsung == '2')
                            {?>
                            (<span style="font-family:Webdings;"></span>)
                            <?php echo $surat->alasan_atasan; ?>
                            <?php }else{}
                        ?>

                </span></p>
            </td>
            <td style="width:115.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-left:17.1pt; margin-bottom:0pt; text-indent:-17.1pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                        <?php 
                            $atasan_langsung = $surat->status_atasan; 
                            if ($atasan_langsung == '3')
                            {?>
                            (<span style="font-family:Webdings;"></span>)
                            <?php echo $surat->alasan_atasan; ?>
                            <?php }else{}
                        ?>

                </span></p>
            </td>
            <td style="width:236.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                        <?php 
                            $atasan_langsung = $surat->status_atasan; 
                            if ($atasan_langsung == '4')
                            {?>
                            (<span style="font-family:Webdings;"></span>)
                            <?php echo $surat->alasan_atasan; ?>
                            <?php }else{}
                        ?>

                </span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:313.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-left:17.1pt; margin-bottom:0pt; text-indent:-17.1pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:236.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">(</span><u><span style="font-family:'Times New Roman';">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.)</span></u></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">NIP &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
<table cellpadding="0" cellspacing="0" style="width:572.25pt; border-collapse:collapse;">
    <tbody>
        <tr>
            <td colspan="4" style="width:560.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <ol start="8" style="margin:0pt; padding-left:0pt;" type="I">
                    <li style="margin-left:26.1pt; font-family:'Times New Roman'; font-size:11pt; font-weight:bold;">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="width:74.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">DISETUJUI</span></p>
            </td>
            <td style="width:101.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">PERUBAHAN ****</span></p>
            </td>
            <td style="width:115.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">DITANGGUHKAN ****</span></p>
            </td>
            <td style="width:236.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">TIDAK DISETUJUI ****</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:74.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span>

                    <?php 
                        $dir = $surat->status_dir; 
                        if ($dir == '1')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php }else{}
                    ?>

                </p>
            </td>
            <td style="width:101.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php 
                        $dir = $surat->status_dir; 
                        if ($dir == '2')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php echo $surat->alasan_dir; ?>
                        <?php }else{}
                    ?>

                </span></p>
            </td>
            <td style="width:115.2pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-left:17.1pt; margin-bottom:0pt; text-indent:-17.1pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php 
                        $dir = $surat->status_dir; 
                        if ($dir == '3')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php echo $surat->alasan_dir; ?>
                        <?php }else{}
                    ?>

                </span></p>
            </td>
            <td style="width:236.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;

                    <?php 
                        $dir = $surat->status_dir; 
                        if ($dir == '4')
                        {?>
                        (<span style="font-family:Webdings;"></span>)
                        <?php echo $surat->alasan_dir; ?>
                        <?php }else{}
                    ?>

                </span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:313.2pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-left:17.1pt; margin-bottom:0pt; text-indent:-17.1pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td style="width:236.7pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">(</span><u><span style="font-family:'Times New Roman';"><?php echo $direktur->nama; ?>)</span></u></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">NIP. <?php echo $direktur->nip; ?></span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><strong><u><span style="font-family:'Times New Roman';">Catatan :</span></u></strong></p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">*</span><span style="font-family:'Times New Roman';">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';">Coret yang tidak perlu</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:16pt;"><span style="font-family:'Times New Roman'; font-size:11pt;">**</span><span style="font-family:'Times New Roman'; font-size:11pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman'; font-size:11pt;">  Pilih salah satu dengan memberi tanda centang  (</span><span style="font-family:Webdings;"></span><span style="font-family:'Times New Roman'; font-size:11pt;">&nbsp;)</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">***</span><span style="font-family:'Times New Roman';">&nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';">diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan Cuti</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">****</span><span style="font-family:'Times New Roman';">&nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';">diberi tanda centang dan alasannya,.</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">N</span><span style="font-family:'Times New Roman';">&nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';">=</span><span style="width:8.1pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Cuti tahun berjalan</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">N-1</span><span style="width:5.39pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">=</span><span style="width:7.3pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Sisa cuti 1 tahun sebelumnya</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="font-family:'Times New Roman';">N-2</span><span style="width:5.39pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">=</span><span style="width:7.3pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Sisa cuti 2 tahun sebelumnya</span></p>


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