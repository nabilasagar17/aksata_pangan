-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
<<<<<<< HEAD:aksata_pangan (2).sql
-- Generation Time: Jul 17, 2023 at 01:20 AM
=======
-- Generation Time: Jul 05, 2023 at 01:13 PM
>>>>>>> 361d3b814366993f6c2d4bc60fa8136a6c7346f4:aksata_pangan.sql
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
-- Table structure for table `preview_barang_keluar`
--

DROP TABLE IF EXISTS `preview_barang_keluar`;
CREATE TABLE IF NOT EXISTS `preview_barang_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_stok_masuk` int(11) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `satuan_barang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preview_barang_masuk`
--

INSERT INTO `preview_barang_masuk` (`id`, `nama`, `kategori`, `berat`, `qty`, `tgl_masuk`, `exp_date`, `sisa_belum_tersebar`, `sisa_disebar`, `status`, `keterangan`, `pengiriman`, `harga`, `created_at`, `created_by`, `updated_at`, `updated_by`, `file_path`, `satuan_barang`) VALUES
(1, 'Pisang', NULL, '5', 20, NULL, '2023-07-31 00:00:00', NULL, NULL, NULL, NULL, 'Diantar ke Organisasi', '120000', '2023-07-15 03:04:25', 'admin@gmail.com', NULL, NULL, NULL, 'Kg'),
(2, 'Pisang', 'makanan', '3', 15, '2023-07-15 00:00:00', '2023-07-26 00:00:00', NULL, NULL, NULL, NULL, 'Diantar ke Organisasi', '150000', '2023-07-15 03:08:06', 'admin@gmail.com', NULL, NULL, NULL, 'Kg');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `alamat`, `telp`, `password`, `role_user`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin@gmail.com', 'Admin\r\n', NULL, NULL, '$2a$12$wgovUAzE5xBqmTGOjWIjQuAerrFbe3M/TC40hcpwiEHfXP65B9I.q', 'admin', 1, '2023-06-27 21:42:09', 'System', NULL, NULL),
(2, 'sania@gmail.com', 'Sania', NULL, '081256789876', '$2y$10$ln9Du2jzLaGqr7xYERjb7.RwIE9tHXZAb5y7waQ0GJhWYmSb5G/xm', 'volunteer', 1, '2023-07-15 05:44:51', '1', NULL, NULL);

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
,`qty` decimal(10,0)
,`qty_sisa` decimal(10,0)
,`keperluan` varchar(30)
,`tgl_masuk` datetime
,`pengiriman` varchar(100)
,`nama_penerima` varchar(150)
,`alamat_penerima` varchar(200)
,`selesai` tinyint(1)
,`keterangan` varchar(200)
,`created_at` datetime
,`created_by` varchar(100)
,`updated_at` datetime
,`updated_by` varchar(100)
,`path_ttd` varchar(150)
,`path_gambar` varchar(150)
,`nama` varchar(150)
,`exp_date` datetime
,`kategori` varchar(50)
,`nama_volunteer` varchar(150)
,`no_telp_volunteer` varchar(15)
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
,`nama` varchar(150)
,`exp_date` datetime
,`kategori` varchar(50)
,`nama_volunteer` varchar(150)
,`no_telp_volunteer` varchar(15)
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
<<<<<<< HEAD:aksata_pangan (2).sql
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `nama`, `batch`, `email`, `password`, `alamat`, `no_telp`, `is_active`, `tgl_gabung`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Sania', 1, 'sania@gmail.com', NULL, NULL, '081256789876', NULL, '2023-07-15 05:44:51', '2023-07-15 05:44:51', '1', NULL, NULL);
=======
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
>>>>>>> 361d3b814366993f6c2d4bc60fa8136a6c7346f4:aksata_pangan.sql

-- --------------------------------------------------------

--
-- Structure for view `view_stok_keluar`
--
DROP TABLE IF EXISTS `view_stok_keluar`;

DROP VIEW IF EXISTS `view_stok_keluar`;
<<<<<<< HEAD:aksata_pangan (2).sql
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_keluar`  AS  select `stok_keluar`.`id` AS `id`,`stok_keluar`.`id_volunteer` AS `id_volunteer`,`stok_keluar`.`id_stok_masuk` AS `id_stok_masuk`,`stok_keluar`.`qty` AS `qty`,`stok_keluar`.`qty_sisa` AS `qty_sisa`,`stok_keluar`.`keperluan` AS `keperluan`,`stok_keluar`.`tgl_masuk` AS `tgl_masuk`,`stok_keluar`.`pengiriman` AS `pengiriman`,`stok_keluar`.`nama_penerima` AS `nama_penerima`,`stok_keluar`.`alamat_penerima` AS `alamat_penerima`,`stok_keluar`.`selesai` AS `selesai`,`stok_keluar`.`keterangan` AS `keterangan`,`stok_keluar`.`created_at` AS `created_at`,`stok_keluar`.`created_by` AS `created_by`,`stok_keluar`.`updated_at` AS `updated_at`,`stok_keluar`.`updated_by` AS `updated_by`,`stok_keluar`.`path_ttd` AS `path_ttd`,`stok_keluar`.`path_gambar` AS `path_gambar`,`stok_masuk`.`nama` AS `nama`,`stok_masuk`.`exp_date` AS `exp_date`,`stok_masuk`.`kategori` AS `kategori`,`volunteer`.`nama` AS `nama_volunteer`,`volunteer`.`no_telp` AS `no_telp_volunteer` from ((`stok_keluar` join `stok_masuk` on((`stok_masuk`.`id` = `stok_keluar`.`id_stok_masuk`))) join `volunteer` on((`volunteer`.`id` = `stok_keluar`.`id_volunteer`))) ;
=======
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_keluar`  AS  select `stok_keluar`.`id` AS `id`,`stok_keluar`.`id_volunteer` AS `id_volunteer`,`stok_keluar`.`id_stok_masuk` AS `id_stok_masuk`,`stok_keluar`.`qty` AS `qty`,`stok_keluar`.`qty_sisa` AS `qty_sisa`,`stok_keluar`.`keperluan` AS `keperluan`,`stok_keluar`.`tgl_masuk` AS `tgl_masuk`,`stok_keluar`.`pengiriman` AS `pengiriman`,`stok_keluar`.`selesai` AS `selesai`,`stok_keluar`.`keterangan` AS `keterangan`,`stok_keluar`.`created_at` AS `created_at`,`stok_keluar`.`created_by` AS `created_by`,`stok_keluar`.`updated_at` AS `updated_at`,`stok_keluar`.`updated_by` AS `updated_by`,`stok_keluar`.`path_ttd` AS `path_ttd`,`stok_keluar`.`path_gambar` AS `path_gambar`,`stok_masuk`.`nama` AS `nama`,`stok_masuk`.`exp_date` AS `exp_date`,`stok_masuk`.`kategori` AS `kategori`,`volunteer`.`nama` AS `nama_volunteer`,`volunteer`.`no_telp` AS `no_telp_volunteer` from ((`stok_keluar` join `stok_masuk` on((`stok_masuk`.`id` = `stok_keluar`.`id_stok_masuk`))) join `volunteer` on((`volunteer`.`id` = `stok_keluar`.`id_volunteer`))) ;
>>>>>>> 361d3b814366993f6c2d4bc60fa8136a6c7346f4:aksata_pangan.sql
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
