-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 11:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_losmenpojok`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga_barang`, `jenis_barang`) VALUES
(1, 'Bantal', '10000', 'Dikembalikan'),
(2, 'Extra Bed', '20000', 'Dikembalikan'),
(3, 'Selimut', '10000', 'Dikembalikan'),
(4, 'Sabun Mandi Batang', '5000', 'Sekali Pakai'),
(5, 'Shampoo Sachet', '2000', 'Sekali Pakai'),
(6, 'Pop Mie', '7000', 'Sekali Pakai'),
(7, 'Sikat Gigi', '5000', 'Sekali Pakai'),
(8, 'Aqua', '4000', 'Sekali Pakai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tingkat` int(5) NOT NULL,
  `nomor_kamar` int(10) NOT NULL,
  `kapasitas_maks` int(5) NOT NULL,
  `harga_kamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `nik_pegawai` varchar(20) NOT NULL,
  `alamat_pegawai` varchar(250) NOT NULL,
  `no_hp_pegawai` varchar(20) NOT NULL,
  `foto_pegawai` varchar(200) NOT NULL,
  `tgl_kerja` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_user`, `nama_user`, `nik_pegawai`, `alamat_pegawai`, `no_hp_pegawai`, `foto_pegawai`, `tgl_kerja`, `status`, `pekerjaan`) VALUES
(1, 'Katherin Anna Patherisia Lesnussa', '191401078', 'Jalan Bunga no 12', '087766554433', 'foto.jpg', '2019-05-01', 'Aktif', 'Kasir'),
(2, 'Sri Wahyuni', '191402045', 'Jalan Melati no 10', '089911223344', 'foto(1).jpg', '2019-03-13', 'Aktif', 'Admin'),
(3, 'Afgan', '130239372', 'Jalan Kemerdekaan no 13', '08775365922', 'kamera123.jpg', '2020-05-13', 'Aktif', 'Keamanan'),
(4, 'Siti Mirani', '1287835697', 'Jalan Kuburan 12 gang 4', '08556325732', 'camera_0022.jpg', '2020-04-14', 'Aktif', 'Cleaning Service');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `check_out` datetime NOT NULL,
  `tagihan_kamar` varchar(100) NOT NULL,
  `tagihan_tambahan` varchar(100) NOT NULL,
  `pekerja_1` varchar(200) NOT NULL,
  `pekerja_2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `jumlah_pengunjung` int(10) NOT NULL,
  `deposit` varchar(100) NOT NULL,
  `pekerja_1` varchar(200) DEFAULT NULL,
  `pekerja_2` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(200) NOT NULL,
  `no_pengenal` varchar(50) NOT NULL,
  `no_hp_pengunjung` varchar(20) NOT NULL,
  `negara_pengunjung` varchar(50) NOT NULL,
  `alamat_pengunjung` text NOT NULL,
  `foto_identitas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id_pengunjung`, `nama_pengunjung`, `no_pengenal`, `no_hp_pengunjung`, `negara_pengunjung`, `alamat_pengunjung`, `foto_identitas`) VALUES
(1, 'Elmina', '172388238303', '08273647', 'Indonesia', 'Jalan Bunga', 'elmina.jpg'),
(2, 'Lydia Sarah', '1923691283', '0875345332', 'Malaysia', 'Perumahan Citra', 'lydias.jpg'),
(3, 'Louwis ', '2017988329', '061983932', 'Singapore', '', 'louwis.jpg'),
(4, 'Felly Felcia', '927987912312', '08187398', 'Indonesia', 'Jalan Merdeka no 13', 'felly.jpg'),
(5, 'Riandi Burhan', '2379345628', '08656656', 'Indonesia', 'Jalan Selebes', 'Riandi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tambahan`
--

CREATE TABLE `tbl_tambahan` (
  `id_tambahan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `total_harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipe`
--

CREATE TABLE `tbl_tipe` (
  `id_tipe` int(11) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `detail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tipe`
--

INSERT INTO `tbl_tipe` (`id_tipe`, `tipe_kamar`, `detail`) VALUES
(1, 'Khusus', 'Perlengkapan :\r\n1 AC\r\n1 Lemari\r\n1 Televisi\r\n1 Bedcover\r\n1 Selimut\r\n2 Bantal\r\n2 Guling\r\nKamar Mandi dalam Ruangan'),
(2, 'Umum', 'Perlengkapan :\r\n1 Kipas Angin\r\n1 Lemari\r\n1 Televisi\r\n1 Bedcover\r\n1 Selimut\r\n2 Bantal\r\n2 Guling\r\nKamar Mandi diluar Ruangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `tbl_tambahan`
--
ALTER TABLE `tbl_tambahan`
  ADD PRIMARY KEY (`id_tambahan`);

--
-- Indexes for table `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tambahan`
--
ALTER TABLE `tbl_tambahan`
  MODIFY `id_tambahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
