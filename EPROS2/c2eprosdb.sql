-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2017 at 08:03 AM
-- Server version: 10.0.28-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c2eprosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `idacara` int(11) NOT NULL,
  `acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE `aktifitas` (
  `id` int(11) NOT NULL,
  `kepada` text NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `idchat` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`idchat`, `dari`, `kepada`, `pesan`, `tanggal`, `status`) VALUES
(7, 'shiro', 'admin', 'shiro Megirim proposal kepada SemenGresikdengan link proposal dibawah ini \n\n                <a href=\'cdo.ionsmart.co/bismillahepros/data/proposal/22de6054bb4abd475be922bc3f013d78.pdf\'>Disini</a>', '2017-01-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jangka_waktu`
--

CREATE TABLE `jangka_waktu` (
  `idjangka` int(11) NOT NULL,
  `jangka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `idjasa` int(11) NOT NULL,
  `jasa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `idkomunitas` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`idkomunitas`, `iduser`, `nama`, `phone`, `alamat`, `tanggal`, `cabang`, `gambar`, `latitude`, `longitude`) VALUES
(1, 44, 'Ultah Himit', '121241951', 'pens', '2017-01-02', 'Pens', 'data/foto/noimage.png', '42141411', '-1231211');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `idlevel` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`idlevel`, `level`) VALUES
(1, 'Perusahaan'),
(2, 'Komunitas'),
(3, 'Instansi');

-- --------------------------------------------------------

--
-- Table structure for table `menerima`
--

CREATE TABLE `menerima` (
  `idmenerima` int(11) NOT NULL,
  `menerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1483388475),
('m130524_201442_init', 1483388478);

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `idpersyaratan` int(11) NOT NULL,
  `persyaratan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idperusahaan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `iduser` varchar(50) NOT NULL,
  `acara` text NOT NULL,
  `menerima` text NOT NULL,
  `jangka_waktu` text NOT NULL,
  `timbal_balik` text NOT NULL,
  `sponsor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`idperusahaan`, `nama`, `phone`, `alamat`, `tanggal`, `cabang`, `gambar`, `latitude`, `longitude`, `iduser`, `acara`, `menerima`, `jangka_waktu`, `timbal_balik`, `sponsor`) VALUES
(1, 'tampan dan berani', '978278372', 'jalan tampan kota berani', '2016-08-09', 'berani', 'data/foto/noimage.png', '-6.912889', '107.609787', '43', '0', '0', '0', '0', '0'),
(11, 'kdkdans', '28749652', 'djdkdjakdks', '0000-00-00', 'pens', 'data/foto/noimage.png', '-7.276597999999999', '112.79384139999999', '57', 'sizkajddja', 'ndjannd', 'jzjannd', 'jzjambd', 'jzkanbd'),
(13, 'pens', '855588554', 'jln manja', '0000-00-00', 'jkt', 'data/foto/noimage.png', '-7.2767636', '112.7949036', '59', 'gagal', 'bRu', 'dekat', 'boleh', 'terbaik'),
(14, 'rems', '909887655', 'wonosari wetan baru 11 no. 6', '0000-00-00', 'hhhh', 'data/foto/noimage.png', '-7.258471799999998', '112.77232479999999', '60', 'gggg', 'rr', '33', 'branding', 'banner'),
(15, 'PT Jau', '08973198766', 'Surabaya', '0000-00-00', 'Gresik', 'data/foto/noimage.png', '-7.276451000000001', '112.79496350000001', '61', 'Formal', 'SMA', '9 bulan', 'Banner', 'Pamflet'),
(16, 'Indo Runner', '1234567890', 'Gresik', '0000-00-00', 'Sidoarjo', 'data/foto/noimage.png', '-7.276367499999999', '112.79462890624998', '63', 'Semen Gresik', 'Kampus', '9 bulan', 'Branding', 'Banner'),
(17, 'Shiro', '2341567890', 'Bojonegoro', '0000-00-00', 'Jakarta', 'data/foto/noimage.png', '-7.2776924999999935', '112.79133203125005', '64', 'Kuliah', 'SMA', '9 bulan', 'Branding', 'Banner');

-- --------------------------------------------------------

--
-- Table structure for table `pesanadmin`
--

CREATE TABLE `pesanadmin` (
  `id` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `idproposal` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `ke` varchar(50) NOT NULL,
  `file` text NOT NULL,
  `k_pengirim` text NOT NULL,
  `k_admin` text NOT NULL,
  `level` varchar(2) NOT NULL,
  `status` varchar(2) NOT NULL,
  `namaacara` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`idproposal`, `dari`, `ke`, `file`, `k_pengirim`, `k_admin`, `level`, `status`, `namaacara`, `date`) VALUES
(11, 'shiro', 'SemenGresik', '22de6054bb4abd475be922bc3f013d78.pdf', 'ini bagus', '', '0', '0', '', '2017-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `teman`
--

CREATE TABLE `teman` (
  `idteman` int(11) NOT NULL,
  `ini` varchar(50) NOT NULL,
  `denganini` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timbal_balik`
--

CREATE TABLE `timbal_balik` (
  `idtimbal` int(11) NOT NULL,
  `timbal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `idtimeline` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `like` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `idtips` int(11) NOT NULL,
  `tips` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trick`
--

CREATE TABLE `trick` (
  `idtrick` int(11) NOT NULL,
  `trick` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'username', 'zZrJ51g3ZYPzsOuzgCVm1dF0NGDBaPVF', '$2y$13$.cePxYodj3ABz1wqeLUtgONgREI5f0dfwPtoSP2J0MYpOFAazoerO', NULL, 'ishom123@gmail.com', 10, 1483390630, 1483390630),
(2, 'ishom123', 'E1jijx3B_r9eKBg8QMGHl5y71YUDPNTf', '$2y$13$mmDUlZT2E6nt7jEJ4fAXdO2FDi2bG7bZ1JwS7fEPqHIT.Wb3qGrhu', NULL, 'mishomudien00@gmail.com', 10, 1483391451, 1483391451),
(3, 'test123', 'aATMhnDDxAmLNiupEydJhXd8s3E-hkEI', '$2y$13$cnxt0L1Us2xWOh.DDFsP0ePMc1lR2LmOUokTmp3JdCsm6GsVjy1ba', NULL, 'test123@gmail.com', 10, 1483689667, 1483689667),
(4, 'irena@gmail.com', 'r1F-RxFCLfgXqVL4nchA68_jgnARHqzi', '$2y$13$8gD6JrCadQPQb.37ER.Rier9gXh5DhgR5FxnWUGiIlqElycrgjfS6', NULL, 'irena61@gmail.com', 10, 1483842428, 1483842428);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `authKey` varchar(7) NOT NULL,
  `level` enum('perusahaan','komunitas','instansi','') NOT NULL,
  `vemail` varchar(1) NOT NULL,
  `vsms` varchar(1) NOT NULL,
  `vbukti` varchar(1) NOT NULL,
  `vupdate` varchar(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `authKey`, `level`, `vemail`, `vsms`, `vbukti`, `vupdate`, `tanggal`) VALUES
(62, 'Indorunner', 'indorunner@gmail.com', 'e444b8f80fca1a36d9242515c88b5843', '864143', 'perusahaan', '0', '0', '0', '0', '2017-01-15'),
(63, 'SemenGresik', 'semengresik@gmail.com', '31ad0be6fe4568f1e44d3b17d10748f9', '433893', 'perusahaan', '0', '0', '0', '0', '2017-01-15'),
(64, 'shiro', 'shiro@gmail.com', '90dbb0e5a71c9ab1ad087bbbd989a219', '687995', 'perusahaan', '0', '0', '0', '0', '2017-01-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`idacara`);

--
-- Indexes for table `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`);

--
-- Indexes for table `jangka_waktu`
--
ALTER TABLE `jangka_waktu`
  ADD PRIMARY KEY (`idjangka`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`idjasa`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`idkomunitas`),
  ADD UNIQUE KEY `iduser` (`iduser`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indexes for table `menerima`
--
ALTER TABLE `menerima`
  ADD PRIMARY KEY (`idmenerima`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`idpersyaratan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idperusahaan`),
  ADD UNIQUE KEY `iduser` (`iduser`);

--
-- Indexes for table `pesanadmin`
--
ALTER TABLE `pesanadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`idproposal`);

--
-- Indexes for table `teman`
--
ALTER TABLE `teman`
  ADD PRIMARY KEY (`idteman`);

--
-- Indexes for table `timbal_balik`
--
ALTER TABLE `timbal_balik`
  ADD PRIMARY KEY (`idtimbal`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`idtimeline`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`idtips`);

--
-- Indexes for table `trick`
--
ALTER TABLE `trick`
  ADD PRIMARY KEY (`idtrick`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `authKey` (`authKey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `idacara` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jangka_waktu`
--
ALTER TABLE `jangka_waktu`
  MODIFY `idjangka` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `idjasa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `idkomunitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `idlevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menerima`
--
ALTER TABLE `menerima`
  MODIFY `idmenerima` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `idpersyaratan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idperusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pesanadmin`
--
ALTER TABLE `pesanadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `idproposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `teman`
--
ALTER TABLE `teman`
  MODIFY `idteman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timbal_balik`
--
ALTER TABLE `timbal_balik`
  MODIFY `idtimbal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `idtimeline` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `idtips` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trick`
--
ALTER TABLE `trick`
  MODIFY `idtrick` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
