-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2016 at 05:21 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpusweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE IF NOT EXISTS `data_buku` (
`id` int(5) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `rangkuman` text NOT NULL,
  `denda` int(11) NOT NULL,
  `jumlah_buku` int(2) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `jum_temp` int(4) NOT NULL,
  `tgl_input` varchar(75) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id`, `judul`, `pengarang`, `th_terbit`, `penerbit`, `kategori`, `gambar`, `rangkuman`, `denda`, `jumlah_buku`, `lokasi`, `jum_temp`, `tgl_input`, `updated_at`, `created_at`) VALUES
(1, 'ANATOMI & FISIOLOGI UNTUK PARAMEDIS ED. BARU', 'EVELYN C. PEARCE', '2001', 'PT. GRAMEDIA PUSTAKA UTAMA', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-3-638.jpg', '', 3000, 10, 'Rak F1', 10, '2016-03-04', '2016-04-11 02:27:54', '2016-01-20 04:10:48'),
(2, 'Membangun Toko Online Dengan PHP dan MySQL', 'Hakko Bio Richard', '2015', 'NiqoWeb Sukses Media', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-4-638.jpg', '', 1500, 10, 'Rak A1', 11, '2016-03-04', '2016-04-12 20:34:37', '0000-00-00 00:00:00'),
(3, 'Aplikasi Penggajian Karyawan dengan PHP', 'Hakko Bio Richard', '2015', 'NiqoWeb Sukses media', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-5-638.jpg', '', 3000, 10, 'Rak A2', 9, '2016-03-04', '2016-05-15 19:09:28', '0000-00-00 00:00:00'),
(4, 'Membangun Aplikasi Perpustakaan Berbasis Web', 'Hakko Bio Richard', '2015', 'NiqoWeb Sukses media', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-6-638.jpg', '', 3000, 10, 'Rak A2', 10, '2016-03-04', '2016-03-22 03:51:47', '0000-00-00 00:00:00'),
(5, 'Membangun Aplikasi Nilai Dengan PHP & MYSQL', 'Hakko Bio Richard', '2009', 'NiqoWeb Sukses Media', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-7-638.jpg', '', 1500, 10, 'Rak H1', 21, '2016-03-17', '2016-04-03 21:17:39', '0000-00-00 00:00:00'),
(6, 'Algoritma Pascal dan C', 'Didik', '2012', 'Gramedia', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-7-638.jpg', '', 3000, 10, 'Rak E1', 10, '2016-03-02', '2016-04-01 21:19:41', '2016-03-02 09:23:14'),
(7, 'Naruto Shippuuden', 'Masashi kishimotto', '2004', 'Naruto', 'Cerita', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-3-638.jpg', '', 2000, 5, 'Rak L3', 6, '2016-03-03', '2016-04-19 23:54:36', '2016-03-03 06:59:50'),
(8, '100% FOREX : BELAJAR MENGHASILKAN UANG', 'ANGEL DARAZHANOV', '2015', 'ADMIRAL MARKETS', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-10-638.jpg', '', 3000, 10, 'Rak E2', 10, '2016-01-20', '2016-04-17 20:04:16', '2016-01-20 02:22:42'),
(9, '1001 TIPS SEPUTAR DAPUR ( SEHAT, HEMAT & KREATIF )', 'ANDI', '2013', 'APHRODITTA M. SHANTY', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-11-638.jpg', '', 3000, 10, 'Rak E3', 10, '2016-01-20', '2016-03-18 04:14:58', '2016-01-20 02:24:55'),
(10, '20 MENIT SARAPAN PAGI BERBAHAN ROTI', 'PUSTAKA ANGGREK', '2002', 'TIM DAPUR ANGGREK', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-12-638.jpg', '', 3000, 10, 'Rak L7', 10, '2016-01-20', '2016-03-18 04:11:18', '2016-01-20 02:27:35'),
(11, '200 REKOR MENAKJUBKAN BUMI NUSANTARA', 'ARI WIDI WIBOWO', '2003', 'UFUK PRESS', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-13-638.jpg', '', 3000, 10, 'Rak F2', 10, '2016-01-20', '2016-03-18 04:15:05', '2016-01-20 02:31:15'),
(12, '22 DESAIN KAMAR MANDI MUNGIL', 'IMELDA AKMAL ARCHITECTURAL', '2004', 'PT. GRAMEDIA PUSTAKA UTAMA', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-14-638.jpg', '', 3000, 10, 'Rak F5', 10, '2016-01-20', '2016-03-18 04:15:19', '2016-01-20 02:34:53'),
(13, '30 DONGENG TERBAIK SEBELUM TIDUR ASLI NUSANTARA', 'VISIMEDIA', '2005', 'IMAM KHOIRI', 'CERITA', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-15-638.jpg', '', 2000, 10, 'Rak N1', 10, '2016-01-20', '2016-03-18 04:15:32', '2016-01-20 02:35:41'),
(14, '30 HARI MENU SEHAT BALITA', 'PUSTAKA ANGGREK', '2006', 'NINING PRIKASIH & ANTI AP', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-7-638.jpg', '', 3000, 10, 'Rak L8', 10, '2016-01-20', '2016-03-22 06:18:06', '2016-01-20 02:40:04'),
(15, '30 MENIT MEMASAK MAKAN MALAM', 'PUSTAKA ANGGREK', '2007', 'TIM DAPUR ANGGREK', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-7-638.jpg', '', 3000, 10, 'Rak L8', 10, '2016-01-20', '2016-03-22 06:17:58', '2016-01-20 02:40:50'),
(16, '30 MENIT MEMASAK MENU FAVORIT SEHAT BERGIZI – RESE', 'PUSTAKA ANGGREK', '2012', 'TIM DAPUR ANGGREK', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-18-638.jpg', '', 3000, 10, 'Rak K7', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 02:42:08'),
(17, '5 LANGKAH MUDAH BELAJAR PIANO UNTUK ANAK', 'INDONESIA CERDAS', '2009', 'DAHLAN TAHER', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-19-638.jpg', '', 1500, 10, 'Rak D5', 9, '2016-01-20', '2016-05-15 19:09:29', '2016-01-20 02:43:06'),
(18, '6 BULAN BISA BELI PROPERTI KONTAN! TANPA UANG MUKA', 'CIPTO JUNAEDY', '2010', 'PT. GRAMEDIA PUSTAKA UTAMA', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-20-638.jpg', '', 3000, 10, 'Rak K8', 9, '2016-01-20', '2016-05-15 19:09:29', '2016-01-20 04:04:42'),
(19, '6 GAYA HIJAB KERUDUNG PASHMINA INSTAN', 'RENI KUSUMAWARDHANI', '2015', 'PT. GRAMEDIA PUSTAKA UTAMA', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-21-638.jpg', '', 1500, 10, 'Rak C5', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 04:05:39'),
(20, '7 KEAJAIBAN REZEKI', 'ELEX MEDIA KOMPUTINDO', '2014', 'IPPHO D. SANTOSA', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-22-638.jpg', '', 3000, 10, 'Rak E6', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 04:06:31'),
(21, '7 KEBIASAAN MANUSIA YANG SANGAT EFEKTIF', 'BINAPURA AKSARA', '2013', 'STEPHEN COVEY', 'Cerita', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-23-638.jpg', '', 2000, 10, 'Rak M1', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 04:07:16'),
(22, 'AKUNTABILITAS LSM : POLITIK,PRINSIP & INOVASI', 'LISA JORDAN,PETER VAN', '2012', 'LP3ES', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-24-638.jpg', '', 1500, 10, 'Rak C7', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 04:08:05'),
(23, 'AMORE', 'RIA N. BADARIA', '2011', 'PT. GRAMEDIA PUSTAKA UTAMA', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-24-638.jpg', '', 3000, 10, 'Rak K5', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 04:08:39'),
(24, 'ANATOMI & FISIOLOGI TERAPAN DALAM KEBIDANAN ED.3', 'SYLVIA VERRALLS', '2001', 'CV. EGC', 'Sains', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-26-638.jpg', '', 2000, 10, 'Rak H4', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 04:09:29'),
(25, 'ANATOMI & FISIOLOGI TUBUH MANUSIA', 'ANDERSON', '2014', 'CV. EGC', 'Sains', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-27-638.jpg', '', 2000, 10, 'Rak G6', 10, '2016-01-20', '2016-03-18 04:19:51', '2016-01-20 04:10:14'),
(26, 'Kajian Kritis Ilmu Hadist', 'AKHMAD DIDIK SUPRIYANTO', '2001', 'ARJUN AKUWALUL ILMA', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-66-638.jpg', '', 1500, 10, 'Rak D8', 10, '2016-01-25', '2016-04-04 00:52:09', '2016-02-26 06:51:57'),
(27, 'ASUHAN KEBIDANAN PERSALINAN & KELAHIRAN', 'VICKY CHAPMAN', '2013', 'CV. EGC', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-29-638.jpg', '', 3000, 10, 'Rak E7', 10, '2016-01-25', '2016-03-18 04:25:53', '2016-01-20 04:19:13'),
(28, 'BEDAH KEBIDANAN ED.12', 'G MARTIUS', '2012', 'CV. EGC', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-30-638.jpg', '', 3000, 10, 'Rak E8', 10, '2016-01-25', '2016-04-04 00:52:09', '2016-01-20 04:19:50'),
(29, 'BIOLOGI REPRODUKSI KEHAMILAN DAN PERSALINAN', 'GRAHA ILMU', '2015', 'APRILIA NURUL BAETY', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-31-638.jpg', '', 3000, 10, 'Rak E3', 10, '2016-01-25', '2016-04-11 02:03:44', '2016-01-20 04:21:28'),
(30, 'BS : KEBIDANAN', 'CONSTANCE SINCLAIR', '2001', 'CV. EGC', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-32-638.jpg', '', 3000, 10, 'Rak F7', 10, '2016-01-25', '2016-04-11 02:03:44', '2016-01-20 04:22:02'),
(31, 'BUBUR SEHAT UNTUK BATITA HEBAT', 'PUSTAKA ANGGREK', '2002', 'NINING PRIKASIH', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-33-638.jpg', '', 3000, 10, 'Rak L3', 10, '2016-01-25', '2016-04-04 00:52:09', '2016-01-20 04:23:06'),
(32, 'BUKU PINTAR CALON AYAH', 'GARAM MEDIA', '2003', 'ANDI', 'UMUM', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-34-638.jpg', '', 3000, 10, 'Rak L4', 10, '2016-01-25', '2016-03-18 04:25:53', '2016-01-20 04:24:17'),
(33, 'BUKU PINTAR MIND MAP : ANAK MUDAH MENGHAPAL', 'PT. GPU', '2005', 'TONY BUZAN', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-58-638.jpg', '', 3000, 10, 'Rak L8', 10, '2016-01-25', '2016-03-18 04:25:53', '2016-01-20 04:25:11'),
(34, 'BUKU SAKU PERCAKAPAN BAHASA INGGRIS SEHARI HARI', 'BUKU PINTAR', '2004', 'ISLAH', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-67-638.jpg', '', 1500, 10, 'Rak D8', 12, '2016-01-25', '2016-04-03 19:33:24', '2016-01-20 04:27:14'),
(35, 'BULAN DI LANGIT CAROLINA', 'NORA ROBERTS', '2004', 'PT. GRAMEDIA PUSTAKA UTAMA', 'Cerita', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-60-638.jpg', '', 2000, 10, 'Rak N2', 10, '2016-01-25', '2016-04-10 18:46:59', '2016-01-20 04:29:33'),
(36, 'CAMILAN KHAS INDONESIA', 'YASA BOGA', '2006', 'PT. GRAMEDIA PUSTAKA UTAMA', 'Umum', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-61-638.jpg', '', 3000, 10, 'Rak L6', 10, '2016-01-25', '2016-03-18 04:28:47', '2016-01-20 04:30:21'),
(37, 'CARA CEPAT MEMBACA WAJAH : MENJADI SESEORANG YANG ', 'UFUK PRESS', '2009', 'NAOMI R. TICKLE	', 'UMUM', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-62-638.jpg', '', 3000, 10, 'Rak L7', 12, '2016-01-25', '2016-04-03 19:33:25', '2016-01-20 04:31:36'),
(38, 'CARA JITU MENGATASI KENCING MANIS', 'DR. YEKTI SUSILO', '2008', 'ANDI', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-63-638.jpg', '', 3000, 10, 'Rak F1', 10, '2016-01-25', '2016-05-11 19:44:19', '2016-01-20 04:32:25'),
(39, 'CATATAN ILMU KEDOKTERAN JIWA', 'W.F. MARAMIS', '2004', 'AIRLANGGA UNIVERSITY PRESS', 'Pengetahuan', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-64-638.jpg', '', 3000, 10, 'Rak F8', 12, '2016-01-20', '2016-04-03 19:33:25', '2016-01-20 04:33:42'),
(40, 'Algoritma', 'cogan_EB', '2007', 'p. sueb', 'Sekolah', 'img/buku/daftar-koleksi-buku-baru-perpustakaan-tahun-20112-65-638.jpg', '', 1500, 10, 'Rak D7', 10, '2016-01-25', '2016-04-10 18:46:59', '2016-01-25 04:08:05'),
(41, 'Naruto', 'masashi', '2015', 'Naruto Shippuuden', 'Cerita', 'img/buku/Naruto.jpg', '', 2000, 10, 'Rak M2', 11, '2016-03-14', '2016-05-11 08:48:52', '2016-03-14 03:10:29'),
(42, 'kafer boy', 'didik', '2014', 'iwan', 'Cerita', 'img/buku/kafer boy.png', '', 0, 3, 'Rak M8', 3, '2016-04-02', '2016-04-01 20:59:07', '2016-04-02 03:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `dtl_trans`
--

CREATE TABLE IF NOT EXISTS `dtl_trans` (
`id` int(11) NOT NULL,
  `id_mst` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_trans`
--

INSERT INTO `dtl_trans` (`id`, `id_mst`, `id_buku`, `nama_buku`, `total`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 'Membangun Toko Online Dengan PHP dan MySQL', 5000, '2016-03-18 06:00:55', '2016-03-05 03:00:00'),
(2, 1, 7, 'Naruto Shippuuden', 6000, '2016-03-18 06:01:03', '2016-03-05 03:00:00'),
(3, 2, 3, 'Aplikasi Penggajian Karyawan dengan PHP', 65000, '2016-03-29 21:42:14', '2016-03-07 12:40:00'),
(4, 2, 5, 'Membangun Aplikasi Nilai Dengan PHP', 34000, '2016-03-29 21:42:14', '2016-03-07 08:35:00'),
(5, 3, 1, 'ANATOMI & FISIOLOGI UNTUK PARAMEDIS ED. BARU', 18000, '2016-03-29 19:44:51', '2016-03-23 08:45:38'),
(6, 3, 2, 'Membangun Toko Online Dengan PHP dan MySQL', 11000, '2016-03-29 19:44:51', '2016-03-23 08:45:38'),
(7, 4, 1, 'ANATOMI & FISIOLOGI UNTUK PARAMEDIS ED. BARU', 12000, '2016-04-03 21:14:45', '2016-03-30 04:45:34'),
(8, 4, 3, 'Aplikasi Penggajian Karyawan dengan PHP', 11000, '2016-04-03 21:14:45', '2016-03-30 04:45:34'),
(9, 4, 5, 'Membangun Aplikasi Nilai Dengan PHP & MYSQL', 7000, '2016-04-03 21:14:45', '2016-03-30 04:45:34'),
(10, 4, 7, 'Naruto Shippuuden', 10000, '2016-04-03 21:14:45', '2016-03-30 04:45:34'),
(11, 5, 34, 'BUKU SAKU PERCAKAPAN BAHASA INGGRIS SEHARI HARI', 5000, '2016-04-01 22:43:06', '2016-03-30 06:22:35'),
(12, 5, 35, 'BULAN DI LANGIT CAROLINA', 6000, '2016-04-01 22:43:06', '2016-03-30 06:22:35'),
(13, 5, 37, 'CARA CEPAT MEMBACA WAJAH : MENJADI SESEORANG YANG ', 5000, '2016-04-01 22:43:06', '2016-03-30 06:22:35'),
(14, 5, 39, 'CATATAN ILMU KEDOKTERAN JIWA', 5000, '2016-04-01 22:43:06', '2016-03-30 06:22:35'),
(15, 6, 6, 'Algoritma Pascal dan C', 6000, '2016-04-01 21:19:41', '2016-04-02 04:06:32'),
(16, 6, 7, 'Naruto Shippuuden', 6000, '2016-04-01 21:19:41', '2016-04-02 04:06:32'),
(19, 8, 1, 'ANATOMI & FISIOLOGI UNTUK PARAMEDIS ED. BARU', 6000, '2016-04-04 00:42:25', '2016-04-04 05:56:25'),
(20, 8, 2, 'Membangun Toko Online Dengan PHP dan MySQL', 5000, '2016-04-04 00:42:25', '2016-04-04 05:56:25'),
(21, 9, 1, 'ANATOMI & FISIOLOGI UNTUK PARAMEDIS ED. BARU', 6000, '2016-04-04 00:43:08', '2016-04-04 05:58:07'),
(22, 9, 3, 'Aplikasi Penggajian Karyawan dengan PHP', 5000, '2016-04-04 00:43:08', '2016-04-04 05:58:07'),
(23, 9, 8, '100% FOREX : BELAJAR MENGHASILKAN UANG', 6000, '2016-04-04 00:43:09', '2016-04-04 05:58:07'),
(27, 11, 7, 'Naruto Shippuuden', 6000, '2016-04-04 21:49:19', '2016-04-05 04:49:01'),
(31, 13, 29, 'BIOLOGI REPRODUKSI KEHAMILAN DAN PERSALINAN', 0, '2016-04-11 01:46:47', '2016-04-11 08:46:47'),
(32, 13, 30, 'BS : KEBIDANAN', 0, '2016-04-11 01:46:47', '2016-04-11 08:46:47'),
(33, 14, 1, 'ANATOMI & FISIOLOGI UNTUK PARAMEDIS ED. BARU', 0, '2016-04-11 01:47:08', '2016-04-11 08:47:08'),
(34, 14, 2, 'Membangun Toko Online Dengan PHP dan MySQL', 0, '2016-04-11 01:47:08', '2016-04-11 08:47:08'),
(35, 14, 3, 'Aplikasi Penggajian Karyawan dengan PHP', 0, '2016-04-11 01:47:08', '2016-04-11 08:47:08'),
(36, 14, 7, 'Naruto Shippuuden', 0, '2016-04-11 01:47:08', '2016-04-11 08:47:08'),
(37, 15, 2, 'Membangun Toko Online Dengan PHP dan MySQL', 0, '2016-04-11 01:59:43', '2016-04-11 08:59:43'),
(38, 15, 3, 'Aplikasi Penggajian Karyawan dengan PHP', 0, '2016-04-11 01:59:43', '2016-04-11 08:59:43'),
(39, 16, 7, 'Naruto Shippuuden', 0, '2016-04-14 20:52:42', '2016-04-15 03:52:42'),
(40, 16, 8, '100% FOREX : BELAJAR MENGHASILKAN UANG', 0, '2016-04-14 20:52:42', '2016-04-15 03:52:42'),
(41, 17, 7, 'Naruto Shippuuden', 0, '2016-04-16 00:33:15', '2016-04-16 07:33:15'),
(42, 18, 41, 'Naruto', 4000, '2016-05-03 19:38:51', '2016-04-25 03:37:42'),
(43, 19, 38, 'CARA JITU MENGATASI KENCING MANIS', 0, '2016-05-11 19:35:48', '2016-05-12 02:35:48'),
(44, 20, 3, 'Aplikasi Penggajian Karyawan dengan PHP', 0, '2016-05-15 19:09:29', '2016-05-16 02:09:29'),
(45, 20, 17, '5 LANGKAH MUDAH BELAJAR PIANO UNTUK ANAK', 0, '2016-05-15 19:09:29', '2016-05-16 02:09:29'),
(46, 20, 18, '6 BULAN BISA BELI PROPERTI KONTAN! TANPA UANG MUKA', 0, '2016-05-15 19:09:29', '2016-05-16 02:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X RPL-1'),
(2, 'X RPL-2'),
(3, 'XI RPL-1'),
(4, 'XI RPL-2'),
(5, 'XII RPL-1'),
(6, 'XII RPL-2'),
(7, 'X TKJ-1'),
(8, 'X TKJ-2'),
(9, 'X TKJ-3'),
(10, 'XI TKJ-1'),
(11, 'XI TKJ-2'),
(12, 'XI TKJ-3'),
(13, 'XII TKJ-1'),
(14, 'XII TKJ-2'),
(15, 'XII TKJ-3'),
(16, 'X MM-1'),
(17, 'X MM-2'),
(18, 'X MM-3'),
(19, 'XI MM-1'),
(20, 'XI MM-2'),
(21, 'XI MM-3'),
(22, 'XII MM-1'),
(23, 'XII MM-2'),
(24, 'XII MM-3'),
(25, 'X JB-1'),
(26, 'X JB-2'),
(27, 'X JB-3'),
(28, 'XI JB-1'),
(29, 'XI JB-2'),
(30, 'XII JB-1'),
(31, 'XII JB-2'),
(32, 'X ANM-1'),
(33, 'X ANM-2'),
(34, 'XI ANM-1'),
(35, 'XII ANM-1'),
(36, 'X APH-1'),
(37, 'X APH-2'),
(38, 'XI APH-1'),
(39, 'XII APH-1'),
(40, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE IF NOT EXISTS `pengunjung` (
`id` int(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `jam_kunjung` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `jk`, `tgl_kunjung`, `jam_kunjung`, `created_at`, `updated_at`) VALUES
(1, 'iwan', 'L', '2016-04-06', '08:04:28', '2016-04-06 08:04:45', '2016-04-06 01:04:45'),
(2, 'arjun', 'L', '2016-04-07', '07:04:06', '2016-04-07 07:55:18', '2016-04-07 00:55:18'),
(3, 'iwan', 'L', '2016-04-08', '06:38:13', '2016-04-08 06:38:13', '2016-04-07 23:38:13'),
(4, 'didik', 'L', '2016-04-08', '08:59:40', '2016-04-08 08:59:40', '2016-04-08 01:59:40'),
(5, 'arjun', 'L', '2016-04-08', '16:22:34', '2016-04-08 09:23:07', '2016-04-08 02:23:07'),
(6, 'Icha', 'P', '2016-04-11', '15:40:34', '2016-04-11 08:41:21', '2016-04-11 01:41:21'),
(7, 'icha', 'P', '2016-04-11', '16:01:32', '2016-04-11 09:01:44', '2016-04-11 02:01:44'),
(8, 'iwan', 'L', '2016-04-13', '14:52:51', '2016-04-13 07:53:01', '2016-04-13 00:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `trans_pinjam`
--

CREATE TABLE IF NOT EXISTS `trans_pinjam` (
`id` int(5) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `tgl_pinjam` varchar(15) NOT NULL,
  `batas` varchar(15) NOT NULL,
  `tgl_kembali` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_pinjam`
--

INSERT INTO `trans_pinjam` (`id`, `nama_peminjam`, `tgl_pinjam`, `batas`, `tgl_kembali`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Teguh', '2016-03-05', '2016-03-08', '2016-03-08', 'sudah kembali', '2016-03-05 08:15:39', '2016-03-28 03:34:28'),
(2, 'Arifin', '2016-03-07', '2016-03-10', '2016-03-30', 'sudah kembali', '2016-03-07 14:00:00', '2016-03-29 21:42:14'),
(3, 'Didik', '2016-03-23', '2016-03-26', '2016-03-30', 'sudah kembali', '2016-03-23 08:45:38', '2016-03-29 19:44:52'),
(4, 'arifin', '2016-03-30', '2016-04-02', '2016-04-04', 'sudah kembali', '2016-03-30 04:45:34', '2016-04-03 21:15:35'),
(5, 'timothy', '2016-03-30', '2016-04-02', '2016-04-04', 'sudah kembali', '2016-03-30 06:22:35', '2016-04-03 19:33:16'),
(6, 'ima', '2016-04-02', '2016-04-05', '2016-04-02', 'sudah kembali', '2016-04-02 04:06:32', '2016-04-01 21:19:41'),
(8, 'Didik', '2016-04-04', '2016-04-07', '2016-04-05', 'sudah kembali', '2016-04-04 05:56:24', '2016-04-04 21:52:41'),
(9, 'arjun', '2016-04-04', '2016-04-07', '2016-04-08', 'sudah kembali', '2016-04-04 05:58:07', '2016-04-08 01:42:23'),
(11, 'Didik', '2016-04-05', '2016-04-08', '2016-04-05', 'sudah kembali', '2016-04-05 04:49:01', '2016-04-05 00:50:25'),
(13, 'icha', '2016-04-11', '2016-04-16', '2016-04-11', 'sudah kembali', '2016-04-11 08:46:47', '2016-04-11 02:03:44'),
(14, 'icha', '2016-04-11', '2016-04-16', '2016-04-11', 'sudah kembali', '2016-04-11 08:47:08', '2016-04-11 02:27:55'),
(15, 'iwan', '2016-04-11', '2016-04-16', '2016-04-13', 'sudah kembali', '2016-04-11 08:59:42', '2016-04-12 20:34:38'),
(16, 'iwan', '2016-04-15', '2016-04-20', '2016-04-18', 'sudah kembali', '2016-04-15 03:52:42', '2016-04-17 20:04:16'),
(17, 'iwan', '2016-04-16', '2016-04-23', '2016-04-20', 'sudah kembali', '2016-04-16 07:33:15', '2016-04-19 23:54:37'),
(18, 'iwan', '2016-04-25', '2016-05-02', '2016-05-11', 'sudah kembali', '2016-04-25 03:37:42', '2016-05-11 08:48:52'),
(19, 'timothy', '2016-05-12', '2016-05-19', '2016-05-12', 'sudah kembali', '2016-05-12 02:35:48', '2016-05-11 19:44:19'),
(20, 'iwan', '2016-05-16', '2016-05-23', '0000-00-00', 'belum kembali', '2016-05-16 02:09:29', '2016-05-15 19:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL,
  `no_induk` varchar(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `category` varchar(2) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pass_remember` varchar(50) NOT NULL,
  `remember_token` varchar(250) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_induk`, `username`, `password`, `jk`, `ttl`, `id_kelas`, `kelas`, `jurusan`, `category`, `alamat`, `gambar`, `type`, `status`, `pass_remember`, `remember_token`, `updated_at`, `created_at`) VALUES
(0, '7177', 'ma''ruf', '$2y$10$sItHrLuMdrTQ8i4qJET.A.xLg11WbsQd.Y5rG9xBwD83AtgUGJuw.', 'L', 'sby, 18 september 1999', 0, 'XI', 'RPL', '2', 'Kandang ayam', 'img/user/ma''ruf.jpg', 'user', 'non-active', 'ma''ruf123', '', '2016-05-13 23:33:57', '2016-05-12 01:57:51'),
(5, '3688', 'Didik', 'arifin123', 'L', 'mjk, 24 september 1997', 4, 'XI', 'RPL', '2', 'Republic Of Jaringan Sari', 'img/user/Didik.jpg', 'user', 'active', 'arifin123', 'wBznVSkynZZYEL8tqOgFRX93MMKtlvUWdw7IJgkUAAIM7aODCrc7LVnmqbqD', '2016-05-04 01:12:32', '2016-03-11 08:38:56'),
(7, '', 'petugas', '$2y$10$o3nF60CENeJoNGS.dBqouOFcevS2pKKiYHcHMq2NzuOyG/MFYJzee', 'L', '', 40, '', '', '', '', 'img/User.jpg', 'admin', '', '', 'MDGcIyIaWbqgCryOMXa5SJksMD3FHY6F9ZqJ3yeDFxMUoNNKYcb0dWzobGOU', '2016-05-12 03:15:19', '0000-00-00 00:00:00'),
(8, '3544', 'iwan', 'arifin123', 'L', 'mjk, 10 mei 1998', 3, 'XI', 'RPL', '1', 'Republic Of Jaringan Sari', 'img/user/iwan.jpg', 'user', 'active', 'arifin123', 'BgkWBQj1QfvLmfEQ4Uj1DV8DixrDaTl9xDzstSoYUoRXMLYMBVQYRcmwGy7Y', '2016-05-04 01:14:46', '2016-03-24 02:57:44'),
(10, '2107', 'arjun', 'arifin123', 'L', 'mjk, 7 februari 1998', 4, 'XI', 'RPL', '2', 'kec. sooko', 'img/user/arjun.jpg', 'user', 'active', 'arifin123', 'kJrlCtC9TeZBvYMNIN1kNTu0hHdMWqB0ysTCllOEoOvWzf0XJpIjHcIus7XY', '2016-05-04 01:15:44', '2016-03-30 10:40:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtl_trans`
--
ALTER TABLE `dtl_trans`
 ADD PRIMARY KEY (`id`), ADD KEY `id_mst` (`id_mst`), ADD KEY `id_anggota` (`id_buku`), ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `dtl_trans`
--
ALTER TABLE `dtl_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dtl_trans`
--
ALTER TABLE `dtl_trans`
ADD CONSTRAINT `dtl_trans_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `data_buku` (`id`),
ADD CONSTRAINT `dtl_trans_ibfk_2` FOREIGN KEY (`id_mst`) REFERENCES `trans_pinjam` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
