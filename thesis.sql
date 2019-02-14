-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 08:28 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `adminemail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminavatar` varchar(100) NOT NULL,
  `isactive` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `adminemail`, `password`, `adminavatar`, `isactive`) VALUES
(13, '098', '098@gmail.com', '92daa86ad43a42f28f4bf58e94667c95', '../Signin/images/avatar7.jpg', 1),
(14, 'Rairu', 'rylegarcia@gmail.com', '6486da2ca54b4ab13ecd392fd3a365d5', '../Signin/images/avatar.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(2, 'Jiu-Jitsu Session', '2018-04-10 11:30:00', '2018-04-10 17:30:00'),
(4, 'Ryle\'s bday', '2018-04-18 00:00:00', '2018-04-19 00:00:00'),
(6, 'Expiration of Ryle\'s Membership', '2018-04-11 00:00:00', '2018-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mfillup`
--

CREATE TABLE `mfillup` (
  `id` int(6) UNSIGNED NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_gender` varchar(50) NOT NULL,
  `u_age` int(11) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_contact` varchar(255) NOT NULL,
  `u_joindesc` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memprice` float NOT NULL DEFAULT '1500',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfillup`
--

INSERT INTO `mfillup` (`id`, `u_fname`, `u_lname`, `u_gender`, `u_age`, `u_address`, `u_contact`, `u_joindesc`, `username`, `reg_date`, `memprice`, `status`) VALUES
(7, 'Matthew', 'Toledo', 'male', 20, '623 Glenn Street Paranaque City', '09054041458', 'Because I want to learn the ways of Jiu-Jitsu!', 'matty', '2018-04-21 04:28:51', 1500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `isActive` int(10) NOT NULL DEFAULT '0',
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `isActive`, `regDate`) VALUES
(15, 'matty', 'matthewtoledo16@gmail.com', '21e80009107a6f9cdc927c2bcd34905d', 'images/avatar3.jpg', 1, '2018-04-21 05:46:23'),
(21, 'arielle2475', 'ariellevalmonte@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'images/avatar7.jpg', 1, '2018-04-23 05:14:28'),
(22, 'rai', 'rai@gmail.com', '202cb962ac59075b964b07152d234b70', 'images/avatar5.jpg', 1, '2018-04-23 05:17:01'),
(23, 'riley', 'reidriley@gmail.com', '202cb962ac59075b964b07152d234b70', 'images/avatar4.jpg', 0, '2018-04-23 05:19:15'),
(24, 'xav', 'xav@gmail.com', '202cb962ac59075b964b07152d234b70', 'images/avatar8.jpg', 0, '2018-04-23 05:27:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mfillup`
--
ALTER TABLE `mfillup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mfillup`
--
ALTER TABLE `mfillup`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
