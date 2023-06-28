-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2023 at 05:07 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aksata_pangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemberi`
--

DROP TABLE IF EXISTS `pemberi`;
CREATE TABLE IF NOT EXISTS `pemberi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

DROP TABLE IF EXISTS `penerima`;
CREATE TABLE IF NOT EXISTS `penerima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

DROP TABLE IF EXISTS `stok_keluar`;
CREATE TABLE IF NOT EXISTS `stok_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penerima` int(11) DEFAULT NULL,
  `id_volunteer` int(11) DEFAULT NULL,
  `id_stok_masuk` int(11) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `qty_sisa` decimal(10,0) DEFAULT NULL,
  `keperluan` varchar(30) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `pengiriman` varchar(100) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `path_ttd` varchar(150) DEFAULT NULL,
  `path_gambar` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

DROP TABLE IF EXISTS `stok_masuk`;
CREATE TABLE IF NOT EXISTS `stok_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemberi` int(11) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `berat` decimal(10,0) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  `sisa_belum_tersebar` decimal(10,0) DEFAULT NULL,
  `sisa_disebar` decimal(10,0) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `pengiriman` varchar(100) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `file_path` varchar(150) DEFAULT NULL,
  `satuan_barang` varchar(30) DEFAULT NULL,
  `path_ttd_pemberi` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role_user` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `alamat`, `telp`, `password`, `role_user`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin@gmail.com', 'Admin\r\n', NULL, NULL, '$2a$12$wgovUAzE5xBqmTGOjWIjQuAerrFbe3M/TC40hcpwiEHfXP65B9I.q', 'admin', 1, '2023-06-27 21:42:09', 'System', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE IF NOT EXISTS `volunteer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `tgl_gabung` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
