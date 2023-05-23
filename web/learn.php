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
            <p>Learn the fundamentals of computer science with our engaging and practical courses in C, C++, Python, Java, and SQL. Our interactive courses emphasize real-world problem-solving, allowing you to practice your skills and gain confidence. Start learning with <b>CodeSohoj</b> today and unlock your potential as a developer!</p>

            <!-- Learning resources -->
            <div class="flex flex-wrap -mx-4 mt-4">
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Introduction to Programming</h2>
                        <p>Learn the basics of programming concepts, syntax, and problem-solving techniques.</p>
                        <a href="resources/intro_to_programming.pdf" target="_blank" class="text-blue-500">Download PDF</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Data Structures and Algorithms</h2>
                        <p>Explore various data structures and algorithms commonly used in programming competitions.</p>
                        <a href="resources/data_structures_algorithms.pdf" target="_blank" class="text-blue-500">Download PDF</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Practice Problems</h2>
                        <p>Sharpen your coding skills with a collection of practice problems of varying difficulty levels.</p>
                        <a href="practice_problems.php" class="text-blue-500">View Practice Problems</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Advanced Algorithms</h2>
                        <p>Take your algorithmic skills to the next level with advanced topics and techniques.</p>
                        <a href="resources/advanced_algorithms.pdf" target="_blank" class="text-blue-500">Download PDF</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Web Development Basics</h2>
                        <p>Learn the fundamentals of web development, including HTML, CSS, and JavaScript.</p>
                        <a href="resources/web_dev_basics.pdf" target="_blank" class="text-blue-500">Download PDF</a>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                        <h2 class="text-xl font-bold mb-2">Database Design and SQL</h2>
                        <p>Master the art of designing and managing databases using SQL.</p>
                        <a href="resources/database_design_sql.pdf" target="_blank" class="text-blue-500">Download PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
<?php } ?>