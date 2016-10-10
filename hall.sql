-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 08:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `adminName`, `designation`, `email`) VALUES
('1', 'admin', '95192c98732387165bf8e396c0f2dad2', 'Mr. X', 'Controller', 'kuhall@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `image`) VALUES
(1, '', '../resources/album/9f20a0f19e.jpg'),
(2, '', '../resources/album/e53264d90d.jpg'),
(3, '', ''),
(4, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `title` varchar(255) NOT NULL,
  `detail` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`title`, `detail`) VALUES
('abc', '&lt;p&gt;hi helo oo o oo o&lt;/p&gt;'),
('def', '&lt;p&gt;oggy jack marky dede joye&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--

CREATE TABLE `residential` (
  `studentId` varchar(50) NOT NULL,
  `formId` varchar(50) NOT NULL,
  `roomNo` varchar(100) NOT NULL,
  `request` varchar(50) DEFAULT NULL,
  `acceptRequest` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residential`
--

INSERT INTO `residential` (`studentId`, `formId`, `roomNo`, `request`, `acceptRequest`) VALUES
('130217', '55', '79', NULL, NULL),
('130223', '88', '25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `floor` varchar(100) NOT NULL,
  `start` int(10) DEFAULT NULL,
  `end` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`floor`, `start`, `end`) VALUES
('Ground Floor', 11, 100);

-- --------------------------------------------------------

--
-- Table structure for table `seat_application_form`
--

CREATE TABLE `seat_application_form` (
  `formId` varchar(50) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `gpa` varchar(50) NOT NULL,
  `vivaReport` varchar(255) NOT NULL,
  `approvalDate` varchar(50) DEFAULT NULL,
  `adminId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_application_form`
--

INSERT INTO `seat_application_form` (`formId`, `studentId`, `gpa`, `vivaReport`, `approvalDate`, `adminId`) VALUES
('55', '130217', '4123', 'wr', 'October 9, 2016', '1'),
('88', '130223', '3453', 'treg43a', 'October 10, 2016', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up_form`
--

CREATE TABLE `sign_up_form` (
  `formId` varchar(50) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `discipline` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `session` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `moneyReceipt` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `adminId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up_form`
--

INSERT INTO `sign_up_form` (`formId`, `studentId`, `studentName`, `email`, `discipline`, `year`, `term`, `session`, `photo`, `moneyReceipt`, `username`, `password`, `adminId`) VALUES
('2', '130217', 'Masum Moral', 'abc@gmail.com', 'CSE', '3', '2', '2014-2015', '../resources/photo/2.jpg', '../resources/moneyReceipt/2.jpg', 'sonam', '2', '1'),
('3', '130223', 'Ashiqur Rahman', 'abc@gmail.com', 'CSE', '3', '2', '2014-2015', '../resources/photo/3.jpg', '../resources/moneyReceipt/3.jpg', 'asik', '3', '1'),
('4', '130224', 'Zakaria Ahmed', 'abc@gmail.com', 'CSE', '3', '2', '2014-2015', '../resources/photo/4.jpg', '../resources/moneyReceipt/4.jpg', 'zaka', '4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siteoptions`
--

CREATE TABLE `siteoptions` (
  `id` int(5) NOT NULL DEFAULT '1',
  `title` varchar(100) NOT NULL,
  `hallName` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `headerImage` varchar(255) NOT NULL,
  `logo1` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  `aboutUs` varchar(2000) NOT NULL,
  `contact` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteoptions`
--

INSERT INTO `siteoptions` (`id`, `title`, `hallName`, `address`, `phone`, `fax`, `email`, `headerImage`, `logo1`, `logo2`, `aboutUs`, `contact`) VALUES
(1, 'Khulna University Hall', 'Khaba', 'Khulna, Khulna', '0000000', '999999', 'kuhall@outlook.com', '../resources/logo/ec1fb3a398.gif', '../resources/logo/3f4851e84d.jpg', '../resources/logo/cc3c64c81d.gif', '&lt;p&gt;We are family&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-family: ''times new roman'', times; font-size: medium;&quot;&gt;How are you&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`) VALUES
(1, '../resources/sliders/57c06e4627.jpg'),
(2, ''),
(3, ''),
(4, '../resources/sliders/9c3a468201.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` varchar(50) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `discipline` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `session` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentName`, `email`, `discipline`, `year`, `term`, `session`, `photo`, `username`, `password`) VALUES
('130217', 'Masum Moral', 'abc@gmail.com', 'CSE', '3', '2', '2014-2015', '../resources/photo/2.jpg', 'sonam', '2'),
('130223', 'Ashiqur Rahman', 'abc@gmail.com', 'CSE', '3', '2', '2014-2015', '../resources/photo/3.jpg', 'asik', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `residential`
--
ALTER TABLE `residential`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `formId` (`formId`),
  ADD KEY `request` (`request`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`floor`);

--
-- Indexes for table `seat_application_form`
--
ALTER TABLE `seat_application_form`
  ADD PRIMARY KEY (`formId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `sign_up_form`
--
ALTER TABLE `sign_up_form`
  ADD PRIMARY KEY (`formId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `siteoptions`
--
ALTER TABLE `siteoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `residential`
--
ALTER TABLE `residential`
  ADD CONSTRAINT `residential_ibfk_1` FOREIGN KEY (`formId`) REFERENCES `seat_application_form` (`formId`),
  ADD CONSTRAINT `residential_ibfk_2` FOREIGN KEY (`request`) REFERENCES `residential` (`studentId`);

--
-- Constraints for table `seat_application_form`
--
ALTER TABLE `seat_application_form`
  ADD CONSTRAINT `seat_application_form_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`),
  ADD CONSTRAINT `seat_application_form_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`);

--
-- Constraints for table `sign_up_form`
--
ALTER TABLE `sign_up_form`
  ADD CONSTRAINT `sign_up_form_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
