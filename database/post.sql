-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:33
-- Generation Time: Feb 25, 2020 at 10:25 AM
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

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`id`, `addr`, `status`) VALUES
(1, 'Sardar Patel Road, Chennai, Tamil Nadu 600025', 'pending'),
(4, 'RR Tower 2, First FloorGuindy Industrial Estate, Guindy, Chennai, Tamil Nadu 600032', 'pending'),
(18, '7, prasanth colony 1st street,tambaram,chennai', 'pending'),
(20, '947, Thiruvottiyur High Rd, Chinna Mettupalaiyam, Kaladipet, tiruvotiyur, Chennai, Tamil Nadu 600019', 'pending'),
(21, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019', 'pending'),
(23, 'Sardar Patel Rd, opp. Lemon tree, Guindy National Park, Guindy, Chennai, Tamil Nadu 600022', 'pending'),
(24, 'Race Course Rd, near Railway Station, Guindy, Chennai, Tamil Nadu 600032', 'pending'),
(25, '6/24, State Bank Colony, Adambakkam, Chennai, Tamil Nadu 600088', 'pending'),
(26, '23/1, Vandikaran St, Maduvinkarai, Guindy, Chennai, Tamil Nadu 600032', 'pending'),
(27, 'SIDCO Industrial Estate, Guindy, Chennai, Tamil Nadu 600032', 'pending'),
(40, 'K KAMARAJ\n\n41/28 VASANTHANAGAR 1ST STREET\nTHANGAL TIRUVOTIYUR\n\nCHENNAI\n\nTAMIL NADU\n\nINDIA - 600019\n', 'pending'),
(49, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019', 'pending'),
(54, '762 (old no 538) TH Road, Washermanpet,\nChennai, Tamilnadu-600021\n', 'pending'),
(55, '762 (old no 538) TH Road, Washermanpet,\nChennai, Tamilnadu-600021\n', 'pending');

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
(7, 'watson', 'washermanpet', 'watson@gmail.com', 'watson');

-- --------------------------------------------------------

--
-- Table structure for table `postt`
--

CREATE TABLE `postt` (
  `ID` int(11) NOT NULL,
  `SERVICE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postt`
--

INSERT INTO `postt` (`ID`, `SERVICE`) VALUES
(1, 'RR Tower 2, First FloorGuindy Industrial Estate, Guindy, Chennai, Tamil Nadu 600032'),
(4, '7, prasanth colony 1st street,tambaram,chennai'),
(1, 'Sardar Patel Rd, opp. Lemon tree, Guindy National Park, Guindy, Chennai, Tamil Nadu 600022'),
(1, 'Race Course Rd, near Railway Station, Guindy, Chennai, Tamil Nadu 600032'),
(1, '23/1, Vandikaran St, Maduvinkarai, Guindy, Chennai, Tamil Nadu 600032'),
(1, 'SIDCO Industrial Estate, Guindy, Chennai, Tamil Nadu 600032'),
(2, 'no:41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 19'),
(2, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019'),
(2, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019'),
(2, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019'),
(2, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019'),
(2, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019'),
(2, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019'),
(2, 'no.41/28, vasantha nagar 1st street, thangal, tiruvotiyur, chennai 600019'),
(7, '762 (old no 538) TH Road, Washermanpet,\nChennai, Tamilnadu-600021\n'),
(7, '762 (old no 538) TH Road, Washermanpet,\nChennai, Tamilnadu-600021\n');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `postman`
--
ALTER TABLE `postman`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
