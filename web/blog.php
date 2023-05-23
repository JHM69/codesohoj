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
    <title>Blog | CodeSohoj</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Blog</h1>

        <!-- Blog posts -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                <h2 class="text-xl font-bold mb-2">Getting Started with Competitive Programming</h2>
                <p>Learn how to get started with competitive programming and improve your problem-solving skills.</p>
                <a href="blog/getting_started_cp" class="text-blue-500">Read More</a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                <h2 class="text-xl font-bold mb-2">Mastering Dynamic Programming</h2>
                <p>Explore the concept of dynamic programming and how it can be used to solve complex problems efficiently.</p>
                <a href="blog/mastering_dynamic_programming" class="text-blue-500">Read More</a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                <h2 class="text-xl font-bold mb-2">The Art of Problem Solving</h2>
                <p>Discover the art of problem solving and learn strategies to tackle challenging programming problems.</p>
                <a href="blog/art_of_problem_solving" class="text-blue-500">Read More</a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                <h2 class="text-xl font-bold mb-2">Introduction to Web Development</h2>
                <p>Get started with web development and learn the basics of HTML, CSS, and JavaScript.</p>
                <a href="blog/intro_to_web_development" class="text-blue-500">Read More</a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                <h2 class="text-xl font-bold mb-2">Understanding Big O Notation</h2>
                <p>Learn about Big O notation and how it measures the efficiency of algorithms.</p>
                <a href="blog/understanding_big_o_notation" class="text-blue-500">Read More</a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">
                <h2 class="text-xl font-bold mb-2">Database Management with SQL</h2>
                <p>Discover the world of databases and learn how to manage data using SQL.</p>
                <a href="blog/database_management_sql" class="text-blue-500">Read More</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>
