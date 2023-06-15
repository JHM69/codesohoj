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
                        <label for="lang" class="block text-sm font-medium text-gray-700 mb-1">Language:</label>
                        <select id="lang" name="lang" class="py-2 px-4 rounded-lg w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            <option value="c">C</option>
                            <option value="cpp">C++</option>
                            <option value="java">Java</option>
                            <option value="python">Python</option>
                        </select>
                    </div>
                </div>
                <label for="code" class="block text-l font-bold text-gray-700">Source code:</label>
                <div class="editor">
                    <div class="line-numbers">
                        <span></span>
                    </div>
                    <textarea id="code" rows="25" class="w-full rounded border-none" placeholder="Write your code here..."></textarea>
                </div>
            </div>

        </div>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 mb-8">Submit</button>
    </div>
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
            const lang = event.target.value;
            textarea.setAttribute('class', `language-${lang}`);
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