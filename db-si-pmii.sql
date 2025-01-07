-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2025 at 01:03 PM
-- Server version: 8.3.0
-- PHP Version: 8.1.28

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
  `data_alumni` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_tinggal` varchar(50) DEFAULT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `propesi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`data_alumni`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-mapaba`
--

DROP TABLE IF EXISTS `tbl_data-mapaba`;
CREATE TABLE IF NOT EXISTS `tbl_data-mapaba` (
  `data_mapaba` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_tinggal` varchar(50) DEFAULT NULL,
  `universitas` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tahun_mapaba` date DEFAULT NULL,
  PRIMARY KEY (`data_mapaba`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data-mapaba`
--

INSERT INTO `tbl_data-mapaba` (`data_mapaba`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat_tinggal`, `universitas`, `tahun_mapaba`) VALUES
(1, '0000000000', 'Miko Rizqon Saputra', 'Rantau Rasau', '2003-03-17', 'Rantau Rasau', 'UIN STS Jambi', '2020-03-17'),
(9, '11111111111', 'Alfi Salam', 'Rimbo Bujang', '2001-05-01', 'Rimbo Bujang', 'UIN STS Jambi', '0000-00-00'),
(10, '2222222222', 'ivan orlando irawan', 'Mersam', '0000-00-00', 'Mersam', 'UIN STS Jambi', '0000-00-00'),
(7, '3333333333', 'Ria Septiya Ningsih', 'Rantau Rasau', '2004-09-13', 'Rantau Rasau', 'UIN STS Jambi', '0000-00-00'),
(11, '4444444444', 'Iqbal Hanafi', 'Kerinci', '0000-00-00', 'Kerinci', 'UIN STS Jambi', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-pkd`
--

DROP TABLE IF EXISTS `tbl_data-pkd`;
CREATE TABLE IF NOT EXISTS `tbl_data-pkd` (
  `data_pkd` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_tinggal` varchar(50) DEFAULT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `tahun_pkd` date DEFAULT NULL,
  PRIMARY KEY (`data_pkd`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data-pkd`
--

INSERT INTO `tbl_data-pkd` (`data_pkd`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat_tinggal`, `universitas`, `tahun_pkd`) VALUES
(1, '1111111111', 'Miko Rizqon', 'Rantau Rasau', '0000-00-00', 'Rantau Rasau', 'UIN STS Jambi', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-pkl`
--

DROP TABLE IF EXISTS `tbl_data-pkl`;
CREATE TABLE IF NOT EXISTS `tbl_data-pkl` (
  `data_pkl` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_tinggal` varchar(50) DEFAULT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `tahun_pkl` date DEFAULT NULL,
  PRIMARY KEY (`data_pkl`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data-pkn`
--

DROP TABLE IF EXISTS `tbl_data-pkn`;
CREATE TABLE IF NOT EXISTS `tbl_data-pkn` (
  `data_pkn` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_tinggal` varchar(50) DEFAULT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `tahun_mapaba` date DEFAULT NULL,
  PRIMARY KEY (`data_pkn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Miko Rizqon', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'foto.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
