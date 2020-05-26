-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2019 pada 03.36
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_urdalapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `id` int(11) NOT NULL,
  `nama_anggaran` varchar(250) NOT NULL,
  `uraian` varchar(250) NOT NULL,
  `anggaran` int(128) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `access_log` varchar(120) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`id`, `nama_anggaran`, `uraian`, `anggaran`, `tahun`, `access_log`, `created`) VALUES
(2, 'Anggaran 2019', 'Anggaran dari dana DIPA 2019', 200000000, '2019', '', '2019-07-04 03:59:18'),
(11, 'Anggaran Provinsi', 'Anggaran dari gubernur', 200000000, '2019', 'admin@admin.com', '2019-07-04 03:29:14'),
(12, 'Tes', 'asldk', 30000000, '2019', 'admin@admin.com', '2019-07-26 02:48:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultan`
--

CREATE TABLE `konsultan` (
  `id` int(11) NOT NULL,
  `nama_konsultan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kodepos` int(8) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsultan`
--

INSERT INTO `konsultan` (`id`, `nama_konsultan`, `alamat`, `kecamatan`, `kota`, `kodepos`, `provinsi`, `telpon`, `keterangan`) VALUES
(1, 'PT. Angin Ribut', 'Jalan Sore-sore', 'INgin Jaya', 'Lambaro City', 123123, 'DI YOGYAKARTA', '019230189812', 'Perusaahan Konstruksi Jakarta'),
(2, 'PT. Pertamini Constructor', 'Jln .Medan Perang No 19 Sampeng warteg Mbak Ndul', 'Syiah Kuala', 'Darusalam', 123123, 'ACEH', '0927123990', 'Perusahaan baru buka juga'),
(3, 'PT. Sejahtera dan Adil', 'LamLangang No. xx', 'Banda Sakti', 'Banda Aceh', 23837, 'ACEH', '0918868768', 'Perusahaan tambal ban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `realisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_pekerjaan`, `sumber`, `realisasi`) VALUES
(1, 'Pekerjaan Panel Dinding IDG (Tampak Depan)', 'BPJS (HARBANG)', 'PER BULAN dan PEK 3 BULAN'),
(2, 'Pekerjaan Panel ACP (Teras IGD)', 'BPJS (HARBANG)', 'Per 3 Bulan'),
(3, 'Pengerjaan Tiang Panel IGD', 'BPJS (HARBANG)', 'Per 3 Bulan'),
(5, 'RENOVASI IPAL', 'YANMASUM', '3 Bulan Sekali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `nm_supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` longtext NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kodepos` int(20) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id`, `nm_supplier`, `alamat`, `kecamatan`, `kota`, `kodepos`, `provinsi`, `telpon`, `keterangan`) VALUES
(1, 'CV. Medina Metuah', 'Jalan Tanggul No xx Komplek Cut Dek', 'Ingin Berjaya', 'Lambrok Cafee', 12372, 'JAWA TENGAH', '086688287272', 'Perusahaan Jual Minyak Kelapa muda'),
(4, 'CV. Dang dang weh', 'Jalan Satelit samping asrama TNI', 'Banda Sakti', 'Lhokseumawe', 24351, 'ACEH', '089892378299', 'Toko Kelontong Kakek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_t` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `id_kerjaan` varchar(20) NOT NULL,
  `id_kosultan` int(20) NOT NULL,
  `id_suplier` int(20) NOT NULL,
  `nm_barang` text NOT NULL,
  `vol` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_t`, `no_transaksi`, `id_kerjaan`, `id_kosultan`, `id_suplier`, `nm_barang`, `vol`, `satuan`, `harga`, `tgl_transaksi`) VALUES
(4, 'KES20120', '2', 2, 4, 'Batu Bata', 300, 'Batang', 4500, '2019-07-27 07:30:30'),
(5, 'KES2010', '1', 1, 4, 'Semen', 800, 'Sak', 3000, '2019-07-27 07:31:15'),
(7, 'KE21029', '1', 1, 1, 'PEnak', 115, 'SAk', 500000, '2019-07-27 07:31:38'),
(8, 'KES20100', '2', 3, 1, 'Pembuatan Tiang', 25, 'Unit', 5000000, '2019-07-27 07:32:09'),
(9, 'jk121120', '1', 1, 1, 'Peralatan tempur', 5, 'Unit', 5000000, '2019-07-30 02:27:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Direktur RKA', 'admin@admin.com', 'presentation-224108_960_720.jpg', '$2y$10$cubrhVolbGPg7ZXRkL5NGePPiDU7XXizVGjUkosV.hKh1BdSZmdG2', 1, 1, 1552120289),
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263),
(11, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(14, 1, 6),
(16, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Data Master'),
(6, 'Rincian Pekerjaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
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
(22, 6, 'Rekam Transaksi', 'admin/transaksi', 'fas fa-funnel-dollar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultan`
--
ALTER TABLE `konsultan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_t`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `konsultan`
--
ALTER TABLE `konsultan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
