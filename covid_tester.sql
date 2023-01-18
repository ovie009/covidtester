-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 09:56 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_tester`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_type` varchar(20) NOT NULL
);

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `account_type`) VALUES
(1, 'Kelvin_Doctor', 'Kelvin2023', 'Doctor'),
(2, 'Kelvin_Patient', 'Kelvin2023', 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `readings`
--

CREATE TABLE `readings` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `temperature` int(10) NOT NULL,
  `heart_rate` int(10) NOT NULL,
  `oxygen_level` int(10) NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp()
);

--
-- Dumping data for table `readings`
--

INSERT INTO `readings` (`id`, `fullname`, `temperature`, `heart_rate`, `oxygen_level`, `time_stamp`) VALUES
(4, 'Jasmine Aleanjro', 33, 80, 90, '2022-11-07 21:43:00'),
(5, 'Jasmine Aleanjro', 37, 90, 93, '2022-06-25 07:02:06'),
(6, 'Jasmine Aleanjro', 39, 90, 96, '2022-11-16 10:18:42'),
(7, 'Jasmine Aleanjro', 39, 80, 95, '2022-01-20 03:30:30'),
(8, 'Jasmine Aleanjro', 30, 61, 98, '2022-05-31 00:47:47'),
(9, 'Jasmine Aleanjro', 36, 67, 97, '2022-02-05 22:54:41'),
(10, 'Jonathan Dominic', 36, 90, 96, '2022-03-09 09:29:00'),
(11, 'Jonathan Dominic', 39, 80, 99, '2022-12-11 21:43:33'),
(12, 'Jonathan Dominic', 35, 70, 94, '2022-08-30 20:57:34'),
(13, 'Jonathan Dominic', 31, 62, 97, '2022-04-17 07:10:04'),
(14, 'Jonathan Dominic', 38, 80, 99, '2022-06-23 00:13:51'),
(15, 'Jonathan Dominic', 36, 61, 95, '2022-10-01 16:38:55'),
(16, 'Jonathan Dominic', 36, 61, 90, '2022-08-06 09:06:46'),
(17, 'Jonathan Dominic', 34, 75, 97, '2022-08-23 14:12:16'),
(18, 'Jonathan Dominic', 30, 70, 96, '2022-12-14 19:26:20'),
(19, 'Jonathan Dominic', 31, 61, 91, '2022-07-06 03:11:03'),
(20, 'Jonathan Dominic', 38, 75, 94, '2022-05-23 08:11:40'),
(21, 'Jonathan Dominic', 39, 75, 98, '2022-07-16 00:57:44'),
(22, 'Jonathan Dominic', 38, 90, 96, '2022-10-23 23:01:41'),
(23, 'Jonathan Dominic', 33, 80, 95, '2022-03-31 21:41:42'),
(24, 'Jonathan Dominic', 30, 90, 98, '2022-09-01 17:26:23'),
(25, 'Jonathan Dominic', 35, 60, 92, '2022-02-27 10:21:20'),
(26, 'Jonathan Dominic', 34, 80, 92, '2022-10-05 10:26:46'),
(27, 'Clark kent', 31, 62, 96, '2022-10-15 07:41:31'),
(28, 'Clark kent', 33, 90, 90, '2022-12-09 17:57:49'),
(29, 'Clark kent', 39, 60, 94, '2022-08-12 01:49:49'),
(30, 'Clark kent', 38, 67, 100, '2022-12-10 18:15:29'),
(31, 'Clark kent', 36, 70, 98, '2022-09-10 02:51:15'),
(32, 'Jonathan Dominic', 30, 90, 92, '2022-11-11 16:13:18'),
(33, 'Jonathan Dominic', 34, 80, 100, '2022-05-17 10:14:36'),
(34, 'Jonathan Dominic', 30, 62, 94, '2022-03-09 04:08:02'),
(35, 'Jonathan Dominic', 30, 70, 97, '2022-06-26 11:18:32'),
(36, 'Jonathan Dominic', 38, 61, 94, '2022-10-31 16:37:47'),
(37, 'Jonathan Dominic', 32, 63, 90, '2022-05-06 11:09:13'),
(38, 'Jonathan Dominic', 39, 63, 100, '2022-02-25 19:21:56'),
(39, 'Jonathan Dominic', 33, 80, 100, '2023-01-06 19:07:24'),
(40, 'Jonathan Dominic', 35, 90, 95, '2022-04-30 19:45:33'),
(41, 'Jonathan Dominic', 35, 60, 93, '2022-07-20 18:34:27'),
(42, 'Jonathan Dominic', 32, 60, 98, '2022-09-04 20:49:16'),
(43, 'Jonathan Dominic', 32, 90, 92, '2022-12-03 13:04:45'),
(44, 'Jonathan Dominic', 36, 80, 94, '2022-05-04 05:20:34'),
(45, 'Jonathan Dominic', 34, 61, 96, '2022-10-18 05:59:29'),
(46, 'Jonathan Dominic', 34, 63, 100, '2022-04-17 12:08:14'),
(47, 'Jonathan Dominic', 30, 75, 91, '2022-11-05 01:32:30'),
(48, 'Jonathan Dominic', 38, 90, 93, '2022-03-31 16:06:23'),
(49, 'Jonathan Dominic', 35, 60, 90, '2022-08-19 13:09:33'),
(50, 'Jonathan Dominic', 35, 90, 96, '2022-10-12 06:20:57'),
(51, 'Jonathan Dominic', 31, 62, 91, '2022-09-03 06:01:41'),
(52, 'Jonathan Dominic', 37, 80, 94, '2022-08-07 16:29:35'),
(53, 'Jonathan Dominic', 35, 60, 94, '2022-08-11 03:26:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readings`
--
ALTER TABLE `readings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `readings`
--
ALTER TABLE `readings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
