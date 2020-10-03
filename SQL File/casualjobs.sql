-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2020 at 02:07 PM
-- Server version: 5.7.31-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinergyl_casualjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  `jobTitleid` int(11) NOT NULL,
  `jobType` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `locationSub` int(11) NOT NULL,
  `payRate` decimal(10,2) NOT NULL,
  `jobDes` varchar(500) NOT NULL,
  `startDate` date NOT NULL,
  `startType` int(11) NOT NULL,
  `endDate` date NOT NULL,
  `endType` int(11) NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `totalHours` time NOT NULL,
  `timeDiff` int(1) NOT NULL DEFAULT '0',
  `qualification` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `visaType` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `ethnicity` int(11) NOT NULL,
  `age1` int(10) NOT NULL,
  `age2` int(10) NOT NULL,
  `gender` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `dateAdd`, `userid`, `jobTitleid`, `jobType`, `location`, `locationSub`, `payRate`, `jobDes`, `startDate`, `startType`, `endDate`, `endType`, `fromTime`, `toTime`, `totalHours`, `timeDiff`, `qualification`, `experience`, `skills`, `visaType`, `license`, `vehicle`, `ethnicity`, `age1`, `age2`, `gender`, `status`, `timeStamp`) VALUES
(28, '2020-09-28 00:00:00', 11, 3, 2, 15, 68, 18.90, 'Help making food.\r\nWash and clean the kitchen.', '2020-09-30', 0, '2020-09-27', 1, '00:00:00', '00:00:00', '23:00:00', 1, 0, 0, 'Cooking,Multitasking,Hardworking', 0, 0, 0, 0, 18, 55, 0, 1, '2020-09-27 11:04:25'),
(29, '2020-09-28 00:00:00', 11, 5, 1, 1, 3, 18.90, '', '2020-09-28', 0, '2020-09-28', 0, '04:00:00', '14:00:00', '10:00:00', 0, 0, 0, 'Professionalism', 0, 0, 0, 0, 18, 55, 0, 1, '2020-09-27 11:42:06'),
(30, '2020-09-28 00:00:00', 17, 19, 2, 15, 71, 18.90, 'We are searching for a motivated team member who has a passion for customer service, sales and styling. Previous experience in a retail environment is necessary.\r\n\r\nYou will work casual shifts which will change week to week with a usual minimum of hour hours a week. You must be available on weekends and be flexible with working weekdays.', '2020-09-28', 1, '2020-09-28', 1, '08:00:00', '18:00:00', '10:00:00', 0, 0, 2, 'Time Management,Multitasking', 0, 0, 0, 0, 18, 55, 2, 1, '2020-09-27 21:19:28'),
(31, '2020-09-28 00:00:00', 17, 23, 1, 15, 74, 18.90, 'This is a great role for someone looking for work prior to Christmas with the potential for odd shifts throughout the year. It is essential you have an interest in food and are based in Auckland.\r\n\r\nYour key responsibilities and tasks would include:\r\n\r\nProviding customers with an enjoyable and informative shopping experience\r\nOperating the point of sale system\r\nEnsuring products are well stocked and nicely displayed and the showroom is clean and tidy at all times\r\nWrapping gifts', '2020-09-28', 0, '2020-09-28', 1, '00:00:00', '00:00:00', '36:00:00', 1, 0, 0, '', 0, 0, 0, 0, 18, 55, 0, 1, '2020-09-27 21:22:18'),
(32, '2020-09-28 00:00:00', 17, 10, 1, 15, 68, 18.90, '', '2020-09-28', 0, '2020-09-28', 0, '06:00:00', '10:00:00', '04:00:00', 0, 0, 0, 'Time Management', 0, 0, 0, 0, 18, 55, 0, 1, '2020-09-28 00:46:49'),
(33, '2020-09-28 00:00:00', 17, 13, 2, 1, 5, 22.00, 'nothing more', '2020-10-09', 0, '2020-12-31', 0, '10:00:00', '17:00:00', '07:00:00', 0, 2, 1, 'Multitasking,Cooking', 0, 0, 0, 0, 25, 55, 0, 1, '2020-09-28 09:04:15'),
(34, '2020-09-30 00:00:00', 11, 11, 1, 15, 71, 21.50, 'This employer is looking for reliable individuals that are interested in working in Civil Construction industry as Traffic Controllers for our busy Clients who are only getting busier! With summer season just around the corner and already too many vacant roles in this growing industry to fill, we need people who are looking for a new', '2020-09-30', 0, '2020-12-31', 0, '00:00:00', '00:00:00', '41:00:00', 1, 3, 3, 'Stress Management,Flexibility,Communication,Time Management', 0, 1, 1, 0, 25, 55, 1, 1, '2020-09-29 21:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `jobmatch`
--

CREATE TABLE `jobmatch` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `seekerid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `profileid` int(11) NOT NULL,
  `jobType` int(11) NOT NULL,
  `locationSub` int(11) NOT NULL,
  `payRate` int(11) NOT NULL,
  `startDate` int(11) NOT NULL,
  `endDate` int(11) NOT NULL,
  `t1` int(11) NOT NULL,
  `t2` int(11) NOT NULL,
  `noWeek` int(11) NOT NULL,
  `mon` int(11) NOT NULL,
  `tue` int(11) NOT NULL,
  `wed` int(11) NOT NULL,
  `thu` int(11) NOT NULL,
  `fri` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `sun` int(11) NOT NULL,
  `qualification` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `skills` int(11) NOT NULL,
  `visa` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `ethnicity` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `totalMatch` int(11) NOT NULL,
  `short` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobmatch`
--

INSERT INTO `jobmatch` (`id`, `empid`, `seekerid`, `jobid`, `profileid`, `jobType`, `locationSub`, `payRate`, `startDate`, `endDate`, `t1`, `t2`, `noWeek`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `qualification`, `experience`, `skills`, `visa`, `license`, `vehicle`, `ethnicity`, `age`, `gender`, `totalMatch`, `short`, `status`, `timeStamp`) VALUES
(40, 11, 12, 28, 32, 100, 0, 100, 75, 100, 0, 0, 0, 50, 100, 100, 50, 100, 50, 100, 100, 100, 66, 100, 100, 100, 100, 100, 100, 86, 0, 1, '2020-09-30 03:33:51'),
(41, 11, 12, 28, 33, 100, 100, 100, 75, 100, 0, 0, 0, 0, 0, 100, 0, 100, 0, 100, 100, 100, 33, 100, 100, 100, 100, 100, 100, 85, 0, 1, '2020-09-30 03:34:00'),
(42, 17, 12, 30, 32, 100, 0, 100, 100, 100, 25, 25, 1, 0, 0, 0, 0, 0, 0, 0, 100, 0, 50, 100, 100, 100, 100, 100, 0, 69, 0, 1, '2020-10-01 06:04:54'),
(43, 17, 12, 30, 33, 100, 100, 100, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 50, 100, 100, 100, 100, 100, 0, 55, 0, 1, '2020-10-01 06:04:54'),
(44, 17, 12, 31, 32, 100, 0, 100, 100, 100, 0, 0, 0, 50, 50, 50, 50, 50, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 81, 0, 1, '2020-10-01 06:04:54'),
(45, 17, 12, 31, 33, 100, 100, 100, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 67, 0, 1, '2020-10-01 06:04:54'),
(46, 17, 18, 30, 34, 100, 100, 100, 100, 100, 0, 0, 0, 0, 0, 50, 50, 50, 50, 50, 100, 0, 0, 100, 100, 100, 100, 100, 0, 80, 1, 0, '2020-09-28 00:52:56'),
(47, 17, 18, 31, 34, 100, 100, 100, 100, 100, 0, 0, 0, 0, 0, 0, 100, 50, 50, 50, 100, 100, 100, 100, 100, 100, 100, 100, 100, 87, 0, 0, '2020-09-28 00:52:56'),
(48, 11, 18, 28, 34, 100, 100, 100, 75, 100, 0, 0, 0, 0, 0, 100, 100, 100, 100, 100, 100, 100, 0, 100, 100, 100, 100, 100, 100, 90, 0, 0, '2020-09-28 00:52:56'),
(49, 17, 12, 32, 32, 100, 0, 100, 100, 100, 25, 25, 1, 0, 0, 0, 0, 0, 0, 0, 100, 100, 0, 100, 100, 100, 100, 100, 100, 78, 0, 1, '2020-10-01 06:04:54'),
(50, 17, 12, 32, 33, 100, 100, 100, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 100, 0, 100, 100, 100, 100, 100, 100, 62, 0, 1, '2020-10-01 06:04:54'),
(51, 17, 18, 32, 34, 100, 100, 100, 100, 100, 0, 0, 0, 0, 0, 50, 50, 100, 100, 100, 100, 100, 0, 100, 100, 100, 100, 100, 100, 89, 0, 0, '2020-09-28 00:52:56'),
(52, 11, 12, 34, 32, 100, 0, 100, 75, 100, 0, 0, 0, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 100, 0, 0, 100, 0, 100, 78, 1, 1, '2020-10-03 07:50:09'),
(53, 11, 12, 34, 33, 100, 100, 100, 75, 100, 0, 0, 0, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 100, 0, 0, 100, 0, 100, 84, 0, 1, '2020-09-30 01:04:25'),
(54, 11, 18, 29, 37, 100, 100, 0, 75, 100, 25, 25, 1, 0, 0, 0, 0, 0, 0, 0, 100, 100, 0, 100, 100, 100, 100, 100, 100, 74, 0, 0, '2020-09-30 01:03:37'),
(55, 11, 18, 29, 38, 100, 100, 100, 75, 75, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 100, 100, 0, 100, 100, 100, 100, 100, 100, 73, 0, 1, '2020-09-30 01:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobtitle`
--

CREATE TABLE `jobtitle` (
  `id` int(11) NOT NULL,
  `jobTitle` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobtitle`
--

INSERT INTO `jobtitle` (`id`, `jobTitle`, `status`, `timeStamp`) VALUES
(1, 'Domestic Cleaner', 1, '2020-09-21 08:01:46'),
(2, 'Commercial Cleaner', 1, '2020-09-21 08:01:46'),
(3, 'Kitchen Hand', 1, '2020-09-21 08:01:46'),
(4, 'Waiter', 1, '2020-09-21 08:01:46'),
(5, 'Receptionist', 1, '2020-09-21 08:01:46'),
(6, 'Security', 1, '2020-09-21 08:01:46'),
(7, 'Stock Assistant', 1, '2020-09-21 08:01:46'),
(8, 'Nanny', 1, '2020-09-21 08:01:46'),
(9, 'Gardner', 1, '2020-09-21 08:01:46'),
(10, 'Café Assistant', 1, '2020-09-21 08:01:46'),
(11, 'Traffic controllers', 1, '2020-09-21 08:01:46'),
(12, 'Telephone Operator', 1, '2020-09-21 08:01:46'),
(13, 'Chef', 1, '2020-09-21 08:01:46'),
(14, 'Plumber', 1, '2020-09-21 08:01:46'),
(15, 'Digger Machine Operator', 1, '2020-09-21 08:01:46'),
(16, 'Cashier', 1, '2020-09-21 08:01:46'),
(17, 'Language Tutor', 1, '2020-09-21 08:01:46'),
(18, 'Shuttle Driver', 1, '2020-09-21 08:01:46'),
(19, 'Sales Assistant', 1, '2020-09-21 08:01:46'),
(20, 'Construction Labour', 1, '2020-09-21 08:01:46'),
(21, 'Tutor', 1, '2020-09-22 01:40:08'),
(22, 'Night Filling', 1, '2020-09-25 12:13:32'),
(23, 'Store Helper', 1, '2020-09-25 12:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `status`, `timeStamp`) VALUES
(1, 'Auckland', 1, '2020-09-13 09:09:37'),
(2, 'Bay Of Plenty', 1, '2020-09-13 09:09:37'),
(3, 'Canterbury', 1, '2020-09-13 09:09:37'),
(4, 'Gisborne', 1, '2020-09-13 09:09:37'),
(5, 'Hawke\'s Bay', 1, '2020-09-13 09:09:37'),
(6, 'Manawatu / Wanganui', 1, '2020-09-13 09:09:37'),
(7, 'Marlborough', 1, '2020-09-13 09:09:37'),
(8, 'Nelson / Tasman', 1, '2020-09-13 09:09:37'),
(9, 'Northland', 1, '2020-09-13 09:09:37'),
(10, 'Otago', 1, '2020-09-13 09:09:37'),
(11, 'Outside NZ', 1, '2020-09-13 09:09:37'),
(12, 'Southland', 1, '2020-09-13 09:09:37'),
(13, 'Taranaki', 1, '2020-09-13 09:09:37'),
(14, 'Waikato', 1, '2020-09-13 09:09:37'),
(15, 'Wellington', 1, '2020-09-13 09:09:37'),
(16, 'West Coast', 1, '2020-09-13 09:09:37'),
(17, 'Work remotely', 1, '2020-09-13 09:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `locations_sub`
--

CREATE TABLE `locations_sub` (
  `id` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations_sub`
--

INSERT INTO `locations_sub` (`id`, `subid`, `location`, `status`, `timeStamp`) VALUES
(1, 15, 'Te Aro', 1, '2020-09-19 09:49:55'),
(2, 15, 'Courtney Place', 1, '2020-09-13 09:26:35'),
(3, 1, 'Auckland Central', 1, '2020-09-21 07:55:23'),
(4, 1, 'North Shore', 1, '2020-09-21 07:55:23'),
(5, 1, 'Papakura', 1, '2020-09-21 07:55:23'),
(6, 1, 'Pukekohe', 1, '2020-09-21 07:55:23'),
(7, 1, 'West Auckland', 1, '2020-09-21 07:55:23'),
(8, 1, 'Rodney', 1, '2020-09-21 07:55:23'),
(9, 4, 'Awapuni', 1, '2020-09-21 07:55:23'),
(10, 4, 'Elgin', 1, '2020-09-21 07:55:23'),
(11, 4, 'Inner kati', 1, '2020-09-21 07:55:23'),
(12, 4, 'kati', 1, '2020-09-21 07:55:23'),
(13, 4, 'Lytton West', 1, '2020-09-21 07:55:23'),
(14, 4, 'Makaraka', 1, '2020-09-21 07:55:23'),
(15, 4, 'Mangapapa', 1, '2020-09-21 07:55:23'),
(16, 4, 'Okitu', 1, '2020-09-21 07:55:23'),
(17, 4, 'Outer Kaiti', 1, '2020-09-21 07:55:23'),
(18, 4, 'Riverdale', 1, '2020-09-21 07:55:23'),
(19, 4, 'Tamarau', 1, '2020-09-21 07:55:23'),
(20, 4, 'Te Hapara', 1, '2020-09-21 07:55:23'),
(21, 4, 'Wainui', 1, '2020-09-21 07:55:23'),
(22, 4, 'Whataupoko', 1, '2020-09-21 07:55:23'),
(23, 8, 'Nelson North', 1, '2020-09-21 07:55:23'),
(24, 8, 'City Centre', 1, '2020-09-21 07:55:23'),
(25, 8, 'Tahunanui-Port Hills', 1, '2020-09-21 07:55:23'),
(26, 8, 'Stoke', 1, '2020-09-21 07:55:23'),
(27, 9, 'Whangarei', 1, '2020-09-21 07:55:23'),
(28, 9, 'Kerikeri', 1, '2020-09-21 07:55:23'),
(29, 9, 'Kaitaia', 1, '2020-09-21 07:55:23'),
(30, 9, 'Dargaville', 1, '2020-09-21 07:55:23'),
(31, 9, 'Kaikohe', 1, '2020-09-21 07:55:23'),
(32, 9, 'Ruakaka', 1, '2020-09-21 07:55:23'),
(33, 9, 'One Tree Point', 1, '2020-09-21 07:55:23'),
(34, 9, 'Mangawhai Heads', 1, '2020-09-21 07:55:23'),
(35, 9, 'Hikurangi', 1, '2020-09-21 07:55:23'),
(36, 9, 'Moerewa', 1, '2020-09-21 07:55:23'),
(37, 9, 'Kawakawa', 1, '2020-09-21 07:55:23'),
(38, 9, 'Opua', 1, '2020-09-21 07:55:23'),
(39, 9, 'Paihi', 1, '2020-09-21 07:55:23'),
(40, 10, 'Dunedin[a]', 1, '2020-09-21 07:55:23'),
(41, 10, 'Queenstown', 1, '2020-09-21 07:55:23'),
(42, 10, 'Mosgiel', 1, '2020-09-21 07:55:23'),
(43, 10, 'Oamaru', 1, '2020-09-21 07:55:23'),
(44, 10, 'Wanaka', 1, '2020-09-21 07:55:23'),
(45, 10, 'Alexandra', 1, '2020-09-21 07:55:23'),
(46, 10, 'Cromwell', 1, '2020-09-21 07:55:23'),
(47, 10, 'Balclutha', 1, '2020-09-21 07:55:23'),
(48, 10, 'Lake Hayes', 1, '2020-09-21 07:55:23'),
(49, 10, 'Arrowtown', 1, '2020-09-21 07:55:23'),
(50, 10, 'Milton', 1, '2020-09-21 07:55:23'),
(51, 10, 'Brighton', 1, '2020-09-21 07:55:23'),
(52, 10, 'Waikouaiti', 1, '2020-09-21 07:55:23'),
(53, 12, 'Invercargill', 1, '2020-09-21 07:55:23'),
(54, 12, 'Gore', 1, '2020-09-21 07:55:23'),
(55, 12, 'Winton', 1, '2020-09-21 07:55:23'),
(56, 12, 'Te Anau', 1, '2020-09-21 07:55:23'),
(57, 12, 'Bluff', 1, '2020-09-21 07:55:23'),
(58, 12, 'Mataura', 1, '2020-09-21 07:55:23'),
(59, 12, 'Riverton', 1, '2020-09-21 07:55:23'),
(60, 13, 'New Plymouth', 1, '2020-09-21 07:55:23'),
(61, 13, 'Hāwera', 1, '2020-09-21 07:55:23'),
(62, 13, 'Waitara', 1, '2020-09-21 07:55:23'),
(63, 13, 'Stratford', 1, '2020-09-21 07:55:23'),
(64, 13, 'Inglewood', 1, '2020-09-21 07:55:23'),
(65, 13, 'Eltham', 1, '2020-09-21 07:55:23'),
(66, 13, 'Opunake', 1, '2020-09-21 07:55:23'),
(67, 13, 'Patea', 1, '2020-09-21 07:55:23'),
(68, 15, 'Wellington City', 1, '2020-09-21 07:55:23'),
(69, 15, 'Upper Hutt', 1, '2020-09-21 07:55:23'),
(70, 15, 'Lower Hutt', 1, '2020-09-21 07:55:23'),
(71, 15, 'Porirua', 1, '2020-09-21 07:55:23'),
(72, 15, 'Masterton', 1, '2020-09-21 07:55:23'),
(73, 15, 'Caterton', 1, '2020-09-21 07:55:23'),
(74, 15, 'South Wairarapa', 1, '2020-09-21 07:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `loglogin`
--

CREATE TABLE `loglogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ipAddress` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `userAgent` varchar(200) NOT NULL,
  `logType` varchar(50) NOT NULL,
  `sync` int(1) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loglogin`
--

INSERT INTO `loglogin` (`id`, `username`, `ipAddress`, `browser`, `os`, `userAgent`, `logType`, `sync`, `timeStamp`) VALUES
(1, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-15 13:40:51'),
(2, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-15 23:27:44'),
(3, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-15 23:27:44'),
(4, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-17 07:04:47'),
(5, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-17 07:04:47'),
(6, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:38:03'),
(7, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:39:05'),
(8, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:39:41'),
(9, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:40:31'),
(10, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:45:47'),
(11, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:46:09'),
(12, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:46:49'),
(13, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:47:41'),
(14, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:48:10'),
(15, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 12:58:35'),
(16, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-18 13:34:50'),
(17, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 01:36:46'),
(18, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 01:36:46'),
(19, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 04:52:26'),
(20, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 09:37:43'),
(21, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 09:37:43'),
(22, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 09:38:01'),
(23, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 09:38:01'),
(24, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 09:50:47'),
(25, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 09:50:47'),
(26, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 10:41:46'),
(27, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 10:41:46'),
(28, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 12:17:29'),
(29, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 12:17:29'),
(30, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 12:17:29'),
(31, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 12:17:29'),
(32, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 12:23:02'),
(33, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 12:23:03'),
(34, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 22:25:50'),
(35, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 22:25:51'),
(36, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:51:20'),
(37, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:51:21'),
(38, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:54:37'),
(39, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:54:37'),
(40, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:54:52'),
(41, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:54:52'),
(42, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:57:57'),
(43, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:57:57'),
(44, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:59:14'),
(45, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-19 23:59:14'),
(46, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 00:00:13'),
(47, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 00:00:13'),
(48, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 00:13:00'),
(49, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 00:13:00'),
(50, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 01:48:14'),
(51, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 01:48:14'),
(52, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 09:55:13'),
(53, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 09:55:14'),
(54, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 10:13:56'),
(55, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 10:13:57'),
(56, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 21:59:52'),
(57, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 21:59:52'),
(58, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 21:59:52'),
(59, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 21:59:52'),
(60, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 22:12:49'),
(61, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-20 22:12:49'),
(62, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 07:39:29'),
(63, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 07:39:29'),
(64, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 07:40:41'),
(65, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 07:40:41'),
(66, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 08:05:46'),
(67, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 08:06:07'),
(68, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 08:06:07'),
(69, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 08:22:53'),
(70, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 08:31:32'),
(71, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 08:41:21'),
(72, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 08:41:21'),
(73, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 14:07:47'),
(74, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 14:07:48'),
(75, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 21:24:03'),
(76, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 21:24:04'),
(77, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 23:12:47'),
(78, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-21 23:12:47'),
(79, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 00:36:55'),
(80, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 00:36:55'),
(81, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 01:28:19'),
(82, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 01:28:19'),
(83, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 02:30:50'),
(84, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 02:30:51'),
(85, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 14:02:46'),
(86, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 14:02:46'),
(87, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 14:36:19'),
(88, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 14:36:19'),
(89, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 22:37:24'),
(90, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 22:37:24'),
(91, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 22:39:21'),
(92, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 22:39:21'),
(93, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 23:23:05'),
(94, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-22 23:23:05'),
(95, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 00:08:18'),
(96, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 00:12:09'),
(97, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 01:39:56'),
(98, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 02:05:43'),
(99, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 02:20:17'),
(100, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 08:26:51'),
(101, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 14:19:09'),
(102, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 14:21:27'),
(103, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-23 14:24:58'),
(104, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-24 01:30:56'),
(105, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-24 04:16:24'),
(106, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-24 09:38:54'),
(107, 'Job Seeker Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-24 13:40:22'),
(108, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-25 04:12:46'),
(109, 'Employer Name', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-25 04:12:47'),
(110, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-25 11:58:39'),
(111, 'Willard Carroll Smith', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', 'login', 1, '2020-09-25 12:02:45'),
(112, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 04:16:14'),
(113, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 04:18:59'),
(114, 'Willard Carroll Smith', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 04:21:28'),
(115, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 04:24:00'),
(116, 'emp3', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 06:53:27'),
(117, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 07:08:11'),
(118, 'Willard Carroll Smith', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 08:19:45'),
(119, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 12:12:45'),
(120, 'Willard Carroll Smith', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 12:14:14'),
(121, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 14:11:37'),
(122, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 14:11:50'),
(123, 'emp2', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 22:20:51'),
(124, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-26 22:54:55'),
(125, 'Willard Carroll Smith', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 04:59:41'),
(126, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 06:30:38'),
(127, 'emp5', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 06:54:20'),
(128, 'emp5', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 06:58:59'),
(129, 'Woolworths Supermarket', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 09:12:01'),
(130, 'Willard Carroll Smith', '::1', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 11:04:56'),
(131, 'Woolworths Supermarket', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 11:21:17'),
(132, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 11:40:41'),
(133, 'Willard Carroll Smith', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 11:41:39'),
(134, 'Willard Carroll Smith', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 20:37:16'),
(135, 'Priyanka Chopra', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 21:17:23'),
(136, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-27 21:27:55'),
(137, 'Priyanka Chopra', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 21:33:35'),
(138, 'John Cena', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 21:57:49'),
(139, 'Priyanka Chopra', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 22:05:09'),
(140, 'Ruban Sebastian', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-27 22:30:29'),
(141, 'Ruban Sebastian', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-27 22:34:40'),
(142, 'Woolworths Supermarket', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 23:37:10'),
(143, 'Willard Carroll Smith', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-27 23:42:30'),
(144, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 00:07:07'),
(145, 'Priyanka Chopra', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 00:34:21'),
(146, 'John Cena', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 00:47:09'),
(147, 'John Cena', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 01:12:15'),
(148, 'John Cena', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-28 01:17:33'),
(149, 'Priyanka Chopra', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 01:28:43'),
(150, 'John Cena', '198.41.238.50', 'Handheld Browser', 'iPhone', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1', 'login', 1, '2020-09-28 02:17:17'),
(151, 'Willard Carroll Smith', '198.41.238.50', 'Handheld Browser', 'iPhone', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1', 'login', 1, '2020-09-28 02:24:38'),
(152, 'Priyanka Chopra', '198.41.238.50', 'Handheld Browser', 'iPhone', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1', 'login', 1, '2020-09-28 02:28:13'),
(153, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 03:05:07'),
(154, 'Willard Carroll Smith', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 03:07:02'),
(155, 'Woolworths Supermarket', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 03:44:42'),
(156, 'Priyanka Chopra', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 03:58:25'),
(157, 'John Cena', '198.41.238.126', 'Handheld Browser', 'iPhone', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1', 'login', 1, '2020-09-28 04:14:09'),
(158, 'Priyanka Chopra', '198.41.238.92', 'Handheld Browser', 'iPhone', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1', 'login', 1, '2020-09-28 09:01:27'),
(159, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 12:47:29'),
(160, 'Priyanka Chopra', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 12:47:47'),
(161, 'John Cena', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 12:49:25'),
(162, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 12:53:36'),
(163, 'Priyanka Chopra', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 12:55:16'),
(164, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-28 13:24:46'),
(165, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-28 20:50:44'),
(166, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-28 21:16:23'),
(167, 'Woolworths Supermarket', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-29 21:32:47'),
(168, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-29 23:06:34'),
(169, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-29 23:06:34'),
(170, 'Woolworths Supermarket', '141.101.69.121', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-29 23:20:23'),
(171, 'Woolworths Supermarket', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-29 23:28:16'),
(172, 'Woolworths Supermarket', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-29 23:37:31'),
(173, 'John Cena', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-29 23:52:41'),
(174, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-29 23:57:47'),
(175, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-30 00:14:01'),
(176, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 'login', 1, '2020-09-30 00:17:50'),
(177, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-30 00:34:26'),
(178, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-30 03:20:02'),
(179, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-30 03:32:17'),
(180, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-09-30 06:22:43'),
(181, 'Priyanka Chopra', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-10-01 05:48:57'),
(182, 'Priyanka Chopra', '198.41.238.106', 'Handheld Browser', 'iPhone', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1', 'login', 1, '2020-10-01 06:43:06'),
(183, 'Woolworths Supermarket', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-10-03 02:51:09'),
(184, 'Woolworths Supermarket', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-10-03 04:01:39'),
(185, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-10-03 07:35:18'),
(186, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-10-03 07:36:13'),
(187, 'Woolworths Supermarket', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.63', 'login', 1, '2020-10-03 07:41:17'),
(188, 'Willard Carroll Smith', '198.41.238.126', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'login', 1, '2020-10-03 07:42:27'),
(189, 'Willard Carroll Smith', '198.41.238.50', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.63', 'login', 1, '2020-10-03 07:44:54'),
(190, 'Woolworths Supermarket', '198.41.238.92', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.63', 'login', 1, '2020-10-03 07:50:14'),
(191, 'Willard Carroll Smith', '198.41.238.106', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.63', 'login', 1, '2020-10-03 08:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `dateAdd` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `multiJobTitle` int(11) NOT NULL DEFAULT '0',
  `jobType` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `multiLocation` int(11) NOT NULL DEFAULT '0',
  `payRate` decimal(10,2) NOT NULL,
  `startDate` date NOT NULL,
  `startType` int(11) NOT NULL,
  `endDate` date NOT NULL,
  `endType` int(11) NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `totalHours` time NOT NULL,
  `timeDiff` int(11) NOT NULL DEFAULT '0',
  `qualification` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `visaType` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `ethnicity` int(11) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `dateAdd`, `userid`, `multiJobTitle`, `jobType`, `location`, `multiLocation`, `payRate`, `startDate`, `startType`, `endDate`, `endType`, `fromTime`, `toTime`, `totalHours`, `timeDiff`, `qualification`, `experience`, `skills`, `visaType`, `license`, `vehicle`, `ethnicity`, `age`, `gender`, `status`, `timeStamp`) VALUES
(32, '2020-09-28 00:00:00', 12, 0, 0, 15, 1, 18.90, '2020-09-28', 0, '2020-09-28', 1, '09:00:00', '21:00:00', '12:00:00', 0, 0, 0, 'Hardworking,Multitasking', 0, 0, 0, 0, '18', 1, 1, '2020-09-27 11:05:42'),
(33, '2020-09-28 00:00:00', 12, 0, 0, 15, 0, 18.90, '2020-09-28', 0, '2020-09-28', 1, '00:00:00', '00:00:00', '31:00:00', 1, 0, 0, 'Attentiveness,MS Office,Multitasking', 0, 0, 0, 0, '18', 1, 1, '2020-09-27 11:08:12'),
(34, '2020-09-28 00:00:00', 18, 0, 0, 15, 0, 18.90, '2020-09-28', 0, '2020-09-28', 0, '00:00:00', '00:00:00', '46:00:00', 1, 0, 0, '', 0, 0, 0, 0, '18', 1, 0, '2020-09-28 00:52:56'),
(35, '2020-09-28 00:00:00', 18, 1, 1, 15, 1, 18.90, '2020-10-01', 0, '2020-09-28', 1, '04:00:00', '17:00:00', '13:00:00', 0, 0, 0, 'Time Management,Attentiveness', 0, 0, 0, 0, '18', 1, 1, '2020-09-28 02:19:44'),
(36, '2020-09-28 00:00:00', 18, 1, 1, 15, 1, 18.90, '2020-09-28', 0, '2020-09-28', 1, '02:00:00', '00:00:00', '22:00:00', 0, 0, 0, '', 0, 0, 0, 0, '18', 1, 1, '2020-09-28 04:16:31'),
(37, '2020-09-30 00:00:00', 18, 1, 1, 1, 0, 25.00, '2020-09-30', 0, '2020-09-30', 1, '06:00:00', '14:00:00', '00:00:00', 0, 1, 3, '', 0, 0, 0, 0, '18', 1, 0, '2020-09-30 01:03:37'),
(38, '2020-09-30 00:00:00', 18, 1, 0, 1, 0, 18.90, '2020-09-30', 0, '2020-09-30', 0, '06:00:00', '13:00:00', '00:00:00', 0, 0, 0, '', 0, 0, 0, 0, '18', 1, 1, '2020-09-30 01:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `profilemultijobtitles`
--

CREATE TABLE `profilemultijobtitles` (
  `id` int(11) NOT NULL,
  `profileid` int(11) NOT NULL,
  `jobTitleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profilemultijobtitles`
--

INSERT INTO `profilemultijobtitles` (`id`, `profileid`, `jobTitleid`) VALUES
(27, 35, 1),
(28, 36, 1),
(29, 37, 5),
(30, 38, 5);

-- --------------------------------------------------------

--
-- Table structure for table `profilemultilocationsub`
--

CREATE TABLE `profilemultilocationsub` (
  `id` int(11) NOT NULL,
  `profileid` int(11) NOT NULL,
  `locationSubid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profilemultilocationsub`
--

INSERT INTO `profilemultilocationsub` (`id`, `profileid`, `locationSubid`) VALUES
(19, 32, 70),
(20, 35, 2),
(21, 35, 68),
(22, 35, 70),
(23, 36, 1),
(24, 36, 2),
(25, 36, 68);

-- --------------------------------------------------------

--
-- Table structure for table `ratingemp`
--

CREATE TABLE `ratingemp` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingemp`
--

INSERT INTO `ratingemp` (`id`, `empid`, `userid`, `comment`, `rating`, `status`, `timeStamp`) VALUES
(1, 11, 12, 'nothing', 4, 1, '2020-10-03 04:21:54'),
(2, 11, 12, 'nothing2', 5, 1, '2020-10-03 04:12:38'),
(3, 11, 12, 'erer', 2, 1, '2020-10-03 06:24:49'),
(4, 11, 12, 'Happy to join in the team', 1, 1, '2020-10-03 07:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `ratingseeker`
--

CREATE TABLE `ratingseeker` (
  `id` int(11) NOT NULL,
  `seekerid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingseeker`
--

INSERT INTO `ratingseeker` (`id`, `seekerid`, `userid`, `comment`, `rating`, `status`, `timeStamp`) VALUES
(1, 12, 11, 'no comment', 3, 1, '2020-10-03 04:37:03'),
(2, 12, 11, 'nonoe', 4, 1, '2020-10-03 04:37:54'),
(5, 12, 11, '', 1, 1, '2020-10-03 05:55:50'),
(6, 12, 11, 'sdsdsa', 1, 1, '2020-10-03 05:57:22'),
(7, 12, 11, 'wewqewew', 1, 1, '2020-10-03 05:58:11'),
(8, 12, 11, '', 1, 1, '2020-10-03 05:59:41'),
(9, 12, 11, 'sadsdsa', 3, 1, '2020-10-03 06:00:38'),
(10, 12, 11, 'fggfdgfd', 1, 1, '2020-10-03 07:35:38'),
(11, 12, 12, 'Happy to work in the team', 1, 1, '2020-10-03 08:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_type` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `suburb` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_type`, `email`, `password`, `userName`, `address1`, `address2`, `suburb`, `city`, `postcode`, `telephone`, `image`, `status`, `timeStamp`) VALUES
(11, 1, 'emp', 'ac8be4aee61f5f6e21b8c5afffb52939', 'Woolworths Supermarket', '15/134 Dixon Street', '', 'Te Aro', 'Wellington', '6011', '0284228131', '1', 1, '2020-09-26 07:15:51'),
(12, 2, 'seeker', 'cb9f81491427f30112d8cd0ec97e97fc', 'Willard Carroll Smith', '21 Kensington Avenue', 'No address 2', 'Petone', 'Lower Hutt', '5012', '02325252525', '1', 1, '2020-09-27 20:44:53'),
(17, 1, 'emp2', '41ab3465e911f91509d3fae308f41f76', 'Priyanka Chopra', '244 Victoria Street', '', 'Te Aro', 'Wellington', '6011', '1234567890', '1', 1, '2020-09-27 21:16:53'),
(18, 2, 'seeker2', 'cd607140f889954c095cb9d6a0041331', 'John Cena', '15 Dixon Street,', '', 'Te Aro', 'Wellington', '6011', '342423432', '1', 1, '2020-09-27 21:57:36'),
(19, 1, 'rubansabestian@gmail.com', '16d9c7d63c7c1c7b6839d3f17bcc7bd6', 'Ruban Sebastian', '35 pikarere street', 'Titahi bay', 'Porirua', 'Wellington', '5022', '0224977311', '0', 1, '2020-09-27 22:30:20'),
(20, 2, 'ruban.sebastian@student.weltec.ac.nz', '16d9c7d63c7c1c7b6839d3f17bcc7bd6', 'Ruban Sebastian', '35 pikarere street', 'Titahi bay', 'Porirua', 'Wellington', '5022', '0224977311', '0', 1, '2020-09-27 22:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `jobid`, `skill`, `status`, `timeStamp`) VALUES
(9, 1, 'Time Management', 1, '2020-09-21 08:11:45'),
(10, 1, 'Consistency', 1, '2020-09-21 08:11:45'),
(11, 1, 'Attentiveness', 1, '2020-09-21 08:11:45'),
(12, 1, 'Hardworking', 1, '2020-09-21 08:11:45'),
(13, 2, 'Time Management', 1, '2020-09-21 08:12:29'),
(14, 2, 'Consistency', 1, '2020-09-21 08:12:30'),
(15, 2, 'Attentiveness', 1, '2020-09-21 08:12:30'),
(16, 2, 'Hardworking', 1, '2020-09-21 08:12:30'),
(17, 3, 'Hardworking', 1, '2020-09-21 08:12:50'),
(18, 3, 'Cooking', 1, '2020-09-21 08:12:50'),
(19, 3, 'Multitasking', 1, '2020-09-21 08:12:51'),
(20, 3, 'Communication', 1, '2020-09-21 08:12:51'),
(21, 4, 'Communication', 1, '2020-09-21 08:13:08'),
(22, 4, 'Time Management', 1, '2020-09-21 08:13:08'),
(23, 4, 'Multitasking', 1, '2020-09-21 08:13:08'),
(24, 4, 'Interpersonal', 1, '2020-09-21 08:13:08'),
(25, 5, 'MS Office ', 1, '2020-09-21 08:13:21'),
(26, 5, 'Communication', 1, '2020-09-21 08:27:55'),
(27, 5, 'Professionalism', 1, '2020-09-21 08:13:21'),
(28, 5, 'Interpersonal\n', 1, '2020-09-21 08:13:21'),
(29, 6, 'Hardworking', 1, '2020-09-21 08:13:38'),
(30, 6, 'Consistency', 1, '2020-09-21 08:13:38'),
(31, 6, 'Attentiveness', 1, '2020-09-21 08:13:38'),
(32, 6, 'Attentiveness', 1, '2020-09-21 08:13:38'),
(33, 7, 'Multitasking', 1, '2020-09-21 08:15:18'),
(34, 7, 'Time Management', 1, '2020-09-21 08:15:18'),
(35, 7, 'Consistency and Attentiveness', 1, '2020-09-21 08:15:19'),
(36, 8, 'Reliability', 1, '2020-09-21 08:15:33'),
(37, 8, ' Trustworthiness', 1, '2020-09-21 08:15:34'),
(38, 8, 'Communication', 1, '2020-09-21 08:16:12'),
(39, 9, 'Hardworking', 1, '2020-09-21 08:16:17'),
(40, 9, 'Consistency', 1, '2020-09-21 08:16:17'),
(41, 9, 'Attentiveness', 1, '2020-09-21 08:16:17'),
(42, 9, 'Multitasking', 1, '2020-09-21 08:16:18'),
(43, 10, 'Communication', 1, '2020-09-21 08:16:34'),
(44, 10, 'Time Management', 1, '2020-09-21 08:16:34'),
(45, 11, 'Flexibility', 1, '2020-09-21 08:16:50'),
(46, 11, 'Multitasking', 1, '2020-09-21 08:16:50'),
(47, 11, 'Stress Management', 1, '2020-09-21 08:16:51'),
(48, 11, 'Communication', 1, '2020-09-21 08:16:51'),
(49, 11, 'Time Management', 1, '2020-09-21 08:16:51'),
(50, 12, 'MS Office', 1, '2020-09-21 08:17:06'),
(51, 12, 'Communications', 1, '2020-09-21 08:17:06'),
(52, 12, 'Interpersonal', 1, '2020-09-21 08:17:06'),
(53, 12, 'Multitasking capability', 1, '2020-09-21 08:17:06'),
(54, 13, 'Multitasking', 1, '2020-09-21 08:17:20'),
(55, 13, 'Cooking', 1, '2020-09-21 08:17:21'),
(56, 13, 'Leadership', 1, '2020-09-21 08:17:21'),
(57, 13, 'Time Management', 1, '2020-09-21 08:17:21'),
(58, 14, 'Stress Management ', 1, '2020-09-21 08:17:34'),
(59, 14, 'Hardworking', 1, '2020-09-21 08:17:35'),
(60, 14, 'Welding', 1, '2020-09-21 08:17:35'),
(61, 15, 'Hardworking', 1, '2020-09-21 08:17:50'),
(62, 15, 'Consistency ', 1, '2020-09-21 08:17:50'),
(63, 15, 'Attentiveness', 1, '2020-09-21 08:17:50'),
(64, 15, 'Multitasking', 1, '2020-09-21 08:17:50'),
(65, 16, 'MS Office', 1, '2020-09-21 08:18:06'),
(66, 16, 'Communications', 1, '2020-09-21 08:18:06'),
(67, 16, 'Interpersonal', 1, '2020-09-21 08:18:06'),
(68, 16, 'Multitasking Capability', 1, '2020-09-21 08:18:06'),
(69, 17, 'MS Office', 1, '2020-09-21 08:18:21'),
(70, 17, 'Communications', 1, '2020-09-21 08:18:21'),
(71, 17, 'Professionalism', 1, '2020-09-21 08:18:21'),
(72, 17, 'Interpersonal', 1, '2020-09-21 08:18:21'),
(73, 17, 'French', 1, '2020-09-21 08:18:21'),
(74, 17, 'English', 1, '2020-09-21 08:18:21'),
(75, 17, 'German', 1, '2020-09-21 08:18:21'),
(76, 17, 'Spanish', 1, '2020-09-21 08:18:21'),
(77, 18, 'Hardworking', 1, '2020-09-21 08:18:34'),
(78, 18, 'Consistency', 1, '2020-09-21 08:18:34'),
(79, 18, 'Attentiveness', 1, '2020-09-21 08:18:34'),
(80, 18, 'Multitasking', 1, '2020-09-21 08:18:34'),
(81, 19, 'Communication', 1, '2020-09-21 08:18:48'),
(82, 19, 'Time Management', 1, '2020-09-21 08:18:48'),
(83, 19, 'Multitasking', 1, '2020-09-21 08:18:48'),
(84, 19, 'Interpersonal', 1, '2020-09-21 08:18:48'),
(85, 20, 'Hardworking', 1, '2020-09-21 08:19:03'),
(86, 20, 'Consistency', 1, '2020-09-21 08:19:03'),
(87, 20, ' Attentiveness', 1, '2020-09-21 08:19:03'),
(88, 20, 'Multitasking', 1, '2020-09-21 08:19:03'),
(89, 20, 'Heavy lifting', 1, '2020-09-21 08:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `timediffjobs`
--

CREATE TABLE `timediffjobs` (
  `id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `mon1` time NOT NULL,
  `mon2` time NOT NULL,
  `tue1` time NOT NULL,
  `tue2` time NOT NULL,
  `wed1` time NOT NULL,
  `wed2` time NOT NULL,
  `thu1` time NOT NULL,
  `thu2` time NOT NULL,
  `fri1` time NOT NULL,
  `fri2` time NOT NULL,
  `sat1` time NOT NULL,
  `sat2` time NOT NULL,
  `sun1` time NOT NULL,
  `sun2` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timediffjobs`
--

INSERT INTO `timediffjobs` (`id`, `jobid`, `mon1`, `mon2`, `tue1`, `tue2`, `wed1`, `wed2`, `thu1`, `thu2`, `fri1`, `fri2`, `sat1`, `sat2`, `sun1`, `sun2`, `status`, `timeStamp`) VALUES
(14, 28, '14:00:00', '23:00:00', '11:00:00', '10:00:00', '00:00:00', '00:00:00', '00:00:00', '09:00:00', '00:00:00', '00:00:00', '00:00:00', '06:00:00', '00:00:00', '00:00:00', 1, '2020-09-27 11:04:25'),
(16, 31, '08:00:00', '10:00:00', '00:00:00', '06:00:00', '00:00:00', '11:00:00', '05:00:00', '09:00:00', '07:00:00', '11:00:00', '09:00:00', '14:00:00', '12:00:00', '16:00:00', 1, '2020-09-27 21:22:18'),
(17, 34, '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', '10:47:00', 1, '2020-09-29 21:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `timediffprofiles`
--

CREATE TABLE `timediffprofiles` (
  `id` int(11) NOT NULL,
  `profileid` int(11) NOT NULL,
  `mon1` time NOT NULL,
  `mon2` time NOT NULL,
  `tue1` time NOT NULL,
  `tue2` time NOT NULL,
  `wed1` time NOT NULL,
  `wed2` time NOT NULL,
  `thu1` time NOT NULL,
  `thu2` time NOT NULL,
  `fri1` time NOT NULL,
  `fri2` time NOT NULL,
  `sat1` time NOT NULL,
  `sat2` time NOT NULL,
  `sun1` time NOT NULL,
  `sun2` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timediffprofiles`
--

INSERT INTO `timediffprofiles` (`id`, `profileid`, `mon1`, `mon2`, `tue1`, `tue2`, `wed1`, `wed2`, `thu1`, `thu2`, `fri1`, `fri2`, `sat1`, `sat2`, `sun1`, `sun2`, `status`, `timeStamp`) VALUES
(14, 33, '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', '09:44:00', 1, '2020-09-27 20:44:04'),
(15, 34, '05:00:00', '05:00:00', '00:00:00', '00:00:00', '04:00:00', '08:00:00', '00:00:00', '09:00:00', '00:00:00', '10:00:00', '00:00:00', '11:00:00', '00:00:00', '12:00:00', 1, '2020-09-27 21:58:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userid`),
  ADD KEY `jobTitleID` (`jobTitleid`),
  ADD KEY `locations` (`location`);

--
-- Indexes for table `jobmatch`
--
ALTER TABLE `jobmatch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobidmatch` (`jobid`),
  ADD KEY `profileidfk` (`profileid`),
  ADD KEY `empidfk` (`empid`),
  ADD KEY `seekerids` (`seekerid`);

--
-- Indexes for table `jobtitle`
--
ALTER TABLE `jobtitle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_sub`
--
ALTER TABLE `locations_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location` (`subid`);

--
-- Indexes for table `loglogin`
--
ALTER TABLE `loglogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ProfileuserID` (`userid`);

--
-- Indexes for table `profilemultijobtitles`
--
ALTER TABLE `profilemultijobtitles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profileid` (`profileid`),
  ADD KEY `jobtitleidmulti` (`jobTitleid`);

--
-- Indexes for table `profilemultilocationsub`
--
ALTER TABLE `profilemultilocationsub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profilemultiid` (`profileid`),
  ADD KEY `profilesublocationid` (`locationSubid`);

--
-- Indexes for table `ratingemp`
--
ALTER TABLE `ratingemp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empratingid` (`empid`),
  ADD KEY `empratinguserid` (`userid`);

--
-- Indexes for table `ratingseeker`
--
ALTER TABLE `ratingseeker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratingseekerid` (`seekerid`),
  ADD KEY `ratingseekeruserid` (`userid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobsid` (`jobid`);

--
-- Indexes for table `timediffjobs`
--
ALTER TABLE `timediffjobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobidtimediff` (`jobid`);

--
-- Indexes for table `timediffprofiles`
--
ALTER TABLE `timediffprofiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profileidtimediff` (`profileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jobmatch`
--
ALTER TABLE `jobmatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `jobtitle`
--
ALTER TABLE `jobtitle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `locations_sub`
--
ALTER TABLE `locations_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `loglogin`
--
ALTER TABLE `loglogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `profilemultijobtitles`
--
ALTER TABLE `profilemultijobtitles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `profilemultilocationsub`
--
ALTER TABLE `profilemultilocationsub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ratingemp`
--
ALTER TABLE `ratingemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratingseeker`
--
ALTER TABLE `ratingseeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `timediffjobs`
--
ALTER TABLE `timediffjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `timediffprofiles`
--
ALTER TABLE `timediffprofiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `jobTitleID` FOREIGN KEY (`jobTitleid`) REFERENCES `jobtitle` (`id`),
  ADD CONSTRAINT `locations` FOREIGN KEY (`location`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`userid`) REFERENCES `register` (`id`);

--
-- Constraints for table `jobmatch`
--
ALTER TABLE `jobmatch`
  ADD CONSTRAINT `empidfk` FOREIGN KEY (`empid`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `jobidmatch` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `profileidfk` FOREIGN KEY (`profileid`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `seekerids` FOREIGN KEY (`seekerid`) REFERENCES `profile` (`userid`);

--
-- Constraints for table `locations_sub`
--
ALTER TABLE `locations_sub`
  ADD CONSTRAINT `location` FOREIGN KEY (`subid`) REFERENCES `locations` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `ProfileuserID` FOREIGN KEY (`userid`) REFERENCES `register` (`id`);

--
-- Constraints for table `profilemultijobtitles`
--
ALTER TABLE `profilemultijobtitles`
  ADD CONSTRAINT `jobtitleidmulti` FOREIGN KEY (`jobTitleid`) REFERENCES `jobtitle` (`id`),
  ADD CONSTRAINT `profileid` FOREIGN KEY (`profileid`) REFERENCES `profile` (`id`);

--
-- Constraints for table `profilemultilocationsub`
--
ALTER TABLE `profilemultilocationsub`
  ADD CONSTRAINT `profilemultiid` FOREIGN KEY (`profileid`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `profilesublocationid` FOREIGN KEY (`locationSubid`) REFERENCES `locations_sub` (`id`);

--
-- Constraints for table `ratingemp`
--
ALTER TABLE `ratingemp`
  ADD CONSTRAINT `empratingid` FOREIGN KEY (`empid`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `empratinguserid` FOREIGN KEY (`userid`) REFERENCES `register` (`id`);

--
-- Constraints for table `ratingseeker`
--
ALTER TABLE `ratingseeker`
  ADD CONSTRAINT `ratingseekerid` FOREIGN KEY (`seekerid`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `ratingseekeruserid` FOREIGN KEY (`userid`) REFERENCES `register` (`id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `jobsid` FOREIGN KEY (`jobid`) REFERENCES `jobtitle` (`id`);

--
-- Constraints for table `timediffjobs`
--
ALTER TABLE `timediffjobs`
  ADD CONSTRAINT `jobidtimediff` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`);

--
-- Constraints for table `timediffprofiles`
--
ALTER TABLE `timediffprofiles`
  ADD CONSTRAINT `profileidtimediff` FOREIGN KEY (`profileid`) REFERENCES `profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
