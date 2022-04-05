-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table sidian.bankdata
CREATE TABLE IF NOT EXISTS `bankdata` (
  `id_bankdata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(220) NOT NULL,
  `file` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bankdata`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sidian.bankdata: ~2 rows (approximately)
/*!40000 ALTER TABLE `bankdata` DISABLE KEYS */;
INSERT IGNORE INTO `bankdata` (`id_bankdata`, `nama_file`, `file`, `create_at`, `update_at`) VALUES
	(1, '59SE Nomor 08 Tahun 2021 Tentang Pembatasan Mudik', '59SE_Nomor_08_Tahun_2021.pdf', '2022-02-20 16:19:20', '2022-02-20 16:29:41'),
	(2, 'SE Pembatasan Mudik', '59SE_Nomor_08_Tahun_20211.pdf', '2022-02-20 16:29:18', NULL);
/*!40000 ALTER TABLE `bankdata` ENABLE KEYS */;

-- Dumping structure for table sidian.data_anak
CREATE TABLE IF NOT EXISTS `data_anak` (
  `id_anak` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama_anak` varchar(220) NOT NULL,
  `tempat_lahir` varchar(220) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `anak_ke` int(5) NOT NULL,
  `pekerjaan` varchar(220) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tunjangan` varchar(100) NOT NULL,
  `file` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_anak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_anak: ~3 rows (approximately)
/*!40000 ALTER TABLE `data_anak` DISABLE KEYS */;
INSERT IGNORE INTO `data_anak` (`id_anak`, `nip`, `nama_anak`, `tempat_lahir`, `tgl_lahir`, `nik`, `anak_ke`, `pekerjaan`, `agama`, `status`, `tunjangan`, `file`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', 'ARSYILA SHAKILA SYIFA', 'TANJUNGPINANG', '2020-06-10', '331402140111004', 1, 'BELUM BEKERJA', 'Islam', 'Anak Kandung', 'Tidak Dapat Tunjangan', 'IHT_PPI_Dasar.pdf', '2022-02-20 08:49:07', NULL),
	(2, '0123456789', 'tes', 'sragen', '2022-02-20', '331402140111', 1, 'belum bekerja', 'Islam', 'Anak Kandung', 'Dapat Tunjangan', 'ttd_Bu_santi.pdf', '2022-02-20 17:21:21', '2022-02-20 17:21:21');
/*!40000 ALTER TABLE `data_anak` ENABLE KEYS */;

-- Dumping structure for table sidian.data_berkas
CREATE TABLE IF NOT EXISTS `data_berkas` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) DEFAULT NULL,
  `jberkas` varchar(250) DEFAULT NULL,
  `nama_berkas` varchar(220) DEFAULT NULL,
  `file` varchar(220) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_berkas: ~1 rows (approximately)
/*!40000 ALTER TABLE `data_berkas` DISABLE KEYS */;
INSERT IGNORE INTO `data_berkas` (`id_berkas`, `nip`, `jberkas`, `nama_berkas`, `file`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', '1', 'Kartu Keluarga', 'b_belakang.jpg', '2022-02-20 16:53:01', '2022-02-20 16:53:01'),
	(3, '0123456789', '1', 'KK tulus', 'dwi.pdf', '2022-02-20 17:01:20', NULL);
/*!40000 ALTER TABLE `data_berkas` ENABLE KEYS */;

-- Dumping structure for table sidian.data_diklat
CREATE TABLE IF NOT EXISTS `data_diklat` (
  `id_diklat` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama_diklat` varchar(220) NOT NULL,
  `institusi` varchar(220) NOT NULL,
  `nomor` varchar(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `durasi_jp` int(10) NOT NULL,
  `berlaku_sampai` date DEFAULT NULL,
  `file` varchar(220) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_diklat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_diklat: ~2 rows (approximately)
/*!40000 ALTER TABLE `data_diklat` DISABLE KEYS */;
INSERT IGNORE INTO `data_diklat` (`id_diklat`, `nip`, `nama_diklat`, `institusi`, `nomor`, `tgl_mulai`, `tgl_selesai`, `durasi_jp`, `berlaku_sampai`, `file`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', 'AI Chatbot kominfo RI', 'Komifo RI', '1/1.02.03.11', '2022-02-20', '2022-03-20', 48, '2022-05-19', 'b_belakang.jpg', '2022-02-20 23:13:11', '2022-02-20 23:13:11'),
	(2, '199601142020121007', 'FLUTTER', 'INIXINDO', '1233/123', '2022-02-20', '2022-02-20', 174, '2023-05-20', 'b_depan.jpg', '2022-02-20 11:51:36', '2022-02-20 09:55:35'),
	(3, '0123456789', 'AI Chatbot kominfo RI', 'Komifo RI', '1233/123', '2022-02-20', '2022-02-20', 48, '2022-05-20', 'ttd_Bu_santi.pdf', '2022-02-21 00:08:08', '2022-02-21 00:08:08');
/*!40000 ALTER TABLE `data_diklat` ENABLE KEYS */;

-- Dumping structure for table sidian.data_jabatan
CREATE TABLE IF NOT EXISTS `data_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `jenis_jabatan` varchar(50) NOT NULL,
  `jabatan` varchar(220) NOT NULL,
  `kelas_jabatan` varchar(50) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `no_surat` varchar(220) NOT NULL,
  `tgl_surat` date NOT NULL,
  `file` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_jabatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_jabatan` DISABLE KEYS */;
INSERT IGNORE INTO `data_jabatan` (`id_jabatan`, `nip`, `jenis_jabatan`, `jabatan`, `kelas_jabatan`, `tmt_jabatan`, `no_surat`, `tgl_surat`, `file`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', 'Fungsional Tertentu', '30', '6', '2022-02-20', '823.3/3442/035/2018', '2022-02-20', '5_6310043497470624749.pdf', '2022-02-20 08:45:21', NULL),
	(2, '199601142020121007', 'Fungsional Tertentu', '31', '7', '2022-02-20', '823.3/3442/035/2018', '2022-02-20', 'IHT_PPI_Dasar.pdf', '2022-02-20 19:09:55', '2022-02-20 19:09:55');
/*!40000 ALTER TABLE `data_jabatan` ENABLE KEYS */;

-- Dumping structure for table sidian.data_mutasi
CREATE TABLE IF NOT EXISTS `data_mutasi` (
  `id_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `asal` varchar(220) NOT NULL,
  `tujuan` varchar(220) NOT NULL,
  `no_surat` varchar(220) NOT NULL,
  `tmt_mutasi` date NOT NULL,
  `file` varchar(220) NOT NULL,
  `status_baca` varchar(10) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sidian.data_mutasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_mutasi` DISABLE KEYS */;
INSERT IGNORE INTO `data_mutasi` (`id_mutasi`, `nip`, `asal`, `tujuan`, `no_surat`, `tmt_mutasi`, `file`, `status_baca`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', 'IPSRS', '6', '823.3/3442/035/2018', '2021-02-20', 'b_belakang.jpg', '0', '2022-02-20 19:17:30', '2022-02-20 19:17:41');
/*!40000 ALTER TABLE `data_mutasi` ENABLE KEYS */;

-- Dumping structure for table sidian.data_pangkat
CREATE TABLE IF NOT EXISTS `data_pangkat` (
  `id_pangkat` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `pangkat` varchar(220) NOT NULL,
  `tmt` date NOT NULL,
  `tahun` int(10) NOT NULL,
  `bulan` int(10) NOT NULL,
  `no_surat` varchar(220) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_bkn` varchar(220) NOT NULL,
  `tgl_bkn` date NOT NULL,
  `file` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_pangkat: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_pangkat` DISABLE KEYS */;
INSERT IGNORE INTO `data_pangkat` (`id_pangkat`, `nip`, `pangkat`, `tmt`, `tahun`, `bulan`, `no_surat`, `tgl_surat`, `no_bkn`, `tgl_bkn`, `file`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', '4', '2020-12-31', 3, 0, '823.3/3442/035/2018', '2020-11-28', 'BG-23314001222', '2020-11-20', 'IHT_-_Apar.pdf', '2022-02-20 08:44:17', NULL),
	(2, '199601142020121007', '5', '2022-02-20', 6, 15, '823.3/3442/035/2018', '2022-02-20', 'BG-23314001222', '2022-02-20', 'ttd_Bu_santi.pdf', '2022-02-20 18:02:36', '2022-02-20 18:02:36');
/*!40000 ALTER TABLE `data_pangkat` ENABLE KEYS */;

-- Dumping structure for table sidian.data_pasangan
CREATE TABLE IF NOT EXISTS `data_pasangan` (
  `id_pasangan` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL DEFAULT '',
  `pasangan` varchar(220) NOT NULL DEFAULT '',
  `nama_pasangan` varchar(220) NOT NULL,
  `tempat_lahir` varchar(220) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `pekerjaan` varchar(220) NOT NULL,
  `tgl_nikah` date NOT NULL,
  `akta_nikah` varchar(220) NOT NULL,
  `pasangan_ke` int(5) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `status_hidup` varchar(100) NOT NULL,
  `status_pernikahan` varchar(220) NOT NULL,
  `tgl_cerai` date DEFAULT NULL,
  `akta_cerai` varchar(220) DEFAULT NULL,
  `tunjangan` varchar(220) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pasangan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_pasangan: ~3 rows (approximately)
/*!40000 ALTER TABLE `data_pasangan` DISABLE KEYS */;
INSERT IGNORE INTO `data_pasangan` (`id_pasangan`, `nip`, `pasangan`, `nama_pasangan`, `tempat_lahir`, `tgl_lahir`, `nik`, `pekerjaan`, `tgl_nikah`, `akta_nikah`, `pasangan_ke`, `agama`, `no_hp`, `status_hidup`, `status_pernikahan`, `tgl_cerai`, `akta_cerai`, `tunjangan`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', 'Istri', 'CYNTHIA WULANDARI', 'SRAGEN', '1996-03-14', '3314021401114', 'PNS', '2019-02-05', 'IHT_-_Apar.pdf', 1, 'Islam', NULL, 'Hidup', 'Menikah', NULL, '', 'Tidak Dapat Tunjangan', '2022-02-20 08:46:45', NULL),
	(2, '0123456789', 'Istri', 'AAAAAA', 'sragen', '2022-02-20', '12345678990', 'Swasta', '2022-02-20', 'ttd_Bu_santi.pdf', 1, 'Islam', NULL, 'Hidup', 'Menikah', NULL, 'dwi.pdf', 'Dapat Tunjangan', '2022-02-20 17:17:57', '2022-02-20 17:17:57');
/*!40000 ALTER TABLE `data_pasangan` ENABLE KEYS */;

-- Dumping structure for table sidian.data_pegawai
CREATE TABLE IF NOT EXISTS `data_pegawai` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL DEFAULT '',
  `nama_lengkap` varchar(220) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` varchar(220) DEFAULT NULL,
  `pangkat` varchar(200) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `jenis_jabatan` varchar(200) DEFAULT NULL,
  `profesi` varchar(220) DEFAULT NULL,
  `divisi` varchar(200) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `bpjs` varchar(100) DEFAULT NULL,
  `status_pegawai` varchar(50) DEFAULT NULL,
  `referensi` varchar(50) DEFAULT NULL,
  `kp_terakhir` date DEFAULT NULL,
  `kp_mendatang` date DEFAULT NULL,
  `kgb_terakhir` date DEFAULT NULL,
  `kgb_mendatang` date DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `longitude` varchar(220) DEFAULT NULL,
  `latitude` varchar(220) DEFAULT NULL,
  `takehomepay` varchar(220) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `jenjang` varchar(250) DEFAULT '10',
  `prodi` varchar(250) DEFAULT NULL,
  `foto` varchar(250) DEFAULT 'bwa.jpg',
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `grafik` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=404 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_pegawai: ~297 rows (approximately)
/*!40000 ALTER TABLE `data_pegawai` DISABLE KEYS */;
INSERT IGNORE INTO `data_pegawai` (`id_user`, `nip`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `gender`, `agama`, `alamat`, `pangkat`, `jabatan`, `jenis_jabatan`, `profesi`, `divisi`, `nik`, `npwp`, `bpjs`, `status_pegawai`, `referensi`, `kp_terakhir`, `kp_mendatang`, `kgb_terakhir`, `kgb_mendatang`, `tmt`, `longitude`, `latitude`, `takehomepay`, `no_hp`, `email`, `jenjang`, `prodi`, `foto`, `password`, `role`, `create_at`, `update_at`, `grafik`) VALUES
	(1, '194601142020121007', 'Tulus Wahyuno, S.Kom', 'sragen', '2021-10-13', 'Laki-laki', 'islam', 'Margo Asri, Puro, Kanangmalang, Sragen', '13', '2', 'Struktural', '2', '4', '3314021401960002', '1234', '1234', '0', NULL, '2019-10-01', '2021-12-30', '2019-10-01', '2021-11-13', '2021-11-14', '1121e1we', 'asdf12e34', '2000000', '089123321123', 'admin@gmail.com', '13', NULL, 'bwa.jpg', '21232f297a57a5a743894a0e4a801fc3', '1', '2022-02-20 09:52:22', '2022-02-19 14:51:14', 1),
	(108, '197104152009031001', 'dr. KINIK DARSONO, M.Pd.Ked.', NULL, NULL, NULL, NULL, 'Pungkuk Rt 001/ Rw 011 Jetis Jaten Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '816671111', 'drkinik@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(109, '197006141996031004', 'TRI DARSONO, S.Sos., M.M.', NULL, NULL, NULL, NULL, 'Jl HOS Cokroaminoto 40 Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8124947788', 'fuji168mart@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(110, '198105172010012026', 'dr. MAYASARI AYU HENDRAWATI', NULL, NULL, NULL, NULL, 'jl Slamet Riyadi no 172 Sarigunan Sragen wetan Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8995858008', 'reinaalmira@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(111, '198403302008042003', 'IMAS WULANDARI, S.Kom., M.Eng.', '', '0000-00-00', 'Perempuan', 'Islam', 'PURO ASRI 2 BLOK P 18 RT 046, KARANGMALANG, SRAGEN, JAWA TENGAH', '9', '4', 'Struktural', '2', '24', '', '', '', '1', NULL, '2019-02-20', '2023-05-05', '2020-02-20', '2022-05-19', '0000-00-00', '', '', '', '82122118880', 'imas.egov@gmail.com', '13', 'TEKNIK INFORMATIKA', 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-20 19:19:44', '2022-02-20 19:19:44', 1),
	(112, '196401181985111001', 'SUGITO,S.Kep', NULL, NULL, NULL, NULL, 'Nganti Rt 04 RW 04,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329006019', 'abahsugito41@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(113, '197608282005022003', 'dr. NOFI KUSUMANINGRUM', NULL, NULL, NULL, NULL, 'Mekarsari 2c/11,Nglorog,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8122642720', 'kusumaningrumnofi@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(114, '197011021995021002', 'SURAMIN, SKM.,S.Kep.,Ns', NULL, NULL, NULL, NULL, 'Sumberagung RT.03,donoyudan,Kalijambe,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85878168987', 'h.suramin_skm@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(115, '198004022008041001', 'BEKTI NUGROHO,S.Kom. M.Eng.', NULL, NULL, NULL, NULL, 'Mijahan RT.07 Kwangen, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8562742480', 'bekti@sragenkab.go.id', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(116, '198606022009031001', 'AGUNG WIBOWO,SE', NULL, NULL, NULL, NULL, 'Karangjati RT.08, Kecamatan Kalijambe, Kab. Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329590990', 'agungwybawa@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(117, '198212182009031006', 'ANDREAS HASTA RIAWAN, AMF', NULL, NULL, NULL, NULL, 'Jl. Kemuning A. no5 RT2 RW2 Mageru Timur Polres, Sragen, 57211', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85293784030', 'kohaku.shmily@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(118, '198206132006042010', 'ERLIA ANDISETYANA P, S.Kep.Ns', NULL, NULL, NULL, NULL, 'Nglangak RT 04 Kwangen, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8156858983', 'andisetyana@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(119, '197709042006041007', 'dr. SUMARJI,Sp.N', NULL, NULL, NULL, NULL, 'Jl.BANGAU 5 NO 7 Banjarsari Manahan Surakarta', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329012095', 'jiejinong77@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(120, '196807071995031002', 'Drs. J. SENO TJAHJADI, Apt ', NULL, NULL, NULL, NULL, 'Ngandul RT 005 Ds. Ngandul, Sumberlawang - Sragen, Jawa Tengah.', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329583028', 'adiseno7768@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(121, '196909252007012008', 'dr. LISYATI KHOIRIYAH ', NULL, NULL, NULL, NULL, 'Nglangak RT 04 RW 01 Kwangen Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8122616007', 'listyakhoir@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(122, '197201222006041014', 'dr. PUDJI SETYAWAN', NULL, NULL, NULL, NULL, 'Jati masaran kulon rt6 rw 2 Masaran Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81326231491', 'setyawanpudji472@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(123, '196412171986032010', 'ENI KURNIANINGSIH , S.Gz', NULL, NULL, NULL, NULL, 'Sadon Rt 02 Rw 05 Wonorejo Gondangrejo Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393849007', 'enikurnianingsih1@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(124, '196601031988032007', 'SITI WARDANI, SKep', NULL, NULL, NULL, NULL, 'Gandu RT 03 Nganti Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393011164', 'sitiwardani63@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(125, '196606151988031023', 'SUJIMAN, A.Md.Kep', NULL, NULL, NULL, NULL, 'KUNTI KIDUL Rt.06/02 ANDONG BOYOLALI', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393358180', 'arinialmas@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(126, '196701251988032006', 'SUPARMI, A.Md.Kep', NULL, NULL, NULL, NULL, 'keyongan RT 05, Karangwaru,plupuh,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81567799576', 'Suparmi_67@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(127, '196412041986032016', 'NURAINI KHOIRIYAH, S.Kep.', NULL, NULL, NULL, NULL, 'Cinet 02/02, Bulurejo, Gondangrejo, Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82331299105', 'ibuknuraini6@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(128, '196703171988032011', 'ENDANG NURWATI, A.Md.Keb', NULL, NULL, NULL, NULL, 'Brumbung RT 12 RW 04, Karang asem, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81392599195', 'EndangNurwati2016@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(129, '196803101988031004', 'YOHANES ADI K., A.Md.kep', NULL, NULL, NULL, NULL, 'Jetis rt 02 rw 05 Kadipiro Banjarsari Surakarta', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82137496456', 'masmantri68@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(130, '196804241990122002', 'TRI ANDAYANI, Amd', NULL, NULL, NULL, NULL, 'Cluntang RT. 07,Peleman, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8121548884', 'triandayani1968@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(131, '196502101989031014', 'WIBOWO', NULL, NULL, NULL, NULL, 'Larum Rt 09 Rw 01 Pulutan Nogosari Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81325419003', 'bowow.112233@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(132, '196911111993032006', 'SRI SULASTRI, SKM', NULL, NULL, NULL, NULL, 'Jetak rt 3 rw 3 wonorejo gondangrejo KRA', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81390011877', 'lastrisolo69@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(133, '197302271997031001', 'KELIK SURYANTO, AMK', NULL, NULL, NULL, NULL, 'Kalong bali rt 20 jetiskarangpung kalijambe sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329004701', 'Chikachayla@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(134, '197002011991032008', 'WINHANTARI SUPROBO, SE', NULL, NULL, NULL, NULL, 'Perum Gentan Raya I D-7 Gentan Baki Sukoharjo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81286732088', 'winsuprobo@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(135, '197401271993012003', 'ENDANG SRI SULASTRI, Amd.Keb', NULL, NULL, NULL, NULL, 'Gandu Rt 003 Rw 1,Nganti,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329574862', 'endgss1@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(136, '197809282003121005', 'ANUNG INDRAS S, S.Kep.Ns', NULL, NULL, NULL, NULL, 'Joyorejan RT 01 kel Gemolong kec. Gemolong Kab.Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82285665667', 'anungindras@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(137, '198204232003122004', 'SITI ROCHANI, AMKG', NULL, NULL, NULL, NULL, 'Joyorejan Rt 01 Rw 02,Gemolong,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82226027007', 'sitirochani1982@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(138, '197902232003122009', 'ENY FATIMAH, S.Kep.,Ns', NULL, NULL, NULL, NULL, 'Siboto, RT 11, Kalimacan Kalijambe Sragen, 57275', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81238519257', 'enyfatimah17@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(139, '198005192003122009', 'WINDARYATI, AMd.Keb. ', NULL, NULL, NULL, NULL, 'sidomulyo rt 16 sidoharjo,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393084834', 'rayafarasnaila2@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(140, '198104262006042014', 'AMBAR RUSMINI, S. Sit', NULL, NULL, NULL, NULL, 'Aspol Manahan RT 01/12 Manahan Banjarsari Surakarta', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8121505932', 'arosemini@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(141, '198105092011011009', 'dr. HENDY PRIMA SETYAWAN, SpB', NULL, NULL, NULL, NULL, 'Jl.GATOTKACA 50 3A', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82133047246', 'drhendysetyawanspb@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(142, '197501252006042010', 'ENDANG FAJAR WAHYUNINGSIH, S.Kep.,Ns', NULL, NULL, NULL, NULL, 'Nganti, Rt 04 Rw 0, Nganti, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329056272', 'endangfajar440@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(143, '197302112006042009', 'NINIK WURYANTINI. A.Md.Keb', NULL, NULL, NULL, NULL, 'Dk.Tunggul rt 20 rw 08,Ds.Peleman,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393463667', 'ninikwuryantini1@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(144, '197503302007012008', 'MULYATI, AMdKeb', NULL, NULL, NULL, NULL, 'MOROREJO RT 03 JATIBATUR GEMOLONG SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87888676791', 'Mulyatisigit@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(145, '198608292009032004', 'DWI AGUSTIN, AMD', NULL, NULL, NULL, NULL, 'Mijahan RT05, Ngembat padas, gemolong,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81228564224', 'ibansubaban7@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(146, '197409281993032002', 'NINA FAJARINI, Amd. Keb', NULL, NULL, NULL, NULL, 'ngeseng RT 002/003 gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85803332627', 'ninafajarini27@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(147, '198212232009032006', 'VIVIN ARIYANTI, S.Gz', NULL, NULL, NULL, NULL, 'Dondong RT 12, Purworejo, Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81216952808', 'vivinariyanti82@rocketmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(148, '197005162007012015', 'SUPARNI ', NULL, NULL, NULL, NULL, 'Ngeseng Rt17 Rw06  Kwangen Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81228973145', 'suparnimenik16@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(149, '196606052007012030', 'WASINEM ', NULL, NULL, NULL, NULL, 'Pondok RT 03,Sunggingan, Miri, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393667208', 'mamiwasi225@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(150, '197612112006041008', 'AGUS DWIYANTO, S.Farm, Apt', NULL, NULL, NULL, NULL, 'Kategan RT 02/RW 4, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82221561122', 'dwiyantoagus76@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(151, '197801182011012003', 'PARMI, Amd Gizi', NULL, NULL, NULL, NULL, 'Kaloran rt 01 kaloran Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728647803', 'Parmigz@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(152, '198308042010011016', 'LILIK SUBAGYO, S.Kep, Ns', NULL, NULL, NULL, NULL, 'Rejosari Rt.18 Donoyudan, Kalijambe,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85643385565', 'lilik_subagyo@yahoo.co.id', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(153, '198610212010012013', 'WAHYU BETI HANDAYANI, S.Kep, Ns', NULL, NULL, NULL, NULL, 'Plosorejo rt 02 pagak sumberlawang sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82133111155', 'satriaabhimata4@gmil.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(154, '198407152010012040', 'FITRIA PURNAMAWATI,S.Kep.,M.Kep', NULL, NULL, NULL, NULL, 'Perum. Gemolong Permai No 66,Rt 12/1 gemolong,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8562920315', 'fpurnamawati@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(155, '198803062010012010', 'MELLI NUR INDAH SARI, S.Kep, Ns', NULL, NULL, NULL, NULL, 'Keden, rt14/01, keden, kalijambe,  sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85290621228', 'Mellynuri2020@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(156, '197909022010012010', 'NINING RUSMAWATI, S.Kep, Ns', NULL, NULL, NULL, NULL, 'Banjarejo rt 05, tuban , gondangrejo , karanganyar/ saren rt 09 saren kalijambe sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82135563194', 'niningrusmawati@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(157, '197907272010012019', 'DEWI ISJIATI, AMK', NULL, NULL, NULL, NULL, 'Kajog RT 03 , Karanganyar, Plupuh,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329312567', 'Istidewi503@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(158, '198303302010012018', 'HENI TRI HASTUTI, S.Kep, Ns', NULL, NULL, NULL, NULL, 'Gandu Rt 01, Nganti, Gemolong, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82242358002', 'henitrihastuti17@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(159, '197602282010012007', 'HETTY PURWANINGSIH, S.Kep, Ns', NULL, NULL, NULL, NULL, 'Gayam Rt 03 Rw 01,Duyungan,Sidoharjo,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85878363112', 'hettypurwaningsih94@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(160, '198705052010011013', 'EKO SUJIANTO, S.Kep, Ns', NULL, NULL, NULL, NULL, 'Jambangan, Rt. 09, Bendungan, Kedawung, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82220478686', 'ekosuji@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(161, '198712052010012015', 'DEWI SULASMI, AMK', NULL, NULL, NULL, NULL, 'Mijahan Rt 05 Rw 01,Ngembat padas,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728006258', 'dewisulasmirais@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(162, '198504052010012033', 'SRI SULISTYOWATI, AMK', NULL, NULL, NULL, NULL, 'Ngembatkembang Rt 12 Rw 03,kragilan,gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82241955774', 'sulis333a@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(163, '197812192010012011', 'NURYATI,S.Tr.Keb, Bdn', NULL, NULL, NULL, NULL, 'Ngamban RT 01, Gawan, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85803681178', 'nuryatianggrek@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(164, '198006192010012012', 'RAHMAWATI PUTRI EKA S, Amd. Keb', NULL, NULL, NULL, NULL, 'Masaran Rt 09 Rw 2b, Jati, Masaran, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81390786733', 'rahmadevano@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(165, '198509212010012031', 'ISTIQOMAH NURUL LAILI, AMd Keb.', NULL, NULL, NULL, NULL, 'GANDUREJO RT 04 GEMOLONG SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81225888442', 'istiq234234@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(166, '198702262010012020', 'PUJI RAHAYU, Amd. Keb', NULL, NULL, NULL, NULL, 'NGINGGIL RT 029 BENDO SUKODONO SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81259613661', 'pramdkeb@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(167, '198206162010012023', 'ERNI TRI YUNIATI, SKM', NULL, NULL, NULL, NULL, 'Turi rt 01/11, turi, sine, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8112646366', 'erninano2015@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(168, '198712062010011003', 'BAGUS PRASETYA UTAMA, AMTE', NULL, NULL, NULL, NULL, 'Margomulyo Rt.13, Jono, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329222500', 'b_joez@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(169, '198105272011011006', 'TOMIK WIDAYANTO, Amd. Kep', NULL, NULL, NULL, NULL, 'Gandurejo Rt 04 Rw 03 Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '822338291082', 'tomikwidayanto@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(170, '198501012011012016', 'RISTU SETYAMURTI, S.Fis', NULL, NULL, NULL, NULL, 'Mijahan rt:05/01, ngembat padas,gemolong,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81226640090', 'riris.ristu85@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(171, '197205281992032005', 'ETI FERIATI, A.Md', NULL, NULL, NULL, NULL, 'Gemolong RT 03B RW 3 Gemolong Sragen.', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329513772', 'etiferiati1972@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(172, '198203172008012013', 'ANFANG GLORIAWATI, S.Tr ', NULL, NULL, NULL, NULL, 'Plawar Rt.16 Saren Kalijambe Sragen Jawa Tengah', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81548981940', 'anfanggloria@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(173, '197809122005012013', 'dr. ARI DWI RATNA K., M.Sc.SpA', NULL, NULL, NULL, NULL, 'sragen dok rt 20 rw 07 sragen wetan, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81328430513', 'arri_srg@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(174, '197504142009011009', 'PURWANTO, A.Md', NULL, NULL, NULL, NULL, 'Banaran Rt.08, Suwatu, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647203679', 'auriojunioranto@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(175, '197305072010012003', 'MAIMUNAH NUR ENDAH,S.Kep.,Ns', NULL, NULL, NULL, NULL, 'Karangjoho ,Rt 19 Mojo,Andong,Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '816671454', 'meimunah1998@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(176, '197803122006042001', 'dr. RUSNITA, Sp.PA', NULL, NULL, NULL, NULL, 'Bogadung Rt01,Rw-,Bendungan,Kedawung,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8122988934', 'dr.rusnita@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(177, '198011022005012018', 'NUR AINI, Amd.Keb', NULL, NULL, NULL, NULL, 'Banaran RT 09A Banaran Kalijambe Sragen Jawa tengah', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81390479105', 'nura05247@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(178, '198307022006042006', 'WAHYU TRI WIDAYANTI, SE', NULL, NULL, NULL, NULL, 'Ngroto Rt. 01,Peleman,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85229085999', 'wahyu_triwi83@yahoo.co.id', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(179, '197312302006041009', 'dr. SUGENG UTOMO', NULL, NULL, NULL, NULL, 'Putat Rt 43 Rw 02,Kroyo,Karangmalang Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85326759301', 'oetomo1973@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(180, '196801011990031020', 'SRIYONO, SE', NULL, NULL, NULL, NULL, 'Jl. Sukowati no. 477 Dukuhan Rt. 02 Rw. 04  Nglorog  Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8122590111', 'sriyono010168@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(181, '197110281992031008', 'DIDIK SETIYO HARTONO, S.T', NULL, NULL, NULL, NULL, 'Ringin Anom RT 1 RW 17, Sragen Kulon, Sragen Kota', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82137392529', 'didikhartono9.dh@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(182, '198306032015021001', 'dr. AYYUB ISWAHYUDI, Sp.OG', NULL, NULL, NULL, NULL, 'SIDO MULYO RT 001/001 NGEMBAT PADAS, GEMOLONG, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8122657419', 'dr.ay@rocketmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(183, '198808262015021001', 'dr. ABDULLOH ABBAS', NULL, NULL, NULL, NULL, 'DS. Gempol songo RT 01 RW 01 kec mijen kab Demak', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85640921017', 'abbas268@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(184, '198912102015022003', 'WINDI HAPSIDANA,A.Md.Rad.', NULL, NULL, NULL, NULL, 'Puntuk Rejo RT 03 RW 10, Ngringo, Jaten, Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85642231202', 'windidana89@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(185, '197804042014092002', 'ARTHA TRI HANDAYANI,A.MK', NULL, NULL, NULL, NULL, 'Karanglegi rt 02, tangkil ,sragen ', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85867267277', 'artatrihan22@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(186, '197609112014092002', 'ENIK PUJIASTUTI,AMK.', NULL, NULL, NULL, NULL, 'Sentulan Rt.12,kaloran,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82242712669', 'enikistana@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(187, '198912272011012003', 'CANDRA NUGRAHENI,S.ST', NULL, NULL, NULL, NULL, 'Kaliwuni rt 06 rw 01 jetis karangpung, kalijambe, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85725277345', 'candranugraheni@ymail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(188, '198002242011012005', 'NGATINI, AMK', NULL, NULL, NULL, NULL, 'Perumahan Gandurejo Hill\'s Kav. D4 Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85748563040', 'ngatini299@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(189, '198706142011012014', 'KISTI RIAWATI, A.Md.', NULL, NULL, NULL, NULL, 'Gemolong Rt 03/02 Gemolong,Gemolong ,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647798321', 'qistikity@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(190, '198101192006041007', 'JANURIADI FARUDIN, A.Md', NULL, NULL, NULL, NULL, 'Teguhjajar RT 8a Plumbungan Karangmalang Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85258004232', 'januri81adif@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(191, '197507292007011006', 'dr. WIDAYANTO, SpP. M.kes', NULL, NULL, NULL, NULL, 'Jimbung RT 17 RW 4 Guworejo Karangmalang Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81219558689', 'widaparu@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(192, '197801152005012010', 'dr. ANITA WIJAYANTI, SpPD, M.Kes', NULL, NULL, NULL, NULL, 'Butuh RT 30 Banaran sambungmacan Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82328010454', 'anitawijay@yahoo.co.id', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(193, '197604052005011011', 'dr. ARIS GUNAWAN, SpA, M,kes', NULL, NULL, NULL, NULL, 'Puri Taman Sari 2 B17 jati jaten Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81326517857', 'dr.arisgunawan@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(194, '198709302011012016', 'SEPTYANITA DWIANGGA, S.Farm', NULL, NULL, NULL, NULL, 'Klentang RT.7 Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82241917991', 'septyanitadwiangga@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(195, '197904062006041027', 'dr. AGUS GIYARTO, SpPD', NULL, NULL, NULL, NULL, 'Geneng gumul karangnongko klaten', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8562958033', 'gieart79@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(196, '198304012006042003', 'ENDAH HARIS STYOWATI, AMK', NULL, NULL, NULL, NULL, 'Godegan Rt 01 Rw 01, Kragilan, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81343749288', 'endahharis0104@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(197, '196901122000031007', 'HARTONO, AMTE', NULL, NULL, NULL, NULL, 'Ngamban Rt2 Rw1.Gawan.Tanon.Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82136821234', 'hatono04@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(198, '198110222008012006', 'A.M.TYAS OKTARINA INDAH RIMBAWATI, A.Md.Keb.', NULL, NULL, NULL, NULL, 'Brumbung, Rt:7, Karangasem, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85725521181', 'tyas.oktarina2015@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(199, '198505102011012013', 'drg. BETY HERLINAWATI', NULL, NULL, NULL, NULL, 'Pakis RT 20 RW 07,Masaran, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85648089833', 'bety.herlinawati@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(200, '197210172006042004', 'dr. SRI WAHYUNI, Sp.KJ', NULL, NULL, NULL, NULL, 'Perum Griya Tegal Sari Asri RT 08/ RW16, Sragen Kulon, Sragen, Sragen.', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81225398637', 'sriyun.sovianto@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(201, '198812032010012008', 'DESIYANA RACHMAWATI.,A.Md', NULL, NULL, NULL, NULL, 'Patihan rt 19 sidoharjo sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647223870', 'desiyanarachmawati@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(202, '198707022010012023', 'ASRI PRATIWI HIDAYANTI, AMd.Farm', NULL, NULL, NULL, NULL, 'Clupak rt 19, Mojopuro, Sumberlawang, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85292010326', 'asripratiwi.h@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(203, '199212272019032011', 'dr. AISYAH UMMU FAHMA', NULL, NULL, NULL, NULL, 'GEDANGAN RT 009/- Peleman Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82115576841', 'aisyahfahma799@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(204, '198807242019032008', 'Drg. ITA ARAFATIS SYORIFAH', NULL, NULL, NULL, NULL, 'PARAMITA REGENCY NO.4A RT 03/01 KRAGILAN GEMOLONG SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85258895339', 'ita_arafatis@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(205, '199205242019031008', 'dr. PAKSI SURYO BAWONO', NULL, NULL, NULL, NULL, 'JL. Embarkasi haji KM1, Banarjo, Gagaksipat, Ngemplak, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85642093434', 'paksisuryo12@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(206, '198805012011012014', 'CANDRA ROSANTI, SKM', NULL, NULL, NULL, NULL, 'PILANGSARI RT 11, WONOREJO, KALIJAMBE, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85641001765', 'candrarosanti@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(207, '196508301990011001', 'SUHONO, SKM', NULL, NULL, NULL, NULL, 'Gemolong rt 003 Gemolong, Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329090505', 'suhonolurinca@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(208, '198305232010012038', 'dr. ARFIK SETYANINGSIH, Sp.PD', NULL, NULL, NULL, NULL, 'Kuwungsari rt 01 rw 19 sragen kulon. Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393977090', 'arfikinterna@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(209, '198307052011012015', 'dr. YULIA RATNA UTAMI, Sp.Rad', NULL, NULL, NULL, NULL, 'Tisan, RT 09, Karanganom, Sukodono, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81390008696', 'yuliaratnautami@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(210, '198303012009032007', 'drg. DINA LISTYOWATI, Sp.Ort', NULL, NULL, NULL, NULL, 'Teguh jajar RT.08, RW.02, kel.plumbungan, kec.karangmalanag, Sragen 57222', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329209002', 'dinalistyowati83@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(211, '198208142020121002', 'dr. ODDIE BUDI SANTOSA, Sp.An', NULL, NULL, NULL, NULL, 'DUKULAN RT 02/04 NGLOROG SRAGEN SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82242465484', 'oddie.budi.s@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(212, '198507182020121003', 'ADI TRIWISNU, Amd E.M', NULL, NULL, NULL, NULL, 'klenteng rt 19 rw 6, Bener, Ngrampal, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8179515962', 'aditriwisnu18@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(213, '198606282020122006', 'FARIDA KURNIAWATI, S.Farm.,Apt. ', NULL, NULL, NULL, NULL, 'Tempelrejo RT 007, Mondokan, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8562505625', 'faridania86@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(214, '198507272020121009', 'MUSTAQIM, S.Farm., Apt', NULL, NULL, NULL, NULL, 'SIDOREJO RT 20 RW 03 KARANGJATI, KALIJAMBE, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '88215945948', 'taqim.apt@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(215, '199209242020122017', 'AHTMI WARDHANI, A.Md Farm', NULL, NULL, NULL, NULL, 'Sadon rt 03 rw 06, Sawahan, Ngemplak, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85867027001', 'ahtmiw24@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(216, '199806142020121010', 'DANANG SAPUTRO M Y W, A.Md.Farm ', NULL, NULL, NULL, NULL, 'Karungan RT 05, Karungan, Plupuh, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82225053629', 'danangsaputro01@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(217, '199306262020122025', 'WULANDARI, A.Md.Farm', NULL, NULL, NULL, NULL, 'Klinggan Rt 004 Rw 000, Jabung, Plupuh, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85230176880', 'ndarywulan22@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(218, '199805062020122013', 'PRANAR MAYA EKA PRADINA, A.Md.', NULL, NULL, NULL, NULL, 'SENDANG REJO RT 02 RW 02, KEDUNG MULYO, KEMUSU, BOYOLALI', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82328009062', 'pranareka4@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(219, '199804092020122016', 'ANA SAFITRI DEWI, A. Md. Kep', NULL, NULL, NULL, NULL, 'Niten 003/005, Selokaton, Gondangrejo, Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8981017262', 'annadewi9498@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(220, '199503282020122019', 'DEVINTA RISWANDARI, A.Md. Kep.', NULL, NULL, NULL, NULL, 'Kiyudan Ngaranan 07/33 Sendangrejo Minggir Sleman Yogyakarta', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85830309065', 'devintariswandarins@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(221, '199112032020122017', 'DEVY NUR FARADILLA, A.Md.Kep', NULL, NULL, NULL, NULL, 'Sawahan Rt 02 Rw 01 Sawahan, Ngemplak, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85658013931', 'devyfaradilla@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(222, '198504032020121010', 'DODY FIRMANSYAH, AMK', NULL, NULL, NULL, NULL, 'BANGSRI RT 1 RW 2 ,JEPARA', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85200287193', 'dodyfirmansyah008@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(223, '199612062020122022', 'EKA MUTYA, AMK', NULL, NULL, NULL, NULL, 'Kauman Rt 03 Rw 01 Jenalas, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82233546315', 'Ekamutya12@gmail.com ', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(224, '199211192020121008', 'EKO SETIANTO, A.Md.Kep', NULL, NULL, NULL, NULL, 'Karang Tanjung 016/000 Slogo Tanon Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85746838788', 'ekosetia.es76@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(225, '198908202020122014', 'RISA MAELANI, A.Md.Kep', NULL, NULL, NULL, NULL, 'Bogoran RT 02 Trirenggo Bantul Yogyakarta 55714', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8987421861', 'nssoliha@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(226, '198911192020122018', 'RETNA FAJAR ISTIARNI, AMK', NULL, NULL, NULL, NULL, 'Modro rt 01/1 Soko ,Miri , Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '83115345616', 'retna19@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(227, '198507262020122007', 'YULAIKHA WIDYASTUTI, A.Md.Kep', NULL, NULL, NULL, NULL, 'Blimbing RT 01 RW 06 wonorejo,Polokarto,Sukoharjo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85725095888', 'yulaikha.w@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(228, '199805022020122008', 'ALIFIA SATRIANING HUTARI, A.Md.Kep', NULL, NULL, NULL, NULL, 'Gemolong RT 3 RW 3, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81337483639', 'alifiaaa227@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(229, '199508102020122019', 'ANNISA RATNA PUDYASTUTI, A.Md. Kep', NULL, NULL, NULL, NULL, 'Bondolan RT 04 RW 03, Tawengan, Sambi, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81227017703', 'annisarat04@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(230, '199211142020122020', 'NOORA CHUMAIROH, A.Md.Kep.', NULL, NULL, NULL, NULL, 'Perum Korpri 215 RT 03 RW 012 Popongan,  Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647085085', 'cuma.cubby@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(231, '199502162020122022', 'NOVI AYU KINASIH, A.Md.Kep', NULL, NULL, NULL, NULL, 'ngundaan rt 4/1 glonggong, gondang sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85743611142', 'novy.ayuk@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(232, '198911022020122010', 'NOVIA TRISTUGINARIYANTI, A.Md.Keb. ', NULL, NULL, NULL, NULL, 'Griya Lawu Indah III No.16 Rt.001 Rw.016 Ds.Jururejo Kec.Ngawi Kab.Ngawi Prov.Jawa Timur', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81224200043', 'noviaginariyanti@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(233, '199612242020121010', 'NUR ARIFIN, A.Md.Kep.', NULL, NULL, NULL, NULL, 'Grogolan RT 001 RW 002, Tegalgiri, Nogosari, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728584691', 'arifinnur24@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(234, '198910172020122022', 'RINA PUJIATI, AMK', NULL, NULL, NULL, NULL, 'Pakis RT 19 RW 05 Pringanom Masaran Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728030823', 'rpuji348@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(235, '199202152020121014', 'RONI FADHALI, Amd. Kep', NULL, NULL, NULL, NULL, 'Jetis RT 005 RW 001, Sragen Kulon, Sragen, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '89677686422', 'ronifadhali@yahoo.co.id', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(236, '199401122020122024', 'SANSAVERA NUR FATIMAH, A.Md.Kep ', NULL, NULL, NULL, NULL, 'Karangpung rt 02 rw 09, Kismoyoso, Ngemplak, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '895344569774', 'Sansavera.sweet@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(237, '199410312020121013', 'TITO SRI RAHMANSYAH, Amd. Kep', NULL, NULL, NULL, NULL, 'Jl. Kopda Sutrisno 55 RT 20 RW 05 Girimoyo Karangploso Kabupaten Malang', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85748292983', 'lovers.tito@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(238, '199401062020122027', 'TRIAS WULANJARI, AMKG', NULL, NULL, NULL, NULL, 'POJOK RT 005 RW 003 PELEMGADUNG KARANGMALANG SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85729621994', 'triaswulanjari@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(239, '199709242020122014', 'AMELIA RIFKI SUMADI, A.Md.Kep', NULL, NULL, NULL, NULL, 'Remi RT 02 RW 02, Rembun, Nogosari, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81542397125', 'ameliarifki001@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(240, '199311242020122014', 'ANI MARYUTIK, A.Md.Keb', NULL, NULL, NULL, NULL, 'Karangasem RT 02 RW 05 Karangtengah sragen sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85725633266', 'anyyutik7@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(241, '198901212020122011', 'ANDIKA DEWI WULANDARI, A.Md.Keb ', NULL, NULL, NULL, NULL, 'Slagreng rt 07/ rw 02, Sidorejo, Sidorejo, Magetan', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82225615075', 'ibukusayang89@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(242, '199704252020122016', 'APRILIA SINTA DEWI, A.Md.Keb.', NULL, NULL, NULL, NULL, 'Mojorejo Rt 01 Rw 08, Ketitang, Nogosari, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82135638833', 'apriliasintadewi0@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(243, '199502062020122020', 'DIAN CHANDRAWATI, Amd.Keb', NULL, NULL, NULL, NULL, 'Tempurejo 5/6, Tempuran, Paron, Ngawi, Jawa Timur', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81554304858', 'dianchandrawati1@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(244, '199901212020122003', 'DINDA FITRI BADRIAH, A.Md.Keb.', NULL, NULL, NULL, NULL, 'Karang Tanjung RT 16, Slogo, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85601791289', 'fdinda54@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(245, '199501212020122023', 'EVA EVI ANA M, AMd.Keb.', NULL, NULL, NULL, NULL, 'Jonggolan RT03/RW07 Ponowaren, Tawangsari, Sukoharjo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '89670355078', 'evaeviana6@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(246, '198912272020122017', 'KARTIKA HARIANJA, Amd.Keb', NULL, NULL, NULL, NULL, 'Jaten Rt 02 Rw 01, teter , Simo,  Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85210517145', 'kartikamahmud89@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(247, '199502042020122027', 'KHOIRIYAH EKA RAMADHANI,A.Md.Keb', NULL, NULL, NULL, NULL, 'Cengklik Rt 08 Rw 02, Bukuran, Kalijambe, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85201770079', 'khoiriyaheka21@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(248, '199207242020122017', 'LUSIANA INDRA PRATIWI, Amd. Keb', NULL, NULL, NULL, NULL, 'Alasmalang Rt 02 Rw 01, Gondang Rawe, Andong, Boyolali', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85760209500', 'lusianaindrapratiwi@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(249, '199510302020122023', 'NUGRAHENI NGESTI UTAMI, A.Md.', NULL, NULL, NULL, NULL, 'Perum Pondok Permai RT 003/001, Bulakrejo, Sukoharjo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81225910084', 'nugraheniutami58@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(250, '199002112020122016', 'NUR INDAH KUSUMAWATI,A.Md.Keb. ', NULL, NULL, NULL, NULL, 'Beloran Rt 02/Rw 13 Sragen Kulon, Sragen, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '816674877', 'Hanifaiin66@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(251, '199610062020122023', 'RINA KARTIKASARI, A.Md.Keb.', NULL, NULL, NULL, NULL, 'Jl. Kamboja 21A RT02 RW02 Kel.Purbosuman, Kec.Ponorogo, Kab.Ponorogo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82141370691', 'rinakartikasari96@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(252, '199104092020122021', 'RINI WULANDARI, A.Md. Keb', NULL, NULL, NULL, NULL, 'Jetak RT 08 Duyungan Sidoharjo Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81328018825', 'riniwulandariee@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(253, '199111302020122019', 'SETIAWATI, A.Md. Keb', NULL, NULL, NULL, NULL, 'CANDIREJO RT 15/RW 05, KWANGEN, GEMOLONG, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '88221333263', 'setiawati30111991@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(254, '199511262020122025', 'DIAN INTAN PANDINI, A.Md.KL', NULL, NULL, NULL, NULL, 'Asri RT 11 RW 02, Srimulyo, Gondang, Sragen ', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '895363403632', 'dian.intann14@gmail.com ', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(255, '199407122020122025', 'LAILATUL QOMARIAH, A.md.Gz', NULL, NULL, NULL, NULL, 'Dusun Kedung Pakis RT 07 RW 01, Pasirian, Lumajang, Jawa Timur', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82249192482', 'lelyqomariah12@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(256, '198907232020121010', 'MOHAMAD YASIR, A.Md.', NULL, NULL, NULL, NULL, 'Jl. Cokrobaskoro 3, no.9, RT: 02 RW: 05, Kel. Tipes, Kec. Serengan, Surakarta', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85226442131', 'yasir.solo89@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(257, '199601142020121007', 'TULUS WAHYUNO, A.Md', 'SRAGEN', '1996-01-14', 'Laki-laki', 'Islam', 'MARGO ASRI RT 36 RW 09, PURO, KARANGMALANG, SRAGEN', '5', '31', 'Fungsional Tertentu', '7', '6', '3314021401920002', '412394017528000', '0001311188624', '1', NULL, '2019-04-20', '2022-04-20', '2020-05-20', '2022-05-20', '2020-12-01', '', '', '', '89673393833', 'tuluswahyuno@gmail.com', '13', 'TEKNIK INFORMATIKA', '4x6_KEMEJA_PUTIH_TULUS.png', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-20 22:55:28', '2022-02-20 22:55:28', 1),
	(258, '199407052020122025', 'EVA ZULIYANA, A.Md.RMIK', NULL, NULL, NULL, NULL, 'Jenggotan rt 13 rw 03, Pranggong, Andong, Boyolali.', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81291062217', 'e.zuliyana217@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(259, '199607162020122016', 'NINDY AYU NINGRUM, A.Md.Kes.', NULL, NULL, NULL, NULL, 'PENGIN KIDUL RT 01 RW 11 MACANAN KEBAKKRAMAT KARANGANYAR', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85600887502', 'Nindyyayu96@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(260, '199602192020122021', 'SITI KHOTIJAH, A.Md.RMIK', NULL, NULL, NULL, NULL, 'Sengonan Rt 09 Rw 01, Tegaldowo,  Gemolong,  Sragen ', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85642149004', 'cj.khodijah@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(261, '199610122020122030', 'SUKMA ARIYATI, A.Md.AK', NULL, NULL, NULL, NULL, 'NEWUNG RT 09 NEWUNG SUKODONO SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647414702', 'sukmaariyati2@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:04:25', NULL, 1),
	(262, '197802222021212007', 'Yudiyanti Lestari Handayani, AMK', NULL, NULL, NULL, NULL, 'SIDOMULYO RT 024 RW 001,NGEMBATPADAS,GEMOLONG,SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82243961703', 'yudiyanti668@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '2', '2022-02-19 22:21:04', NULL, 1),
	(263, '0123456789', 'wahyuno', 'Sragen', '1990-02-20', 'Laki-laki', 'Islam', 'margo asri rt 36 rw 08', '1', '1', NULL, '4', '17', '8271064511140001', '412394017528000', '0000205126391', '3', NULL, NULL, NULL, NULL, NULL, '2010-02-20', '', '', NULL, '089673393833', 'nonpns@gmail.com', '10', 'KEPERAWATAN', 'Logo_Kabupaten_Sragen.png', 'e69e2e71ca76e87e7d4180c1d14d1a89', '3', '2022-02-20 17:12:48', '2022-02-20 17:12:48', 1),
	(264, '3314024308920004', 'Afika Nur Sholekhah, Amd. Keb', NULL, NULL, NULL, NULL, 'Kedung dowo rt. 03/07, somomorodukih, plupuh', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82247801439', 'afikasholikhah1@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(265, '3314045403950002', 'Alifa Alim Ambarwati,  Amd.Kep', NULL, NULL, NULL, NULL, 'Sragen manggis, RT 11,RW 04, Sragen wetan, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85813492958', 'alifanizzle@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(266, '3314096503930001', 'Aliffiana Nur Fitrasara, S.Tr.Keb', NULL, NULL, NULL, NULL, 'Rejosari RT 10 Genengduwur Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85201394009', 'aliffiana_nf@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(267, '1605010409940002', 'ALLAN MAULANA AZMI, S.Kep.Ns', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87834912187', 'allanmaulana0409@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(268, '3314116012830002', 'Ana Listiana, A Md', NULL, NULL, NULL, NULL, 'Winong Rt 37 Rw 004,Patihan,Sidoharjo,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85327822051', 'anajaya0909@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(269, '3314036702920004', 'ANIK DIANISTANTI S.Kep. Ns', NULL, NULL, NULL, NULL, 'Mlangse RT 03 RW 00, Suwatu, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81542082680', 'anikdianistanti@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(270, '3314114611930001', 'ANIS SETYANINGSIH Amd. Farm', NULL, NULL, NULL, NULL, 'Butuh Rt 034 Rw 000 , Banaran, Sambungmacan, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85799002459', 'aanissetyaningsih@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(271, '3314016203960004', 'Anita Puspitasari, Amd.Kep', NULL, NULL, NULL, NULL, 'Rejosari RT 04 Donoyudan Kalijambe Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85718056265', 'Anitapajak00@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(272, '3314136212820005', 'Apt. Ery Bayu Rahmawati, S.Farm', NULL, NULL, NULL, NULL, 'Ngeseng rt03 RW 3, Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82138774145', 'ery22rahmawati@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(273, '3309165212920001', 'ARINI CURRI FIRDAUS, Amd. Keb', NULL, NULL, NULL, NULL, 'KUNTI KIDUL Rt 06/02 ANDONG BOYOLALI', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329990364', 'arinialmas@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(274, '3314101604770008', 'Aris Prihantoro', NULL, NULL, NULL, NULL, 'Mojo Wetan Rt 01 Rw 03 , Sragen kulon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82225720720', 'arismojo2014@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(275, '3314022910890002', 'Aris Wijanarko', NULL, NULL, NULL, NULL, 'Plupuh,plupuh plupuh sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87836523751', 'Ariiiissss@ymail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(276, '3318084507950021', 'Ayu Lisa Hapsari,S.Tr.Rad', NULL, NULL, NULL, NULL, 'Jalan Gajah Ds.Kudukeras RT03/RW01, Kec.Juwana Kab.Pati', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81232304363', 'Alisahapsari@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(277, '3311075912860002', 'AYU WULANDARI, Amd. Ak', NULL, NULL, NULL, NULL, 'Kalioso Rt 03 Rw 01, Jetis karangpung, Kalijambe, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647406828', 'ayuwiwul@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(278, '3314020410970002', 'BAGAS PRASETYO, A.Md.SI.', NULL, NULL, NULL, NULL, 'Ngrombo Rt 15, Ngrombo, Plupuh, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728619736', 'bagaspras1997@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(279, '3314121703940001', 'Bagus Riyadi', NULL, NULL, NULL, NULL, 'Mlangse RT 03 RW - Suwatu, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85640544136', 'pejuangsejati22@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(280, '3314031605910007', 'BAYU ARIEF HARNAWAN, Amd.Kep', NULL, NULL, NULL, NULL, 'Jantran Rt24/05, Pilang, Masaran, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '88902911016', 'putera.barep@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(281, '3314130604900001', 'Bendung Santoso', NULL, NULL, NULL, NULL, 'Tileng, RT.07/RW.-, Kaloran, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81578078351', 'santosobendung@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(282, '3314134510740000', 'BIMA FITRI ANDAYANI DWI KARTIKA Amd', NULL, NULL, NULL, NULL, 'Gandurejo RT 04 Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329008844', 'ikabima80@gmail.com ', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(283, '3314103110850001', 'BINTORO PRASETYO PRAKOSO, S.Psi', NULL, NULL, NULL, NULL, 'Tegalsari RT 02 RW 15, Sragen kulon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647064464', 'beentoro1985@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(284, '3314136806690001', 'Candra Asruria', NULL, NULL, NULL, NULL, 'Ngeseng RT 03/ 03 gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82136369029', 'Mba candra@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(285, '3314061101830002', 'Catur Sutrisno, AMK', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8122609197', 'caturvanza@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(286, '3314135404710003', 'DARTI', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82134892727', 'budarti125@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(287, '3314124406970003', 'Devi Novitasari, SE', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '88983070200', 'devinovitasari4697@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(288, '3314134912920001', 'DEVI SARWANTI,Amd.Kep', NULL, NULL, NULL, NULL, 'Mijahan Rt 07/01, Ngembatpadas, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85740259352', 'devy.emboaba@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(289, '3314031903920004', 'dr.YOSSI REZA GIMAWAN', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81327008006', 'dr.yossireza@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(290, '3314097112900017', 'Dwi Astuti Handayani', NULL, NULL, NULL, NULL, 'Saradan rt 08 rw 03 karangmalang sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85225631665', 'Astezzander@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(291, '3314015701930007', 'Efi Wulansari, AMd.Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85601786378', 'efiwulansari1@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(292, '3314126810920004', 'Eka Okta Lili, A.Md.Kep', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ekaoktalili@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(293, '3314136501830003', 'Eka Widiyana puspitasari', NULL, NULL, NULL, NULL, 'Ngroto RT 02 RW 01.Gemolong ,peleman', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82138720883', 'Ekawidiyana903@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(294, '3314134307000006', 'Else Julfani Desti', NULL, NULL, NULL, NULL, 'Nganti Rt 04 Rw 02, Nganti, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81229415573', 'julfanielse@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(295, '3314016302880006', 'ELY RATNAWATI, A Md.Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81328921023', 'ely547078@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(296, '3314165508910004', 'ENDANG AGUSTINA, S.Kom', NULL, NULL, NULL, NULL, 'SIDOMULYO RT 17 KEDAWUNG MONDOKAN SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85786390918', 'agustinae308@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(297, '3314024811960002', 'Endang Narwanti, A.Md.Kep', NULL, NULL, NULL, NULL, 'Pedak Rt 02, karangwaru, Plupuh, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82243661701', 'narwantiendang@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(298, '331402550377015', 'ENI HERMAWATI, SE, MM. ', NULL, NULL, NULL, NULL, 'Mrakean RT 020/009 Sambirejo, Plupuh, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82134702083', 'eniwalen@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(299, '3314146804870002', 'ENNY WIDIYATSIH ,AMK', NULL, NULL, NULL, NULL, 'Tanjungsari Rt.02/- , jeruk , miri ,sargen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85726151597', 'teshp60@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(300, '3314025104910004', 'Eny Verryastuti Indriani, A.Md.Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81229786150', 'enyverryastuti2021@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(301, '3314124511910002', 'Erna Andriyani, Amd.Keb', NULL, NULL, NULL, NULL, 'Candi RT 08, bonagung, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82242171512', 'ernaandriyani65@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(302, '3311044608870005', 'ERNAWATI, Amd.Kep', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ernawat87@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(303, '3314136610920001', 'Esya Iriandica Al Ashfiha, S.Tr.Keb.', NULL, NULL, NULL, NULL, 'Nglangak Rt.01/01, Kwangen, Gemolong, Sragen.', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81578197815', 'esyasevenfoldsim@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(304, '1111166909900001', 'Eti Safriana Amd.Keb', NULL, NULL, NULL, NULL, 'Gemolong rt 06 rw 2 gemolong sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82113163761', 'etisafriana@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(305, '3314015312970001', 'FAJAR RINA, A.Md.Kes', NULL, NULL, NULL, NULL, 'Botorejo rt 07 rw 02, Tegalombo, Kalijambe, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85727239130', 'Fajharrhyna@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(306, '3314134210010002', 'FENI RAHMAWATI', NULL, NULL, NULL, NULL, 'Banjarsari Rt 04/01 Kragilan Gemolong Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85157964642', 'Feniirahma02@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(307, '3314014701950001', 'FERI NIKE WIJAYANTI A.Md.RMIK', NULL, NULL, NULL, NULL, 'NGAMPON RT 07 KRIKILAN KALIJAMBE SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82134529370', 'Ferinikewijayanti@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(308, '3314131901870005', 'Galih Rakasiwi S, AMd.Kep', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85702356666', 'galihrakasiwi05@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(309, '3314132309920003', 'HANDOKO BUDI SANTOSO', NULL, NULL, NULL, NULL, 'Ngeseng Rt:19 Rw:06, Kwangen, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85702245601', 'handokobudi81@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(310, '3314125902870006', 'HENI HERAWATI SE', NULL, NULL, NULL, NULL, 'Canden rt 04, ketro, tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85725287419', 'heniherawati33@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(311, '3315044504950002', 'HENY WINDARTI, Amd. Kep', NULL, NULL, NULL, NULL, 'Pulorejo RT 04 RW 08 , Dimoro , Toroh , Grobogan', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82220831886', 'windartiheny25@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(312, '3314132611750002', 'HERI PURNAMA', NULL, NULL, NULL, NULL, 'KAUMAN LOR RT 01/04 GEMOLONG, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393726316', 'herip8164@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(313, '3314126506930005', 'HERVI HILDA JUNISTIAN, A.Md.Keb', NULL, NULL, NULL, NULL, 'Cengklik Rt. 016/-, Gading, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82221834415', 'hervijunistian@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(314, '3314015912860003', 'IKA DIYASTUTI, SH', NULL, NULL, NULL, NULL, 'CANDIREJO RT 14 , KWANGEN , GEMOLONG', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85737254554', 'Ikhadiyas@gmail.com ', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(315, '3318116205900001', 'IKA PURNAMASARI, Amd.Keb', NULL, NULL, NULL, NULL, 'Grogol rt 06 rw 02 kragilan,gemolong,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85867213254', 'ika90purnamasari@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(316, '33141256612750001', 'INDRIYANI', NULL, NULL, NULL, NULL, 'Dukuh Kulon Rt 9b, karangasem, tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82136746354', 'Irsyadsriwidodo@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(317, '3314126904920001', 'ISNAINY FUTIKHAT JANNAH Amd.Kom', NULL, NULL, NULL, NULL, 'Ngemplak RT 06 Sambirejo Plupuh', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85155124699', 'isnaisnainy361@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(318, '3314136604930003', 'Ita Rahayu Aprilia AMd,keb', NULL, NULL, NULL, NULL, 'Slemben RT 03 duwet baki sukoharjo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85643145162', 'ita.rahayu1993@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(319, '3314020702940006', 'Joko Prayitno', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81239190386', 'Jokoprayitno3044@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(320, '3314132607850006', 'JULIARTO,S.Kom', NULL, NULL, NULL, NULL, 'GANDU RT 01/01, NGANTI, GEMOLONG, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82226307223', 'joeliafkar@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(321, '3314144404870002', 'Kadek Cici Puspitasari amf', NULL, NULL, NULL, NULL, 'Mijahan, RT 07 ngembat Padas, gemolong', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728835533', 'cicikadek02@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(322, '3314134510740003', 'Kristi Widowati, AMK', NULL, NULL, NULL, NULL, 'Prampalan rt 21 rw 5, krikilan ,masaran,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85848962054', 'Kristiwidowati29@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(323, '3314130304610002', 'LIL MUTTAQIN', NULL, NULL, NULL, NULL, 'Candi rt 08 re 04,gemolong,gemolong,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85293781600', 'lilmuttaqin4@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(324, '3314136601890002', 'Lina Retno Widi A, A.Md', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82218957936', 'isyahidahlina@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(325, '3314175504920001', 'LISA APRIL LIYANA,Amd,keb', NULL, NULL, NULL, NULL, 'Sambirejo rt 03 ,newung,sukodono,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82220877117', 'lisagemolong723@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(326, '3311104508950003', 'MAULIDA AINURRAHMA, S.Kep.,Ns', NULL, NULL, NULL, NULL, 'DUKUH RT 003/003, SANGGRAHAN, GROGOL, SUKOHARJO', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647545302', 'Maulida.ainurrahma1995@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(327, '3314124210940001', 'Mega Oktavia, Amd.Keb', NULL, NULL, NULL, NULL, 'Brumbung Rt 12 Karangasem Tanon Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85540433787', 'bidanmegaoktavia@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(328, '3314014305930002', 'Mei Ika Purwanti, AMd.Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85727466998', 'meiikapurwantie7@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(329, '3314035907950002', 'MERRY MEGAWATI,Amd.Keb', NULL, NULL, NULL, NULL, 'PANDAK KULON RT 02,RW 01, KRIKILAN, MASARAN, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81390548656', 'merrymegawati19@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(330, '3311112007920002', 'MUHAMMAD THOUFIQ ABDULLAH,A.Md.Kep', NULL, NULL, NULL, NULL, 'Sanggung Rt 03 Rw 01, Sanggung, Gatak, Sukoharjo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82243028100', 'muhammad.thoufiq92@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(331, '3314136001870004', 'NANI ENDANG KUSNINGSIH, AMK', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87838385485', 'naniendangkusningsih@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(332, '3314015805920003', 'Nova Lusiana, AMd. Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85743007875', 'novaabyan92@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(333, '3314126911900001', 'Novia Nur Handayani, A.Md.Kep', NULL, NULL, NULL, NULL, 'Sidorejo rt 1 ngrombo plupuh ', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82298562713', 'Novianurhandayani065@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(334, '3314097011970004', 'Novie Prawesti Ningtyas, S.Kep. Ns', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82170816667', 'novieprawesti5@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(335, '3314015501880047', 'Ns.Ariyanti,S.Kep', NULL, NULL, NULL, NULL, 'Ngrungkap,Rt 04,Tempelrejo,Mondokan,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81228125494', 'agungayahkhaila.123@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(336, '33142450680008', 'Nur Khayati, AMK', NULL, NULL, NULL, NULL, '33142450680008', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393594818', 'nofalsyafiq@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(337, '3314042812800003', 'Parlan, S.Kep ', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85225011265', 'farlanpratama@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(338, '3313145009820001', 'PARTI,Amd.keb', NULL, NULL, NULL, NULL, 'Karangkidul RT 08 RW 01 ,Pulosari,Kebakkramat ,Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81390057240', 'sarisyita@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(339, '3314120809690006', 'Paryoto', NULL, NULL, NULL, NULL, 'Geneng rt 03 Karang asem,Tanon, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81310657115', 'paryoto560@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(340, '3314114706950002', 'Pipin Zukhruf Istiqomah, A.Md.Kep', NULL, NULL, NULL, NULL, 'Tlobongan Rt 22 Sidoharjo, Sidoharjo, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '83865025694', 'Pi2nzukhruf@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(341, '3313116801790000', 'PUJI ASTUTI,Amd Kep', NULL, NULL, NULL, NULL, 'Grumbulsawit RT 06 RW 01,Sroyo,Jaten,Karanganyar', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85102840506', 'puji20192@mail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(342, '620903569820001', 'Puji Hastuti, AMK', NULL, NULL, NULL, NULL, 'Jln.sudiro rt 07/ rw- desa kujan kel.bulik kab.lamandau kal-teng', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81337888043', 'Fazzasyarir3@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(343, '3314024703960001', 'Puput Lestari, AMd.Kep', NULL, NULL, NULL, NULL, 'Bulurejo Rt14 Rw 3 ngrombo plupuh sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0882-9907-1815', 'puputlestari774@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(344, '3314146910970001', 'Putri Herning Hermawati , AMd.Keb', NULL, NULL, NULL, NULL, 'Krandon Rt 20 , geneng , miri , sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82224075760', 'Putriherning29@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(345, '3374021508830012', 'Rajendra Prima Ariyanto,SKM', NULL, NULL, NULL, NULL, 'Mangkang kulon RT 03 Semarang', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85719128385', 'primafarikhah@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(346, '3314144207960002', 'Reka Ambar Julita Saputri, Amd.Kes', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82223159499', 'reka.juli@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(347, '3314135306970002', 'Retno Wulandari', NULL, NULL, NULL, NULL, 'Blimbing 06/02 kalangan, gemolong, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82243776142', 'retno.pa2019@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(348, '2102025102950009', 'RYZMA WULAN UTAMI, AMd.Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329929211', 'ryzmawulan11@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(349, '3313135902950001', 'Sabila Rosyida Sujadi, A.Md', NULL, NULL, NULL, NULL, 'Turus 03/14, Brangkal, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85329055909', 'sabilarosyidasujadi@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(350, '3314135102840680', 'SEPI SUMYARNI', NULL, NULL, NULL, NULL, 'Kauman RT 02 RW 01 Gemolong, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81392448310', 'dennisahmad76@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(351, '3374104306890001', 'Serly Purnamasari, AMd.Kep', NULL, NULL, NULL, NULL, 'Kalangan RT 18 ngembatpadas, gemolong, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81221073998', 'Serlypurnamasari@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(352, '3314104305820000', 'Sri Lestari Spd', NULL, NULL, NULL, NULL, 'Jetak Kalang Rt 03, Jetak, Sidoharjo, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329500035', 'gesyaazzahra@yahoo.co.id', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(353, '3314026610850002', 'Sri wahyuni,Amd.pk', NULL, NULL, NULL, NULL, 'Tlobong rt 008 rw 003,jabung,plupuh,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81220204981', 'aagustian127@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(354, '3314120401700004', 'Sri Widodo', NULL, NULL, NULL, NULL, 'Dukuh Kulon Rt 9b, karangasem, tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82136746354', 'Irsyadsriwidodo@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(355, '3314102012790011 ', 'Sumarno', NULL, NULL, NULL, NULL, 'Ngince rt 05 rw 05 karang tengah sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82134358009', 'marnosu283@gial.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(356, '3314121203660001', 'Sunardi', NULL, NULL, NULL, NULL, 'Karang asem Rt 31 , Karang asem, Tanon, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85233572842', 'sunardiimung@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(357, '33144130209800005', 'Supatno Wibowo', NULL, NULL, NULL, NULL, 'RT 05  bakalan Miri sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '83865603506', 'supatnowibowo4@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(358, '3314026807870001', 'SURATMI, Amd.Kep', NULL, NULL, NULL, NULL, 'Ngepungsari Rt 016, Rw 06, kwangen, gemolong, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82221979199', 'amisuratmi528@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(359, '3314125704830006', 'Sutarti', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sutarti294@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(360, '3314134302770004', 'TARI WIDIASTUTI', NULL, NULL, NULL, NULL, 'Joyorejan Rt 06,Gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82135558506', 'tariwidiastuti575@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(361, '3314144909950002', 'TITIA KUSUMA WIJAYANTI,S.Tr.Kep.Ns', NULL, NULL, NULL, NULL, 'Soko, RT 09 RW 02, Soko, Miri, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '83866116324', 'titiakusuma508@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(362, '3314145301970001', 'TITIK KURNIYATI, A.Md.', NULL, NULL, NULL, NULL, 'Karang RT 02, Geneng, Miri, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728423453', 'titikkurniyati97@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(363, '3314144204970001', 'Titik Sumartiningsih, Amd.Kep', NULL, NULL, NULL, NULL, 'Gempol sari jeruk RT 05 jeruk Miri Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85875996001', 'titiksumartiningsih12@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(364, '33140305940002', 'TRI MULYONO, A.Md.RMIK', NULL, NULL, NULL, NULL, 'Sambirobyong Rt 11, Ngargosari, Sumberlawang, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82221393665', 'mulyonotri024@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(365, '331413030992007', 'Tri Wijayanto', NULL, NULL, NULL, NULL, 'Gandurejo rt 05 rw 03', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85726670433', 'Triwijayanto230@yahoo.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(366, '3311104910810005', 'Triana Damayanti S.Farm.Apt', NULL, NULL, NULL, NULL, 'Daleman Rt 02 Rw 02, Jetis, Baki, Sukoharjo', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '895631909864', 'inayanti1981@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(367, '3314131210700004', 'TUGIYO', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82325650720', 'kungtugiyo70@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(368, '3314125708870002', 'Ullin Nuhasari ,Amd.Keb', NULL, NULL, NULL, NULL, 'Bedono Rt 13, Pengkol, Tanon ,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647967570', 'ullinnuhasari2019@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(369, '3314135604940002', 'ULVY AYU SETYORINI, A. Md. Keb', NULL, NULL, NULL, NULL, 'Warungurip Rt 019 Rw 003 Kragilan, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85772109169', 'ulvyayustyorini@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(370, '1607055503850003', 'UMI ROSIDAH SETYOWATI.S.Kep.Ns', NULL, NULL, NULL, NULL, 'Plupuh rt 02/ plupuh Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '88220073445', 'rosidah.argadaffa@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(371, '3314125906850006', 'Umi Zainah, AMK', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81225917040', 'umizainah231@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(372, '3314134403880003', 'Vivi Anggraini, A.Md.PK', NULL, NULL, NULL, NULL, 'Ngeseng, Rt 03 Rw.03, Gemolong, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85642189944', 'vivianggraini.4@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(373, '3314135801920001', 'Wahyu Jatiningrum, AMd.Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81392416633', 'wardoyocikal@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(374, '3314036807850046', 'Winarsih, A.Md', NULL, NULL, NULL, NULL, 'Rejowinangun rt16,masaran,masaran,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82136938195', 'winaghifari@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(375, '331402620783004', 'WINARTI, AMK', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82138329502', 'winartiwin181@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(376, '3314057112940012', 'Wiwik Wulandari, AMd.Keb', NULL, NULL, NULL, NULL, 'Gempol Rt.10, Sambirejo, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8886854527', 'wiwik.wln94@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(377, '3314025107870001', 'YULIA KUS ARIFAH, AMF', NULL, NULL, NULL, NULL, 'Dukuhrambat RT 10, Banaran, Kalijambe, Sragen ', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82323625088', 'yuliakarifah@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(378, '3314136502950002', 'Annisa Febri Kusuma Wardani, A.Md. RMIK', NULL, NULL, NULL, NULL, 'Cluntang rt7, peleman, gemolong, sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81804431758', 'Annisafebry32@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(379, '3309172111950002', 'Aziz Nur Rohman', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shafaalmeera70@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(380, '331413290200000', 'CAHYO PONCO NUGROHO', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85702187312', 'cahyoponcon69@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(381, '3314156606900002', 'Daniasri Purwaningsih A.Md.Keb', NULL, NULL, NULL, NULL, 'Ngrendeng RT 20, Kaloran, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82221328509', 'daniasri52@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(382, '3173042501820010', 'dr. Otniel Wendy Wahono, Sp.PK', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81296603163', 'otniel@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(383, '3314135309960001', 'dr.AULIYA ROHMANI', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85740936661', 'arohmani13@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(384, '3314076603830003', 'dr.UMMI RINANDARI, Sp.DV', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82143311355', 'ummir@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(385, '3314011602830002', 'DWI HASTONO', NULL, NULL, NULL, NULL, 'Ngemplak rt13 rw 6, banaran,kalijambe,sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85248569739', 'dwihastono.1289@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(386, '3314086103780005', 'Dwi Indah Wulansari,SE', NULL, NULL, NULL, NULL, 'Perum megah inti no 12 A kroyo krmalang sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85227997666', 'idah79369@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(387, '3372020804950001', 'EDGAR LESTYA NALA PRAYA,AMK', NULL, NULL, NULL, NULL, 'Joyodiningratan RT 04 RW 05, Kratonan Serengan Surakarta', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85601267003', 'Lovaulia.lestya@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(388, '3314154706990002', 'EKA RAHMARIM SUCI MANAR., A.Md. Kep', NULL, NULL, NULL, NULL, 'PLOSOREJO RT.02, PAGAK, SUMBERLAWANG, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85642344706', 'ekar0706@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(389, '3314114601980001', 'ENNY SULISTIYORINI,A.Md.Kep', NULL, NULL, NULL, NULL, 'Jetak Kalang Rt 01 Rw 02, Jetak, Sidoharjo, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82325544401', 'ennysulistiyorini@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(390, '3314112510950004', 'GURUH ADHI PUTRO AMd. Kep', NULL, NULL, NULL, NULL, 'Dayu Rt 29 Rw 08, Jurangjero, Karangmalang, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87714745445', 'Guruhadhi684@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(391, '3314136305940001', 'HERTA NURJAYANTI', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82232442117', 'nurjayantiherta@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(392, '3314134902880004', 'IKA INDARWATI, A.Md.Keb', NULL, NULL, NULL, NULL, 'Gemolong RT 03 Rw 03, gemolong,gemolong,Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329313574', 'ika.dwi.88@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(393, '3522030905930001', 'Mei Candra Satria MJ, A.Md.Rad', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satriacandra20@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(394, '3314015003950004', 'Nila Fitri Wulandari, A.Md, Keb', NULL, NULL, NULL, NULL, 'Pilangsari Rt 11 Rw 04, Wonorejo, Kalijambe, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85701013949', 'Nilafitri95@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(395, '3315045709950003', 'NUR HIDAYAH, Amd.Kep', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82243680311', 'hidaseptember858@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(396, '3314101412010001', 'Riandika Prihantoro', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'riandika863@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(397, '3314135609720002', 'Salminah', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85728066142', 'salminah678@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(398, '3314156612940001', 'Sella Elvida Sari, A.Md.Keb', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81228645588', 'Sellaelvida774@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(399, '3314131801640001', 'SUGITO, S.Kep', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329006019', 'abahsugito@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(400, '3314145906730001', 'SUNARSIH', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81393475842', 'sunarsihsunarsih35368@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(401, '3314125704830006', 'SUTARTI, AMK', NULL, NULL, NULL, NULL, 'SUKOREJO RT. 07, PADAS, TANON, SRAGEN', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '81329006780', 'yayatnonanona533832@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(402, '3314136101920005', 'Tri Nuryani, Amd.Keb', NULL, NULL, NULL, NULL, 'Sarigunan Rt 09 Rw 02, Kragilan, Gemolong, Sragen', '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85828467679', 'trinuryani543@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1),
	(403, '3314136306870002', 'Vila Hening Qur\'ana, SE', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, '1', '1', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85647898900', 'vyela.vyela@gmail.com', '10', NULL, 'bwa.jpg', '25d55ad283aa400af464c76d713c07ad', '3', '2022-03-04 07:56:41', NULL, 1);
/*!40000 ALTER TABLE `data_pegawai` ENABLE KEYS */;

-- Dumping structure for table sidian.data_pendidikan
CREATE TABLE IF NOT EXISTS `data_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `jenjang` varchar(200) NOT NULL,
  `nama_sekolah` varchar(220) NOT NULL,
  `jurusan` varchar(200) NOT NULL,
  `tgl_lulus` date NOT NULL,
  `pterakhir` int(5) NOT NULL,
  `ijazah` varchar(220) NOT NULL,
  `transkrip` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.data_pendidikan: ~4 rows (approximately)
/*!40000 ALTER TABLE `data_pendidikan` DISABLE KEYS */;
INSERT IGNORE INTO `data_pendidikan` (`id_pendidikan`, `nip`, `jenjang`, `nama_sekolah`, `jurusan`, `tgl_lulus`, `pterakhir`, `ijazah`, `transkrip`, `create_at`, `update_at`) VALUES
	(1, '199601142020121007', '10', 'UNIVERSITAS SEBELAS MARET', 'TEKNIK INFORMATIKA', '2017-06-07', 0, 'pdfcoffee_com_proposal-in-house-training-skpdocx-pdf-free.pdf', 'adoc_pub_proposal.pdf', '2022-02-20 08:39:28', NULL),
	(2, '199601142020121007', '12', 'STMIK SINAR NUSANTARA', 'TEKNIK INFORMATIKA', '2019-08-08', 0, 'IHT_PPI_Dasar.pdf', 'IHT_-_Apar.pdf', '2022-02-20 08:41:02', NULL),
	(3, '0123456789', '10', 'Universitas Sebelas Maret Surakarta', 'KEPERAWATAN', '2022-02-20', 0, 'dwi1.pdf', 'Proposal_Penawaran_Pelatihan_Bidang_Desain_dan_Multimedia_Bulan_Maret_2022_-_RSUD_dr__Soeratno_Gemolong.pdf', '2022-02-20 17:12:48', '2022-02-20 17:12:48'),
	(4, '199601142020121007', '13', 'UNIVERSITAS GADJAH MADA', 'TEKNIK INFORMATIKA', '2020-02-20', 0, 'b_depan1.jpg', 'b_belakang.jpg', '2022-02-20 22:55:28', '2022-02-20 22:55:28');
/*!40000 ALTER TABLE `data_pendidikan` ENABLE KEYS */;

-- Dumping structure for table sidian.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_masterjabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_masterjabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.jabatan: ~95 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT IGNORE INTO `jabatan` (`id_masterjabatan`, `nama_jabatan`, `create_at`, `update_at`) VALUES
	(1, 'Jabatan Belum Dipilih', '2021-11-17 09:04:15', NULL),
	(2, 'Kepala Bagian Sekretariat', '2022-02-19 22:14:01', '2022-02-19 22:14:01'),
	(3, 'Kepala Bidang Pelayanan dan Penunjang', '2022-02-19 22:14:15', '2022-02-19 22:14:15'),
	(4, 'Kepala Bidang Pengembangan dan Informasi', '2022-02-19 22:19:02', '2022-02-19 22:19:02'),
	(5, 'Kasi Pelayanan Medis dan Penunjang Medis', '2021-11-06 09:22:55', NULL),
	(6, 'Kasi Keperawatan dan Penunjang Non Medis', '2021-11-06 09:23:12', NULL),
	(7, 'Kasi Pengembangan Kerjasama dan Diklat', '2021-11-06 09:23:29', NULL),
	(8, 'Kasi Informasi dan Pemasaran', '2021-11-06 09:23:41', NULL),
	(9, 'Kasubag Perencanaan, Evaluasi dan Pelaporan', '2021-11-06 09:24:05', NULL),
	(10, 'Kasubag Keuangan', '2021-11-06 09:24:26', NULL),
	(11, 'Kasubag Umum dan Kepegawaian', '2021-11-06 09:24:42', NULL),
	(12, 'Perawat Terampil', '2021-11-06 10:02:17', NULL),
	(13, 'Perawat Mahir', '2021-11-06 10:02:27', NULL),
	(14, 'Perawat Penyelia', '2021-11-06 10:02:37', NULL),
	(15, 'Perawat Ahli Pertama', '2021-11-06 10:02:46', NULL),
	(16, 'Perawat Ahli Muda', '2021-11-06 10:02:54', NULL),
	(17, 'Perawat Ahli Madya', '2021-11-06 10:03:02', NULL),
	(18, 'Perawat Ahli Utama', '2021-11-06 10:03:10', NULL),
	(19, 'Bidan Terampil', '2021-11-06 10:06:25', NULL),
	(20, 'Bidan Mahir', '2021-11-06 10:06:29', NULL),
	(21, 'Bidan Penyelia', '2021-11-06 10:06:38', NULL),
	(22, 'Bidan Ahli Pertama', '2021-11-06 10:06:45', NULL),
	(23, ' Bidan Ahli Muda', '2021-11-06 10:06:54', NULL),
	(24, 'Bidan Ahli Madya', '2021-11-06 10:07:01', NULL),
	(25, 'Bidan Ahli Utama', '2021-11-06 10:07:22', '2021-11-06 10:07:22'),
	(26, 'Apoteker Ahli Pertama', '2022-02-19 22:30:19', '2022-02-19 22:30:19'),
	(27, 'Apoteker Ahli Muda', '2022-02-19 22:30:34', '2022-02-19 22:30:34'),
	(28, 'Apoteker Ahli Madya', '2022-02-19 22:30:54', '2022-02-19 22:30:54'),
	(29, 'Apoteker Ahli Utama', '2022-02-19 22:31:04', '2022-02-19 22:31:04'),
	(30, 'Pranata Komputer Terampil', '2021-11-06 10:09:13', NULL),
	(31, ' Pranata Komputer Mahir', '2021-11-06 10:09:48', NULL),
	(32, 'Pranata Komputer Penyelia', '2021-11-06 10:09:57', NULL),
	(33, 'Pranata Komputer Ahli Pertama', '2021-11-06 10:10:05', NULL),
	(34, 'Pranata Komputer Ahli Muda', '2021-11-06 10:10:13', NULL),
	(35, 'Pranata Komputer Ahli Madya', '2021-11-06 10:10:26', NULL),
	(36, 'Pranata Komputer Ahli Utama', '2021-11-06 10:10:39', NULL),
	(37, 'Perekam Medis Pelaksana', '2021-11-06 10:11:16', NULL),
	(38, 'Perekam Medis Pelaksana Lanjutan', '2021-11-06 10:11:29', NULL),
	(39, 'Perekam Medis Penyelia', '2021-11-06 10:11:37', NULL),
	(40, 'Perekam Medis Pertama', '2021-11-06 10:11:47', NULL),
	(41, 'Perekam Medis Muda', '2021-11-06 10:11:54', NULL),
	(42, 'Perekam Medis Madya', '2021-11-06 10:12:02', NULL),
	(44, 'Direktur', '2021-11-17 09:04:12', NULL),
	(45, 'Pengadministrasi Umum', '2022-02-19 22:47:00', '2022-02-19 22:47:00'),
	(46, 'Dokter Pertama', '2022-02-19 22:28:34', NULL),
	(47, 'Dokter Muda', '2022-02-19 22:28:46', NULL),
	(48, 'Dokter Madya', '2022-02-19 22:28:55', NULL),
	(49, 'Dokter Utama', '2022-02-19 22:29:05', NULL),
	(50, 'Nutrisionis Pelaksana', '2022-02-19 22:32:14', NULL),
	(51, 'Nutrisionis Pelaksana Lanjutan', '2022-02-19 22:32:23', NULL),
	(52, 'Nutrisionis Pelaksana Penyelia', '2022-02-19 22:32:31', NULL),
	(53, 'Nutrisionis Pertama', '2022-02-19 22:32:42', NULL),
	(54, 'Nutrisionis Muda', '2022-02-19 22:32:50', NULL),
	(55, 'Nutrisionis Madya', '2022-02-19 22:32:59', NULL),
	(56, 'Pranata Lab. Kes. Pelaksana Pemula', '2022-02-19 22:37:21', NULL),
	(57, 'Pranata Lab. Kes. Pelaksana', '2022-02-19 22:37:32', NULL),
	(58, 'Pranata Lab. Kes. Pelaksana Lanjutan', '2022-02-19 22:37:43', NULL),
	(59, 'Pranata Lab. Kes. Penyelia', '2022-02-19 22:37:55', NULL),
	(60, 'Pranata Lab. Kes. Pertama', '2022-02-19 22:38:19', NULL),
	(61, 'Pranata Lab. Kes. Muda', '2022-02-19 22:38:29', NULL),
	(62, 'Pranata Lab. Kes. Madya', '2022-02-19 22:38:36', NULL),
	(63, 'Sanitarian Pelaksana Pemula', '2022-02-19 22:40:05', NULL),
	(64, 'Sanitarian Pelaksana', '2022-02-19 22:40:14', NULL),
	(65, 'Sanitarian Pelaksana Lanjutan', '2022-02-19 22:40:29', NULL),
	(66, 'Sanitarian Penyelia', '2022-02-19 22:40:39', NULL),
	(67, 'Sanitarian Pertama', '2022-02-19 22:40:57', NULL),
	(68, 'Sanitarian Muda', '2022-02-19 22:41:02', NULL),
	(69, 'Sanitarian Madya', '2022-02-19 22:41:10', NULL),
	(70, 'Perawat Gigi Terampil', '2022-02-19 22:42:32', NULL),
	(71, 'Perawat Gigi Mahir', '2022-02-19 22:42:43', NULL),
	(72, 'Perawat Gigi Penyelia', '2022-02-19 22:42:49', NULL),
	(73, 'Perawat Gigi Ahli Pertama', '2022-02-19 22:43:06', NULL),
	(74, 'Perawat Gigi Ahli Muda', '2022-02-19 22:43:13', NULL),
	(75, 'Perawat Gigi Ahli Madya', '2022-02-19 22:43:20', NULL),
	(76, 'Fisioterapis Pelaksana', '2022-02-19 22:45:54', NULL),
	(77, 'Fisioterapis Pelaksana Lanjutan', '2022-02-19 22:46:04', NULL),
	(78, 'Fisioterapis Penyelia', '2022-02-19 22:46:12', NULL),
	(79, 'Fisioterapis Pertama', '2022-02-19 22:46:20', NULL),
	(80, 'Fisioterapis Muda', '2022-02-19 22:46:28', NULL),
	(81, 'Fisioterapis Madya', '2022-02-19 22:46:35', NULL),
	(82, 'Asisten Apoteker Pelaksana Pemula', '2022-02-19 22:47:40', NULL),
	(83, 'Asisten Apoteker Pelaksana', '2022-02-19 22:47:50', NULL),
	(84, 'Asisten Apoteker Pelaksana Lanjutan', '2022-02-19 22:47:58', NULL),
	(85, 'Asisten Apoteker Penyelia', '2022-02-19 22:48:09', NULL),
	(86, 'Teknisi Elektromedis Terampil', '2022-02-19 22:50:07', NULL),
	(87, 'Teknisi Elektromedis Mahir', '2022-02-19 22:50:51', NULL),
	(88, 'Teknisi Elektromedis Penyelia', '2022-02-19 22:50:59', NULL),
	(89, 'Teknisi Elektromedis Ahli Pertama', '2022-02-19 22:51:16', NULL),
	(90, 'Teknisi Elektromedis Ahli Muda', '2022-02-19 22:51:21', NULL),
	(91, 'Teknisi Elektromedis Ahli Madya', '2022-02-19 22:51:28', NULL),
	(92, 'Radiografer Pelaksana', '2022-02-19 22:52:25', NULL),
	(93, 'Radiografer Pelaksana Lanjutan', '2022-02-19 22:52:31', NULL),
	(94, 'Radiografer Pelaksana Penyelia', '2022-02-19 22:52:43', NULL),
	(95, 'Radiografer Pertama', '2022-02-19 22:52:59', NULL),
	(96, 'Radiografer Muda', '2022-02-19 22:53:06', NULL),
	(97, 'Radiografer Madya', '2022-02-19 22:53:13', NULL),
	(98, 'Penyusun Laporan Keuangan', '2022-02-19 22:53:40', NULL),
	(99, 'Pengelola Kepegawaian', '2022-02-19 22:53:59', NULL),
	(100, 'Dokter Spesialis Kandungan Pertama', '2022-02-19 22:54:55', NULL),
	(101, 'Epidemiolog Kesehatan Ahli Pertama', '2022-02-19 22:56:43', NULL),
	(102, 'Epidemiolog Kesehatan Ahli Muda', '2022-02-19 22:56:52', NULL),
	(103, 'Epidemiolog Kesehatan Ahli Madya', '2022-02-19 22:57:01', NULL),
	(104, 'Epidemiolog Kesehatan Ahli Utama', '2022-02-19 22:57:10', NULL);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table sidian.jabatan_nonpns
CREATE TABLE IF NOT EXISTS `jabatan_nonpns` (
  `id_jabatannonpns` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(220) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jabatannonpns`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sidian.jabatan_nonpns: ~3 rows (approximately)
/*!40000 ALTER TABLE `jabatan_nonpns` DISABLE KEYS */;
INSERT IGNORE INTO `jabatan_nonpns` (`id_jabatannonpns`, `nama_jabatan`, `create_at`, `update_at`) VALUES
	(0, 'Jabatan Belum Dipilih', NULL, NULL),
	(1, 'Pelaksana Perawat', NULL, '2022-02-19 22:58:29'),
	(2, 'Staff IT', NULL, '2021-11-23 13:48:39');
/*!40000 ALTER TABLE `jabatan_nonpns` ENABLE KEYS */;

-- Dumping structure for table sidian.jenis_berkas
CREATE TABLE IF NOT EXISTS `jenis_berkas` (
  `id_jenisberkas` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_berkas` varchar(250) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jenisberkas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sidian.jenis_berkas: ~11 rows (approximately)
/*!40000 ALTER TABLE `jenis_berkas` DISABLE KEYS */;
INSERT IGNORE INTO `jenis_berkas` (`id_jenisberkas`, `jenis_berkas`, `create_at`, `update_at`) VALUES
	(1, 'Kartu Keluarga (KK)', '2022-02-20 13:59:10', '2022-02-20 14:00:03'),
	(2, 'KTP', '2022-02-20 14:00:12', NULL),
	(3, 'NPWP', '2022-02-20 14:00:20', NULL),
	(4, 'BPJS', '2022-02-20 14:00:24', NULL),
	(5, 'Karpeg', '2022-02-20 14:00:32', NULL),
	(6, 'Karis/karsu', '2022-02-20 14:00:40', NULL),
	(7, 'Taspen', '2022-02-20 14:00:48', NULL),
	(8, 'Tapera', '2022-02-20 14:00:53', NULL),
	(9, 'KP4', '2022-02-20 14:01:01', NULL),
	(10, 'SKP', '2022-02-20 16:35:03', '2022-02-20 16:35:16'),
	(11, 'Lainnya', '2022-02-20 16:35:27', NULL);
/*!40000 ALTER TABLE `jenis_berkas` ENABLE KEYS */;

-- Dumping structure for table sidian.jenis_pegawai
CREATE TABLE IF NOT EXISTS `jenis_pegawai` (
  `id_jenispegawai` int(11) NOT NULL AUTO_INCREMENT,
  `jpegawai` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jenispegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.jenis_pegawai: ~2 rows (approximately)
/*!40000 ALTER TABLE `jenis_pegawai` DISABLE KEYS */;
INSERT IGNORE INTO `jenis_pegawai` (`id_jenispegawai`, `jpegawai`, `create_at`, `update_at`) VALUES
	(1, 'PNS', '2021-10-18 11:33:20', '2021-10-18 11:33:20'),
	(2, 'PPPK (P3K)', '2022-01-31 09:12:50', '2022-01-31 09:12:50'),
	(3, 'Non ASN', '2022-02-02 12:55:20', '2022-02-02 12:55:20');
/*!40000 ALTER TABLE `jenis_pegawai` ENABLE KEYS */;

-- Dumping structure for table sidian.pangkat
CREATE TABLE IF NOT EXISTS `pangkat` (
  `id_masterpangkat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pangkat` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_masterpangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.pangkat: ~14 rows (approximately)
/*!40000 ALTER TABLE `pangkat` DISABLE KEYS */;
INSERT IGNORE INTO `pangkat` (`id_masterpangkat`, `nama_pangkat`, `create_at`, `update_at`) VALUES
	(1, 'Pangkat Belum Dipilih', '2021-11-17 08:38:11', NULL),
	(2, 'Juru Muda / IIa', '2021-11-17 08:37:10', NULL),
	(3, 'Juru Muda Tingkat I / IIb', '2021-10-15 15:51:34', NULL),
	(4, 'Pengatur / IIc', '2021-10-31 22:26:03', NULL),
	(5, 'Pengatur Tingkat I / IId', '2021-10-31 22:26:33', NULL),
	(6, 'Penata Muda / IIIa', '2021-10-31 22:26:52', NULL),
	(7, 'Penata Muda Tingkat I / IIIb', '2021-10-31 22:27:12', NULL),
	(8, 'Penata / IIIc', '2021-10-31 22:28:23', NULL),
	(9, 'Penata Tingkat I / IIId', '2021-10-31 22:28:53', NULL),
	(10, 'Pembina / IVa', '2021-10-31 22:29:09', NULL),
	(11, 'Pembina Tingkat I / IVb', '2021-10-31 22:29:20', NULL),
	(12, 'Pembina Utama Muda / IVc', '2021-10-31 22:29:44', NULL),
	(13, 'Pembina Utama Madya / IVd', '2021-10-31 22:32:52', '2021-10-31 22:32:52'),
	(14, 'Pembina Utama / IVe', '2021-11-17 08:38:43', NULL);
/*!40000 ALTER TABLE `pangkat` ENABLE KEYS */;

-- Dumping structure for table sidian.pendidikan
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id_masterpendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_masterpendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sidian.pendidikan: ~13 rows (approximately)
/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;
INSERT IGNORE INTO `pendidikan` (`id_masterpendidikan`, `pendidikan`, `create_at`, `update_at`) VALUES
	(1, 'Sekolah Dasar (SD)', '2022-01-31 09:18:36', '2022-01-31 09:18:36'),
	(3, 'Sekolah Menengah Pertama (SMP)', '2022-01-31 09:18:49', '2022-01-31 09:18:49'),
	(4, 'Sekolah Menengah Atas (SMA)', '2022-01-31 09:19:13', '2022-01-31 09:19:13'),
	(5, 'Sekolah Menengah Kejuruan (SMK)', '2022-01-31 09:19:31', '2022-01-31 09:19:31'),
	(8, 'Diploma I', '2021-10-18 11:17:40', NULL),
	(9, 'Diploma II', '2021-10-18 11:17:46', NULL),
	(10, 'Diploma III', '2021-10-18 11:17:52', NULL),
	(11, 'Diploma IV', '2021-10-18 11:17:58', NULL),
	(12, 'S-1 / Sarjana', '2022-02-08 12:44:03', '2022-02-08 12:44:03'),
	(13, 'S-2 / Magister', '2022-01-31 09:20:29', '2022-01-31 09:20:29'),
	(14, 'S-3 / Doctoral', '2022-01-31 09:20:43', '2022-01-31 09:20:43');
/*!40000 ALTER TABLE `pendidikan` ENABLE KEYS */;

-- Dumping structure for table sidian.profesi
CREATE TABLE IF NOT EXISTS `profesi` (
  `id_profesi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_profesi` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_profesi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sidian.profesi: ~7 rows (approximately)
/*!40000 ALTER TABLE `profesi` DISABLE KEYS */;
INSERT IGNORE INTO `profesi` (`id_profesi`, `nama_profesi`, `create_at`, `update_at`) VALUES
	(1, 'Profesi Belum Dipilih', '2022-02-02 12:46:35', '2022-02-02 12:46:35'),
	(2, 'Direksi', '2022-02-02 12:46:27', '2022-02-02 12:46:27'),
	(3, 'Dokter', '2022-02-02 12:46:21', '2022-02-02 12:46:21'),
	(4, 'Perawat', '2022-02-02 12:46:13', '2022-02-02 12:46:13'),
	(5, 'Bidan', '2022-02-02 12:46:06', '2022-02-02 12:46:06'),
	(6, 'Penunjang Medis', '2022-02-02 12:45:57', '2022-02-02 12:45:57'),
	(7, 'Penunjang Non Medis', '2022-02-02 12:45:43', '2022-02-02 12:45:43'),
	(8, 'Admin', '2022-02-02 12:45:30', NULL);
/*!40000 ALTER TABLE `profesi` ENABLE KEYS */;

-- Dumping structure for table sidian.unitkerja
CREATE TABLE IF NOT EXISTS `unitkerja` (
  `id_unitkerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unitkerja` varchar(220) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_unitkerja`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table sidian.unitkerja: ~23 rows (approximately)
/*!40000 ALTER TABLE `unitkerja` DISABLE KEYS */;
INSERT IGNORE INTO `unitkerja` (`id_unitkerja`, `nama_unitkerja`, `create_at`, `update_at`) VALUES
	(1, 'Unit Kerja Belum Dipilih', NULL, '2021-11-11 12:39:16'),
	(2, 'Kasir', NULL, NULL),
	(3, 'Informasi', NULL, NULL),
	(4, 'Keuangan', NULL, NULL),
	(5, 'Perencanaan', NULL, NULL),
	(6, 'Pengadaan', NULL, NULL),
	(7, 'Sanitasi ', NULL, NULL),
	(8, 'IPSRS', NULL, NULL),
	(9, 'Apotik', NULL, NULL),
	(10, 'Radiologi', NULL, NULL),
	(11, 'Fisioterapi', NULL, NULL),
	(12, 'Rekam Medis', NULL, NULL),
	(13, 'Pendaftaran', NULL, NULL),
	(14, 'Bangsal Kenanga', NULL, NULL),
	(15, 'Bangsal Anggrek', NULL, NULL),
	(16, 'Bangsal Cempaka', NULL, NULL),
	(17, 'Bangsal Tulip', NULL, NULL),
	(18, 'Bangsal Sakura', NULL, NULL),
	(19, 'IBS', NULL, NULL),
	(20, 'IGD', NULL, NULL),
	(21, 'ICU ', NULL, NULL),
	(22, 'LAB', NULL, NULL),
	(24, 'IT', NULL, NULL),
	(25, 'IPSRS', NULL, NULL);
/*!40000 ALTER TABLE `unitkerja` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
