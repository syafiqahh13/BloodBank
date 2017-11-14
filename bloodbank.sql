-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 03:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_rspmi` int(4) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rspmi`
--

CREATE TABLE `rspmi` (
  `id_rspmi` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nokontak` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rspmi`
--

INSERT INTO `rspmi` (`id_rspmi`, `username`, `password`, `nama`, `alamat`, `nokontak`) VALUES
(1, 'alislam', '267a2bd6d90a1d5a36e5a4dc4bb78aca', 'RS Al - Islam', 'Jalan Soekarno Hatta, Ruko Metro No.644, Manjahlega, Rancasari, Manjahlega, Rancasari, Kota Bandung, Jawa Barat 40286', '022 7562046'),
(2, 'rsuamc', '2bc90ea8f3a25e948097c439d9d68527', 'RSU Annisa Medical Center', 'Jl. Raya Cileunyi, Cileunyi Wetan, Rancaekek, Bandung, Jawa Barat 40622', '022 7781630');

-- --------------------------------------------------------

--
-- Table structure for table `statdarah`
--

CREATE TABLE `statdarah` (
  `id_rspmi` int(11) NOT NULL,
  `a` smallint(4) NOT NULL DEFAULT '0',
  `ab` smallint(4) NOT NULL DEFAULT '0',
  `b` smallint(4) NOT NULL DEFAULT '0',
  `o` smallint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statdarah`
--

INSERT INTO `statdarah` (`id_rspmi`, `a`, `ab`, `b`, `o`) VALUES
(1, 23, 12, 18, 32),
(2, 19, 12, 24, 31);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id_user` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `goldar` varchar(2) DEFAULT NULL,
  `nohp` varchar(14) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `point` smallint(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id_user`, `username`, `email`, `password`, `nama`, `jk`, `goldar`, `nohp`, `kota`, `point`) VALUES
(1, 'nurulilmaan', 'nurul@gmail.com', '3eb229dfe8725ee8432c1de8e023895f', 'Nurul Ilma', 'P', 'O', '081220257165', 'Bandung', 10000),
(3, 'akupiya', 'aku@gmail.com', 'bcfbd5f61d7a18814d67febf6f390b91', '', '', '', '', '', 0),
(8, 'test', 'test@gmail.com', 'b97234f522234e89e272f0ea4c18edca', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_rspmi`);

--
-- Indexes for table `rspmi`
--
ALTER TABLE `rspmi`
  ADD PRIMARY KEY (`id_rspmi`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `statdarah`
--
ALTER TABLE `statdarah`
  ADD PRIMARY KEY (`id_rspmi`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rspmi`
--
ALTER TABLE `rspmi`
  MODIFY `id_rspmi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `statdarah`
--
ALTER TABLE `statdarah`
  ADD CONSTRAINT `statdarah_ibfk_1` FOREIGN KEY (`id_rspmi`) REFERENCES `rspmi` (`id_rspmi`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
