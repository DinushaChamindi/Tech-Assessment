-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2019 at 04:17 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `llsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `bookId` varchar(10) NOT NULL,
  `Categoryid` varchar(10) NOT NULL,
  `bookName` text NOT NULL,
  `auther` text NOT NULL,
  `price` double NOT NULL,
  `isAvailable` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `bookid` (`bookId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Id`, `bookId`, `Categoryid`, `bookName`, `auther`, `price`, `isAvailable`) VALUES
(4, 'B001', '2', 'test', 'test', 250, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `categoryName`) VALUES
(1, 'Novel'),
(2, 'Educational'),
(3, 'Tecnical'),
(4, 'StoryBooks');

-- --------------------------------------------------------

--
-- Table structure for table `issuedetail`
--

DROP TABLE IF EXISTS `issuedetail`;
CREATE TABLE IF NOT EXISTS `issuedetail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `bookId` varchar(10) NOT NULL,
  `memberId` varchar(10) NOT NULL,
  `returnDate` date NOT NULL,
  `isReturn` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuedetail`
--

INSERT INTO `issuedetail` (`Id`, `date`, `bookId`, `memberId`, `returnDate`, `isReturn`) VALUES
(1, '2019-10-22', 'B001', 'M001', '2019-10-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` varchar(10) NOT NULL,
  `memberName` text NOT NULL,
  `address` text NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `mmberid` (`memberid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id`, `memberid`, `memberName`, `address`, `contactNo`, `status`, `isAdmin`) VALUES
(10, 'M002', 'Dinusha', 'kotte', '0117458962', 1, 1),
(11, 'M003', 'User', 'Nugegoda', '0117458962', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `Password` text NOT NULL,
  `memberid` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`Id`, `email`, `isAdmin`, `status`, `Password`, `memberid`) VALUES
(9, 'member@gmail.com', 1, 1, 'user@123', 'M002'),
(10, 'user@gmail.com', 0, 1, 'user@123', 'M003');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
