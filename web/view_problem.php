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
        WHERE p.code = '$problem_id'
        GROUP BY p.pid;
        ";

$result = DB::findOneFromQuery($sql);

// Get the selected language from the form submission or set a default language
$selectedLanguage = isset($_POST['lang']) ? $_POST['lang'] : 'C++';

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

    <!-- <style>
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
    </style> -->
</head>

<body class="bg-gray-200">
    <div id="parentDiv" class="flex flex-col md:flex-row h-full">
        <div id="childDiv1" class="w-7/12 pt-6 px-2 h-full overflow-auto">
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
        <div id="childDiv2" class="w-5/12 pt-10">
            <form id="form" action="<?php echo SITE_URL; ?>/process.php" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
                <div class="bg-white p-4 rounded-lg w-full h-400px">
                    <div class="mb-4">
                        <!-- <label for="lang" class="block text-sm font-medium text-gray-700 mb-1">Language:</label> -->
                        Language:
                        &nbsp; &nbsp;
                        <select id="lang" name="lang" class="py-2 px-4 rounded-lg w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500" onchange="changeLanguage()">
                            <option value="C" <?php if ($selectedLanguage === 'C') echo 'selected'; ?>>C</option>
                            <option value="C++" <?php if ($selectedLanguage === 'C++') echo 'selected'; ?>>C++</option>
                            <option value="Java" <?php if ($selectedLanguage === 'Java') echo 'selected'; ?>>Java</option>
                            <option value="Python" <?php if ($selectedLanguage === 'Python') echo 'selected'; ?>>Python</option>
                            <option value="JavaScript" <?php if ($selectedLanguage === 'JavaScript') echo 'selected'; ?>>JavaScript</option>
                        </select>
                    </div>
                    <div id="solve-editor" class="rounded">
                        <div class="editor" id="editor" style="height: 400px; font-size: 17px; border-radius: 4px;"></div>

                        <textarea hidden id="sub" name="sub" rows="17" class="w-full rounded border-none"></textarea>

                    </div>
                    <div id="solve-file" style="display: none;">
                        <label for="code_file" class="block text-sm font-medium text-gray-700 mb-1">File:</label>
                        <input type="file" name="code_file" class="px-4 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-full">
                    </div>


                    <input type="hidden" value="<?php echo ((isset($result['code']) && $result['code'] != "") ? ($result['code']) : ($prob['code'])); ?>" name="probcode" />

                    <div class="flex flex-col items-center justify-center">
                        <input type="submit" value="Submit" class="w-1/2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 mt-4 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50" onclick="setValue()" name="submitcode" />
                        <p class="mt-2 text-sm"> OR </p>
                        <button class="bg-gray-800 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4" type="button" name="solvecodeineditor" style="transition: all 0.15s ease 0s" onclick="toggleEditor()">Submit with File</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-white rounded p-4 m-4 mt-48">
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

                if ($res['result'] == "...") {
                    header("Refresh: 3; URL=" . $_SERVER['REQUEST_URI']);
                }


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
?>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="js/lib/ace.js"></script>
    <script src="js/lib/theme-monokai.js"></script>
    <script>
        let editor;
        window.onload = function() {
            editor = ace.edit("editor");
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("ace/mode/c_cpp");
            editor.session.setValue(`#include<iostream>
using namespace std;
int main(){
    int t;
    cin >> t;
    for (int i = 1; i <= t; i++) {
        cout << "codesohoj" << endl;
    }
    return 0;
}`);
        }

        function setValue() {
            var code = editor.getValue();
            console.log(code);
            document.getElementById('sub').value = code;

            console.log(document.getElementById('sub').value);
        }



        function changeLanguage() {
            var langSelect = document.getElementById('lang');
            var selectedLanguage = langSelect.options[langSelect.selectedIndex].value;
            var codeStructure = getBasicCodeStructure(selectedLanguage);
            editor.session.setValue(codeStructure);
        }

        function getBasicCodeStructure(language) {
            if (language === "C") {
                editor.session.setMode("ace/mode/c_cpp");
                return `#include<stdio.h>
int main(){
    int t;
    scanf("%d", &t);
    for (int i = 1; i <= t; i++) {
        printf("codesohoj\\n");
    }
    return 0;
}`;
            } else if (language === "C++") {
                editor.session.setMode("ace/mode/c_cpp");
                return `#include<iostream>
using namespace std;
int main(){
    int t;
    cin >> t;
    for (int i = 1; i <= t; i++) {
        cout << "codesohoj" << endl;
    }
    return 0;
}`;
            } else if (language === "Java") {
                editor.session.setMode("ace/mode/java");
                return `import java.util.*;
public class Main {
    public static void main(String args[]) {
        Scanner sc = new Scanner(System.in);
        int t = sc.nextInt();
        for (int i = 1; i <= t; i++) {
            System.out.println("codesohoj");
        }
    }
}`;
            } else if (language === "Python") {
                editor.session.setMode("ace/mode/python");
                return `
                t =input()
                for i in range(t):
    print("codesohoj")`;
            } else if (language === "JavaScript") {
                editor.session.setMode("ace/mode/javascript");
                return `
                let t;
                t = parseInt(prompt());
                for (let i = 1; i <= t; i++) {
    console.log("codesohoj");
}`;
            } else {
                return "";
            }


        }
    </script>

    <script>
        function toggleEditor() {
            var solveEditor = document.getElementById("solve-editor");
            var solveFile = document.getElementById("solve-file");
            var solveCodeButton = document.getElementsByName("solvecodeineditor")[0];

            if (solveEditor.style.display === "none") {
                solveEditor.style.display = "block";
                solveFile.style.display = "none";
                solveCodeButton.innerText = "Submit with File";
            } else {
                solveEditor.style.display = "none";
                solveFile.style.display = "block";
                solveCodeButton.innerText = "Solve in Editor";
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
            // const openBrackets = ["(", "{"];
            // const closeBrackets = [")", "}"];
            // const backslash = "\\";

            // if (openBrackets.includes(value[cursorPosition - 1])) {
            //     const nextChar = value[cursorPosition];

            //     if (nextChar !== closeBrackets[openBrackets.indexOf(value[cursorPosition - 1])]) {
            //         event.target.value = value.slice(0, cursorPosition) + closeBrackets[openBrackets.indexOf(value[cursorPosition - 1])] + value.slice(cursorPosition);
            //     }

            //     event.target.selectionStart = cursorPosition + 1;
            //     event.target.selectionEnd = cursorPosition + 1;
            // } else if (value[cursorPosition - 1] === backslash) {
            //     const nextChar = value[cursorPosition];

            //     if (closeBrackets.includes(nextChar)) {
            //         event.target.value = value.slice(0, cursorPosition - 1) + value.slice(cursorPosition);
            //         event.target.selectionStart = cursorPosition - 1;
            //         event.target.selectionEnd = cursorPosition - 1;
            //     }
            // }

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
<footer class="relative bg-gray-300 pt-8 pb-6">
    <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-700">
                    Find us on any of these platforms.
                </h5>
                <div class="mt-6">
                    <button class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3" type="button">
                        <i class="flex fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3" type="button">
                        <i class="flex fab fa-dribbble"></i></button><button class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3" type="button">
                        <i class="flex fab fa-github"></i>
                    </button>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Useful Links</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">About Us</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Blog</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="https://github.com/JHM69/codesohoj">Github</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Free Products</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Other Resources</span>
                        <ul class="list-unstyled">

                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-400" />
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright © 2023 Codesohoj by
                    <a href="https://www.github.com/jhm69" class="text-gray-600 hover:text-gray-900">jhm69</a>

                    and

                    <a href="https://www.github.com/fms-bite" class="text-gray-600 hover:text-gray-900">fms-bite</a>

                </div>
            </div>
        </div>
    </div>
</footer>

</html>