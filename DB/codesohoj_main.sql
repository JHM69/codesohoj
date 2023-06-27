-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2023 at 11:17 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `variable` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`variable`, `value`) VALUES
('lastjudge', '0'),
('mode', 'Enable'),
('notice', 'Codesohoj Online Judge\r\nWelcome to Codesohoj Online Judge'),
('endtime', '0'),
('starttime', '0'),
('port', '8723'),
('ip', 'localhost'),
('penalty', '20');

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `info` text DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `info`, `count`) VALUES
(1, 'String', NULL, 2),
(2, 'Greedy', NULL, 1),
(3, 'Graph', NULL, 2),
(4, 'Number Theory', NULL, 6),
(5, 'Stack', NULL, 2),
(6, 'Linked list', NULL, 3),
(7, 'Ad-Hoc', 'Simple Adhoc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_problem`
--

CREATE TABLE `category_problem` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_problem`
--

INSERT INTO `category_problem` (`id`, `category_id`, `problem_id`) VALUES
(36, 4, 22),
(37, 6, 22),
(38, 3, 24),
(39, 4, 24),
(40, 5, 24),
(41, 1, 25),
(42, 2, 25),
(43, 6, 25),
(44, 3, 26),
(45, 1, 27),
(46, 4, 27),
(47, 4, 28),
(48, 7, 28),
(49, 4, 29),
(50, 5, 29),
(51, 6, 29),
(52, 4, 30);

-- --------------------------------------------------------

--
-- Table structure for table `clar`
--

CREATE TABLE `clar` (
  `time` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `query` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reply` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `id` int(11) NOT NULL,
  `code` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `announcement` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ranktable` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `code`, `name`, `starttime`, `endtime`, `announcement`, `ranktable`) VALUES
(4, 'C1', 'New Contest', 1686823200, 1688119200, '<p>xdfgsrdftetdrtgr</p>', NULL),
(5, 'C2', 'New Contest 2', 1687082400, 1688119200, '<p>efreawrq32</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `editorials`
--

CREATE TABLE `editorials` (
  `pid` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `time` int(11) NOT NULL,
  `ip` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `uid` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `request` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `sampleoutput` text DEFAULT NULL,
  `input_statement` text DEFAULT NULL,
  `output_statement` text DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`pid`, `code`, `name`, `type`, `contest`, `status`, `pgroup`, `statement`, `image`, `imgext`, `input`, `output`, `timelimit`, `score`, `languages`, `options`, `displayio`, `maxfilesize`, `solved`, `total`, `sampleinput`, `sampleoutput`, `input_statement`, `output_statement`, `note`) VALUES
(29, 'twice_again', 'Anather Twice', 'Easy', 'contest', 'Active', 'C2', '<p>This is another twice problem which make 2x of a number</p>', '', NULL, '8\n1\n2\n3\n4\n5\n6\n7\n8\n', '2\n4\n6\n8\n10\n12\n14\n16\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 256, 1, 6, '3\r\n4\r\n6\r\n12', '8\r\n12\r\n24', '<p>test case and inputs are int</p>', '<p>output is int</p>', ''),
(30, 'as_it_was', 'As it was', 'Easy', 'contest', 'Active', 'C2', '<p>if you input x then it will output x</p>', '', NULL, '8', '8', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 256, 0, 8, '45', '45', '<p>x</p>', '<p>x</p>', 'nothing'),
(28, 'twice', 'Twice', 'Easy', 'contest', 'Active', 'C2', '<p>Make a twice of a number </p>', '', NULL, '8\n1\n2\n3\n4\n5\n6\n7\n8\n', '2\n4\n6\n8\n10\n12\n14\n16\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 256, 1, 52, '2\r\n2\r\n4', '4\r\n8', '<p>test case input: int</p><p>int</p>', '<p>int</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `runs`
--

CREATE TABLE `runs` (
  `rid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `language` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `submittime` int(18) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Triggers `runs`
--
DELIMITER $$
CREATE TRIGGER `scoreupdate` AFTER UPDATE ON `runs` FOR EACH ROW begin
DECLARE done INT DEFAULT FALSE;
DECLARE v_rid, v_submittime, v_incorrect, v_pen, v_score, recpid, v_dq, v_total, v_solved int(11);
DECLARE v_sco int DEFAULT 0;
DECLARE v_dqsco int DEFAULT 0;
DECLARE v_penalty bigint DEFAULT 0;
DECLARE cur1 CURSOR FOR SELECT distinct(runs.pid) as pid,problems.score as score FROM runs,problems WHERE runs.uid= OLD.uid and (runs.result='AC' OR runs.result='DQ') and runs.pid=problems.pid and problems.status!='Deleted' and runs.access!='deleted' and problems.contest = 'contest';
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
IF new.result <> old.result THEN
	OPEN cur1;
	read_loop: LOOP
		FETCH cur1 INTO recpid, v_score;
	    	IF done THEN
	      		LEAVE read_loop;
	    	END IF;
		SELECT count(*) into v_dq FROM runs WHERE result='DQ' and access!='deleted' and uid=OLD.uid and pid=recpid;
		IF v_dq = 0 THEN
			SELECT rid,submittime into v_rid, v_submittime FROM runs WHERE result='AC' and uid=OLD.uid and pid=recpid and access!='deleted' ORDER BY rid ASC LIMIT 0,1;
			SELECT count(*) into v_incorrect FROM runs, problems WHERE result!='AC' and result is not NULL and access!='deleted' and rid<v_rid and uid=OLD.uid and runs.pid=recpid and problems.score > 0 and problems.pid = runs.pid;
			SELECT value into v_pen from admin where variable = 'penalty';
			SELECT (v_penalty + v_incorrect*v_pen*60) into v_penalty;
			SELECT (v_sco + v_score) into v_sco;
		ELSE 
			SELECT (v_dqsco + v_score) into v_dqsco;
		END IF;
	end loop;
	select max(submittime) into v_submittime from (select min(submittime) as submittime from runs, problems WHERE runs.uid= OLD.uid and runs.result='AC' and runs.pid=problems.pid and problems.status!='Deleted' and runs.access!='deleted' and problems.contest = 'contest'  group by runs.pid)t;
	SELECT (v_penalty + v_submittime) into v_penalty;
	update admin set value=v_dqsco where variable='test';
	UPDATE Users SET score = (v_sco-v_dqsco), penalty=v_penalty, solved=(solved+1)  where uid=OLD.uid;
	CLOSE cur1;
END IF;
IF strcmp(old.access, 'deleted') <> 0 and strcmp(new.access, 'deleted') = 0 THEN
	select solved, total into v_solved, v_total from problems where pid = new.pid;
	update problems set total = (v_total-1) where pid = new.pid;
	IF strcmp(ifnull(new.result,''), 'AC') = 0 THEN
		update problems set solved = (v_solved-1) where pid = new.pid;
	END IF;
ELSEIF strcmp(old.access, 'deleted') =0 and strcmp(new.access, 'deleted') <> 0 THEN
	select solved, total into v_solved, v_total from problems where pid = new.pid;
	update problems set total = (v_total+1) where pid = new.pid;
	IF strcmp(ifnull(new.result,''), 'AC') = 0 THEN
		update problems set solved = (v_solved+1) where pid = new.pid;
	END IF;
ELSE
	IF strcmp(ifnull(old.result,''), 'AC') = 0 and strcmp(ifnull(new.result,''), 'AC') <> 0 THEN
		select solved, total into v_solved, v_total from problems where pid = new.pid;
		update problems set solved = (v_solved-1) where pid = new.pid;
	ELSEIF strcmp(ifnull(old.result,''), 'AC') <> 0 and strcmp(ifnull(new.result,''), 'AC') = 0 THEN
		select solved, total into v_solved, v_total from problems where pid = new.pid;
		update problems set solved = (v_solved+1) where pid = new.pid;
	END IF;
END IF;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subs_code`
--

CREATE TABLE `subs_code` (
  `rid` int(11) NOT NULL,
  `name` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `error` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `output` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `penalty` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 0,
  `solved` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`uid`, `username`, `name`, `email`, `pass`, `phone`, `last_visit`, `status`, `ip`, `session`, `platform`, `team_id`, `score`, `penalty`, `rating`, `solved`) VALUES
(1, 'jhm69', 'Jahangir Hossain', 'jahangirhossainm69@gmail.com', 'bec7fffb5c5a8645f88607cf032251c1', '01635191148', '2023-03-29 18:02:09', 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(2, 'farhan_404', 'Farhan Masud Shohag', 'fsh69711@gmail.com', '73211d0d7098fdc94cf61c4ce2dc7f68', '01648209351', '2023-03-30 13:03:25', 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Blogs`
--
ALTER TABLE `Blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category_problem`
--
ALTER TABLE `category_problem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `problem_id` (`problem_id`);

--
-- Indexes for table `clar`
--
ALTER TABLE `clar`
  ADD PRIMARY KEY (`time`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editorials`
--
ALTER TABLE `editorials`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`time`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `runs`
--
ALTER TABLE `runs`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `subs_code`
--
ALTER TABLE `subs_code`
  ADD PRIMARY KEY (`rid`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_problem`
--
ALTER TABLE `category_problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `runs`
--
ALTER TABLE `runs`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `subs_code`
--
ALTER TABLE `subs_code`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category_problem_category_id` FOREIGN KEY (`id`) REFERENCES `category_problem` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
