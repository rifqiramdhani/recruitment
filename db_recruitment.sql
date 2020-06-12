-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 12:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_karyawan`
--

CREATE TABLE `calon_karyawan` (
  `id_calon_karyawan` int(11) NOT NULL,
  `nama_calon_karyawan` varchar(128) NOT NULL,
  `email_calon_karyawan` varchar(128) NOT NULL,
  `password_calon_karyawan` varchar(128) NOT NULL,
  `telp_calon_karyawan` varchar(14) NOT NULL,
  `ttl_calon_karyawan` varchar(50) NOT NULL,
  `alamat_calon_karyawan` varchar(128) NOT NULL,
  `status_calon_karyawan` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_karyawan`
--

INSERT INTO `calon_karyawan` (`id_calon_karyawan`, `nama_calon_karyawan`, `email_calon_karyawan`, `password_calon_karyawan`, `telp_calon_karyawan`, `ttl_calon_karyawan`, `alamat_calon_karyawan`, `status_calon_karyawan`) VALUES
(1, 'Rifqi Ramdhani', 'rifqiramdhani8@gmail.com', '$2y$10$jFbYIYIUVw0mwq9qXRfykukvLdSM5IsE/iBCLPaIizMbQiX2.YHzu', '08139300312930', 'bandung, 21 desember 1998', 'Jl budhi No 37', 1),
(2, 'Ahmad kasim', 'rifqiramdhani71@yahoo.co.id', '$2y$10$iBbIsNw/alpmTEU6dHppxu7XuyBbytV.Ni2RziLlGm4K1krw3MgDK', '081393003329', 'Bandung, 22 april 1999', 'Perum bukit berlian c72', 1);

-- --------------------------------------------------------

--
-- Table structure for table `desk_recruitment`
--

CREATE TABLE `desk_recruitment` (
  `id_desk_recruitment` int(11) NOT NULL,
  `id_recruitment_fore` int(11) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `tipe` enum('deskripsi','persyaratan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desk_recruitment`
--

INSERT INTO `desk_recruitment` (`id_desk_recruitment`, `id_recruitment_fore`, `deskripsi`, `tipe`) VALUES
(1, 1, 'Kami perusahaan garment berorientasi export berskala international yang pertama dan terbesar di Kabupaten Majalengka, saat ini membutuhkan karyawan baru untuk posisi :\r\n\r\nHRD MANAGER ( Kode HRM )', 'deskripsi'),
(2, 1, 'Minimal S1 Law/Psychology/Industrial Engineering or Management', 'persyaratan'),
(3, 1, 'Minimum 5 Years of experience in all function of HRM in mfg environment and control of minimum 2500 employees.', 'persyaratan'),
(4, 1, '45 Years old', 'persyaratan'),
(5, 1, 'Good command in English both speaking and writing.', 'persyaratan'),
(6, 1, 'Having excellent comunication,leadership,negotiation and well managed.', 'persyaratan'),
(7, 1, 'Familiar with customer audit standard in garment industry is an advantage.', 'persyaratan'),
(8, 1, 'Willing to be placed in Tegal', 'persyaratan'),
(18, 9, '', 'deskripsi');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Staff SDM'),
(2, 'Manajer SDM'),
(3, 'Manager Divisi'),
(4, 'Direktur Support'),
(5, 'Direktur Utama'),
(6, 'Calon Karyawan'),
(7, 'Karyawan Masa Percobaan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan_fore` int(11) DEFAULT NULL,
  `email_karyawan` varchar(128) NOT NULL,
  `password_karyawan` varchar(128) NOT NULL,
  `nama_karyawan` varchar(128) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `telp_karyawan` varchar(13) NOT NULL,
  `ttl_karyawan` varchar(128) NOT NULL,
  `alamat_karyawan` varchar(128) NOT NULL,
  `status_karyawan` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_jabatan_fore`, `email_karyawan`, `password_karyawan`, `nama_karyawan`, `nik`, `telp_karyawan`, `ttl_karyawan`, `alamat_karyawan`, `status_karyawan`) VALUES
(1, 1, 'admin@gmail.com', '$2y$10$Qjk0pRj.YFxHbkOvGKhuX.96v34mxJivJksZQETf/eWYvREUJ3n8G', 'Admin', '10118737', '081393003129', 'Bandung, 21 Desember 1998', 'jl. budhi no 37', 1),
(6, 7, 'fathia@gmail.com', '$2y$10$hrlibM.nUcla9blvEe3yQevFaIu9I1ZDSRqi1Nte9.cjMyCxhzau.', 'Fathia Izati', '10116488', '08139300129', 'Bandung, 22 November 1980', 'Bukit Mawar no 10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `id_recruitment_fore` int(11) NOT NULL,
  `kode_kriteria_fore` varchar(128) NOT NULL,
  `bobot_kriteria` int(2) NOT NULL,
  `status_kriteria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_recruitment_fore`, `kode_kriteria_fore`, `bobot_kriteria`, `status_kriteria`) VALUES
(1, 1, 'K001', 3, 1),
(2, 1, 'K002', 4, 1),
(3, 1, 'K003', 2, 1),
(4, 1, 'K004', 3, 1),
(5, 1, 'K005', 3, 1),
(6, 1, 'K006', 4, 1),
(7, 1, 'K007', 5, 1),
(8, 1, 'K008', 5, 1),
(9, 1, 'K009', 4, 1),
(10, 1, 'K010', 4, 1),
(11, 1, 'K011', 3, 1),
(12, 6, 'K001', 3, 1),
(13, 6, 'K002', 4, 1),
(14, 6, 'K003', 2, 1),
(15, 6, 'K004', 3, 1),
(16, 6, 'K005', 3, 1),
(17, 6, 'K006', 4, 1),
(18, 6, 'K007', 5, 1),
(19, 6, 'K008', 5, 1),
(20, 6, 'K009', 4, 1),
(21, 6, 'K010', 4, 1),
(22, 6, 'K011', 3, 1),
(23, 7, 'K001', 3, 1),
(24, 7, 'K002', 4, 1),
(25, 7, 'K003', 2, 1),
(26, 7, 'K004', 3, 1),
(27, 7, 'K005', 3, 1),
(28, 7, 'K006', 4, 1),
(29, 7, 'K007', 5, 1),
(30, 7, 'K008', 5, 1),
(31, 7, 'K009', 4, 1),
(32, 7, 'K010', 4, 1),
(33, 7, 'K011', 3, 1),
(46, 9, 'K001', 3, 1),
(47, 9, 'K002', 4, 1),
(48, 9, 'K003', 2, 1),
(49, 9, 'K004', 3, 1),
(50, 9, 'K005', 3, 1),
(51, 9, 'K006', 4, 1),
(52, 9, 'K007', 5, 1),
(53, 9, 'K008', 5, 1),
(54, 9, 'K009', 4, 1),
(55, 9, 'K010', 4, 1),
(56, 9, 'K011', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_detail`
--

CREATE TABLE `kriteria_detail` (
  `kode_kriteria` varchar(128) NOT NULL,
  `nama_kriteria` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_detail`
--

INSERT INTO `kriteria_detail` (`kode_kriteria`, `nama_kriteria`) VALUES
('K001', 'Tingkat Pendidikan'),
('K002', 'Pengalaman Kerja'),
('K003', 'Status'),
('K004', 'Usia'),
('K005', 'Penampilan'),
('K006', 'Kepribadian'),
('K007', 'Motivasi Kerja'),
('K008', 'Kemampuan Kerjasama'),
('K009', 'Kemampuan Komunikasi'),
('K010', 'Psikotes'),
('K011', 'Kesehatan'),
('K012', 'Kenyamanan');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id_recruitment` int(11) NOT NULL,
  `nama_recruitment` varchar(128) NOT NULL,
  `gaji_recruitment` varchar(128) NOT NULL,
  `waktu_recruitment` varchar(128) NOT NULL,
  `pengumuman` tinyint(1) NOT NULL DEFAULT '0',
  `status_recruitment` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`id_recruitment`, `nama_recruitment`, `gaji_recruitment`, `waktu_recruitment`, `pengumuman`, `status_recruitment`) VALUES
(1, 'Spv. Layanan &amp; Handling Complain', '5000000 - 7000000', 'PART TIME', 0, 2),
(9, 'Manager SDM', '10000000 - 20000000', 'FULL TIME', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria_fore` int(11) NOT NULL,
  `nama_subkriteria` varchar(128) NOT NULL,
  `bobot_subkriteria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria_fore`, `nama_subkriteria`, `bobot_subkriteria`) VALUES
(1, 1, 'SMU / SMK /SMA', 1),
(2, 1, 'D1', 2),
(3, 1, 'D3', 3),
(4, 1, 'S1', 4),
(5, 1, 'S2', 5),
(6, 2, '0 tahun', 1),
(7, 2, '1 - 2 tahun', 2),
(8, 2, '3 - 4 tahun', 3),
(9, 2, '5 tahun keatas', 4),
(10, 3, 'Menikah', 3),
(11, 3, 'Belum Menikah', 4),
(12, 4, '21', 5),
(13, 4, '22', 4),
(14, 4, '23', 3),
(15, 4, '24', 2),
(16, 4, '25 - 30', 1),
(17, 11, 'Sehat', 5),
(18, 11, 'Tidak Sehat', 1),
(55, 46, 'SMU / SMK /SMA', 1),
(56, 46, 'D1', 2),
(57, 46, 'D3', 3),
(58, 46, 'S1', 4),
(59, 46, 'S2', 5),
(60, 47, '0 tahun', 1),
(61, 47, '1 - 2 tahun', 2),
(62, 47, '3 - 4 tahun', 3),
(63, 47, '5 tahun keatas', 4),
(64, 48, 'Menikah', 3),
(65, 48, 'Belum Menikah', 4),
(66, 49, '21', 5),
(67, 49, '22', 4),
(68, 49, '23', 3),
(69, 49, '24', 2),
(70, 49, '25 - 30', 1),
(71, 56, 'Sehat', 5),
(72, 56, 'Tidak Sehat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_user_token` int(11) NOT NULL,
  `email_user_token` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  ADD PRIMARY KEY (`id_calon_karyawan`);

--
-- Indexes for table `desk_recruitment`
--
ALTER TABLE `desk_recruitment`
  ADD PRIMARY KEY (`id_desk_recruitment`),
  ADD KEY `id_recruitment_fore` (`id_recruitment_fore`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `no_induk_karyawan` (`nik`),
  ADD UNIQUE KEY `no_telp_karyawan` (`telp_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan_fore`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_lowongan_fore` (`id_recruitment_fore`),
  ADD KEY `kode_kriteria_fore` (`kode_kriteria_fore`);

--
-- Indexes for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id_recruitment`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria_fore` (`id_kriteria_fore`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_user_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  MODIFY `id_calon_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `desk_recruitment`
--
ALTER TABLE `desk_recruitment`
  MODIFY `id_desk_recruitment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id_recruitment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_user_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desk_recruitment`
--
ALTER TABLE `desk_recruitment`
  ADD CONSTRAINT `desk_recruitment_ibfk_1` FOREIGN KEY (`id_recruitment_fore`) REFERENCES `recruitment` (`id_recruitment`) ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan_fore`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_recruitment_fore`) REFERENCES `recruitment` (`id_recruitment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_ibfk_2` FOREIGN KEY (`kode_kriteria_fore`) REFERENCES `kriteria_detail` (`kode_kriteria`) ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria_fore`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
