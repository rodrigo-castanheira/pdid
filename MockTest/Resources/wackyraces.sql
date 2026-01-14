-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 12:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wackyraces`
--
CREATE DATABASE IF NOT EXISTS `wackyraces` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wackyraces`;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `racerid` int(11) NOT NULL,
  `trackid` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`racerid`, `trackid`, `position`) VALUES
(16, 2, 2),
(16, 4, 1),
(17, 2, 1),
(17, 4, 2),
(18, 2, 3),
(18, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `racers`
--

CREATE TABLE `racers` (
  `racerId` int(11) NOT NULL,
  `racerName` varchar(50) NOT NULL,
  `carName` varchar(50) NOT NULL,
  `racerImage` varchar(255) NOT NULL,
  `racerPoints` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the racers in the wacky races competition.';

--
-- Dumping data for table `racers`
--

INSERT INTO `racers` (`racerId`, `racerName`, `carName`, `racerImage`, `racerPoints`) VALUES
(16, 'Dick Dastardly and Muttley', 'Mean Machine', 'DDM.png', 15),
(17, 'Peter Perfect', 'Turbo Terrific', 'PPF.png', 28),
(18, 'Red Max', 'Crimson Haybaler', 'RM.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `trackId` int(11) NOT NULL,
  `trackName` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`trackId`, `trackName`, `location`, `length`) VALUES
(1, 'Dune Drifter', 'Sahara', 500),
(2, 'Sandy Beaches', 'Florida', 432),
(4, 'Rusty Pines', 'Arkansas', 278),
(5, 'Heaping Hoppers', 'Iowa', 333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`racerid`,`trackid`),
  ADD KEY `trackid` (`trackid`);

--
-- Indexes for table `racers`
--
ALTER TABLE `racers`
  ADD PRIMARY KEY (`racerId`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`trackId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `racers`
--
ALTER TABLE `racers`
  MODIFY `racerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `trackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`racerid`) REFERENCES `racers` (`racerId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`trackid`) REFERENCES `tracks` (`trackId`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
