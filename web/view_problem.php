<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

// Extract the problem_id from the URL
$problem_id = $_GET['problem_id'];

// Query the database to fetch the problem
$sql = "SELECT p.*, GROUP_CONCAT(c.name) AS categories
        FROM problems AS p
        JOIN category_problem AS cp ON p.pid = cp.problem_id
        JOIN category AS c ON cp.category_id = c.id
        WHERE p.code = '$problem_id'";

$result = DB::findOneFromQuery($sql);




?>

<!DOCTYPE html>
<html>

<head>
    <title>Problem View - Codesohoj</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>Submit Problem | Codesohoj</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-3/4 p-6">
            <h1 class="text-2xl font-bold text-center text-gray-800"><?php echo $result['name']; ?></h1>
            <div class="bg-white rounded p-4 mt-4">
                <p class="mt-2">
                    <?php echo $result['statement']; ?>
                </p>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <h2 class="text-xl font-bold">Input</h2>
                <p class="mt-2">
                    <?php echo $result['input_statement']; ?>
                </p>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <h2 class="text-xl font-bold">Output</h2>
                <p class="mt-2">
                    <?php echo $result['output_statement']; ?>
                </p>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <div class="mb-2">
                    <h3 class="text-lg font-bold">Sample Input</h3>
                    <pre class="bg-gray-200 p-2"><?php echo $result['sampleinput']; ?></pre>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Sample Output</h3>
                    <pre class="bg-gray-200 p-2"><?php echo $result['sampleoutput']; ?></pre>
                </div>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <h2 class="text-xl font-bold">Note</h2>
                <p class="mt-2">
                    <?php echo $result['note']; ?>
                </p>
            </div>
            <div class="flex justify-center mt-6">
                <a href="compiler.php">
                    <button class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Solve Now
                    </button>
                </a>
            </div>
        </div>
        <div class="md:w-1/4 bg-white p-4 mt-6 md:mt-0">
            <div class="mb-8">
                <h2 class="text-xl font-bold">Problem Information</h2>
                <p class="mt-2">
                    <strong>Time Limit:</strong> <?php echo $result['timelimit']; ?> second<br>
                    <strong>Memory Limit:</strong> <?php echo $result['maxfilesize']; ?> KB
                </p>
            </div>
            <div class="mb-8">
                <h2 class="text-xl font-bold">Problem Category</h2>
                <p class="mt-2"><?php echo $result['categories']; ?></p>
            </div>
            <div>
                <h2 class="text-xl font-bold mt-8">Number of Solves</h2>
                <p><?php echo $result['solved']; ?></p>
            </div>
            <div class="mb-8 mt-8">
                <h2 class="text-xl font-bold">Contest Material</h2>
                <ul style="list-style-type: disc;margin-left: 10px">
                    <li class="m-2"><a href="#" class="text-blue-500">Announcement</a></li>
                    <li class="m-2"><a href="#" class="text-blue-500">Editorial</a></li>
                </ul>
            </div>
            <div class="mb-8">
                <h2 class="text-xl font-bold">Upload File</h2>
                <input type="file" class="mt-2">
            </div>
            <div>
                <h2 class="text-xl font-bold">Select Compiler Language</h2>
                <select class="mt-2">
                    <option value="c">C</option>
                    <option value="cpp">C++</option>
                    <option value="java">Java</option>
                    <option value="python">Python</option>
                </select>
            </div>
            <div class="flex justify-center mt-6">
                <button class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </div>
        </div>
    </div>

</body>

</html>