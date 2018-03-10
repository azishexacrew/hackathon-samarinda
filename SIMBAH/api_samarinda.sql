-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 06:11 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_samarinda`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_pesan` text NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `is_pesan`, `tanggal_pesan`, `flag`) VALUES
(1, 2, '`tanggal_pesan`,', '0000-00-00', 1),
(2, 2, 'wewefef', '0000-00-00', 1),
(3, 2, 'mas punya saya tolong diambil udah penuh jing', '2018-03-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_tabungan` varchar(100) NOT NULL,
  `tanggal_tabungan` datetime NOT NULL,
  `setoran_tabungan` double NOT NULL,
  `saldo_tabungan` double NOT NULL,
  `sampah_tabungan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `id_user`, `nomor_tabungan`, `tanggal_tabungan`, `setoran_tabungan`, `saldo_tabungan`, `sampah_tabungan`) VALUES
(3, 1, '0001/03/BS/2018', '0000-00-00 00:00:00', 0, 0, 0),
(4, 2, '0002/03/BS/2018', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` text NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `email`, `alamat`, `no_hp`, `jenis_kelamin`) VALUES
(1, 'fahri', '$2y$08$HyW/lEEThNdZmB3/iadNDOo.iON2wEM5k/My2PqtEBlUn5oPr91UO', 1, 'fahri.halid@gmail.com', '', '', ''),
(2, 'rian', '$2y$08$65W20ob2kx1XMylfuNbe8uPTmkQLFONGQL4SNc6KdFNm9GA0X3zB6', 3, 'rian.gunawan@gmail.com', 'jl.mana aja', '08222283823626', 'Laki-laki'),
(20, 'a', '$2y$08$pgc2y4J0KUxwUxIT3XvrjOVJ0ATUUuBSdHU0kBZ1Xfdj3lftAMmTG', 2, '', 'a', '082292296578', 'Laki-laki'),
(24, 'sfse', '$2y$08$UtzV.0RlLSvtACmIB677GuTWkJYckNz6S6Tjlm7XXhBShzX4iugXO', 3, '', 'sfsefsef', '3254353534543', 'Perempuan'),
(25, 'coba', '$2y$08$Tqd/8852cxXixI.Mf6iF3OpRBQW/9dH02/L4et8vzvUZKDzSBbqma', 2, 'coba@gmail.com', 'coba', '0822783923273', 'Laki-laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
