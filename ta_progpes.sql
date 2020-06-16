-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2020 at 09:15 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_progpes`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

DROP TABLE IF EXISTS `anggaran`;
CREATE TABLE IF NOT EXISTS `anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggaran` varchar(250) NOT NULL,
  `uraian` varchar(250) NOT NULL,
  `anggaran` int(128) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `access_log` varchar(120) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `nama_anggaran`, `uraian`, `anggaran`, `tahun`, `access_log`, `created`) VALUES
(2, 'Anggaran 2019', 'Anggaran dari dana DIPA 2019', 200000000, '2019', '', '2019-07-04 03:59:18'),
(11, 'Anggaran Provinsi', 'Anggaran dari gubernur', 200000000, '2019', 'admin@admin.com', '2019-07-04 03:29:14'),
(12, 'Tes', 'asldk', 30000000, '2019', 'admin@admin.com', '2019-07-26 02:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `dayah`
--

DROP TABLE IF EXISTS `dayah`;
CREATE TABLE IF NOT EXISTS `dayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_dayah` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `id_kec` int(12) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `ka_dayah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dayah`
--

INSERT INTO `dayah` (`id`, `nm_dayah`, `alamat`, `desa`, `id_kec`, `telp`, `ka_dayah`) VALUES
(1, 'Al-Ikhlas', 'Beurawe', 'Beurawe', 5, '081264452216', 'Tgk. Ishak Amin'),
(2, 'Dayah Terpadu Inshafuddin', 'Jl.Taman Sri Ratu Safiatuddin No.3', 'Gampong Lambaro Skep', 5, '08126918175', 'Drs. Tgk. H. Abdullah Usman'),
(3, 'Darul Ulum', 'Jl. Syiahkuala No.5.Kampung Keramat', 'Kampung Keramat', 5, '085260903368', 'Tgk. Luqmanul Hidayat, M.Ag');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kec` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nm_kec`) VALUES
(1, 'Baiturrahman'),
(2, 'Meuraxa'),
(3, 'Lueng Bata'),
(4, 'Banda Raya'),
(5, 'Kuta Alam'),
(6, 'Syiah Kuala'),
(7, 'Kuta Raja'),
(8, 'Jaya Baru'),
(13, 'Ulee Kareng');

-- --------------------------------------------------------

--
-- Table structure for table `konsultan`
--

DROP TABLE IF EXISTS `konsultan`;
CREATE TABLE IF NOT EXISTS `konsultan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsultan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kodepos` int(8) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultan`
--

INSERT INTO `konsultan` (`id`, `nama_konsultan`, `alamat`, `kecamatan`, `kota`, `kodepos`, `provinsi`, `telpon`, `keterangan`) VALUES
(1, 'PT. Angin Ribut', 'Jalan Sore-sore', 'INgin Jaya', 'Lambaro City', 123123, 'DI YOGYAKARTA', '019230189812', 'Perusaahan Konstruksi Jakarta'),
(2, 'PT. Pertamini Constructor', 'Jln .Medan Perang No 19 Sampeng warteg Mbak Ndul', 'Syiah Kuala', 'Darusalam', 123123, 'ACEH', '0927123990', 'Perusahaan baru buka juga'),
(3, 'PT. Sejahtera dan Adil', 'LamLangang No. xx', 'Banda Sakti', 'Banda Aceh', 23837, 'ACEH', '0918868768', 'Perusahaan tambal ban');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `realisasi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_pekerjaan`, `sumber`, `realisasi`) VALUES
(1, 'Pekerjaan Panel Dinding IDG (Tampak Depan)', 'BPJS (HARBANG)', 'PER BULAN dan PEK 3 BULAN'),
(2, 'Pekerjaan Panel ACP (Teras IGD)', 'BPJS (HARBANG)', 'Per 3 Bulan'),
(3, 'Pengerjaan Tiang Panel IGD', 'BPJS (HARBANG)', 'Per 3 Bulan'),
(5, 'RENOVASI IPAL', 'YANMASUM', '3 Bulan Sekali');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE IF NOT EXISTS `petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(100) NOT NULL,
  `level` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nip`, `nama`, `username`, `pass`, `alamat`, `notelp`, `level`) VALUES
(1, 123456, 'Budiawan, S.E. M.Kom', 'budi', '$2y$10$a4en2/M.qPXuELCQfnpkSuYonOgZW6xc0jj.3wzhDNj1qhTkrG3v2', 'Kampung Jawa', '0979868216', 2),
(3, 1892179, 'Gogon, S.P', 'gogon', '$2y$10$a4en2/M.qPXuELCQfnpkSuYonOgZW6xc0jj.3wzhDNj1qhTkrG3v2', 'Kuta Alam', '098823627', 2);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_program` varchar(255) DEFAULT NULL,
  `thn_ajuan` year(4) DEFAULT NULL,
  `thn_realisasi` year(4) DEFAULT NULL,
  `ajuan` int(255) NOT NULL,
  `realisasi` int(11) NOT NULL,
  `id_dayah` int(50) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `id_koor` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `nm_program`, `thn_ajuan`, `thn_realisasi`, `ajuan`, `realisasi`, `id_dayah`, `status`, `file`, `id_koor`) VALUES
(6, 'Pembuatan Gedung Kelas', 2020, 2021, 500000000, 340000000, 2, 0, '59c2baaf35baa18c367e2424e1bbaa89.pdf', 1),
(5, 'Pembuatan Pagar Beton Dayah Al Ikhlas', 2020, 2021, 50000000, 40000000, 1, 1, 'e42f371102205ce7e33c62055b678fb8.pdf', 1),
(7, 'Pembuatan Meunasah Dayah', 2021, 2022, 200000000, 200000000, 3, 0, '583b3cf9bc4b8f5a09ab61fbee686ecb.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `progres`
--

DROP TABLE IF EXISTS `progres`;
CREATE TABLE IF NOT EXISTS `progres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `progres1` text DEFAULT NULL,
  `persen1` int(5) DEFAULT NULL,
  `img1` varchar(50) DEFAULT NULL,
  `progres2` text DEFAULT NULL,
  `persen2` int(5) DEFAULT NULL,
  `img2` varchar(50) DEFAULT NULL,
  `progres3` text DEFAULT NULL,
  `persen3` int(5) DEFAULT NULL,
  `img3` varchar(50) DEFAULT NULL,
  `progres4` text DEFAULT NULL,
  `persen4` int(5) DEFAULT NULL,
  `img4` varchar(40) DEFAULT NULL,
  `id_keg` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progres`
--

INSERT INTO `progres` (`id`, `progres1`, `persen1`, `img1`, `progres2`, `persen2`, `img2`, `progres3`, `persen3`, `img3`, `progres4`, `persen4`, `img4`, `id_keg`) VALUES
(11, 'komi', NULL, '501.png', 'ksjha', NULL, '512.png', 'sdlasj', NULL, '523.png', 'saldkj', NULL, '534.png', 5),
(12, 'Progres25%', NULL, '60Annotation 2020-06-16 093752.png', '', NULL, '61130-COVID-Virus-6afb0dea91f2f18d30151807874d06c5', 'sadas', NULL, '6220190430_141231-2.jpeg', 'sd', NULL, '63lagi ikuti zoom penulisan karya ilmiah', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

DROP TABLE IF EXISTS `rincian`;
CREATE TABLE IF NOT EXISTS `rincian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_keg` int(20) DEFAULT NULL,
  `nm_item` varchar(255) DEFAULT NULL,
  `satuan` int(50) DEFAULT NULL,
  `jml` int(50) DEFAULT NULL,
  `unitsatuan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`id`, `id_keg`, `nm_item`, `satuan`, `jml`, `unitsatuan`) VALUES
(4, 6, 'Batu Bata', 500, 5000, 'Buah'),
(3, 5, 'Belanja Paki', 4000, 1000, 'Ons'),
(5, 5, 'Semen', 150000, 100, 'Sak'),
(6, 6, 'Biaya Tukang', 150000, 21, 'Hari'),
(7, 6, 'Semen Andalas', 200000, 200, 'Sak'),
(8, 7, 'Batu Bata', 550, 240, 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

DROP TABLE IF EXISTS `suplier`;
CREATE TABLE IF NOT EXISTS `suplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` longtext NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kodepos` int(20) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `nm_supplier`, `alamat`, `kecamatan`, `kota`, `kodepos`, `provinsi`, `telpon`, `keterangan`) VALUES
(1, 'CV. Medina Metuah', 'Jalan Tanggul No xx Komplek Cut Dek', 'Ingin Berjaya', 'Lambrok Cafee', 12372, 'JAWA TENGAH', '086688287272', 'Perusahaan Jual Minyak Kelapa muda'),
(4, 'CV. Dang dang weh', 'Jalan Satelit samping asrama TNI', 'Banda Sakti', 'Lhokseumawe', 24351, 'ACEH', '089892378299', 'Toko Kelontong Kakek');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_t` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(100) NOT NULL,
  `id_kerjaan` varchar(20) NOT NULL,
  `id_kosultan` int(20) NOT NULL,
  `id_suplier` int(20) NOT NULL,
  `nm_barang` text NOT NULL,
  `vol` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_t`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_t`, `no_transaksi`, `id_kerjaan`, `id_kosultan`, `id_suplier`, `nm_barang`, `vol`, `satuan`, `harga`, `tgl_transaksi`) VALUES
(4, 'KES20120', '2', 2, 4, 'Batu Bata', 300, 'Batang', 4500, '2019-07-27 07:30:30'),
(5, 'KES2010', '1', 1, 4, 'Semen', 800, 'Sak', 3000, '2019-07-27 07:31:15'),
(7, 'KE21029', '1', 1, 1, 'PEnak', 115, 'SAk', 500000, '2019-07-27 07:31:38'),
(8, 'KES20100', '2', 3, 1, 'Pembuatan Tiang', 25, 'Unit', 5000000, '2019-07-27 07:32:09'),
(9, 'jk121120', '1', 1, 1, 'Peralatan tempur', 5, 'Unit', 5000000, '2019-07-30 02:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Admin Program', 'admin@admin.com', 'presentation-224108_960_720.jpg', '$2y$10$76KlBfrpQF3/e/HZiEGInuVm5U.KV848fU1jK4j.m8j7dvJeWFfA2', 1, 1, 1552120289),
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263),
(11, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(19, 1, 7),
(20, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Data Master'),
(6, 'Rincian Pekerjaan'),
(7, 'Kelola Data'),
(8, 'Kelola Kegiatan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Anggaran', 'admin/anggaran', 'fas fa-fw fa-wallet', 1),
(19, 5, 'Data Pekerjaan', 'admin/pekerjaan', 'fas fa-fw fa-list-ol', 1),
(20, 5, 'Data Rekanan', 'admin/rekanan', 'far fa-fw fa-handshake', 1),
(21, 5, 'Suplier', 'admin/supplier', 'fas fa-fw fa-people-carry', 1),
(22, 6, 'Rekam Transaksi', 'admin/transaksi', 'fas fa-funnel-dollar', 1),
(23, 7, 'Data Kecamatan', 'admin/kecamatan', 'fas fa-fw fa-list-ol', 1),
(24, 7, 'Data Dayah', 'admin/dayah', 'fas fa-fw fa-people-carry', 1),
(25, 8, 'Program Kegiatan', 'admin/program', 'fas fa-fw fa-list-ol', 1),
(26, 8, 'Realisasi', 'admin/realisasi', 'fas fa-funnel-dollar', 0),
(27, 7, 'Petugas Koordinator', 'admin/petugas', 'fas fa-fw fa-people-carry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
