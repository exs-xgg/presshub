-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 02:42 AM
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
(3, 'Meeting1', 'HAHAHAHA\nGUMAGANA NA SIYA BES', '2018-10-10 11:40:30', 5, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `cat_id` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_done` varchar(1) DEFAULT 'N',
  `body` mediumtext,
  `deadline` date DEFAULT NULL,
  `date_finished` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `issue_id`, `cat_id`, `name`, `date_created`, `date_updated`, `is_done`, `body`, `deadline`, `date_finished`) VALUES
(2, 7, 'News', 'CCS Wins TORO 2018', '2018-10-01 18:49:44', '2018-10-11 23:28:52', 'N', 'PGRpdiBjbGFzcz0icWwtZWRpdG9yIiBkYXRhLWdyYW1tPSJmYWxzZSIgZGF0YS1wbGFjZWhvbGRlcj0iQ29tcG9zZSBhbiBlcGljLi4uIiBjb250ZW50ZWRpdGFibGU9InRydWUiPjxoMT48c3Ryb25nPkNDUyBHcmFicyBDaGFtcGlvbiBUaXRsZSBpbiBSZWdpb25hbCBDb21wZXRpdGlvbjwvc3Ryb25nPjwvaDE+PHA+CTxlbT5BbmdlbGVzLCBQYW1wYW5nYSA8L2VtPi0gTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gUGhhc2VsbHVzIHBsYWNlcmF0IGVnZXN0YXMganVzdG8sIGlkIGdyYXZpZGEgZGlhbSBwb3J0dGl0b3IgdXQuIFBlbGxlbnRlc3F1ZSBtYWxlc3VhZGEgbGFjdXMgdXQgZGljdHVtIHBsYWNlcmF0LiBJbnRlZ2VyIGNvbmd1ZSBvcmNpIGFjIG5pc2kgZmVybWVudHVtIGF1Y3Rvci4gRnVzY2UgcGxhY2VyYXQgbWV0dXMgc2l0IGFtZXQganVzdG8gbW9sbGlzLCBub24gc29kYWxlcyB0ZWxsdXMgcGxhY2VyYXQuIEludGVnZXIgcXVpcyBzb2xsaWNpdHVkaW4gZW5pbSwgbm9uIG1vbGxpcyBtYWduYS4gUGVsbGVudGVzcXVlIGVsZW1lbnR1bSBlbGVtZW50dW0gY29tbW9kby4gQ3VyYWJpdHVyIGludGVyZHVtIG51bGxhIHNjZWxlcmlzcXVlIGxvcmVtIGlhY3VsaXMsIHNpdCBhbWV0IHRpbmNpZHVudCBhbnRlIGN1cnN1cy4gQWxpcXVhbSBuaXNpIGlwc3VtLCB2YXJpdXMgdXQgbWkgbmVjLCByaG9uY3VzIGZldWdpYXQgYXJjdS4gVmVzdGlidWx1bSB2b2x1dHBhdCBtYXNzYSBuZWMgcnV0cnVtIG1vbGxpcy4gVml2YW11cyB2aXRhZSB2b2x1dHBhdCBtYWduYSwgZWdldCBmaW5pYnVzIG9kaW8uIFNlZCBxdWlzIHRvcnRvciB2ZWxpdC4gSW4gdXQgZXJvcyBldCBleCBwaGFyZXRyYSBldWlzbW9kLjwvcD48cD5Nb3JiaSBzaXQgYW1ldCB0ZWxsdXMgZXQgbnVuYyB0cmlzdGlxdWUgcHJldGl1bS4gTWF1cmlzIGF0IGRpZ25pc3NpbSBsYWN1cy4gRG9uZWMgZW5pbSBkaWFtLCBtb2xsaXMgbm9uIG5pYmggZXUsIGVsZWlmZW5kIHBlbGxlbnRlc3F1ZSBuZXF1ZS4gVXQgaWQgcmhvbmN1cyBqdXN0by4gTW9yYmkgaW4gdXJuYSBpcHN1bS4gRG9uZWMgdGluY2lkdW50IHZlbCBtYXVyaXMgc2VkIHRlbXBvci4gRXRpYW0gYSBmcmluZ2lsbGEgbmlzaS4gVXQgYSBlc3QgZGljdHVtLCB0ZW1wdXMgZWxpdCBuZWMsIHZ1bHB1dGF0ZSBlcmF0LiBOYW0gYmxhbmRpdCBsaWd1bGEgcXVpcyBsaWd1bGEgY29uZ3VlLCBpZCB1bGxhbWNvcnBlciB2ZWxpdCB2b2x1dHBhdC4gTWF1cmlzIGxpYmVybyBuaWJoLCBzZW1wZXIgbmVjIHNhcGllbiBpbiwgaW50ZXJkdW0gcmhvbmN1cyBvcmNpLiBVdCBhdWd1ZSBuaWJoLCBmaW5pYnVzIG5vbiBtYXVyaXMgZXUsIHVsbGFtY29ycGVyIGNvbmRpbWVudHVtIGV4LiBEb25lYyBmZXVnaWF0IGxlY3R1cyBsb3JlbSwgbmVjIHRpbmNpZHVudCBlcm9zIHZlc3RpYnVsdW0gbm9uLiBBZW5lYW4gZWdldCBlZmZpY2l0dXIgbmlzaSwgZXQgc3VzY2lwaXQgbWkuIFNlZCB0dXJwaXMgcmlzdXMsIG1vbGxpcyBhYyBxdWFtIG5lYywgc29kYWxlcyBhbGlxdWFtIHF1YW0uPC9wPjwvZGl2PjxkaXYgY2xhc3M9InFsLWNsaXBib2FyZCIgdGFiaW5kZXg9Ii0xIiBjb250ZW50ZWRpdGFibGU9InRydWUiPjwvZGl2PjxkaXYgY2xhc3M9InFsLXRvb2x0aXAgcWwtaGlkZGVuIj48YSBjbGFzcz0icWwtcHJldmlldyIgdGFyZ2V0PSJfYmxhbmsiIGhyZWY9ImFib3V0OmJsYW5rIj48L2E+PGlucHV0IGRhdGEtZm9ybXVsYT0iZT1tY14yIiBkYXRhLWxpbms9Imh0dHBzOi8vcXVpbGxqcy5jb20iIGRhdGEtdmlkZW89IkVtYmVkIFVSTCIgdHlwZT0idGV4dCI+PGEgY2xhc3M9InFsLWFjdGlvbiI+PC9hPjxhIGNsYXNzPSJxbC1yZW1vdmUiPjwvYT48L2Rpdj4=', '2018-10-23', NULL),
(3, 7, 'News', 'TSU 108th Foundation Week', '2018-10-11 12:55:06', '2018-10-12 11:22:57', 'N', 'PGRpdiBjbGFzcz0icWwtZWRpdG9yIiBkYXRhLWdyYW1tPSJmYWxzZSIgZGF0YS1wbGFjZWhvbGRlcj0iQ29tcG9zZSBhbiBlcGljLi4uIiBjb250ZW50ZWRpdGFibGU9InRydWUiPjxwPglQcmlvciB0byB0cmFpbmluZyB0aGUgdGVhbSBjaGVjayBhbmQgY2hhbmdlIGFsbCBjbGllbnQgY29tcHV0ZXJzIHRpbWUgem9uZSB0byArOCBhbmQgc2V0IHRoZSBhY3R1YWwgdGltZSBhbmQgZGF0ZSwgSW5zdGFsbCBhbmQgdXBkYXRlIGdvb2dsZSBjaHJvbWUgb2YgYWxsIGNsaWVudCBjb21wdXRlcnMsIHByZXBhcmUgYW5kIGluc3RhbGwgYSBmcmVzaCBNaXN1V0FIIHNlcnZlciBhbmQgaW5zdGFsbCBhIG5ldHdvcmsgc3lzdGVtIHRvIGFsbG93IGFsbCBjbGllbnQgY29tcHV0ZXIgdG8gY29ubmVjdCB0byB0aGUgV0FIIHN5c3RlbSB1c2luZyByb3V0ZXIgYW5kIG5ldHdvcmsgc3dpdGNoZXMuIE9uIHRoZSByZW1haW5kZXIgb2YgdGhlIDQgZGF5cyB0cmFpbmluZywgdGhlIHRlY2huaWNhbCBwb2ludCBwZXJzb24gYXNzaXN0IHRoZSBXQUggaGVhbHRoIHByb2dyYW0gcGFydG5lciBieSBwcm92aWRpbmcgc3RhYmxlIGNvbm5lY3Rpdml0eSAsIEluc3RhbGwgYSBuZXR3b3JrIGNvbm5lY3Rpb24gYnkgcGxhY2luZyB0aGUgcm91dGVyIHRvIGEgc3RyYXRlZ2ljIHBvaW50IGFuZCB0cmFpbnMgdGhlIHN5c3RlbSBhZG1pbmlzdHJhdG9ycyBvbiBiYXNpYyB0cm91Ymxlc2hvb3RpbmcgYW5kIGJhY2stdXAgcHJvY2Vzcy4gJm5ic3A7PC9wPjwvZGl2PjxkaXYgY2xhc3M9InFsLWNsaXBib2FyZCIgdGFiaW5kZXg9Ii0xIiBjb250ZW50ZWRpdGFibGU9InRydWUiPjwvZGl2PjxkaXYgY2xhc3M9InFsLXRvb2x0aXAgcWwtaGlkZGVuIj48YSBjbGFzcz0icWwtcHJldmlldyIgdGFyZ2V0PSJfYmxhbmsiIGhyZWY9ImFib3V0OmJsYW5rIj48L2E+PGlucHV0IGRhdGEtZm9ybXVsYT0iZT1tY14yIiBkYXRhLWxpbms9Imh0dHBzOi8vcXVpbGxqcy5jb20iIGRhdGEtdmlkZW89IkVtYmVkIFVSTCIgdHlwZT0idGV4dCI+PGEgY2xhc3M9InFsLWFjdGlvbiI+PC9hPjxhIGNsYXNzPSJxbC1yZW1vdmUiPjwvYT48L2Rpdj4=', '2018-11-02', NULL),
(4, 7, 'Sports', 'Red Hawks bagged 2 golds', '2018-10-11 12:57:24', '2018-10-11 20:26:08', 'N', NULL, '2018-10-10', NULL),
(5, 7, 'Literary', 'qwe', '2018-10-12 10:53:11', '2018-10-12 11:23:09', 'N', 'PGRpdiBjbGFzcz0icWwtZWRpdG9yIiBkYXRhLWdyYW1tPSJmYWxzZSIgZGF0YS1wbGFjZWhvbGRlcj0iQ29tcG9zZSBhbiBlcGljLi4uIiBjb250ZW50ZWRpdGFibGU9InRydWUiPjxwPglQcmlvciB0byB0cmFpbmluZyB0aGUgdGVhbSBjaGVjayBhbmQgY2hhbmdlIGFsbCBjbGllbnQgY29tcHV0ZXJzIHRpbWUgem9uZSB0byArOCBhbmQgc2V0IHRoZSBhY3R1YWwgdGltZSBhbmQgZGF0ZSwgSW5zdGFsbCBhbmQgdXBkYXRlIGdvb2dsZSBjaHJvbWUgb2YgYWxsIGNsaWVudCBjb21wdXRlcnMsIHByZXBhcmUgYW5kIGluc3RhbGwgYSBmcmVzaCBNaXN1V0FIIHNlcnZlciBhbmQgaW5zdGFsbCBhIG5ldHdvcmsgc3lzdGVtIHRvIGFsbG93IGFsbCBjbGllbnQgY29tcHV0ZXIgdG8gY29ubmVjdCB0byB0aGUgV0FIIHN5c3RlbSB1c2luZyByb3V0ZXIgYW5kIG5ldHdvcmsgc3dpdGNoZXMuIE9uIHRoZSByZW1haW5kZXIgb2YgdGhlIDQgZGF5cyB0cmFpbmluZywgdGhlIHRlY2huaWNhbCBwb2ludCBwZXJzb24gYXNzaXN0IHRoZSBXQUggaGVhbHRoIHByb2dyYW0gcGFydG5lciBieSBwcm92aWRpbmcgc3RhYmxlIGNvbm5lY3Rpdml0eSAsIEluc3RhbGwgYSBuZXR3b3JrIGNvbm5lY3Rpb24gYnkgcGxhY2luZyB0aGUgcm91dGVyIHRvIGEgc3RyYXRlZ2ljIHBvaW50IGFuZCB0cmFpbnMgdGhlIHN5c3RlbSBhZG1pbmlzdHJhdG9ycyBvbiBiYXNpYyB0cm91Ymxlc2hvb3RpbmcgYW5kIGJhY2stdXAgcHJvY2Vzcy4gJm5ic3A7PC9wPjwvZGl2PjxkaXYgY2xhc3M9InFsLWNsaXBib2FyZCIgdGFiaW5kZXg9Ii0xIiBjb250ZW50ZWRpdGFibGU9InRydWUiPjwvZGl2PjxkaXYgY2xhc3M9InFsLXRvb2x0aXAgcWwtaGlkZGVuIj48YSBjbGFzcz0icWwtcHJldmlldyIgdGFyZ2V0PSJfYmxhbmsiIGhyZWY9ImFib3V0OmJsYW5rIj48L2E+PGlucHV0IGRhdGEtZm9ybXVsYT0iZT1tY14yIiBkYXRhLWxpbms9Imh0dHBzOi8vcXVpbGxqcy5jb20iIGRhdGEtdmlkZW89IkVtYmVkIFVSTCIgdHlwZT0idGV4dCI+PGEgY2xhc3M9InFsLWFjdGlvbiI+PC9hPjxhIGNsYXNzPSJxbC1yZW1vdmUiPjwvYT48L2Rpdj4=', '2018-10-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'SPORTS'),
(2, 'FEATURE'),
(3, 'EDITORIAL'),
(4, 'NEWS');

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
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `private` varchar(1) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `is_archived` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `nickname`, `date_started`, `date_last_updated`, `deadline`, `date_finished`, `is_archived`) VALUES
(4, 'Test Issue', '2018-10-16 00:00:00', '2018-10-01 17:30:37', '2018-10-20 00:00:00', NULL, 'N'),
(7, '1st Regular Issue SY1718', '2018-10-01 00:00:00', '2018-10-11 20:56:41', '2018-10-19 00:00:00', NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `body` mediumtext NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `name`, `date_of_meeting`, `user_id`, `details`) VALUES
(1, 'Scrum 1', '2018-10-10 03:03:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `minutes`
--

CREATE TABLE `minutes` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
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
(5, 'rain', 'rain', 'Rainy', 'Maristela', 'Pioquinto', 'Edi', '917998739', 'rain@gmail.com', '2018-08-14 21:44:55', '2018-10-13 08:14:59', 'Y', 'N'),
(6, 'josh', 'NjY5YWYwMTZhZDdkZjg2ZTU1N2ZlY2U0MWIwZmRjZjQ=', 'Josh', 'M', 'Kotlin', 'FEA', '9875456', 'qweqwe@dasd.cd', '2018-08-29 12:09:24', '2018-10-10 10:18:22', 'N', 'N'),
(7, 'romeo', 'NTAxY2Q4M2JlZGU4ZGQyM2IxZjJjN2VlMjdhMmFmOWE=', 'Romeo', 'E', 'David', 'Edi', '987654321', 'asdasd@asda.casd', '2018-09-01 10:43:16', NULL, 'Y', 'N'),
(8, 'anne', 'NDcyMGM2Yjc0NDE1NTVmY2ViZDU2YmY4YjA5MGM1ZjM=', 'Anne', 'Curtis', 'Heusaff', 'FEA', '9812312311', 'annecurtis@gmail.com', '2018-09-13 00:29:43', NULL, 'N', 'N'),
(9, 'corres_kev', 'N2Q4OGVkODIxYWJmN2E0ZjA4ZDBlYTlmNGM0MjFiYTI=', 'Kevin', 'Mendiola', 'Morales', 'FEA', '9090909090', 'kevs@yahoo.com', '2018-10-10 11:30:56', NULL, 'N', 'N');

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
(1, 5, 2),
(3, 9, 2),
(4, 6, 5);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
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
-- Indexes for table `layout`
--
ALTER TABLE `layout`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_article`
--
ALTER TABLE `user_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
