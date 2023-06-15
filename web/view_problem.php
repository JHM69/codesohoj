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

// Get the selected language from the form submission or set a default language
$selectedLanguage = isset($_POST['lang']) ? $_POST['lang'] : 'C';

// Get the basic code structure based on the selected language
function getBasicCodeStructure($language)
{
    if ($language === "C") {
        return "#include<stdio.h>\nint main(){\n\nreturn 0;\n}";
    } else if ($language === "C++") {
        return "#include<iostream>\nusing namespace std;\nint main(){\n\nreturn 0;\n}";
    } else if ($language === "Java") {
        return "import java.util.*;\npublic class Main{\npublic static void main(String args[]){\n\n}\n}";
    } else if ($language === "Python") {
        return "print('Hello World')";
    } else if ($language === "JavaScript") {
        return "console.log('Hello World')";
    } else {
        return ""; // Default code structure
    }
}

// Get the code structure for the selected language
$codeStructure = getBasicCodeStructure($selectedLanguage);
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


    <link href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">

    <style>
        .editor {
            display: inline-flex;
            gap: 10px;
            font-family: monospace;
            line-height: 21px;
            border-radius: 2px;
            background: rgba(59, 130, 246, 0.5);
            width: 100%;
        }

        .line-numbers {
            width: 20px;
            text-align: right;
        }

        .line-numbers span {
            counter-increment: linenumber;
        }

        .line-numbers span::before {
            content: counter(linenumber);
            display: block;
            color: #000;
        }

        textarea {
            line-height: 21px;
            overflow-y: hidden;
            padding: 0 5px;
            border: 0;
            background: #282a3a;
            color: #FFF;
            min-width: 0;
            outline: none;
            resize: none;
            width: 100%;
        }
    </style>
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

            <form id="form" action="<?php echo SITE_URL; ?>/process.php" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
                <div class="bg-white p-4 rounded-lg w-full">
                    <div class="mb-4">
                        <label for="lang" class="block text-sm font-medium text-gray-700 mb-1">Language:</label>
                        <select id="lang" name="lang" class="py-2 px-4 rounded-lg w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500" onchange="changeLanguage()">
                            <option value="C" <?php if ($selectedLanguage === 'C') echo 'selected'; ?>>C</option>
                            <option value="C++" <?php if ($selectedLanguage === 'C++') echo 'selected'; ?>>C++</option>
                            <option value="Java" <?php if ($selectedLanguage === 'Java') echo 'selected'; ?>>Java</option>
                            <option value="Python" <?php if ($selectedLanguage === 'Python') echo 'selected'; ?>>Python</option>
                            <option value="JavaScript" <?php if ($selectedLanguage === 'JavaScript') echo 'selected'; ?>>JavaScript</option>
                        </select>
                    </div>
                    <div id="solve-editor">
                        <div class="editor">
                            <div class="line-numbers">
                                <span></span>
                            </div>
                            <textarea id="sub" name="sub" rows="20" class="w-full rounded border-none" placeholder="Write your code here..."><?php echo $codeStructure; ?></textarea>
                        </div></textarea>

                    </div>
                    <div id="solve-file" style="display: none;">
                        <label for="code_file" class="block text-sm font-medium text-gray-700 mb-1">File:</label>
                        <input type="file" name="code_file" class="px-4 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-full">
                    </div>
                </div>

                <input type="hidden" value="<?php echo ((isset($result['code']) && $result['code'] != "") ? ($result['code']) : ($prob['code'])); ?>" name="probcode" />


                <input type="submit" value="Submit" class="w-3/5 mx-8 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" name="submitcode" />
                <p class="mt-2 text-sm"> OR </p>
                <button class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" type="button" name="solvecodeineditor" style="transition: all 0.15s ease 0s" onclick="toggleEditor()">Solve with File</button>

            </form>



        </div>
    </div>
    <div class="bg-white rounded p-4 m-4">
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
                echo '<div class="col-span-1 rounded px-4 py-1 bg-gray-200 items-center flex justify-center">Run ID</div>';
                echo '<div class="col-span-1 rounded px-4 py-1 bg-gray-200 items-center flex justify-center">Run time</div>';
                echo '<div class="col-span-1 rounded px-4 py-1 bg-gray-200 items-center flex justify-center">Result</div>';
                echo '<div class="col-span-1 rounded px-4 py-1 bg-gray-200 items-center flex justify-center">Language</div>';
                echo '<div class="col-span-1 rounded px-4 py-1 bg-gray-200 items-center flex justify-center">Submission Time</div>';

                echo '<div class="col-span-1  bg-white  flex items-center justify-center">' . $res['rid'] . '</div>';
                echo '<div class="col-span-1  bg-white flex items-center justify-center">' . $res['time'] . '</div>';
                echo '<b><div class="col-span-1 flex items-center justify-center bg-white"><span class="px-2 py-1 text-white rounded ' . $resAttr[$res['result']] . $resAttrBg[$res['result']] . '">' . $res['result'] . '</span></div></b>';

                echo '<div class="col-span-1  bg-white flex items-center justify-center">' . $res['language'] . '</div>';
                echo '<div class="col-span-1  bg-white flex items-center justify-center">' . date("d F Y, l, H:i:s", $res['submittime']) . '</div>';
                echo '</div>';


                if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
                ?>
    </div>
    <div class="bg-white rounded p-4 m-4">
<?php
                }
                echo '<h4 class="text-xl font-bold mb-2">Code</h4>';
                echo '<div class="overflow-x-auto bg-gray-100 rounded-lg">';
                echo '<div class="bg-gray-200 rounded border"><pre class="whitespace-pre-wrap"><code>' . htmlspecialchars($res['code']) . '</code></pre></div>';
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
?></div>


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


        function changeLanguage() {
            var langSelect = document.getElementById('lang');
            var selectedLanguage = langSelect.options[langSelect.selectedIndex].value;
            var codeStructure = getBasicCodeStructure(selectedLanguage);

            var textarea = document.getElementById('sub');
            textarea.value = codeStructure;
        }

        function getBasicCodeStructure(language) {
            if (language === "C") {
                return "#include<stdio.h>\nint main(){\n\nreturn 0;\n}";
            } else if (language === "C++") {
                return "#include<iostream>\nusing namespace std;\nint main(){\n\nreturn 0;\n}";
            } else if (language === "Java") {
                return "import java.util.*;\npublic class Main{\npublic static void main(String args[]){\n\n}\n}";
            } else if (language === "Python") {
                return "print('Hello World')";
            } else {
                return ""; // Default code structure
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        const textarea = document.querySelector('textarea');
        const lineNumbers = document.querySelector('.line-numbers');
        const langSelect = document.getElementById('lang');

        textarea.addEventListener('input', event => {
            const value = event.target.value;
            const cursorPosition = event.target.selectionStart;
            const openBrackets = ["(", "{"];
            const closeBrackets = [")", "}"];
            const backslash = "\\";

            if (openBrackets.includes(value[cursorPosition - 1])) {
                const nextChar = value[cursorPosition];

                if (nextChar !== closeBrackets[openBrackets.indexOf(value[cursorPosition - 1])]) {
                    event.target.value = value.slice(0, cursorPosition) + closeBrackets[openBrackets.indexOf(value[cursorPosition - 1])] + value.slice(cursorPosition);
                }

                event.target.selectionStart = cursorPosition + 1;
                event.target.selectionEnd = cursorPosition + 1;
            } else if (value[cursorPosition - 1] === backslash) {
                const nextChar = value[cursorPosition];

                if (closeBrackets.includes(nextChar)) {
                    event.target.value = value.slice(0, cursorPosition - 1) + value.slice(cursorPosition);
                    event.target.selectionStart = cursorPosition - 1;
                    event.target.selectionEnd = cursorPosition - 1;
                }
            }

            const numberOfLines = value.split('\n').length;

            lineNumbers.innerHTML = Array(numberOfLines)
                .fill('<span></span>')
                .join('');
        });

        langSelect.addEventListener('change', event => {
            changeLanguage();
        });

        textarea.addEventListener('keydown', event => {
            if (event.key === 'Tab') {
                const start = textarea.selectionStart;
                const end = textarea.selectionEnd;

                textarea.value = textarea.value.substring(0, start) + '\t' + textarea.value.substring(end);

                event.preventDefault();
            }
        });

        hljs.highlightAll();
    </script>
</body>

</html>