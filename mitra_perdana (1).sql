-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2021 at 12:20 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitra_perdana`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `alamat`, `gender`, `no_telepon`, `no_ktp`, `password`, `role_id`) VALUES
(2, 'Kamila', 'Kamila', 'benhil', 'perempun', '089765492492', '74297479784618', 'aa9c50c13256d0231d17eb21bc071d0e', 0),
(3, 'Nabila', 'nabila', 'bintaro', 'Laki-laki', '08965432109', '682648174816846', 'nabila123', 0),
(6, 'Vera', 'Vera', 'jl hj juhri', 'Perempuan', '08654807528', '87186389871837891', '79b013932a9a7efa4f9e7ee201b96aa7', 1),
(7, 'normaita', 'normaita', 'Jalan Perintis V Komplek Pepabri Kunciran Tangerang', 'perempun', '085899989260', '5689642317078', '99dce283f43913d06db82d8e8110d628', 2),
(8, 'bona', 'bona123', 'benhil', 'laki-laki', '081294485205', '123456789', '202cb962ac59075b964b07152d234b70', 2),
(9, 'aldy', 'admin', 'test', 'laki-laki', '67891234', '132134124', '57484f002a94f94bb091299ff91e9695', 1),
(10, 'juni', 'juni123', 'benhil', 'laki-laki', '081294485205', '341241324324', '57484f002a94f94bb091299ff91e9695', 2);

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(11) NOT NULL,
  `kode_type` varchar(120) NOT NULL,
  `merk` varchar(120) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id_motor`, `kode_type`, `merk`, `no_plat`, `warna`, `tahun`, `status`, `gambar`, `harga`) VALUES
(15, 'YMH', 'Honda Supra X', 'B 123 JKA', 'hitam', '2025', '0', 'honda_11.png', '5000000'),
(16, 'HND', 'PCX', 'B 7677 PSN', 'gold', '2020', '3', 'model-PCX.jpg', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `satatus_transaksi` enum('1','0') NOT NULL DEFAULT '0',
  `image_trasfer` varchar(100) NOT NULL,
  `type_transaksi` enum('COD','TRANSFER') NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_customer`, `id_motor`, `satatus_transaksi`, `image_trasfer`, `type_transaksi`, `date`) VALUES
(355444946, 10, 16, '0', '', 'COD', '2021-01-23 02:30:19'),
(1007599587, 10, 15, '0', '', 'TRANSFER', '2020-12-27 02:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(10) NOT NULL,
  `nama_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `kode_type`, `nama_type`) VALUES
(9, 'HND', 'HONDA'),
(10, 'YMH', 'YAMAHA'),
(11, 'SZK', 'SUZUKI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`) USING BTREE;

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`) USING BTREE;

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007599588;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
