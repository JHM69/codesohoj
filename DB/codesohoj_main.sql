-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2023 at 09:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codesohoj_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `Blogs`
--

CREATE TABLE `Blogs` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `added` varchar(50) NOT NULL DEFAULT 'admin',
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `views` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `cover` varchar(100) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Blogs`
--

INSERT INTO `Blogs` (`id`, `time`, `added`, `title`, `description`, `likes`, `views`, `dislikes`, `cover`, `user_id`) VALUES
(1, '2023-03-14 11:46:44', 'Code Sohoj admin', 'This is First Blogs in This site', 'Codesohoj = Code + Sohoj + OJ\r\nCodesohoj is an online platform that combines the benefits of an online judge and a coding learning platform. It offers programming problems, educational content, and supports multiple programming languages to provide an engaging learning experience for users of all levels.', 0, 0, 0, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `pid` int(11) NOT NULL,
  `code` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contest` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pgroup` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `statement` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `imgext` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `input` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `output` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `timelimit` float DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `languages` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text',
  `options` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayio` tinyint(1) NOT NULL DEFAULT 0,
  `maxfilesize` int(11) NOT NULL DEFAULT 50000,
  `solved` int(11) NOT NULL DEFAULT 0,
  `total` int(11) DEFAULT 0,
  `sampleinput` text DEFAULT NULL,
  `sampleoutput` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`pid`, `code`, `name`, `type`, `contest`, `status`, `pgroup`, `statement`, `image`, `imgext`, `input`, `output`, `timelimit`, `score`, `languages`, `options`, `displayio`, `maxfilesize`, `solved`, `total`, `sampleinput`, `sampleoutput`) VALUES
(1, 'TEST', 'Squares', 'Ad-Hoc', 'practice', 'Active', 'Test', 'WAP to output the square of an integer.\nInput : Read until the end of file. Each line contains a single positive integer less than or equal to 10.\nOutput : Output the square of the integer, one in each line.\n\n<b>SAMPLE INPUT</b>\n<code>\n1\n2\n3\n5\n</code>\n\n<b>SAMPLE OUTPUT </b>\n<code>\n1\n4\n9\n25\n</code>', NULL, NULL, '1\n2\n3\n4\n5\n6\n7\n8\n9\n10\n', '1\n4\n9\n16\n25\n36\n49\n64\n81\n100\n', 0.5, 0, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', '', 1, 50000, 0, 0, NULL, NULL),
(2, 'Watermelon1', 'Watermelon', 'Easy', 'practice', 'Active', 'C1', 'One hot summer day Pete and his friend Billy decided to buy a watermelon. They chose the biggest and the ripest one, in their opinion. After that the watermelon was weighed, and the scales showed w kilos. They rushed home, dying of thirst, and decided to divide the berry, however they faced a hard problem.\r\n<br>\r\nPete and Billy are great fans of even numbers, that\'s why they want to divide the watermelon in such a way that each of the two parts weighs even number of kilos, at the same time it is not obligatory that the parts are equal. The boys are extremely tired and want to start their meal as soon as possible, that\'s why you should help them and find out, if they can divide the watermelon in the way they want. For sure, each of them should get a part of positive weight.\r\n<br>\r\n<b>Input</b>\r\nThe first (and the only) input line contains integer number w (1 ≤ w ≤ 100) — the weight of the watermelon bought by the boys.\r\n<br>\r\n<b>Output</b>\r\nPrint YES, if the boys can divide the watermelon into two parts, each of them weighing even number of kilos; and NO in the opposite case.', NULL, NULL, '1\n2\n3\n4\n5\n', '2\n3\n4\n5\n6\n7\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 50000, 0, 0, '1\n2\n3\n4\n5\n', '2\n3\n4\n5\n6\n7\n');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `last_visit` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Normal',
  `ip` varchar(40) DEFAULT NULL,
  `session` varchar(30) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `team_id` text DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `penalty` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`uid`, `username`, `name`, `email`, `pass`, `phone`, `last_visit`, `status`, `ip`, `session`, `platform`, `team_id`, `score`, `penalty`) VALUES
(1, 'jhm69', 'Jahangir Hossain', 'jahangirhossainm69@gmail.com', 'bec7fffb5c5a8645f88607cf032251c1', '01635191148', '2023-03-29 18:02:09', 'Admin', NULL, NULL, NULL, NULL, 0, 0),
(2, 'farhan_404', 'Farhan Masud Shohag', 'fsh69711@gmail.com', '73211d0d7098fdc94cf61c4ce2dc7f68', '01648209351', '2023-03-30 13:03:25', 'Normal', NULL, NULL, NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Blogs`
--
ALTER TABLE `Blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Blogs`
--
ALTER TABLE `Blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;