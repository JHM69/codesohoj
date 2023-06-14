<!DOCTYPE html>
<html lang="en">
<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

include_once "functions.php";
if (
    isset($_SESSION["loggedin"]) &&
    $_SESSION["Users"]["status"] == "Normal" || $_SESSION["Users"]["status"] == "Admin"
) { ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Learn | CodeSohoj</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>


    <body class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-4">Learn</h1>
            <p class="text-lg text-gray-700 mb-6">
                Learn the fundamentals of computer science with our engaging and practical courses in
                <span class="font-bold">C, C++, Python, Java,</span> and <span class="font-bold">SQL.</span>
                Our interactive courses emphasize real-world problem-solving, allowing you to practice your skills and gain confidence.
                Start learning with <span class="font-bold">CodeSohoj</span> today and unlock your potential as a developer!
            </p>


            <!-- Learning resources -->
            <div class="flex flex-wrap -mx-4 mt-8">
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Introduction to Programming</h2>
                        <p>Learn the basics of programming concepts, syntax, and problem-solving techniques.</p>
                        <a href="<?php echo SITE_URL; ?>/topic_details.php?topic=intro_to_programming" class="text-blue-500">View Details</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Data Structures and Algorithms</h2>
                        <p>Explore various data structures and algorithms commonly used in programming competitions.</p>
                        <a href="<?php echo SITE_URL; ?>/topic_details.php?topic=data_structures_algorithms" class="text-blue-500">View Details</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Practice Problems</h2>
                        <p>Sharpen your coding skills with a collection of practice problems of varying difficulty levels.</p>
                        <a href="<?php echo SITE_URL; ?>/problems.php" class="text-blue-500">View Practice Problems</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Advanced Algorithms</h2>
                        <p>Take your algorithmic skills to the next level with advanced topics and techniques.</p>
                        <a href="<?php echo SITE_URL; ?>/topic_details.php?topic=advanced_algorithms" class="text-blue-500">View Details</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Web Development Basics</h2>
                        <p>Learn the fundamentals of web development, including HTML, CSS, and JavaScript.</p>
                        <a href="<?php echo SITE_URL; ?>/topic_details.php?topic=web_dev_basics" class="text-blue-500">View Details</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Database Design and SQL</h2>
                        <p>Master the art of designing and managing databases using SQL.</p>
                        <a href="<?php echo SITE_URL; ?>/topic_details.php?topic=database_design_sql" class="text-blue-500">View Details</a>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 py-4">
                <div class="container mx-auto flex justify-center">
                    <a href="<?php echo SITE_URL; ?>/add_topic.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Topic
                    </a>
                </div>
            </div>
        </div>
    </body>

</html>
<?php } ?>