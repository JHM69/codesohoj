-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 20, 2023 at 06:18 PM
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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `added` varchar(50) NOT NULL DEFAULT 'admin',
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `statement` text DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `views` int(11) DEFAULT 0,
  `cover` varchar(100) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `time`, `added`, `title`, `description`, `statement`, `likes`, `dislikes`, `views`, `cover`, `user_id`) VALUES
(1, '2023-03-14 11:46:44', 'Code Sohoj admin', 'This is First Blogs in This site', 'Codesohoj = Code + Sohoj + OJ\r\nCodesohoj is an online platform that combines the benefits of an online judge and a coding learning platform. It offers programming problems, educational content, and supports multiple programming languages to provide an engaging learning experience for users of all levels.', NULL, 9, 5, 0, NULL, 'admin'),
(2, '2023-06-27 13:58:17', 'admin', 'testing', 'testing 1 2 3', NULL, 0, 0, 0, 'nothing', 'Admin'),
(3, '2023-06-27 15:05:32', 'test', 'Getting Started with Competitive Programming', '<p>Competitive programming is a mind sport that involves solving algorithmic problems under time constraints. It is a popular activity among coding enthusiasts who enjoy challenging themselves and participating in coding competitions. If you\'re interested in getting started with competitive programming, this blog post will guide you through the initial steps.</p><p><br></p><p><strong>Why Start with Competitive Programming?</strong></p><p><em>Participating in competitive programming offers several advantages:</em></p><p><br></p><p><strong>Improving Problem-Solving Skills:</strong> Competitive programming exposes you to a wide range of problem-solving scenarios. By tackling challenging problems, you will enhance your ability to analyze complex tasks, break them down into smaller subproblems, and develop efficient solutions.</p><p><br></p><p><strong>Learning Efficient Algorithms and Data Structures:</strong> Competitive programming encourages the exploration and implementation of various algorithms and data structures. Through practice, you will become familiar with fundamental concepts such as arrays, linked lists, stacks, queues, trees, graphs, and more. Additionally, you will gain insights into efficient sorting and searching algorithms.</p><p><br></p><p><strong>Enhancing Logical Thinking Abilities:</strong> Competitive programming requires logical thinking to devise algorithms and find optimal solutions. It trains your mind to think critically, consider different approaches, and optimize code for efficiency.</p><p><br></p><p><strong>Gaining Exposure to Real-World Coding Scenarios:</strong> Competitive programming exposes you to real-world coding scenarios and challenges. You will encounter problems similar to those faced by software engineers in the industry, allowing you to gain practical experience and apply theoretical knowledge to solve practical problems.</p><p><br></p><p><strong>Essential Skills and Knowledge:</strong></p><p><br></p><p><em>Before diving into competitive programming, it is essential to have certain skills and knowledge:</em></p><p><br></p><ul><li>Proficiency in at least one programming language (e.g., C++ (recommended), Java, Python).</li><li>Understanding of basic data structures such as arrays, linked lists, stacks, queues, and trees.</li><li>Familiarity with sorting and searching algorithms (e.g., binary search).</li><li>Knowledge of problem-solving techniques, including greedy algorithms, dynamic programming, and backtracking.</li><li>Recommended Online Platforms and Resources</li></ul><p><br></p><p><em>To begin your competitive programming journey, here are some popular online platforms and resources:</em></p><p><br></p><ul><li><strong>CodeSohoj:</strong> A competitive programming platform with regular contests and a vast problem archive.</li><li><strong>Codeforces:</strong> Hosts coding competitions and offers practice problems across various domains.</li><li><strong>Topcoder:</strong> Hosts coding competitions and offers practice problems across various domains.</li><li><strong>LeetCode:</strong> Provides a vast collection of coding problems categorized by difficulty level.</li><li><strong>HackerRank:</strong> Offers coding challenges and contests for beginners to advanced coders.</li><li><strong>CodeChef:</strong> Conducts coding contests and provides practice problems with editorials.</li></ul><p><br></p><p><em>For learning the concepts and techniques of competitive programming, consider the following resources:</em></p><p><br></p><p><strong>Competitive Programming books:</strong></p><p><br></p><ul><li>\"Competitive Programming\" by Steven Halim and Felix Halim</li><li>\"The Competitive Programmer\'s Handbook\" by Antti Laaksonen</li><li>\"Introduction to Algorithms\" by Thomas H. Cormen et al.</li></ul><p><br></p><p><strong>Online courses and tutorials:</strong></p><ul><li>Coursera\'s \"Algorithms: Design and Analysis\" by Stanford University</li><li>Codecademy\'s \"Learn Algorithms\"</li><li><strong>CodeSohoj:</strong> We Offer a wide range of tutorials and practice problems. You can learn from us. Check out our courses at <strong>CodeSohoj.</strong></li></ul><p><br></p><p><strong>Getting Started Guide</strong></p><p><br></p><p><em>To begin your competitive programming journey, follow these steps:</em></p><p><br></p><ul><li><strong>Choose a Programming Language:</strong> Select a programming language you are comfortable with. Popular choices include C++ (most popular) , Java, and Python.</li></ul><p><br></p><ul><li><strong>Set Up a Development Environment:</strong> Install a code editor or Integrated Development Environment (IDE) for your chosen programming language.</li></ul><p><br></p><ul><li><strong>Join Online Coding Communities:</strong> Register on online coding platforms such as CodeSohoj, Codeforces, Topcoder, or LeetCode. Participate in forums and discussions to connect with fellow programmers and learn from their experiences.</li></ul><p><br></p><ul><li><strong>Participate in Practice Contests:</strong> Start with practice contests to get a feel for competitive programming. Solve problems within the given time limit and submit your solutions.</li></ul><p><br></p><ul><li><strong>Gradually Increase Difficulty Level:</strong> Begin with easier problems and gradually progress to more challenging ones. Focus on understanding the problem statements, designing efficient algorithms, and implementing them correctly.</li></ul><p><br></p><p><strong>Tips and Strategies</strong></p><p><em>To improve your performance in competitive programming, consider the following tips and strategies:</em></p><p><br></p><ul><li><strong>Practice Regularly:</strong> Dedicate regular time to solve coding problems. Consistency is key to improving your problem-solving skills.</li></ul><p><br></p><ul><li><strong>Analyze and Learn from Others:</strong> Study solutions submitted by other participants for the problems you solved. Understand different approaches and learn from their coding techniques.</li></ul><p><br></p><ul><li><strong>Participate in Virtual Contests:</strong> Engage in virtual contests to simulate the competitive environment. This will help you improve your speed and accuracy.</li></ul><p><br></p><ul><li><strong>Focus on Problem-Solving Techniques:</strong> Instead of focusing solely on language-specific details, emphasize learning problem-solving techniques such as greedy algorithms, dynamic programming, and efficient data structures.</li></ul><p><br></p><p><strong>Next Steps</strong></p><p><em>Once you have gained some experience in competitive programming, here are some suggested next steps:</em></p><p><br></p><ul><li><strong>Participate in Real Coding Competitions:</strong> Challenge yourself by participating in real coding competitions like ACM ICPC, Google Code Jam, or Facebook Hacker Cup.</li></ul><p><br></p><ul><li><strong>Join Coding Clubs or Communities:</strong> Join local coding clubs or online communities to collaborate with fellow programmers, exchange ideas, and learn advanced techniques.</li></ul><p><br></p><ul><li><strong>Explore Advanced Topics:</strong> Expand your knowledge by delving into advanced topics such as graph algorithms, advanced data structures, and system design.</li></ul><p><br></p><p>Remember, competitive programming is a journey that requires dedication, continuous learning, and practice. Embrace the challenges and enjoy the process of improving your problem-solving skills.</p><p><br></p><p><br></p><p><strong>Start your competitive programming journey today and unlock a world of opportunities! Happy coding!</strong></p>', '', 3, 3, 0, NULL, '3'),
(10, '2023-08-19 17:27:31', 'Jahangir Hossain', 'drtte4tcfvgberge', '<p>g ergttgfe4tfgf etfrt f ggtf tggr ger gerg erg er grtfg</p>', '', 0, 0, 0, NULL, '1'),
(11, '2023-08-19 17:32:09', 'Jahangir Hossain', 'PHP Developer Treand inm 2023', '<p>Every year,&nbsp;<a href=\"https://www.zend.com/\" target=\"_blank\" style=\"color: inherit;\">Zend</a>&nbsp;puts out a report on the state of the PHP ecosystem called the PHP Landscape Report. This report series is based on a survey of the PHP community, and reveals key trends shaping the PHP world.</p><p><a href=\"https://www.zend.com/resources/2023-php-landscape-report?utm_term=trendemon\" target=\"_blank\" style=\"color: inherit;\"><strong>The Zend 2023 PHP Landscape Report</strong></a><strong>&nbsp;is based on the results of an anonymous survey conducted</strong>&nbsp;<strong>between the months of October and December of 2022</strong>. It focused primarily on how PHP development teams are working with the language, their priorities in PHP development, versions they use and plans for upgrades, and the technologies they use in developing PHP applications.&nbsp;<strong>It received a total of 651 qualified responses</strong>.</p><p>And there are several points I want to highlight from this reports</p><h1>Top PHP Applications Type &amp; Technologies</h1><p>While many know of PHP due to WordPress and other Content Management Systems (CMS), PHP has also long been a “glue” language for web applications and APIs. Developers frequently interact with other web APIs, relational databases, key-value stores, message queues, and more in order to deliver business critical applications.</p><p><br></p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*Hq1aDckKJNz9PdpdK5FUMw.png\" height=\"389\" width=\"700\"></p><p>PHP Application Type Stats</p><p>The top three categories were&nbsp;<strong>Services or API (66.6%)</strong>, and&nbsp;<strong>Internal Business Applications (60.5%)</strong>, then&nbsp;<strong>Content Management (43.6%).</strong></p><h1>Where Are The Teams Deploying Their PHP Applications?</h1><p>The top three deployment options were&nbsp;<a href=\"https://aws.amazon.com/\" target=\"_blank\" style=\"color: inherit;\"><strong>AWS</strong></a><strong>&nbsp;(46%)</strong>,&nbsp;<strong>on-premises (36.8%)</strong>, and&nbsp;<a href=\"http://cloud.google.com/\" target=\"_blank\" style=\"color: inherit;\"><strong>Google Cloud Platform</strong></a><strong>&nbsp;(19.5%)</strong>. Among respondents who selected “Other”, VPS services were the most commonly provided response.</p><p><br></p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*Q4yADd421JQ8RlGkB5mD0A.png\" height=\"352\" width=\"700\"></p><p>PHP Application Deployment Stats</p><p>The results, when compared to 2022 results, showed a slight change in how teams are deploying their PHP applications, with AWS overtaking on-premises as the top option, and other cloud deployment options also showing growth. On-premises deployments dipped by over 10% year over year, while AWS and Google Cloud Platform gained 6% and 5%, respectively.</p><h1>Top Web Servers For PHP Teams</h1><p>The top three Web Server(s) usage were&nbsp;<strong>Apache (57.3%)</strong>, and&nbsp;<strong>Nginx (56.5%)&nbsp;</strong>then&nbsp;<strong>Lighttpd (9.3%)</strong></p><p><br></p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*Z75KU0oV-nwjHTWCsm8fIQ.png\" height=\"388\" width=\"700\"></p><p>Web Servers Usage Stats</p><p>While Apache did maintain the #1 spot year over year, the percentage of users selecting Apache went down by nearly 20%. Lighttpd, LiteSpeed, and Caddy all experienced year over year increases, though they didn’t represent a significant percentage of overall responses.</p><h1>Top Development Priorities For PHP Teams</h1><p>In an ideal world, engineering teams would ship software free of bugs, and focus entirely on feature development that drives business success. No team is capable of this, however, which means engineering time is always split between maintenance and new functionality. Maintenance itself can take several forms: fixing reported issues, improving performance, addressing security concerns, updating dependencies, or even making the code easier to understand and maintain via refactoring. PHP developers have a wealth of tools available to them today, ranging from powerful integrated development environments to debuggers, profiling tools, and application monitoring.</p><p><br></p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*bruP-DV8n0ROEhyOmmleHA.png\" height=\"383\" width=\"700\"></p><p>Rank Priorities For PHP Development Team</p><h1>Containerization &amp; Orchestration</h1><p>Containerized deployments are quickly becoming the norm for PHP applications. Since containers provide repeatable, idempotent deployment, they are a perfect solution particularly when an application requires autoscaling. Other benefits include the ability to develop applications in conditions closely mimicking production, the ability to model all infrastructure integrations, and the ability to lock down networking between services in ways that are difficult to accomplish in traditional hosted environments.</p><p><br></p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*D2vvUqsOE6ScS38bKFprlA.png\" height=\"376\" width=\"700\"></p><p>Containerization Usage Stats</p><p>Over&nbsp;<strong>57.5%</strong>&nbsp;of respondents currently using containerization technologies, with an additional&nbsp;<strong>19.8%</strong>&nbsp;planning on using container technologies within the next year. Only<strong>&nbsp;22.7%</strong>&nbsp;noted they were not using container technologies, and had no plans to do so within the next year.</p><p>Moving from containers to orchestration, the next report is about the adoption of orchestration technologies.</p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*RUwkymQDZxA2q-I4DwO7BQ.png\" height=\"383\" width=\"700\"></p><p>Orchestration Technologies Usage Stats</p><p>Over&nbsp;<strong>47.7%</strong>&nbsp;of teams using orchestration technologies, with an additional&nbsp;<strong>17.2%</strong>&nbsp;planning on using them within the next 12 months. Only&nbsp;<strong>35.1%</strong>&nbsp;noted no plans to use orchestration technologies.</p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*iZMoOd-XWoKfsoTxsdxiWw.png\" height=\"381\" width=\"700\"></p><p>Orchestration Technologies Stats</p><p>While popular cloud platforms such as AWS provide platform-specific orchestration technologies, consumers are clearly gravitating to open source solutions such as&nbsp;<a href=\"https://kubernetes.io/\" target=\"_blank\" style=\"color: inherit;\">Kubernetes</a>&nbsp;and&nbsp;<a href=\"https://www.terraform.io/\" target=\"_blank\" style=\"color: inherit;\">Terraform</a>, often combining them with other automation and provisioning tools such as&nbsp;<a href=\"https://www.ansible.com/\" target=\"_blank\" style=\"color: inherit;\">Ansible</a>&nbsp;and&nbsp;<a href=\"https://www.puppet.com/\" target=\"_blank\" style=\"color: inherit;\">Puppet</a>.</p><h1>PHP Version &amp; Upgrade Statistics</h1><p>PHP versions follow a three-year lifecycle, with two years of active support, and an additional year of security-only support. This lifecycle allows the language to advance on a predictable lifecycle, but also leads to year-on-year churn for organizations using the language, as they need to constantly update infrastructure and test their applications against new versions.</p><p><br></p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*lLo8Q4oluyYMhf9qnF51iQ.png\" height=\"375\" width=\"700\"></p><p>PHP Versions Usage Stats</p><p><strong>PHP 7.4</strong>&nbsp;is end of life now. It received the most responses — with&nbsp;<strong>54.2%</strong>&nbsp;reporting use of PHP 7.4 in their PHP applications.&nbsp;<strong>PHP 8.1</strong>&nbsp;and&nbsp;<strong>PHP 8.0</strong>&nbsp;were the next most popular, with&nbsp;<strong>46.1%</strong>&nbsp;and&nbsp;<strong>35.4%</strong>&nbsp;of responses, respectively. Compared to the 2022 survey, PHP 7.4 usage dropped from 66% to 54%, with PHP 8.0 usage also dropping (44% to 35%).</p><p>Overall, teams&nbsp;<strong>using end of life (EOL) PHP versions represented 61.9%</strong>&nbsp;of all responses</p><h1>PHP Upgrade Challenges</h1><p>While PHP strives to keep backwards compatibility between versions, we have observed that each version introduces subtle changes that have outsized impact on applications. Additionally, when deprecations are finally removed, they can lead to applications breaking in unexpected ways. As such, we are not surprised to see that refactoring and testing consume the bulk of time for respondents. Identifying what has changed, and how to adapt your code, while simultaneously ensuring all existing functionality works as expected are difficult tasks.</p><p><br></p><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*U4vnAKZxnM_nttiwRvhiBg.png\" height=\"380\" width=\"700\"></p><p>PHP Upgrade Time Consuming Stats</p><p>Over&nbsp;<strong>37.8%</strong>&nbsp;noted&nbsp;<strong>refactoring</strong>&nbsp;as their most time-consuming component, followed by&nbsp;<strong>testing</strong>&nbsp;at&nbsp;<strong>33.4%</strong>.&nbsp;<strong>Infrastructure provisioning</strong>&nbsp;was the next most time-consuming component at&nbsp;<strong>12%</strong>, followed by planning and compliance renewals at&nbsp;<strong>11.6%</strong>&nbsp;and&nbsp;<strong>5.2%</strong>, respectively.</p><h1>Top Challenges For PHP Teams</h1><p><img src=\"https://miro.medium.com/v2/resize:fit:700/1*buI02Kl5ZpmlN0-8qbE4_A.png\" height=\"359\" width=\"700\"></p><p>Top Challenges Arround PHP</p><p>The survey found&nbsp;<strong>performance issues</strong>&nbsp;as the most common problem with&nbsp;<strong>32.2%</strong>&nbsp;of responses, followed by&nbsp;<strong>debugging at 29.8%</strong>.&nbsp;<strong>Integrating with other systems&nbsp;</strong>came in third at&nbsp;<strong>27.5%</strong>, with&nbsp;<strong>hiring</strong>&nbsp;and&nbsp;<strong>dependency management</strong>&nbsp;the next most common options at&nbsp;<strong>24.4%</strong>&nbsp;and&nbsp;<strong>24.1%</strong>, respectively</p><h1>Final Thoughts</h1><p>Compounding that this year is the fact that PHP 7 reached end of life with the end-of-life announcement of PHP 7.4 in November 2022. Organizations who have not yet adopted PHP 8 now find themselves needing to either migrate quickly, or find a commercial provider of a long-term-support edition of the language.</p><p><br></p><p>If your organization is using PHP, and you’re not yet using containers or orchestration techniques, it was very recommended to invest in these areas. While they pose challenges to learn and execute well, they will lead to more stable and repeatable deployments, providing insurance against rolling out bugs to production. It was also recommend taking time to research and invest in quality monitoring solutions to assist in identifying production issues, as well as their root causes. Combining these with infrastructure- as-code and a good continuous integration pipeline, you will also be arming your organization to adapt quickly to PHP updates.</p><p>There is a lot more data and analysis to unpack in&nbsp;<a href=\"https://www.zend.com/resources/2023-php-landscape-report\" target=\"_blank\" style=\"color: inherit;\">2023 PHP Landscape Report</a>, so I would encourage readers that haven’t done so already to go and download the report.</p><p>Welcome To The Era of PHP 8!</p><p>If you curious about PHP High Performance System, Swoole, Concurency and Coroutine you can drop me a message on my email at&nbsp;<a href=\"mailto:dolly.aswin@gmail.com\" target=\"_blank\" style=\"color: inherit;\">dolly.aswin(at)gmail.com</a></p>', '', 2, 0, 0, NULL, '1');

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
(1, 'String', NULL, 0),
(2, 'Greedy', NULL, 0),
(3, 'Graph', NULL, 0),
(4, 'Number Theory', NULL, 0),
(5, 'Stack', NULL, 0),
(6, 'Linked list', NULL, 0),
(7, 'Ad-Hoc', 'Simple Adhoc', 0),
(9, 'Binary Search', '', 1),
(20, 'Brute Force', '', 1),
(21, 'Implementation', '', 1),
(22, 'Math', '', 1),
(23, 'Recursion', '', 0),
(24, 'Dynamic Programming', '', 0),
(25, 'Sorting and Searching', '', 0),
(26, 'Bit Manipulation', '', 0),
(27, 'Divide and Conquer', '', 0),
(28, 'Backtracking', '', 0);

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
(52, 4, 30),
(53, 9, 31),
(54, 20, 31),
(55, 21, 31),
(56, 22, 31);

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
(4, 'C1', 'New Contest', 1686823200, 1688119200, '<p>xdfgsrdftetdrtgr</p>', NULL),
(5, 'C2', 'New Contest 2', 1687082400, 1688119200, '<p>efreawrq32</p>', '[{\"username\": \"jhm69\", \"time\": 556524, \"score\": 300, \"penalty\": 25, \"solved_contest\": {\"29\": 22, \"31\": 3}, \"uid\": 1}, {\"username\": \"farhan_404\", \"time\": 341408, \"score\": 100, \"penalty\": 0, \"solved_contest\": {\"29\": 0}, \"uid\": 2}]'),
(6, 'C4', 'JnU Day Contest 2023', 1692442800, 1692453600, '<p><strong>???? </strong><strong style=\"color: var(--tw-prose-bold);\">CSE JnU Day Programming Contest Announcement</strong><strong> ????</strong></p><p><br></p><p>Attention all Computer Science enthusiasts at Jagannath University! In celebration of CSE JnU Day, we\'re thrilled to announce a grand programming contest that will challenge your coding skills and spark your creativity.</p><p><br></p><p><span style=\"color: var(--tw-prose-bold);\">????️ Date:</span> 19th August</p><p><span style=\"color: var(--tw-prose-bold);\">⏰ Time:</span> 13:00 (3 hours duration)</p><p><span style=\"color: var(--tw-prose-bold);\">???? Location:</span> Dept of CSE, Jagannath University</p><p><br></p><p><strong style=\"color: var(--tw-prose-bold);\">Contest Details:</strong></p><ul><li><span style=\"color: var(--tw-prose-bold);\">Problems:</span> There will be a total of 5 intriguing and thought-provoking problems. Get ready to dive into various algorithms, data structures, and real-world scenarios.</li><li><span style=\"color: var(--tw-prose-bold);\">Duration:</span> 3 hours of intense coding. Make every minute count!</li><li><span style=\"color: var(--tw-prose-bold);\">Languages:</span> C, C++, Java and JS are allowed.</li></ul><p><br></p><p><strong style=\"color: var(--tw-prose-bold);\">Rules and Guidelines:</strong></p><ol><li><span style=\"color: var(--tw-prose-bold);\">Individual Participation:</span> This is an individual contest, and only individual participants are allowed. Collaboration during the contest is strictly prohibited.</li><li><span style=\"color: var(--tw-prose-bold);\">Plagiarism:</span> Any form of code plagiarism will result in immediate disqualification. Solutions must be original and your own work.</li><li><span style=\"color: var(--tw-prose-bold);\">Environment:</span> You can code in your preferred IDE or text editor. Ensure you are familiar with the submission platform.</li><li><span style=\"color: var(--tw-prose-bold);\">Problem Clarifications:</span> Any questions or clarifications about the problems must be directed to the contest administrators within the first 60 minutes.</li><li><span style=\"color: var(--tw-prose-bold);\">Submission:</span> Solutions must be submitted within the 3-hour timeframe. Late submissions will not be accepted.</li><li><span style=\"color: var(--tw-prose-bold);\">Technical Issues:</span> In the case of any technical glitches, promptly contact the contest support team.</li></ol><p><br></p><p><strong style=\"color: var(--tw-prose-bold);\">Prizes:</strong></p><p>???? First Place: 10,000 Taka</p><p>???? Second Place: 7,000 Taka</p><p>???? Third Place: 5,000 Taka</p><p><br></p><p>Sign up today and showcase your skills! Whether you\'re a seasoned competitive programmer or new to the world of coding competitions, this event promises to be an exciting challenge.</p><p>For registration and further details, visit codesohoj.com</p><p>Ready. Set. Code!</p>', '[{\"username\": \"jhm69\", \"time\": -10164276, \"score\": 300, \"penalty\": 25, \"solved_contest\": {\"29\": 22, \"31\": 3}, \"uid\": 1}, {\"username\": \"farhan_404\", \"time\": -5018992, \"score\": 100, \"penalty\": 0, \"solved_contest\": {\"29\": 0}, \"uid\": 2}]');

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
-- Table structure for table `learn`
--

CREATE TABLE `learn` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `addedby` varchar(50) NOT NULL DEFAULT 'admin',
  `title` varchar(100) NOT NULL,
  `short` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `statement` text DEFAULT NULL,
  `category` int(11) DEFAULT 0,
  `user_id` varchar(20) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `learn`
--

INSERT INTO `learn` (`id`, `time`, `addedby`, `title`, `short`, `description`, `statement`, `category`, `user_id`) VALUES
(1, '2023-06-28 11:16:12', 'Farhan Masud Shohag', 'Introduction to Programming', 'Programming is the process of creating sets of instructions that tell a computer what to do. It involves writing code using programming languages to develop software, applications, and websites. Programming is an essential skill for anyone interested in technology and computer science. It allows you to create interactive and functional solutions to various problems.', '<h2><strong>Why Learn Programming?</strong></h2><p>Learning programming opens up a world of opportunities. Here are some reasons why you should consider learning programming:</p><ul><li><strong>Problem-Solving:</strong>&nbsp;Programming helps you develop critical thinking and problem-solving skills. You\'ll learn how to break down complex problems into smaller, manageable steps and create algorithms to solve them.</li><li><strong>Career Opportunities:</strong>&nbsp;Programming skills are in high demand in today\'s digital age. Many industries, including software development, web development, data science, artificial intelligence, and cybersecurity, offer lucrative career opportunities for programmers.</li><li><strong>Creativity and Innovation:</strong>&nbsp;Programming allows you to bring your ideas to life. You can create unique applications, games, websites, and software that solve specific problems or entertain users.</li><li><strong>Automation:</strong>&nbsp;With programming, you can automate repetitive tasks and increase efficiency. This saves time and effort, enabling you to focus on more important and creative aspects of your work.</li><li><strong>Logical Thinking:</strong>&nbsp;Programming requires logical thinking and attention to detail. It improves your ability to analyze problems, identify patterns, and develop structured solutions.</li></ul><p><br></p><h2><strong>Getting Started with Programming</strong></h2><p>If you\'re new to programming, here are some steps to get started:</p><ol><li><strong>Choose a Programming Language:</strong>&nbsp;There are numerous programming languages to choose from, such as Python, JavaScript, Java, C++, and more. Research their features, ease of learning, and application domains to find the best fit for your goals. You can learn C++ and compete with the world as it is faster than another language.</li><li><strong>Set Up Your Development Environment:</strong>&nbsp;Install the necessary software and tools for your chosen programming language. IDEs (Integrated Development Environments) like Visual Studio Code, PyCharm, or Eclipse can provide a streamlined development experience.</li><li><strong>Learn the Basics:</strong>&nbsp;Start with the fundamentals of programming, including variables, data types, conditionals, loops, and functions. Online tutorials, books, and interactive coding platforms like&nbsp;<a href=\"http://localhost/codesohoj/web/topic_details.php?topic=intro_to_programming#\" target=\"_blank\" style=\"color: inherit;\"><strong>Codesohoj</strong></a>&nbsp;can help you learn the basics.</li><li><strong>Practice and Build Projects:</strong>&nbsp;Apply your knowledge by working on small projects or exercises. Practice writing code and solving programming problems regularly to reinforce your skills.</li><li><strong>Join Coding Communities:</strong>&nbsp;Join Coding Communities: Engage with other programmers through forums, online communities, or coding meetups. Collaborating and sharing knowledge with like-minded individuals can enhance your learning journey.</li><li><strong>Expand Your Knowledge:</strong>&nbsp;As you gain proficiency, explore advanced programming concepts, data structures, algorithms, and specialized areas based on your interests and career goals.</li></ol><p><br></p><p>Remember, learning programming is a continuous process. Embrace challenges, be patient, and keep practicing to become a proficient programmer.</p><h2><br></h2><h2><strong>Learn the Basics:</strong></h2><h2><strong>Variables</strong></h2><p>In programming, variables are used to store and manipulate data. They act as named containers that hold value. Here\'s an example of declaring and using variables in C++:</p><pre class=\"ql-syntax\" spellcheck=\"false\">                \r\n#include&lt;iostream&gt;\r\nint main() {\r\n    int age = 25;\r\n    float weight = 65.5;\r\n    char grade = \'A\';\r\n    std::string name = \"John Doe\";\r\n\r\n    std::cout &lt;&lt; \"Name: \" &lt;&lt; name &lt;&lt; std::endl;\r\n    std::cout &lt;&lt; \"Age: \" &lt;&lt; age &lt;&lt; std::endl;\r\n    std::cout &lt;&lt; \"Weight: \" &lt;&lt; weight &lt;&lt; std::endl;\r\n    std::cout &lt;&lt; \"Grade: \" &lt;&lt; grade &lt;&lt; std::endl;\r\n\r\n    return 0;\r\n}                \r\n            \r\n</pre><p>Here, we have declared four variables:&nbsp;<code>age</code>,&nbsp;<code>weight</code>,&nbsp;<code>grade</code>, and&nbsp;<code>name</code>. These variables store the age, weight, grade, and name of a person, respectively. The&nbsp;<code>std::cout</code>&nbsp;statement is used to print the values of these variables to the console.</p><h2><br></h2><h2><strong>Data Types</strong></h2><p>Data types define the type of data that can be stored in a variable. C++ provides various built-in data types, such as integers, floating-point numbers, characters, and strings. Here\'s an example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">                \r\n#include \r\n\r\nint main() {\r\n    int age = 25;\r\n    float weight = 65.5;\r\n    char grade = \'A\';\r\n    std::string name = \"John Doe\";\r\n\r\n    std::cout &lt;&lt; \"Name: \" &lt;&lt; name &lt;&lt; std::endl;\r\n    std::cout &lt;&lt; \"Age: \" &lt;&lt; age &lt;&lt; std::endl;\r\n    std::cout &lt;&lt; \"Weight: \" &lt;&lt; weight &lt;&lt; std::endl;\r\n    std::cout &lt;&lt; \"Grade: \" &lt;&lt; grade &lt;&lt; std::endl;\r\n\r\n    return 0;\r\n}\r\n                \r\n            \r\n</pre><p>Here, we have declared four variables:&nbsp;<code>age</code>,&nbsp;<code>weight</code>,&nbsp;<code>grade</code>, and&nbsp;<code>name</code>. The&nbsp;<code>int</code>&nbsp;keyword indicates that the&nbsp;<code>age</code>&nbsp;variable stores an integer value. Similarly, the&nbsp;<code>float</code>&nbsp;keyword indicates that the&nbsp;<code>weight</code>&nbsp;variable stores a floating-point number. The&nbsp;<code>char</code>&nbsp;keyword indicates that the&nbsp;<code>grade</code>&nbsp;variable stores a single character. Finally, the&nbsp;<code>std::string</code>&nbsp;keyword indicates that the&nbsp;<code>name</code>&nbsp;variable stores a string of characters. Here,&nbsp;<code>int</code>,&nbsp;<code>float</code>,&nbsp;<code>char</code>, and&nbsp;<code>std::string</code>&nbsp;are data types.</p><h2><br></h2><h2><strong>Conditionals</strong></h2><p>Conditionals allow you to make decisions in your code based on certain conditions. They help control the flow of your program. Here\'s an example of using an if statement in C++:</p><pre class=\"ql-syntax\" spellcheck=\"false\">                \r\n#include \r\n\r\nint main() {\r\n    int age = 25;\r\n\r\n    if (age &gt;= 18) {\r\n        std::cout &lt;&lt; \"You are an adult.\" &lt;&lt; std::endl;\r\n    } else {\r\n        std::cout &lt;&lt; \"You are a minor.\" &lt;&lt; std::endl;\r\n    }\r\n\r\n    return 0;\r\n}\r\n                \r\n            \r\n</pre><p>Here, we have used an if statement to check if the&nbsp;<code>age</code>&nbsp;variable is greater than or equal to 18. If the condition is true, the program prints&nbsp;<code>You are an adult.</code>&nbsp;to the console. Otherwise, it prints&nbsp;<code>You are a minor.</code></p><h2><br></h2><h2><strong>Loops</strong></h2><p>Loops allow you to repeat a block of code multiple times. They are useful for performing repetitive tasks. Here\'s an example of using a for loop in C++ to print numbers from 1 to 5:</p><pre class=\"ql-syntax\" spellcheck=\"false\">                \r\n#include \r\n\r\nint main() {\r\n    //for loop\r\n    for (int i = 1; i &lt;= 5; i++) { \r\n        std::cout &lt;&lt; i &lt;&lt; std::endl;\r\n    }\r\n\r\n    //while loop\r\n    int i = 1;\r\n    while (i &lt;= 5) {\r\n        std::cout &lt;&lt; i &lt;&lt; std::endl;\r\n        i++;\r\n    }\r\n    //do-while loop\r\n    int i = 1;\r\n    do {\r\n        std::cout &lt;&lt; i &lt;&lt; std::endl;\r\n        i++;\r\n    } while (i &lt;= 5);\r\n\r\n    return 0;\r\n}\r\n                \r\n            \r\n</pre><p>Here, we have used a for, while, do-while loop to print the value of the&nbsp;<code>i</code>&nbsp;variable from 1 to 5. The loop starts with&nbsp;<code>i = 1</code>&nbsp;and increments the value of&nbsp;<code>i</code>&nbsp;by 1 after each iteration. The loop ends when the value of&nbsp;<code>i</code>&nbsp;becomes greater than 5.</p><h2><br></h2><h2><strong>Functions</strong></h2><p>Functions allow you to break your code into reusable blocks. They help in modularizing your code and improving its readability. Here\'s an example of defining and calling a function in C++:</p><pre class=\"ql-syntax\" spellcheck=\"false\">                \r\n#include \r\n\r\nvoid greet() {\r\n    std::cout &lt;&lt; \"Hello, world!\" &lt;&lt; std::endl;\r\n}\r\n\r\nint main() {\r\n    greet();\r\n\r\n    return 0;\r\n}\r\n                \r\n            \r\n</pre><p>Here, we have defined a function named&nbsp;<code>greet</code>&nbsp;that prints&nbsp;<code>Hello, world!</code>&nbsp;to the console. The&nbsp;<code>void</code>&nbsp;keyword indicates that the function does not return any value. We have called the&nbsp;<code>greet</code>&nbsp;function from the&nbsp;<code>main</code>&nbsp;function.</p><p><br></p><p>These are just some of the fundamental concepts in programming. There\'s a lot more to explore and learn. Practice writing code, experiment with different examples, and gradually build your programming skills.</p>', '', 1, '2'),
(11, '2023-06-28 12:22:58', 'Farhan Masud Shohag', 'Problem-Solving Techniques', 'Problem Solving techniques are essential skills for programmers to tackle complex challenges and develop efficient solutions. Here are some key problem-solving techniques commonly used in programming:', '<p><strong>Understand the Problem:</strong> Begin by thoroughly understanding the problem statement and requirements. Identify the input, output, constraints, and edge cases. Break down the problem into smaller subproblems if necessary.</p><p><br></p><p><strong>Plan the Solution:</strong> Devise a high-level plan or algorithm to solve the problem. Consider different approaches and choose the most appropriate one. This may involve using well-known algorithms, data structures, or design patterns.</p><p><br></p><p><strong>Divide and Conquer:</strong> If the problem is complex, break it down into smaller, manageable parts. Solve each part independently and then combine the solutions to solve the entire problem. This technique is particularly useful for recursive or divide-and-conquer algorithms.</p><p><br></p><p><strong>Algorithmic Thinking:</strong> Analyze the problem and identify the underlying algorithmic patterns required to solve it. This involves recognizing common algorithms like sorting, searching, graph traversal, dynamic programming, or greedy algorithms that apply to similar problem types.</p><p><br></p><p><strong>Pseudocode:</strong> Write a step-by-step algorithm in pseudocode or plain language before writing the actual code. Pseudocode allows you to plan and visualize the solution without getting bogged down in language-specific syntax.</p><p><br></p><p><strong>Test and Debug:</strong> Test your solution with various inputs and edge cases to ensure it produces correct results. Debug any issues that arise during testing by systematically narrowing down the problem\'s source.</p><p><br></p><p><strong>Space and Time Complexity Analysis:</strong> Analyze the efficiency of your solution in terms of space (memory) and time (execution time). Consider optimizing your code to improve efficiency if necessary.</p><p><br></p><p><strong>Incremental Development:</strong> Start with a basic, working solution and gradually improve it. Add functionality incrementally, test at each step, and ensure it works before moving on to the next enhancement. This approach helps manage complexity and reduces the likelihood of introducing errors.</p><p><br></p><p><strong>Code Reusability:</strong> Write modular and reusable code. Break the problem into functions or modules that perform specific tasks, allowing for easy reuse and maintenance.</p><p><br></p><p><strong>Documentation:</strong> Document your code and algorithms to make them understandable to others and your future self. Include comments, provide explanations for complex sections, and describe the overall solution approach.</p><p><br></p><p>Improving problem-solving skills requires practice and exposure to a wide range of problem types. Engaging in coding challenges, algorithmic competitions, and solving real-world problems can sharpen your problem-solving abilities. Additionally, studying algorithmic design paradigms and data structures will enhance your problem-solving toolkit.</p><p>Remember, problem-solving is not solely about writing code—it\'s about understanding problems deeply, devising efficient strategies, and implementing effective solutions.</p>', '', 7, '2'),
(17, '2023-06-28 13:29:32', 'Farhan Masud Shohag', 'Data Structures', 'Data Structures Provide problems and tutorials on common data structures such as arrays, linked lists, stacks, queues, trees, heaps, hash tables, and graphs. Emphasize implementation, operations, and time/space complexity analysis.', '<p>Here\'s a comprehensive description along with an example in C++ for each of the common data structures you mentioned:</p><p><br></p><p><strong>Arrays: </strong>Arrays are contiguous blocks of memory that store elements of the same type. They provide constant-time access to elements based on their indices. However, inserting or deleting elements at arbitrary positions can be less efficient. Arrays have a fixed size, and their elements are stored sequentially.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\nint main() { \r\n  int arr[5] = {1, 2, 3, 4, 5}; \r\n  // Accessing an element \r\n  int element = arr[2]; \r\n  // element = 3 \r\n  // Modifying an element \r\n  arr[1] = 6; \r\n  // arr = {1, 6, 3, 4, 5} \r\n  return 0;\r\n} \r\n</pre><p><br></p><p><strong>Linked Lists: </strong>Linked lists consist of nodes where each node contains data and a reference to the next node. They allow dynamic memory allocation and efficient insertion and deletion at any position. However, accessing elements by an index is less efficient compared to arrays.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n\r\nstruct Node {\r\n&nbsp; &nbsp; int data;\r\n&nbsp; &nbsp; Node* next;\r\n};\r\n\r\nint main() {\r\n&nbsp; &nbsp; Node* head = new Node();\r\n&nbsp; &nbsp; head-&gt;data = 1;\r\n\r\n&nbsp; &nbsp; Node* second = new Node();\r\n&nbsp; &nbsp; second-&gt;data = 2;\r\n\r\n&nbsp; &nbsp; head-&gt;next = second;\r\n\r\n&nbsp; &nbsp; // Accessing elements\r\n&nbsp; &nbsp; int element = head-&gt;next-&gt;data;&nbsp; // element = 2\r\n\r\n&nbsp; &nbsp; // Inserting a new node\r\n&nbsp; &nbsp; Node* newNode = new Node();\r\n&nbsp; &nbsp; newNode-&gt;data = 3;\r\n&nbsp; &nbsp; newNode-&gt;next = head-&gt;next;\r\n&nbsp; &nbsp; head-&gt;next = newNode;\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n\r\n</pre><p><br></p><p><strong>Stacks: </strong>Stacks follow the Last-In-First-Out (LIFO) principle. Elements can only be inserted or removed from the top of the stack. This can be implemented using arrays or linked lists. Stack operations such as push (inserting), pop (removing), and peek (viewing the top element) have constant time complexity.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n#include &lt;stack&gt;\r\n\r\nint main() {\r\n&nbsp; &nbsp; std::stack&lt;int&gt; myStack;\r\n\r\n&nbsp; &nbsp; // Pushing elements onto the stack\r\n&nbsp; &nbsp; myStack.push(10);\r\n&nbsp; &nbsp; myStack.push(20);\r\n&nbsp; &nbsp; myStack.push(30);\r\n\r\n&nbsp; &nbsp; // Popping elements from the stack\r\n&nbsp; &nbsp; myStack.pop();\r\n\r\n&nbsp; &nbsp; // Accessing the top element\r\n&nbsp; &nbsp; int topElement = myStack.top();&nbsp; // topElement = 20\r\n\r\n&nbsp; &nbsp; // Checking if the stack is empty\r\n&nbsp; &nbsp; bool isEmpty = myStack.empty();&nbsp; // isEmpty = false\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n\r\n</pre><p><br></p><p><strong>Queues: </strong>Queues follow the First-In-First-Out (FIFO) principle. Elements are inserted at the rear (enqueue) and removed from the front (dequeue). Queues can be implemented using arrays or linked lists. Queue operations have constant time complexity.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n#include &lt;queue&gt;\r\n\r\nint main() {\r\n&nbsp; &nbsp; std::queue&lt;int&gt; myQueue;\r\n\r\n&nbsp; &nbsp; // Enqueueing elements\r\n&nbsp; &nbsp; myQueue.push(10);\r\n&nbsp; &nbsp; myQueue.push(20);\r\n&nbsp; &nbsp; myQueue.push(30);\r\n\r\n&nbsp; &nbsp; // Dequeueing an element\r\n&nbsp; &nbsp; myQueue.pop();\r\n\r\n&nbsp; &nbsp; // Accessing the front element\r\n&nbsp; &nbsp; int frontElement = myQueue.front();&nbsp; // frontElement = 20\r\n\r\n&nbsp; &nbsp; // Checking if the queue is empty\r\n&nbsp; &nbsp; bool isEmpty = myQueue.empty();&nbsp; // isEmpty = false\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n\r\n</pre><p><br></p><p><strong>Trees: </strong>Trees are hierarchical data structures consisting of nodes connected by edges. Each node can have child nodes. Trees are commonly used for representing hierarchical relationships. Binary trees are a specific type of tree where each node has at most two children.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n\r\nstruct TreeNode {\r\n&nbsp; &nbsp; int data;\r\n&nbsp; &nbsp; TreeNode* left;\r\n&nbsp; &nbsp; TreeNode* right;\r\n};\r\n\r\nint main() {\r\n&nbsp; &nbsp; TreeNode* root = new TreeNode();\r\n&nbsp; &nbsp; root-&gt;data = 1;\r\n\r\n&nbsp; &nbsp; TreeNode* leftChild = new TreeNode();\r\n&nbsp; &nbsp; leftChild-&gt;data = 2;\r\n\r\n&nbsp; &nbsp; TreeNode* rightChild = new TreeNode();\r\n&nbsp; &nbsp; rightChild-&gt;data = 3;\r\n\r\n&nbsp; &nbsp; root-&gt;left = leftChild;\r\n&nbsp; &nbsp; root-&gt;right = rightChild;\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n</pre><p><br></p><p><strong>Heaps: </strong>Heaps are complete binary trees that satisfy the heap property. In a min-heap, each parent node has a value smaller than or equal to its children. In a max-heap, each parent node has a value greater than or equal to its children. Heaps are commonly used in priority queues and efficient sorting algorithms like heapsort.</p><p><br></p><p><strong>Hash Tables: </strong>Hash tables (also known as hash maps) store data in key-value pairs. They use a hash function to map keys to array indices, enabling fast retrieval and insertion. Hash tables are suitable for quick lookup operations. Collisions may occur when two keys map to the same index, requiring collision resolution techniques like chaining or open addressing.</p><p><br></p><p><strong>Graphs: </strong>Graphs represent connections between entities using nodes (vertices) and edges. They can be directed or undirected, weighted or unweighted. Graphs are used to model relationships between elements and solve problems like shortest path algorithms, network analysis, and social network analysis.</p><p><br></p><p>Understanding the implementation, operations, and time/space complexity analysis of these data structures will help you utilize them effectively to solve various programming problems.</p>', '', 1, '2'),
(19, '2023-06-27 14:10:32', 'test', '', '', '', '', 2, '3'),
(20, '2023-08-19 17:28:25', 'Jahangir Hossain', 'fd9bq23ye21', 'sdiodfwen8-drq2e', '<p>suidfydrq23yerio2</p>', '', 2, '1');

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
(29, 'twice_again', 'Anather Twice', 'Easy', 'contest', 'Active', 'C4', '<p>This is another twice problem which make 2x of a number</p>', '', NULL, '8\n1\n2\n3\n4\n5\n6\n7\n8\n', '2\n4\n6\n8\n10\n12\n14\n16\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 256, 4, 41, '3\r\n4\r\n6\r\n12', '8\r\n12\r\n24', '<p>test case and inputs are int</p>', '<p>output is int</p>', ''),
(30, 'as_it_was', 'As it was', 'Easy', 'contest', 'Active', 'C4', '<p>if you input x then it will output x</p>', '', NULL, '8', '8', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 256, 0, 9, '45', '45', '<p>x</p>', '<p>x</p>', 'nothing'),
(31, 'Jnu_Day_and_Hurry', 'Jnu Day and Hurry', 'Easy', 'contest', 'Active', 'C4', '<p>Jahangir is going to participate in a contest on the last day of the 2023. The contest will start at 20:00 and will last four hours, exactly until midnight. There will be&nbsp;<em>n</em>&nbsp;problems, sorted by difficulty, i.e. problem&nbsp;1&nbsp;is the easiest and problem&nbsp;<em>n</em>&nbsp;is the hardest. Jahangir knows it will take him&nbsp;5·<em>i</em>&nbsp;minutes to solve the&nbsp;<em>i</em>-th problem.</p><p>Jahangir\'s friends organize a JnU Day Party and Jahangir wants to be there at midnight or earlier. He needs&nbsp;<em>k</em>&nbsp;minutes to get there from his house, where he will participate in the contest first.</p><p>How many problems can Jahangir solve if he wants to make it to the party?</p>', '', NULL, '4 190\n', '4\n', 1, 200, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 256, 1, 11, '3 222', '2', '<p><span style=\"color: rgb(34, 34, 34);\">The only line of the input contains two integers&nbsp;</span><em style=\"color: rgb(34, 34, 34);\">n</em><span style=\"color: rgb(34, 34, 34);\">&nbsp;and&nbsp;</span><em style=\"color: rgb(34, 34, 34);\">k</em><span style=\"color: rgb(34, 34, 34);\">&nbsp;(1 ≤ </span><em style=\"color: rgb(34, 34, 34);\">n</em><span style=\"color: rgb(34, 34, 34);\"> ≤ 10,&nbsp;1 ≤ </span><em style=\"color: rgb(34, 34, 34);\">k</em><span style=\"color: rgb(34, 34, 34);\"> ≤ 240)&nbsp;— the number of the problems in the contest and the number of minutes Limak needs to get to the party from his house.</span></p>', '<p><span style=\"color: rgb(34, 34, 34);\">Print one integer, denoting the maximum possible number of problems Limak can solve so that he could get to the party at midnight or earlier.</span></p>', 'In the first sample, there are 3 problems and Jahangir needs 222 minutes to get to the party. <br><br>The three problems require 5, 10 and 15 minutes respectively. Jahangir can spend 5 + 10 = 15 minutes to solve first two problems. Then, at 20:15 he can leave his house to get to the party at 23:57 (after 222 minutes). In this scenario Jahangir would solve 2 problems. He doesn\'t have enough time to solve 3 problems so the answer is 2.  <br><br>In the second sample, Jahangir can solve all 4 problems in 5 + 10 + 15 + 20 = 50 minutes. At 20:50 he will leave the house and go to the party. He will get there exactly at midnight.  <br><br>In the third sample, Jahangir needs only 1 minute to get to the party. He has enough time to solve all 7 problems.'),
(28, 'twice', 'Twice', 'Easy', 'contest', 'Active', 'C4', '<p>Make a twice of a number </p>', '', NULL, '8\n1\n2\n3\n4\n5\n6\n7\n8\n', '2\n4\n6\n8\n10\n12\n14\n16\n', 1, 100, 'Brain,C,C++,C#,Java,JavaScript,Pascal,Perl,PHP,Python,Ruby,Text', NULL, 1, 256, 1, 54, '2\r\n2\r\n4', '4\r\n8', '<p>test case input: int</p><p>int</p>', '<p>int</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `runs`
--

CREATE TABLE `runs` (
  `rid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `pgroup` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `language` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `submittime` int(18) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `runs`
--

INSERT INTO `runs` (`rid`, `pid`, `pgroup`, `uid`, `language`, `time`, `result`, `access`, `submittime`) VALUES
(129, 31, NULL, 1, 'C++', '0.036', 'WA', 'private', 1687424639),
(128, 29, NULL, 2, 'C++', '0.036', 'AC', 'private', 1687423808),
(127, 29, NULL, 1, 'C++', '0.018', 'AC', 'private', 1687423715),
(126, 30, NULL, 1, 'C++', '0.034', 'WA', 'private', 1687423659),
(125, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687416856),
(124, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687415592),
(123, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687415493),
(122, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687415312),
(121, 29, NULL, 1, 'C++', '0.017', 'WA', 'private', 1687415100),
(120, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687415021),
(119, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687414957),
(118, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687414744),
(117, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687414687),
(116, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687414388),
(115, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687414309),
(114, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687414264),
(113, 29, NULL, 1, 'C++', '0.017', 'WA', 'private', 1687414219),
(112, 29, NULL, 1, 'C++', '0.035', 'WA', 'private', 1687414206),
(111, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687414054),
(110, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687413958),
(109, 29, NULL, 1, 'C++', '0.017', 'WA', 'private', 1687413935),
(108, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687413785),
(107, 29, NULL, 1, 'C++', '0.066', 'WA', 'private', 1687413731),
(106, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687413588),
(105, 29, NULL, 1, 'C++', NULL, NULL, 'private', 1687413519),
(104, 31, NULL, 1, 'C++', '0.034', 'WA', 'private', 1687326494),
(103, 31, NULL, 1, 'C++', '0.017', 'AC', 'private', 1687297609),
(102, 31, NULL, 1, 'C++', '0.019', 'PE', 'private', 1687297487),
(101, 31, NULL, 1, 'C++', '0.035', 'WA', 'private', 1687297340),
(100, 31, NULL, 1, 'C++', '0.034', 'WA', 'private', 1687297217),
(99, 29, NULL, 1, 'C++', '0.036', 'AC', 'private', 1687295145),
(98, 29, NULL, 1, 'C', '0.036', 'WA', 'private', 1687294370),
(97, 29, NULL, 1, 'C', '0.000', 'CE', 'private', 1687294335),
(130, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687425113),
(131, 31, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687425221),
(132, 31, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687425368),
(133, 31, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687425604),
(134, 31, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687425828),
(135, 31, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687425899),
(136, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1687426428),
(137, 29, NULL, 1, 'C++', '0.018', 'WA', 'private', 1687426595),
(138, 29, NULL, 1, 'C++', '0.039', 'WA', 'private', 1687426627),
(139, 29, NULL, 1, 'C++', NULL, NULL, 'private', 1692382632),
(140, 28, NULL, 1, 'C++', NULL, NULL, 'private', 1692526026),
(141, 29, NULL, 1, 'C++', NULL, NULL, 'private', 1692531957),
(142, 29, NULL, 1, 'C++', NULL, NULL, 'private', 1692532005),
(143, 29, NULL, 1, 'C++', NULL, NULL, 'private', 1692532269),
(144, 29, NULL, 1, 'C++', '0.019', 'WA', 'private', 1692532284),
(145, 28, NULL, 1, 'C++', '0.034', 'WA', 'private', 1692536795);

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

--
-- Dumping data for table `subs_code`
--

INSERT INTO `subs_code` (`rid`, `name`, `code`, `error`, `output`) VALUES
(97, 'Main', '#include<stdio.h>\r\nint main(){\r\nertewrt3wq \r\nreturn 0;\r\n}dfesfwae', NULL, NULL),
(98, 'Main', '#include<stdio.h>\r\nint main(){\r\n\r\nreturn 0;\r\n}', NULL, NULL),
(99, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        int x;\r\n        cin >> x;\r\n        cout << x*2 << endl;\r\n    }\r\n    return 0;\r\n}', '', '2\n4\n6\n8\n10\n12\n14\n16\n'),
(100, 'Main', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main()\r\n{\r\n    int n, k, i, sum;\r\n    while(~scanf(\"%d%d\",&n, &k))\r\n    {\r\n        sum = k;\r\n        for(i = 0; i <= n; i ++)\r\n        {\r\n            sum += i * 5;\r\n            if(sum > 240)\r\n                break;\r\n        }\r\n        printf(\"%d\\n\", i - 1);\r\n    }\r\n    return 0;\r\n}\r\n', '', '2\n9\n1\n'),
(101, 'Main', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main()\r\n{\r\n    int n, k, i, sum;\r\n    while(~scanf(\"%d%d\",&n, &k))\r\n    {\r\n        sum = k;\r\n        for(i = 0; i <= n; i ++)\r\n        {\r\n            sum += i * 5;\r\n            if(sum > 240)\r\n                break;\r\n        }\r\n        printf(\"%d\\n\", i - 1);\r\n    }\r\n    return 0;\r\n}', '', '2\n9\n1\n'),
(102, 'Main', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main()\r\n{\r\n    int n, k, i, sum;\r\n    while(~scanf(\"%d%d\",&n, &k))\r\n    {\r\n        sum = k;\r\n        for(i = 0; i <= n; i ++)\r\n        {\r\n            sum += i * 5;\r\n            if(sum > 240)\r\n                break;\r\n        }\r\n        printf(\"%d\\n\", i - 1);\r\n    }\r\n    return 0;\r\n}', '', '4\n'),
(103, 'Main', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main()\r\n{\r\n    int n, k, i, sum;\r\n    while(~scanf(\"%d%d\",&n, &k))\r\n    {\r\n        sum = k;\r\n        for(i = 0; i <= n; i ++)\r\n        {\r\n            sum += i * 5;\r\n            if(sum > 240)\r\n                break;\r\n        }\r\n        printf(\"%d\\n\", i - 1);\r\n    }\r\n    return 0;\r\n}', '', '4\n'),
(104, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(105, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        int d = 0;\r\n        cin >> d;\r\n        cout << d*2 << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(106, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(107, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(108, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(109, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(110, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(111, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(112, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(113, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(114, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(115, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(116, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(117, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(118, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(119, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(120, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(121, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(122, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(123, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(124, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(125, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(126, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(127, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        int x;\r\n        cin>>x;\r\n        cout << 2*x<< endl;\r\n    }\r\n    return 0;\r\n}', '', '2\n4\n6\n8\n10\n12\n14\n16\n'),
(128, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        int x;\r\n        cin>>x;\r\n        cout << 2*x<< endl;\r\n    }\r\n    return 0;\r\n}', '', '2\n4\n6\n8\n10\n12\n14\n16\n'),
(129, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(130, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(131, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(132, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(133, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(134, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(135, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(136, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(137, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(138, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(139, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(140, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(141, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(142, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(143, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', NULL, NULL),
(144, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n'),
(145, 'Main', '#include<iostream>\r\nusing namespace std;\r\nint main(){\r\n    int t;\r\n    cin >> t;\r\n    for (int i = 1; i <= t; i++) {\r\n        cout << \"codesohoj\" << endl;\r\n    }\r\n    return 0;\r\n}', '', 'codesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\ncodesohoj\n');

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
  `solved` int(11) NOT NULL DEFAULT 0,
  `solved_contest` int(11) NOT NULL DEFAULT 0,
  `photo` text DEFAULT NULL,
  `country` text NOT NULL DEFAULT 'Bangladesh',
  `skill` text DEFAULT NULL,
  `last_active` bigint(20) DEFAULT NULL,
  `university` text DEFAULT NULL,
  `dept` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`uid`, `username`, `name`, `email`, `pass`, `phone`, `last_visit`, `status`, `ip`, `session`, `platform`, `team_id`, `score`, `penalty`, `rating`, `solved`, `solved_contest`, `photo`, `country`, `skill`, `last_active`, `university`, `dept`) VALUES
(1, 'jhm69', 'Jahangir Hossain', 'jahangirhossainm69@gmail.com', 'bec7fffb5c5a8645f88607cf032251c1', '01635191148', '2023-03-29 18:02:09', 'Admin', NULL, NULL, NULL, NULL, 300, 1687303609, 0, 22, 0, 'https://avatars.githubusercontent.com/u/29326759?v=4', 'Bangladesh', 'Hi there! I\'m a passionate programmer who mostly works with Java and JavaScript. My focus is to solve real-life problems and make a positive impact on the world', NULL, 'Jagannath University', '01635191148'),
(2, 'farhan_404', 'Farhan Masud Shohag', 'fsh69711@gmail.com', '73211d0d7098fdc94cf61c4ce2dc7f68', '01648209351', '2023-03-30 13:03:25', 'Admin', NULL, NULL, NULL, NULL, 100, 1687423808, 0, 1, 0, NULL, 'Bangladesh', NULL, NULL, NULL, NULL),
(3, 'asad', 'Muhammad Asaduzzaman Noor', 'autodecor.com.play@gmail.com', '140b543013d988f4767277b6f45ba542', '01635191148', '2023-08-20 16:51:44', 'Normal', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 'Bangladesh', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- Indexes for table `learn`
--
ALTER TABLE `learn`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category_problem`
--
ALTER TABLE `category_problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `learn`
--
ALTER TABLE `learn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `runs`
--
ALTER TABLE `runs`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `subs_code`
--
ALTER TABLE `subs_code`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
