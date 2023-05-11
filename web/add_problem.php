<?php
require_once "config.php";
require_once "components.php";
require_once "navigation.php";

include_once "functions.php";
if (
  isset($_SESSION["loggedin"]) &&
  $_SESSION["Users"]["status"] == "Admin"
) { ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8" />


    <meta name="description" content="Codesohoj is an online platform that combines the benefits of an online judge and a coding learning platform. It offers programming problems, educational content, and supports multiple programming languages to provide an engaging learning experience for users of all levels.">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <title>Codesohoj - Coding made Sohoj</title>


  </head>

  <body class="text-gray-800 antialiased">

    <div class="text-center py-6">
      <h1 class="text-3xl font-bold text-blue-700">Add Problem</h1>
    </div>
    <form class="max-w-3xl mx-auto mt-8" method="post" action="<?php echo SITE_URL; ?>/process.php" enctype='multipart/form-data'>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label for="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Name</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="name" id="name" required>
        </div>


        <div>
          <label for="statement" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Problem Statement</label>
          <div class="mt-2">
            <textarea type="text" name="statement" id="statement" required rows="20" class="block w-full border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full h-100px rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
          </div>
          <!-- <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full h-100px" type="text" name="statement" id="statement" required> -->
        </div>
        <div>
          <label for="code" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Short Code</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="code" id="code" required>
        </div>
        <div>
          <label for="image" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Image File</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" style="padding: 6px 12px" type="file" name="image" id="image">
        </div>
        <div>
          <label for="score" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Score</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="score" id="score" required>
        </div>
        <div>
          <label for="input" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Input File</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" style="padding: 6px 12px" type="file" name="input" id="input" required>
        </div>

        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="type">Type</label>
          <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="type" id="type">
            <option value="Hard">Hard</option>
            <option value="Medium">Medium</option>
            <option selected value="Easy">Easy</option>
          </select>
        </div>
        <div>
          <label for="output" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Output File</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" style="padding: 6px 12px" type="file" name="output" id="output" required>
        </div>

        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="pgroup">Problem Group</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="pgroup" id="pgroup" required>
          <small class="block mt-1 text-xs text-gray-500">If it is a contest question then its group is same as contest code.</small>
        </div>

        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="category">Category</label>
          <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="category[]" id="category" multiple>
            <!-- Fetch category from category table -->

            <?php
            $sql = "SELECT * FROM category";
            $result = DB::findAllFromQuery($sql);
            //display the result in chip of tawilwind css

            foreach ($result as $row) {
              echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
            ?>


          </select>
        </div>

        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="sampleinput">Sample Input File</label>
          <input type="file" name="sampleinput" id="sampleinput">
        </div>
        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="sampleoutput">Sample Output File</label>
          <input type="file" name="sampleoutput" id="sampleoutput">
        </div>
        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="contest">Contest type</label>
          <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="contest" id="contest">
            <option value="contest">Contest</option>
            <option selected value="practice">Practice</option>
          </select>
        </div>
        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="timelimit">Time Limit</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="timelimit" id="timelimit" required>
        </div>
        <!-- <div class="form-group">
    <label class="block mb-2 text-sm font-medium" for="languages">Languages Allowed</label>
    <input type="hidden" name="languages" id="languages">
    <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"  name="contest" id="contest">
      <option value="contest">C++</option>
      <option selected value="practice">Python</option>
      <option selected value="practice">Java</option>
    </select>
  </div> -->
        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="status">Status</label>
          <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="status" id="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option selected value="Deleted">Disabled</option>
          </select>
        </div>
        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="maxfilesize">Max File size</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="maxfilesize" id="maxfilesize" value="50000">
        </div>
        <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="displayio">Display IO</label>
          <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="displayio" id="displayio">
            <option value="1">Yes</option>
            <option selected value="0">No</option>
          </select>
        </div>

      </div>
      <div class="text-center mt-6">
        <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" type="submit" name="add_problem" style="transition: all 0.15s ease 0s">
          Add Problem
        </button>
      </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        // Listen for changes to the select element
        $('#categorory').on('change', function() {
          // Get a list of all the selected options
          const selectedOptions = $(this).find('option:selected');

          // Map over the selected options and extract their values
          const selectedValues = selectedOptions.map(function() {
            return $(this).val();
          }).get();

          // Join the selected values with "+" symbols
          const joinedValues = selectedValues.join('+');

          // Update the result element with the joined values
          $('.categorory').text(joinedValues);
        });
      });
    </script>
  </body>

  </html>
<?php } ?>