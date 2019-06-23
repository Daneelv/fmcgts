-- phpMyAdmin SQL Dump
-- version 3.3.1
-- http://www.phpmyadmin.net
--
-- Host: dedi175.flk1.host-h.net
-- Generation Time: Mar 11, 2013 at 11:48 AM
-- Server version: 5.1.66
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fmcgts_db3`
--
CREATE DATABASE `fmcgts_db3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fmcgts_db3`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `other` int(11) NOT NULL,
  `trainer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `other`, `trainer`) VALUES
(1, 'Company1', 'img/logos/logo1.jpg', 0, 0),
(2, 'Acuere', 'img\\logos\\logo2.jpg', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seta_number` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `practical` decimal(5,2) NOT NULL,
  `theory` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `seta_number`, `name`, `practical`, `theory`) VALUES
(1, '10622', 'Communication in Business', 0.50, 0.50),
(2, '120300', 'Analyse Leadership', 1.00, 0.00),
(3, '13953/241824', 'Apply Leadership Styles', 0.30, 0.70);

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE IF NOT EXISTS `programme` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `name`) VALUES
(1, 'Production Manager level 1'),
(2, 'second course');

-- --------------------------------------------------------

--
-- Table structure for table `programme_module`
--

CREATE TABLE IF NOT EXISTS `programme_module` (
  `module_id` int(10) NOT NULL,
  `programme_id` int(10) NOT NULL,
  KEY `module_id` (`module_id`,`programme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme_module`
--

INSERT INTO `programme_module` (`module_id`, `programme_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('manager','trainer','trainee','admin') DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `superior` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `company_id`, `name`, `type`, `username`, `password`, `superior`) VALUES
(1, 1, 'frank adrian', 'trainer', 'frank', '86a8c2da8527a1c6978bdca6d7986fe14ae147fe', 0),
(5, 1, 'abc', 'manager', 'abc', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 1),
(6, 2, 'Delta', 'manager', 'Delta', '736fcab46d3c183000b547caa2f1f0abcdcd1c87', 1),
(57, 2, 'PLXDLW', 'trainee', 'PLXDLW', 'c8351a1b625763303b6b61a42baa2345f7eba3e7', 0),
(58, 2, 'PLXDLW', 'trainee', 'PLXDLW', 'c8351a1b625763303b6b61a42baa2345f7eba3e7', 0),
(59, 2, 'PLXDLW', 'trainee', 'PLXDLW', 'c8351a1b625763303b6b61a42baa2345f7eba3e7', 0),
(60, 2, 'IFWTHQ', 'trainee', 'IFWTHQ', 'f1d620106a5d9d2c7bddf1383fac4abe8ae63af2', 0),
(61, 2, 'ZATEHB', 'trainee', 'ZATEHB', '9e7425b94b5e60e0f3428af12d1488d0395a1ccb', 0),
(62, 2, 'NGUFRW', 'trainee', 'NGUFRW', '98fc756cfaf0528b10cf6a9c7a37bcd1a7d0df6b', 6),
(63, 1, 'YLZWBE', 'trainee', 'YLZWBE', '85f4cf7ea73a7ec2963632bfb6534c7f43a1a9fc', 1),
(64, 1, 'YLZWBE', 'trainee', 'YLZWBE', '85f4cf7ea73a7ec2963632bfb6534c7f43a1a9fc', 5),
(65, 2, 'NCJUDB', 'trainee', 'NCJUDB', '31f344e430cdee0ed436e996fdd7cf5fb4f283dd', 6),
(66, 1, 'PFGXRP', 'trainee', 'PFGXRP', '26f24bc6dceb2114337c232e3744f90cb5f1d1f8', 1),
(67, 1, 'STCKNZ', 'trainee', 'STCKNZ', 'e9d818052fb91f7d15ff65d20a2689e8fcd82e7f', 5),
(68, 1, 'STCKNZ', 'trainee', 'STCKNZ', 'e9d818052fb91f7d15ff65d20a2689e8fcd82e7f', 5),
(69, 1, 'STCKNZ', 'trainee', 'STCKNZ', 'e9d818052fb91f7d15ff65d20a2689e8fcd82e7f', 5),
(70, 1, 'QAYRYK', 'admin', 'QAYRYK', '25ff3339d3756b0880fc3b5347b01d4f67a26f1e', 5),
(71, 1, 'UQYVXJ', 'trainee', 'UQYVXJ', '174b058b49713fd024759f8af894680d70957b42', 5),
(72, 1, 'TFJUPX', 'trainee', 'TFJUPX', '27d8e7f95c6f4a6ca332a1665af3c83bc5a5637d', 5),
(73, 1, 'TFJUPX', 'trainee', 'TFJUPX', '27d8e7f95c6f4a6ca332a1665af3c83bc5a5637d', 5),
(74, 2, 'SWUCMF', 'trainee', 'SWUCMF', 'be7c5749bf369362ede998e9a1c19ee0fc5dda77', 6),
(75, 1, 'AAAAAA', 'trainee', 'AAAAAA', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 5),
(76, 1, 'bbbbbb', 'trainee', 'bbbbbb', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 5),
(77, 1, 'sdgfag', 'trainee', 'adsfewqry', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_programme`
--

CREATE TABLE IF NOT EXISTS `user_programme` (
  `user_id` int(10) NOT NULL,
  `programme_id` int(10) NOT NULL,
  KEY `user_id` (`user_id`,`programme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_programme`
--

INSERT INTO `user_programme` (`user_id`, `programme_id`) VALUES
(71, 1),
(72, 2),
(73, 2),
(74, 1),
(75, 1),
(76, 1),
(77, 2);
