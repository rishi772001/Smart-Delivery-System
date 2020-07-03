-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:33
-- Generation Time: Jul 03, 2020 at 09:45 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `id` int(11) NOT NULL,
  `addr` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postman`
--

CREATE TABLE `postman` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `SERVICE` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postman`
--

INSERT INTO `postman` (`ID`, `Name`, `SERVICE`, `email`, `password`) VALUES
(1, 'rishi', 'guindy', 'rishi@gmail.com', 'rishi'),
(2, 'Sabsh', 'tiruvotiyur', 'sabsh@gmail.com', 'sabsh'),
(4, 'vijay', 'tambaram', 'vijay@gmail.com', 'vijay'),
(5, 'susaa', 'mylapore', 'susaa@gmail.com', 'susaa'),
(6, 'kumar', 'west mambalam', 'kumar', 'kumar'),
(7, 'watson', 'washermanpet', 'watson@gmail.com', 'watson'),
(8, 'sriram', 'thandalam', 'abc', 'sriram');

-- --------------------------------------------------------

--
-- Table structure for table `postt`
--

CREATE TABLE `postt` (
  `num` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `SERVICE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postman`
--
ALTER TABLE `postman`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `postt`
--
ALTER TABLE `postt`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postman`
--
ALTER TABLE `postman`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postt`
--
ALTER TABLE `postt`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
