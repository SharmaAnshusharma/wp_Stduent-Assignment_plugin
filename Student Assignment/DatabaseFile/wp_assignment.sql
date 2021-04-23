-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 05:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_assignment`
--

CREATE TABLE `wp_assignment` (
  `ID` int(11) NOT NULL,
  `Task` varchar(500) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Due` varchar(50) NOT NULL,
  `AssignTo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wp_assignment`
--

INSERT INTO `wp_assignment` (`ID`, `Task`, `Date`, `Due`, `AssignTo`) VALUES
(1, 'Learn', '12/12/12', '1/22/22', 'Subscriber'),
(2, 'Learn WordPress', '2021-03-05', '2021-03-08', 'Subscriber'),
(3, 'Learn WordPress', '2021-03-04', '2021-03-10', 'Subscriber'),
(4, 'Learn WordPress', '2021-04-23', '2021-04-24', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_assignment`
--
ALTER TABLE `wp_assignment`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_assignment`
--
ALTER TABLE `wp_assignment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
