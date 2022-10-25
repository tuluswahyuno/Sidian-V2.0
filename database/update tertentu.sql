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

-- Dumping structure for table sidianyes.data_cuti
CREATE TABLE IF NOT EXISTS `data_cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(200) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `jenis_cuti` varchar(200) DEFAULT NULL,
  `alamat_cuti` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nama_atasan` varchar(250) DEFAULT NULL,
  `status_atasan` int(11) DEFAULT NULL,
  `alasan_atasan` varchar(200) DEFAULT NULL,
  `status_dir` int(11) DEFAULT NULL,
  `alasan_dir` varchar(200) DEFAULT NULL,
  `verifikator` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table sidianyes.data_cuti: ~4 rows (approximately)
/*!40000 ALTER TABLE `data_cuti` DISABLE KEYS */;
INSERT INTO `data_cuti` (`id_cuti`, `nip`, `keperluan`, `tgl_mulai`, `tgl_selesai`, `jenis_cuti`, `alamat_cuti`, `status`, `nama_atasan`, `status_atasan`, `alasan_atasan`, `status_dir`, `alasan_dir`, `verifikator`, `create_at`, `update_at`) VALUES
	(8, '199601142020121007', 'Liburan bersama keluarga', '2022-10-25', '2022-10-27', 'Cuti Tahunan', 'Fullerton Rd, Kayaziame, Lorobamen, Singapore 049213', 0, 'dr. MAYASARI AYU HENDRAWATI', 0, 'liburan terus nih, aku juga pengen bos', 0, 'oke bos', NULL, '2022-10-05 13:09:44', '2022-10-25 01:17:24'),
	(16, '199601142020121007', 'asdf', '2022-10-25', '2022-10-26', 'Cuti Tahunan', 'asdfasdfasdf', 1, 'IMAS WULANDARI, S.Kom., M.Eng.', NULL, NULL, NULL, NULL, NULL, '2022-10-25 08:19:53', '2022-10-25 01:37:46');
/*!40000 ALTER TABLE `data_cuti` ENABLE KEYS */;

-- Dumping structure for table sidianyes.data_surat
CREATE TABLE IF NOT EXISTS `data_surat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(200) DEFAULT NULL,
  `no_surat` varchar(200) DEFAULT NULL,
  `display_nosurat` varchar(200) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sidianyes.data_surat: ~4 rows (approximately)
/*!40000 ALTER TABLE `data_surat` DISABLE KEYS */;
INSERT INTO `data_surat` (`id_surat`, `nip`, `no_surat`, `display_nosurat`, `tgl_surat`, `keperluan`, `status`, `create_at`, `update_at`) VALUES
	(3, '199601142020121007', '03', '800 / 03 / 05.1.2 / 2022', '2022-10-11', 'Perpanjang SIPP', 2, '2022-10-10 10:16:40', '2022-10-25 01:52:16'),
	(4, '199601142020121007', '04', '800 / 04 / 05.1.2 / 2022', '2022-10-11', 'Mengikuti Pelatihan Dasar CPNS Tahun 2021-2022', 1, '2022-10-10 10:26:23', '2022-10-25 01:53:20'),
	(5, '199601142020121007', '05', '800 / 05 / 05.1.2 / 2022', '2022-10-25', 'Mengikuti Pelatihan Dasar CPNS', NULL, '2022-10-25 08:21:29', NULL),
	(6, '194601142020121007', '06', '800 / 06 / 05.1.2 / 2022', '2022-10-25', 'Tes TU', 1, '2022-10-25 08:49:38', '2022-10-25 01:52:11');
/*!40000 ALTER TABLE `data_surat` ENABLE KEYS */;

-- Dumping structure for table sidianyes.direktur
CREATE TABLE IF NOT EXISTS `direktur` (
  `id_direktur` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `nip` varchar(200) DEFAULT NULL,
  `pangkat` varchar(200) DEFAULT NULL,
  `golongan` varchar(200) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_direktur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sidianyes.direktur: ~1 rows (approximately)
/*!40000 ALTER TABLE `direktur` DISABLE KEYS */;
INSERT INTO `direktur` (`id_direktur`, `nama`, `nip`, `pangkat`, `golongan`, `jabatan`, `aktif`) VALUES
	(1, 'dr. KINIK DARSONO, M.Pd.Ked.', '19710415 200903 1 001', 'Pembina', 'IVa', 'Direktur', 1);
/*!40000 ALTER TABLE `direktur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
