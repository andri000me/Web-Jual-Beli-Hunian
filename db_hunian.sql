-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2016 at 10:44 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hunian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` enum('operator','administrator') NOT NULL DEFAULT 'operator',
  `is_blokir` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `nama`, `level`, `is_blokir`, `created_at`, `updated_at`) VALUES
(2, 'rss', '54b53072540eeeb8f8e9343e71f28176', 'rosa', 'administrator', '0', '0000-00-00 00:00:00', '2016-05-25 11:40:49'),
(17, 'ocha', '81793dfa61181895c741ecd64f752bf9', 'rosa', 'operator', '0', '2016-03-18 20:51:54', '2016-03-18 20:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumen`
--

CREATE TABLE IF NOT EXISTS `tb_konsumen` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `username` char(8) NOT NULL,
  `password` char(8) NOT NULL,
  `ktp` char(16) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `nama_panggilan` varchar(32) NOT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `agama` enum('0','1','2','3','4','5','6') DEFAULT NULL COMMENT '0=lainnya; 1=islam; 2=katolik; 3=protestan; 4=hindu; 5=budha; 6=Konghucu',
  `tempat_lahir` varchar(32) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `tmp_alamat` varchar(255) DEFAULT NULL,
  `tmp_telepon` varchar(16) DEFAULT NULL,
  `status_pendaftaran` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=mengundurkan diri; 1=aktif',
  `status_verifikasi` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum lunas; 1=sudah lunas',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tanggal_pesan` varchar(10) DEFAULT NULL,
  `status_biodata` enum('0','1') NOT NULL DEFAULT '0',
  `norek` varchar(32) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nisn` (`ktp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id`, `email`, `username`, `password`, `ktp`, `nama`, `nama_panggilan`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `tmp_alamat`, `tmp_telepon`, `status_pendaftaran`, `status_verifikasi`, `created_at`, `updated_at`, `tanggal_pesan`, `status_biodata`, `norek`, `jumlah`) VALUES
(1, 'awan@localhost', 'YyCKqlNv', 'SFwaWqpe', '1234567891', 'Awan Pribadi Basuki Adi', 'awan', 'L', '1', 'Pasirian', '1986-06-10', 'Jalan Raya Pasirian Gg. Dwikora No. 23\r\nPasirian, 67372', '0334-571174', '1', '1', '2014-12-01 15:30:17', '2016-03-30 20:34:23', NULL, '0', '', NULL),
(9, 'rizalsobar@rocketmail.com', 'epI3cxZI', 'VjABLmSv', '32160111940007', 'Rizal Sobar', 'rizal', 'L', '1', 'German', '1994-01-11', 'Muenchen', '334251780292', '1', '1', '2016-03-18 19:42:28', '2016-05-25 08:44:11', '0000-00-00', '1', 'Rini', '2'),
(10, 'asdf@gmail.com', 'PxqN8rK7', 'fkMmgGxF', '12345678901234', 'Rian', 'iyan', 'L', '1', 'Jakarta', '1995-05-16', 'Jl.Perjuangan No. 58 Tebet', '123456', '1', '1', '2016-03-27 21:08:45', '2016-03-29 01:06:02', NULL, '0', '', NULL),
(11, 'rinirosa@gmail.com', 'AduF21ju', 'AfGb4VyY', '08190686674408', 'rossa rizal', 'ocha', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '2016-03-31 15:15:23', '2016-03-31 15:15:23', NULL, '0', '', NULL),
(12, 'swerty@gmail.com', 'jDnuBci5', '8qt97D7J', '23145673456789', 'Odoy Liliput', 'doy', 'L', '1', 'Bogor', '1999-02-08', 'Bogor', '88776543', '1', '0', '2016-04-07 12:00:34', '2016-04-07 12:07:44', NULL, '0', '', NULL),
(13, 'wersd@gmail.com', 'Ou8XDevx', 'CdzfbKjM', '32131013950006', 'Lisa Samosir', 'ica', 'P', '1', 'Bandung', '1999-01-17', 'Jl.sagitarius 55', '214407', '1', '0', '2016-04-11 15:09:52', '2016-04-11 15:54:44', NULL, '0', '', NULL),
(14, 'rinirosa1310@gmail.com', 'GGUje1Jr', 'WMZQ6e47', '32160853109500', 'Siti Sarah', 'ucon', 'P', '1', 'Bekasi', '2003-03-23', 'Kp. Mariuk, Rt 006/001, Kec. Cikarang Barat, Kab. Bekasi', '567890', '1', '1', '2016-04-13 16:52:41', '2016-04-18 16:11:42', '2016-04-26', '0', '', NULL),
(15, 'asdfhjiou@rocketmail.co.id', 'AZFccR6g', '6mEQAnGL', '3216085310950011', 'Suarez', 'jebrut', 'L', '1', 'Bojong', '1999-06-13', 'Gang Monyet', '321234567', '1', '1', '2016-04-14 16:31:12', '2016-04-18 15:08:56', '0000-00-00', '0', '', NULL),
(16, 'rdcvbn@yahoo.co.id', 'z9Ti1KLh', 'QS1UsAWS', '0987654321234567', 'babon', 'obet', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-18 14:13:30', '2016-04-18 14:13:30', '0000-00-00', '0', '', NULL),
(17, 'qaswers@gmail.com', 'Ew3nS4dU', 'yxJ2MPlX', '6543278901236543', 'lolok', 'drakul', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-19 15:41:09', '2016-04-19 15:41:09', '0000-00-00', '0', '', NULL),
(18, 'chaocha@gmail.com', 'BkbuDAd7', 'DbHx3dI8', '0897654678943213', 'Ochaa', 'caa', 'P', '1', 'Bogor', '1995-10-13', 'Jl. Kp Mariuk Poncol, Cikarang Barat.', '081906866744', '1', '0', '2016-04-19 17:56:28', '2016-04-19 18:12:53', '0000-00-00', '0', '', NULL),
(19, 'solidturingka29@gmail.com', 'lwWmMAXV', 'KUNdaNLP', '1994101788901161', 'Muhammad Rifqi', 'Rifqi', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-26 09:08:52', '2016-04-26 09:08:52', '0000-00-00', '0', '', NULL),
(20, 'solidturingka29@yahoo.com', 'qNKUybyL', 'x14kzn6a', '1994101788904466', 'Muhammad Rifqi', 'Rifqi', 'L', '1', 'Jakarta', '1994-10-17', 'Jl. Radjiman', '08990718488', '1', '0', '2016-04-26 09:09:58', '2016-04-26 09:27:59', '0000-00-00', '0', '', NULL),
(21, 'polkid@gmail.com', 'wNdkIdoi', 'MdkLpL82', '3245632189076543', 'Deriokli', 'der', 'L', '1', 'Surabaya', '2000-05-15', 'Jauh', '234567899', '1', '0', '2016-04-26 09:43:26', '2016-04-26 09:44:27', '0000-00-00', '0', '', NULL),
(22, 'sgfyryry@gmail.com', 'FnbOMf2r', '0yGylHOZ', '9870543216789543', 'Bayu', 'babi', 'L', '1', 'Waere', '2010-01-12', 'Gundar', '342145', '1', '0', '2016-04-26 09:49:46', '2016-04-26 09:50:39', '0000-00-00', '0', '', NULL),
(23, 'edswqhh@gmail.com', 'NqdA0lCC', 'dLGCsR6E', '4321567432456789', 'werfd', 'er', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-26 09:55:21', '2016-04-26 09:55:21', '23-10-2018', '0', '', NULL),
(24, 'gundar@gmail.com', 'MAhVDDNu', 'wusBjtV6', '0838906728021234', 'Mawar', 'maww', 'P', '1', 'Kebumen', '1994-06-05', 'Jl. Hayam Wuruk No 35', '02188331121', '1', '0', '2016-04-26 14:43:53', '2016-04-26 14:45:39', '26-04-2016', '0', '', NULL),
(25, 'pegiharias', '5VvMXi1s', 'a0TBHiv5', '7895432165743289', 'pegy harias tuti', 'egi', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-28 16:15:08', '2016-04-28 16:15:08', '28-04-2016', '0', '', NULL),
(26, 'pegiharias@gmail.com', 'Hofuxjjs', 'eujjsmbJ', '0878798654341087', 'Pegy Harias Tuti', 'egi', 'P', '1', 'Malang', '1993-01-11', 'Jl Gunadram Bekasi Barat', '081382430614', '1', '0', '2016-04-28 16:16:02', '2016-04-28 16:20:03', '28-04-2016', '0', '', NULL),
(27, 'qsaderj@gmail.com', 'rtk4kgQk', 'cuUlXjPW', '2314254637895647', 'swaderru', 'gf', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-30 05:16:25', '2016-04-30 05:16:25', '30-04-2016', '0', '', NULL),
(28, 'rininrossa@gmail.com', 'niBJV9fn', 'dZ0NSSmS', '8999075432785634', 'rossse', 'ross', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-30 05:54:07', '2016-04-30 05:54:07', '30-04-2016', '0', '', NULL),
(29, 'dddd@gmail.com', 'ajhRPmAr', 'g08lTf0e', '3456789076543213', 'gdhjsjfbhsscsafsg', 'ddsg', NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '2016-04-30 06:09:20', '2016-04-30 06:09:20', '10-03-2016', '0', '', NULL),
(30, 'mkloidhdh@gmail.com', '3scEEv8J', 'CAlyfAuT', '0895361432670012', 'Babe', 'ba', 'L', '1', 'Bogor', '2015-12-07', 'Bojong', '345678', '1', '0', '2016-04-30 07:06:08', '2016-04-30 12:13:47', '30-04-2016', '0', '', NULL),
(31, 'rini@gmail.com', 'wufBbueY', 'VA1zBGgm', '0000000999998888', 'Rini Monro', '', 'P', '1', 'Bekasi', '1995-10-10', 'Kp Poncol', '080808090706', '1', '0', '2016-05-02 17:12:20', '2016-05-09 09:11:28', '02-05-2016', '1', 'sobur', NULL),
(32, 'ririzal@gmail.com', 'thv3VPX8', 'xmAwoQqh', '1111122222333334', 'riezaal', '', 'L', '1', 'jombang', '13-06-1995', 'grama puri', '908978675645', '1', '0', '2016-05-02 17:37:04', '2016-05-02 17:37:04', '03-05-1995', '0', '', NULL),
(33, 'grdfe@gmail.com', '6PxwMPVz', 'XsiIJHYK', '5454543625142345', 'sabar ajalah', '', 'L', '1', 'bekasi', '11-06-1990', 'serang', '43234567', '1', '0', '2016-05-02 17:55:42', '2016-05-02 17:55:42', '02-05-2016', '0', '', NULL),
(34, 'qazsw@yahoo.com', 'kbzG4Wrd', 'EzJAjxGM', '3332224132516700', 'Frank Lampard', '', 'L', '1', 'Kuningan', '1989-02-15', 'Jl.city Raya', '21345681', '1', '0', '2016-05-03 19:10:47', '2016-05-03 19:57:12', '04-05-2016', '1', 'setuju', NULL),
(35, 'tini@gmail.com', 'ot0Se2Oe', 'EwGv6s4K', '3456789765432109', 'Tini Salon', '', 'P', '1', 'Kerawang', '1990-02-13', 'Kp Mariuk Poncol', '081365434567', '1', '0', '2016-05-09 17:15:34', '2016-05-09 17:18:26', '09-05-2016', '1', 'rosa', NULL),
(36, 'idung@gmail.com', 'HM6NcFKM', 'PTaK7BBN', '9876564534231234', 'Mimi', '', 'P', '1', 'Magelang', '1990-06-05', 'Gang Monyet', '02177886754', '1', '0', '2016-05-10 15:55:42', '2016-05-10 15:56:50', '10-05-2016', '1', 'mimi', NULL),
(37, 'zaky@gmail.com', '7vipt0Rx', 'nPYPxZ9U', '3334445556667778', 'Ahmad Zaky', '', 'L', '1', 'Solo', '1989-06-09', 'Jl. Pendidikan Raya No. 22', '22145612', '1', '0', '2016-05-22 08:34:40', '2016-06-28 16:28:29', '22-05-2016', '1', 'wawan', '2'),
(38, 'wawan@gmail.com', 'pf3D4GP2', 'dhagVpqq', '1234009988776655', 'Wawan Aja', '', 'L', '1', 'Jogja', '1990-06-10', 'Jl. Kemerdekaan Raya No. 66', '341626517', '1', '0', '2016-05-23 18:08:46', '2016-05-23 18:09:30', '23-05-2016', '1', 'zalu', NULL),
(39, 'sabisabi@gmail.com', 'kR37qzsW', 'fyZK5kh5', '2121213232454576', 'Tora Sudiro', '', 'L', '1', 'Majalengka', '17-11-1980', 'Jl. Veteran No. 102', '080988765', '1', '0', '2016-05-25 11:45:09', '2016-05-25 11:45:09', '25-05-2016', '0', NULL, NULL),
(40, 'ooiya@gmail', 'cjVXBNsW', 'qawIpQsA', '4352435265735467', 'Tora Sudiro', '', 'L', '1', 'Majalengka', '17-11-1980', 'Jl. Veteran No. 102', '080988765', '1', '0', '2016-05-25 11:49:23', '2016-05-25 11:49:23', '25-05-2016', '0', NULL, NULL),
(41, 'looop@gmail.co.id', 'kIgi6Nqg', 'dUxCxZXX', '7685746583656574', 'Engkong', '', 'L', '1', 'Jonggol', '12-06-1990', 'Jl.Irian Papua', '543212355', '1', '0', '2016-05-25 11:52:44', '2016-05-25 11:52:44', '25-05-2016', '0', NULL, NULL),
(42, 'koil@gmail.co.id', 'BEuIDulS', 'yMnuIVeT', '2314235132435476', 'Sabian', '', 'L', '1', 'Tegal', '1990-03-01', 'Jl. Rorojonggrang', '66758330', '1', '1', '2016-05-25 15:25:26', '2016-05-25 15:50:51', '25-05-2016', '1', 'ERi', '3'),
(43, 'ririn@gmail.com', '8FtwFCxW', 'jQkSKQL5', '0852528598741478', 'Ririn Dwi', '', 'P', '1', 'Cakung', '2010-02-09', 'Cakung Bahagia', '081382430614', '1', '0', '2016-06-03 18:47:09', '2016-06-03 18:48:26', '03-06-2016', '1', 'rizal', '3'),
(44, 'kiyah@gmail.com', 'AUFrGHp1', 'zZNA1qQY', '8975412365897458', 'Kiyah Yuhara', '', 'P', '1', 'Jambi', '1994-01-11', 'De Green Tambun', '02133636968', '1', '1', '2016-06-09 10:15:22', '2016-06-09 10:18:23', '09-06-2016', '1', 'kiyah', '1'),
(45, '3db06yuhu@gmail.com', '9bIFzdHM', 'aYeEaH4V', '0813824306147896', 'Mahasiswa', '', 'L', '1', 'Gunadarma', '1994-08-21', 'Cikarang Selatan', '081282430614', '1', '0', '2016-08-17 08:16:52', '2016-08-17 08:21:30', '17-08-2016', '1', 'mahasiswa', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE IF NOT EXISTS `tb_kontak` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `is_dibalas` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=belum dibalas; 1=sudah dibalas',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`id`, `nama`, `email`, `judul`, `isi`, `is_dibalas`, `created_at`, `updated_at`) VALUES
(1, 'awan pribadi basuki', 'awan@gmail.com', 'Tidak Bisa Login', 'Saya tidak bisa login.', '0', '2014-12-09 20:35:17', '2014-12-09 20:35:17'),
(2, 'Awan Pribadi Basuki', 'awan@localhost.com', 'Tidak Bisa Login', 'Saya tidak bisa login, username dan password yang diberikan saya lupa.', '0', '2014-12-10 17:57:24', '2014-12-10 17:57:24'),
(3, 'Awan Pribadi Basuki', 'awan@localhost.com', 'Tidak bisa login', 'Saya tidak bisa login, bagaimana ya?', '0', '2014-12-15 23:34:33', '2014-12-15 23:34:33'),
(4, 'rini', 'awertyj@gmail.com', 'gak bisa login', 'asdfghjkfghjk', '0', '2016-04-18 14:34:28', '2016-04-18 14:34:28'),
(5, 'zaky', 'zaky@gmail.com', 'Saya Ingin pesan kamar lagi', 'ingin pesan 2 kamar lagi, apakah bisa ?', '0', '2016-05-22 08:47:29', '2016-05-22 08:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE IF NOT EXISTS `tb_pengumuman` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(64) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id`, `judul`, `slug`, `isi`, `created_at`, `updated_at`) VALUES
(14, 'Kawasan MM210', 'kawasan-mm210', '<p>Terdapat Banyak lowongan pekerjaan pada kawasan mm2100, hal ini disebabkan banyak investor dari negara asing yang membuka cabang perusahaan di indonesia.</p>', '2016-05-25 11:18:12', '2016-05-25 11:18:12'),
(11, 'Cara Update Data', 'cara-update-data', '<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>\r\n<p>Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini. Bagi anda yang belum tahu cara mengupdate data, maka ikuti langkah berikut ini.</p>', '2014-12-08 17:26:16', '2014-12-08 17:26:16'),
(12, 'Menghapus Pengumuman Yang Sudah Kadaluarsa', 'menghapus-pengumuman-yang-sudah-kadaluarsa', '<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>\r\n<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>\r\n<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>\r\n<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>\r\n<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>\r\n<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>\r\n<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>\r\n<p>Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa. Berikut ini adalah cara bagaimana menghapus pengumuman yang sudah dadaluarsa.</p>', '2014-12-31 06:14:14', '2014-12-31 06:14:14'),
(13, 'Lowongan Pekerjaan', 'lowongan-pekerjaan', '<p ><strong>PT. AHM</strong> seddang membuka lowongan pekerjaan, lorem ipsum dolor amet dfghjkbnmkcjkscnknckdnckndjcbajjbbsckja jbcjkbacjbc ijk dwjgdquygdbjkqskvasjd jbdjqwbdkjqbwd</p>', '2016-04-14 16:56:41', '2016-04-14 16:56:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
