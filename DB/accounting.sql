-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 09:19 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id_beban` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_beban` varchar(15) NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id_beban`, `tanggal`, `jumlah`, `jenis_beban`, `penerima`, `deskripsi`) VALUES
(1, '2019-01-26', 2000000, '1', 'Irfan Hanif', 'Biaya Wifi, Listrik, dan Air'),
(2, '2019-01-29', 4200000, '1', 'Kementrian Komunikas', 'Biaya Pemasangan Pamflet'),
(6, '2019-01-28', 4000000, '3', 'PLN', 'Pembayaran Listrik'),
(7, '2019-01-02', 900000, '1', 'PLN', 'Bayar Listrik'),
(8, '2019-01-29', 1000000, '2', 'Karyawan CV Jenderal', 'Gaji Bulan Januari'),
(11, '2019-01-02', 900000, '1', 'PLN', 'Bayar Listrik'),
(12, '2019-01-02', 900000, '1', 'PLN', 'Bayar Listrik'),
(14, '2019-01-02', 900000, '1', 'PLN', 'Bayar Listrik');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beban`
--

CREATE TABLE `jenis_beban` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_beban`
--

INSERT INTO `jenis_beban` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Operasional'),
(2, 'Gaji'),
(3, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pemasukan`
--

CREATE TABLE `jenis_pemasukan` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pemasukan`
--

INSERT INTO `jenis_pemasukan` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Software'),
(2, 'Multimedia'),
(3, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `kelamin` enum('Laki=laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`, `email`, `nomor`, `kelamin`) VALUES
(1, 'M Irham Aaaa', 'Jalan Karang benda Raya, Perum Griya Mega Asri Block 21 Berkoh, Purwokerto Selatan, Kabupaten Banyumas, Jawa Tengah 53146', 'irhamakbar@gmail.com', '918518151', 'Laki=laki'),
(2, 'Irfan Hanif', 'Jalan Karang benda Raya, Perum Griya Mega Asri Block 21 Berkoh, Purwokerto Selatan, Kabupaten Banyumas, Jawa Tengah 53146', 'Irfanhanif@gmail.com', '0813444561', 'Laki=laki'),
(3, 'Akbar Iskandar', 'Jl Indramayu, Indramayu, Jawa Tengah', 'akbar@gmail.com', '08127000124', 'Laki=laki'),
(4, 'Ilham', 'Jepara', 'ilham@gmail.com', '08127000124', 'Laki=laki'),
(5, 'M Endhyka', 'Lampung, Bandar Lampung', 'endhi@gmail.com', '0812564', 'Laki=laki');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_pemasukan` varchar(100) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `tanggal`, `jumlah`, `jenis_pemasukan`, `penerima`, `deskripsi`) VALUES
(67, '2019-02-12', 4000000, '2', 'Karyawan CV Jenderal Corp', 'Keperluan Makan'),
(72, '2018-12-31', 40000000, '1', 'SMA 1 Purwokerto', 'Pembuatan E-Learning'),
(73, '2018-12-31', 500000, '2', 'PT Anabatic', 'Iklan Online'),
(76, '2018-12-31', 500000, '2', 'PT Anabatic', 'Iklan Online'),
(79, '2019-01-29', 50000000, '1', 'Kementrian Komunikasi dan Informasi Purwokerto', 'Web Komersial'),
(80, '2019-01-31', 4200000, '1', 'PT Anabatic', 'Ternyata karena itu'),
(81, '2018-12-31', 4000000, '1', 'SMA 1 Purwokerto', 'Pembuatan E-Learning'),
(83, '2018-12-31', 4000000, '1', 'SMA 1 Purwokerto', 'Pembuatan E-Learning'),
(88, '2019-01-31', 30000000, '3', 'PT Anabatic', 'Pembuatan Aplikasi Manajemen Karyawan'),
(94, '2019-01-02', 900000, '1', 'SMA 3', 'E-Learning'),
(96, '2019-01-02', 900000, '1', 'SMA 3', 'E-Learning');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id_karyawan`, `status`) VALUES
('admin', 'e00cf25ad42683b3df678c61f42c6bda', 1, 1),
('bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 2, 2),
('Ilham', '3fbc184f9cb33abf115863a5d17beb29', 4, 3),
('user', '3fbc184f9cb33abf115863a5d17beb29', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id_beban`);

--
-- Indexes for table `jenis_beban`
--
ALTER TABLE `jenis_beban`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenis_pemasukan`
--
ALTER TABLE `jenis_pemasukan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jenis_beban`
--
ALTER TABLE `jenis_beban`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_pemasukan`
--
ALTER TABLE `jenis_pemasukan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
