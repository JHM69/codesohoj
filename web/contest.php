<!DOCTYPE html>
<html>
<head>
    <title>Problem View - Codesohoj</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <div class="w-3/4 p-6">
        <h1 class="text-2xl font-bold text-center text-gray-800">New Palindrome</h1>
        <div class="bg-white rounded p-4 mt-4">
            <!--<h2 class="text-xl font-bold">Problem Description</h2>-->
            <p class="mt-2">
            A palindrome is a string that reads the same from left to right as from right to left. For example, abacaba, aaaa, abba, racecar are palindromes. You are given a string s consisting of lowercase Latin letters. The string s is a palindrome.You have to check whether it is possible to rearrange the letters in it to get another palindrome (not equal to the given string s).
            </p>
        </div>
        <div class="bg-white rounded p-4 mt-4">
            <h2 class="text-xl font-bold">Input</h2>
            <p class="mt-2">
            The first line contains a single integer t (1≤t≤1000) — the number of test cases.
            The only line of each test case contains a string s (2≤|s|≤50) consisting of lowercase Latin letters. This string is a palindrome. 
            </p>
        </div>
        <div class="bg-white rounded p-4 mt-4">
            <h2 class="text-xl font-bold">Output</h2>
            <p class="mt-2">
            For each test case, print YES if it is possible to rearrange the letters in the given string to get another palindrome. Otherwise, print NO. You may print each letter in any case (YES, yes, Yes will all be recognized as positive answer, NO, no and nO will all be recognized as negative answer).
            </p>
        </div>
        <div class="bg-white rounded p-4 mt-4">
            <div class="mb-2">
                <h3 class="text-lg font-bold">Sample Input</h3>
                <pre class="bg-gray-200 p-2">3<br>codedoc<br>gg<br>aabaa</pre>
            </div>
            <div>
                <h3 class="text-lg font-bold">Sample Output</h3>
                <pre class="bg-gray-200 p-2">YES<br>NO<br>NO</pre>
            </div>
        </div>
        <div class="bg-white rounded p-4 mt-4">
            <h2 class="text-xl font-bold">Note</h2>
            <p class="mt-2">
                In the first test case, it is possible to rearrange the letters in the palindrome codedoc to obtain the string ocdedco, which is different from the given string, but also a palindrome.
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
    <div class="w-1/4 bg-white p-4">
        <div class="mt-20 mb-8">
            <h2 class="text-xl font-bold">Problem Information</h2>
            <p class="mt-2">
                <strong>Time Limit:</strong> 1 second<br>
                <strong>Memory Limit:</strong> 256 MB
            </p>
        </div>
        <div class="mb-8">
            <h2 class="text-xl font-bold">Problem Category</h2>
            <p class="mt-2">string</p>
        </div>
        <div>
            <h2 class="text-xl font-bold mt-8">Number of Solves</h2>
            <p>12690</p>
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
</body>
</html>
