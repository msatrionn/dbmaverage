-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 14, 2022 at 02:20 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbma`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `no_telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_user`, `nama_karyawan`, `alamat_karyawan`, `no_telp`) VALUES
(1, 1, 'Ciyek', 'Magelang', '08238382332'),
(2, 2, 'Danang', 'Magelang', '08234823'),
(3, 3, 'Jono', 'Yogyakarta', '0348324324');

-- --------------------------------------------------------

--
-- Table structure for table `m_bahan`
--

CREATE TABLE `m_bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(45) NOT NULL,
  `satuan` varchar(45) NOT NULL,
  `harga_bahan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_bahan`
--

INSERT INTO `m_bahan` (`id_bahan`, `nama_bahan`, `satuan`, `harga_bahan`) VALUES
(2, 'Paku', 'kg', 5000),
(3, 'Ember', 'kg', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'danang', '81dc9bdb52d04dc20036dbd8313ed055', 'owner'),
(3, 'jono', '81dc9bdb52d04dc20036dbd8313ed055', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `id_bahan` int(60) NOT NULL,
  `index_ramal` int(11) NOT NULL,
  `permintaan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_peramalan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peramalan`
--

INSERT INTO `peramalan` (`id_peramalan`, `id_bahan`, `index_ramal`, `permintaan`, `tanggal`, `waktu_peramalan`) VALUES
(101, 2, 1, 100, '2022-06-01', 'Jun-2022 hingga Dec-2022'),
(102, 2, 1, 40, '2022-07-01', 'Jun-2022 hingga Dec-2022'),
(103, 2, 1, 50, '2022-08-01', 'Jun-2022 hingga Dec-2022'),
(104, 2, 1, 60, '2022-09-01', 'Jun-2022 hingga Dec-2022'),
(105, 2, 1, 40, '2022-10-01', 'Jun-2022 hingga Dec-2022'),
(106, 2, 2, 499, '2022-03-01', 'Mar-2022 hingga Nov-2022'),
(107, 2, 2, 50, '2022-04-01', 'Mar-2022 hingga Nov-2022'),
(108, 2, 2, 500, '2022-05-01', 'Mar-2022 hingga Nov-2022'),
(109, 2, 2, 100, '2022-06-01', 'Mar-2022 hingga Nov-2022'),
(110, 2, 2, 40, '2022-07-01', 'Mar-2022 hingga Nov-2022'),
(111, 2, 2, 50, '2022-08-01', 'Mar-2022 hingga Nov-2022'),
(112, 2, 2, 60, '2022-09-01', 'Mar-2022 hingga Nov-2022'),
(113, 2, 2, 40, '2022-10-01', 'Mar-2022 hingga Nov-2022');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `total_harga` double NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_bahan`, `id_karyawan`, `jumlah`, `total_harga`, `tanggal_transaksi`) VALUES
(1, 2, 2, 60, 60000, '2022-01-08 00:35:53'),
(2, 2, 1, 5000, 50000, '2022-02-09 12:56:14'),
(3, 2, 1, 60, 40000, '2023-01-23 12:56:30'),
(4, 2, 2, 499, 4999, '2022-03-12 04:35:45'),
(5, 2, 2, 50, 400, '2022-04-22 04:49:20'),
(6, 2, 2, 500, 50000, '2022-05-12 04:49:46'),
(7, 2, 2, 50, 49999, '2022-06-04 04:50:08'),
(8, 2, 2, 40, 40000, '2022-07-12 04:51:16'),
(9, 2, 2, 50, 9000, '2022-08-12 04:51:16'),
(10, 2, 2, 50, 60000, '2022-06-12 04:51:16'),
(11, 2, 2, 60, 50000, '2022-09-12 04:51:16'),
(12, 2, 2, 40, 5000, '2022-10-12 04:51:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `m_bahan`
--
ALTER TABLE `m_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_bahan`
--
ALTER TABLE `m_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD CONSTRAINT `peramalan_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `m_bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `m_bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
