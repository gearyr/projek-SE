-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 09:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignmenttracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment_list`
--

CREATE TABLE `assignment_list` (
  `AssgID` int(5) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(1500) DEFAULT NULL,
  `Deadline` datetime DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'NOT DONE',
  `File` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_list`
--

INSERT INTO `assignment_list` (`AssgID`, `Title`, `Description`, `Deadline`, `status`, `File`) VALUES
(5, 'tugas1', 'ini adalah tugas1', '2022-06-13 22:16:00', 'NOT DONE', '62a75c78b97db.'),
(9, 'tugas3', 'tugas3', '2022-11-13 22:56:00', 'NOT DONE', '62a75e37ca783.pdf'),
(10, 'tugas4', 'tugas4', '2022-09-13 23:01:00', 'NOT DONE', '62a75f566dc86.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`) VALUES
(13, 'geary.riandy@binus.ac.id', '$2y$10$dkwgQz.ErBZZvAWXNlRevOQMZjaBB/GKe3y9E6eDLHkQNY933MRbO'),
(14, 'gearyryandi@gmail.com', '$2y$10$21ZphqmdMb1KjfpzKmTBhOzuW.wAxMWjHC9kPn4aw.SH20raLGKiO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment_list`
--
ALTER TABLE `assignment_list`
  ADD PRIMARY KEY (`AssgID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment_list`
--
ALTER TABLE `assignment_list`
  MODIFY `AssgID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
