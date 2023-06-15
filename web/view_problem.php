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

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

    <div id="parentDiv" class="flex flex-col md:flex-row">
        <div id="childDiv2" class="w-7/12 p-6 ">
            <div class="bg-white rounded p-4 mt-4">
                <h1 class="text-2xl font-bold text-center text-gray-800"><?php echo $result['name']; ?></h1>
                <div class="flex flex-col text-sm items-center">
                    <span>Time Limit: <?php echo $result['timelimit'] . " second"; ?> </span>
                    <span>Memory Limit: <?php echo $result['maxfilesize'] . " MB"; ?></span>
                    <span>Category: <?php echo $result['categories']; ?></span>
                </div>
            </div>
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
            <div class="bg-white flex flex-row justify-between rounded p-4 mt-4 ">

                <div class="w-full m-2">
                    <h3 class="text-lg font-bold">Sample Input</h3>
                    <pre class="bg-gray-200 w-full p-2 rounded"><?php echo $result['sampleinput']; ?></pre>
                </div>
                <div class="w-full m-2">
                    <h3 class="text-lg font-bold">Sample Output</h3>
                    <pre class="bg-gray-200 w-full p-2 rounded"><?php echo $result['sampleoutput']; ?></pre>

                </div>

            </div>
            <div class="bg-white rounded p-4 mt-4">
                <h2 class="text-xl font-bold">Note</h2>
                <p class="mt-2">
                    <?php echo $result['note']; ?>
                </p>
            </div>


        </div>
        <div id="childDiv1" class="w-5/12 bg-white p-4 mt-6 md:mt-0 ">

            <!-- <div class="mb-8 mt-8">
                <h2 class="text-xl font-bold">Contest Material</h2>
                <ul style="list-style-type: disc;margin-left: 10px">
                    <li class="m-2"><a href="#" class="text-blue-500">Announcement</a></li>
                    <li class="m-2"><a href="#" class="text-blue-500">Editorial</a></li>
                </ul>
            </div> -->
            <form id="form" action="<?php echo SITE_URL; ?>/process.php" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
                <div class="bg-white p-4 rounded-lg w-full">
                    <div class="mb-4">
                        <label for="lang" class="block text-sm font-medium text-gray-700 mb-1">Language:</label>
                        <select id="lang" name="lang" class="py-2 px-4 rounded-lg w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Java">Java</option>
                            <option value="Python">Python</option>
                        </select>
                    </div>

                    <div id="solve-editor">
                        <label for="subcode" class="block text-sm font-medium text-gray-700 mb-1">Code:</label>
                        <textarea id="sub" rows="15" class="w-full p-4 bg-gray-100 rounded border-none" name="sub" placeholder="Write your code here..."><?php
                                                                                                                                                            ?></textarea>

                    </div>
                    <div id="solve-file" style="display: none;">
                        <label for="code_file" class="block text-sm font-medium text-gray-700 mb-1">File:</label>
                        <input type="file" name="code_file" class="px-4 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-full">
                    </div>
                </div>

                <input type="hidden" value="<?php echo ((isset($result['code']) && $result['code'] != "") ? ($result['code']) : ($prob['code'])); ?>" name="probcode" />

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" type="button" name="solvecodeineditor" style="transition: all 0.15s ease 0s" onclick="toggleEditor()">Solve with File</button>


                <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" name="submitcode" />

            </form>



        </div>
    </div>

    <?php
    if (isset($_GET['code'])) {
        $query = "select runs.rid as rid, pid, uid, runs.language as language, time, result, access, submittime, name, code, error, output from runs, subs_code where runs.rid = subs_code.rid and runs.rid = $_GET[code] and " . " uid=" . $_SESSION['Users']['uid'];
        $res = DB::findOneFromQuery($query);
        if ($res) {
    ?>

            <link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>/syntax-highlighter/shCoreDefault.css" />


            <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shCore.js"></script>

            <script type="text/javascript">
                SyntaxHighlighter.all();
            </script>

            <?php

            $resAttr = array('AC' => 'text-green-600', 'RTE' => 'text-yellow-600', 'WA' => 'text-red-600', 'TLE' => 'text-yellow-600', 'CE' => 'text-yellow-600', 'DQ' => 'text-red-600', 'PE' => 'text-blue-600', '...' => 'text-gray-600', '' => 'text-gray-600');
            $resAttrBg = array('AC' => ' bg-green-200', 'RTE' => ' bg-yellow-200', 'WA' => ' bg-red-200', 'TLE' => ' bg-yellow-200', 'CE' => ' bg-yellow-200', 'DQ' => ' bg-red-200', 'PE' => ' bg-blue-200', '...' => ' bg-gray-200', '' => ' bg-gray-200');

            echo '<h1 class="text-3xl font-bold mb-4">Submission<div class="float-right btn-group">' . $btn . '</div></h1>';

            echo '<div class="grid grid-cols-5 gap-4 mb-8">';
            echo '<div class="px-4 py-2">Run ID:</div>';
            echo '<div class="col-span-4 px-4 py-2">' . $res['rid'] . '</div>';
            echo '<div class="px-4 py-2">Result:</div>';
            echo '<div class="col-span-4"> <b><div class="flex flex-row w-16 px-4 py-2 rounded ' . $resAttr[$res['result']] . $resAttrBg[$res['result']] . '">' . $res['result'] . '<b></div></div>';
            echo '<div class="px-4 py-2">Run time:</div>';
            echo '<div class="col-span-4 px-4 py-2">' . $res['time'] . '</div>';
            echo '<div class="px-4 py-2">Language:</div>';
            echo '<div class="col-span-4 px-4 py-2">' . $res['language'] . '</div>';
            echo '<div class="px-4 py-2">Submission Time:</div>';
            echo '<div class="col-span-4 px-4 py-2">' . date("d F Y, l, H:i:s", $res['submittime']) . '</div>';
            echo '</div>';

            if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
            ?>

    <?php
            }
            echo '<h4 class="text-xl font-bold mb-2">Code</h4>';
            echo '<div class="overflow-x-auto bg-gray-100 rounded-lg p-4 mb-8">';
            echo '<pre class="whitespace-pre-wrap">' . htmlspecialchars($res['code']) . '</pre>';
            echo '</div>';

            if (strlen($res['error']) != 0) {
                $error = explode("||", $res['error']);
                echo '<h4 class="text-xl font-bold mb-2">Error</h4>';
                echo '<div class="overflow-x-auto bg-gray-100 rounded-lg p-4 mb-8">';
                echo '<pre class="whitespace-pre-wrap">' . ((isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == "Admin") ? ($res['error']) : ($error[0])) . '</pre>';
                echo '</div>';
            }
        } else {
            echo '<br/><br/><br/><div style="padding: 10px;"><h1>Solution not Found :(</h1>The solution you are looking for doesn\'t exist or you are not authorized to view.</div><br/><br/><br/>';
        }
    }
    ?>

    <script>
        function toggleEditor() {
            var solveEditor = document.getElementById("solve-editor");
            var solveFile = document.getElementById("solve-file");
            var solveCodeButton = document.getElementsByName("solvecodeineditor")[0];

            if (solveEditor.style.display === "none") {
                solveEditor.style.display = "block";
                solveFile.style.display = "none";
                solveCodeButton.innerText = "Solve with File";
            } else {
                solveEditor.style.display = "none";
                solveFile.style.display = "block";
                solveCodeButton.innerText = "Solve in Editor";
            }
        }
    </script>
</body>

</html>