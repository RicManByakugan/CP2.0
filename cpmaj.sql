-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2022 at 06:11 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpmaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `accp`
--

DROP TABLE IF EXISTS `accp`;
CREATE TABLE IF NOT EXISTS `accp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nombre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accp`
--

INSERT INTO `accp` (`id`, `nom`, `nombre`) VALUES
(1, 'ATelma', 51700),
(2, 'AAirtel', 2000),
(3, 'AOrange', 5000),
(4, 'PTelma', 5),
(5, 'PAirtel', 10),
(6, 'POrange', 10),
(7, 'CaTelma', 100),
(8, 'CaAirtel', 180),
(9, 'CaOrange', 140),
(10, 'CrTelma', 8000),
(11, 'CrAirtel', 4900),
(12, 'CrOrange', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `accptransaction`
--

DROP TABLE IF EXISTS `accptransaction`;
CREATE TABLE IF NOT EXISTS `accptransaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BVente` int(11) DEFAULT NULL,
  `Operateur` varchar(255) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Vente` varchar(250) NOT NULL,
  `Espece` int(11) NOT NULL,
  `Raison` varchar(250) NOT NULL,
  `DateAC` date NOT NULL,
  `HeureAC` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accptransaction`
--

INSERT INTO `accptransaction` (`id`, `BVente`, `Operateur`, `Type`, `Nombre`, `Vente`, `Espece`, `Raison`, `DateAC`, `HeureAC`) VALUES
(1, NULL, 'TELMA', 'CREDIT', '', '0', 261250, 'VENTE', '2022-12-22', '21:00:18'),
(2, NULL, 'AIRTEL', 'CREDIT', '', '0', 261250, 'VENTE', '2022-12-22', '21:00:18'),
(3, NULL, 'ORANGE', 'CREDIT', '', '0', 261250, 'VENTE', '2022-12-22', '21:00:18'),
(4, NULL, 'TELMA', 'APPEL', 'RETIRE', '200', 0, 'za', '2022-12-22', '21:03:35'),
(5, NULL, 'TELMA', 'APPEL', 'AJOUT', '50000', 0, 'za', '2022-12-22', '21:03:49'),
(6, NULL, 'AIRTEL', 'APPEL', 'RETIRE', '3000', 0, '20za', '2022-12-22', '21:04:01'),
(7, NULL, 'AIRTEL', 'APPEL', 'AJOUT', '1100', 0, 'za', '2022-12-22', '21:04:22'),
(8, NULL, 'ORANGE', 'APPEL', 'AJOUT', '2000', 0, 'za', '2022-12-22', '21:04:34'),
(9, NULL, 'ORANGE', 'APPEL', 'RETIRE', '900', 0, 'za', '2022-12-22', '21:04:44'),
(10, NULL, 'TELMA', 'CREDIT', 'AJOUT', '4000', 0, 'za', '2022-12-22', '21:04:54'),
(11, NULL, 'TELMA', 'CREDIT', 'RETIRE', '500', 0, 'za', '2022-12-22', '21:05:07'),
(12, NULL, 'AIRTEL', 'CREDIT', 'AJOUT', '100', 0, 'za', '2022-12-22', '21:05:15'),
(13, NULL, 'AIRTEL', 'CREDIT', 'RETIRE', '200', 0, 'za', '2022-12-22', '21:05:21'),
(14, NULL, 'TELMA', 'CARTE', 'AJOUT', '10', 0, 'za', '2022-12-22', '21:06:37'),
(15, NULL, 'AIRTEL', 'CARTE', 'AJOUT', '90', 0, 'za', '2022-12-22', '21:06:46'),
(16, NULL, 'ORANGE', 'CARTE', 'AJOUT', '50', 0, 'za', '2022-12-22', '21:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `airtel`
--

DROP TABLE IF EXISTS `airtel`;
CREATE TABLE IF NOT EXISTS `airtel` (
  `idOp` int(11) NOT NULL AUTO_INCREMENT,
  `Position` varchar(20) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Envoie` int(11) DEFAULT NULL,
  `Retrait` int(11) DEFAULT NULL,
  `Frais` int(11) DEFAULT NULL,
  `Bonus` int(11) DEFAULT NULL,
  `Solde` int(11) DEFAULT NULL,
  `Espece` int(11) DEFAULT NULL,
  `DescriptionSolde` varchar(255) DEFAULT NULL,
  `MontantSolde` int(11) DEFAULT NULL,
  `DescriptionEspece` varchar(250) DEFAULT NULL,
  `MontantEspece` int(11) DEFAULT NULL,
  `Raison` varchar(250) DEFAULT NULL,
  `DateOp` date DEFAULT NULL,
  `HeureOp` time DEFAULT NULL,
  PRIMARY KEY (`idOp`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airtel`
--

INSERT INTO `airtel` (`idOp`, `Position`, `Numero`, `Envoie`, `Retrait`, `Frais`, `Bonus`, `Solde`, `Espece`, `DescriptionSolde`, `MontantSolde`, `DescriptionEspece`, `MontantEspece`, `Raison`, `DateOp`, `HeureOp`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 20000, 20000, 'AJOUT SOLDE', 20000, 'AJOUT ESPECE', 10000, 'za', '2022-10-22', '12:42:00'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 15000, 15000, 'AJOUT SOLDE', 10000, 'AJOUT ESPECE', 10000, 'za', '2022-10-22', '12:44:11'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 10000, 10000, 'RETIRE SOLDE', 5000, 'RETIRE ESPECE', 5000, 'za', '2022-10-22', '12:44:30'),
(4, 'TANA', 332487719, 5200, NULL, 200, 141, 4941, 32501, NULL, NULL, NULL, NULL, NULL, '2022-10-31', '08:41:50'),
(5, NULL, 332487719, NULL, 20000, NULL, 250, 25191, 12601, NULL, NULL, NULL, NULL, NULL, '2022-11-04', '19:39:55'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 25191, 112601, NULL, NULL, 'AJOUT ESPECE', 100000, 'za', '2022-11-04', '19:41:52'),
(7, NULL, 332487719, NULL, 20000, NULL, 250, 45441, 92601, NULL, NULL, NULL, NULL, NULL, '2022-11-04', '19:41:56'),
(8, 'TANA', 332487719, 10000, NULL, 200, 141, 35582, 60200, NULL, NULL, NULL, NULL, NULL, '2022-11-17', '08:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `chiffre`
--

DROP TABLE IF EXISTS `chiffre`;
CREATE TABLE IF NOT EXISTS `chiffre` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `nomC` varchar(10) NOT NULL,
  `soldeC` int(11) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chiffre`
--

INSERT INTO `chiffre` (`idC`, `nomC`, `soldeC`) VALUES
(1, 'Espece', 60200),
(2, 'Telma', 25326),
(3, 'Orange', 10009),
(4, 'Airtel', 35582),
(5, 'Espece2', 261250);

-- --------------------------------------------------------

--
-- Table structure for table `daytransaction`
--

DROP TABLE IF EXISTS `daytransaction`;
CREATE TABLE IF NOT EXISTS `daytransaction` (
  `idDay` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTelma` int(11) NOT NULL,
  `NombreAirtel` int(11) NOT NULL,
  `NombreOrange` int(11) NOT NULL,
  `Day` date NOT NULL,
  PRIMARY KEY (`idDay`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daytransaction`
--

INSERT INTO `daytransaction` (`idDay`, `NombreTelma`, `NombreAirtel`, `NombreOrange`, `Day`) VALUES
(34, 43, 35, 14, '2022-09-02'),
(33, 43, 20, 30, '2022-09-01'),
(3, 28, 46, 50, '2022-10-01'),
(4, 44, 14, 28, '2022-10-02'),
(5, 3, 49, 3, '2022-10-03'),
(6, 49, 19, 4, '2022-10-04'),
(7, 27, 31, 45, '2022-10-05'),
(8, 28, 14, 40, '2022-10-06'),
(9, 13, 9, 48, '2022-10-07'),
(10, 39, 26, 46, '2022-10-08'),
(11, 13, 1, 23, '2022-10-09'),
(12, 32, 32, 15, '2022-10-10'),
(13, 29, 29, 33, '2022-10-11'),
(14, 19, 10, 40, '2022-10-12'),
(15, 32, 30, 2, '2022-10-13'),
(16, 2, 27, 30, '2022-10-14'),
(17, 29, 3, 26, '2022-10-15'),
(18, 29, 15, 43, '2022-10-16'),
(19, 2, 43, 7, '2022-10-17'),
(20, 19, 32, 35, '2022-10-18'),
(21, 33, 49, 45, '2022-10-19'),
(22, 27, 37, 5, '2022-10-20'),
(23, 34, 44, 20, '2022-10-21'),
(24, 6, 34, 11, '2022-10-22'),
(25, 6, 40, 24, '2022-10-23'),
(26, 4, 47, 19, '2022-10-24'),
(27, 4, 46, 49, '2022-10-25'),
(28, 10, 19, 2, '2022-10-26'),
(29, 32, 46, 7, '2022-10-27'),
(30, 29, 29, 23, '2022-10-28'),
(31, 13, 6, 25, '2022-10-29'),
(32, 45, 26, 0, '2022-10-30'),
(35, 33, 18, 49, '2022-09-03'),
(36, 0, 26, 36, '2022-09-04'),
(37, 37, 28, 7, '2022-09-05'),
(38, 31, 38, 2, '2022-09-06'),
(39, 4, 23, 21, '2022-09-07'),
(40, 5, 11, 7, '2022-09-08'),
(41, 14, 44, 31, '2022-09-09'),
(42, 2, 46, 29, '2022-09-10'),
(43, 49, 6, 47, '2022-09-11'),
(44, 6, 38, 23, '2022-09-12'),
(45, 25, 24, 15, '2022-09-13'),
(46, 36, 17, 15, '2022-09-14'),
(47, 24, 39, 19, '2022-09-15'),
(48, 8, 5, 50, '2022-09-16'),
(49, 37, 33, 9, '2022-09-17'),
(50, 9, 38, 49, '2022-09-18'),
(51, 35, 23, 25, '2022-09-19'),
(52, 13, 9, 22, '2022-09-20'),
(53, 36, 21, 46, '2022-09-21'),
(54, 11, 22, 13, '2022-09-22'),
(55, 21, 48, 20, '2022-09-23'),
(56, 49, 0, 24, '2022-09-24'),
(57, 21, 31, 50, '2022-09-25'),
(58, 45, 42, 38, '2022-09-26'),
(59, 41, 4, 18, '2022-09-27'),
(60, 36, 6, 4, '2022-09-28'),
(61, 21, 16, 12, '2022-09-29'),
(62, 49, 38, 28, '2022-09-30'),
(63, 37, 47, 43, '2022-08-01'),
(64, 42, 5, 36, '2022-08-02'),
(65, 27, 26, 35, '2022-08-03'),
(66, 6, 8, 42, '2022-08-04'),
(67, 16, 5, 29, '2022-08-05'),
(68, 31, 50, 41, '2022-08-06'),
(69, 15, 27, 1, '2022-08-07'),
(70, 13, 26, 15, '2022-08-08'),
(71, 40, 24, 48, '2022-08-09'),
(72, 31, 29, 28, '2022-08-10'),
(73, 24, 39, 40, '2022-08-11'),
(74, 36, 17, 38, '2022-08-12'),
(75, 12, 13, 21, '2022-08-13'),
(76, 43, 8, 41, '2022-08-14'),
(77, 17, 33, 6, '2022-08-15'),
(78, 22, 32, 42, '2022-08-16'),
(79, 0, 28, 35, '2022-08-17'),
(80, 45, 23, 5, '2022-08-18'),
(81, 29, 9, 31, '2022-08-19'),
(82, 24, 18, 44, '2022-08-20'),
(83, 31, 19, 19, '2022-08-21'),
(84, 5, 19, 35, '2022-08-22'),
(85, 13, 40, 10, '2022-08-23'),
(86, 39, 27, 34, '2022-08-24'),
(87, 5, 9, 20, '2022-08-25'),
(88, 36, 14, 16, '2022-08-26'),
(89, 28, 17, 30, '2022-08-27'),
(90, 30, 17, 17, '2022-08-28'),
(91, 23, 7, 8, '2022-08-29'),
(92, 12, 2, 2, '2022-08-30'),
(93, 3, 28, 3, '2022-08-31'),
(94, 11, 13, 3, '2022-11-01'),
(95, 42, 16, 8, '2022-11-02'),
(96, 28, 20, 34, '2022-11-03'),
(97, 41, 45, 11, '2022-11-04'),
(98, 33, 11, 5, '2022-11-05'),
(99, 7, 16, 50, '2022-11-06'),
(100, 48, 29, 26, '2022-11-07'),
(101, 5, 22, 4, '2022-11-08'),
(102, 0, 34, 39, '2022-11-09'),
(103, 36, 19, 16, '2022-11-10'),
(104, 6, 2, 21, '2022-11-11'),
(105, 23, 6, 34, '2022-11-12'),
(106, 25, 48, 39, '2022-11-13'),
(107, 14, 5, 25, '2022-11-14'),
(108, 23, 25, 36, '2022-11-15'),
(109, 41, 45, 16, '2022-11-16'),
(110, 12, 48, 29, '2022-11-17'),
(111, 28, 11, 2, '2022-11-18'),
(112, 11, 42, 31, '2022-11-19'),
(113, 11, 6, 50, '2022-11-20'),
(114, 42, 36, 31, '2022-11-21'),
(115, 33, 24, 6, '2022-11-22'),
(116, 41, 40, 14, '2022-11-23'),
(117, 31, 36, 3, '2022-11-24'),
(118, 36, 24, 39, '2022-11-25'),
(119, 24, 17, 28, '2022-11-26'),
(120, 50, 17, 5, '2022-11-27'),
(121, 0, 0, 21, '2022-11-28'),
(122, 6, 10, 16, '2022-11-29'),
(123, 4, 27, 38, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `orange`
--

DROP TABLE IF EXISTS `orange`;
CREATE TABLE IF NOT EXISTS `orange` (
  `idOp` int(11) NOT NULL AUTO_INCREMENT,
  `Position` varchar(20) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Envoie` int(11) DEFAULT NULL,
  `Retrait` int(11) DEFAULT NULL,
  `Frais` int(11) DEFAULT NULL,
  `Bonus` int(11) DEFAULT NULL,
  `Solde` int(11) DEFAULT NULL,
  `Espece` int(11) DEFAULT NULL,
  `DescriptionSolde` varchar(255) DEFAULT NULL,
  `MontantSolde` int(11) DEFAULT NULL,
  `DescriptionEspece` varchar(250) DEFAULT NULL,
  `MontantEspece` int(11) DEFAULT NULL,
  `Raison` varchar(250) DEFAULT NULL,
  `DateOp` date DEFAULT NULL,
  `HeureOp` time DEFAULT NULL,
  PRIMARY KEY (`idOp`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orange`
--

INSERT INTO `orange` (`idOp`, `Position`, `Numero`, `Envoie`, `Retrait`, `Frais`, `Bonus`, `Solde`, `Espece`, `DescriptionSolde`, `MontantSolde`, `DescriptionEspece`, `MontantEspece`, `Raison`, `DateOp`, `HeureOp`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 10000, 25300, 'AJOUT SOLDE', 10000, 'AJOUT ESPECE', 10000, 'za', '2022-10-22', '16:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `telma`
--

DROP TABLE IF EXISTS `telma`;
CREATE TABLE IF NOT EXISTS `telma` (
  `idOp` int(11) NOT NULL AUTO_INCREMENT,
  `Position` varchar(20) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Envoie` int(11) DEFAULT NULL,
  `Retrait` int(11) DEFAULT NULL,
  `Frais` int(11) DEFAULT NULL,
  `Bonus` int(11) DEFAULT NULL,
  `Solde` int(11) DEFAULT NULL,
  `Espece` int(11) DEFAULT NULL,
  `DescriptionSolde` varchar(255) DEFAULT NULL,
  `MontantSolde` int(11) DEFAULT NULL,
  `DescriptionEspece` varchar(250) DEFAULT NULL,
  `MontantEspece` int(11) DEFAULT NULL,
  `Raison` varchar(250) DEFAULT NULL,
  `DateOp` date DEFAULT NULL,
  `HeureOp` time DEFAULT NULL,
  PRIMARY KEY (`idOp`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telma`
--

INSERT INTO `telma` (`idOp`, `Position`, `Numero`, `Envoie`, `Retrait`, `Frais`, `Bonus`, `Solde`, `Espece`, `DescriptionSolde`, `MontantSolde`, `DescriptionEspece`, `MontantEspece`, `Raison`, `DateOp`, `HeureOp`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 10000, 10000, 'AJOUT SOLDE', 10000, 'AJOUT ESPECE', 10000, 'D', '2022-10-27', '08:15:30'),
(2, 'TANA', 342487719, 5200, NULL, 100, 142, 4942, 15300, NULL, NULL, NULL, NULL, NULL, '2022-10-26', '12:45:06'),
(3, NULL, 342487719, NULL, 20000, NULL, 250, 25192, 5300, NULL, NULL, NULL, NULL, NULL, '2022-10-27', '06:33:38'),
(4, NULL, 342487719, NULL, 5000, NULL, 58, 30250, 300, NULL, NULL, NULL, NULL, NULL, '2022-10-27', '06:33:45'),
(5, 'EXTERIEURE', 342487719, 25600, NULL, 800, 292, 4542, 26700, NULL, NULL, NULL, NULL, NULL, '2022-10-27', '06:34:02'),
(6, NULL, 342487719, NULL, 20000, NULL, 250, 24792, 6700, NULL, NULL, NULL, NULL, NULL, '2022-10-27', '06:34:06'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, 24792, 6701, NULL, NULL, 'AJOUT ESPECE', 1, 'za', '2022-10-28', '15:07:38'),
(8, 'TANA', 342487719, 10000, NULL, 200, 142, 14934, 16901, NULL, NULL, NULL, NULL, NULL, '2022-10-31', '07:33:22'),
(9, 'TANA', 342487719, 10000, NULL, 200, 142, 5076, 27101, NULL, NULL, NULL, NULL, NULL, '2022-10-31', '07:57:02'),
(10, NULL, 342487719, NULL, 20000, NULL, 250, 25326, 72601, NULL, NULL, NULL, NULL, NULL, '2022-11-08', '19:45:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
