-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 09:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `likes` int(11) DEFAULT 0,
  `views` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `cover` varchar(100) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `time`, `added`, `title`, `description`, `likes`, `views`, `dislikes`, `cover`, `user_id`) VALUES
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
(17, '2023-06-28 13:29:32', 'Farhan Masud Shohag', 'Data Structures', 'Data Structures Provide problems and tutorials on common data structures such as arrays, linked lists, stacks, queues, trees, heaps, hash tables, and graphs. Emphasize implementation, operations, and time/space complexity analysis.', '<p>Here\'s a comprehensive description along with an example in C++ for each of the common data structures you mentioned:</p><p><br></p><p><strong>Arrays: </strong>Arrays are contiguous blocks of memory that store elements of the same type. They provide constant-time access to elements based on their indices. However, inserting or deleting elements at arbitrary positions can be less efficient. Arrays have a fixed size, and their elements are stored sequentially.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\nint main() { \r\n  int arr[5] = {1, 2, 3, 4, 5}; \r\n  // Accessing an element \r\n  int element = arr[2]; \r\n  // element = 3 \r\n  // Modifying an element \r\n  arr[1] = 6; \r\n  // arr = {1, 6, 3, 4, 5} \r\n  return 0;\r\n} \r\n</pre><p><br></p><p><strong>Linked Lists: </strong>Linked lists consist of nodes where each node contains data and a reference to the next node. They allow dynamic memory allocation and efficient insertion and deletion at any position. However, accessing elements by an index is less efficient compared to arrays.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n\r\nstruct Node {\r\n&nbsp; &nbsp; int data;\r\n&nbsp; &nbsp; Node* next;\r\n};\r\n\r\nint main() {\r\n&nbsp; &nbsp; Node* head = new Node();\r\n&nbsp; &nbsp; head-&gt;data = 1;\r\n\r\n&nbsp; &nbsp; Node* second = new Node();\r\n&nbsp; &nbsp; second-&gt;data = 2;\r\n\r\n&nbsp; &nbsp; head-&gt;next = second;\r\n\r\n&nbsp; &nbsp; // Accessing elements\r\n&nbsp; &nbsp; int element = head-&gt;next-&gt;data;&nbsp; // element = 2\r\n\r\n&nbsp; &nbsp; // Inserting a new node\r\n&nbsp; &nbsp; Node* newNode = new Node();\r\n&nbsp; &nbsp; newNode-&gt;data = 3;\r\n&nbsp; &nbsp; newNode-&gt;next = head-&gt;next;\r\n&nbsp; &nbsp; head-&gt;next = newNode;\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n\r\n</pre><p><br></p><p><strong>Stacks: </strong>Stacks follow the Last-In-First-Out (LIFO) principle. Elements can only be inserted or removed from the top of the stack. This can be implemented using arrays or linked lists. Stack operations such as push (inserting), pop (removing), and peek (viewing the top element) have constant time complexity.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n#include &lt;stack&gt;\r\n\r\nint main() {\r\n&nbsp; &nbsp; std::stack&lt;int&gt; myStack;\r\n\r\n&nbsp; &nbsp; // Pushing elements onto the stack\r\n&nbsp; &nbsp; myStack.push(10);\r\n&nbsp; &nbsp; myStack.push(20);\r\n&nbsp; &nbsp; myStack.push(30);\r\n\r\n&nbsp; &nbsp; // Popping elements from the stack\r\n&nbsp; &nbsp; myStack.pop();\r\n\r\n&nbsp; &nbsp; // Accessing the top element\r\n&nbsp; &nbsp; int topElement = myStack.top();&nbsp; // topElement = 20\r\n\r\n&nbsp; &nbsp; // Checking if the stack is empty\r\n&nbsp; &nbsp; bool isEmpty = myStack.empty();&nbsp; // isEmpty = false\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n\r\n</pre><p><br></p><p><strong>Queues: </strong>Queues follow the First-In-First-Out (FIFO) principle. Elements are inserted at the rear (enqueue) and removed from the front (dequeue). Queues can be implemented using arrays or linked lists. Queue operations have constant time complexity.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n#include &lt;queue&gt;\r\n\r\nint main() {\r\n&nbsp; &nbsp; std::queue&lt;int&gt; myQueue;\r\n\r\n&nbsp; &nbsp; // Enqueueing elements\r\n&nbsp; &nbsp; myQueue.push(10);\r\n&nbsp; &nbsp; myQueue.push(20);\r\n&nbsp; &nbsp; myQueue.push(30);\r\n\r\n&nbsp; &nbsp; // Dequeueing an element\r\n&nbsp; &nbsp; myQueue.pop();\r\n\r\n&nbsp; &nbsp; // Accessing the front element\r\n&nbsp; &nbsp; int frontElement = myQueue.front();&nbsp; // frontElement = 20\r\n\r\n&nbsp; &nbsp; // Checking if the queue is empty\r\n&nbsp; &nbsp; bool isEmpty = myQueue.empty();&nbsp; // isEmpty = false\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n\r\n</pre><p><br></p><p><strong>Trees: </strong>Trees are hierarchical data structures consisting of nodes connected by edges. Each node can have child nodes. Trees are commonly used for representing hierarchical relationships. Binary trees are a specific type of tree where each node has at most two children.</p><p>Example:</p><pre class=\"ql-syntax\" spellcheck=\"false\">#include &lt;iostream&gt;\r\n\r\nstruct TreeNode {\r\n&nbsp; &nbsp; int data;\r\n&nbsp; &nbsp; TreeNode* left;\r\n&nbsp; &nbsp; TreeNode* right;\r\n};\r\n\r\nint main() {\r\n&nbsp; &nbsp; TreeNode* root = new TreeNode();\r\n&nbsp; &nbsp; root-&gt;data = 1;\r\n\r\n&nbsp; &nbsp; TreeNode* leftChild = new TreeNode();\r\n&nbsp; &nbsp; leftChild-&gt;data = 2;\r\n\r\n&nbsp; &nbsp; TreeNode* rightChild = new TreeNode();\r\n&nbsp; &nbsp; rightChild-&gt;data = 3;\r\n\r\n&nbsp; &nbsp; root-&gt;left = leftChild;\r\n&nbsp; &nbsp; root-&gt;right = rightChild;\r\n\r\n&nbsp; &nbsp; return 0;\r\n}\r\n</pre><p><br></p><p><strong>Heaps: </strong>Heaps are complete binary trees that satisfy the heap property. In a min-heap, each parent node has a value smaller than or equal to its children. In a max-heap, each parent node has a value greater than or equal to its children. Heaps are commonly used in priority queues and efficient sorting algorithms like heapsort.</p><p><br></p><p><strong>Hash Tables: </strong>Hash tables (also known as hash maps) store data in key-value pairs. They use a hash function to map keys to array indices, enabling fast retrieval and insertion. Hash tables are suitable for quick lookup operations. Collisions may occur when two keys map to the same index, requiring collision resolution techniques like chaining or open addressing.</p><p><br></p><p><strong>Graphs: </strong>Graphs represent connections between entities using nodes (vertices) and edges. They can be directed or undirected, weighted or unweighted. Graphs are used to model relationships between elements and solve problems like shortest path algorithms, network analysis, and social network analysis.</p><p><br></p><p>Understanding the implementation, operations, and time/space complexity analysis of these data structures will help you utilize them effectively to solve various programming problems.</p>', '', 1, '2');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `name`, `email`, `pass`, `phone`, `last_visit`, `status`, `ip`, `session`, `platform`, `team_id`, `score`, `penalty`, `rating`, `solved`) VALUES
(1, 'jhm69', 'Jahangir Hossain', 'jahangirhossainm69@gmail.com', 'bec7fffb5c5a8645f88607cf032251c1', '01635191148', '2023-03-29 18:02:09', 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(2, 'farhan_404', 'Farhan Masud Shohag', 'fsh69711@gmail.com', '73211d0d7098fdc94cf61c4ce2dc7f68', '01648209351', '2023-03-30 13:03:25', 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(3, 'test1', 'test', 'xyz@gmail.com', '202cb962ac59075b964b07152d234b70', '01648209351', '2023-06-28 13:39:13', 'Normal', NULL, NULL, NULL, NULL, 0, 0, 0, 0);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
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
-- AUTO_INCREMENT for table `learn`
--
ALTER TABLE `learn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
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
