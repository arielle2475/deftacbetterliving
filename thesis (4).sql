-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 01:04 PM
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
(13, 'Martin', 'martintoledo@gmail.com', '925d7518fc597af0e43f5606f9a51512', '../Signin/images/bigcoach3.png', 1),
(20, 'Ryle', 'rylegarcia@gmail.com', 'ed9b37d23424c920eda4cdeafe44d767', '../images/2.jpg', 1),
(22, 'Marla', 'marla@gmail.com', '1ccb314919e7edd6cb8ed97da77ae240', '../images/photo1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(17, 'PHP'),
(18, 'Java Programming'),
(20, 'Jiujitsu'),
(21, 'Webdev ');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `msg`, `date`) VALUES
(0, 'member', 'hello', '2019-02-23 07:32:07'),
(0, 'member', 'yes', '2019-02-23 07:33:12'),
(0, 'member', 'yes', '2019-02-23 07:43:45'),
(0, 'member', 'yes', '2019-02-23 09:03:01'),
(0, 'member', 'gsgsd', '2019-02-23 09:05:43'),
(0, 'member', 'yyyy', '2019-02-23 09:34:38'),
(0, 'member', 'yaaaaaaaaas', '2019-02-23 10:00:16'),
(0, 'member', 'juj', '2019-02-23 10:14:21'),
(0, 'lovely', 'hello', '2019-02-26 07:57:20'),
(0, 'lovely', 'cyst', '2019-02-26 07:57:51'),
(0, 'matty', 'hello', '2019-03-04 07:13:41'),
(0, 'matty', 'hello', '2019-03-08 06:13:23'),
(0, 'matty', 'macho man', '2019-03-08 06:13:30'),
(0, 'matty', 'hello po', '2019-03-08 06:24:29'),
(0, 'martin', 'yes hello', '2019-03-08 06:24:35'),
(0, 'matthew', 'hello', '2019-03-23 13:14:56'),
(0, 'Martin', 'hello', '2019-03-23 14:04:26'),
(0, 'Martin', 'hoy', '2019-03-23 16:31:59'),
(0, 'Martin', 'hoy', '2019-03-23 16:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'Unapproved',
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(35, 57, 'Matthew Toledo (member)', 'matthewtoledo16@gmail.com', 'mary anne lagi late', 'Approved', '2019-03-22'),
(47, 60, 'Henlo', 'enlo@gmail.com', 'yes', 'Unapproved', '2019-03-24');

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
(2, 'Jiu-Jitsu Session', '2018-04-10 15:00:00', '2018-04-10 19:00:00'),
(3, 'Yeye\'s bday', '2018-04-04 00:00:00', '2018-04-05 00:00:00'),
(5, 'henlo', '2019-01-30 00:00:00', '2019-01-31 00:00:00'),
(6, 'Jiu-jitsu Training', '2019-02-26 19:00:00', '2019-02-26 22:30:00'),
(7, 'Jiu Jitsu Training', '2019-03-20 06:00:00', '2019-03-20 15:30:00'),
(8, 'Training', '2019-02-26 00:00:00', '2019-02-27 00:00:00'),
(9, 'Debut', '2019-02-26 00:00:00', '2019-02-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mfillup`
--

CREATE TABLE `mfillup` (
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_gender` varchar(50) NOT NULL,
  `u_age` int(11) NOT NULL,
  `u_address` varchar(256) NOT NULL,
  `u_contact` varchar(255) NOT NULL,
  `u_joindesc` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `memprice` float NOT NULL DEFAULT '1500',
  `approvedDate` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `userid` int(11) NOT NULL,
  `expirationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfillup`
--

INSERT INTO `mfillup` (`u_fname`, `u_lname`, `u_gender`, `u_age`, `u_address`, `u_contact`, `u_joindesc`, `username`, `reg_date`, `memprice`, `approvedDate`, `status`, `userid`, `expirationDate`) VALUES
('Matthew', 'Toledo', 'Male', 23, '623 Glenn Street, Moonwalk Village', '09054041458', 'Need to learn the ways of jiu-jitsu', 'matthew', '2019-03-12 07:21:42', 1500, '2019-03-13 16:00:01', 1, 0, '2019-04-13 16:00:01'),
('First', 'Last', 'Male', 30, '623 Glenn Street, Moonwalk Village', '09054041458', 'sdsa', 'Username', '2019-03-12 07:15:20', 1500, '2019-03-23 13:13:59', 1, 0, '2019-04-23 13:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'Draft',
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views`) VALUES
(57, 20, 'Ariola Granola', 'martin', '2019-03-14', 'IMG_2732.jpg', '<p>YOS</p>', 'matt ', 0, 'Publish', 4),
(60, 17, 'no', 'martin', '2019-03-14', 'photo1.png', '<p>YOShghghghg</p>', 'matt ', 0, 'Publish', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `image_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `image_name`, `image_description`) VALUES
(47, 'event1.jpg', 'yes'),
(48, 'event2.jpg', ''),
(49, 'outing1.jpg', ''),
(50, 'outing2.jpg', ''),
(51, 'session.jpg', ''),
(52, 'session2.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `fileextension` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `description`, `filename`, `fileextension`) VALUES
(25, 'Deftac Highlight Reel', '43272859_312528916057236_8052456384509247488_n.mp4', 'mp4'),
(28, 'hehe', '48507629_208708460015337_2954676799428100096_n.mp4', 'mp4');

-- --------------------------------------------------------

--
-- Table structure for table `transhistory`
--

CREATE TABLE `transhistory` (
  `id` int(11) NOT NULL,
  `expDate` datetime DEFAULT NULL,
  `appDate` datetime DEFAULT NULL,
  `payment` double NOT NULL DEFAULT '2500',
  `usersid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transhistory`
--

INSERT INTO `transhistory` (`id`, `expDate`, `appDate`, `payment`, `usersid`) VALUES
(9, '2019-03-26 08:52:53', '2019-02-26 08:52:53', 2500, 9),
(10, '2019-03-26 08:54:07', '2019-02-26 08:54:07', 2500, 9),
(11, '2019-03-26 15:53:43', '2019-02-26 15:53:43', 2500, 9),
(12, '2019-03-26 15:53:58', '2019-02-26 15:53:58', 2500, 9),
(13, '2019-03-26 16:01:51', '2019-02-26 16:01:51', 2500, 9),
(14, '2019-04-02 15:54:20', '2019-03-02 15:54:20', 2500, 11),
(15, '2019-04-02 15:54:22', '2019-03-02 15:54:22', 2500, 12),
(16, '2019-04-02 15:57:38', '2019-03-02 15:57:38', 2500, 11),
(17, '2019-04-02 16:03:18', '2019-03-02 16:03:18', 2500, 0),
(18, '2019-04-02 16:03:21', '2019-03-02 16:03:21', 2500, 0),
(19, '2019-04-02 16:03:23', '2019-03-02 16:03:23', 2500, 0),
(20, '2019-04-02 16:03:26', '2019-03-02 16:03:26', 2500, 0),
(21, '2019-04-02 16:03:29', '2019-03-02 16:03:29', 2500, 0),
(22, '2019-04-02 16:09:57', '2019-03-02 16:09:57', 2500, 11),
(23, '2019-04-02 17:03:43', '2019-03-02 17:03:43', 2500, 11),
(24, '2019-04-04 19:09:03', '2019-03-04 19:09:03', 2500, 11),
(25, '2019-04-04 19:10:02', '2019-03-04 19:10:02', 2500, 11),
(26, '2019-04-04 19:10:12', '2019-03-04 19:10:12', 2500, 12),
(27, '2019-04-05 06:06:16', '2019-03-05 06:06:16', 2500, 11),
(28, '2019-04-08 04:07:06', '2019-03-08 04:07:06', 2500, 13),
(29, '2019-04-11 17:48:50', '2019-03-11 17:48:50', 2500, 11),
(30, '2019-04-11 17:48:57', '2019-03-11 17:48:57', 2500, 15),
(31, '2019-04-12 08:08:20', '2019-03-12 08:08:20', 2500, 14),
(32, '2019-04-12 08:20:27', '2019-03-12 08:20:27', 2500, 20),
(33, '2019-04-12 08:21:53', '2019-03-12 08:21:53', 2500, 21),
(34, '2019-04-13 15:59:30', '2019-03-13 15:59:30', 2500, 20),
(35, '2019-04-13 15:59:36', '2019-03-13 15:59:36', 2500, 20),
(36, '2019-04-13 15:59:41', '2019-03-13 15:59:41', 2500, 20),
(37, '2019-04-13 15:59:56', '2019-03-13 15:59:56', 2500, 20),
(38, '2019-04-13 16:00:01', '2019-03-13 16:00:01', 2500, 21),
(39, '2019-04-23 13:13:59', '2019-03-23 13:13:59', 2500, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `fileextension` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `description`, `filename`, `fileextension`) VALUES
(32, 'Deftac Better', 'fdfd', '10000000_283008062370142_6398972400179278862_n.mp4', 'mp4'),
(37, 'YEs', 'fdsfsdfsfds', '10000000_283008062370142_6398972400179278862_n.mp4', 'mp4');

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
  `isOnline` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `isActive`, `isOnline`) VALUES
(20, 'Username', 'email@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'images/shibe2.jpg', 1, 1),
(21, 'matthew', 'matthewtoledo16@gmail.com', 'e6a5ba0842a531163425d66839569a68', '1l.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mfillup`
--
ALTER TABLE `mfillup`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transhistory`
--
ALTER TABLE `transhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `transhistory`
--
ALTER TABLE `transhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
