-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mar 2018 pada 14.29
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Struktur dari tabel `lapor`
--

CREATE TABLE `lapor` (
  `permasalahan` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapor`
--

INSERT INTO `lapor` (`permasalahan`, `deskripsi`, `lokasi`, `Id`) VALUES
('sampah ', 'sampah berserakan', 'Jl.Pramuka', 1),
('sampah di got', 'sampah menyumbat', 'Jl.Pahlawan', 2),
('Banjir', 'karena sampah', 'Jl.Kenanga', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Username`, `password`, `confirm_password`) VALUES
('agus', '$2y$10$SkAAKQjqjgAL6ruTv9RKMOW.EiZuyssvKn14peP8AmfvKGZQzInGK', '123456789'),
('anti', '$2y$10$rqmf9pcOMr6xPiC4wD82sumf66mNmLd3cQvfWzB.7.BDJ2Q8H0nDO', '123456789'),
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
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
