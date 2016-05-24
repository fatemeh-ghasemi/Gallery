-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 06:26 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `userid` int(20) NOT NULL,
  `type` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `body` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `private` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `userid`, `type`, `body`, `private`, `name`) VALUES
(9, 2, 'carton', 'rrrrrrrrrrrrrrrr', 0, '1463750108.JPG'),
(11, 2, 'background', 'llkjhjgbhcfg', 0, '1463750158.JPG'),
(12, 4, 'background', 's,dmcnsabcjlsavcbhkasvc khaV hcndv', 0, '1463777016.JPG'),
(13, 4, 'carton', 'scbsakjcv bskahdvc kascd', 0, '1463777038.JPG'),
(15, 4, 'other', 'aefdegdfvdfgergerg', 0, '1463778401.JPG'),
(16, 2, 'background', 'asfsdvfcsdvf', 0, '1463779031.JPG'),
(17, 3, 'other', 'sdfbaksdbf ksfdbksaedr bf', 0, '1463781038.JPG'),
(18, 3, 'background', 'afgsdvcfadsfvasewfdv', 0, '1463781063.JPG'),
(19, 1, 'carton', 'minion', 0, '1464063752.PNG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
