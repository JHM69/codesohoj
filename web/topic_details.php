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
        <title>Topic name | CodeSohoj</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-3xl font-bold mb-4">Introduction to Programming</h1>
                <p class="text-lg text-gray-700 mb-6">
                    Programming is the process of creating sets of instructions that tell a computer what to do. It involves
                    writing code using programming languages to develop software, applications, and websites. Programming is an
                    essential skill for anyone interested in technology and computer science. It allows you to create
                    interactive and functional solutions to various problems.
                </p>

                <h2 class="text-2xl font-bold mb-2">Why Learn Programming?</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Learning programming opens up a world of opportunities. Here are some reasons why you should consider
                    learning programming:
                </p>

                <ul class="list-disc ml-8 text-gray-700">
                    <li><b>Problem Solving:</b> Programming helps you develop critical thinking and problem-solving skills. You'll
                        learn how to break down complex problems into smaller, manageable steps and create algorithms to solve
                        them.</li>
                    <li><b>Career Opportunities:</b> Programming skills are in high demand in today's digital age. Many industries,
                        including software development, web development, data science, artificial intelligence, and
                        cybersecurity, offer lucrative career opportunities for programmers.</li>
                    <li><b>Creativity and Innovation:</b> Programming allows you to bring your ideas to life. You can create unique
                        applications, games, websites, and software that solve specific problems or entertain users.</li>
                    <li><b>Automation:</b> With programming, you can automate repetitive tasks and increase efficiency. This saves
                        time and effort, enabling you to focus on more important and creative aspects of your work.</li>
                    <li><b>Logical Thinking:</b> Programming requires logical thinking and attention to detail. It improves your
                        ability to analyze problems, identify patterns, and develop structured solutions.</li>
                </ul>

                <h2 class="text-2xl font-bold mb-2">Getting Started with Programming</h2>
                <p class="text-lg text-gray-700 mb-6">
                    If you're new to programming, here are some steps to get started:
                </p>

                <ol class="list-decimal ml-8 text-gray-700">
                    <li><b>Choose a Programming Language:</b> There are numerous programming languages to choose from, such as Python,
                        JavaScript, Java, C++, and more. Research their features, ease of learning, and application domains to
                        find the best fit for your goals. You can learn C++ and compete with the world as it is faster than other language.</li>
                    <li><b>Set Up Your Development Environment:</b> Install the necessary software and tools for your chosen
                        programming language. IDEs (Integrated Development Environments) like Visual Studio Code, PyCharm, or
                        Eclipse can provide a streamlined development experience.</li>
                    <li><b>Learn the Basics:</b> Start with the fundamentals of programming, including variables, data types,
                        conditionals, loops, and functions. Online tutorials, books, and interactive coding platforms like <b><a href="#">Codesohoj</a></b> can help
                        you learn the basics.</li>
                    <li><b>Practice and Build Projects:</b> Apply your knowledge by working on small projects or exercises. Practice
                        writing code and solving programming problems regularly to reinforce your skills.</li>
                    <li><b>Join Coding Communities:</b> Join Coding Communities: Engage with other programmers through forums, online communities, or coding
                        meetups. Collaborating and sharing knowledge with like-minded individuals can enhance your learning
                        journey.</li>
                    <li><b>Expand Your Knowledge:</b> As you gain proficiency, explore advanced programming concepts, data structures,
                        algorithms, and specialized areas based on your interests and career goals.</li>
                </ol>

                <p class="text-lg text-gray-700 mb-6">
                    Remember, learning programming is a continuous process. Embrace challenges, be patient, and keep practicing
                    to become a proficient programmer.
                </p>

                <h2 class="text-2xl font-bold mb-2">Learn the Basics:</h2>

                <h2 class="text-2xl font-bold mb-2">Variables</h2>
                <p class="text-lg text-gray-700 mb-6">
                    In programming, variables are used to store and manipulate data. They act as named containers that hold a
                    value. Here's an example of declaring and using variables in C++:
                </p>
                <pre class="bg-gray-200 rounded p-4">
                <code class="language-cpp">
#include <iostream>

int main() {
    int age = 25;
    float weight = 65.5;
    char grade = 'A';
    std::string name = "John Doe";

    std::cout << "Name: " << name << std::endl;
    std::cout << "Age: " << age << std::endl;
    std::cout << "Weight: " << weight << std::endl;
    std::cout << "Grade: " << grade << std::endl;

    return 0;
}
                </code>
            </pre>
                <p class="text-lg text-gray-700 mb-6">
                    Here, we have declared four variables: <code>age</code>, <code>weight</code>, <code>grade</code>, and
                    <code>name</code>. These variables store the age, weight, grade, and name of a person, respectively. The
                    <code>std::cout</code> statement is used to print the values of these variables to the console.
                </p>

                <h2 class="text-2xl font-bold mb-2">Data Types</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Data types define the type of data that can be stored in a variable. C++ provides various built-in data
                    types, such as integers, floating-point numbers, characters, and strings. Here's an example:
                </p>
                <pre class="bg-gray-200 rounded p-4">
                <code class="language-cpp">
#include <iostream>

int main() {
    int age = 25;
    float weight = 65.5;
    char grade = 'A';
    std::string name = "John Doe";

    std::cout << "Name: " << name << std::endl;
    std::cout << "Age: " << age << std::endl;
    std::cout << "Weight: " << weight << std::endl;
    std::cout << "Grade: " << grade << std::endl;

    return 0;
}
                </code>
            </pre>
                <p class="text-lg text-gray-700 mb-6">
                    Here, we have declared four variables: <code>age</code>, <code>weight</code>, <code>grade</code>, and
                    <code>name</code>. The <code>int</code> keyword indicates that the <code>age</code> variable stores an
                    integer value. Similarly, the <code>float</code> keyword indicates that the <code>weight</code> variable
                    stores a floating-point number. The <code>char</code> keyword indicates that the <code>grade</code>
                    variable stores a single character. Finally, the <code>std::string</code> keyword indicates that the
                    <code>name</code> variable stores a string of characters. Here, <code>int</code>, <code>float</code>,
                    <code>char</code>, and <code>std::string</code> are data types.
                </p>

                <h2 class="text-2xl font-bold mb-2">Conditionals</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Conditionals allow you to make decisions in your code based on certain conditions. They help control the
                    flow of your program. Here's an example of using an if statement in C++:
                </p>
                <pre class="bg-gray-200 rounded p-4">
                <code class="language-cpp">
#include <iostream>

int main() {
    int age = 25;

    if (age >= 18) {
        std::cout << "You are an adult." << std::endl;
    } else {
        std::cout << "You are a minor." << std::endl;
    }

    return 0;
}
                </code>
            </pre>
                <p class="text-lg text-gray-700 mb-6">
                    Here, we have used an if statement to check if the <code>age</code> variable is greater than or equal to
                    18. If the condition is true, the program prints <code>You are an adult.</code> to the console. Otherwise,
                    it prints <code>You are a minor.</code>
                </p>

                <h2 class="text-2xl font-bold mb-2">Loops</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Loops allow you to repeat a block of code multiple times. They are useful for performing repetitive tasks.
                    Here's an example of using a for loop in C++ to print numbers from 1 to 5:
                </p>
                <pre class="bg-gray-200 rounded p-4">
                <code class="language-cpp">
#include <iostream>

int main() {
    //for loop
    for (int i = 1; i <= 5; i++) { 
        std::cout << i << std::endl;
    }

    //while loop
    int i = 1;
    while (i <= 5) {
        std::cout << i << std::endl;
        i++;
    }
    //do-while loop
    int i = 1;
    do {
        std::cout << i << std::endl;
        i++;
    } while (i <= 5);

    return 0;
}
                </code>
            </pre>
                <p class="text-lg text-gray-700 mb-6">
                    Here, we have used a for, while, do-while loop to print the value of the <code>i</code> variable from 1 to 5. The loop
                    starts with <code>i = 1</code> and increments the value of <code>i</code> by 1 after each iteration. The
                    loop ends when the value of <code>i</code> becomes greater than 5.
                </p>

                <h2 class="text-2xl font-bold mb-2">Functions</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Functions allow you to break your code into reusable blocks. They help in modularizing your code and
                    improving its readability. Here's an example of defining and calling a function in C++:
                </p>
                <pre class="bg-gray-200 rounded p-4">
                <code class="language-cpp">
#include <iostream>

void greet() {
    std::cout << "Hello, world!" << std::endl;
}

int main() {
    greet();

    return 0;
}
                </code>
            </pre>
                <p class="text-lg text-gray-700 mb-6">
                    Here, we have defined a function named <code>greet</code> that prints <code>Hello, world!</code> to the
                    console. The <code>void</code> keyword indicates that the function does not return any value. We have
                    called the <code>greet</code> function from the <code>main</code> function.
                </p>

                <p class="text-lg text-gray-700 mb-6">
                    These are just some of the fundamental concepts in programming. There's a lot more to explore and learn.
                    Practice writing code, experiment with different examples, and gradually build your programming skills.
                </p>



            </div>
        </div>
    </body>

</html>
<?php } ?>