-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2023 at 07:32 PM
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
('mode', 'Disabled'),
('penalty', '20'),
('notice', 'Aurora Online Judge\r\nWelcome to Aurora Online Judge'),
('endtime', '0'),
('starttime', '0'),
('port', '8723'),
('ip', 'judge');

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
(1, 'String', NULL, 1),
(2, 'Greedy', NULL, 1),
(3, 'Graph', NULL, 1),
(4, 'Number Theory', NULL, 2),
(5, 'Stack', NULL, 1),
(6, 'Linked list', NULL, 2),
(7, 'Ad-Hoc', 'Simple Adhoc', 0);

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
(43, 6, 25);

-- --------------------------------------------------------

--
-- Table structure for table `clar`
--

CREATE TABLE `clar` (
  `time` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
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
(1, 'C1', 'A sample Contest', 1684389600, 1684476300, '<p>ertfwe4r3r <strong>regw4e3</strong></p>', NULL);

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
  `tid` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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
(22, 'newprob', 'New Problem', 'Medium', 'contest', 'Active', 'C1', 'kbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXakbhwdJLIOK OHDIRPOIDW[0Q-] khdufhidpuQO[O-LHFJIODAIWAXa', NULL, NULL, '1\n2\n3\n4\n5\n6\n7\n8\n\n', '1\n2\n3\n4\n5\n6\n7\n8\n\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 50000, 0, 0, '1\n2\n3\n4\n5\n6\n7\n8\n\n', '1\n2\n3\n4\n5\n6\n7\n8\n\n', NULL, NULL, 'This dsd note'),
(24, 'newprobe5t4e5', '43t63', 'Easy', 'practice', 'Active', 'C1', 'ret5e4t435t3trdy4562', NULL, NULL, '1\n2\n3\n4\n5\n6\n7\n8\n\n', '1\n2\n3\n4\n5\n6\n7\n8\n\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 50000, 0, 0, '1\n2\n3\n4\n5\n6\n7\n8\n\n', '1\n2\n3\n4\n5\n6\n7\n8\n\n', NULL, NULL, NULL),
(25, 'Palindrome1', 'New Palindrome', 'Medium', 'practice', 'Active', 'C1', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">A </span><strong style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">palindrome</strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\"> is a string that reads the same from left to right as from right to left. For example, abacaba, aaaa, abba, racecar are palindromes. You are given a string s consisting of lowercase Latin letters. The string s is a palindrome.You have to check whether it is possible to rearrange the letters in it to get another palindrome (not equal to the given string s).</span></p>', NULL, NULL, '1\n2\n3\n4\n5\n6\n7\n8\n\n', '1\n2\n3\n4\n5\n6\n7\n8\n\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 50000, 0, 0, '3\ncodedoc\ngg\naabaa', 'YES\nNO\nNO\n', 'The first line contains a single integer t (1≤t≤1000) — the number of test cases. The only line of each test case contains a string s (2≤|s|≤50) consisting of lowercase Latin letters. This string is a palindrome.', 'For each test case, print YES if it is possible to rearrange the letters in the given string to get another palindrome. Otherwise, print NO. You may print each letter in any case (YES, yes, Yes will all be recognized as positive answer, NO, no and nO will all be recognized as negative answer).', 'Simple Note');

-- --------------------------------------------------------

--
-- Table structure for table `runs`
--

CREATE TABLE `runs` (
  `rid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `language` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `submittime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `runs`
--

INSERT INTO `runs` (`rid`, `pid`, `tid`, `language`, `time`, `result`, `access`, `submittime`) VALUES
(1, 1, 1, 'C', '', NULL, 'public', NULL),
(2, 1, 1, 'C++', '', NULL, 'public', NULL),
(3, 1, 1, 'C#', '', NULL, 'public', NULL),
(4, 1, 1, 'Java', '', NULL, 'public', NULL),
(5, 1, 1, 'JavaScript', '', NULL, 'public', NULL),
(6, 1, 1, 'Pascal', '', NULL, 'public', NULL),
(7, 1, 1, 'Perl', '', NULL, 'public', NULL),
(8, 1, 1, 'PHP', '', NULL, 'public', NULL),
(9, 1, 1, 'Python', '', NULL, 'public', NULL),
(10, 1, 1, 'Ruby', '', NULL, 'public', NULL),
(11, 1, 1, 'Python3', '', NULL, 'public', NULL),
(12, 1, 1, 'AWK', '', NULL, 'public', NULL),
(13, 1, 1, 'Bash', '', NULL, 'public', NULL),
(14, 1, 1, 'Brain', '', NULL, 'public', NULL);

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
DECLARE cur1 CURSOR FOR SELECT distinct(runs.pid) as pid,problems.score as score FROM runs,problems WHERE runs.tid= OLD.tid and (runs.result='AC' OR runs.result='DQ') and runs.pid=problems.pid and problems.status!='Deleted' and runs.access!='deleted' and problems.contest = 'contest';
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
IF new.result <> old.result THEN
	OPEN cur1;
	read_loop: LOOP
		FETCH cur1 INTO recpid, v_score;
	    	IF done THEN
	      		LEAVE read_loop;
	    	END IF;
		SELECT count(*) into v_dq FROM runs WHERE result='DQ' and access!='deleted' and tid=OLD.tid and pid=recpid;
		IF v_dq = 0 THEN
			SELECT rid,submittime into v_rid, v_submittime FROM runs WHERE result='AC' and tid=OLD.tid and pid=recpid and access!='deleted' ORDER BY rid ASC LIMIT 0,1;
			SELECT count(*) into v_incorrect FROM runs, problems WHERE result!='AC' and result is not NULL and access!='deleted' and rid<v_rid and tid=OLD.tid and runs.pid=recpid and problems.score > 0 and problems.pid = runs.pid;
			SELECT value into v_pen from admin where variable = 'penalty';
			SELECT (v_penalty + v_incorrect*v_pen*60) into v_penalty;
			SELECT (v_sco + v_score) into v_sco;
		ELSE 
			SELECT (v_dqsco + v_score) into v_dqsco;
		END IF;
	end loop;
	select max(submittime) into v_submittime from (select min(submittime) as submittime from runs, problems WHERE runs.tid= OLD.tid and runs.result='AC' and runs.pid=problems.pid and problems.status!='Deleted' and runs.access!='deleted' and problems.contest = 'contest'  group by runs.pid)t;
	SELECT (v_penalty + v_submittime) into v_penalty;
	update admin set value=v_dqsco where variable='test';
	UPDATE teams SET score = (v_sco-v_dqsco), penalty=v_penalty where tid=OLD.tid;
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

--
-- Dumping data for table `subs_code`
--

INSERT INTO `subs_code` (`rid`, `name`, `code`, `error`, `output`) VALUES
(1, 'code', '#include<stdio.h>\r\nint main(){\r\n	int i;\r\n	while(scanf(\"%d\", &i) != EOF)\r\n		printf(\"%d\\n\", i*i);\r\n	return 0;\r\n	}\r\n', '', ''),
(2, 'code', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n	int i;\r\n	while(cin>>i)\r\n		cout<<(i*i)<<endl;\r\n	return 0;\r\n	}\r\n', '', ''),
(3, 'code', 'using System;\r\nclass Program {\r\n  static void Main(string[] args){\r\n    int i; string s;\r\n    while ((s = Console.ReadLine()) != null){\r\n      i = Int16.Parse(s);\r\n      Console.WriteLine(i * i);\r\n      }\r\n    }\r\n  }', '', ''),
(4, 'Main', 'import java.io.*;\npublic class Main {\n	public static void main(String args[])throws IOException{\n		BufferedReader in = new BufferedReader(new InputStreamReader(System.in));\n		int n;\n		String str;\n		while((str=in.readLine())!=null){\n			n = Integer.parseInt(str);\n			n = n*n;\n			System.out.println(n);\n			} // while\n		}\n	}', '', ''),
(5, 'code', 'importPackage(java.io);\r\nimportPackage(java.lang);\r\nvar reader = new BufferedReader( new InputStreamReader(System[\'in\']) );\r\nwhile (true){\r\n    var line = reader.readLine();\r\n    if (line==null) break;\r\n    else {\r\n        i = parseInt(line);\r\n        System.out.println((i*i)+\'\');\r\n        }\r\n    }', '', ''),
(6, 'code', 'program code;\nvar\n	i: integer;\nbegin\n	while not eof do begin\n		readln(i);\n		writeln(i*i);\n	end\nend. { code }', '', ''),
(7, 'code', 'while($n = <STDIN>){\r\n	print ($n*$n);\r\n	print \"\\n\";\r\n	}', '', ''),
(8, 'code', '<?php\r\n$stdin = fopen(\"php://stdin\",\"r\");\r\nwhile($i = trim(fgets($stdin))){\r\n	echo ($i*$i).\"\\n\";\r\n	}\r\nfclose($stdin);\r\n?>', '', ''),
(9, 'code', 'try:\n	while 1:\n		i = int(raw_input())\n		print i*i\nexcept:\n	pass\n', '', ''),
(10, 'code', 'while n = gets\n	n = n.chomp.to_i\n	puts (n*n).to_s\nend', '', ''),
(11, 'Main', 'try:\n    while 1:\n        i = int(input())\n        print(i*i)\nexcept:\n    pass', '', ''),
(12, 'Main', 'BEGIN{\r\n}\r\n{\r\n	n = $1;\r\n	printf(\"%d\\n\", n*n);\r\n}\r\nEND{\r\n}\r\n', '', ''),
(13, 'Main', '#!/bin/bash\r\nwhile read line;\r\ndo\r\n	echo \"$line*$line\" | bc\r\ndone\r\n', '', ''),
(14, 'Main', '>>\r\n, +\r\n[\r\n    -\r\n    <+>\r\n    ----------\r\n    [\r\n        <-<[-]+>>\r\n        ++++++++++\r\n        >++++++++[<------>-]<\r\n        [\r\n            <<->>\r\n            [>+>+>+<<<-]>>>-\r\n            [<[<+<+>>-]<<[>>+<<-]>>>-]<< \r\n            >[-]>[-]++++++++++<<\r\n            [>>\r\n              [->+<<<-[>]>>>\r\n                [<\r\n                  [-<+>]\r\n                  >>\r\n                ]\r\n                <<\r\n              ]\r\n              <[>>[->>>+<<<]>>-<<<<[-]]>\r\n              >[-<+>]>>+<<<<<\r\n            ]\r\n            >>>>>\r\n            [>>[-]++++++[-<<++++++++>>]<<.[-]]\r\n            >\r\n            [>[-]++++++[-<++++++++>]<.[-]]\r\n            <<<<<<[-]\r\n        ]\r\n        <<[->++++++++[<++++++>-]<..[-]]\r\n    ]\r\n    <[+++++++++.[-]]>[-]>\r\n    , +\r\n]', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `runs`
--
ALTER TABLE `runs`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subs_code`
--
ALTER TABLE `subs_code`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
