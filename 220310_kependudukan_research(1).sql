-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 02:01 AM
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
-- Database: `220310_kependudukan_research`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kk`
--

CREATE TABLE `anggota_kk` (
  `anggota_kk_id` bigint(20) NOT NULL,
  `kk_id` bigint(20) NOT NULL,
  `ktp_id` bigint(20) NOT NULL,
  `status_dalam_keluarga` varchar(250) NOT NULL,
  `no_passport` varchar(100) DEFAULT NULL,
  `no_kitas` int(11) DEFAULT NULL,
  `ayah` varchar(200) NOT NULL,
  `Ibu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(250) NOT NULL,
  `id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(250) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kk_main`
--

CREATE TABLE `kk_main` (
  `kk_id` bigint(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `rt` tinyint(4) NOT NULL,
  `rw` tinyint(4) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `no_k` varchar(20) NOT NULL COMMENT 'nomor k terletak di sebelah kanan atas kartu',
  `tanggal_dikeluarkan` int(11) NOT NULL,
  `pihak_mengeluarkan` varchar(250) NOT NULL,
  `kepala_keluarga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(250) NOT NULL,
  `id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ktp`
--

CREATE TABLE `ktp` (
  `ktp_id` bigint(20) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `jenis_kelamin` tinyint(4) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` int(11) NOT NULL COMMENT '1 Islam\r\n2 Kristen\r\n3 Katholik\r\n4 Hindu\r\n5 Budha\r\n6 Konghucu',
  `golongan_darah` int(11) NOT NULL COMMENT '1 A\r\n2 B\r\n3 O\r\n4 AB\r\n5 tidak tahu',
  `pendidikan_terakhir` int(11) NOT NULL COMMENT '1. Tidak sekolah\r\n2. SD\r\n3. SMP\r\n4. SMA\r\n5. D1\r\n6. D2\r\n7. D3\r\n8. D4\r\n9. S1\r\n10. S2\r\n11. S3',
  `status_kependudukan` tinyint(4) NOT NULL,
  `status_kawin` tinyint(4) NOT NULL,
  `status_tinggal` tinyint(4) NOT NULL,
  `pekerjaan` varchar(250) NOT NULL,
  `penyandang_cacat` smallint(6) NOT NULL,
  `alamat` text NOT NULL,
  `rt` tinyint(4) NOT NULL,
  `rw` tinyint(4) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `kewarganegaraan` int(11) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `provinsi_pencatatan` varchar(250) NOT NULL,
  `kota_pencatatan` varchar(250) NOT NULL,
  `tanggal_pencatatan` date NOT NULL,
  `penginput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `date_log` datetime NOT NULL,
  `logger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_role` tinyint(4) NOT NULL,
  `user_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_password`, `user_role`, `user_status`) VALUES
(1, 'jafartadulako@gmail.compute', 'Jafar Sadik S.Kom., M.Ti.', '$2y$10$dZmdiFVEhRbdo0ijgmB.WOqR5MRKjqMvHZG5mFYInUcAVus9QDvv.', 1, 1),
(3, 'jafartadulako@gmail.com', 'Jafar Sadik', '$2y$10$QHniq0QiVFUfWULvNv4l7.WFMCsrsBUdLpds2twQml.DTpv0QOAS2', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD PRIMARY KEY (`anggota_kk_id`),
  ADD KEY `kk_id` (`kk_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `kk_main`
--
ALTER TABLE `kk_main`
  ADD PRIMARY KEY (`kk_id`),
  ADD KEY `kelurahan` (`kelurahan`),
  ADD KEY `kepala_keluarga` (`kepala_keluarga`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`ktp_id`),
  ADD KEY `kelurahan` (`kelurahan`),
  ADD KEY `penginput` (`penginput`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `logger` (`logger`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  MODIFY `anggota_kk_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kk_main`
--
ALTER TABLE `kk_main`
  MODIFY `kk_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `ktp_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD CONSTRAINT `anggota_kk_ibfk_1` FOREIGN KEY (`kk_id`) REFERENCES `kk_main` (`kk_id`),
  ADD CONSTRAINT `anggota_kk_ibfk_2` FOREIGN KEY (`anggota_kk_id`) REFERENCES `ktp` (`ktp_id`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kota` (`id_kota`);

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Constraints for table `kk_main`
--
ALTER TABLE `kk_main`
  ADD CONSTRAINT `kk_main_ibfk_1` FOREIGN KEY (`kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`),
  ADD CONSTRAINT `kk_main_ibfk_2` FOREIGN KEY (`kepala_keluarga`) REFERENCES `ktp` (`ktp_id`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Constraints for table `ktp`
--
ALTER TABLE `ktp`
  ADD CONSTRAINT `ktp_ibfk_1` FOREIGN KEY (`kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`),
  ADD CONSTRAINT `ktp_ibfk_2` FOREIGN KEY (`penginput`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`logger`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
