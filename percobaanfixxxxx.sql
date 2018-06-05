-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 09:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percobaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `level` varchar(8) NOT NULL DEFAULT 'pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password`, `no_telp`, `level`) VALUES
(1, 'citra', 'citra', '089765432122', 'admin'),
(2, 'ibnu', 'ibnu', '086789654321', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `barang_distro`
--

CREATE TABLE `barang_distro` (
  `id_barang_distro` int(2) NOT NULL,
  `nama_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_distro`
--

INSERT INTO `barang_distro` (`id_barang_distro`, `nama_barang`) VALUES
(1, 'T-shirt'),
(2, 'Polo'),
(3, 'Jaket');

-- --------------------------------------------------------

--
-- Table structure for table `barang_konveksi`
--

CREATE TABLE `barang_konveksi` (
  `id_barang_konveksi` int(2) NOT NULL,
  `id_ukuran` int(2) NOT NULL,
  `id_jenis_kain` int(2) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `bordir` varchar(6) NOT NULL,
  `harga_satuan` int(6) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_konveksi`
--

INSERT INTO `barang_konveksi` (`id_barang_konveksi`, `id_ukuran`, `id_jenis_kain`, `jenis_barang`, `bordir`, `harga_satuan`, `gambar`) VALUES
(1, 3, 4, 'jaket', 'bordir', 100000, '');

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id_beli` int(2) NOT NULL,
  `id_pelanggan` int(2) NOT NULL,
  `id_jenis_barang_distro` int(2) NOT NULL,
  `jumlah_beli` int(2) NOT NULL,
  `total_harga` int(7) NOT NULL,
  `waktu_beli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id_beli`, `id_pelanggan`, `id_jenis_barang_distro`, `jumlah_beli`, `total_harga`, `waktu_beli`) VALUES
(1, 1, 1, 2, 240000, '2018-06-05 13:13:02'),
(2, 2, 1, 1, 120000, '2018-06-05 13:14:15'),
(3, 2, 1, 1, 120000, '2018-06-05 13:14:23'),
(4, 1, 1, 1, 120000, '2018-06-05 13:24:07');

--
-- Triggers `beli`
--
DELIMITER $$
CREATE TRIGGER `pemesanan` AFTER INSERT ON `beli` FOR EACH ROW BEGIN
    UPDATE jenis_barang_distro SET jumlah_barang = jumlah_barang - NEW.jumlah_beli WHERE id_jenis_barang_distro = NEW.id_jenis_barang_distro;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_ukuran`
--

CREATE TABLE `detail_ukuran` (
  `id_detail_ukuran` int(11) NOT NULL,
  `lebar_badan` int(11) NOT NULL,
  `keliling_badan` int(11) NOT NULL,
  `panjang_badan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ukuran`
--

INSERT INTO `detail_ukuran` (`id_detail_ukuran`, `lebar_badan`, `keliling_badan`, `panjang_badan`) VALUES
(1, 33, 132, 80),
(2, 31, 124, 80),
(3, 30, 120, 77),
(4, 27, 108, 75),
(5, 26, 104, 73);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang_distro`
--

CREATE TABLE `jenis_barang_distro` (
  `id_jenis_barang_distro` int(2) NOT NULL,
  `id_barang_distro` int(2) NOT NULL,
  `nama_jenis_barang_distro` varchar(30) NOT NULL,
  `harga_barang` int(6) NOT NULL,
  `jumlah_barang` int(2) NOT NULL,
  `id_ukuran` int(2) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang_distro`
--

INSERT INTO `jenis_barang_distro` (`id_jenis_barang_distro`, `id_barang_distro`, `nama_jenis_barang_distro`, `harga_barang`, `jumlah_barang`, `id_ukuran`, `gambar`) VALUES
(1, 3, 'jaket bomber', 120000, 3, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kain`
--

CREATE TABLE `jenis_kain` (
  `id_jenis_kain` int(2) NOT NULL,
  `id_tipe_jenis_kain` varchar(3) NOT NULL,
  `nama_kain` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kain`
--

INSERT INTO `jenis_kain` (`id_jenis_kain`, `id_tipe_jenis_kain`, `nama_kain`) VALUES
(1, 'A1', 'Drill'),
(2, 'A2', 'Drill'),
(3, 'A3', 'Drill'),
(4, 'A4', 'Drill'),
(5, 'B1', 'Drill'),
(6, 'B2', 'Drill'),
(7, 'B3', 'Drill'),
(8, 'B4', 'Drill'),
(9, 'C1', 'Katun'),
(10, 'C2', 'Katun');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(2) NOT NULL,
  `id_pelanggan` int(2) NOT NULL,
  `id_barang_konveksi` int(2) NOT NULL,
  `jumlah_pesan` int(2) NOT NULL,
  `total_harga` int(8) NOT NULL,
  `waktu_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `id_barang_konveksi`, `jumlah_pesan`, `total_harga`, `waktu_pesan`) VALUES
(1, 1, 1, 3, 300000, '2018-06-05 13:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pelanggan`
--

CREATE TABLE `tabel_pelanggan` (
  `id_pelanggan` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pelanggan`
--

INSERT INTO `tabel_pelanggan` (`id_pelanggan`, `username`, `password`, `no_telp`, `alamat`) VALUES
(1, 'fajar', 'fajar', '089765432123', 'Madura'),
(2, 'rijal', 'rijal', '086789654321', 'jember');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(1) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `owner`, `desc`) VALUES
(1, 'Iyan Jaya Garment', 'Jl. Manggar XII/32A Jember', '081232148855', 'iyanjaya@gmail.com', 'http://iyan-jaya-garment.com', 'Sofyan', 'Supplier Pakaian ');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_jenis_kain`
--

CREATE TABLE `tipe_jenis_kain` (
  `id_tipe_jenis_kain` varchar(3) NOT NULL,
  `id_warna_kain` varchar(6) NOT NULL,
  `tipe_jenis_kain` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_jenis_kain`
--

INSERT INTO `tipe_jenis_kain` (`id_tipe_jenis_kain`, `id_warna_kain`, `tipe_jenis_kain`) VALUES
('A1', '386', 'Castilo'),
('A2', '5246', 'Castilo'),
('A3', '619', 'Castilo'),
('A4', '722', 'Castilo'),
('B1', 'A-048', 'Nagata'),
('B2', 'B-06', 'Nagata'),
('B3', 'C-016', 'Nagata'),
('B4', 'G-025', 'Nagata'),
('C1', '1', 'Combed'),
('C2', '2', 'Combed');

-- --------------------------------------------------------

--
-- Table structure for table `tr_beli`
--

CREATE TABLE `tr_beli` (
  `id_tr_beli` int(2) NOT NULL,
  `id_beli` int(2) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_beli`
--

INSERT INTO `tr_beli` (`id_tr_beli`, `id_beli`, `id_admin`, `status`, `waktu_bayar`) VALUES
(1, 1, 2, 'DP', '2018-06-05 13:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `tr_pesan`
--

CREATE TABLE `tr_pesan` (
  `id_tr_pesan` int(11) NOT NULL,
  `id_pesan` int(2) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `status` varchar(5) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_pesan`
--

INSERT INTO `tr_pesan` (`id_tr_pesan`, `id_pesan`, `id_admin`, `status`, `waktu_bayar`) VALUES
(1, 1, 1, 'Lunas', '2018-06-05 13:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(2) NOT NULL,
  `id_detail` int(2) NOT NULL,
  `size` varchar(12) NOT NULL,
  `panjang_lengan` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `id_detail`, `size`, `panjang_lengan`) VALUES
(1, 1, 'XXL Pendek', '31'),
(2, 1, 'XXL Panjang', '65'),
(3, 2, 'XL Pendek', '31'),
(4, 2, 'XL Panjang', '65'),
(5, 3, 'L Pendek', '28'),
(6, 3, 'L Panjang', '65'),
(7, 4, 'M Pendek', '25'),
(8, 4, 'M Panjang', '60'),
(9, 5, 'S Pendek', '25'),
(10, 5, 'S Pendek', '60');

-- --------------------------------------------------------

--
-- Table structure for table `warna_kain`
--

CREATE TABLE `warna_kain` (
  `id_warna_kain` varchar(6) NOT NULL,
  `warna_kain` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna_kain`
--

INSERT INTO `warna_kain` (`id_warna_kain`, `warna_kain`) VALUES
('1', 'Gelap'),
('2', 'Terang'),
('386', 'Biru Tua'),
('5246', 'Biru Langit'),
('619', 'kuning golkar muda'),
('722', 'Merah marun'),
('A-048', 'Abu-abu Tua'),
('B-06', 'Biru Tua'),
('C-016', 'Coklat Tua'),
('G-025', 'Orange');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang_distro`
--
ALTER TABLE `barang_distro`
  ADD PRIMARY KEY (`id_barang_distro`);

--
-- Indexes for table `barang_konveksi`
--
ALTER TABLE `barang_konveksi`
  ADD PRIMARY KEY (`id_barang_konveksi`),
  ADD KEY `id_ukuran` (`id_ukuran`),
  ADD KEY `id_jenis_kain` (`id_jenis_kain`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_barang_distro` (`id_jenis_barang_distro`);

--
-- Indexes for table `detail_ukuran`
--
ALTER TABLE `detail_ukuran`
  ADD PRIMARY KEY (`id_detail_ukuran`);

--
-- Indexes for table `jenis_barang_distro`
--
ALTER TABLE `jenis_barang_distro`
  ADD PRIMARY KEY (`id_jenis_barang_distro`),
  ADD KEY `id_barang_distro` (`id_barang_distro`),
  ADD KEY `id_ukuran` (`id_ukuran`);

--
-- Indexes for table `jenis_kain`
--
ALTER TABLE `jenis_kain`
  ADD PRIMARY KEY (`id_jenis_kain`),
  ADD KEY `id_barang_konveksi` (`id_tipe_jenis_kain`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_barang_konveksi` (`id_barang_konveksi`);

--
-- Indexes for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_jenis_kain`
--
ALTER TABLE `tipe_jenis_kain`
  ADD PRIMARY KEY (`id_tipe_jenis_kain`),
  ADD KEY `id_kain` (`id_warna_kain`);

--
-- Indexes for table `tr_beli`
--
ALTER TABLE `tr_beli`
  ADD PRIMARY KEY (`id_tr_beli`),
  ADD UNIQUE KEY `id_beli` (`id_beli`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tr_pesan`
--
ALTER TABLE `tr_pesan`
  ADD PRIMARY KEY (`id_tr_pesan`),
  ADD KEY `id_pesan` (`id_pesan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `warna_kain`
--
ALTER TABLE `warna_kain`
  ADD PRIMARY KEY (`id_warna_kain`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang_distro`
--
ALTER TABLE `barang_distro`
  MODIFY `id_barang_distro` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `barang_konveksi`
--
ALTER TABLE `barang_konveksi`
  MODIFY `id_barang_konveksi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id_beli` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_ukuran`
--
ALTER TABLE `detail_ukuran`
  MODIFY `id_detail_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jenis_barang_distro`
--
ALTER TABLE `jenis_barang_distro`
  MODIFY `id_jenis_barang_distro` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_kain`
--
ALTER TABLE `jenis_kain`
  MODIFY `id_jenis_kain` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  MODIFY `id_pelanggan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_beli`
--
ALTER TABLE `tr_beli`
  MODIFY `id_tr_beli` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_pesan`
--
ALTER TABLE `tr_pesan`
  MODIFY `id_tr_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_konveksi`
--
ALTER TABLE `barang_konveksi`
  ADD CONSTRAINT `barang_konveksi_ibfk_1` FOREIGN KEY (`id_jenis_kain`) REFERENCES `jenis_kain` (`id_jenis_kain`),
  ADD CONSTRAINT `barang_konveksi_ibfk_2` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran` (`id_ukuran`);

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`id_jenis_barang_distro`) REFERENCES `jenis_barang_distro` (`id_jenis_barang_distro`),
  ADD CONSTRAINT `beli_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tabel_pelanggan` (`id_pelanggan`);

--
-- Constraints for table `jenis_barang_distro`
--
ALTER TABLE `jenis_barang_distro`
  ADD CONSTRAINT `jenis_barang_distro_ibfk_1` FOREIGN KEY (`id_barang_distro`) REFERENCES `barang_distro` (`id_barang_distro`),
  ADD CONSTRAINT `jenis_barang_distro_ibfk_2` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran` (`id_ukuran`);

--
-- Constraints for table `jenis_kain`
--
ALTER TABLE `jenis_kain`
  ADD CONSTRAINT `jenis_kain_ibfk_1` FOREIGN KEY (`id_tipe_jenis_kain`) REFERENCES `tipe_jenis_kain` (`id_tipe_jenis_kain`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_barang_konveksi`) REFERENCES `barang_konveksi` (`id_barang_konveksi`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tabel_pelanggan` (`id_pelanggan`);

--
-- Constraints for table `tipe_jenis_kain`
--
ALTER TABLE `tipe_jenis_kain`
  ADD CONSTRAINT `tipe_jenis_kain_ibfk_1` FOREIGN KEY (`id_warna_kain`) REFERENCES `warna_kain` (`id_warna_kain`);

--
-- Constraints for table `tr_beli`
--
ALTER TABLE `tr_beli`
  ADD CONSTRAINT `tr_beli_ibfk_1` FOREIGN KEY (`id_beli`) REFERENCES `beli` (`id_beli`),
  ADD CONSTRAINT `tr_beli_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `tr_pesan`
--
ALTER TABLE `tr_pesan`
  ADD CONSTRAINT `tr_pesan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `tr_pesan_ibfk_3` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);

--
-- Constraints for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD CONSTRAINT `ukuran_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `detail_ukuran` (`id_detail_ukuran`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
