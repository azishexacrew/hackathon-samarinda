-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 04:46 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saber`
--

-- --------------------------------------------------------

--
-- Table structure for table `lapor`
--

CREATE TABLE `lapor` (
  `id` int(11) NOT NULL,
  `permasalahan` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapor`
--

INSERT INTO `lapor` (`id`, `permasalahan`, `deskripsi`, `lokasi`) VALUES
(2, 'sampah di got', 'sampah menyumbat', 'Jl.Pahlawan'),
(3, 'Banjir', 'karena sampah', 'Jl.Kenanga'),
(4, 'Got Mampet', 'got mampet tiap hujan selalu bikin air menggenang', 'Jln.Bahagia No.52'),
(5, 'asd', 'asd', 'asd'),
(6, 'Tong sampah full', 'tong sampah udah seminggu ga pernah di ambil!!', 'Jln.Sirad Aman no.90 gang jati aman'),
(7, 'Sampah berhamburan', 'Sampah berhamburan setelah mahasiswa tawuran di letjen sudirman', 'Jln.Letjen sudirman depan kampus biru'),
(8, 'Sampah numpuk', 'numpuk nih sampah bro ambil dong', 'Jln.Derajat'),
(9, 'Tong sampah jebol', 'tong sampah bolong jadi sampah hamburan', 'Jln.Kemayoran depan rumah makan ayam TOP'),
(10, 'Sampah hambur', 'sampah hamburan di depan tong sampah', 'Jln.Kemayoran Baru'),
(11, 'Pompa air rusak', 'Pompa air rusak jadi air mengalir kecil udah dari hari jumat (10 Maret 2019)', 'Jalan M. Yamin depan stmik wicida'),
(12, 'Tong sampah penuh', 'Tong sampah penuh dan menimbulkan bau tidak sedap , udah beberapa hari tidak di ambil', 'Jln.Sulit depan apotik kimia farma');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `password`, `confirm_password`) VALUES
('agus', '$2y$10$SkAAKQjqjgAL6ruTv9RKMOW.EiZuyssvKn14peP8AmfvKGZQzInGK', '123456789'),
('anti', '$2y$10$rqmf9pcOMr6xPiC4wD82sumf66mNmLd3cQvfWzB.7.BDJ2Q8H0nDO', '123456789'),
('apakah', '$2y$10$d6L1hbAeawC/1nKEojv54O1niIvBi/P90Qqj4romewz6zt1fMx5Uy', '123456789'),
('asd', '$2y$10$c4mP568I1dcKaAUvFDy20umlniFVSCudyz7Lo7x53/UtNFeskFgjC', '123456789'),
('lija', '$2y$10$FQDtMwN6SOEXaf4YU0EMF.lPAOuNfQreaLfVWcXyFNkxVvrmAHP/K', '987654321'),
('mety', '$2y$10$K5.0LJ.U6tUchyBhGwgs8uHydzqQDMD9uvK04lnzGn2t5DsQH7j2K', '123456789'),
('tes', '$2y$10$sdcJlaSVj6YxN/jH..DQLu1CAd.azvdR08al3Rlys9MBrOLl/A0d.', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lapor`
--
ALTER TABLE `lapor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lapor`
--
ALTER TABLE `lapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
