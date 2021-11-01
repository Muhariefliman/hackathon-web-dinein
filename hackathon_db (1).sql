-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 04:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon_db`
--
CREATE DATABASE IF NOT EXISTS `hackathon_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hackathon_db`;

-- --------------------------------------------------------

--
-- Table structure for table `msresto`
--

DROP TABLE IF EXISTS `msresto`;
CREATE TABLE IF NOT EXISTS `msresto` (
  `RestoId` int(11) NOT NULL AUTO_INCREMENT,
  `RestoName` varchar(255) NOT NULL,
  `RestoStreet` varchar(255) NOT NULL,
  `RestoDesc` varchar(255) NOT NULL,
  `RestoRating` float NOT NULL,
  `RestoPicture` varchar(255) NOT NULL,
  `SeatPrice` int(11) NOT NULL,
  `RestoSeat` int(11) NOT NULL,
  PRIMARY KEY (`RestoId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msresto`
--

INSERT INTO `msresto` (`RestoId`, `RestoName`, `RestoStreet`, `RestoDesc`, `RestoRating`, `RestoPicture`, `SeatPrice`, `RestoSeat`) VALUES
(1, 'ABC', 'Kemanggisan', 'Paris Resto', 4.5, 'assets/RestoPict/images.jpg', 150000, 27),
(2, 'KFC', 'Kemanggisan 2', 'AYAM GORENG', 4, 'assets/RestoPict/images.jpg', 120000, 15),
(3, 'ABC 2', 'Kemanggisan 3', 'ABC 2', 3, 'assets/RestoPict/images.jpg\r\n', 100000, 15),
(4, 'ABC 3', 'ABC 3', 'ABC 3 WAW', 4.4, 'assets/RestoPict/images.jpg', 95000, 45);

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

DROP TABLE IF EXISTS `msuser`;
CREATE TABLE IF NOT EXISTS `msuser` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Profile-Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`userid`, `Name`, `Email`, `PhoneNumber`, `Password`, `Profile-Picture`) VALUES
(2, 'Muhamad Arief Liman', 'ariefliman21@gmail.com', '123456789012', '12345678', 'assets/PictureProfile/pict.png');

-- --------------------------------------------------------

--
-- Table structure for table `restomenu`
--

DROP TABLE IF EXISTS `restomenu`;
CREATE TABLE IF NOT EXISTS `restomenu` (
  `MenuId` int(11) NOT NULL AUTO_INCREMENT,
  `RestoId` int(11) NOT NULL,
  `MenuName` varchar(255) NOT NULL,
  `MenuPrice` int(11) NOT NULL,
  `MenuDesc` varchar(255) NOT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restomenu`
--

INSERT INTO `restomenu` (`MenuId`, `RestoId`, `MenuName`, `MenuPrice`, `MenuDesc`) VALUES
(1, 1, 'ABC SPECIAL', 15000, 'ABC SPECIAL PAKE TELOR'),
(2, 1, 'ABC SPECIAL 2', 25000, 'ABC SPECIAL 2 GA PAKE TELOR'),
(3, 1, 'ABC SPECIAL 3', 22000, 'ABC SPECIAL 3 PAKE TELOR MATA SAPI'),
(4, 1, 'ABC SPECIAL 4', 12000, 'ABC SPECIAL 4 SPECIAL BANGET');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
