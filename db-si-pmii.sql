-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2025 at 08:26 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-si-pmii`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-alumni`
--

DROP TABLE IF EXISTS `tbl_data-alumni`;
CREATE TABLE IF NOT EXISTS `tbl_data-alumni` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `cabang` varchar(20) NOT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `propesi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data-alumni`
--

INSERT INTO `tbl_data-alumni` (`id`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `cabang`, `universitas`, `propesi`) VALUES
(1, '3333333333', 'Alfi Salam', 'Jambi', '2001-05-01', 'Kerinci', 'UIN STS Jambi', 'kuli'),
(3, '3333333333', 'ivan orlando irawan', 'Tanjabtim', '0000-00-00', 'Kerinci', 'UIN STS Jambi', 'kuli'),
(4, '1111111111', 'ivan orlando irawan', 'Tanjabtim', '2023-03-12', 'Kerinci', 'UIN STS Jambi', 'kuli');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-mapaba`
--

DROP TABLE IF EXISTS `tbl_data-mapaba`;
CREATE TABLE IF NOT EXISTS `tbl_data-mapaba` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `cabang` varchar(20) NOT NULL,
  `universitas` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tahun_mapaba` year DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data-mapaba`
--

INSERT INTO `tbl_data-mapaba` (`id`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `cabang`, `universitas`, `tahun_mapaba`, `created_at`) VALUES
(1, '0000000000', 'Miko Rizqon Saputra', 'Rantau Rasau', '2003-03-17', 'Kerinci', 'UIN STS Jambi', '0000', '2025-01-28 18:54:29'),
(9, '11111111111', 'Alfi Salam', 'Rimbo Bujang', '2001-05-01', 'Kota Jambi', 'UIN STS Jambi', '0000', '2025-01-28 18:54:29'),
(10, '2222222222', 'ivan orlando irawan', 'Mersam', '0000-00-00', '', 'UIN STS Jambi', '0000', '2025-01-28 18:54:29'),
(11, '4444444444', 'Iqbal Hanafi', 'Kerinci', '0000-00-00', '', 'UIN STS Jambi', '0000', '2025-01-28 18:54:29'),
(12, '3333333333', 'bng deden', 'Batang Hari', '2004-09-13', '', 'UIN STS Jambi', '0000', '2025-01-28 18:54:29'),
(13, '0000000000', 'ivan orlando irawan', 'Tanjabtim', '2001-05-01', '', 'UIN STS Jambi', '0000', '2025-01-28 18:54:29'),
(14, '3333333333', 'Alfi Salam', 'Jambi', '2004-09-13', '', 'UIN STS Jambi', '0000', '2025-01-28 18:54:29'),
(16, '2222222222', 'subra', 'sarolangun', '2004-09-13', 'sarolangun', 'UIN STS Jambi', '2001', '2025-01-28 18:54:29'),
(17, '1111111111', 'wahyu irfan', 'Rantau Rasau', '2023-03-12', 'sarolangun', 'UIN STS Jambi', '2022', '2025-01-28 18:54:29'),
(18, '12344444', 'Bambang Budi', 'Jambi', '2025-01-10', 'Kerinci', 'IAIN Kerinci', '2020', '2025-01-29 06:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-pkd`
--

DROP TABLE IF EXISTS `tbl_data-pkd`;
CREATE TABLE IF NOT EXISTS `tbl_data-pkd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `cabang` varchar(20) NOT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `tahun_pkd` year DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data-pkd`
--

INSERT INTO `tbl_data-pkd` (`id`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `cabang`, `universitas`, `tahun_pkd`) VALUES
(1, '1111111111', 'Miko Rizqon', 'Rantau Rasau', '0000-00-00', 'Kerinci', 'UIN STS Jambi', '0000'),
(2, '1111111111', 'Alfi Salam', 'Batang Hari', '0000-00-00', 'Kerinci', 'UIN STS Jambi', '0000'),
(3, '3333333333', 'wahyu irfan', 'sarolangun', '0000-00-00', 'sarolangun', 'UIN STS Jambi', '2001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-pkl`
--

DROP TABLE IF EXISTS `tbl_data-pkl`;
CREATE TABLE IF NOT EXISTS `tbl_data-pkl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `cabang` varchar(20) NOT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `tahun_pkl` year DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data-pkl`
--

INSERT INTO `tbl_data-pkl` (`id`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `cabang`, `universitas`, `tahun_pkl`) VALUES
(2, '1111111111', 'Alfi Salam', 'Jambi', '2004-09-13', 'Kerinci', 'UIN STS Jambi', '0000'),
(3, '0000000000', 'ivan orlando irawan', 'Rantau Rasau', '2023-03-12', 'Kerinci', 'UIN STS Jambi', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-pkn`
--

DROP TABLE IF EXISTS `tbl_data-pkn`;
CREATE TABLE IF NOT EXISTS `tbl_data-pkn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `cabang` varchar(20) NOT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `tahun_pkn` year DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data-pkn`
--

INSERT INTO `tbl_data-pkn` (`id`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `cabang`, `universitas`, `tahun_pkn`) VALUES
(1, '3333333333', 'Alfi Salam', 'Jambi', '2023-03-12', 'Kerinci', 'UIN STS Jambi', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pmii`
--

DROP TABLE IF EXISTS `tbl_pmii`;
CREATE TABLE IF NOT EXISTS `tbl_pmii` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `logo_pmii` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pmii`
--

INSERT INTO `tbl_pmii` (`id`, `nama`, `alamat`, `logo_pmii`) VALUES
(1, 'SI PMII JAMBI', 'Jl. Hm. Yusuf Singedekane No.7, Sungai Putri, Kec.', 'logopmii');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int DEFAULT NULL,
  `cabang` varchar(30) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `cabang`, `foto`) VALUES
(1, 'Miko Rizqon', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '', 'foto.jpg'),
(2, 'Pengurus Cabang Kota Jambi', 'pcpmiijambi', '8cb2237d0679ca88db6464eac60da96345513964', 2, 'Kota Jambi', NULL),
(3, 'pengurus cabang kerinci', 'pcpmiikerinci', '1234', 2, 'Kerinci', NULL),
(4, 'Pengurs cabang sarolangun', 'pcpmiisarolangun', '12345', 3, '', NULL),
(5, 'pengus cabang batang hari', 'pcpmiibatanghari', '123456', 3, '', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
