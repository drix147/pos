
-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2016 at 10:07 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `POS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE DATABASE pos;
use pos;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `password`) VALUES
(0, 'HEL ', 'Mab', 'mabhelitc@gmail.com', '$2y$10$EsQ/FsbyUbDx2Eamc/Q6CuEr5Xq.Att02ro3HxEsOtmIwZO7qdxJS');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` varchar(20) NOT NULL DEFAULT '',
  `Name` varchar(30) DEFAULT NULL,
  `Public` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Name`, `Public`) VALUES
('001', 'Children', '2016-04-21 23:46:44'),
('002', 'Woman', '2016-04-21 23:12:50'),
('003', 'Man', '2016-04-22 00:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ordersID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` varchar(100) NOT NULL,
  `Quality` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Sales_at` datetime NOT NULL,
  PRIMARY KEY (`ordersID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` varchar(100) NOT NULL DEFAULT '',
  `Name` varchar(100) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Numbers` int(11) DEFAULT NULL,
  `Public` datetime DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `products_ibfk_1` (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Size`, `Color`, `Price`, `Numbers`, `Public`, `Type`, `image`) VALUES
('C0010', 'Mixel', 'S', 'Black', 20.12, 20, '2016-04-23 08:09:19', '001', '4f49c73a15a07c036c8cec68d067d835821f26c3.jpg'),
('C0011', 'Mixel', 'S', 'Pink', 23.99, 8, '2016-04-23 09:43:39', '001', 'ffb0b668f3b5be9d3e6c3fd87b09aa95291493ba.jpg'),
('C0012', 'Mixel', 'S', 'Black', 20.12, 8, '2016-04-23 09:44:46', '001', 'b60e9bb7c86340235014367fdcf0cd697e211476.jpg'),
('C0014', 'Mixel Update', 'M', 'Blue', 20.12, 10, '2016-04-23 09:56:19', '002', '4ab7b737697ef3cca50e71df0c9e5885f66c08e6.jpg'),
('C002', 'Mixel', 'S', 'Blue', 20.12, 20, '2016-04-23 07:36:01', '001', 'b3baf8f155dfbb6c9257e69f2a2b3bf383d45958.jpg'),
('C003', 'Mixel', 'S', 'Black', 12.23, 2, '2016-04-23 07:37:29', '001', '5ece06d316294b4cb8956ee22985c6936c45255f.jpg'),
('C004', 'Mixel', 'S', 'Black', 12.45, 4, '2016-04-23 07:39:16', '001', '56Q48309.jpg'),
('C006', 'Mixel', 'XL', 'Black', 10, 2, '2016-04-23 07:53:19', '001', '0aa51e7ac92f987f58b99cd42cf1b377dd3dd939.jpg'),
('C008', 'Mixel', 'S', 'Black', 12.09, 20, '2016-04-23 08:00:04', '001', '2e94b996f2a35f15ceb2d05f75142019cb474821.jpg'),
('C009', 'Mixel', 'S', 'Black', 12.34, 20, '2016-04-23 08:01:28', '001', '1fe5b412a8e2c0ed67eac7ad5b9234ccf27fdd5d.jpg'),
('F0010', 'Mixel Update', 'S', 'Pink', 120.23, 14, '2016-04-23 10:01:29', '002', 'c3a4749cc3389f05fb825f64fd07959fc22f7192.jpg'),
('F0011', 'Mixel', 'S', 'Black', 12.56, 10, '2016-04-23 08:24:00', '002', '71fb64336fa16d888ee4dca58969c7bdf03d288a.jpg'),
('F0013', 'Name is updated 1', 'L', 'Red', 99.99, 8, '2016-04-23 21:54:20', '002', 'c1097b7d593c9be12b68e9c8ef08a5c67554e3f5.jpg'),
('F002', 'Mixel', 'M', 'Pink', 14.56, 20, '2016-04-21 23:20:02', '002', '355a4d4fa598d1851a9c1d50f35187d9e302601e.jpg'),
('F004', 'Shirt', 'S', 'Pink', 20.99, 10, '2016-04-22 08:37:23', '002', '276bfa84e8024022d71099afb22ec2cc2300f548.jpg'),
('F005', 'Mixel', 'M', 'Pink', 12.99, 7, '2016-04-22 08:42:30', '002', 'c71505ee204875fe95e9653e2c2c24f568994c0f.jpg'),
('F006', 'Mixel', 'S', 'Pink', 14.99, 6, '2016-04-22 08:45:25', '002', 'd61de4de6a9013dd4cde22bda108d9bfdd37ac35.jpg'),
('F007', 'Mixel', 'S', 'Pink', 12.34, 20, '2016-04-23 08:13:14', '002', '901efc280ab333fcdb511a02fcbe502f50b5987f.jpg'),
('F008', 'Mixel', 'S', 'Pink', 20.12, 38, '2016-04-23 10:00:01', '002', '5c508ddfcc7bedf0f05f1b895dc2bfb61719f6af.jpg'),
('M001', 'shirt', 'M', 'Black', 23.56, 10, '2016-04-22 00:56:36', '002', '891fc2331b51e78d619558952a2ac22c1142e7d6.jpg'),
('M0010', 'Mixel', 'M', 'Blue', 99.99, 20, '2016-04-23 09:38:03', '002', '99d66dbd0aa3d8cd09d134edb9b2644f2a83bc2b.jpg'),
('M0011', 'Mixel', 'S', 'Black', 14.56, 18, '2016-04-23 09:39:17', '003', '896023185736bf3762170d3bd6fc417b4657e534.jpg'),
('M0012', 'Mixel', 'M', 'Pink', 23.99, 40, '2016-04-23 09:52:41', '003', 'vc6009.jpg'),
('M002', 'Mixel', 'L', 'Black', 23.99, 5, '2016-04-22 09:23:00', '003', '3cbc5102eaa43e14beca08b2eeb72f1f4239ecc2.jpg'),
('M004', 'Mixel', 'M', 'Blue', 23.99, 8, '2016-04-22 09:26:18', '003', 'efa618b30f4189c2f854029bc43141e89ad4ca38.jpg'),
('M005', 'Mixel', 'M', 'Gray', 20.12, 68, '2016-04-22 09:28:03', '003', '5b452cfb447d7f44d760f94749f10f2a161125cc.jpg'),
('M006', 'Mixel', 'M', 'Pink', 12.56, 2, '2016-04-22 09:30:50', '002', 'c3a4749cc3389f05fb825f64fd07959fc22f7192.jpg'),
('M007', 'Mixel', 'S', 'Black', 123, 9, '2016-04-23 07:20:35', '001', '96f8afec7084f952c1cce1e48e067317714c83da.jpg'),
('M008', 'Mixel', 'S', 'Black', 123, 8, '2016-04-23 07:32:27', '001', '5c508ddfcc7bedf0f05f1b895dc2bfb61719f6af.jpg'),
('M009', 'Mixel', 'L', 'Red', 10.45, 10, '2016-04-23 09:36:35', '002', 'db073d52f0e260d25849034f23b04b5b0e881fcb.jpg'),
('UFC003', 'Mixel', 'M', 'Red', 23.49, 10, '2016-04-22 00:17:54', '002', '286a506334cf68f202b81ea8e0a91a55b917a018.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `ID` varchar(100) NOT NULL,
  `Quality` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Sales_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID`, `Quality`, `Price`, `Sales_at`) VALUES
('C0014', 1, 20.12, '2016-04-29'),
('C0014', 1, 20.12, '2016-04-29'),
('C0014', 1, 20.12, '2016-04-29'),
('C0014', 1, 20.12, '2016-04-29'),
('C0014', 2, 20.12, '2016-04-29'),
('C0014', 2, 20.12, '2016-04-29'),
('C0014', 2, 20.12, '2016-04-29'),
('C0014', 2, 20.12, '2016-04-29'),
('C0014', 1, 20.12, '2016-04-29'),
('C0012', 1, 20.12, '2016-04-29'),
('M0011', 1, 14.56, '2016-04-29'),
('F0011', 1, 12.56, '2016-04-29'),
('M002', 1, 23.99, '2016-04-29'),
('M002', 2, 23.99, '2016-04-29'),
('M0011', 1, 14.56, '2016-04-29'),
('C008', 1, 12.09, '2016-04-29'),
('C008', 1, 12.09, '2016-04-29'),
('C003', 1, 12.23, '2016-04-29'),
('M009', 1, 10.45, '2016-04-29'),
('M004', 2, 23.99, '2016-04-29'),
('M0012', 1, 23.99, '2016-04-29'),
('M0012', 1, 23.99, '2016-04-29'),
('M0012', 1, 23.99, '2016-04-29'),
('C008', 1, 12.09, '2016-04-29'),
('C008', 1, 12.09, '2016-04-29'),
('C008', 1, 12.09, '2016-04-29'),
('M0012', 1, 23.99, '2016-05-03'),
('M0012', 2, 23.99, '2016-05-03'),
('F002', 8, 14.56, '2016-05-05'),
('M002', 2, 23.99, '2016-05-05'),
('M004', 2, 23.99, '2016-05-05'),
('M008', 1, 123, '2016-05-05'),
('F005', 1, 12.99, '2016-05-05'),
('F005', 2, 12.99, '2016-05-05'),
('M007', 1, 123, '2016-05-05'),
('check', 2, 23.99, '2016-05-05'),
('M0011', 2, 14.56, '2016-05-06'),
('F0013', 2, 99.99, '2016-05-06'),
('C0012', 2, 20.12, '2016-05-06'),
('F0013', 2, 99.99, '2016-05-06');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
