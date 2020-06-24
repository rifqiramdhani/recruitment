-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 10:16 PM
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
  `kodepos_calon_karyawan` varchar(50) NOT NULL,
  `status_pernikahan` varchar(128) NOT NULL,
  `status_pendidikan` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `token_calon_karyawan` varchar(128) NOT NULL,
  `status_calon_karyawan` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_karyawan`
--

INSERT INTO `calon_karyawan` (`id_calon_karyawan`, `nama_calon_karyawan`, `email_calon_karyawan`, `password_calon_karyawan`, `telp_calon_karyawan`, `ttl_calon_karyawan`, `alamat_calon_karyawan`, `kodepos_calon_karyawan`, `status_pernikahan`, `status_pendidikan`, `agama`, `token_calon_karyawan`, `status_calon_karyawan`) VALUES
(1, 'Rifqi Ramdhani', 'rifqiramdhani8@gmail.com', '$2y$10$myhj85TL1WRU3XTCpP29mutvzsB6UePlIHyhdON2Jt9pTgFLrM0oS', '081393003129', 'bandung, 21 desember 1998', 'Jl budhi No 37', '40553', 'Belum menikah', 'S1', 'Islam', 'rXEQXZVKiYRs9fY+0oGQ4l6iRDCMDtP/9EYudZn5G0k=', 1),
(2, 'Ahmad kasim', 'rifqiramdhani71@yahoo.co.id', '$2y$10$wQDSXeIs2ZvXSmS5U0c0qOpZoQDo6oDigkc7LNHLBBmQys6wMj2QW', '081393003329', 'Bandung, 22 april 1999', 'Perum bukit berlian c72', '40552', 'Menikah', 'S2', 'Islam', '', 1),
(4, 'Rifqi Ramdhani', 'ramdhanirifqi8@gmail.com', '$2y$10$AaQppD9LJnx.wWeG4Y0M3.FAgJW/FlIfNl53uu3SUyEBe/VUsqQI6', '081393001222', 'padalarang, 21 desember', 'Jl budhi No 37', '40554', 'Belum menikah', 'S1', 'Islam', 'lXg6pvvomijPfyp4W2so1CAn5/AN0/yBZOE+WASLLyI=', 1),
(5, 'Ruyatsyah', 'ruyatsy@gmail.com', '$2y$10$jQOWLBYNTj.LGv/sa2hq4uXZDbbOCsK4m18fhdLHxXH.IhP5kfXZW', '081393003321', 'Cianjur, 22 Desember 1999', 'Cianjur', '', '', '', '', '', 1),
(6, 'Saeful Apriana', 'saeful@gmail.com', '$2y$10$Y5q9KdkLoNwwbMR7YB1N0.m1tTGulkexW8gOIyp.c/HUgwMqRsoO.', '08338277162', 'Garut, 22 April 2000', 'garut', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `desk_rekrutmen`
--

CREATE TABLE `desk_rekrutmen` (
  `id_desk_rekrutmen` int(11) NOT NULL,
  `id_rekrutmen` int(11) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `tipe` enum('deskripsi','persyaratan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desk_rekrutmen`
--

INSERT INTO `desk_rekrutmen` (`id_desk_rekrutmen`, `id_rekrutmen`, `deskripsi`, `tipe`) VALUES
(1, 1, 'Kami perusahaan garment berorientasi export berskala international yang pertama dan terbesar di Kabupaten Majalengka, saat ini membutuhkan karyawan baru untuk posisi :\r\n\r\nHRD MANAGER ( Kode HRM )', 'deskripsi'),
(2, 1, 'Minimal S1 Law/Psychology/Industrial Engineering or Management', 'persyaratan'),
(3, 1, 'Minimum 5 Years of experience in all function of HRM in mfg environment and control of minimum 2500 employees.', 'persyaratan'),
(4, 1, '45 Years old', 'persyaratan'),
(5, 1, 'Good command in English both speaking and writing.', 'persyaratan'),
(6, 1, 'Having excellent comunication,leadership,negotiation and well managed.', 'persyaratan'),
(7, 1, 'Familiar with customer audit standard in garment industry is an advantage.', 'persyaratan'),
(8, 1, 'Willing to be placed in Tegal', 'persyaratan'),
(22, 10, 'Perusahaan kami sedang membutuhkan busseness analytical untuk menganalisi bisnis yang sedang kami jalankan ', 'deskripsi'),
(23, 10, 'Minimal pendidikan S2', 'persyaratan'),
(24, 10, 'Bersedia bekerja di bawah tekanan', 'persyaratan'),
(25, 10, 'Memiliki keyakinan tinggi', 'persyaratan'),
(28, 11, '', 'deskripsi'),
(29, 12, '', 'deskripsi');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jabatan`
--

CREATE TABLE `detail_jabatan` (
  `id_dt_jabatan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `kebutuhan_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jabatan`
--

INSERT INTO `detail_jabatan` (`id_dt_jabatan`, `id_jabatan`, `id_divisi`, `kebutuhan_karyawan`) VALUES
(1, 3, 1, 5),
(2, 2, 4, 2),
(3, 2, 1, 7),
(4, 1, 2, 1),
(5, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kriteria_penilaian`
--

CREATE TABLE `detail_kriteria_penilaian` (
  `id_dt_kriteria_penilaian` varchar(2) NOT NULL,
  `nama_kriteria_penilaian` varchar(128) NOT NULL,
  `jumlah_kriteria_penilaian` double NOT NULL DEFAULT '0',
  `nilai_prioritas_kriteria` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kriteria_penilaian`
--

INSERT INTO `detail_kriteria_penilaian` (`id_dt_kriteria_penilaian`, `nama_kriteria_penilaian`, `jumlah_kriteria_penilaian`, `nilai_prioritas_kriteria`) VALUES
('C1', 'Kepribadian', 9.03, 0.11),
('C2', 'Tanggung Jawab', 1.53, 0.63),
('C3', 'Kompetensi', 4.33, 0.26);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kriteria_rekrutmen`
--

CREATE TABLE `detail_kriteria_rekrutmen` (
  `id_dt_krt_rekt` varchar(128) NOT NULL,
  `nama_kriteria_rekrutmen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kriteria_rekrutmen`
--

INSERT INTO `detail_kriteria_rekrutmen` (`id_dt_krt_rekt`, `nama_kriteria_rekrutmen`) VALUES
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
-- Table structure for table `detail_subkriteria_penilaian`
--

CREATE TABLE `detail_subkriteria_penilaian` (
  `id_dt_subkriteria_penilaian` int(11) NOT NULL,
  `id_dt_krt_penilaian` varchar(2) NOT NULL,
  `nama_subkriteria_penilaian` varchar(128) NOT NULL,
  `jumlah_subkriteria_penilaian` double NOT NULL DEFAULT '0',
  `nilai_prioritas_subkriteria` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_subkriteria_penilaian`
--

INSERT INTO `detail_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`, `id_dt_krt_penilaian`, `nama_subkriteria_penilaian`, `jumlah_subkriteria_penilaian`, `nilai_prioritas_subkriteria`) VALUES
(1, 'C1', 'Kesetiaan terhadap perusahaan', 0, 0),
(2, 'C1', 'Mengutamakan pelayanan', 0, 0),
(3, 'C1', 'Minat bekerja', 0, 0),
(4, 'C1', 'Minat belajar', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'SDM'),
(2, 'Support'),
(3, 'Utama'),
(4, 'Divisi');

-- --------------------------------------------------------

--
-- Table structure for table `file_calon_karyawan`
--

CREATE TABLE `file_calon_karyawan` (
  `id_file_calon_karyawan` int(11) NOT NULL,
  `id_rekrutmen` int(11) DEFAULT NULL,
  `id_calon_karyawan` int(11) DEFAULT NULL,
  `file_formulir_lamaran` varchar(128) NOT NULL,
  `file_cv` varchar(128) NOT NULL,
  `file_ktp` varchar(128) NOT NULL,
  `file_akta_kelahiran` varchar(128) NOT NULL,
  `file_kartu_keluarga` varchar(128) NOT NULL,
  `file_ijazah` varchar(128) NOT NULL,
  `file_skpk` varchar(128) NOT NULL,
  `file_pas_foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_calon_karyawan`
--

INSERT INTO `file_calon_karyawan` (`id_file_calon_karyawan`, `id_rekrutmen`, `id_calon_karyawan`, `file_formulir_lamaran`, `file_cv`, `file_ktp`, `file_akta_kelahiran`, `file_kartu_keluarga`, `file_ijazah`, `file_skpk`, `file_pas_foto`) VALUES
(2, 10, 1, '98976367.pdf', '30251655.pdf', '73574183.JPG', '99701516.pdf', '55896338.jpg', '48275895.jpg', '5636902.jpg', '5282938.jpg'),
(4, 10, 2, '69394036.pdf', '10732580.pdf', '62327096.JPG', '79115110.pdf', '92773680.jpg', '40985795.jpg', '45379984.jpg', '5874041.jpg'),
(5, 10, 4, '34315226.pdf', '70400631.pdf', '48871178.JPG', '97757677.pdf', '94805640.jpg', '88600081.jpg', '84450364.jpg', '22738058.jpg'),
(6, 11, 1, '27338495.pdf', '63433051.pdf', '78650130.JPG', '9638308.pdf', '29028508.jpg', '95358269.jpg', '98595506.jpg', '46403149.jpg'),
(7, 10, 6, '48499043.pdf', '31125164.pdf', '84514835.JPG', '10694353.pdf', '30338535.jpg', '23534544.jpg', '77766911.jpg', '54588123.jpg'),
(8, 10, 5, '46348773.pdf', '27734805.pdf', '79610869.JPG', '88502008.pdf', '69934695.jpg', '83916861.jpg', '69146419.jpg', '31180994.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fpkb`
--

CREATE TABLE `fpkb` (
  `id_fpkb` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_file_fpkb` varchar(128) NOT NULL,
  `posisi_dibutuhkan` varchar(128) NOT NULL,
  `jumlah_dibutuhkan` int(11) NOT NULL,
  `jumlah_karyawan` int(11) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status_fpkb` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fpkb`
--

INSERT INTO `fpkb` (`id_fpkb`, `id_karyawan`, `nama_file_fpkb`, `posisi_dibutuhkan`, `jumlah_dibutuhkan`, `jumlah_karyawan`, `tanggal_permintaan`, `tanggal_disetujui`, `status_fpkb`) VALUES
(10, 7, '46031512.docx', 'Staff SDM', 4, 1, '2020-06-17', '2020-06-18', 6),
(11, 7, '65844577.docx', 'Manager SDM', 7, 0, '2020-06-18', '2020-06-20', 5);

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
(1, 'Direktur'),
(2, 'Manager'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_dt_jabatan` int(11) DEFAULT NULL,
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

INSERT INTO `karyawan` (`id_karyawan`, `id_dt_jabatan`, `email_karyawan`, `password_karyawan`, `nama_karyawan`, `nik`, `telp_karyawan`, `ttl_karyawan`, `alamat_karyawan`, `status_karyawan`) VALUES
(1, 1, 'admin@gmail.com', '$2y$10$Qjk0pRj.YFxHbkOvGKhuX.96v34mxJivJksZQETf/eWYvREUJ3n8G', 'Admin', '18117636', '081393003129', 'Bandung, 21 Desember 1998', 'jl. budhi no 37', 1),
(6, 2, 'managerdivisi@gmail.com', '$2y$10$7s1wxEOv/5V4mRu/7G.dvOQ0IW7WdSc5KW1F82pIni8EUMHkDNhsO', 'Manager Divisi', '17887636', '08139300129', 'Bandung, 22 November 1980', 'Bukit Mawar no 10', 1),
(7, 3, 'managersdm@gmail.com', '$2y$10$Ebw.vVcTIMHub/5mMb2z/u4bKzBv0/LfVlVsV1nfly97HGZ3fkFDK', 'Manager SDM', '17338872', '0813993322817', 'Bandung, 22 Mei 1990', 'Jl Mercusuar no 22', 1),
(8, 4, 'direktursupport@gmail.com', '$2y$10$7pnAHKbtL4DGo0vIOMg/5eLzRVwr3SN4pOsNKdF5hVHXQu/0u8cYu', 'Direktur Support', '18336666', '087303998722', 'Bandung, 5 Mei 1972', 'Jl Mercusuar no 50', 1),
(9, 5, 'direkturutama@gmail.com', '$2y$10$ROKFNSGDbFaKNIzr/WWNPu.TQOsZLaBJXUDtryLD1ECw2aty5mGA6', 'Direktur Utama', '1788778', '08139332200', 'Bandung, 30 April 1979', 'Jl lumba-lumba no 10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penilaian`
--

CREATE TABLE `kriteria_penilaian` (
  `id_skala_penilaian` int(11) NOT NULL,
  `id_dt_krt_penilaian_1` varchar(2) NOT NULL,
  `nilai_perbandingan` double NOT NULL,
  `hasil_perbandingan` double NOT NULL DEFAULT '0',
  `id_dt_krt_penilaian_2` varchar(2) NOT NULL,
  `status_penilaian` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_penilaian`
--

INSERT INTO `kriteria_penilaian` (`id_skala_penilaian`, `id_dt_krt_penilaian_1`, `nilai_perbandingan`, `hasil_perbandingan`, `id_dt_krt_penilaian_2`, `status_penilaian`) VALUES
(9, 'C1', 1, 0.11, 'C1', 1),
(13, 'C1', 0.2, 0.13, 'C2', 1),
(11, 'C1', 0.33, 0.08, 'C3', 1),
(13, 'C2', 5, 0.55, 'C1', 1),
(9, 'C2', 1, 0.65, 'C2', 1),
(7, 'C2', 3, 0.69, 'C3', 1),
(11, 'C3', 3.03, 0.34, 'C1', 1),
(7, 'C3', 0.33, 0.22, 'C2', 1),
(9, 'C3', 1, 0.23, 'C3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_rekrutmen`
--

CREATE TABLE `kriteria_rekrutmen` (
  `id_krt_rekt` int(11) NOT NULL,
  `id_rekrutmen` int(11) NOT NULL,
  `id_dt_krt_rekt` varchar(128) NOT NULL,
  `bobot_kriteria` int(2) NOT NULL,
  `status_kriteria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_rekrutmen`
--

INSERT INTO `kriteria_rekrutmen` (`id_krt_rekt`, `id_rekrutmen`, `id_dt_krt_rekt`, `bobot_kriteria`, `status_kriteria`) VALUES
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
(57, 10, 'K001', 3, 1),
(58, 10, 'K002', 4, 1),
(59, 10, 'K003', 2, 1),
(60, 10, 'K004', 3, 1),
(61, 10, 'K005', 3, 1),
(62, 10, 'K006', 4, 1),
(63, 10, 'K007', 5, 1),
(64, 10, 'K008', 5, 1),
(65, 10, 'K009', 4, 1),
(66, 10, 'K010', 4, 1),
(67, 10, 'K011', 3, 1),
(69, 11, 'K001', 3, 1),
(70, 11, 'K002', 4, 1),
(71, 11, 'K003', 2, 1),
(72, 11, 'K004', 3, 1),
(73, 11, 'K005', 3, 1),
(74, 11, 'K006', 4, 1),
(75, 11, 'K007', 5, 1),
(76, 11, 'K008', 5, 1),
(77, 11, 'K009', 4, 1),
(78, 11, 'K010', 4, 1),
(79, 11, 'K011', 3, 1),
(80, 10, 'K012', 2, 0),
(81, 12, 'K001', 3, 1),
(82, 12, 'K002', 4, 1),
(83, 12, 'K003', 2, 1),
(84, 12, 'K004', 3, 1),
(85, 12, 'K005', 3, 1),
(86, 12, 'K006', 4, 1),
(87, 12, 'K007', 5, 1),
(88, 12, 'K008', 5, 1),
(89, 12, 'K009', 4, 1),
(90, 12, 'K010', 4, 1),
(91, 12, 'K011', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_kmp`
--

CREATE TABLE `penilaian_kmp` (
  `id_penilaian_kmp` int(11) NOT NULL,
  `id_krt_penilaian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_rekrutmen`
--

CREATE TABLE `penilaian_rekrutmen` (
  `id_penilaian_rekrutmen` int(11) NOT NULL,
  `id_rekrutmen` int(11) DEFAULT NULL,
  `id_calon_karyawan` int(11) DEFAULT NULL,
  `vector_s` float NOT NULL,
  `vector_v` float NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_rekrutmen`
--

INSERT INTO `penilaian_rekrutmen` (`id_penilaian_rekrutmen`, `id_rekrutmen`, `id_calon_karyawan`, `vector_s`, `vector_v`, `hasil`) VALUES
(1, 10, 1, 12.86, 0.203, 1),
(4, 10, 2, 12.56, 0.198, 0),
(5, 10, 4, 12.71, 0.2, 1),
(6, 11, 1, 0, 0, 0),
(7, 10, 6, 12.76, 0.201, 1),
(8, 10, 5, 12.51, 0.197, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen`
--

CREATE TABLE `rekrutmen` (
  `id_rekrutmen` int(11) NOT NULL,
  `nama_rekrutmen` varchar(128) NOT NULL,
  `gaji_rekrutmen` varchar(128) NOT NULL,
  `waktu_rekrutmen` varchar(128) NOT NULL,
  `pengumuman` tinyint(1) NOT NULL DEFAULT '0',
  `status_rekrutmen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekrutmen`
--

INSERT INTO `rekrutmen` (`id_rekrutmen`, `nama_rekrutmen`, `gaji_rekrutmen`, `waktu_rekrutmen`, `pengumuman`, `status_rekrutmen`) VALUES
(1, 'Spv. Layanan &amp; Handling Complain', '5000000 - 7000000', 'PART TIME', 0, 2),
(10, 'Spv. Layanan &amp; Handling Complain', '2000000 - 5000000', 'PART TIME', 0, 1),
(11, 'Manager SDM', '10000000 - 20000000', 'FULL TIME', 0, 1),
(12, 'Corporate Communication', '10000000 - 20000000', 'FULL TIME', 0, 0),
(13, 'Staff SDM', '10000000 - 15000000', 'FULL TIME', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skala_penilaian`
--

CREATE TABLE `skala_penilaian` (
  `id_skala_penilaian` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skala_penilaian`
--

INSERT INTO `skala_penilaian` (`id_skala_penilaian`, `nilai`, `keterangan`) VALUES
(1, 9, 'Mutlak sangat penting dari'),
(2, 8, 'Mendekati mutlak dari'),
(3, 7, 'Sangat penting dari'),
(4, 6, 'Mendekati sangat penting dari'),
(5, 5, 'Lebih penting dari'),
(6, 4, 'Mendekati lebih penting dari'),
(7, 3, 'Sedikit lebih penting dari'),
(8, 2, 'Mendekati sedikit lebih penting dari'),
(9, 1, 'Sama penting dengan'),
(10, 0.5, '1 bagi mendekati sedikit lebih penting dari'),
(11, 0.33, '1 bagi sedikit lebih penting dari'),
(12, 0.25, '1 bagi mendekati lebih penting dari'),
(13, 0.2, '1 bagi lebih penting dari'),
(14, 0.167, '1 bagi mendekati sangat penting dari'),
(15, 0.143, '1 bagi sangat penting dari'),
(16, 0.125, '1 bagi mendekati mutlak dari'),
(17, 0.1, '1 bagi mutlak sangat penting dari');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_penilaian`
--

CREATE TABLE `subkriteria_penilaian` (
  `id_skala_penilaian` int(11) NOT NULL,
  `id_dt_subkrt_penilaian_1` int(11) NOT NULL,
  `nilai_perbandingan` double NOT NULL DEFAULT '0',
  `hasil_perbandingan` double NOT NULL DEFAULT '0',
  `id_dt_subkrt_penilaian_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_penilaian`
--

INSERT INTO `subkriteria_penilaian` (`id_skala_penilaian`, `id_dt_subkrt_penilaian_1`, `nilai_perbandingan`, `hasil_perbandingan`, `id_dt_subkrt_penilaian_2`) VALUES
(9, 1, 1, 0, 1),
(9, 2, 1, 0, 2),
(9, 3, 1, 0, 3),
(9, 4, 1, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_rekrutmen`
--

CREATE TABLE `subkriteria_rekrutmen` (
  `id_subkriteria_rekrutmen` int(11) NOT NULL,
  `id_kriteria_rekrutmen` int(11) NOT NULL,
  `nama_subkriteria` varchar(128) NOT NULL,
  `bobot_subkriteria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_rekrutmen`
--

INSERT INTO `subkriteria_rekrutmen` (`id_subkriteria_rekrutmen`, `id_kriteria_rekrutmen`, `nama_subkriteria`, `bobot_subkriteria`) VALUES
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
(73, 57, 'SMU / SMK /SMA', 1),
(74, 57, 'D1', 2),
(75, 57, 'D3', 3),
(76, 57, 'S1', 4),
(77, 57, 'S2', 5),
(78, 58, '0 tahun', 1),
(79, 58, '1 - 2 tahun', 2),
(80, 58, '3 - 4 tahun', 3),
(81, 58, '5 tahun keatas', 4),
(82, 59, 'Menikah', 3),
(83, 59, 'Belum Menikah', 4),
(84, 60, '21', 5),
(85, 60, '22', 4),
(86, 60, '23', 3),
(87, 60, '24', 2),
(88, 60, '25 - 30', 1),
(89, 67, 'Sehat', 5),
(90, 67, 'Tidak Sehat', 1),
(93, 69, 'SMU / SMK /SMA', 1),
(94, 69, 'D1', 2),
(95, 69, 'D3', 3),
(96, 69, 'S1', 4),
(97, 69, 'S2', 5),
(98, 70, '0 tahun', 1),
(99, 70, '1 - 2 tahun', 2),
(100, 70, '3 - 4 tahun', 3),
(101, 70, '5 tahun keatas', 4),
(102, 71, 'Menikah', 3),
(103, 71, 'Belum Menikah', 4),
(104, 72, '21', 5),
(105, 72, '22', 4),
(106, 72, '23', 3),
(107, 72, '24', 2),
(108, 72, '25 - 30', 1),
(109, 79, 'Sehat', 5),
(110, 79, 'Tidak Sehat', 1),
(111, 81, 'SMU / SMK /SMA', 1),
(112, 81, 'D1', 2),
(113, 81, 'D3', 3),
(114, 81, 'S1', 4),
(115, 81, 'S2', 5),
(116, 82, '0 tahun', 1),
(117, 82, '1 - 2 tahun', 2),
(118, 82, '3 - 4 tahun', 3),
(119, 82, '5 tahun keatas', 4),
(120, 83, 'Menikah', 3),
(121, 83, 'Belum Menikah', 4),
(122, 84, '21', 5),
(123, 84, '22', 4),
(124, 84, '23', 3),
(125, 84, '24', 2),
(126, 84, '25 - 30', 1),
(127, 91, 'Sehat', 5),
(128, 91, 'Tidak Sehat', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  ADD PRIMARY KEY (`id_calon_karyawan`),
  ADD UNIQUE KEY `email_calon_karyawan` (`email_calon_karyawan`),
  ADD UNIQUE KEY `email_calon_karyawan_2` (`email_calon_karyawan`);

--
-- Indexes for table `desk_rekrutmen`
--
ALTER TABLE `desk_rekrutmen`
  ADD PRIMARY KEY (`id_desk_rekrutmen`),
  ADD KEY `desk_rekrutmen_ibfk_1` (`id_rekrutmen`);

--
-- Indexes for table `detail_jabatan`
--
ALTER TABLE `detail_jabatan`
  ADD PRIMARY KEY (`id_dt_jabatan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `detail_kriteria_penilaian`
--
ALTER TABLE `detail_kriteria_penilaian`
  ADD PRIMARY KEY (`id_dt_kriteria_penilaian`);

--
-- Indexes for table `detail_kriteria_rekrutmen`
--
ALTER TABLE `detail_kriteria_rekrutmen`
  ADD PRIMARY KEY (`id_dt_krt_rekt`);

--
-- Indexes for table `detail_subkriteria_penilaian`
--
ALTER TABLE `detail_subkriteria_penilaian`
  ADD PRIMARY KEY (`id_dt_subkriteria_penilaian`),
  ADD KEY `id_dt_kriteria_penilaian` (`id_dt_krt_penilaian`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `file_calon_karyawan`
--
ALTER TABLE `file_calon_karyawan`
  ADD PRIMARY KEY (`id_file_calon_karyawan`),
  ADD KEY `id_recruitment_fore` (`id_rekrutmen`),
  ADD KEY `id_calon_karyawan_fore` (`id_calon_karyawan`);

--
-- Indexes for table `fpkb`
--
ALTER TABLE `fpkb`
  ADD PRIMARY KEY (`id_fpkb`),
  ADD KEY `id_karyawan` (`id_karyawan`);

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
  ADD KEY `id_dt_jabatan` (`id_dt_jabatan`);

--
-- Indexes for table `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  ADD PRIMARY KEY (`id_dt_krt_penilaian_1`,`id_dt_krt_penilaian_2`),
  ADD KEY `id_dt_krt_penilaian_2` (`id_dt_krt_penilaian_2`),
  ADD KEY `id_skala_penilaian` (`id_skala_penilaian`);

--
-- Indexes for table `kriteria_rekrutmen`
--
ALTER TABLE `kriteria_rekrutmen`
  ADD PRIMARY KEY (`id_krt_rekt`),
  ADD KEY `id_lowongan_fore` (`id_rekrutmen`),
  ADD KEY `kode_kriteria_fore` (`id_dt_krt_rekt`);

--
-- Indexes for table `penilaian_kmp`
--
ALTER TABLE `penilaian_kmp`
  ADD PRIMARY KEY (`id_penilaian_kmp`);

--
-- Indexes for table `penilaian_rekrutmen`
--
ALTER TABLE `penilaian_rekrutmen`
  ADD PRIMARY KEY (`id_penilaian_rekrutmen`),
  ADD KEY `id_calon_karyawan_fore` (`id_calon_karyawan`),
  ADD KEY `id_recruitment_fore` (`id_rekrutmen`);

--
-- Indexes for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  ADD PRIMARY KEY (`id_rekrutmen`);

--
-- Indexes for table `skala_penilaian`
--
ALTER TABLE `skala_penilaian`
  ADD PRIMARY KEY (`id_skala_penilaian`);

--
-- Indexes for table `subkriteria_penilaian`
--
ALTER TABLE `subkriteria_penilaian`
  ADD PRIMARY KEY (`id_dt_subkrt_penilaian_1`,`id_dt_subkrt_penilaian_2`),
  ADD KEY `id_skala_penilaian` (`id_skala_penilaian`),
  ADD KEY `id_dt_subkrt_penilaian_2` (`id_dt_subkrt_penilaian_2`);

--
-- Indexes for table `subkriteria_rekrutmen`
--
ALTER TABLE `subkriteria_rekrutmen`
  ADD PRIMARY KEY (`id_subkriteria_rekrutmen`),
  ADD KEY `id_kriteria_fore` (`id_kriteria_rekrutmen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  MODIFY `id_calon_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `desk_rekrutmen`
--
ALTER TABLE `desk_rekrutmen`
  MODIFY `id_desk_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_jabatan`
--
ALTER TABLE `detail_jabatan`
  MODIFY `id_dt_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_subkriteria_penilaian`
--
ALTER TABLE `detail_subkriteria_penilaian`
  MODIFY `id_dt_subkriteria_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `file_calon_karyawan`
--
ALTER TABLE `file_calon_karyawan`
  MODIFY `id_file_calon_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fpkb`
--
ALTER TABLE `fpkb`
  MODIFY `id_fpkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria_rekrutmen`
--
ALTER TABLE `kriteria_rekrutmen`
  MODIFY `id_krt_rekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `penilaian_kmp`
--
ALTER TABLE `penilaian_kmp`
  MODIFY `id_penilaian_kmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_rekrutmen`
--
ALTER TABLE `penilaian_rekrutmen`
  MODIFY `id_penilaian_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  MODIFY `id_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skala_penilaian`
--
ALTER TABLE `skala_penilaian`
  MODIFY `id_skala_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subkriteria_rekrutmen`
--
ALTER TABLE `subkriteria_rekrutmen`
  MODIFY `id_subkriteria_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desk_rekrutmen`
--
ALTER TABLE `desk_rekrutmen`
  ADD CONSTRAINT `desk_rekrutmen_ibfk_1` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_jabatan`
--
ALTER TABLE `detail_jabatan`
  ADD CONSTRAINT `detail_jabatan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jabatan_ibfk_2` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_subkriteria_penilaian`
--
ALTER TABLE `detail_subkriteria_penilaian`
  ADD CONSTRAINT `detail_subkriteria_penilaian_ibfk_1` FOREIGN KEY (`id_dt_krt_penilaian`) REFERENCES `detail_kriteria_penilaian` (`id_dt_kriteria_penilaian`);

--
-- Constraints for table `file_calon_karyawan`
--
ALTER TABLE `file_calon_karyawan`
  ADD CONSTRAINT `file_calon_karyawan_ibfk_1` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `file_calon_karyawan_ibfk_2` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id_calon_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `fpkb`
--
ALTER TABLE `fpkb`
  ADD CONSTRAINT `fpkb_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_dt_jabatan`) REFERENCES `detail_jabatan` (`id_dt_jabatan`) ON UPDATE CASCADE;

--
-- Constraints for table `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  ADD CONSTRAINT `kriteria_penilaian_ibfk_1` FOREIGN KEY (`id_dt_krt_penilaian_1`) REFERENCES `detail_kriteria_penilaian` (`id_dt_kriteria_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_penilaian_ibfk_2` FOREIGN KEY (`id_dt_krt_penilaian_2`) REFERENCES `detail_kriteria_penilaian` (`id_dt_kriteria_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_penilaian_ibfk_3` FOREIGN KEY (`id_skala_penilaian`) REFERENCES `skala_penilaian` (`id_skala_penilaian`) ON UPDATE CASCADE;

--
-- Constraints for table `kriteria_rekrutmen`
--
ALTER TABLE `kriteria_rekrutmen`
  ADD CONSTRAINT `kriteria_rekrutmen_ibfk_1` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_rekrutmen_ibfk_2` FOREIGN KEY (`id_dt_krt_rekt`) REFERENCES `detail_kriteria_rekrutmen` (`id_dt_krt_rekt`) ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_rekrutmen`
--
ALTER TABLE `penilaian_rekrutmen`
  ADD CONSTRAINT `penilaian_rekrutmen_ibfk_1` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id_calon_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_rekrutmen_ibfk_2` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria_penilaian`
--
ALTER TABLE `subkriteria_penilaian`
  ADD CONSTRAINT `subkriteria_penilaian_ibfk_3` FOREIGN KEY (`id_skala_penilaian`) REFERENCES `skala_penilaian` (`id_skala_penilaian`) ON UPDATE CASCADE,
  ADD CONSTRAINT `subkriteria_penilaian_ibfk_4` FOREIGN KEY (`id_dt_subkrt_penilaian_1`) REFERENCES `detail_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subkriteria_penilaian_ibfk_5` FOREIGN KEY (`id_dt_subkrt_penilaian_2`) REFERENCES `detail_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria_rekrutmen`
--
ALTER TABLE `subkriteria_rekrutmen`
  ADD CONSTRAINT `subkriteria_rekrutmen_ibfk_1` FOREIGN KEY (`id_kriteria_rekrutmen`) REFERENCES `kriteria_rekrutmen` (`id_krt_rekt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
