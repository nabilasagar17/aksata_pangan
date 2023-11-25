-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2023 at 09:14 PM
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
-- Table structure for table `detail_dana_masuk`
--

DROP TABLE IF EXISTS `detail_dana_masuk`;
CREATE TABLE IF NOT EXISTS `detail_dana_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_stok_masuk` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `pengiriman` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `file_path` varchar(150) DEFAULT NULL,
  `nama_pemberi` varchar(100) DEFAULT NULL,
  `no_telp_pemberi` varchar(15) DEFAULT NULL,
  `keterangan_pemberi` text,
  `path_ttd_pemberi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_dana_masuk`
--

INSERT INTO `detail_dana_masuk` (`id`, `id_stok_masuk`, `nama`, `qty`, `tgl_masuk`, `status`, `keterangan`, `pengiriman`, `created_at`, `created_by`, `updated_at`, `updated_by`, `file_path`, `nama_pemberi`, `no_telp_pemberi`, `keterangan_pemberi`, `path_ttd_pemberi`) VALUES
(17, 1, NULL, '500000', '2023-08-13 18:25:35', NULL, NULL, 'Transfer', '2023-08-13 18:25:42', '1', NULL, NULL, NULL, 'AUDREY FAUSTINA', '081254456789', NULL, NULL),
(18, 1, NULL, '600000', '2023-08-13 18:27:03', NULL, NULL, 'Transfer', '2023-08-13 18:27:10', '1', NULL, NULL, NULL, 'PANJI SAPQURRAHMAN, SE', '081234567890', NULL, NULL);

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
-- Table structure for table `preview_barang_keluar`
--

DROP TABLE IF EXISTS `preview_barang_keluar`;
CREATE TABLE IF NOT EXISTS `preview_barang_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_stok_masuk` int(11) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `qty_sisa` decimal(10,0) DEFAULT NULL,
  `keperluan` varchar(30) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `pengiriman` varchar(100) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT NULL,
  `keterangan` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preview_barang_masuk`
--

DROP TABLE IF EXISTS `preview_barang_masuk`;
CREATE TABLE IF NOT EXISTS `preview_barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `berat` decimal(10,0) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  `sisa_belum_tersebar` decimal(10,0) DEFAULT NULL,
  `sisa_disebar` decimal(10,0) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `pengiriman` varchar(50) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `satuan_barang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preview_barang_masuk`
--

INSERT INTO `preview_barang_masuk` (`id`, `nama`, `kategori`, `berat`, `qty`, `tgl_masuk`, `exp_date`, `sisa_belum_tersebar`, `sisa_disebar`, `status`, `keterangan`, `pengiriman`, `harga`, `total`, `created_at`, `created_by`, `updated_at`, `updated_by`, `file_path`, `satuan_barang`) VALUES
(49, NULL, NULL, NULL, 50000, '2023-08-17 19:37:23', NULL, NULL, NULL, NULL, 'iya', 'Diantar ke Organisasi', '50000', '50000', '2023-08-17 19:37:23', '1', '2023-08-17 19:47:36', '1', NULL, 'Rupiah');

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

DROP TABLE IF EXISTS `stok_keluar`;
CREATE TABLE IF NOT EXISTS `stok_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_volunteer` int(11) DEFAULT NULL,
  `id_stok_masuk` int(11) DEFAULT NULL,
  `nama_penerima` varchar(150) DEFAULT NULL,
  `alamat_penerima` varchar(200) DEFAULT NULL,
  `no_telp_penerima` varchar(15) DEFAULT NULL,
  `code_history` varchar(250) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `qty_sisa` decimal(10,0) DEFAULT NULL,
  `keperluan` varchar(30) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `pengiriman` varchar(100) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `tgl_dibagikan` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `path_ttd` varchar(150) DEFAULT NULL,
  `path_gambar` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_keluar`
--

INSERT INTO `stok_keluar` (`id`, `id_volunteer`, `id_stok_masuk`, `nama_penerima`, `alamat_penerima`, `no_telp_penerima`, `code_history`, `qty`, `total`, `qty_sisa`, `keperluan`, `tgl_masuk`, `pengiriman`, `selesai`, `keterangan`, `tgl_dibagikan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `path_ttd`, `path_gambar`) VALUES
(31, NULL, 21, 'AUDREY FAUSTINA', NULL, '081254456789', 'iJhAgiz6YYXugn3b', '2', '10000', NULL, 'Pembagian Pangan', NULL, NULL, 0, NULL, NULL, '2023-09-20 09:32:43', '1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

DROP TABLE IF EXISTS `stok_masuk`;
CREATE TABLE IF NOT EXISTS `stok_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `nama_pemberi` varchar(150) DEFAULT NULL,
  `email_pemberi` varchar(100) DEFAULT NULL,
  `no_telp_pemberi` varchar(15) DEFAULT NULL,
  `alamat_pemberi` varchar(150) DEFAULT NULL,
  `keterangan_pemberi` varchar(30) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `berat` decimal(10,0) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  `qty_masuk` decimal(10,0) DEFAULT NULL,
  `sisa_disebar` decimal(10,0) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `pengiriman` varchar(100) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `file_path` varchar(150) DEFAULT NULL,
  `satuan_barang` varchar(30) DEFAULT NULL,
  `path_ttd_pemberi` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id`, `nama`, `nama_pemberi`, `email_pemberi`, `no_telp_pemberi`, `alamat_pemberi`, `keterangan_pemberi`, `kategori`, `berat`, `qty`, `tgl_masuk`, `exp_date`, `qty_masuk`, `sisa_disebar`, `status`, `keterangan`, `pengiriman`, `harga`, `total`, `created_at`, `created_by`, `updated_at`, `updated_by`, `file_path`, `satuan_barang`, `path_ttd_pemberi`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'dana', NULL, '1100000', NULL, NULL, NULL, '600000', NULL, NULL, NULL, '850000', '850000', '2023-07-22 08:47:16', 'System', '2023-08-15 12:08:44', '1', NULL, NULL, NULL),
(22, 'Daging', 'Rani', NULL, '0812542321', NULL, NULL, 'makanan', NULL, '3', '2023-08-17 18:54:25', '2023-08-22 00:00:00', '3', '0', NULL, 'Ini', 'Diantar ke Organisasi', '60000', '180000', '2023-08-17 19:26:51', '1', NULL, NULL, '75qc7bm11to2aKyj.png', 'Kg', '64de120b20d3e.png'),
(20, 'Susu Coklat', 'AUDREY FAUSTINA', NULL, '081254456789', NULL, NULL, 'makanan', NULL, '20', '2023-08-01 09:03:22', '2023-09-09 00:00:00', '20', '0', NULL, NULL, 'Diantar ke Organisasi', '50000', '1000000', '2023-08-01 09:03:38', '1', '2023-08-15 12:15:43', '4', '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.jpg', 'Kotak', '64c867fa842f5.png'),
(21, 'Donat', 'Rani', NULL, '0812542321', NULL, NULL, 'makanan', NULL, '18', '2023-08-17 13:07:00', '2023-08-19 00:00:00', '20', '2', NULL, NULL, 'Diantar ke Organisasi', '5000', '100000', '2023-08-17 19:26:51', '1', '2023-09-20 09:32:43', '1', '75qc7bm11to2aKyj.png', 'Kotak', '64de120b20d3e.png');

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
  `batch` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `alamat`, `telp`, `password`, `role_user`, `batch`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `keterangan`) VALUES
(1, 'admin@gmail.com', 'Admin\r\n', NULL, NULL, '$2a$12$wgovUAzE5xBqmTGOjWIjQuAerrFbe3M/TC40hcpwiEHfXP65B9I.q', 'admin', NULL, 1, '2023-06-27 21:42:09', 'System', NULL, NULL, NULL),
(4, 'anggi@gmail.com', 'Anggi', 'Medan', '081234567890', '$2y$10$nKjpX.uYT/XDLYPXbtyUD.g5M9QiuvJksVkYg9mecdcrTsFCxkyGS', 'volunteer', NULL, 1, '2023-07-22 14:58:38', '1', '2023-08-15 11:38:21', '1', NULL),
(7, 'gea@gmail.com', 'gea', 'Medan', '98678987', '$2y$10$mrSV6cg3tW38QylPiBTUIOLyHugZM2noofWzdhYZ6MvDG1aFIKc/m', 'volunteer', '3', 1, '2023-08-17 19:34:27', '1', NULL, NULL, NULL),
(6, 'rindi@gmail.com', 'Rindi', 'Medan', '0987656789', '$2y$10$WphivBH2W6iFpIUXFP2XD.LkmJgFajqk4CmB9bVkbjVR1eL3.9h7K', 'volunteer', '1', 1, '2023-08-17 19:33:25', '1', '2023-08-17 19:34:35', '1', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_preview_barang_keluar`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_preview_barang_keluar`;
CREATE TABLE IF NOT EXISTS `view_preview_barang_keluar` (
`id` int(11)
,`id_stok_masuk` int(11)
,`qty` decimal(10,0)
,`qty_sisa` decimal(10,0)
,`keperluan` varchar(30)
,`tgl_masuk` datetime
,`pengiriman` varchar(100)
,`selesai` tinyint(1)
,`keterangan` text
,`created_at` datetime
,`created_by` varchar(100)
,`updated_at` datetime
,`updated_by` varchar(100)
,`nama` varchar(150)
,`nama_pemberi` varchar(150)
,`no_telp_pemberi` varchar(15)
,`exp_date` datetime
,`total` decimal(10,0)
,`harga` decimal(10,0)
,`satuan_barang` varchar(30)
,`kategori` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_keluar`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_stok_keluar`;
CREATE TABLE IF NOT EXISTS `view_stok_keluar` (
`id` int(11)
,`id_volunteer` int(11)
,`id_stok_masuk` int(11)
,`nama_penerima` varchar(150)
,`alamat_penerima` varchar(200)
,`total` decimal(10,0)
,`no_telp_penerima` varchar(15)
,`code_history` varchar(250)
,`qty` decimal(10,0)
,`qty_sisa` decimal(10,0)
,`keperluan` varchar(30)
,`tgl_masuk` datetime
,`pengiriman` varchar(100)
,`selesai` tinyint(1)
,`keterangan` varchar(200)
,`created_at` datetime
,`created_by` varchar(100)
,`updated_at` datetime
,`updated_by` varchar(100)
,`path_ttd` varchar(150)
,`path_gambar` varchar(150)
,`nama_volunteer` varchar(150)
,`batch` varchar(10)
,`email` varchar(150)
,`nama` varchar(150)
,`exp_date` datetime
,`harga` decimal(10,0)
,`kategori` varchar(50)
,`tgl_masuk_barang` datetime
,`satuan_barang` varchar(30)
);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `nama`, `batch`, `email`, `password`, `alamat`, `no_telp`, `is_active`, `tgl_gabung`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, 'gea', 3, 'gea@gmail.com', NULL, 'Medan', '98678987', 1, '2023-08-17 19:34:27', '2023-08-17 19:34:27', '1', NULL, NULL),
(4, 'Rindi', 2, 'rindi@gmail.com', NULL, 'Medan', '0987656789', 1, '2023-08-17 19:33:24', '2023-08-17 19:33:24', '1', '2023-08-17 19:34:35', '1');

-- --------------------------------------------------------

--
-- Structure for view `view_preview_barang_keluar`
--
DROP TABLE IF EXISTS `view_preview_barang_keluar`;

DROP VIEW IF EXISTS `view_preview_barang_keluar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_preview_barang_keluar`  AS  select `preview_barang_keluar`.`id` AS `id`,`preview_barang_keluar`.`id_stok_masuk` AS `id_stok_masuk`,`preview_barang_keluar`.`qty` AS `qty`,`preview_barang_keluar`.`qty_sisa` AS `qty_sisa`,`preview_barang_keluar`.`keperluan` AS `keperluan`,`preview_barang_keluar`.`tgl_masuk` AS `tgl_masuk`,`preview_barang_keluar`.`pengiriman` AS `pengiriman`,`preview_barang_keluar`.`selesai` AS `selesai`,`preview_barang_keluar`.`keterangan` AS `keterangan`,`preview_barang_keluar`.`created_at` AS `created_at`,`preview_barang_keluar`.`created_by` AS `created_by`,`preview_barang_keluar`.`updated_at` AS `updated_at`,`preview_barang_keluar`.`updated_by` AS `updated_by`,`stok_masuk`.`nama` AS `nama`,`stok_masuk`.`nama_pemberi` AS `nama_pemberi`,`stok_masuk`.`no_telp_pemberi` AS `no_telp_pemberi`,`stok_masuk`.`exp_date` AS `exp_date`,`preview_barang_keluar`.`total` AS `total`,`stok_masuk`.`harga` AS `harga`,`stok_masuk`.`satuan_barang` AS `satuan_barang`,`stok_masuk`.`kategori` AS `kategori` from (`preview_barang_keluar` join `stok_masuk` on((`preview_barang_keluar`.`id_stok_masuk` = `stok_masuk`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_keluar`
--
DROP TABLE IF EXISTS `view_stok_keluar`;

DROP VIEW IF EXISTS `view_stok_keluar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_keluar`  AS  select `stok_keluar`.`id` AS `id`,`stok_keluar`.`id_volunteer` AS `id_volunteer`,`stok_keluar`.`id_stok_masuk` AS `id_stok_masuk`,`stok_keluar`.`nama_penerima` AS `nama_penerima`,`stok_keluar`.`alamat_penerima` AS `alamat_penerima`,`stok_keluar`.`total` AS `total`,`stok_keluar`.`no_telp_penerima` AS `no_telp_penerima`,`stok_keluar`.`code_history` AS `code_history`,`stok_keluar`.`qty` AS `qty`,`stok_keluar`.`qty_sisa` AS `qty_sisa`,`stok_keluar`.`keperluan` AS `keperluan`,`stok_keluar`.`tgl_masuk` AS `tgl_masuk`,`stok_keluar`.`pengiriman` AS `pengiriman`,`stok_keluar`.`selesai` AS `selesai`,`stok_keluar`.`keterangan` AS `keterangan`,`stok_keluar`.`created_at` AS `created_at`,`stok_keluar`.`created_by` AS `created_by`,`stok_keluar`.`updated_at` AS `updated_at`,`stok_keluar`.`updated_by` AS `updated_by`,`stok_keluar`.`path_ttd` AS `path_ttd`,`stok_keluar`.`path_gambar` AS `path_gambar`,`users`.`nama` AS `nama_volunteer`,`users`.`batch` AS `batch`,`users`.`email` AS `email`,`stok_masuk`.`nama` AS `nama`,`stok_masuk`.`exp_date` AS `exp_date`,`stok_masuk`.`harga` AS `harga`,`stok_masuk`.`kategori` AS `kategori`,`stok_masuk`.`tgl_masuk` AS `tgl_masuk_barang`,`stok_masuk`.`satuan_barang` AS `satuan_barang` from ((`stok_keluar` left join `users` on((`users`.`id` = `stok_keluar`.`updated_by`))) left join `stok_masuk` on((`stok_masuk`.`id` = `stok_keluar`.`id_stok_masuk`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
