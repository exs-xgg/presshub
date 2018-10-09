-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 05:27 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` mediumtext,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` int(11) NOT NULL,
  `is_active` varchar(1) DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `body`, `date_created`, `author`, `is_active`) VALUES
(2, 'Dummy Data', 'Dummy Function', '2018-09-29 20:44:18', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(3) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `body` mediumtext,
  `deadline` date DEFAULT NULL,
  `date_finished` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `issue_id`, `name`, `date_created`, `date_updated`, `status`, `title`, `body`, `deadline`, `date_finished`) VALUES
(2, 7, 'CCS Wins TORO 2018', '2018-10-01 18:49:44', '2018-10-09 22:32:03', 'H', 'CCS Wins TORO', 'SW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMgSW5zZXJ0IGNvbnRlbnQgaGVyZS4uLmFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZGFzZCBhc2QgYXNkIGFkIGFzZCBhZHMg', '2018-10-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_edited` varchar(1) DEFAULT 'N',
  `is_resolved` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` varchar(4) DEFAULT NULL,
  `description` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `description`) VALUES
('ADM', 'ADMINISTRATOR'),
('EIC', 'Editor-in-Chief'),
('PHO', 'PHOTOGRAPHER'),
('FEA', 'FEATURE WRITER'),
('ASS', 'ASSOCIATE EIC');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `private` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `user_id`, `date_uploaded`, `private`) VALUES
(1, 'epcb2.PNG', 5, '2018-10-09 15:06:46', 'N'),
(2, 'MVC.jpg', 5, '2018-10-09 15:09:50', 'Y'),
(3, 'Authorization Letter.docx', 5, '2018-10-09 15:10:03', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `date_started` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_last_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deadline` datetime NOT NULL,
  `date_finished` date DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  `is_archived` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `nickname`, `date_started`, `date_last_updated`, `deadline`, `date_finished`, `status`, `is_archived`) VALUES
(4, 'Test Issue', '2018-10-16 00:00:00', '2018-10-01 17:30:37', '2018-10-20 00:00:00', NULL, 'O', 'N'),
(7, 'Sports Issue 2018 2nd Sem', '2018-08-28 00:00:00', '2018-09-30 21:48:48', '2018-09-28 00:00:00', NULL, 'H', 'N'),
(8, 'aaaaaaaaaaaaaa', '2018-09-04 00:00:00', '2018-09-30 20:32:42', '2018-09-08 00:00:00', NULL, 'O', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date_of_meeting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `details` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `minutes`
--

CREATE TABLE `minutes` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `body` mediumtext NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` varchar(1) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `designation` varchar(4) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email_addr` varchar(30) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_admin` varchar(1) NOT NULL,
  `is_active` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `designation`, `contact_no`, `email_addr`, `date_created`, `date_updated`, `is_admin`, `is_active`) VALUES
(5, 'rain', 'MjQzZGMxMzkzMGIyNTkxMWViOWMyMzJhNzllMzcwN2I=', 'Rain', 'Maristela', 'Pioquinto', 'ADM', '9177994321', 'rain@gmail.com', '2018-08-14 21:44:55', NULL, 'Y', 'N'),
(6, 'josh', 'NjY5YWYwMTZhZDdkZjg2ZTU1N2ZlY2U0MWIwZmRjZjQ=', 'Josh', 'M', 'Kotlin', 'FEA', '9875456', 'qweqwe@dasd.cd', '2018-08-29 12:09:24', NULL, 'Y', 'N'),
(7, 'romeo', 'NTAxY2Q4M2JlZGU4ZGQyM2IxZjJjN2VlMjdhMmFmOWE=', 'Romeo', 'E', 'David', 'Edi', '987654321', 'asdasd@asda.casd', '2018-09-01 10:43:16', NULL, 'Y', 'N'),
(8, 'anne', 'NDcyMGM2Yjc0NDE1NTVmY2ViZDU2YmY4YjA5MGM1ZjM=', 'Anne', 'Curtis', 'Heusaff', 'FEA', '9812312311', 'annecurtis@gmail.com', '2018-09-13 00:29:43', NULL, 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `user_article`
--

CREATE TABLE `user_article` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_article`
--

INSERT INTO `user_article` (`id`, `user`, `article`) VALUES
(1, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_issue`
--

CREATE TABLE `user_issue` (
  `user` int(11) NOT NULL,
  `issue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minutes`
--
ALTER TABLE `minutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_article`
--
ALTER TABLE `user_article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `minutes`
--
ALTER TABLE `minutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_article`
--
ALTER TABLE `user_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
