<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
  <title>Problem Form</title>
</head>
<body class="bg-gray-100 flex items-center justify-center">
  <div class="w-4/5 bg-white rounded-lg shadow-lg p-6 py-4">
    <h1 class="text-2xl font-bold mb-4 text-center">Add Problem</h1>
    <div class="mb-4">
      <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
      <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded-md">
    </div>


    <div class="mb-4">
      <label for="problemStatement" class="block text-gray-700 font-bold mb-2">Problem Statement:</label>
      <textarea id="problemStatement" name="problemStatement" class="w-full border border-gray-300 p-2 rounded-md h-40"></textarea>
    </div>
    <div class="mb-4">
      <label for="short_code" class="block text-gray-700 font-bold mb-2">Short Code:</label>
      <input type="text" id="short_code" name="short_code" class="w-full border border-gray-300 p-2 rounded-md">
    </div>
    <div class="mb-4">
      <label for="image" class="block text-gray-700 font-bold mb-2">Image file:</label>
      <input type="file" id="image" name="image" class="w-full border border-gray-300 p-2 rounded-md">
    </div>
    <div class="mb-4">
      <label for="score" class="block text-gray-700 font-bold mb-2">Score:</label>
      <input type="text" id="score" name="score" class="w-full border border-gray-300 p-2 rounded-md">
    </div>
    <div class="flex flex-wrap -mx-2">
      <div class="w-1/2 px-2 mb-4">
        <label for="input" class="block text-gray-700 font-bold mb-2">Input file:</label>
        <input type="file" id="input" name="input" class="w-full border border-gray-300 p-2 rounded-md">
      </div>
      <div class="w-1/2 px-2 mb-4">
        <label for="output" class="block text-gray-700 font-bold mb-2">Output file:</label>
        <input type="file" id="output" name="output" class="w-full border border-gray-300 p-2 rounded-md">
      </div>
    </div>

    <div class="mb-4">
      <label for="type" class="block text-gray-700 font-bold mb-2">Type:</label>
      <select id="type" name="type" class="w-full border border-gray-300 p-2 rounded-md">
        <option value="easy">Easy</option>
        <option value="medium">Medium</option>
        <option value="hard">Hard</option>
      </select>
    </div>
    <div class="mb-4">
      <label for="problem_group" class="block text-gray-700 font-bold mb-2">Problem Group:</label>
      <input type="text" id="problem_group" name="problem_group" class="w-full border border-gray-300 p-2 rounded-md">
    </div>
    <div class="mb-4">
      <label for="category" class="block text-gray-700 font-bold mb-2">Category:</label>
      <select id="category" name="category" class="w-full border border-gray-300 p-2 rounded-md">
        <option value="string">string</option>
        <option value="greedy">greedy</option>
        <option value="graph">graph</option>
        <option value="dp">dynamic programming</option>  
        <option value="math">math</option>
        <option value="number_theory">number theory</option>
        <option value="stack">stack</option>
        <option value="linked_list">linked list</option>    
      </select>
    </div>
    <div class="flex flex-wrap -mx-2">
      <div class="w-1/2 px-2 mb-4">
        <label for="sample_input" class="block text-gray-700 font-bold mb-2">Sample Input file:</label>
        <input type="file" id="sample_input" name="sample_input" class="w-full border border-gray-300 p-2 rounded-md">
      </div>
      <div class="w-1/2 px-2 mb-4">
        <label for="sample_output" class="block text-gray-700 font-bold mb-2">Sample Output file:</label>
        <input type="file" id="sample_output" name="sample_output" class="w-full border border-gray-300 p-2 rounded-md">
      </div>
    </div>

    <div class="mb-4">
      <label for="contest_type" class="block text-gray-700 font-bold mb-2">Contest Type:</label>
      <select id="contest_type" name="contest_type" class="w-full border border-gray-300 p-2 rounded-md">
        <option value="practice">Practice</option>
        <option value="contest">Contest</option>
      </select>
    </div>
    <div class="mb-4">
      <label for="time_limit" class="block text-gray-700 font-bold mb-2">Time limit:</label>
      <input type="text" id="time_limit" name="time_limit" class="w-full border border-gray-300 p-2 rounded-md">
    </div>
    <div class="mb-4">
      <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
      <select id="status" name="status" class="w-full border border-gray-300 p-2 rounded-md">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        <option value="disabled">Disabled</option>
      </select>
    </div>
    <div class="mb-4">
      <label for="max_file_size" class="block text-gray-700 font-bold mb-2">Maximum file size:</label>
      <input type="text" id="max_file_size" name="max_file_size" class="w-full border border-gray-300 p-2 rounded-md">
    </div>
    <div class="mb-4">
      <label for="display_io" class="block text-gray-700 font-bold mb-2">Display IO:</label>
      <select id="display_io" name="display_io" class="w-full border border-gray-300 p-2 rounded-md">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>
    <div class="flex flex-col items-center justify-center py-4">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Submit
      </button>
    </div>
  </div>
</body>
</html>




<div class="mt-2">
            <textarea type="text" name="statement" id="statement" required rows="10" class="block w-full border-gray-300 p-2 rounded-md placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full h-100px text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
          </div>