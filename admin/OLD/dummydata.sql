-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2019 at 01:20 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

DROP TABLE IF EXISTS `dummy`;
CREATE TABLE IF NOT EXISTS `dummy` (
  `StpName` varchar(20) NOT NULL,
  `medium` blob,
  `FName` varchar(15) NOT NULL,
  `SName` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`StpName`, `medium`, `FName`, `SName`) VALUES
('dfg', NULL, 'fgh', 'kk'),
('dfg', NULL, 'ghii', 'kk'),
('ghj', NULL, 'jho', 'sdfgh'),
('dfgh', NULL, 'jajska', 'kky'),
('ghjg', NULL, 'fghj', 'jukj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
