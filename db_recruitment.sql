-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 06:34 AM
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
  `telp_calon_karyawan` varchar(14) NOT NULL,
  `ttl_calon_karyawan` varchar(50) NOT NULL,
  `alamat_calon_karyawan` varchar(128) NOT NULL,
  `kodepos_calon_karyawan` varchar(50) NOT NULL,
  `status_pernikahan` varchar(128) NOT NULL,
  `status_pendidikan` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `status_calon_karyawan` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_karyawan`
--

INSERT INTO `calon_karyawan` (`id_calon_karyawan`, `nama_calon_karyawan`, `email_calon_karyawan`, `telp_calon_karyawan`, `ttl_calon_karyawan`, `alamat_calon_karyawan`, `kodepos_calon_karyawan`, `status_pernikahan`, `status_pendidikan`, `agama`, `status_calon_karyawan`) VALUES
(26, 'Rujhan Fidiplilah', 'rujhan@gmail.com', '081153662547', 'Bandung, 7 Juli 2020', 'Jl Sukasasri No 22', '40553', 'Belum menikah', 'S1', 'Islam', 1),
(27, 'Rifqi Ramdhani', 'rifqiramdhani8@gmail.com', '08139300312930', 'Bandung, 21 Desember 1998', 'Perum Bukit Berlian C72', '40553', 'Belum menikah', 'S1', 'Islam', 1),
(28, 'Saeful Apriana', 'saeful@gmail.com', '0813242432424', 'Bandung, 21 Desember 1998', 'Perum Bukit Berlian C72', '301122', 'Belum menikah', 'D3', 'Islam', 1),
(29, 'Ruyatsyah', 'ruyatsy@gmail.com', '081323333329', 'Bandung, 21 Desember 1998', 'Garut, Jl Bukit Mawar No 10', '40877', 'Belum menikah', 'D3', 'Islam', 1),
(30, 'Ahmad Sholihin', 'ahmad@gmail.com', '0811110312930', 'Bandung, 21 Desember 1998', 'Garut, Jl Bukit Mawar No 10', '40877', 'Menikah', 'D1', 'Hindu', 1),
(31, 'Gugun Gunawan', 'gugun@gmail.com', '081444403329', 'Cianjur, 22 Desember 1999', 'Garut, Jl Bukit Mawar No 10', '40877', 'Belum menikah', 'D1', 'Khatolik', 1),
(32, 'Junaedi', 'junaedi@gmail.com', '081391156329', 'Bandung, 21 Desember 1998', 'Jl Turangga No 30', '40877', 'Menikah', 'D1', 'Khatolik', 1);

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
(72, 31, 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Vero, Pariatur Atque Eius Veniam Debitis Aliquam Doloremque Rem Corrupti Culpa Eos Fugit Maiores Odio Architecto Fuga Ullam Ut, Suscipit Magnam Placeat!', 'deskripsi'),
(73, 31, 'Minimal S1', 'persyaratan'),
(74, 31, 'Berpengalaman 1 Tahun Menjadi Countent Writer', 'persyaratan'),
(75, 31, 'Berkopetensi Unggul', 'persyaratan'),
(76, 31, '25-30 Tahun', 'persyaratan'),
(77, 31, 'Pandai Menganalisa', 'persyaratan'),
(100, 40, 'Merencanakan Dan Mengkoordinasikan Penyusunan Anggaran Perusahaan, Serta Mengontrol Penggunaan Anggaran Tersebut Untuk Memastikan Penggunaan Dana Secara Efektif Dan Efisien Dalam Menunjang Kegiatan Operasional Perusahaan.', 'deskripsi'),
(101, 40, 'Minimal S3', 'persyaratan'),
(102, 40, 'Pernah Bekerja Di Bank', 'persyaratan'),
(103, 40, 'Pernah Mengikuti Kejuaraan Itung Cepat', 'persyaratan'),
(104, 40, 'Maksimal 30 Tahun', 'persyaratan'),
(105, 40, 'Pandai Menghitung', 'persyaratan');

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
-- Table structure for table `detail_penilaian_kmp`
--

CREATE TABLE `detail_penilaian_kmp` (
  `id_dt_penilaian_kmp` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_dt_kriteria_penilaian` varchar(2) NOT NULL,
  `id_dt_subkriteria_penilaian` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penilaian_kmp`
--

INSERT INTO `detail_penilaian_kmp` (`id_dt_penilaian_kmp`, `id_karyawan`, `id_dt_kriteria_penilaian`, `id_dt_subkriteria_penilaian`, `nilai`) VALUES
(1, 109, 'C1', 1, 60),
(2, 109, 'C1', 2, 50),
(3, 109, 'C1', 3, 70),
(4, 109, 'C1', 4, 78),
(5, 109, 'C1', 5, 70),
(6, 109, 'C1', 6, 70),
(7, 109, 'C1', 7, 70),
(8, 109, 'C2', 8, 70),
(9, 109, 'C2', 9, 75),
(10, 109, 'C2', 10, 57),
(11, 109, 'C2', 11, 50),
(12, 109, 'C3', 12, 40),
(13, 109, 'C3', 13, 56),
(14, 109, 'C3', 14, 56),
(15, 109, 'C3', 15, 56),
(16, 109, 'C3', 16, 58),
(17, 106, 'C1', 1, 80),
(18, 106, 'C1', 2, 84),
(19, 106, 'C1', 3, 85),
(20, 106, 'C1', 4, 86),
(21, 106, 'C1', 5, 85),
(22, 106, 'C1', 6, 80),
(23, 106, 'C1', 7, 83),
(24, 106, 'C2', 8, 85),
(25, 106, 'C2', 9, 70),
(26, 106, 'C2', 10, 70),
(27, 106, 'C2', 11, 75),
(28, 106, 'C3', 12, 79),
(29, 106, 'C3', 13, 76),
(30, 106, 'C3', 14, 90),
(31, 106, 'C3', 15, 99),
(32, 106, 'C3', 16, 89),
(33, 107, 'C1', 1, 70),
(34, 107, 'C1', 2, 80),
(35, 107, 'C1', 3, 90),
(36, 107, 'C1', 4, 50),
(37, 107, 'C1', 5, 60),
(38, 107, 'C1', 6, 70),
(39, 107, 'C1', 7, 80),
(40, 107, 'C2', 8, 80),
(41, 107, 'C2', 9, 85),
(42, 107, 'C2', 10, 86),
(43, 107, 'C2', 11, 86),
(44, 107, 'C3', 12, 87),
(45, 107, 'C3', 13, 84),
(46, 107, 'C3', 14, 88),
(47, 107, 'C3', 15, 45),
(48, 107, 'C3', 16, 90);

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
(100, 34, 214, 223),
(101, 34, 215, 226),
(102, 34, 216, 230),
(103, 34, 217, 232),
(104, 34, 218, 3),
(105, 34, 219, 2),
(106, 34, 220, 4),
(107, 34, 221, 5),
(108, 34, 222, 3),
(109, 34, 223, 70),
(110, 34, 224, 236),
(111, 36, 214, 222),
(112, 36, 215, 227),
(113, 36, 216, 230),
(114, 36, 217, 231),
(115, 36, 218, 4),
(116, 36, 219, 3),
(117, 36, 220, 3),
(118, 36, 221, 4),
(119, 36, 222, 2),
(120, 36, 223, 80),
(121, 36, 224, 236),
(122, 35, 214, 224),
(123, 35, 215, 225),
(124, 35, 216, 229),
(125, 35, 217, 234),
(126, 35, 218, 3),
(127, 35, 219, 4),
(128, 35, 220, 5),
(129, 35, 221, 2),
(130, 35, 222, 3),
(131, 35, 223, 77),
(132, 35, 224, 236);

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
(5, 'Sales & Marketing'),
(6, 'Manufaktur'),
(7, 'Advisor'),
(8, 'Secretary'),
(9, 'Pemasaran'),
(10, 'Akunting'),
(11, 'Quality Assurance'),
(12, 'Umum'),
(13, 'Marketing Development'),
(14, 'Product Development'),
(15, 'Operasional Produksi'),
(16, 'Keuangan'),
(17, 'PPIC'),
(18, 'Komisaris');

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
(29, NULL, 26, '65342958.pdf', '76285784.pdf', '52434792.JPG', '73221838.pdf', '39077040.jpg', '81104494.jpg', '25350384.jpg', '11622018.jpg'),
(30, 31, 27, '37019397.pdf', '51414700.pdf', '25114586.JPG', '58871606.pdf', '54242144.jpg', '9662950.jpg', '78293972.jpg', '25764955.jpg'),
(31, 31, 28, '17056192.pdf', '35111189.pdf', '46139989.JPG', '42203374.pdf', '56148685.jpg', '83360108.jpg', '56394076.jpg', '56081543.jpg'),
(32, 31, 29, '38634323.pdf', '89542879.pdf', '50398250.JPG', '50318436.pdf', '40735270.jpg', '8723455.jpg', '99546895.jpg', '11250945.jpg'),
(34, NULL, 30, '9459475.pdf', '24275493.pdf', '99971445.JPG', '80357155.pdf', '99619697.jpg', '1354048.jpg', '75627392.jpg', '21131228.jpg'),
(35, NULL, 31, '85404849.pdf', '28014195.pdf', '52040947.JPG', '16638788.pdf', '97848569.jpg', '59902908.jpg', '91349209.jpg', '15710480.jpg'),
(36, NULL, 32, '35023658.pdf', '29410633.pdf', '92473465.JPG', '83251979.pdf', '15207863.jpg', '30390522.jpg', '57913409.jpg', '69290822.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fpkb`
--

CREATE TABLE `fpkb` (
  `id_fpkb` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `posisi_dibutuhkan` varchar(128) NOT NULL,
  `jumlah_dibutuhkan` int(11) NOT NULL,
  `jumlah_karyawan` int(11) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `pendidikan_formal` varchar(128) NOT NULL,
  `pengalaman` varchar(128) NOT NULL,
  `kompetensi` varchar(128) NOT NULL,
  `usia` varchar(50) NOT NULL,
  `job_desc` varchar(256) NOT NULL,
  `status_fpkb` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fpkb`
--

INSERT INTO `fpkb` (`id_fpkb`, `id_karyawan`, `id_jabatan`, `posisi_dibutuhkan`, `jumlah_dibutuhkan`, `jumlah_karyawan`, `tanggal_permintaan`, `tanggal_disetujui`, `pendidikan_formal`, `pengalaman`, `kompetensi`, `usia`, `job_desc`, `status_fpkb`) VALUES
(10, 5, 43, 'Content Writer Sales &amp; Marketing', 2, 3, '2020-07-13', '2020-07-13', 'Minimal S1', 'Berpengalaman 1 Tahun Menjadi Countent Writer', 'Berkopetensi Unggul', '25-30 Tahun', 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Vero, Pariatur Atque Eius Veniam Debitis Aliquam Doloremque Rem Corrupti Culpa Eos Fugit Maiores Odio Architecto Fuga Ullam Ut, Suscipit Magnam Placeat!', 3),
(11, 12, 48, 'Staff Unit Toples Operasional Produksi', 1, 2, '2020-07-13', '2020-07-13', 'Minimal S1', 'Berpengalaman 1 Tahun Menjadi Staff Unit Toples', 'Berkopetensi Unggul', '25-30 Tahun', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Soluta Quae Molestiae Eaque Nihil Temporibus, Aut Excepturi Recusandae Voluptas Ullam Veniam Nostrum Nesciunt, Autem Eligendi Deserunt Quod Reiciendis Sit Quam Officiis!', 3),
(12, 13, 31, 'Staff Keuangan Keuangan', 1, 2, '2020-07-16', '2020-07-16', 'Minimal S3', 'Pernah Bekerja Di Bank', 'Pernah Mengikuti Kejuaraan Itung Cepat', 'Maksimal 30 Tahun', 'Merencanakan Dan Mengkoordinasikan Penyusunan Anggaran Perusahaan, Serta Mengontrol Penggunaan Anggaran Tersebut Untuk Memastikan Penggunaan Dana Secara Efektif Dan Efisien Dalam Menunjang Kegiatan Operasional Perusahaan.', 3),
(13, 13, 31, 'Staff Keuangan Keuangan', 1, 2, '2020-07-23', '2020-07-23', 'Minimal S1', 'Berpengalaman 1 Tahun Menjadi Bussiness Analytical', 'Berkopetensi Unggul', '25-30 Tahun', 'Dibutuhkan Orang Yang Mahir Dibidang  Keuangan Minimal Pendidikan S1 Manajemen', 3),
(14, 5, 43, 'Content Writer Sales &amp; Marketing', 2, 3, '2020-07-24', '0000-00-00', 'Minimal S1', 'Berpengalaman 1 Tahun Menjadi Bussiness Analytical', 'Berkopetensi Unggul', '25-30 Tahun', 'Adadfafafdf', 1);

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
(2, 'Direktur', 2, 1, 1),
(3, 'Direktur', 6, 1, 1),
(4, 'Direktur', 9, 1, 1),
(5, 'Manager', 1, 1, 1),
(6, 'Manager', 5, 1, 1),
(7, 'Spv Admin Dist & Ekspedisi', 12, 1, 1),
(8, 'Spv Bagian Umum', 12, 1, 1),
(9, 'Spv Toples', 15, 1, 1),
(10, 'Spv Cetak & Celip', 15, 1, 1),
(11, 'Spv Layanan & Handling Complain', 5, 1, 1),
(12, 'Spv Reseller Surabaya', 5, 1, 1),
(13, 'Spv Reseller BBekasi', 5, 1, 1),
(14, 'Spv. Retail & Pameran', 5, 1, 1),
(15, 'Spv Reseller', 5, 1, 1),
(16, 'Spv Cookies Specialis', 14, 1, 1),
(17, 'Spv Engineering & Pembangunan ', 12, 1, 1),
(18, 'Spv Gudang Bahan Baku', 17, 1, 1),
(19, 'Spv Gudang Bahan Setengah Jadi', 17, 1, 1),
(20, 'Kepala Gudang Bahan Baku', 17, 1, 1),
(21, 'Kepala Gudang Surabaya', 17, 1, 1),
(22, 'Kepala Gudang Bekasi', 17, 1, 1),
(23, 'Spv Purchasing', 13, 1, 1),
(24, 'Spv Resep', 15, 1, 1),
(25, 'Staff', 1, 1, 1),
(26, 'Staff IT', 12, 1, 1),
(27, 'Staff Distribusi', 12, 1, 1),
(28, 'Staff Gudang', 17, 1, 1),
(29, 'Driver', 12, 4, 1),
(30, 'Motoris', 12, 2, 1),
(31, 'Staff Keuangan', 16, 3, 1),
(32, 'Staff Akunting', 10, 2, 1),
(33, 'Staff Reseller', 5, 1, 1),
(34, 'Admin Pelayanan Online', 5, 3, 1),
(35, 'Program Project', 13, 3, 1),
(36, 'Assisten Resep', 15, 1, 1),
(37, 'Staff Resep', 15, 2, 1),
(38, 'Staff Product Development', 14, 2, 1),
(39, 'Staff Quality Control', 11, 3, 1),
(40, 'Web Programmer', 12, 1, 1),
(41, 'Staff Marketing Developmen', 13, 1, 1),
(42, 'Sekretaris', 13, 1, 1),
(43, 'Content Writer', 5, 5, 1),
(44, 'Desain Grafis', 5, 1, 1),
(45, 'Security', 12, 1, 1),
(46, 'Sanitasi Kantor', 11, 3, 1),
(47, 'Staff Unit Cetak', 15, 1, 1),
(48, 'Staff Unit Toples', 15, 3, 1),
(49, 'Staff Unit Bakar', 15, 3, 1),
(50, 'Kepala Gudang Bandung', 17, 1, 1),
(51, 'Manager', 10, 1, 1),
(52, 'Manager', 11, 1, 1),
(53, 'Manager', 12, 1, 1),
(54, 'Manager', 13, 1, 1),
(55, 'Manager', 14, 1, 1),
(56, 'Manager', 15, 1, 1),
(57, 'Manager', 16, 1, 1),
(58, 'Corperate', 7, 1, 1),
(59, 'Wakil Direktur', 9, 1, 1),
(60, 'Komisaris', 18, 1, 1),
(61, 'Assisten', 18, 1, 1),
(62, 'Corperate', 8, 1, 1),
(63, 'Kordinator Reseller ', 5, 1, 1),
(64, 'Enginering', 12, 1, 1),
(68, 'Karyawan Masa Percobaan', 5, 2, 1),
(69, 'Karyawan Masa Percobaan', 15, 1, 1),
(70, 'Karyawan Masa Percobaan', 16, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `email_karyawan` varchar(128) NOT NULL,
  `password_karyawan` varchar(128) NOT NULL,
  `token_karyawan` varchar(100) NOT NULL,
  `nama_karyawan` varchar(128) NOT NULL,
  `nik` varchar(7) NOT NULL,
  `telp_karyawan` varchar(13) NOT NULL,
  `ttl_karyawan` varchar(128) NOT NULL,
  `alamat_karyawan` varchar(128) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status_karyawan` tinyint(1) NOT NULL DEFAULT '1',
  `level` enum('admin','karyawan','') NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_jabatan`, `email_karyawan`, `password_karyawan`, `token_karyawan`, `nama_karyawan`, `nik`, `telp_karyawan`, `ttl_karyawan`, `alamat_karyawan`, `tanggal_masuk`, `status_karyawan`, `level`) VALUES
(1, NULL, 'admin@gmail.com', '$2y$10$TUYIpHPRIWmZhFybxKP33.dMfwZboDHGFHirh2ibx.9WbEz7k/uUC', 'ja+godUeA3a3SyrusBgMpPVdSzHRMJqJMBPXtsuDaOo=', 'Admin', '1811763', '081393003129', 'Bandung, 21 Desember 1998', 'jl. budhi no 37', '0000-00-00', 1, 'admin'),
(2, 1, 'direkturutama@gmail.com', '$2y$10$8FdnCmsHWy0bZH2YEtxNj.NbThC5ttmRR59WKbC9z0e33esMAUv6u', '', 'Ir. Rakhmat Basuki Direktur Utama', '1788778', '08139332200', 'Bandung, 30 April 1979', 'Jl lumba-lumba no 10', '2009-03-17', 1, ''),
(3, 2, 'direktursupport@gmail.com', '$2y$10$Ub4CzRceL2zKzpYfevkgcePXtgbRf/sADy.I4..FnrAWZlMfu1Bam', '', 'Tito Afrianto', '1833666', '087303998722', 'Bandung, 5 Mei 1972', 'Jl Mercusuar no 50', '2011-01-15', 1, ''),
(4, 5, 'managersdm@gmail.com', '$2y$10$EcdJOJEGLnMF3pEUqqKwf.GR9KZKZ8o78mRuVXc2H5CbtQc6OJeYa', '', 'Mochamad Yunus', '1733887', '0813993322817', 'Bandung, 22 Mei 1990', 'Jl Mercusuar no 22', '2017-12-14', 1, ''),
(5, 6, 'managerdivisi@gmail.com', '$2y$10$OrymNzpPP9tGEyprKShmAeJzOegpBavr/j3NRo0/M/uzkytgqLNdO', '', 'Herry Belanegara', '1788763', '08139300129', 'Bandung, 22 November 1980', 'Bukit Mawar no 10', '2009-08-05', 1, ''),
(6, 25, 'staffsdm@gmail.com', '$2y$10$B47DYFY/3rEd/WoiGs3pGe4IFBFGBFLBJioezjtddRJGsp/cHP0/C', '', 'Anugerah Ocrino mulyo Suko', '1011887', '081722774621', 'Bandung, 21 Desember 1998', 'jl. budhi no 37', '2005-02-10', 1, ''),
(7, 51, 'managerakunting@gmail.com', '$2y$10$mubiHP7U7/yYO75.S/l3ie3t.kideoTLJaLfz./rWRrnWlMT6qurG', '', 'Supriadi', '1012386', '081806535281', 'Garut, 22 April 1999', 'Jl sawarna no 33', '0000-00-00', 1, ''),
(8, 52, 'managerqa@gmail.com', '$2y$10$pDFI38Dz0zLqClfVcolVpe162FyCXnhqkejT7/tCoIPU0RDI0YmSK', '', 'Akhmad Taufik', '1015051', '081852785002', 'Garut, 22 April 1999', 'Jl sawarna no 33', '0000-00-00', 1, ''),
(9, 53, 'managerumum@gmail.com', '$2y$10$ssn4pd4CkHDLxOmQW1sPieGxR0VTE2qbLPnlAzGSSrME15LwrIdZy', '', 'Yadi Supriyadi', '1015321', '081741770107', 'Garut, 22 April 1999', 'Jl sawarna no 33', '0000-00-00', 1, ''),
(10, 54, 'managermarketingdev@gmail.com', '$2y$10$fst3zYCHLbkeIwepwZLBm..lKuGb3pBgxKWOGxiJsR.z.VSN1FwDu', '', 'Iqbal Abdul Kabir', '1016882', '081933376500', 'Garut, 22 April 1999', 'Jl sawarna no 33', '0000-00-00', 1, ''),
(11, 55, 'managerproductdev@gmail.com', '$2y$10$KO.ZNbFJxE9ooLLq.y7cvOLEibAKIQDLExJqaWqovczl9Fz7GL39C', '', 'Dadan Surya Kusuma', '1011226', '081955181850', 'Garut, 22 April 1999', 'Jl sawarna no 33', '0000-00-00', 1, ''),
(12, 56, 'manageroperasionalproduksi@gmail.com', '$2y$10$P16JeZ0oWdv4qA.x7S16MehXbSpPJgYakkB1YHblnb.lSil.A06mi', '', 'Rismalina', '1015037', '081808432276', 'Garut, 22 April 1999', 'Jl sawarna no 33', '0000-00-00', 1, ''),
(13, 57, 'managerkeuangan@gmail.com', '$2y$10$wzavwKN8TfXRul2Hj1EAMu5kVqEk7Osxl2T3eepvhek3JFbZgj6R2', '', 'Dini Hartini', '1015206', '081554150782', 'Garut, 22 April 1999', 'Jl sawarna no 33', '0000-00-00', 1, ''),
(19, 60, 'wiyandini@gmail.com', '$2y$10$zaaUmEhIJKc.t.m5miRQa.Wub1rrD6Ea5WfFSFUKsCbk1a9wwSG7i', '', 'Rr. Ina Wiyandini', '1015675', '081436141665', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2011-03-06', 1, ''),
(20, 58, 'purwanto@gmail.com', '$2y$10$9lJIMf.Dy6DuwBB.UOWV2uErwacsUg8vh2hcAsQaTZtZaciKsY/wq', '', 'Budi Purwanto', '1015383', '081445548407', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2006-02-11', 1, ''),
(22, 3, 'sadrina@gmail.com', '$2y$10$EWou7DRNJlG/LzZtCx587OZsQfCdOj73JlHnh7QGwNevWucSXKVES', '', 'Afiandini Nur Sadrina', '1014428', '087904076032', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2004-02-09', 1, ''),
(23, 59, 'rahmaniar@gmail.com', '$2y$10$tbF2UJV/oCiyMNiQaw4bk.4jyKLLCW.8Us7CtxnFzaURX7tXxvH8a', '', 'Voula Nur Rahmaniar', '1013670', '081435614054', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2005-09-26', 1, ''),
(24, 4, 'n@gmail.com', '$2y$10$k69uCYOcy/pwxCELv64/Dedm5.qauelzYUKcmVoW3oswoL.b.tAeW', '', 'Fakhri Saefulah N', '1015013', '087940721788', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2016-11-01', 1, ''),
(25, 62, 'gustini@gmail.com', '$2y$10$hLiBC2nco6f4j/aW3ofcZ.X6GEjKujnkADPlNWMTPbEwEf9uWGxrS', '', 'Rini Gustini', '1014458', '081434173321', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2002-11-13', 1, ''),
(26, 61, 'friliyantini@gmail.com', '$2y$10$0Iwf26Fu4ICOVNVI/AGDgu4jXzhpMF7Vlliz7pdpaFQIb5Lc954gm', '', 'Yuarti Friliyantini', '1014453', '081204722351', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2017-08-04', 1, ''),
(36, 7, 'agustina@gmail.com', '$2y$10$cHOnN1Q.cX/nSXSHqVqL2.11MQDprg19JlHWrveuYDOVWzJL31Q/u', '', 'Asri Agustina', '1011360', '081578173241', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2003-07-15', 1, ''),
(37, 8, 'tohar@gmail.com', '$2y$10$l0h.WAJoiengaDmFZp9DTe2EBZvDdxwVDzzYWvB3hBki04tQc.1W.', '', 'Mubin Abdul Tohar', '1013883', '081711355806', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2014-04-23', 1, ''),
(38, 9, 'suryani@gmail.com', '$2y$10$hpge6DGD6jUtvuWaP8GpkOIzCdO3EZ5VRmqYkleaKLVaLsV608Waq', '', 'Iis Suryani', '1012646', '081720648284', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2010-03-18', 1, ''),
(39, 10, 'tati@gmail.com', '$2y$10$wypz4gIzIwk4l9RqD38eIu5UYOaQm4ueMnOAH2evUmYcIquT4Y1M.', '', 'Ai Tati', '1012382', '087973731533', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2015-04-04', 1, ''),
(40, 63, 'rahma@gmail.com', '$2y$10$nnpPR9.JCJ9Q9WNwKIlxb.O8abBKhtjPCKwg3aearaz34B3k/jcbG', '', 'Lida Murdiyanti Rahma', '1012766', '081841132847', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2007-10-25', 1, ''),
(41, 12, 'yanti@gmail.com', '$2y$10$gAoBhYRXqe.vK61PG1uJfecY/BIM/8xdWH/UdfvhhEEFeHr4iR9jm', '', 'Devi Yanti', '1016372', '081920336245', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2016-04-04', 1, ''),
(42, 13, 'kuswati@gmail.com', '$2y$10$Jd5I3w8vLmC0Vo/hih84MeeY768tMSBxcJz5OO2xyc/QzA0xLnJYK', '', 'Wawat Kuswati', '1014226', '081248583412', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2001-11-19', 1, ''),
(43, 11, 'yulianti@gmail.com', '$2y$10$vh8FzoTosg/F.cei/yjBsew4FxSlatMEToI0Cn7TPQut2TK7aEkIO', '', 'Yuyu Yulianti', '1012354', '089850376767', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2005-09-18', 1, ''),
(44, 14, 'cahyaning@gmail.com', '$2y$10$ZBU4nE1n5DM.4T48BcD/Iey3.4tokqJnBGPsF4UfnCVmID4areJSS', '', 'Junjunan Cahyaning', '1016652', '081578860258', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2008-06-24', 1, ''),
(45, 15, 'nurgantara@gmail.com', '$2y$10$OrhNupftGl0sTePyw9TCpOSDAC8TvQDR6Q0rR77S0VmjdBs0pgPba', '', 'Galih Nurgantara', '1016817', '081645260063', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2004-10-31', 1, ''),
(46, 39, 'firmansyah@gmail.com', '$2y$10$xAD175jOc2ZEQmkMekZFt.gzl5prqfaE1Un3wHZFxleAHvKzmGFD2', '', 'Adi Firmansyah', '1016408', '081973150258', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2007-03-25', 1, ''),
(47, 17, 'george@gmail.com', '$2y$10$EPyOzN4Chz1cRqhzVM4wBO5YNVToe7RitfZO8FjNERUVPgF2flB4i', '', 'Ommar Akbar George Tan', '1015845', '089873647575', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2008-02-12', 1, ''),
(48, 18, 'supratno@gmail.com', '$2y$10$RPKA6gZnhdHXB3zCXJCa0.N8oO0Fy6APxUI5PdbL6acdut9wTSxVa', '', 'Supratno', '1011883', '089888255633', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2011-08-26', 1, ''),
(49, 20, 'jamaludin@gmail.com', '$2y$10$fB5z9GcZDrFbX3RkaR0nNuDiydKXCfdMcjOV7QE0EpA.i4llQ6wzC', '', 'Jamaludin', '1012601', '089850575850', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2007-10-23', 1, ''),
(50, 21, 'ardianto@gmail.com', '$2y$10$8YPwLr2dUs9HE0gp6CrTe.TBWpY4tX3RPIgcu2uEDBubgyXGsOd4e', '', 'Tony Ardianto', '1016628', '089811657827', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2010-02-27', 1, ''),
(51, 22, 'rohman@gmail.com', '$2y$10$gDxX/1p9pEBtVakA/LN0e.QYdg9xKX/ndTmH4ANVNFjG69OuWyFWG', '', 'M. Abdul Rohman', '1012074', '081386302605', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2009-05-16', 1, ''),
(52, 19, 'hidayat@gmail.com', '$2y$10$SG2wB421iHGCBrf.krzHne1cd3vfHAD2fGKSG71iUMc5mp.YtM9fq', '', 'Ahmad Syarif Hidayat', '1016026', '081880040303', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2012-07-01', 1, ''),
(53, 23, 'kholida@gmail.com', '$2y$10$jJqcO141IvLcUGzvQokZq.yMO3HDoMC7o6ppdkV2fFQNln82gKCiy', '', 'Kholida', '1013508', '081981111074', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2012-02-28', 1, ''),
(54, 28, 'endi@gmail.com', '$2y$10$kfgiCLJuMFKksWMOWOVimu9WHlpjWNSyA8jlfvpXgz33O6kebyEdu', '', 'Rita Endi', '1015228', '087921180817', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2012-02-09', 1, ''),
(56, 26, 'firmansyah@gmail.com', '$2y$10$g6xr/46ilLsi/Z12WLTB1O5fsRdtoEej16oDByXjjH9nRaVls7sXm', '', 'Angga Firmansyah', '1014720', '081211760656', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2017-10-01', 1, ''),
(57, 64, 'sholeh@gmail.com', '$2y$10$wpSStz3fT2GNY29Txh1c6emtp/w5BzvtVfrmQqv5OtKGBziscRBRe', '', 'Sholeh', '1016640', '081451207543', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2003-03-30', 1, ''),
(58, 27, 'cahya@gmail.com', '$2y$10$SRL60nzguMGrUn/HztlJY.oftXrHjiTNYb2qafHOqeWQmzY.Uy6aC', '', 'Nendi Cahya', '1013704', '081670721158', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2003-09-10', 1, ''),
(59, 21, 'dodi@gmail.com', '$2y$10$1hVvuO5wEjOU69bhdegOC.Mpp.YsePuHkmTiOaK376.NfsjC./vUq', '', 'Dodi', '1013788', '081742402505', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2017-11-05', 1, ''),
(60, 29, 'suryana@gmail.com', '$2y$10$OBArAQTeizist.whTCnvfel0w4BTG6zPqvyLzjIZtWXoD58qnzgHu', '', 'Ujang Suryana', '1013634', '081548666823', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2007-04-17', 1, ''),
(61, 29, 'sukirman@gmail.com', '$2y$10$yaUrpDn/z.HetIr9jy/9GuE7wHv3aUqaVDJLwAJifkSMsgqNC/.Xy', '', 'Sukirman', '1015680', '081821810260', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2019-06-21', 1, ''),
(62, 29, 'rudi@gmail.com', '$2y$10$zTG4yg8dBQB.nzxwC/0wS.j49t/8ggCPFcMo6mh1TBrvMV.I8ljuC', '', 'Asep Rudi', '1012303', '081680807287', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2019-11-03', 1, ''),
(63, 29, 'yuswanda@gmail.com', '$2y$10$RSlTvRaxnu0KXP9/zEWCTOS1vlKpO3DlIbJeyjeravi79bNKUbSli', '', 'Aman Yuswanda', '1011452', '081536120068', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2013-12-30', 1, ''),
(64, 30, 'niki@gmail.com', '$2y$10$ldsoRaX.m.86k0G/o2zAwuR0LCaBU2E2hNRM39rp9.oo67t2vGvpm', '', 'Niki', '1016488', '081212481336', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2019-03-03', 1, ''),
(65, 30, 'supendi@gmail.com', '$2y$10$OireSGJPha69wsY91msR2OGS8DTVRMq2/mmUOr4ADfXBFUPNLooIe', '', 'Wandi Supendi', '1012620', '081760822670', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2013-05-05', 1, ''),
(66, 31, 'sonia@gmail.com', '$2y$10$Mw7.ZSxle4Kx81tjfdxmZuvrtNROemPlw5.J.Mh7Ibn8L1KcBDw/m', '', 'Risa Sonia', '1016228', '081887621483', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2017-05-08', 1, ''),
(67, 32, 'nugraha@gmail.com', '$2y$10$HoimkfWyHGmz4FD5ady/qOOR0eue1CjUwcM08CFmtH7TmFhO4mI4y', '', 'Rizki Nugraha', '1014826', '081560640581', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2002-03-02', 1, ''),
(68, 31, 'juliana@gmail.com', '$2y$10$APdUF6TZUJiOdaSZV8eXIeRoslOJFL52gII3LVWpBlhG8FqwEte1S', '', 'Shela Juliana', '1013871', '081721511416', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2008-02-23', 1, ''),
(69, 32, 'ryan@gmail.com', '$2y$10$084CiU2BNX4XOpXbsvvoLePknD/sgOm24ZVYsO.zGZrxYWp7ybN5.', '', 'Ryan', '1016315', '089880301145', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2017-11-09', 1, ''),
(70, 33, 'sari@gmail.com', '$2y$10$/A33kDMKl3/mfRjce9KmcOFBtwaVb9drxzKkB4KqC1IJzlZPNrDCe', '', 'Rizki Permata Sari', '1016466', '081244344285', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2008-04-17', 1, ''),
(71, 34, 'amelia@gmail.com', '$2y$10$9kn2WbOjTXrrshcLkU8xu.ZU/2SIBuSTz0NW1RS0bWjmA.PudjUjy', '', 'Lia Amelia', '1013034', '081457101537', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2016-06-09', 1, ''),
(72, 34, 'nurul@gmail.com', '$2y$10$HGqebW1jARqn42cpz8PFSOg6bgsg7SJayKGCgmK3kQHcrVIFyfzP6', '', 'Dinny Sarah Nurul Faiddah', '1014555', '081568821716', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2008-03-24', 1, ''),
(73, 34, 'konaah@gmail.com', '$2y$10$k6.KxBVbZyTYsvuSPPgvuOkNuKmq5.pgD2C2Dc7LNk2ztkAgph3C2', '', 'Konaah', '1016674', '081635505142', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2018-01-01', 1, ''),
(74, 35, 'rachmawati@gmail.com', '$2y$10$ErpA17xrMfwG6h4jXJXmu.ijjD5cKU/XAP0HZ/C.rYnXcmlv/3quq', '', 'Santi Rachmawati', '1013478', '081248814643', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2019-10-01', 1, ''),
(75, 35, 'dewi@gmail.com', '$2y$10$aLmw8ENaGBDaHinHatga7.yXL3OCalgSvoE5kDtn9/ATfQqxZKGK2', '', 'Silvia Dewi', '1015703', '081918247612', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2009-03-24', 1, ''),
(76, 35, 'razil@gmail.com', '$2y$10$tmsmEvP9GdXQ/lTzWqGekOs713jZrgrQNQINkJVIscdG141yZELvK', '', 'Razil', '1016437', '087962661421', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2008-03-17', 1, ''),
(77, 36, 'alef@gmail.com', '$2y$10$LF9z9SVSDGEtc2YTLLOUKuBOKkyF2w0ZqkBblnBPHFE2qIYvOAJZe', '', 'Ade Alef', '1013861', '081978436241', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2016-04-26', 1, ''),
(78, 37, 'nengsih@gmail.com', '$2y$10$E1U5uVSKwvyqkf66TePh3OP4hzfWyxMejmv9wLldtR/QdIpO5QSe.', '', 'Nengsih', '1011181', '081745126261', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2013-11-02', 1, ''),
(79, 37, 'sulaiman@gmail.com', '$2y$10$KEXpnIDaheM1sg94t6P6gutVi0yCEk.ISf8BvQodE8Ma711dO8bQ.', '', 'Iman Sulaiman', '1016207', '081375220208', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2015-11-28', 1, ''),
(80, 47, 'agustinah@gmail.com', '$2y$10$oncwdNnsKKgKlXQTCi6BfOKOomDDm6nwHaZKdXyh1mzNlhkgJMWWS', '', 'Agustinah', '1013124', '081853844012', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2018-02-16', 1, ''),
(81, 48, 'rostini@gmail.com', '$2y$10$GgKZIxGQHaqLeWSMPbrxVO24iFT5tpHzr3AX7/ZdNFXrY5zAAaMGa', '', 'Rostini', '1013714', '081446428581', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2018-01-20', 1, ''),
(82, 18, 'kartini@gmail.com', '$2y$10$G5hKdywk5fLOLvjX61M.gOz4EJzUx.hjxCVZF4iS2RKz7ajsBql0q', '', 'Entin Kartini', '1013857', '081783204788', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2006-11-26', 1, ''),
(83, 49, 'suryani@gmail.com', '$2y$10$Q6Uf/rxsPFlahY5MCQf7Ne8yEI3TrqSOJVWzOOnPWSPcApBz3fYr.', '', 'Neni Suryani', '1014231', '089830824803', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2004-03-24', 1, ''),
(84, 49, 'khodijah@gmail.com', '$2y$10$HJGF65pNHcFfTKVou7LfVODGhPLBRGhyMF2HNDLyvwBC1krQAWrBa', '', 'Siti Khodijah', '1015005', '081906043611', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2014-11-04', 1, ''),
(85, 49, 'suhaeti@gmail.com', '$2y$10$W7p56t4aVXKpPq5U8KgDA.3Ed43M0aL2rALEG4UQx0FvMYq4u0hD2', '', 'Eti Suhaeti', '1015258', '081217736530', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2012-02-12', 1, ''),
(86, 48, 'anggraeni@gmail.com', '$2y$10$mUew3M75D0J03H3kxQOmT.0NEFzrxiDOcGJEfrY56EikfWmQWaMUu', '', 'Reni Anggraeni', '1015363', '089844017536', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2011-01-04', 1, ''),
(87, 38, 'istianto@gmail.com', '$2y$10$bm689ihohbuKctNGK6xsDuAICovxElt3qg.pcjAqnbyJ2UkSOevbm', '', 'Istianto', '1011041', '081667188631', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2011-03-11', 1, ''),
(88, 38, 'nurlatifah@gmail.com', '$2y$10$S5MVdh7utAwOM.4TdJhzeur0RXIseBbU/Sx5M6.MI7zvkyUF7KPiG', '', 'Fitri Citra Nurlatifah', '1016520', '081300023152', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2018-02-02', 1, ''),
(89, 39, 'nurjanah@gmail.com', '$2y$10$afR3OGXiXkPPEq9.mwtr9.SG6UEI//EMliHOEzlG9SmW6XXowgCEa', '', 'Eli Nurjanah', '1014628', '087975652548', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2012-03-20', 1, ''),
(90, 39, 'suminar@gmail.com', '$2y$10$3r7f.JEbfsKDltXlJKUCL.xFiwte.CHda.QUwWtawU1aF94qaFMDm', '', 'Eulis Suminar', '1013132', '081274874204', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2007-09-22', 1, ''),
(91, 39, 'fatimah@gmail.com', '$2y$10$qW3qBYcJzTwT.BkyrOwHTeJ9Qm9VyOjwYPEhktSjBe0OIwk0IJoUe', '', 'Empat Fatimah', '1011056', '081353575303', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2010-01-21', 1, ''),
(92, 40, 'fadhli@gmail.com', '$2y$10$LRBFOl5Cs4oiIHT89LwhDeNI8D7UwDfsGlNj4xf1Xkg3Ngjf.G/3q', '', 'Arif Ichsan Fadhli', '1015360', '081381827463', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2011-12-04', 1, ''),
(93, 41, 'hakim@gmail.com', '$2y$10$A62jtoiF5/R1ZZprrEtma.016KSCeLMH2NQnymHhQCz/Zc1hzvYwa', '', 'Lukman Aziz Hakim', '1013201', '089800534118', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2009-08-10', 1, ''),
(94, 42, 'khoirunnisa@gmail.com', '$2y$10$WoIXGseVr45noTOEP36pL.fSSvXJDcZVS7o/g1AB3nadu66h713Eq', '', 'Siti Khoirunnisa', '1011506', '081270883013', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2004-11-03', 1, ''),
(95, 43, 'miftah@gmail.com', '$2y$10$O10dPQHZtpkZ5dZUP0zwQu0buZjycJYwCv85L9ZSrnV8K2O2lqN8i', '', 'Andhika Miftah', '1013172', '087927468674', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2013-06-15', 1, ''),
(96, 43, 'erlangga@gmail.com', '$2y$10$YNrsVHAyLrX93AY.hFA0auxii.mYXcSzqJI5xaGOs40GCEJGWZ4o.', '', 'Dilly Erlangga', '1014386', '081273501355', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2015-12-29', 1, ''),
(97, 43, 'watupelit@gmail.com', '$2y$10$def1.3T7pP6dQvH/09fwVeXuim8JeHjfJtdf9E/Buj46As/.hNj5e', '', 'Rambu Watupelit', '1014860', '081645186218', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2006-01-21', 1, ''),
(98, 44, 'aditya@gmail.com', '$2y$10$jBP1TE3XfTuOrK4bDD0JNOh0TSuQg4fnA2CBAwe2gIl8JGo.mQJC2', '', 'Yanuar Aditya', '1013038', '081878744330', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2005-02-26', 1, ''),
(99, 45, 'wahyu@gmail.com', '$2y$10$FmRQULFkbLcsvsDT17wo0uV4Uc6w0x0EDvzSHwxmq3LkBeX0sEz2S', '', 'Ujang Wahyu', '1014160', '081885863600', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2010-08-22', 1, ''),
(100, 46, 'sumarni@gmail.com', '$2y$10$sujjrYz11i8GYgdWPF7RgO73yL6r4aOia.L2KFw.rMip0hJLzWuqK', '', 'Ayi Sumarni', '1011786', '081380523367', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2011-11-20', 1, ''),
(101, 46, 'yuningsih@gmail.com', '$2y$10$0rtvvaWScvWgw96oY5LxrePcCb1Gkd/hlPW5pLfx//KnLg7UZYaZm', '', 'Nining Yuningsih', '1012087', '081434221161', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2014-09-27', 1, ''),
(102, 46, 'otih@gmail.com', '$2y$10$1bG.day0R8h.Pcee6FEdTuhEgynOZbNt2g5z0ZnxZBqtA.d2.kwRW', '', 'Otih', '1012218', '081841500846', 'Garut, 22 April 1999', 'Jl sawarna no 33', '2013-09-08', 1, ''),
(106, 68, 'rifqiramdhani8@gmail.com', '$2y$10$/EvfmH6BsraY4iXIR60Ld.n0e7WWhmPAA/7sP9kcA9okPLSHcxcby', 'vzvEoC+uZqaYIoj9k7lnbQOywkGlJuye0ZgNbAF85Ls=', 'Rifqi Ramdhani', '1055898', '0813930031293', 'Cianjur, 22 Desember 1998', 'jl budhi no 3', '0000-00-00', 1, 'karyawan'),
(107, 68, 'saeful@gmail.com', '$2y$10$ro21zDs/Xe0qCAY9.Qc6Ku2gKBW7VgQx7VfmKpkxDBZ002EHJVyMq', '', 'Saeful Apriana	', '1066998', '0813242432424', 'Cianjur, 22 Desember 1998', 'Bukit Mawar no 10', '0000-00-00', 1, 'karyawan'),
(109, 69, 'gugun@gmail.com', '$2y$10$EyMhsfVb0T9QKA4PksTBZOVv/5cnDqvHdfQdHCv7h8WCTlXFUKRi2', '', 'Gugun Gunawan', '1011889', '081444403329', 'Cianjur, 22 Desember 1999', 'Bukit Mawar no 10', '0000-00-00', 1, 'karyawan');

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
  `id_rekrutmen` int(11) DEFAULT NULL,
  `id_dt_krt_rekt` varchar(128) NOT NULL,
  `bobot_kriteria` int(2) NOT NULL,
  `status_kriteria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_rekrutmen`
--

INSERT INTO `kriteria_rekrutmen` (`id_krt_rekt`, `id_rekrutmen`, `id_dt_krt_rekt`, `bobot_kriteria`, `status_kriteria`) VALUES
(1, NULL, 'K001', 3, 1),
(2, NULL, 'K002', 4, 1),
(3, NULL, 'K003', 2, 1),
(4, NULL, 'K004', 3, 1),
(5, NULL, 'K005', 3, 1),
(6, NULL, 'K006', 4, 1),
(7, NULL, 'K007', 5, 1),
(8, NULL, 'K008', 5, 1),
(9, NULL, 'K009', 4, 1),
(10, NULL, 'K010', 4, 1),
(11, NULL, 'K011', 3, 1),
(214, 31, 'K001', 3, 1),
(215, 31, 'K002', 4, 1),
(216, 31, 'K003', 2, 1),
(217, 31, 'K004', 3, 1),
(218, 31, 'K005', 3, 1),
(219, 31, 'K006', 4, 1),
(220, 31, 'K007', 5, 1),
(221, 31, 'K008', 5, 1),
(222, 31, 'K009', 4, 1),
(223, 31, 'K010', 4, 1),
(224, 31, 'K011', 3, 1),
(313, 40, 'K001', 3, 1),
(314, 40, 'K002', 4, 1),
(315, 40, 'K003', 2, 1),
(316, 40, 'K004', 3, 1),
(317, 40, 'K005', 3, 1),
(318, 40, 'K006', 4, 1),
(319, 40, 'K007', 5, 1),
(320, 40, 'K008', 5, 1),
(321, 40, 'K009', 4, 1),
(322, 40, 'K010', 4, 1),
(323, 40, 'K011', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_kmp`
--

CREATE TABLE `penilaian_kmp` (
  `id_penilaian_kmp` int(11) NOT NULL,
  `id_dt_subkriteria_penilaian` int(11) DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` double NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_kmp`
--

INSERT INTO `penilaian_kmp` (`id_penilaian_kmp`, `id_dt_subkriteria_penilaian`, `id_karyawan`, `nilai`, `status`) VALUES
(7, NULL, 106, 80.02, 2),
(8, NULL, 107, 80.51, 1),
(9, NULL, 109, 65.3, 3);

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
(34, 31, 27, 12.71, 0.334, 1),
(35, 31, 29, 12.58, 0.331, 0),
(36, 31, 28, 12.73, 0.335, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmen`
--

CREATE TABLE `rekrutmen` (
  `id_rekrutmen` int(11) NOT NULL,
  `id_fpkb` int(11) NOT NULL,
  `nama_rekrutmen` varchar(128) NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `status_rekrutmen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekrutmen`
--

INSERT INTO `rekrutmen` (`id_rekrutmen`, `id_fpkb`, `nama_rekrutmen`, `tanggal_buka`, `tanggal_tutup`, `status_rekrutmen`) VALUES
(31, 10, 'Content Writer Sales &amp; Marketing', '2020-07-14', '2020-07-18', 0),
(40, 12, 'Staff Keuangan Keuangan', '2020-07-19', '2020-07-20', 1);

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
(183, 1, 'SMU / SMK /SMA', 1),
(184, 1, 'D1', 2),
(185, 1, 'D3', 3),
(186, 1, 'S1', 4),
(187, 1, 'S2', 5),
(188, 2, '0 tahun', 1),
(189, 2, '1 - 2 tahun', 2),
(190, 2, '3 - 4 tahun', 3),
(191, 2, '5 tahun keatas', 4),
(192, 3, 'Menikah', 3),
(193, 3, 'Belum Menikah', 4),
(194, 4, '21', 5),
(195, 4, '22', 4),
(196, 4, '23', 3),
(197, 4, '24', 2),
(198, 4, '25 - 30', 1),
(199, 11, 'Sehat', 5),
(200, 11, 'Tidak Sehat', 1),
(220, 214, 'SMU / SMK /SMA', 1),
(221, 214, 'D1', 2),
(222, 214, 'D3', 3),
(223, 214, 'S1', 4),
(224, 214, 'S2', 5),
(225, 215, '0 tahun', 1),
(226, 215, '1 - 2 tahun', 2),
(227, 215, '3 - 4 tahun', 3),
(228, 215, '5 tahun keatas', 4),
(229, 216, 'Menikah', 3),
(230, 216, 'Belum Menikah', 4),
(231, 217, '21', 5),
(232, 217, '22', 4),
(233, 217, '23', 3),
(234, 217, '24', 2),
(235, 217, '25 - 30', 1),
(236, 224, 'Sehat', 5),
(237, 224, 'Tidak Sehat', 1),
(382, 313, 'SMU / SMK /SMA', 1),
(383, 313, 'D1', 2),
(384, 313, 'D3', 3),
(385, 313, 'S1', 4),
(386, 313, 'S2', 5),
(387, 314, '0 tahun', 1),
(388, 314, '1 - 2 tahun', 2),
(389, 314, '3 - 4 tahun', 3),
(390, 314, '5 tahun keatas', 4),
(391, 315, 'Menikah', 3),
(392, 315, 'Belum Menikah', 4),
(393, 316, '21', 5),
(394, 316, '22', 4),
(395, 316, '23', 3),
(396, 316, '24', 2),
(397, 316, '25 - 30', 1),
(398, 323, 'Sehat', 5),
(399, 323, 'Tidak Sehat', 1);

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
-- Indexes for table `detail_penilaian_kmp`
--
ALTER TABLE `detail_penilaian_kmp`
  ADD PRIMARY KEY (`id_dt_penilaian_kmp`),
  ADD KEY `id_dt_kriteria_penilaian` (`id_dt_kriteria_penilaian`),
  ADD KEY `id_dt_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`),
  ADD KEY `id_karyawan` (`id_karyawan`);

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
  ADD KEY `fpkb_ibfk_1` (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

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
  ADD KEY `karyawan_ibfk_1` (`id_jabatan`);

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
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_dt_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`);

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
  MODIFY `id_calon_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `desk_rekrutmen`
--
ALTER TABLE `desk_rekrutmen`
  MODIFY `id_desk_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `detail_penilaian_kmp`
--
ALTER TABLE `detail_penilaian_kmp`
  MODIFY `id_dt_penilaian_kmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `detail_penilaian_rekrutmen`
--
ALTER TABLE `detail_penilaian_rekrutmen`
  MODIFY `id_dt_penilaian_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `detail_subkriteria_penilaian`
--
ALTER TABLE `detail_subkriteria_penilaian`
  MODIFY `id_dt_subkriteria_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `file_calon_karyawan`
--
ALTER TABLE `file_calon_karyawan`
  MODIFY `id_file_calon_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `fpkb`
--
ALTER TABLE `fpkb`
  MODIFY `id_fpkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `kriteria_rekrutmen`
--
ALTER TABLE `kriteria_rekrutmen`
  MODIFY `id_krt_rekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `penilaian_kmp`
--
ALTER TABLE `penilaian_kmp`
  MODIFY `id_penilaian_kmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penilaian_rekrutmen`
--
ALTER TABLE `penilaian_rekrutmen`
  MODIFY `id_penilaian_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rekrutmen`
--
ALTER TABLE `rekrutmen`
  MODIFY `id_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `skala_penilaian`
--
ALTER TABLE `skala_penilaian`
  MODIFY `id_skala_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subkriteria_rekrutmen`
--
ALTER TABLE `subkriteria_rekrutmen`
  MODIFY `id_subkriteria_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desk_rekrutmen`
--
ALTER TABLE `desk_rekrutmen`
  ADD CONSTRAINT `desk_rekrutmen_ibfk_1` FOREIGN KEY (`id_rekrutmen`) REFERENCES `rekrutmen` (`id_rekrutmen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penilaian_kmp`
--
ALTER TABLE `detail_penilaian_kmp`
  ADD CONSTRAINT `detail_penilaian_kmp_ibfk_1` FOREIGN KEY (`id_dt_kriteria_penilaian`) REFERENCES `detail_kriteria_penilaian` (`id_dt_kriteria_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penilaian_kmp_ibfk_2` FOREIGN KEY (`id_dt_subkriteria_penilaian`) REFERENCES `detail_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penilaian_kmp_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fpkb_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fpkb_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `penilaian_kmp_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_kmp_ibfk_2` FOREIGN KEY (`id_dt_subkriteria_penilaian`) REFERENCES `detail_subkriteria_penilaian` (`id_dt_subkriteria_penilaian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
