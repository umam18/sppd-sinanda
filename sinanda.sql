-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 08:02 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `pejabat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_pejabat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bendahara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_bendahara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maksud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `lama` int(11) NOT NULL,
  `keluaran` int(11) NOT NULL,
  `komponen` int(11) NOT NULL,
  `sub` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akun` int(11) NOT NULL,
  `h_ku` int(11) DEFAULT NULL,
  `h_hn` int(11) NOT NULL,
  `h_fb` int(11) NOT NULL,
  `h_fd` int(11) NOT NULL,
  `h_diklat` int(11) NOT NULL,
  `h_penginapan` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `pejabat`, `nip_pejabat`, `bendahara`, `nip_bendahara`, `maksud`, `berangkat`, `tujuan`, `transportasi`, `tanggal_berangkat`, `tanggal_kembali`, `lama`, `keluaran`, `komponen`, `sub`, `akun`, `h_ku`, `h_hn`, `h_fb`, `h_fd`, `h_diklat`, `h_penginapan`, `status`, `created_at`, `updated_at`) VALUES
(29, 'NURUL HUDA SE, M.SI', '196804101991032003', 'ANKA RAHARJA', '198402122009121002', 'Seminar', 'Kota Administrasi Jakarta Pusat', 'Kabupaten Asahan', 'Angkutan Darat', '2018-05-15', '2018-05-16', 2, 960, 51, 'A', 524114, 232000, 370000, 130000, 95000, 110000, 530000, 0, '2018-05-17 09:06:55', '2018-05-17 09:06:55'),
(30, 'NURUL HUDA SE, M.SI', '196804101991032003', 'ANKA RAHARJA', '198402122009121002', 'Workshop', 'Kota Administrasi Jakarta Pusat', 'Kabupaten Agam', 'Angkutan Darat', '2018-06-30', '2018-07-01', 2, 961, 53, 'A', 524114, 190000, 380000, 120000, 85000, 110000, 650000, 0, '2018-06-28 21:29:55', '2018-06-28 21:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'ANALIS KEPEGAWAIAN AHLI PERTAMA'),
(2, 'ANALIS KEPEGAWAIAN TERAMPIL PENYELIA\r\n'),
(3, 'ARSIPARIS PELAKSANA LANJUTAN\r\n'),
(4, 'ARSIPARIS PENYELIA \r\n'),
(5, 'JFU ANALIS KASUS KEPEGAWAIAN\r\n'),
(6, 'JFU ANALIS KEBUTUHAN PEGAWAI\r\n'),
(7, 'JFU ANALIS PENGEMBANGAN PEGAWAI\r\n'),
(8, 'JFU PENATA LAPORAN KEUANGAN\r\n'),
(9, 'JFU PENGADMINISTRASI JABATAN FUNGSIONAL \r\n'),
(10, 'JFU PENGADMINISTRASI MUTASI KEPEGAWAIAN\r\n'),
(11, 'JFU PENGADMINISTRASI PEMBERHENTIAN DAN PEMENSIUNAN PEGAWAI \r\n'),
(12, 'JFU PENGADMINISTRASI UMUM\r\n'),
(13, 'JFU PENGELOLA DATA INVENTARISASI BMN\r\n'),
(14, 'JFU PENYIAP BAHAN PENGELOLAAN JABATAN  FUNGSIONAL BINAAN  KOMINFO\r\n'),
(15, 'JFU PENYIAP BAHAN PENGELOLAAN JABATAN  FUNGSIONAL NON BINAAN  KOMINFO\r\n'),
(16, 'KEPALA BAGIAN BINA KINERJA PEGAWAI\r\n'),
(17, 'KEPALA BAGIAN MUTASI DAN KESEJAHTERAAN PEGAWAI\r\n'),
(18, 'KEPALA BAGIAN ORGANISASI DAN TATA LAKSANA\r\n'),
(19, 'KEPALA BIRO KEPEGAWAIAN DAN ORGANISASI\r\n'),
(20, 'KEPALA SUBBAGIAN DATA DAN INFORMASI KEPEGAWAIAN\r\n'),
(21, 'KEPALA SUBBAGIAN DISIPLIN PEGAWAI\r\n'),
(22, 'KEPALA SUBBAGIAN KETATALAKSANAAN\r\n'),
(23, 'KEPALA SUBBAGIAN KINERJA PEGAWAI\r\n'),
(24, 'KEPALA SUBBAGIAN ORGANISASI\r\n'),
(25, 'KEPALA SUBBAGIAN PENGEMBANGAN PEGAWAI\r\n'),
(26, 'KEPALA SUBBAGIAN PERENCANAAN PEGAWAI\r\n'),
(27, 'KEPALA SUBBAGIAN TATA USAHA BIRO\r\n'),
(28, 'PRANATA KOMPUTER PERTAMA\r\n'),
(29, 'ANALIS HUKUM\r\n'),
(30, 'ANALIS TATA USAHA\r\n'),
(31, 'ANALIS DATA DAN INFORMASI PEGAWAI\r\n'),
(32, 'ANALIS KELEMBAGAAN\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(10) NOT NULL,
  `kabupaten_kota` varchar(45) NOT NULL,
  `id_provinsi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `kabupaten_kota`, `id_provinsi`) VALUES
(1, 'Kabupaten Aceh Barat', 1),
(2, 'Kabupaten Aceh Barat Daya', 1),
(3, 'Kabupaten Aceh Besar', 1),
(4, 'Kabupaten Aceh Jaya', 1),
(5, 'Kabupaten Aceh Selatan', 1),
(6, 'Kabupaten Aceh Singkil', 1),
(7, 'Kabupaten Aceh Tamiang', 1),
(8, 'Kabupaten Aceh Tengah', 1),
(9, 'Kabupaten Aceh Tenggara', 1),
(10, 'Kabupaten Aceh Timur', 1),
(11, 'Kabupaten Aceh Utara', 1),
(12, 'Kabupaten Bener Meriah', 1),
(13, 'Kabupaten Bireuen', 1),
(14, 'Kabupaten Gayo Lues', 1),
(15, 'Kabupaten Nagan Raya', 1),
(16, 'Kabupaten Pidie', 1),
(17, 'Kabupaten Pidie Jaya', 1),
(18, 'Kabupaten Simeulue', 1),
(19, 'Kota Banda Aceh', 1),
(20, 'Kota Langsa', 1),
(21, 'Kota Lhokseumawe', 1),
(22, 'Kota Sabang', 1),
(23, 'Kota Subulussalam', 1),
(24, 'Kabupaten Asahan', 2),
(25, 'Kabupaten Batubara', 2),
(26, 'Kabupaten Dairi', 2),
(27, 'Kabupaten Deli Serdang', 2),
(28, 'Kabupaten Humbang Hasundutan', 2),
(29, 'Kabupaten Karo', 2),
(30, 'Kabupaten Labuhanbatu', 2),
(31, 'Kabupaten Labuhanbatu Selatan', 2),
(32, 'Kabupaten Labuhanbatu Utara', 2),
(33, 'Kabupaten Langkat', 2),
(34, 'Kabupaten Mandailing Natal', 2),
(35, 'Kabupaten Nias', 2),
(36, 'Kabupaten Nias Barat', 2),
(37, 'Kabupaten Nias Selatan', 2),
(38, 'Kabupaten Nias Utara', 2),
(39, 'Kabupaten Padang Lawas', 2),
(40, 'Kabupaten Padang Lawas Utara', 2),
(41, 'Kabupaten Pakpak Bharat', 2),
(42, 'Kabupaten Samosir', 2),
(43, 'Kabupaten Serdang Bedagai', 2),
(44, 'Kabupaten Simalungun', 2),
(45, 'Kabupaten Tapanuli Selatan', 2),
(46, 'Kabupaten Tapanuli Tengah', 2),
(47, 'Kabupaten Tapanuli Utara', 2),
(48, 'Kabupaten Toba Samosir', 2),
(49, 'Kota Binjai', 2),
(50, 'Kota Gunungsitoli', 2),
(51, 'Kota Medan', 2),
(52, 'Kota Padangsidempuan', 2),
(53, 'Kota Pematangsiantar', 2),
(54, 'Kota Sibolga', 2),
(55, 'Kota Tanjungbalai', 2),
(56, 'Kota Tebing Tinggi', 2),
(57, 'Kabupaten Agam', 3),
(58, 'Kabupaten Dharmasraya', 3),
(59, 'Kabupaten Kepulauan Mentawai', 3),
(60, 'Kabupaten Lima Puluh Kota', 3),
(61, 'Kabupaten Padang Pariaman', 3),
(62, 'Kabupaten Pasaman', 3),
(63, 'Kabupaten Pasaman Barat', 3),
(64, 'Kabupaten Pesisir Selatan', 3),
(65, 'Kabupaten Sijunjung', 3),
(66, 'Kabupaten Solok', 3),
(67, 'Kabupaten Solok Selatan', 3),
(68, 'Kabupaten Tanah Datar', 3),
(69, 'Kota Bukittinggi', 3),
(70, 'Kota Padang', 3),
(71, 'Kota Padangpanjang', 3),
(72, 'Kota Pariaman', 3),
(73, 'Kota Payakumbuh', 3),
(74, 'Kota Sawahlunto', 3),
(75, 'Kota Solok', 3),
(76, 'Kabupaten Bengkalis', 4),
(77, 'Kabupaten Indragiri Hilir', 4),
(78, 'Kabupaten Indragiri Hulu', 4),
(79, 'Kabupaten Kampar', 4),
(80, 'Kabupaten Kepulauan Meranti', 4),
(81, 'Kabupaten Kuantan Singingi', 4),
(82, 'Kabupaten Pelalawan', 4),
(83, 'Kabupaten Rokan Hilir', 4),
(84, 'Kabupaten Rokan Hulu', 4),
(85, 'Kabupaten Siak', 4),
(86, 'Kota Dumai', 4),
(87, 'Kota Pekanbaru', 4),
(88, 'Kabupaten Bintan Kepulauan', 5),
(89, 'Kabupaten Karimun', 5),
(90, 'Kabupaten Kepulauan Anambas', 5),
(91, 'Kabupaten Lingga', 5),
(92, 'Kabupaten Natuna', 5),
(93, 'Kota Batam', 5),
(94, 'Kota Tanjung Pinang', 5),
(95, 'Kabupaten Batanghari', 6),
(96, 'Kabupaten Bungo', 6),
(97, 'Kabupaten Kerinci', 6),
(98, 'Kabupaten Merangin', 6),
(99, 'Kabupaten Muaro Jambi', 6),
(100, 'Kabupaten Sarolangun', 6),
(101, 'Kabupaten Tanjung Jabung Barat', 6),
(102, 'Kabupaten Tanjung Jabung Timur', 6),
(103, 'Kabupaten Tebo', 6),
(104, 'Kota Jambi', 6),
(105, 'Kota Sungaipenuh', 6),
(106, 'Kabupaten Bengkulu Selatan', 7),
(107, 'Kabupaten Bengkulu Tengah', 7),
(108, 'Kabupaten Bengkulu Utara', 7),
(109, 'Kabupaten Kaur', 7),
(110, 'Kabupaten Kepahiang', 7),
(111, 'Kabupaten Lebong', 7),
(112, 'Kabupaten Mukomuko', 7),
(113, 'Kabupaten Rejang Lebong', 7),
(114, 'Kabupaten Seluma', 7),
(115, 'Kota Bengkulu', 7),
(116, 'Kabupaten Banyuasin', 8),
(117, 'Kabupaten Empat Lawang', 8),
(118, 'Kabupaten Lahat', 8),
(119, 'Kabupaten Muara Enim', 8),
(120, 'Kabupaten Musi Banyuasin', 8),
(121, 'Kabupaten Musi Rawas', 8),
(122, 'Kabupaten Musi Rawas Utara', 8),
(123, 'Kabupaten Ogan Ilir', 8),
(124, 'Kabupaten Ogan Komering Ilir', 8),
(125, 'Kabupaten Ogan Komering Ulu', 8),
(126, 'Kabupaten Ogan Komering Ulu Selatan', 8),
(127, 'Kabupaten Ogan Komering Ulu Timur', 8),
(128, 'Kabupaten Penukal Abab Lematang Ilir', 8),
(129, 'Kota Lubuklinggau', 8),
(130, 'Kota Pagar Alam', 8),
(131, 'Kota Palembang', 8),
(132, 'Kota Prabumulih', 8),
(133, 'Kabupaten Bangka', 9),
(134, 'Kabupaten Bangka Barat', 9),
(135, 'Kabupaten Bangka Selatan', 9),
(136, 'Kabupaten Bangka Tengah', 9),
(137, 'Kabupaten Belitung', 9),
(138, 'Kabupaten Belitung Timur', 9),
(139, 'Kota Pangkal Pinang', 9),
(140, 'Kabupaten Lampung Barat', 10),
(141, 'Kabupaten Lampung Selatan', 10),
(142, 'Kabupaten Lampung Tengah', 10),
(143, 'Kabupaten Lampung Timur', 10),
(144, 'Kabupaten Lampung Utara', 10),
(145, 'Kabupaten Mesuji', 10),
(146, 'Kabupaten Pesawaran', 10),
(147, 'Kabupaten Pesisir Barat', 10),
(148, 'Kabupaten Pringsewu', 10),
(149, 'Kabupaten Tanggamus', 10),
(150, 'Kabupaten Tulang Bawang', 10),
(151, 'Kabupaten Tulang Bawang Barat', 10),
(152, 'Kabupaten Way Kanan', 10),
(153, 'Kota Bandar Lampung', 10),
(154, 'Kota Metro', 10),
(155, 'Kabupaten Lebak', 11),
(156, 'Kabupaten Pandeglang', 11),
(157, 'Kabupaten Serang', 11),
(158, 'Kabupaten Tangerang', 11),
(159, 'Kota Cilegon', 11),
(160, 'Kota Serang', 11),
(161, 'Kota Tangerang', 11),
(162, 'Kota Tangerang Selatan', 11),
(163, 'Kabupaten Bandung', 12),
(164, 'Kabupaten Bandung Barat', 12),
(165, 'Kabupaten Bekasi', 12),
(166, 'Kabupaten Bogor', 12),
(167, 'Kabupaten Ciamis', 12),
(168, 'Kabupaten Cianjur', 12),
(169, 'Kabupaten Cirebon', 12),
(170, 'Kabupaten Garut', 12),
(171, 'Kabupaten Indramayu', 12),
(172, 'Kabupaten Karawang', 12),
(173, 'Kabupaten Kuningan', 12),
(174, 'Kabupaten Majalengka', 12),
(175, 'Kabupaten Pangandaran', 12),
(176, 'Kabupaten Purwakarta', 12),
(177, 'Kabupaten Subang', 12),
(178, 'Kabupaten Sukabumi', 12),
(179, 'Kabupaten Sumedang', 12),
(180, 'Kabupaten Tasikmalaya', 12),
(181, 'Kota Bandung', 12),
(182, 'Kota Banjar', 12),
(183, 'Kota Bekasi', 12),
(184, 'Kota Bogor', 12),
(185, 'Kota Cimahi', 12),
(186, 'Kota Cirebon', 12),
(187, 'Kota Depok', 12),
(188, 'Kota Sukabumi', 12),
(189, 'Kota Tasikmalaya', 12),
(190, 'Kabupaten Administrasi Kepulauan Seribu', 13),
(191, 'Kota Administrasi Jakarta Barat', 13),
(192, 'Kota Administrasi Jakarta Pusat', 13),
(193, 'Kota Administrasi Jakarta Selatan', 13),
(194, 'Kota Administrasi Jakarta Timur', 13),
(195, 'Kota Administrasi Jakarta Utara', 13),
(196, 'Kabupaten Banjarnegara', 14),
(197, 'Kabupaten Banyumas', 14),
(198, 'Kabupaten Batang', 14),
(199, 'Kabupaten Blora', 14),
(200, 'Kabupaten Boyolali', 14),
(201, 'Kabupaten Brebes', 14),
(202, 'Kabupaten Cilacap', 14),
(203, 'Kabupaten Demak', 14),
(204, 'Kabupaten Grobogan', 14),
(205, 'Kabupaten Jepara', 14),
(206, 'Kabupaten Karanganyar', 14),
(207, 'Kabupaten Kebumen', 14),
(208, 'Kabupaten Kendal', 14),
(209, 'Kabupaten Klaten', 14),
(210, 'Kabupaten Kudus', 14),
(211, 'Kabupaten Magelang', 14),
(212, 'Kabupaten Pati', 14),
(213, 'Kabupaten Pekalongan', 14),
(214, 'Kabupaten Pemalang', 14),
(215, 'Kabupaten Purbalingga', 14),
(216, 'Kabupaten Purworejo', 14),
(217, 'Kabupaten Rembang', 14),
(218, 'Kabupaten Semarang', 14),
(219, 'Kabupaten Sragen', 14),
(220, 'Kabupaten Sukoharjo', 14),
(221, 'Kabupaten Tegal', 14),
(222, 'Kabupaten Temanggung', 14),
(223, 'Kabupaten Wonogiri', 14),
(224, 'Kabupaten Wonosobo', 14),
(225, 'Kota Magelang', 14),
(226, 'Kota Pekalongan', 14),
(227, 'Kota Salatiga', 14),
(228, 'Kota Semarang', 14),
(229, 'Kota Surakarta', 14),
(230, 'Kota Tegal', 14),
(231, 'Kabupaten Bantul', 15),
(232, 'Kabupaten Gunungkidul', 15),
(233, 'Kabupaten Kulon Progo', 15),
(234, 'Kabupaten Sleman', 15),
(235, 'Kota Yogyakarta', 15),
(236, 'Kabupaten Bangkalan', 16),
(237, 'Kabupaten Banyuwangi', 16),
(238, 'Kabupaten Blitar', 16),
(239, 'Kabupaten Bojonegoro', 16),
(240, 'Kabupaten Bondowoso', 16),
(241, 'Kabupaten Gresik', 16),
(242, 'Kabupaten Jember', 16),
(243, 'Kabupaten Jombang', 16),
(244, 'Kabupaten Kediri', 16),
(245, 'Kabupaten Lamongan', 16),
(246, 'Kabupaten Lumajang', 16),
(247, 'Kabupaten Madiun', 16),
(248, 'Kabupaten Magetan', 16),
(249, 'Kabupaten Malang', 16),
(250, 'Kabupaten Mojokerto', 16),
(251, 'Kabupaten Nganjuk', 16),
(252, 'Kabupaten Ngawi', 16),
(253, 'Kabupaten Pacitan', 16),
(254, 'Kabupaten Pamekasan', 16),
(255, 'Kabupaten Pasuruan', 16),
(256, 'Kabupaten Ponorogo', 16),
(257, 'Kabupaten Probolinggo', 16),
(258, 'Kabupaten Sampang', 16),
(259, 'Kabupaten Sidoarjo', 16),
(260, 'Kabupaten Situbondo', 16),
(261, 'Kabupaten Sumenep', 16),
(262, 'Kabupaten Trenggalek', 16),
(263, 'Kabupaten Tuban', 16),
(264, 'Kabupaten Tulungagung', 16),
(265, 'Kota Batu', 16),
(266, 'Kota Blitar', 16),
(267, 'Kota Kediri', 16),
(268, 'Kota Madiun', 16),
(269, 'Kota Malang', 16),
(270, 'Kota Mojokerto', 16),
(271, 'Kota Pasuruan', 16),
(272, 'Kota Probolinggo', 16),
(273, 'Kota Surabaya', 16),
(274, 'Kabupaten Badung', 17),
(275, 'Kabupaten Bangli', 17),
(276, 'Kabupaten Buleleng', 17),
(277, 'Kabupaten Gianyar', 17),
(278, 'Kabupaten Jembrana', 17),
(279, 'Kabupaten Karangasem', 17),
(280, 'Kabupaten Klungkung', 17),
(281, 'Kabupaten Tabanan', 17),
(282, 'Kota Denpasar', 17),
(283, 'Kabupaten Bima', 18),
(284, 'Kabupaten Dompu', 18),
(285, 'Kabupaten Lombok Barat', 18),
(286, 'Kabupaten Lombok Tengah', 18),
(287, 'Kabupaten Lombok Timur', 18),
(288, 'Kabupaten Lombok Utara', 18),
(289, 'Kabupaten Sumbawa', 18),
(290, 'Kabupaten Sumbawa Barat', 18),
(291, 'Kota Bima', 18),
(292, 'Kota Mataram', 18),
(293, 'Kabupaten Alor', 19),
(294, 'Kabupaten Belu', 19),
(295, 'Kabupaten Ende', 19),
(296, 'Kabupaten Flores Timur', 19),
(297, 'Kabupaten Kupang', 19),
(298, 'Kabupaten Lembata', 19),
(299, 'Kabupaten Malaka', 19),
(300, 'Kabupaten Manggarai', 19),
(301, 'Kabupaten Manggarai Barat', 19),
(302, 'Kabupaten Manggarai Timur', 19),
(303, 'Kabupaten Ngada', 19),
(304, 'Kabupaten Nagekeo', 19),
(305, 'Kabupaten Rote Ndao', 19),
(306, 'Kabupaten Sabu Raijua', 19),
(307, 'Kabupaten Sikka', 19),
(308, 'Kabupaten Sumba Barat', 19),
(309, 'Kabupaten Sumba Barat Daya', 19),
(310, 'Kabupaten Sumba Tengah', 19),
(311, 'Kabupaten Sumba Timur', 19),
(312, 'Kabupaten Timor Tengah Selatan', 19),
(313, 'Kabupaten Timor Tengah Utara', 19),
(314, 'Kota Kupang', 19),
(315, 'Kabupaten Bengkayang', 20),
(316, 'Kabupaten Kapuas Hulu', 20),
(317, 'Kabupaten Kayong Utara', 20),
(318, 'Kabupaten Ketapang', 20),
(319, 'Kabupaten Kubu Raya', 20),
(320, 'Kabupaten Landak', 20),
(321, 'Kabupaten Melawi', 20),
(322, 'Kabupaten Mempawah', 20),
(323, 'Kabupaten Sambas', 20),
(324, 'Kabupaten Sanggau', 20),
(325, 'Kabupaten Sekadau', 20),
(326, 'Kabupaten Sintang', 20),
(327, 'Kota Pontianak', 20),
(328, 'Kota Singkawang', 20),
(329, 'Kabupaten Balangan', 21),
(330, 'Kabupaten Banjar', 21),
(331, 'Kabupaten Barito Kuala', 21),
(332, 'Kabupaten Hulu Sungai Selatan', 21),
(333, 'Kabupaten Hulu Sungai Tengah', 21),
(334, 'Kabupaten Hulu Sungai Utara', 21),
(335, 'Kabupaten Kotabaru', 21),
(336, 'Kabupaten Tabalong', 21),
(337, 'Kabupaten Tanah Bumbu', 21),
(338, 'Kabupaten Tanah Laut', 21),
(339, 'Kabupaten Tapin', 21),
(340, 'Kota Banjarbaru', 21),
(341, 'Kota Banjarmasin', 21),
(342, 'Kabupaten Barito Selatan', 22),
(343, 'Kabupaten Barito Timur', 22),
(344, 'Kabupaten Barito Utara', 22),
(345, 'Kabupaten Gunung Mas', 22),
(346, 'Kabupaten Kapuas', 22),
(347, 'Kabupaten Katingan', 22),
(348, 'Kabupaten Kotawaringin Barat', 22),
(349, 'Kabupaten Kotawaringin Timur', 22),
(350, 'Kabupaten Lamandau', 22),
(351, 'Kabupaten Murung Raya', 22),
(352, 'Kabupaten Pulang Pisau', 22),
(353, 'Kabupaten Sukamara', 22),
(354, 'Kabupaten Seruyan', 22),
(355, 'Kota Palangka Raya', 22),
(356, 'Kabupaten Berau', 23),
(357, 'Kabupaten Kutai Barat', 23),
(358, 'Kabupaten Kutai Kartanegara', 23),
(359, 'Kabupaten Kutai Timur', 23),
(360, 'Kabupaten Mahakam Ulu', 23),
(361, 'Kabupaten Paser', 23),
(362, 'Kabupaten Penajam Paser Utara', 23),
(363, 'Kota Balikpapan', 23),
(364, 'Kota Bontang', 23),
(365, 'Kota Samarinda', 23),
(366, 'Kabupaten Bulungan', 24),
(367, 'Kabupaten Malinau', 24),
(368, 'Kabupaten Nunukan', 24),
(369, 'Kabupaten Tana Tidung', 24),
(370, 'Kota Tarakan', 24),
(371, 'Kabupaten Boalemo', 25),
(372, 'Kabupaten Bone Bolango', 25),
(373, 'Kabupaten Gorontalo', 25),
(374, 'Kabupaten Gorontalo Utara', 25),
(375, 'Kabupaten Pohuwato', 25),
(376, 'Kota Gorontalo', 25),
(377, 'Kabupaten Bantaeng', 26),
(378, 'Kabupaten Barru', 26),
(379, 'Kabupaten Bone', 26),
(380, 'Kabupaten Bulukumba', 26),
(381, 'Kabupaten Enrekang', 26),
(382, 'Kabupaten Gowa', 26),
(383, 'Kabupaten Jeneponto', 26),
(384, 'Kabupaten Kepulauan Selayar', 26),
(385, 'Kabupaten Luwu', 26),
(386, 'Kabupaten Luwu Timur', 26),
(387, 'Kabupaten Luwu Utara', 26),
(388, 'Kabupaten Maros', 26),
(389, 'Kabupaten Pangkajene dan Kepulauan', 26),
(390, 'Kabupaten Pinrang', 26),
(391, 'Kabupaten Sidenreng Rappang', 26),
(392, 'Kabupaten Sinjai', 26),
(393, 'Kabupaten Soppeng', 26),
(394, 'Kabupaten Takalar', 26),
(395, 'Kabupaten Tana Toraja', 26),
(396, 'Kabupaten Toraja Utara', 26),
(397, 'Kabupaten Wajo', 26),
(398, 'Kota Makassar', 26),
(399, 'Kota Palopo', 26),
(400, 'Kota Parepare', 26),
(401, 'Kabupaten Bombana', 27),
(402, 'Kabupaten Buton', 27),
(403, 'Kabupaten Buton Selatan', 27),
(404, 'Kabupaten Buton Tengah', 27),
(405, 'Kabupaten Buton Utara', 27),
(406, 'Kabupaten Kolaka', 27),
(407, 'Kabupaten Kolaka Timur', 27),
(408, 'Kabupaten Kolaka Utara', 27),
(409, 'Kabupaten Konawe', 27),
(410, 'Kabupaten Konawe Kepulauan', 27),
(411, 'Kabupaten Konawe Selatan', 27),
(412, 'Kabupaten Konawe Utara', 27),
(413, 'Kabupaten Muna', 27),
(414, 'Kabupaten Muna Barat', 27),
(415, 'Kabupaten Wakatobi', 27),
(416, 'Kota Bau-Bau', 27),
(417, 'Kota Kendari', 27),
(418, 'Kabupaten Banggai', 28),
(419, 'Kabupaten Banggai Kepulauan', 28),
(420, 'Kabupaten Banggai Laut', 28),
(421, 'Kabupaten Buol', 28),
(422, 'Kabupaten Donggala', 28),
(423, 'Kabupaten Morowali', 28),
(424, 'Kabupaten Morowali Utara', 28),
(425, 'Kabupaten Parigi Moutong', 28),
(426, 'Kabupaten Poso', 28),
(427, 'Kabupaten Sigi', 28),
(428, 'Kabupaten Tojo Una-Una', 28),
(429, 'Kabupaten Tolitoli', 28),
(430, 'Kota Palu', 28),
(431, 'Kabupaten Bolaang Mongondow', 29),
(432, 'Kabupaten Bolaang Mongondow Selatan', 29),
(433, 'Kabupaten Bolaang Mongondow Timur', 29),
(434, 'Kabupaten Bolaang Mongondow Utara', 29),
(435, 'Kabupaten Kepulauan Sangihe', 29),
(436, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 29),
(437, 'Kabupaten Kepulauan Talaud', 29),
(438, 'Kabupaten Minahasa', 29),
(439, 'Kabupaten Minahasa Selatan', 29),
(440, 'Kabupaten Minahasa Tenggara', 29),
(441, 'Kabupaten Minahasa Utara', 29),
(442, 'Kota Bitung', 29),
(443, 'Kota Kotamobagu', 29),
(444, 'Kota Manado', 29),
(445, 'Kota Tomohon', 29),
(446, 'Kabupaten Majene', 30),
(447, 'Kabupaten Mamasa', 30),
(448, 'Kabupaten Mamuju', 30),
(449, 'Kabupaten Mamuju Tengah', 30),
(450, 'Kabupaten Mamuju Utara', 30),
(451, 'Kabupaten Polewali Mandar', 30),
(452, 'Kabupaten Buru', 31),
(453, 'Kabupaten Buru Selatan', 31),
(454, 'Kabupaten Kepulauan Aru', 31),
(455, 'Kabupaten Maluku Barat Daya', 31),
(456, 'Kabupaten Maluku Tengah', 31),
(457, 'Kabupaten Maluku Tenggara', 31),
(458, 'Kabupaten Maluku Tenggara Barat', 31),
(459, 'Kabupaten Seram Bagian Barat', 31),
(460, 'Kabupaten Seram Bagian Timur', 31),
(461, 'Kota Ambon', 31),
(462, 'Kota Tual', 31),
(463, 'Kabupaten Halmahera Barat', 32),
(464, 'Kabupaten Halmahera Tengah', 32),
(465, 'Kabupaten Halmahera Timur', 32),
(466, 'Kabupaten Halmahera Selatan', 32),
(467, 'Kabupaten Halmahera Utara', 32),
(468, 'Kabupaten Kepulauan Sula', 32),
(469, 'Kabupaten Pulau Morotai', 32),
(470, 'Kabupaten Pulau Taliabu', 32),
(471, 'Kota Ternate', 32),
(472, 'Kota Tidore Kepulauan', 32),
(473, 'Kabupaten Asmat', 33),
(474, 'Kabupaten Biak Numfor', 33),
(475, 'Kabupaten Boven Digoel', 33),
(476, 'Kabupaten Deiyai', 33),
(477, 'Kabupaten Dogiyai', 33),
(478, 'Kabupaten Intan Jaya', 33),
(479, 'Kabupaten Jayapura', 33),
(480, 'Kabupaten Jayawijaya', 33),
(481, 'Kabupaten Keerom', 33),
(482, 'Kabupaten Kepulauan Yapen', 33),
(483, 'Kabupaten Lanny Jaya', 33),
(484, 'Kabupaten Mamberamo Raya', 33),
(485, 'Kabupaten Mamberamo Tengah', 33),
(486, 'Kabupaten Mappi', 33),
(487, 'Kabupaten Merauke', 33),
(488, 'Kabupaten Mimika', 33),
(489, 'Kabupaten Nabire', 33),
(490, 'Kabupaten Nduga', 33),
(491, 'Kabupaten Paniai', 33),
(492, 'Kabupaten Pegunungan Bintang', 33),
(493, 'Kabupaten Puncak', 33),
(494, 'Kabupaten Puncak Jaya', 33),
(495, 'Kabupaten Sarmi', 33),
(496, 'Kabupaten Supiori', 33),
(497, 'Kabupaten Tolikara', 33),
(498, 'Kabupaten Waropen', 33),
(499, 'Kabupaten Yahukimo', 33),
(500, 'Kabupaten Yalimo', 33),
(501, 'Kota Jayapura', 33),
(502, 'Kabupaten Fakfak', 34),
(503, 'Kabupaten Kaimana', 34),
(504, 'Kabupaten Manokwari', 34),
(505, 'Kabupaten Manokwari Selatan', 34),
(506, 'Kabupaten Maybrat', 34),
(507, 'Kabupaten Pegunungan Arfak', 34),
(508, 'Kabupaten Raja Ampat', 34),
(509, 'Kabupaten Sorong', 34),
(510, 'Kabupaten Sorong Selatan', 34),
(511, 'Kabupaten Tambrauw', 34),
(512, 'Kabupaten Teluk Bintuni', 34),
(513, 'Kabupaten Teluk Wondama', 34),
(514, 'Kota Sorong', 34),
(515, 'Kota Ciputat', 11);

-- --------------------------------------------------------

--
-- Table structure for table `keluaran`
--

CREATE TABLE `keluaran` (
  `Kode` int(3) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `Kode_NamaKegiatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluaran`
--

INSERT INTO `keluaran` (`Kode`, `Keterangan`, `Kode_NamaKegiatan`) VALUES
(954, 'Layanan Manajemen SDM', 3012),
(960, 'Layanan Manajemen Organisasi', 3012),
(961, 'Layanan Reformasi Birokrasi', 3012),
(994, 'Layanan Penyelenggaraan Operasional dan Pemeliharaan Perkantoran', 3015);

-- --------------------------------------------------------

--
-- Table structure for table `kode_pembebanan`
--

CREATE TABLE `kode_pembebanan` (
  `id` int(10) NOT NULL,
  `kode` varchar(21) NOT NULL,
  `keterangan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_pembebanan`
--

INSERT INTO `kode_pembebanan` (`id`, `kode`, `keterangan`) VALUES
(1, '3012.954.051.A.524114', 'Penyusunan Formasi Pegawai (Dalam Kota)'),
(2, '3012.954.051.A.524119', 'Penyusunan Formasi Pegawai (Luar Kota)'),
(3, '3012.954.051.B.524114', 'Pengembangan Sistem Informasi Kepegawaian Terintegrasi (Dalam Kota)'),
(4, '3012.954.051.B.524119', 'Pengembangan Sistem Informasi Kepegawaian Terintegrasi (Luar Kota)'),
(5, '3012.954.052.A.524114', 'Penilaian Kinerja (Dalam Kota)'),
(6, '3012.954.052.A.524119', 'Penilaian Kinerja (Luar Kota)'),
(7, '3012.954.052.B.524114', 'Penerapan Budaya Kerja (Dalam Kota)'),
(8, '3012.954.052.B.524119', 'Penerapan Budaya Kerja (Luar Kota)'),
(9, '3012.954.052.C.524114', 'Penyelesaian Masalah Kepegawaian (Dalam Kota)'),
(10, '3012.954.052.C.524119', 'Penyelesaian Masalah Kepegawaian (Luar Kota)'),
(11, '3012.954.052.D.524114', 'Penegakan Disiplin Pegawai (Dalam Kota)'),
(12, '3012.954.052.D.524119', 'Penegakan Disiplin Pegawai (Luar Kota)'),
(13, '3012.954.052.E.524114', 'Penilaian Angka Kredit Jabatan Fungsional (Dalam Kota)'),
(14, '3012.954.052.E.524119', 'Penilaian Angka Kredit Jabatan Fungsional (Luar Kota)'),
(15, '3012.954.052.F.524114', 'Bimbingan Teknis Jabatan Fungsional (Dalam Kota)'),
(16, '3012.954.052.F.524119', 'Bimbingan Teknis Jabatan Fungsional (Luar Kota)'),
(17, '3012.954.052.G.524114', 'Fasilitasi Pembentukan Jabatan Fungsional Baru (Dalam Kota)'),
(18, '3012.954.052.G.524119', 'Fasilitasi Pembentukan Jabatan Fungsional Baru (Luar Kota)'),
(19, '3012.954.053.A.524114', 'Ujian Dinas dan Kenaikan Pangkat Penyesuaian Ijazah (Dalam Kota)'),
(20, '3012.954.053.A.524119', 'Ujian Dinas dan Kenaikan Pangkat Penyesuaian Ijazah (Luar Kota)'),
(21, '3012.954.053.B.524114', 'Pemetaan Profil Kepegawaian (Dalam Kota)'),
(22, '3012.954.053.B.524119', 'Pemetaan Profil Kepegawaian (Luar Kota)'),
(23, '3012.954.053.C.524114', 'Pengembangan Kompetensi Pegawai Kominfo (Dalam Kota)'),
(24, '3012.954.053.C.524119', 'Pengembangan Kompetensi Pegawai Kominfo (Luar Kota)'),
(25, '3012.954.053.D.524114', 'Seleksi Pengisian Jabatan (Dalam Kota)'),
(26, '3012.954.053.D.524119', 'Seleksi Pengisian Jabatan (Luar Kota)'),
(27, '3012.954.054.A.524114', 'Layanan Administrasi Kepegawaian (Dalam Kota)'),
(28, '3012.954.054.A.524119', 'Layanan Administrasi Kepegawaian (Luar Kota)'),
(29, '3012.954.054.B.524114', 'Pembinaan Jasmani, Rohani, Seni (Dalam Kota)'),
(30, '3012.954.054.B.524119', 'Pembinaan Jasmani, Rohani, Seni (Luar Kota)'),
(31, '3012.960.051.A.524114', 'Penataan Organisasi (Dalam Kota)'),
(32, '3012.960.051.A.524119', 'Penataan Organisasi (Luar Kota)'),
(33, '3012.960.051.B.524114', 'Evaluasi Informasi Jabatan (Dalam Kota)'),
(34, '3012.960.051.B.524119', 'Evaluasi Informasi Jabatan (Luar Kota)'),
(35, '3012.960.053.A.524114', 'Fasiitasi Revisi Regulasi Ketatalaksanaan (Dalam Kota)'),
(36, '3012.960.053.A.524119', 'Fasiitasi Revisi Regulasi Ketatalaksanaan (Luar Kota)'),
(37, '3012.960.053.B.524114', 'Review Bisnis Proses Kementerian (Dalam Kota)'),
(38, '3012.960.053.B.524119', 'Review Bisnis Proses Kementerian (Luar Kota)'),
(39, '3012.960.053.C.524114', 'Peningkatan Layanan Mutu Biro Kepegawaian dan Organisasi (Dalam Kota)'),
(40, '3012.960.053.C.524119', 'Peningkatan Layanan Mutu Biro Kepegawaian dan Organisasi (Luar Kota)'),
(41, '3012.961.051.A.524114', 'Fasilitasi Pelaksanaan Reformasi Birokrasi (Dalam Kota)'),
(42, '3012.961.051.A.524119', 'Fasilitasi Pelaksanaan Reformasi Birokrasi (Luar Kota)'),
(43, '3012.961.052.A.524114', 'Monev Implementasi Reformasi Birokrasi (Dalam Kota)'),
(44, '3012.961.052.A.524119', 'Monev Implementasi Reformasi Birokrasi (Luar Kota)'),
(45, '3015.994.002.T.524114', 'Layanan Perkantoran (Dalam Kota)'),
(46, '3015.994.002.T.524119', 'Layanan Perkantoran (Luar Kota)'),
(47, 'umam.1804', 'UNS');

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `ID` int(2) NOT NULL,
  `Kode` varchar(3) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `Kode_Keluaran` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`ID`, `Kode`, `Keterangan`, `Kode_Keluaran`) VALUES
(1, '051', 'Perencanaan Pegawai', 954),
(2, '052', 'Peningkatan Kinerja Pegawai', 954),
(3, '053', 'Pengembangan Pegawai', 954),
(4, '054', 'Peningkatan Kesejahteraan Pegawai', 954),
(5, '051', 'Layanan Penataan Organisasi', 960),
(6, '053', 'Layanan Penataan Tatalaksana', 960),
(7, '051', 'Fasilitasi Pelaksanaan Reformasi Birokrasi', 961),
(8, '052', 'Monev Implementasi Reformasi Birokrasi', 961),
(9, '02', 'Belanja Operasional Pemeliharaan Kantor', 994);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_02_18_003431_create_department_table', 1),
(3, '2017_02_18_004142_create_division_table', 1),
(4, '2017_02_18_004326_create_country_table', 1),
(5, '2017_02_18_005005_create_state_table', 1),
(6, '2017_02_18_005241_create_city_table', 1),
(7, '2017_03_17_163141_create_employees_table', 1),
(8, '2017_03_18_001905_create_employee_salary_table', 1),
(9, '2018_01_19_224409_create_ggwp_table', 2),
(10, '2018_01_21_043052_create_data_table', 3),
(11, '2018_01_22_121529_create_pegawai_table', 4),
(12, '2018_01_22_163406_create_data_table', 5),
(13, '2018_01_27_071744_create_data_table', 6),
(14, '2018_01_27_073048_create_pengikut_table', 7),
(15, '2018_01_28_121953_create_pengikut_table', 8),
(16, '2018_02_03_122033_create_normatif_table', 9),
(20, '2018_02_05_150226_create_spd_table', 10),
(21, '2018_03_08_023452_create_event_table', 11),
(22, '2018_03_08_023557_create_pengikut_table', 11),
(23, '2018_03_14_091402_create_report_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id` int(2) NOT NULL,
  `pangkat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id`, `pangkat`) VALUES
(1, 'JURU MUDA - I/A'),
(2, 'JURU MUDA TINGKAT I - I/B'),
(3, 'JURU - I/C'),
(4, 'JURU TINGKAT I - I/D'),
(5, 'PENGATUR MUDA - II/A'),
(6, 'PENGATUR MUDA TINGKAT I - II/B'),
(7, 'PENGATUR - II/C'),
(8, 'PENGATUR TINGKAT I - II/D'),
(9, 'PENATA MUDA - III/A'),
(10, 'PENATA MUDA TINGKAT I - III/B'),
(11, 'PENATA - III/C'),
(12, 'PENATA TINGKAT I - III/D'),
(13, 'PEMBINA - IV/A'),
(14, 'PEMBINA TINGKAT I - IV/B'),
(15, 'PEMBINA UTAMA MUDA - IV/C'),
(16, 'PEMBINA UTAMA MADYA - IV/D'),
(17, 'PEMBINA UTAMA - IV/E');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(5) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `jabatan` varchar(75) NOT NULL,
  `tingkat` varchar(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `pangkat`, `jabatan`, `tingkat`, `created_at`, `updated_at`) VALUES
(1, '196004131981032001', 'NINIK RUCIANTARI', 'PENATA TINGKAT I - III/D', 'ARSIPARIS PENYELIA', 'C', NULL, '2018-01-27 20:10:33'),
(2, '196008131983021002', 'TUGIRAN', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENGADMINISTRASI MUTASI KEPEGAWAIAN', 'C', NULL, '2018-01-27 19:40:36'),
(3, '196010101983022001', 'SUYATMI', 'PENATA MUDA TINGKAT I - III/B', 'ANALIS HUKUM', 'C', NULL, NULL),
(4, '196012301986032003', 'RITA AMALIDAR SE, MM', 'PEMBINA TINGKAT I - IV/B', 'KEPALA BAGIAN ORGANISASI DAN TATA LAKSANA', 'C', NULL, NULL),
(5, '196106161990031001', 'MASLI', 'PENATA MUDA TINGKAT I - III/B', 'ANALIS TATA USAHA', 'C', NULL, NULL),
(6, '196106171981012001', 'JUNININGSIH', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENGADMINISTRASI UMUM', 'C', NULL, NULL),
(7, '196108221986031002', 'SAIFUDIN', 'PENATA TINGKAT I - III/D', 'ARSIPARIS PENYELIA ', 'C', NULL, NULL),
(8, '196203171987021001', 'RUSTAM SLAMET', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENGADMINISTRASI JABATAN FUNGSIONAL ', 'C', NULL, NULL),
(9, '196205171983032004', 'ERNY', 'PENATA TINGKAT I - III/D', 'ARSIPARIS PENYELIA ', 'C', NULL, NULL),
(10, '196210051986032006', 'ISMENSIAWATI', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENYIAP BAHAN PENGELOLAAN JABATAN  FUNGSIONAL BINAAN  KOMINFO', 'C', NULL, NULL),
(11, '196211151986032002', 'USWATI', 'PENATA TINGKAT I - III/D', 'ARSIPARIS PENYELIA ', 'C', NULL, NULL),
(12, '196212051985031008', 'MUHAMAD TOHIR', 'PENATA TINGKAT I - III/D', 'ARSIPARIS PENYELIA ', 'C', NULL, NULL),
(13, '196305051987031007', 'ENTUS SUTISNA', 'PENATA - III/C', 'ARSIPARIS PENYELIA ', 'C', NULL, NULL),
(14, '196305141990031004', 'SUDI SANTOSO', 'PENATA - III/C', 'ARSIPARIS PENYELIA ', 'C', NULL, NULL),
(15, '196309081988032001', 'LOLITA BA', 'PENATA TINGKAT I - III/D', 'ANALIS KEPEGAWAIAN TERAMPIL PENYELIA', 'C', NULL, NULL),
(16, '196309251989031001', 'CECEP AHMED FEISAL SH', 'PEMBINA UTAMA MADYA - IV/D', 'KEPALA BIRO KEPEGAWAIAN DAN ORGANISASI', 'B', NULL, NULL),
(17, '196402081984022001', 'SUGIATI', 'PENGATUR - II/C', 'JFU PENYIAP BAHAN PENGELOLAAN JABATAN  FUNGSIONAL NON BINAAN  KOMINFO', 'C', NULL, NULL),
(18, '196403141989032003', 'MUNAWAROH B.SC', 'PENATA TINGKAT I - III/D', 'JFU ANALIS KEBUTUHAN PEGAWAI', 'C', NULL, NULL),
(19, '196404051989031003', 'AMIR MAHMUD', 'PENGATUR - II/C', 'JFU PENGADMINISTRASI UMUM', 'C', NULL, NULL),
(20, '196512181994032003', 'DRA ERNI RUSTIANI', 'PENATA TINGKAT I - III/D', 'JFU PENGADMINISTRASI PEMBERHENTIAN DAN PEMENSIUNAN PEGAWAI ', 'C', NULL, NULL),
(21, '196610121986022001', 'SUDI RISKIYANTI', 'PENATA TINGKAT I - III/D', 'ARSIPARIS PENYELIA ', 'C', NULL, NULL),
(22, '196708301986031001', 'RAGIL MUDO S.SOS', 'PEMBINA - IV/A', 'KEPALA BAGIAN BINA KINERJA PEGAWAI', 'C', NULL, NULL),
(23, '196803211990032007', 'RADEN RORO ENDANG RAHMAWATI', 'PENATA - III/C', 'JFU PENGADMINISTRASI UMUM', 'C', NULL, NULL),
(24, '196804101991032003', 'NURUL HUDA SE, M.SI', 'PEMBINA TINGKAT I - IV/B', 'KEPALA BAGIAN MUTASI DAN KESEJAHTERAAN PEGAWAI', 'C', NULL, NULL),
(25, '197106021992031003', 'EKA HERYAWAN', 'PENATA MUDA TINGKAT I - III/B', 'ARSIPARIS PELAKSANA LANJUTAN', 'C', NULL, NULL),
(26, '197208311992032001', 'SRI TUTI  HENDRA', 'PENATA MUDA - III/A', 'JFU ANALIS PENGEMBANGAN PEGAWAI', 'C', NULL, NULL),
(27, '197507302006041001', 'ISNALDI S.KOM, M.T.I', 'PENATA TINGKAT I - III/D', 'KEPALA SUBBAGIAN PERENCANAAN PEGAWAI', 'C', NULL, NULL),
(28, '197609232011012001', 'HURIANA HOTDI OJAHANNA MUNTHE M.SI', 'PENATA - III/C', 'KEPALA SUBBAGIAN KINERJA PEGAWAI', 'C', NULL, NULL),
(30, '197806172011012003', 'NIKEN INDAH BUDIARTI', 'PENATA MUDA TINGKAT I - III/B', 'ANALIS DATA DAN INFORMASI PEGAWAI', 'C', NULL, NULL),
(31, '198005042009012004', 'MEIRNA TRI PUSPITA SH', 'PENATA - III/C', 'KEPALA SUBBAGIAN DISIPLIN PEGAWAI', 'C', NULL, NULL),
(32, '198108092009012007', 'RADITA PUSPASARI S.PSI', 'PENATA - III/C', 'KEPALA SUBBAGIAN PENGEMBANGAN PEGAWAI', 'C', NULL, NULL),
(33, '198203092008032001', 'MAMIK SETIYORINI SE', 'PENATA - III/C', 'KEPALA SUBBAGIAN KETATALAKSANAAN', 'C', NULL, NULL),
(34, '198204042009012001', 'ENDANG SRI MURYANI', 'PENGATUR MUDA TK. I - II/B', 'JFU ANALIS PENGEMBANGAN PEGAWAI', 'C', NULL, NULL),
(35, '198209062006042002', 'LESIKA SUHARITA S.KOM, M.T.I', 'PENATA TINGKAT I - III/D', 'KEPALA SUBBAGIAN ORGANISASI', 'C', NULL, NULL),
(36, '198402122009121002', 'ANKA RAHARJA', 'PENGATUR TINGKAT I - II/D', 'JFU PENATA LAPORAN KEUANGAN', 'C', NULL, NULL),
(37, '198408142015041001', 'ISKANDAR BAYUALAM FIRDAUZE', 'PENATA MUDA - III/A', 'ANALIS KELEMBAGAAN', 'C', NULL, NULL),
(38, '198409032014032001', 'KARTIKA SARASWATI SH', 'PENATA MUDA TINGKAT I - III/B', 'ANALIS KEPEGAWAIAN AHLI PERTAMA', 'C', NULL, NULL),
(39, '198409162009122001', 'SRI ANITA SIAMBA S.KOM', 'PENATA - III/C', 'ANALIS DATA DAN INFORMASI PEGAWAI', 'C', NULL, NULL),
(40, '198410302011011013', 'MARINCO OKTOVIANO BERHITU ST', 'PENATA MUDA TINGKAT I - III/B', 'PRANATA KOMPUTER PERTAMA', 'C', NULL, NULL),
(41, '198411022011011010', 'RIO NOVIRA S.KOM', 'PENATA MUDA TINGKAT I - III/B', 'PRANATA KOMPUTER PERTAMA', 'C', NULL, NULL),
(42, '198412042011011001', 'MUHAMMAD FIRDAUS SH', 'PENATA MUDA TINGKAT I - III/B', 'JFU ANALIS KASUS KEPEGAWAIAN', 'C', NULL, NULL),
(43, '198507042005022001', 'RINA TRISNAWATI S.KOM', 'PENATA MUDA TINGKAT I - III/B', 'ANALIS KEPEGAWAIAN AHLI PERTAMA', 'C', NULL, NULL),
(44, '198611242006041003', 'ISNAN RUDIANTO AGUNG S.AP', 'PENATA MUDA - III/A', 'JFU PENGELOLA DATA INVENTARISASI BMN', 'C', NULL, NULL),
(45, '198712082011011004', 'RANDY DWI PRANAPUTRA ST', 'PENATA MUDA TINGKAT I - III/B', 'KEPALA SUBBAGIAN TATA USAHA BIRO', 'C', NULL, NULL),
(46, '198802142011012010', 'AHADINI KARIMAH RIZQIYANI S.ST', 'PENATA MUDA TINGKAT I - III/B', 'PRANATA KOMPUTER PERTAMA', 'C', NULL, NULL),
(47, '199001202014032006', 'ASTRID ERFANDA SARI', 'PENATA MUDA - III/A', 'JFU ANALIS PENGEMBANGAN PEGAWAI', 'C', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengikut`
--

CREATE TABLE `pengikut` (
  `id` int(10) NOT NULL,
  `id_event` int(11) NOT NULL,
  `pejabat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_pejabat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bendahara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_bendahara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maksud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `lama` int(11) NOT NULL,
  `keluaran` int(11) NOT NULL,
  `komponen` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akun` int(11) NOT NULL,
  `h_ku` int(11) DEFAULT NULL,
  `t_ku` int(11) DEFAULT NULL,
  `n_transport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_berangkat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kembali` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nk_transport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_tiket` int(11) DEFAULT NULL,
  `h_tiketp` int(11) DEFAULT NULL,
  `t_transport` int(11) DEFAULT NULL,
  `n_penginapan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `j_penginapan` int(11) DEFAULT NULL,
  `h_penginapan` int(11) DEFAULT NULL,
  `t_penginapan` int(11) DEFAULT NULL,
  `j_hn` int(11) DEFAULT NULL,
  `h_hn` int(11) DEFAULT NULL,
  `t_hn` int(11) DEFAULT NULL,
  `j_fd` int(11) DEFAULT NULL,
  `h_fd` int(11) DEFAULT NULL,
  `t_fd` int(11) DEFAULT NULL,
  `j_fb` int(11) DEFAULT NULL,
  `h_fb` int(11) DEFAULT NULL,
  `t_fb` int(11) DEFAULT NULL,
  `j_diklat` int(11) DEFAULT NULL,
  `h_diklat` int(11) DEFAULT NULL,
  `t_diklat` int(11) DEFAULT NULL,
  `j_rpr` int(11) DEFAULT NULL,
  `h_rpr` int(11) DEFAULT NULL,
  `t_rpr` int(11) DEFAULT NULL,
  `t_uh` int(11) DEFAULT NULL,
  `t_all` int(11) DEFAULT NULL,
  `terbilang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengikut`
--

INSERT INTO `pengikut` (`id`, `id_event`, `pejabat`, `posisi`, `nip_pejabat`, `bendahara`, `nip_bendahara`, `nama`, `nip`, `pangkat`, `jabatan`, `biaya`, `maksud`, `berangkat`, `tujuan`, `transportasi`, `tanggal_berangkat`, `tanggal_kembali`, `lama`, `keluaran`, `komponen`, `sub`, `akun`, `h_ku`, `t_ku`, `n_transport`, `no_berangkat`, `no_kembali`, `nk_transport`, `h_tiket`, `h_tiketp`, `t_transport`, `n_penginapan`, `j_penginapan`, `h_penginapan`, `t_penginapan`, `j_hn`, `h_hn`, `t_hn`, `j_fd`, `h_fd`, `t_fd`, `j_fb`, `h_fb`, `t_fb`, `j_diklat`, `h_diklat`, `t_diklat`, `j_rpr`, `h_rpr`, `t_rpr`, `t_uh`, `t_all`, `terbilang`, `status`, `created_at`, `updated_at`) VALUES
(3, 29, 'NURUL HUDA SE, M.SI', 'PESERTA', '196804101991032003', 'ANKA RAHARJA', '198402122009121002', 'JUNININGSIH', '196106171981012001', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENGADMINISTRASI UMUM', 'C', 'Seminar', 'Kota Administrasi Jakarta Pusat', 'Kabupaten Asahan', 'Angkutan Darat', '2018-05-15', '2018-05-15', 2, 960, '51', 'A', 524114, 232000, 232000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 4, 8, 1, 370000, 370000, 1, 95000, 95000, 2, 130000, 260000, 2, 110000, 220000, 1, 150000, 150000, 1327000, 1327008, 'Satu Juta Tiga Ratus Dua Puluh Tujuh Ribu   Delapan', 0, '2018-06-28 21:29:08', '2018-06-28 21:29:08'),
(4, 30, 'NURUL HUDA SE, M.SI', 'PESERTA', '196804101991032003', 'ANKA RAHARJA', '198402122009121002', 'JUNININGSIH', '196106171981012001', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENGADMINISTRASI UMUM', 'C', 'Workshop', 'Kota Administrasi Jakarta Pusat', 'Kabupaten Agam', 'Angkutan Darat', '2018-06-30', '2018-06-30', 2, 961, '053', 'A', 524114, 190000, 190000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alila', 1, 2, 2, 1, 380000, 380000, 1, 85000, 85000, 1, 120000, 120000, 1, 110000, 110000, 1, 150000, 150000, 1035000, 1035002, 'Satu Juta  Tiga Puluh Lima Ribu   Dua', 0, '2018-06-28 21:30:07', '2018-06-28 21:30:07'),
(16, 29, 'NURUL HUDA SE, M.SI', 'PESERTA', '196804101991032003', 'ANKA RAHARJA', '198402122009121002', 'JUNININGSIH', '196106171981012001', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENGADMINISTRASI UMUM', 'C', 'Seminar', 'Kota Administrasi Jakarta Pusat', 'Kabupaten Asahan', 'Angkutan Darat', '2018-05-15', '2018-05-15', 2, 960, '51', 'A', 524114, 232000, 232000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Emperor', 1, 213123, 213123, 1, 370000, 370000, 1, 95000, 95000, NULL, 130000, 0, NULL, 110000, 0, NULL, NULL, 0, 697000, 910123, 'Sembilan Ratus Sepuluh  Ribu Seratus Dua Puluh Tiga', 0, '2018-06-29 05:01:07', '2018-06-29 05:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `permenkeu`
--

CREATE TABLE `permenkeu` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `Taksi` int(7) NOT NULL,
  `PenginapanE1` int(7) NOT NULL,
  `PenginapanE2` int(7) NOT NULL,
  `PenginapanG12` int(7) NOT NULL,
  `PenginapanG3` int(7) NOT NULL,
  `PenginapanG4` int(7) NOT NULL,
  `Fullboard_Luar` int(7) NOT NULL,
  `Fullboard_Dalam` int(7) NOT NULL,
  `Harian_Fullday` int(7) NOT NULL,
  `Harian_Normal` int(7) NOT NULL,
  `Diklat` int(7) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permenkeu`
--

INSERT INTO `permenkeu` (`id`, `provinsi`, `Taksi`, `PenginapanE1`, `PenginapanE2`, `PenginapanG12`, `PenginapanG3`, `PenginapanG4`, `Fullboard_Luar`, `Fullboard_Dalam`, `Harian_Fullday`, `Harian_Normal`, `Diklat`, `updated_at`) VALUES
(1, 'Aceh', 123000, 4420000, 3526000, 556000, 556000, 1294000, 120000, 100000, 85000, 360000, 110000, '2018-06-27 05:37:30.000000'),
(2, 'Sumatera Utara', 232000, 4960000, 1518000, 530000, 530000, 1100000, 130000, 110000, 95000, 370000, 110000, NULL),
(3, 'Sumatera Barat', 190000, 5236000, 3332000, 650000, 650000, 1353000, 120000, 100000, 85000, 380000, 110000, NULL),
(4, 'Riau', 94000, 3820000, 3119000, 852000, 852000, 1650000, 130000, 100000, 85000, 370000, 110000, NULL),
(5, 'Kepulauan Riau', 137000, 4275000, 1854000, 792000, 792000, 1037000, 130000, 110000, 95000, 370000, 110000, NULL),
(6, 'Jambi', 147000, 4000000, 3337000, 520000, 520000, 1212000, 130000, 110000, 95000, 370000, 110000, NULL),
(7, 'Bengkulu', 109000, 2071000, 1628000, 572000, 572000, 1546000, 130000, 110000, 95000, 380000, 110000, NULL),
(8, 'Sumatera Selatan', 128000, 8447000, 3083000, 861000, 861000, 1571000, 120000, 100000, 85000, 380000, 110000, NULL),
(9, 'Bangka Belitung', 90000, 3827000, 2838000, 622000, 622000, 1957000, 130000, 110000, 95000, 410000, 120000, NULL),
(10, 'Lampung', 167000, 4491000, 2067000, 400000, 400000, 1140000, 130000, 110000, 95000, 380000, 110000, NULL),
(11, 'Banten', 446000, 5725000, 2373000, 718000, 718000, 1000000, 120000, 100000, 85000, 370000, 110000, NULL),
(12, 'Jawa Barat', 166000, 5381000, 2755000, 570000, 570000, 1006000, 150000, 125000, 105000, 430000, 130000, NULL),
(13, 'DKI Jakarta', 256000, 8720000, 1490000, 610000, 610000, 992000, 180000, 150000, 130000, 530000, 160000, NULL),
(14, 'Jawa Tengah', 75000, 4242000, 1480000, 486000, 486000, 954000, 130000, 110000, 95000, 370000, 110000, NULL),
(15, 'Jawa Timur', 194000, 4400000, 1605000, 664000, 664000, 1076000, 140000, 115000, 100000, 410000, 120000, NULL),
(16, 'DI Yogyakarta', 118000, 5017000, 2695000, 845000, 845000, 1384000, 140000, 115000, 100000, 420000, 130000, NULL),
(17, 'Bali', 159000, 4890000, 1946000, 910000, 910000, 990000, 160000, 135000, 115000, 480000, 140000, NULL),
(18, 'Nusa Tenggara Barat', 231000, 3500000, 2648000, 580000, 580000, 1418000, 150000, 125000, 105000, 440000, 130000, NULL),
(19, 'Nusa Tenggara Timur', 108000, 3000000, 1493000, 550000, 550000, 1355000, 140000, 115000, 100000, 430000, 130000, NULL),
(20, 'Kalimantan Barat', 135000, 2654000, 1538000, 538000, 538000, 1125000, 130000, 110000, 95000, 380000, 110000, NULL),
(21, 'Kalimantan Selatan', 150000, 4797000, 3316000, 540000, 540000, 1500000, 130000, 110000, 95000, 380000, 110000, NULL),
(22, 'Kalimantan Tengah', 111000, 4901000, 3391000, 659000, 659000, 1160000, 120000, 100000, 85000, 360000, 110000, NULL),
(23, 'Kalimantan Timur', 450000, 4000000, 2188000, 804000, 804000, 1507000, 150000, 125000, 105000, 430000, 130000, NULL),
(24, 'Kalimantan Utara', 102000, 4000000, 2188000, 804000, 804000, 1507000, 150000, 125000, 105000, 430000, 130000, NULL),
(25, 'Gorontalo', 240000, 4168000, 2549000, 764000, 764000, 1909000, 130000, 110000, 95000, 370000, 110000, NULL),
(26, 'Sulawesi Selatan', 145000, 4820000, 1550000, 665000, 665000, 1020000, 150000, 125000, 105000, 430000, 130000, NULL),
(27, 'Sulawesi Tenggara', 171000, 2475000, 2059000, 786000, 786000, 1297000, 130000, 110000, 95000, 380000, 110000, NULL),
(28, 'Sulawesi Tengah', 165000, 2309000, 2027000, 951000, 951000, 1567000, 130000, 110000, 95000, 370000, 110000, NULL),
(29, 'Sulawesi Utara', 138000, 4919000, 2290000, 782000, 782000, 924000, 130000, 110000, 95000, 370000, 110000, NULL),
(30, 'Sulawesi Barat', 313000, 4076000, 2581000, 704000, 704000, 1075000, 120000, 100000, 85000, 410000, 120000, NULL),
(31, 'Maluku', 240000, 3467000, 3240000, 667000, 667000, 1048000, 120000, 100000, 85000, 380000, 110000, NULL),
(32, 'Maluku Utara', 215000, 3440000, 3175000, 480000, 480000, 1073000, 130000, 110000, 95000, 430000, 130000, NULL),
(33, 'Papua', 431000, 3859000, 3318000, 829000, 829000, 2521000, 200000, 170000, 140000, 580000, 170000, NULL),
(34, 'Papua Barat', 182000, 3872000, 3212000, 600000, 600000, 2056000, 160000, 135000, 115000, 480000, 140000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spd`
--

CREATE TABLE `spd` (
  `id` int(10) NOT NULL,
  `pejabat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_pejabat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bendahara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_bendahara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maksud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `lama` int(11) NOT NULL,
  `keluaran` int(11) NOT NULL,
  `komponen` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akun` int(11) NOT NULL,
  `ket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_ku` int(11) DEFAULT NULL,
  `t_ku` int(11) DEFAULT NULL,
  `n_transport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_berangkat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kembali` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nk_transport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_tiket` int(11) DEFAULT NULL,
  `h_tiketp` int(11) DEFAULT NULL,
  `t_transport` int(11) DEFAULT NULL,
  `n_penginapan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `j_penginapan` int(11) DEFAULT NULL,
  `h_penginapan` int(11) DEFAULT NULL,
  `t_penginapan` int(11) DEFAULT NULL,
  `j_hn` int(11) DEFAULT NULL,
  `h_hn` int(11) DEFAULT NULL,
  `t_hn` int(11) DEFAULT NULL,
  `j_fd` int(11) DEFAULT NULL,
  `h_fd` int(11) DEFAULT NULL,
  `t_fd` int(11) DEFAULT NULL,
  `j_fb` int(11) DEFAULT NULL,
  `h_fb` int(11) DEFAULT NULL,
  `t_fb` int(11) DEFAULT NULL,
  `j_diklat` int(11) DEFAULT NULL,
  `h_diklat` int(11) DEFAULT NULL,
  `t_diklat` int(11) DEFAULT NULL,
  `j_rpr` int(11) DEFAULT NULL,
  `h_rpr` int(11) DEFAULT NULL,
  `t_rpr` int(11) DEFAULT NULL,
  `t_uh` int(11) DEFAULT NULL,
  `t_all` int(11) DEFAULT NULL,
  `terbilang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spd`
--

INSERT INTO `spd` (`id`, `pejabat`, `posisi`, `nip_pejabat`, `bendahara`, `nip_bendahara`, `nama`, `nip`, `pangkat`, `jabatan`, `biaya`, `maksud`, `berangkat`, `tujuan`, `transportasi`, `tanggal_berangkat`, `tanggal_kembali`, `lama`, `keluaran`, `komponen`, `sub`, `akun`, `ket`, `h_ku`, `t_ku`, `n_transport`, `no_berangkat`, `no_kembali`, `nk_transport`, `h_tiket`, `h_tiketp`, `t_transport`, `n_penginapan`, `j_penginapan`, `h_penginapan`, `t_penginapan`, `j_hn`, `h_hn`, `t_hn`, `j_fd`, `h_fd`, `t_fd`, `j_fb`, `h_fb`, `t_fb`, `j_diklat`, `h_diklat`, `t_diklat`, `j_rpr`, `h_rpr`, `t_rpr`, `t_uh`, `t_all`, `terbilang`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MARYADI', 'PESERTA', '196008281982031006', 'WINIH', '196610031986032001', 'ISMENSIAWATI', '196210051986032006', 'PENATA MUDA TINGKAT I - III/B', 'JFU PENYIAP BAHAN PENGELOLAAN JABATAN  FUNGSIONAL BINAAN  KOMINFO', 'C', 'Seminar', 'Kota Administrasi Jakarta Pusat', 'Kabupaten Bengkalis', 'Angkutan Darat', '2018-03-30', '2018-03-31', 2, 954, '051', 'A', 524114, NULL, 94000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 370000, 370000, NULL, 85000, 0, 1, 130000, 130000, NULL, 110000, 0, 1, 150000, 150000, 744000, 744000, 'Tujuh Ratus Empat Puluh Empat Ribu', 0, '2018-03-26', '2018-03-26 00:46:49'),
(2, 'NURUL HUDA SE, M.SI', 'PESERTA', '196804101991032003', 'ANKA RAHARJA', '198402122009121002', 'SUYATMI', '196010101983022001', 'PENATA MUDA TINGKAT I - III/B', 'ANALIS HUKUM', 'C', 'Seminar', 'Kota Administrasi Jakarta Pusat', 'Kabupaten Natuna', 'Angkutan Darat', '2018-06-29', '2018-06-30', 1, 960, '053', 'A', 524114, '-', 137000, 137000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alila', 2, 4, 8, 1, 370000, 370000, 1, 95000, 95000, NULL, 130000, 0, NULL, 110000, 0, NULL, NULL, 0, 602000, 602008, 'Enam Ratus  Dua Ribu   Delapan', 0, '2018-06-29', '2018-06-28 21:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `subkomponen`
--

CREATE TABLE `subkomponen` (
  `Kode` varchar(1) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `Kode_Komponen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkomponen`
--

INSERT INTO `subkomponen` (`Kode`, `Keterangan`, `Kode_Komponen`) VALUES
('A', 'Penyusunan Formasi Pegawai', 1),
('A', 'Penilaian Kinerja', 2),
('A', 'Ujian Dinas dan Ujian Kenaikan Pangkat Penyesuaian Ijazah', 3),
('A', 'Layanan Administrasi Kepegawaian', 4),
('A', 'Penataan Organisasi', 5),
('A', 'Fasilitasi Revisi Regulasi Ketatalaksanaan', 6),
('B', 'Pengembangan Sistem Informasi Kepegawaian Teritegrasi', 1),
('B', 'Penerapan Budaya Kerja', 2),
('B', 'Pemetahaan Profil Pegawai', 3),
('B', 'Pembinaan Jasmani, Rohani, dan Seni', 4),
('B', 'Evaluasi Informasi Jabatan', 5),
('B', 'Review Bisnis Proses Kementerian', 6),
('C', 'Penyelesaian Masalah Kepegawaian', 2),
('C', 'Pengembangan Kompetensi Pegawai Kominfo', 3),
('C', 'Peningkatan Layanan Mutu Biro Kepegawaian dan Organisasi', 6),
('D', 'Penegakan Disiplin Pegawai', 2),
('D', 'Seleksi Pengisian Jabatan', 3),
('E', 'Penilaian Angka Kredit Bagi Jabatan Fungsional', 2),
('F', 'Bimbingan Teknis Jabatan Fungsional', 2),
('G', 'Fasilitasi Pembentukan Jabatan Fungsional Baru', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `namauser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namalengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `namauser`, `email`, `password`, `namalengkap`, `role`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$VwNAf7X.9GKD.Iy2i3MzMOCtJXNlYlzYvyHci3xgp9STuPAv97wEi', 'kemkominfo', 1, 'VsHZFW3zMwOaKHfwLBYC1YCbcNkbPyvZvDC7CNdDwPHNdRtDb37uxCK8ZPvb', NULL, '2018-01-15 01:42:32', '2018-05-06 07:16:02'),
(2, 'Azazel-', 'umam@student.uns.ac.id', '$2y$10$.A0U.ExqYLZES1ZaLHnso.eSg2xGCDtLMXBy.m.sFtqE06U0cqFha', 'Chairul Umam Achmad', 2, 'PN20Wk15WPmb5FiCSNwj02fS0HxjzGCR9vZ2RB0Dlh7mWoHJKqyU6QaAirFY', NULL, '2018-01-15 01:43:33', '2018-05-06 07:15:53'),
(3, 'dimas', 'dimashv09@gmail.com', '$2y$10$y4gipz8u9ACocOvg9YnPoO0asNykr9yIVJswT8MfjACaYmoX5dSKe', 'dimass h', 2, 'pqblY3lErayPp9CkVI4iddW6jtprzJVpFxTTPK16GEwghNYc1yhHXkP5j44z', NULL, '2018-01-21 20:29:00', '2018-01-21 20:29:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `keluaran`
--
ALTER TABLE `keluaran`
  ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `kode_pembebanan`
--
ALTER TABLE `kode_pembebanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Kode` (`kode`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIP` (`nip`);

--
-- Indexes for table `pengikut`
--
ALTER TABLE `pengikut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `permenkeu`
--
ALTER TABLE `permenkeu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Diklat` (`Diklat`),
  ADD KEY `Harian_Normal` (`Harian_Normal`),
  ADD KEY `Harian_Fullday` (`Harian_Fullday`),
  ADD KEY `Fullboard_Dalam` (`Fullboard_Dalam`),
  ADD KEY `Fullboard_Luar` (`Fullboard_Luar`);

--
-- Indexes for table `spd`
--
ALTER TABLE `spd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluaran` (`keluaran`),
  ADD KEY `komponen` (`komponen`),
  ADD KEY `sub` (`sub`);

--
-- Indexes for table `subkomponen`
--
ALTER TABLE `subkomponen`
  ADD PRIMARY KEY (`Kode`,`Kode_Komponen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;
--
-- AUTO_INCREMENT for table `kode_pembebanan`
--
ALTER TABLE `kode_pembebanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `pengikut`
--
ALTER TABLE `pengikut`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `permenkeu`
--
ALTER TABLE `permenkeu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `spd`
--
ALTER TABLE `spd`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `permenkeu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengikut`
--
ALTER TABLE `pengikut`
  ADD CONSTRAINT `pengikut_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
