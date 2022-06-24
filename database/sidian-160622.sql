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


-- Dumping database structure for sidian
CREATE DATABASE IF NOT EXISTS `sidian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sidian`;

-- Dumping structure for table sidian.bankdata
CREATE TABLE IF NOT EXISTS `bankdata` (
  `id_bankdata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(220) NOT NULL,
  `file` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bankdata`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

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
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

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
) ENGINE=InnoDB AUTO_INCREMENT=1364 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.data_cuti
CREATE TABLE IF NOT EXISTS `data_cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(200) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `verifikator` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

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
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.data_gajiberkala
CREATE TABLE IF NOT EXISTS `data_gajiberkala` (
  `id_gajiberkala` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `pangkat` varchar(220) NOT NULL,
  `tmt` date NOT NULL,
  `no_surat` varchar(220) NOT NULL,
  `tgl_surat` date NOT NULL,
  `file` varchar(220) NOT NULL,
  `kgb_mendatang` varchar(220) NOT NULL,
  `gaji_lama` varchar(220) NOT NULL,
  `gaji_baru` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `Column 12` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_gajiberkala`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.data_kompetensi
CREATE TABLE IF NOT EXISTS `data_kompetensi` (
  `id_kompetensi` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `jenis_kompetensi` varchar(250) DEFAULT NULL,
  `profesi` varchar(250) DEFAULT NULL,
  `no_surat` varchar(250) DEFAULT NULL,
  `tgl_terbit` date DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kompetensi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

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

-- Data exporting was unselected.

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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

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
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

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
  `status_aktif` varchar(50) DEFAULT '1',
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

-- Data exporting was unselected.

-- Dumping structure for table sidian.data_pendidikan
CREATE TABLE IF NOT EXISTS `data_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `jenjang` varchar(200) NOT NULL,
  `nama_sekolah` varchar(220) NOT NULL,
  `jurusan` varchar(200) NOT NULL,
  `no_ijazah` varchar(200) DEFAULT NULL,
  `tgl_lulus` date NOT NULL,
  `pterakhir` int(5) DEFAULT NULL,
  `ijazah` varchar(220) NOT NULL,
  `transkrip` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=527 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_masterjabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_masterjabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.jabatan_nonpns
CREATE TABLE IF NOT EXISTS `jabatan_nonpns` (
  `id_jabatannonpns` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(220) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jabatannonpns`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sidian.jenis_berkas
CREATE TABLE IF NOT EXISTS `jenis_berkas` (
  `id_jenisberkas` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_berkas` varchar(250) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jenisberkas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table sidian.jenis_pegawai
CREATE TABLE IF NOT EXISTS `jenis_pegawai` (
  `id_jenispegawai` int(11) NOT NULL AUTO_INCREMENT,
  `jpegawai` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jenispegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.pangkat
CREATE TABLE IF NOT EXISTS `pangkat` (
  `id_masterpangkat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pangkat` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_masterpangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.pendidikan
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id_masterpendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_masterpendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sidian.profesi
CREATE TABLE IF NOT EXISTS `profesi` (
  `id_profesi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_profesi` varchar(220) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_profesi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table sidian.unitkerja
CREATE TABLE IF NOT EXISTS `unitkerja` (
  `id_unitkerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unitkerja` varchar(220) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_unitkerja`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
