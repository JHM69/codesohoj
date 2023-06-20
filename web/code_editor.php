<!DOCTYPE html>
<html>

<head>
    <title>IDE - Codesohoj</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
</head>

<body class="bg-gray-200">
    <div class="flex flex-col items-center justify-center">
        <h1 class="text-xl font-bold text-center text-gray-500 my-2">Submit Solution</h1>
        <div class="w-3/4 bg-white shadow-md rounded-lg">
            <div class="px-8 pb-8 pt-4">
                <div>
                    <h1>
                        <span class="text-xl font-bold">Problem Name: </span>
                        <span class="text-xl font-bold">{Problem Name}</span>
                    </h1>
                </div>
                <div class="flex justify-between">
                    <div class="py-4 pr-4 w-4/5">
                        <h1 class="text-2xl font-bold text-blue-500">Code Editor</h1>
                    </div>
                    <div class="w-1/5">
                        <!-- <label for="lang" class="block text-sm font-medium text-gray-700 mb-1">Language:</label> -->
                        language:
                        &nbsp; &nbsp;
                        <select id="languages" name="languages" class="py-2 px-4 rounded-lg w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500" onchange="changeLanguage()">
                            <option value="c">C</option>
                            <option value="cpp">C++</option>
                            <option value="java">Java</option>
                            <option value="python">Python</option>
                        </select>
                    </div>
                </div>
                <label for="code" class="block text-l font-bold text-gray-700">Source code:</label>
                <div class="editor" id="editor" style="height: 400px; ">
                    <!-- <div class="line-numbers">
                        <span></span>
                    </div>
                    <textarea id="code" rows="25" class="w-full rounded border-none" placeholder="Write your code here..."></textarea> -->
                </div>
            </div>

        </div>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 mb-8">Submit</button>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/lib/ace.js"></script>
    <script src="js/lib/theme-monokai.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/ace-builds@1.22.1/src-min-noconflict/ace.min.js"></script>
    <script>
        let editor;
        window.onload = function() {
            editor = ace.edit("editor");
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("ace/mode/c_cpp");
        }
        function changeLanguage() {
            let language = $("#languages").val();
            
            if(language == 'c' || language == 'cpp') {
                editor.session.setMode("ace/mode/c_cpp");
            }
            else if(language == 'java') {
                editor.session.setMode("ace/mode/java");
            }
            else if(language == 'python') {
                editor.session.setMode("ace/mode/python");
            }
        }
    </script>



</body>

</html>