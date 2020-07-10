-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 06:25 AM
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
(16, 'Saeful Apriana', 'saeful.apriana@gmail.com', '$2y$10$B8EzXzjvHwoOry6697OIVuZ3utI4KUfleNoDg6e6omQ9R/RolkkHq', '08939930029', 'Garut, 22 April 2000', 'Garut, jl bukit mawar no 10', '40553', 'Belum menikah', 'D1', 'Islam', 'WIrxlx8h7dU7mSE7ulj+DtMG/1LFK3/BqcftwuClPa8=', 0),
(19, 'Saeful Apriana', 'saeful@gmail.com', '$2y$10$FdrtE92qAQbIekWciy3ZKe7Qz4p6hqR/WD/NFNhOE0fqoQXfmv/4G', '081393887622', 'Cianjur, 22 Desember 1999', 'Garut, jl bukit mawar no 10', '', '', '', '', '', 1),
(20, 'Ruyatsyah', 'ruyatsy@gmail.com', '$2y$10$qtpjUIPWM7K29OdLB36v0e8L0emN2J1WyV.cfXBvv0Rovu8iNYehG', '0893992881223', 'Garut, 22 April 2000', 'Jl Karapitan no 44', '', '', '', '', '', 1),
(21, 'Ahmad Sholihin', 'ahmad@gmail.com', '$2y$10$wh1VbGspdHzmz8Wk.zOCEue6kQiSP0oCJpkaNgfyTRZZ4xq5BYnpq', '087337772818', 'Bandung, 25 Desember 1999', 'jl turangga no 30', '', '', '', '', '', 1),
(22, 'Budi Anduk', 'budi@gmail.com', '$2y$10$2f4Id8cWvPli1S661YcAEep2FyJhDkqLciCeketu9ANhPI8LAHPtC', '0893992881223', 'Cianjur, 22 Desember 1999', 'jl turangga no 30', '', '', '', '', '', 1);

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
(41, 17, 'Dibutuhkan Spv. Layanan & Handling Complain Sales & Marketing segera ', 'deskripsi'),
(42, 17, 'Ganteng', 'persyaratan'),
(43, 17, 'Gesit', 'persyaratan'),
(44, 17, 'Tidak mudah menyerah', 'persyaratan'),
(45, 17, 'Rajin ibadah', 'persyaratan');

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
('K012', 'Kenyamanan'),
('K013', 'Asdf');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penilaian_rekrutmen`
--

CREATE TABLE `detail_penilaian_rekrutmen` (
  `id_dt_penilaian_rekrutmen` int(11) NOT NULL,
  `id_penilaian_rekrutmen` int(11) NOT NULL,
  `id_kriteria_rekrutmen` int(11) NOT NULL,
  `id_subkriteria_rekrutmen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penilaian_rekrutmen`
--

INSERT INTO `detail_penilaian_rekrutmen` (`id_dt_penilaian_rekrutmen`, `id_penilaian_rekrutmen`, `id_kriteria_rekrutmen`, `id_subkriteria_rekrutmen`) VALUES
(78, 26, 126, 186),
(79, 26, 127, 190),
(80, 26, 128, 193),
(81, 26, 129, 195),
(82, 26, 130, 3),
(83, 26, 131, 3),
(84, 26, 132, 3),
(85, 26, 133, 5),
(86, 26, 134, 1),
(87, 26, 135, 85),
(88, 26, 136, 199),
(89, 27, 126, 184),
(90, 27, 127, 189),
(91, 27, 128, 193),
(92, 27, 129, 195),
(93, 27, 130, 2),
(94, 27, 131, 3),
(95, 27, 132, 4),
(96, 27, 133, 4),
(97, 27, 134, 2),
(98, 27, 135, 75),
(99, 27, 136, 199);

-- --------------------------------------------------------

--
-- Table structure for table `detail_subkriteria_penilaian`
--

CREATE TABLE `detail_subkriteria_penilaian` (
  `id_dt_subkriteria_penilaian` int(11) NOT NULL,
  `id_dt_krt_penilaian` varchar(2) NOT NULL,
  `nama_subkriteria_penilaian` varchar(128) NOT NULL,
  `jumlah_subkriteria_penilaian` double NOT NULL DEFAULT '0',
  `nilai_prioritas_subkriteria` double NOT NULL DEFAULT '0',
  `nilai_bobot_global` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_subkriteria_penilaian`
--

INSERT INTO `detail_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`, `id_dt_krt_penilaian`, `nama_subkriteria_penilaian`, `jumlah_subkriteria_penilaian`, `nilai_prioritas_subkriteria`, `nilai_bobot_global`) VALUES
(1, 'C1', 'Kesetiaan terhadap perusahaan', 2.46, 0.36, 0.04),
(2, 'C1', 'Mengutamakan pelayanan', 8.35, 0.15, 0.017),
(3, 'C1', 'Minat bekerja', 14.36, 0.08, 0.009),
(4, 'C1', 'Minat belajar', 14.36, 0.08, 0.009),
(5, 'C1', 'Penerimaan terhadap pengawasan', 5.52, 0.22, 0.024),
(6, 'C1', 'Kepemimpinan', 17.03, 0.06, 0.007),
(7, 'C1', 'Kemampuan bekerja dibawah tekanan', 20.33, 0.06, 0.007),
(8, 'C2', 'Kehadiran tepat waktu', 4.69, 0.26, 0.164),
(9, 'C2', 'Ketepatan waktu menyelesaikan pekerjaan', 1.86, 0.51, 0.321),
(10, 'C2', 'Inisiatif', 7.33, 0.16, 0.101),
(11, 'C2', 'Penerimaan terhadap tugas tambahan', 12, 0.08, 0.05),
(12, 'C3', 'Kreatifitas', 11.09, 0.09, 0.023),
(13, 'C3', 'Produktivitas', 11.09, 0.09, 0.023),
(14, 'C3', 'Kemampuan dalam bekerja', 2.99, 0.32, 0.083),
(15, 'C3', 'Pengetahuan tentang pekerjaan', 2.99, 0.32, 0.083),
(16, 'C3', 'Ketepatan mengambil keputusan', 7.66, 0.18, 0.047);

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
(4, 'Divisi'),
(5, 'Sales & Marketing');

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
(26, 17, 19, '34122281.pdf', '39552446.pdf', '68337414.JPG', '73999323.pdf', '20743676.jpg', '71613670.jpg', '91315247.jpg', '91892973.jpg'),
(27, 17, 20, '2445988.pdf', '1345503.pdf', '74146487.JPG', '31986040.pdf', '67467056.jpg', '37620255.jpg', '97372500.jpg', '94135420.jpg');

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
(1, 6, '84298580.pdf', 'Spv. Layanan &amp; Handling Complain Sales &amp; Marketing', 1, 0, '2020-06-30', '2020-06-30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `jumlah_jabatan` int(11) NOT NULL,
  `status_jabatan` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `id_divisi`, `jumlah_jabatan`, `status_jabatan`) VALUES
(1, 'Direktur', 3, 1, 1),
(2, 'Manager', 1, 3, 1),
(3, 'Staff', 1, 5, 1),
(4, 'Karyawan Masa Percobaan', 1, 0, 1),
(5, 'Direktur', 2, 1, 1),
(6, 'Manager Divisi', 5, 1, 1),
(7, 'Spv. Layanan & Handling Complain', 5, 1, 1),
(8, 'Corporate Communication', 5, 1, 1),
(9, 'Bussiness Analytical', 5, 3, 1),
(11, 'Content Writer', 5, 8, 1),
(12, 'Admin Sales', 5, 4, 1),
(15, 'Spv. Creative Marketing', 5, 1, 1),
(17, 'Karyawan Masa Percobaan', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
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

INSERT INTO `karyawan` (`id_karyawan`, `id_jabatan`, `email_karyawan`, `password_karyawan`, `nama_karyawan`, `nik`, `telp_karyawan`, `ttl_karyawan`, `alamat_karyawan`, `status_karyawan`) VALUES
(1, 3, 'admin@gmail.com', '$2y$10$Qjk0pRj.YFxHbkOvGKhuX.96v34mxJivJksZQETf/eWYvREUJ3n8G', 'Admin', '18117636', '081393003129', 'Bandung, 21 Desember 1998', 'jl. budhi no 37', 1),
(6, 6, 'managerdivisi@gmail.com', '$2y$10$7s1wxEOv/5V4mRu/7G.dvOQ0IW7WdSc5KW1F82pIni8EUMHkDNhsO', 'Manager Divisi Sales &amp; Marketing', '17887636', '08139300129', 'Bandung, 22 November 1980', 'Bukit Mawar no 10', 1),
(7, 2, 'managersdm@gmail.com', '$2y$10$Ebw.vVcTIMHub/5mMb2z/u4bKzBv0/LfVlVsV1nfly97HGZ3fkFDK', 'Manager SDM', '17338872', '0813993322817', 'Bandung, 22 Mei 1990', 'Jl Mercusuar no 22', 1),
(8, 5, 'direktursupport@gmail.com', '$2y$10$7pnAHKbtL4DGo0vIOMg/5eLzRVwr3SN4pOsNKdF5hVHXQu/0u8cYu', 'Direktur Support', '18336666', '087303998722', 'Bandung, 5 Mei 1972', 'Jl Mercusuar no 50', 1),
(9, 1, 'direkturutama@gmail.com', '$2y$10$ROKFNSGDbFaKNIzr/WWNPu.TQOsZLaBJXUDtryLD1ECw2aty5mGA6', 'Direktur Utama', '1788778', '08139332200', 'Bandung, 30 April 1979', 'Jl lumba-lumba no 10', 1),
(10, 17, 'ruyatsy@gmail.com', '$2y$10$E1i3k/LakUmb9Zf7smasIOFnDNKu/Nzo104IYaERM8vbuURIu919O', 'Ruyatsyah', '10117732', '081377288918', 'Cianjur, 22 Desember 1998', 'Jl Mercusuar no 50', 1),
(14, 17, 'rifqiramdhani8@gmail.com', '$2y$10$UWuP.F6A.Ojnu7H44TBYQ.hOoOZHuopNZal3yr1/SQ8IAA9ZyBnJ.', 'Rifqi Ramdhani', '10118737', '0812223303994', 'Bandung, 22 November 1980', 'Bukit Mawar no 10', 1);

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
(126, 17, 'K001', 3, 1),
(127, 17, 'K002', 4, 1),
(128, 17, 'K003', 2, 1),
(129, 17, 'K004', 3, 1),
(130, 17, 'K005', 3, 1),
(131, 17, 'K006', 4, 1),
(132, 17, 'K007', 5, 1),
(133, 17, 'K008', 5, 1),
(134, 17, 'K009', 4, 1),
(135, 17, 'K010', 4, 1),
(136, 17, 'K011', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_kmp`
--

CREATE TABLE `penilaian_kmp` (
  `id_penilaian_kmp` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` double NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_kmp`
--

INSERT INTO `penilaian_kmp` (`id_penilaian_kmp`, `id_karyawan`, `nilai`, `status`) VALUES
(3, 14, 49.74, 1),
(4, 10, 49.29, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_rekrutmen`
--

CREATE TABLE `penilaian_rekrutmen` (
  `id_penilaian_rekrutmen` int(11) NOT NULL,
  `id_rekrutmen` int(11) DEFAULT NULL,
  `id_calon_karyawan` int(11) DEFAULT NULL,
  `vector_s` float NOT NULL DEFAULT '0',
  `vector_v` float NOT NULL DEFAULT '0',
  `hasil` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_rekrutmen`
--

INSERT INTO `penilaian_rekrutmen` (`id_penilaian_rekrutmen`, `id_rekrutmen`, `id_calon_karyawan`, `vector_s`, `vector_v`, `hasil`) VALUES
(26, 17, 19, 12.68, 0.502, 1),
(27, 17, 20, 12.59, 0.498, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen`
--

CREATE TABLE `rekrutmen` (
  `id_rekrutmen` int(11) NOT NULL,
  `id_fpkb` int(11) NOT NULL,
  `nama_rekrutmen` varchar(128) NOT NULL,
  `gaji_rekrutmen` varchar(128) NOT NULL,
  `waktu_rekrutmen` varchar(128) NOT NULL,
  `status_rekrutmen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekrutmen`
--

INSERT INTO `rekrutmen` (`id_rekrutmen`, `id_fpkb`, `nama_rekrutmen`, `gaji_rekrutmen`, `waktu_rekrutmen`, `status_rekrutmen`) VALUES
(17, 1, 'Spv. Layanan &amp; Handling Complain Sales &amp; Marketing', '5000000 - 10000000', 'FULL TIME', 1);

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
(9, 1, 1, 0.41, 1),
(7, 1, 3, 0.36, 2),
(5, 1, 5, 0.35, 3),
(5, 1, 5, 0.35, 4),
(7, 1, 3, 0.54, 5),
(5, 1, 5, 0.29, 6),
(5, 1, 5, 0.25, 7),
(7, 2, 0.33, 0.13, 1),
(9, 2, 1, 0.12, 2),
(7, 2, 3, 0.21, 3),
(7, 2, 3, 0.21, 4),
(11, 2, 0.33, 0.06, 5),
(7, 2, 3, 0.18, 6),
(7, 2, 3, 0.15, 7),
(5, 3, 0.2, 0.08, 1),
(7, 3, 0.33, 0.04, 2),
(9, 3, 1, 0.07, 3),
(9, 3, 1, 0.07, 4),
(11, 3, 0.33, 0.06, 5),
(9, 3, 1, 0.06, 6),
(7, 3, 3, 0.15, 7),
(5, 4, 0.2, 0.08, 1),
(7, 4, 0.33, 0.04, 2),
(9, 4, 1, 0.07, 3),
(9, 4, 1, 0.07, 4),
(11, 4, 0.33, 0.06, 5),
(9, 4, 1, 0.06, 6),
(7, 4, 3, 0.15, 7),
(7, 5, 0.33, 0.13, 1),
(11, 5, 3.03, 0.36, 2),
(11, 5, 3.03, 0.21, 3),
(11, 5, 3.03, 0.21, 4),
(9, 5, 1, 0.18, 5),
(7, 5, 3, 0.18, 6),
(5, 5, 5, 0.25, 7),
(5, 6, 0.2, 0.08, 1),
(7, 6, 0.33, 0.04, 2),
(9, 6, 1, 0.07, 3),
(9, 6, 1, 0.07, 4),
(7, 6, 0.33, 0.06, 5),
(9, 6, 1, 0.06, 6),
(11, 6, 0.33, 0.02, 7),
(5, 7, 0.2, 0.08, 1),
(7, 7, 0.33, 0.04, 2),
(7, 7, 0.33, 0.02, 3),
(7, 7, 0.33, 0.02, 4),
(5, 7, 0.2, 0.04, 5),
(11, 7, 3.03, 0.18, 6),
(9, 7, 1, 0.05, 7),
(9, 8, 1, 0.21, 8),
(11, 8, 0.33, 0.18, 9),
(7, 8, 3, 0.41, 10),
(7, 8, 3, 0.25, 11),
(11, 9, 3.03, 0.65, 8),
(9, 9, 1, 0.54, 9),
(7, 9, 3, 0.41, 10),
(5, 9, 5, 0.42, 11),
(7, 10, 0.33, 0.07, 8),
(7, 10, 0.33, 0.18, 9),
(9, 10, 1, 0.14, 10),
(7, 10, 3, 0.25, 11),
(7, 11, 0.33, 0.07, 8),
(5, 11, 0.2, 0.11, 9),
(7, 11, 0.33, 0.05, 10),
(9, 11, 1, 0.08, 11),
(9, 12, 1, 0.09, 12),
(9, 12, 1, 0.09, 13),
(11, 12, 0.33, 0.11, 14),
(11, 12, 0.33, 0.11, 15),
(11, 12, 0.33, 0.04, 16),
(9, 13, 1, 0.09, 12),
(9, 13, 1, 0.09, 13),
(11, 13, 0.33, 0.11, 14),
(11, 13, 0.33, 0.11, 15),
(11, 13, 0.33, 0.04, 16),
(11, 14, 3.03, 0.27, 12),
(11, 14, 3.03, 0.27, 13),
(9, 14, 1, 0.33, 14),
(9, 14, 1, 0.33, 15),
(7, 14, 3, 0.39, 16),
(11, 15, 3.03, 0.27, 12),
(11, 15, 3.03, 0.27, 13),
(9, 15, 1, 0.33, 14),
(9, 15, 1, 0.33, 15),
(7, 15, 3, 0.39, 16),
(11, 16, 3.03, 0.27, 12),
(11, 16, 3.03, 0.27, 13),
(7, 16, 0.33, 0.11, 14),
(7, 16, 0.33, 0.11, 15),
(9, 16, 1, 0.13, 16);

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
(183, 126, 'SMU / SMK /SMA', 1),
(184, 126, 'D1', 2),
(185, 126, 'D3', 3),
(186, 126, 'S1', 4),
(187, 126, 'S2', 5),
(188, 127, '0 tahun', 1),
(189, 127, '1 - 2 tahun', 2),
(190, 127, '3 - 4 tahun', 3),
(191, 127, '5 tahun keatas', 4),
(192, 128, 'Menikah', 3),
(193, 128, 'Belum Menikah', 4),
(194, 129, '21', 5),
(195, 129, '22', 4),
(196, 129, '23', 3),
(197, 129, '24', 2),
(198, 129, '25 - 30', 1),
(199, 136, 'Sehat', 5),
(200, 136, 'Tidak Sehat', 1);

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
-- Indexes for table `detail_penilaian_rekrutmen`
--
ALTER TABLE `detail_penilaian_rekrutmen`
  ADD PRIMARY KEY (`id_dt_penilaian_rekrutmen`),
  ADD KEY `id_penilaian_rekrutmen` (`id_penilaian_rekrutmen`);

--
-- Indexes for table `detail_subkriteria_penilaian`
--
ALTER TABLE `detail_subkriteria_penilaian`
  ADD PRIMARY KEY (`id_dt_subkriteria_penilaian`),
  ADD KEY `detail_subkriteria_penilaian_ibfk_1` (`id_dt_krt_penilaian`);

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
  ADD KEY `file_calon_karyawan_ibfk_2` (`id_calon_karyawan`);

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
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `no_induk_karyawan` (`nik`),
  ADD UNIQUE KEY `no_telp_karyawan` (`telp_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

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
  ADD PRIMARY KEY (`id_penilaian_kmp`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `penilaian_rekrutmen`
--
ALTER TABLE `penilaian_rekrutmen`
  ADD PRIMARY KEY (`id_penilaian_rekrutmen`),
  ADD KEY `penilaian_rekrutmen_ibfk_1` (`id_calon_karyawan`),
  ADD KEY `penilaian_rekrutmen_ibfk_2` (`id_rekrutmen`);

--
-- Indexes for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  ADD PRIMARY KEY (`id_rekrutmen`),
  ADD KEY `id_fpkb` (`id_fpkb`);

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
  MODIFY `id_calon_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `desk_rekrutmen`
--
ALTER TABLE `desk_rekrutmen`
  MODIFY `id_desk_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `detail_penilaian_rekrutmen`
--
ALTER TABLE `detail_penilaian_rekrutmen`
  MODIFY `id_dt_penilaian_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `detail_subkriteria_penilaian`
--
ALTER TABLE `detail_subkriteria_penilaian`
  MODIFY `id_dt_subkriteria_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `file_calon_karyawan`
--
ALTER TABLE `file_calon_karyawan`
  MODIFY `id_file_calon_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fpkb`
--
ALTER TABLE `fpkb`
  MODIFY `id_fpkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria_rekrutmen`
--
ALTER TABLE `kriteria_rekrutmen`
  MODIFY `id_krt_rekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `penilaian_kmp`
--
ALTER TABLE `penilaian_kmp`
  MODIFY `id_penilaian_kmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian_rekrutmen`
--
ALTER TABLE `penilaian_rekrutmen`
  MODIFY `id_penilaian_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  MODIFY `id_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `skala_penilaian`
--
ALTER TABLE `skala_penilaian`
  MODIFY `id_skala_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subkriteria_rekrutmen`
--
ALTER TABLE `subkriteria_rekrutmen`
  MODIFY `id_subkriteria_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desk_rekrutmen`
--
ALTER TABLE `desk_rekrutmen`
  ADD CONSTRAINT `desk_rekrutmen_ibfk_1` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penilaian_rekrutmen`
--
ALTER TABLE `detail_penilaian_rekrutmen`
  ADD CONSTRAINT `detail_penilaian_rekrutmen_ibfk_1` FOREIGN KEY (`id_penilaian_rekrutmen`) REFERENCES `penilaian_rekrutmen` (`id_penilaian_rekrutmen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_subkriteria_penilaian`
--
ALTER TABLE `detail_subkriteria_penilaian`
  ADD CONSTRAINT `detail_subkriteria_penilaian_ibfk_1` FOREIGN KEY (`id_dt_krt_penilaian`) REFERENCES `detail_kriteria_penilaian` (`id_dt_kriteria_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_calon_karyawan`
--
ALTER TABLE `file_calon_karyawan`
  ADD CONSTRAINT `file_calon_karyawan_ibfk_1` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `file_calon_karyawan_ibfk_2` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id_calon_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fpkb`
--
ALTER TABLE `fpkb`
  ADD CONSTRAINT `fpkb_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE;

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON UPDATE CASCADE;

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
-- Constraints for table `penilaian_kmp`
--
ALTER TABLE `penilaian_kmp`
  ADD CONSTRAINT `penilaian_kmp_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_rekrutmen`
--
ALTER TABLE `penilaian_rekrutmen`
  ADD CONSTRAINT `penilaian_rekrutmen_ibfk_1` FOREIGN KEY (`id_calon_karyawan`) REFERENCES `calon_karyawan` (`id_calon_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_rekrutmen_ibfk_2` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  ADD CONSTRAINT `rekrutmen_ibfk_1` FOREIGN KEY (`id_fpkb`) REFERENCES `fpkb` (`id_fpkb`) ON DELETE CASCADE ON UPDATE CASCADE;

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
