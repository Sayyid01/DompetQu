-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 09:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dompet-qu`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `kode_automatis` (`kode` INT) RETURNS CHAR(7) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(7);
DECLARE urut INT;
 
SET urut = IF(kode IS NULL, 1, kode + 1);
SET kodebaru = CONCAT("TRX", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `kode_automatis2` (`kode` INT) RETURNS CHAR(7) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(7);
DECLARE urut INT;
 
SET urut = IF(kode IS NULL, 1, kode + 1);
SET kodebaru = CONCAT("TRF", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukkan`
--

CREATE TABLE `pemasukkan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `sumber` varchar(30) NOT NULL,
  `jumlah` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukkan`
--

INSERT INTO `pemasukkan` (`id`, `tanggal`, `keterangan`, `sumber`, `jumlah`, `username`) VALUES
(7, '2019-04-23', 'Temen bayar hutang', 'Piutang', '200.000', 'azmirf'),
(8, '2019-04-23', 'Jual nasi goreng', 'Laba penjualan', '250.000', 'azmirf'),
(16, '2019-03-28', 'Tarik tunai', 'ATM', '350.000', 'alfath'),
(21, '2019-04-24', 'Tarik tunai', 'ATM', '50.000', 'azmirf'),
(23, '2019-04-24', 'Jual baso tikus', 'Laba penjualan', '150.000', 'azmirf'),
(24, '2019-04-23', 'Keyboard mekanik', 'Laba penjualan', '250.000', 'azmirf'),
(25, '2019-03-27', 'Tarik tunai', 'ATM', '250.000', 'dira'),
(26, '2019-04-24', 'Tarik tunai', 'ATM', '50.000', 'azmirf'),
(27, '2019-03-28', 'Jual baso tikus', 'Laba penjualan', '250.000', 'alfath'),
(31, '2019-04-24', 'Tarik tunai ', 'ATM', '200.000', 'azmirf');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `keterangan`, `keperluan`, `jumlah`, `username`) VALUES
(3, '2019-04-23', 'Nasi goreng', 'Makan dan Minum', '15.000', 'azmirf'),
(4, '2019-04-23', 'Nasi goreng katsu', 'Makan dan Minum', '15.000', 'azmirf'),
(5, '2019-04-23', 'Hisana', 'Makan dan Minum', '14.000', 'azmirf'),
(7, '2019-04-24', 'Bensin', 'Kendaraan', '10.000', 'azmirf'),
(8, '2019-04-24', 'cutter dan gunting', 'Keperluan pribadi', '24.000', 'azmirf'),
(9, '2019-04-24', 'Bensin', 'Kendaraan', '15.000', 'azmirf'),
(10, '2019-03-28', 'Ayam geprek', 'Makan dan Minum', '15.000', 'alfath'),
(11, '2019-03-28', 'DAP Panitia onion', 'Organisasi', '150.000', 'alfath'),
(12, '2019-03-28', 'Nasi goreng', 'Makan dan Minum', '16.000', 'alfath'),
(13, '2019-04-24', 'Ayam bakar', 'Makan dan Minum', '16.000', 'azmirf');

-- --------------------------------------------------------

--
-- Table structure for table `rekening_keluar`
--

CREATE TABLE `rekening_keluar` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `aksi` varchar(10) NOT NULL DEFAULT 'keluar',
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_keluar`
--

INSERT INTO `rekening_keluar` (`id`, `kode`, `jumlah`, `aksi`, `tanggal`, `username`) VALUES
(1, 'TRF0001', '150.000', 'keluar', '2019-03-22', 'azmirf'),
(2, 'TRF0002', '50.000', 'keluar', '2019-03-22', 'azmirf'),
(3, 'TRF0003', '250.000', 'keluar', '2019-03-27', 'dira'),
(4, 'TRF0004', '50.000', 'keluar', '2019-03-28', 'azmirf'),
(5, 'TRF0005', '200.000', 'keluar', '2019-04-01', 'azmirf'),
(13, 'TRF0006', '200.000', 'keluar', '2019-04-24', 'azmirf'),
(14, 'TRF0007', '200.000', 'keluar', '2019-04-24', 'azmirf');

--
-- Triggers `rekening_keluar`
--
DELIMITER $$
CREATE TRIGGER `tg_kodekeluar` BEFORE INSERT ON `rekening_keluar` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(kode,4,4) AS Nomer
FROM rekening_keluar ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kode_automatis2(i));
 
IF(NEW.kode IS NULL OR NEW.kode = '')
 THEN SET NEW.kode =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekening_masuk`
--

CREATE TABLE `rekening_masuk` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `aksi` varchar(20) NOT NULL DEFAULT 'masuk',
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_masuk`
--

INSERT INTO `rekening_masuk` (`id`, `kode`, `jumlah`, `aksi`, `tanggal`, `username`) VALUES
(1, 'TRX0001', '400.000', 'masuk', '2019-03-22', 'azmirf'),
(2, 'TRX0002', '200.000', 'masuk', '2019-03-22', 'azmirf'),
(3, 'TRX0003', '500.000', 'masuk', '2019-03-27', 'dira'),
(14, 'TRX0005', '300.000', 'masuk', '2019-04-12', 'azmirf'),
(15, 'TRX0006', '100.000', 'masuk', '2019-04-24', 'azmirf'),
(16, 'TRX0007', '200.000', 'masuk', '2019-04-24', 'dina');

--
-- Triggers `rekening_masuk`
--
DELIMITER $$
CREATE TRIGGER `tg_kodemasuk` BEFORE INSERT ON `rekening_masuk` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(kode,4,4) AS Nomer
FROM rekening_masuk ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kode_automatis(i));
 
IF(NEW.kode IS NULL OR NEW.kode = '')
 THEN SET NEW.kode =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'aktif',
  `level` varchar(10) NOT NULL DEFAULT 'user',
  `no_rek` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `password`, `status`, `level`, `no_rek`) VALUES
(2, 'admin@gmail.com', 'admin', '$2y$10$JyNJABETyzlZl.l0mGs1BuXFJE7RXCa/x/9p/HWIr/whXkFyJ.5F2', 'aktif', 'admin', ''),
(5, 'sayyid@gmail.com', 'sayyid', '$2y$10$WSON4kW4uyF0dYWbq9Nt9OWD5T9FZLKjI6bNdzcGS0iN0cKe/3uH2', 'tidak aktif', 'user', '454290896580'),
(6, 'm.azmirizkifar20@gmail.com', 'azmirf', '$2y$10$ErUrbT5.3iTTMXivOOiO9urUCDGOqh/l6h4gD5sTSGgF1EIFtyHNq', 'aktif', 'user', '689583977372'),
(7, 'dina@gmail.com', 'dina', '$2y$10$3mk81yxt7UUMq3kVJzr4xugs0vRebNyivNXEQOvH8g.KDNPJtDEfm', 'aktif', 'user', '490528404584'),
(13, 'alfath@gmail.com', 'alfath', '$2y$10$PTV8IDx3hMmYHU26VkiXGeHWItuiwMYGOOH7/OF.Y7HAjJ1UH9fFG', 'tidak aktif', 'user', '780958771108'),
(15, 'dira@gmail.com', 'dira', '$2y$10$6lz4VRxoMTkBaFtXeEZnSO4nGPlrLcTRLc8l5I9J0fn2QgIk2Iud6', 'aktif', 'user', '283489028166'),
(16, 'kharis@gmail.com', 'kharis', '$2y$10$a4TwLN0N4Z.iKQk557X3dOLErpn3egZdWKmYCSuEh7gE6n9kARPGC', 'aktif', 'user', '691921290999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username_masuk` (`username`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username_keluar` (`username`);

--
-- Indexes for table `rekening_keluar`
--
ALTER TABLE `rekening_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username_rekening_keluar` (`username`);

--
-- Indexes for table `rekening_masuk`
--
ALTER TABLE `rekening_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username_rekening_masuk` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekening_keluar`
--
ALTER TABLE `rekening_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rekening_masuk`
--
ALTER TABLE `rekening_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  ADD CONSTRAINT `fk_username_masuk` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `fk_username_keluar` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekening_keluar`
--
ALTER TABLE `rekening_keluar`
  ADD CONSTRAINT `fk_username_rekening_keluar` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekening_masuk`
--
ALTER TABLE `rekening_masuk`
  ADD CONSTRAINT `fk_username_rekening_masuk` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
