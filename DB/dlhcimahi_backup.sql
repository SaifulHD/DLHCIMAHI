-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 08:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlhcimahi_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `eksisting`
--

CREATE TABLE `eksisting` (
  `id_eksisting` int(11) NOT NULL,
  `Nama_sungai` varchar(50) NOT NULL,
  `Titik_pantau` varchar(50) NOT NULL,
  `Periode` date NOT NULL,
  `Nilai_bodek` double(22,0) NOT NULL DEFAULT 0,
  `Nilai_Tssek` double(22,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eksisting`
--

INSERT INTO `eksisting` (`id_eksisting`, `Nama_sungai`, `Titik_pantau`, `Periode`, `Nilai_bodek`, `Nilai_Tssek`) VALUES
(1, 'Cisangkan', 'Hulu', '2020-02-20', 12, 29),
(2, 'Cisangkan', 'Tengah', '2020-02-18', 279, 443),
(3, 'Cisangkan', 'Hilir', '2020-02-18', 3, 2),
(4, 'Cibaligo', 'Hulu', '2020-02-19', 1, 423),
(5, 'Cibaligo', 'Tengah', '2020-02-19', 954, 622),
(6, 'Cibaligo', 'Hilir', '2020-02-19', 420, 482),
(7, 'Cibeureum', 'Hulu', '2020-02-17', 5, 40),
(8, 'Cibeureum', 'Tengah', '2020-02-17', 1, 9),
(9, 'Cibeureum', 'Hilir', '2020-02-17', 9, 54),
(10, 'Cibabat', 'Hulu', '2020-02-20', 1, 2),
(11, 'Cibabat', 'Tengah', '2020-02-17', 197, 124),
(12, 'Cibabat', 'Hilir', '2020-02-19', 81, 22),
(13, 'Cimahi', 'Hulu', '2020-02-20', 2, 6),
(14, 'Cimahi', 'Tengah', '2020-02-18', 3, 41),
(15, 'Cimahi', 'Hilir', '2020-02-18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eksisting_back`
--

CREATE TABLE `eksisting_back` (
  `id_eksisting` int(11) NOT NULL,
  `Id_sungai` int(11) NOT NULL DEFAULT 0,
  `Id_titik_pantau` int(11) NOT NULL DEFAULT 0,
  `Periode` date NOT NULL,
  `Nilai_bodeksisting` double(22,0) NOT NULL DEFAULT 0,
  `Nilai_Tsseksisting` double(22,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `index_kualitas_air`
--

CREATE TABLE `index_kualitas_air` (
  `id_ika` int(11) NOT NULL,
  `jumlah_ika` varchar(50) DEFAULT NULL,
  `nilai_ika` float DEFAULT NULL,
  `tahun_ika` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `index_kualitas_air`
--

INSERT INTO `index_kualitas_air` (`id_ika`, `jumlah_ika`, `nilai_ika`, `tahun_ika`) VALUES
(1, '15', 39.33, 2013),
(2, '30', 38, 2014),
(3, '30', 38, 2015),
(4, '30', 42.67, 2016),
(5, '30', 21.33, 2017),
(6, '30', 11.33, 2018),
(7, '45', 13.11, 2019),
(8, '45', 14, 2020),
(9, '45', 16.67, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `index_pencemaran_air`
--

CREATE TABLE `index_pencemaran_air` (
  `id_ipa` int(11) NOT NULL,
  `Id_sungai` int(11) NOT NULL DEFAULT 0,
  `Id_titikpantau` int(11) NOT NULL DEFAULT 0,
  `Periode` date NOT NULL,
  `Nilai_pij` double(22,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ipa`
--

CREATE TABLE `ipa` (
  `id_ipa` int(11) NOT NULL,
  `Nama_sungai` varchar(50) NOT NULL,
  `Titik_pantau` varchar(50) NOT NULL,
  `Periode` date DEFAULT NULL,
  `Nilai_pij` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipa`
--

INSERT INTO `ipa` (`id_ipa`, `Nama_sungai`, `Titik_pantau`, `Periode`, `Nilai_pij`) VALUES
(1, 'Cisangkan', 'Hulu', '2019-04-01', 10.28),
(2, 'Cisangkan', 'Tengah', '2019-04-01', 11.67),
(3, 'Cisangkan', 'Hilir', '2019-04-02', 7.94),
(4, 'Cibabat', 'Hulu', '2019-04-04', 11.77),
(5, 'Cibabat', 'Tengah', '2019-04-04', 11.76),
(6, 'Cibabat', 'Hilir', '2019-04-05', 11.83),
(7, 'Cibaligo', 'Hulu', '2019-04-04', 11.75),
(8, 'Cibaligo', 'Tengah', '2019-04-04', 11.79),
(9, 'Cibaligo', 'Hilir', '2019-04-02', 12.01),
(10, 'Cibeureum', 'Hulu', '2019-04-01', 10.31),
(11, 'Cibeureum', 'Tengah', '2019-04-02', 9.48),
(12, 'Cibeureum', 'Hilir', '2019-04-02', 10.42),
(13, 'Cimahi', 'Hulu', '2019-04-05', 11.63),
(14, 'Cimahi', 'Tengah', '2019-04-01', 9.28),
(15, 'Cimahi', 'Hilir', '2019-04-05', 11.64);

-- --------------------------------------------------------

--
-- Table structure for table `potensial`
--

CREATE TABLE `potensial` (
  `Id_potensial` int(11) NOT NULL,
  `Tahun_domestik` varchar(50) NOT NULL,
  `Nilai_domestik` double(22,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potensial`
--

INSERT INTO `potensial` (`Id_potensial`, `Tahun_domestik`, `Nilai_domestik`) VALUES
(1, '2021', 3200),
(2, '2022', 3264),
(3, '2023', 3329),
(4, '2024', 3396),
(5, '2025', 3464),
(6, '2026', 3533);

-- --------------------------------------------------------

--
-- Table structure for table `status_mutu_air`
--

CREATE TABLE `status_mutu_air` (
  `id_mutuair` int(11) NOT NULL,
  `katagori` enum('Tercemar Ringan','Tercemar Sedang','Tercemar Berat','Memenuhi') NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `kode_warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_mutu_air`
--

INSERT INTO `status_mutu_air` (`id_mutuair`, `katagori`, `jumlah`, `kode_warna`) VALUES
(1, 'Tercemar Ringan', '4', '#FFD700'),
(2, 'Tercemar Sedang', '9', '#48D1CC'),
(3, 'Tercemar Berat', '17', '#FF0000'),
(4, 'Memenuhi', '0', '#00BFFF');

-- --------------------------------------------------------

--
-- Table structure for table `sungai`
--

CREATE TABLE `sungai` (
  `Id_sungai` int(11) NOT NULL,
  `Nama_sungai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sungai`
--

INSERT INTO `sungai` (`Id_sungai`, `Nama_sungai`) VALUES
(1, 'Cisangkan'),
(2, 'Cibaligo'),
(3, 'Cibeureum'),
(4, 'Cibabat'),
(5, 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `titik_pantau`
--

CREATE TABLE `titik_pantau` (
  `Id_titikpantau` int(11) NOT NULL,
  `Titik_pantau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titik_pantau`
--

INSERT INTO `titik_pantau` (`Id_titikpantau`, `Titik_pantau`) VALUES
(1, 'Hulu'),
(2, 'Tengah'),
(3, 'Hilir');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_email`, `user_password`, `user_name`, `tanggal`) VALUES
(1, 'admin@gmail.com', '$2y$10$JmPsceG2lmEeFxCXuPRatebOZpbC/Uezg0Nzpu2M8Ry8b.fI4e7Wu', 'Admin', '2022-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eksisting`
--
ALTER TABLE `eksisting`
  ADD PRIMARY KEY (`id_eksisting`);

--
-- Indexes for table `eksisting_back`
--
ALTER TABLE `eksisting_back`
  ADD PRIMARY KEY (`id_eksisting`),
  ADD KEY `Nama_sungai` (`Id_sungai`) USING BTREE,
  ADD KEY `Titik_pantau` (`Id_titik_pantau`) USING BTREE;

--
-- Indexes for table `index_kualitas_air`
--
ALTER TABLE `index_kualitas_air`
  ADD PRIMARY KEY (`id_ika`);

--
-- Indexes for table `index_pencemaran_air`
--
ALTER TABLE `index_pencemaran_air`
  ADD PRIMARY KEY (`id_ipa`),
  ADD KEY `Nama_sungai` (`Id_sungai`) USING BTREE,
  ADD KEY `Titik_pantau` (`Id_titikpantau`) USING BTREE;

--
-- Indexes for table `ipa`
--
ALTER TABLE `ipa`
  ADD PRIMARY KEY (`id_ipa`);

--
-- Indexes for table `potensial`
--
ALTER TABLE `potensial`
  ADD PRIMARY KEY (`Id_potensial`);

--
-- Indexes for table `status_mutu_air`
--
ALTER TABLE `status_mutu_air`
  ADD PRIMARY KEY (`id_mutuair`);

--
-- Indexes for table `sungai`
--
ALTER TABLE `sungai`
  ADD PRIMARY KEY (`Id_sungai`) USING BTREE;

--
-- Indexes for table `titik_pantau`
--
ALTER TABLE `titik_pantau`
  ADD PRIMARY KEY (`Id_titikpantau`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eksisting`
--
ALTER TABLE `eksisting`
  MODIFY `id_eksisting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `eksisting_back`
--
ALTER TABLE `eksisting_back`
  MODIFY `id_eksisting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `index_kualitas_air`
--
ALTER TABLE `index_kualitas_air`
  MODIFY `id_ika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `index_pencemaran_air`
--
ALTER TABLE `index_pencemaran_air`
  MODIFY `id_ipa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipa`
--
ALTER TABLE `ipa`
  MODIFY `id_ipa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `potensial`
--
ALTER TABLE `potensial`
  MODIFY `Id_potensial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_mutu_air`
--
ALTER TABLE `status_mutu_air`
  MODIFY `id_mutuair` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sungai`
--
ALTER TABLE `sungai`
  MODIFY `Id_sungai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `titik_pantau`
--
ALTER TABLE `titik_pantau`
  MODIFY `Id_titikpantau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eksisting_back`
--
ALTER TABLE `eksisting_back`
  ADD CONSTRAINT `FK_eksisting_sungai` FOREIGN KEY (`Id_sungai`) REFERENCES `sungai` (`Id_sungai`),
  ADD CONSTRAINT `FK_eksisting_titik_pantau` FOREIGN KEY (`Id_titik_pantau`) REFERENCES `titik_pantau` (`Id_titikpantau`);

--
-- Constraints for table `index_pencemaran_air`
--
ALTER TABLE `index_pencemaran_air`
  ADD CONSTRAINT `FK_index_pencemaran_air_sungai` FOREIGN KEY (`Id_sungai`) REFERENCES `sungai` (`Id_sungai`),
  ADD CONSTRAINT `FK_index_pencemaran_air_titik_pantau` FOREIGN KEY (`Id_titikpantau`) REFERENCES `titik_pantau` (`Id_titikpantau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
