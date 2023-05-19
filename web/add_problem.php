<!DOCTYPE html>

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


    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <title>Codesohoj - Coding made Sohoj</title>

    <style>
      .ql-editor {
        min-height: 200px;
      }
    </style>


  </head>

  <body class="text-gray-800 antialiased">
  <div class="w-4/5 bg-white rounded-lg shadow-lg p-6 py-4">
    <div class="text-center py-6">
      <h1 class="text-3xl font-bold text-blue-700">Add Problem</h1>
    </div>
    <form class="max-w-4xl mx-auto mt-8" method="post" action="<?php echo SITE_URL; ?>/process.php" enctype='multipart/form-data'>
      <div class="mx-auto bg-white border border-grey-300 rounded rounded-lg shadow-lg p-6 py-4">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Name</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="name" id="name" required>
        </div>
        
          <label for="editor-container" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Statement</label>

          <div class="mb-5" id="editor-container">
          </div>
          <input type="hidden" name="statement" id="statement">
        

        <label for="editor-container-input" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Input</label>

        <div id="editor-container-input">
        </div>
        <input type="hidden" name="input_statement" id="input_statement">

        <label for="editor-container-output" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Output</label>

        <div id="editor-container-output">
        </div>
        <input type="hidden" name="output_statement" id="output_statement">

        <label for="editor-container-note" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Note</label>

        <div class="mb-5" id="editor-container-note">
        </div>
        <input type="hidden" name="note" id="note">



        <div class="mb-4 mt-5">
          <label for="code" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Short Code</label>
          <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="code" id="code" required>
        </div>
        <div class="flex flex-wrap -mx-2">
          <div class="w-1/2 mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Image File</label>
            <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" style="padding: 6px 12px" type="file" name="image" id="image">
          </div>
          <div class="w-1/2 mb-4">
            <label for="score" class="ml-1 block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Score</label>
            <input class="ml-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" style="padding: 6px 10px" type="text" name="score" id="score" value="100" required>
          </div>
        </div>
        <div class="flex flex-wrap -mx-2">
          <div class="w-1/2 mb-4">
            <label for="input" class="block text-gray-700 font-bold mb-2">Input File</label>
            <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="file" name="input" id="input" required>
          </div>
          <div class="w-1/2 mb-4">
            <label for="output" class="block text-gray-700 font-bold mb-2">Output File</label>
            <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="file" name="output" id="output" required>
          </div>
        </div>
        <div class="flex flex-wrap -mx-2">
          <div class="form-group w-1/2 mb-4">
            <label class="mr-1 block text-gray-700 font-bold mb-2" for="type">Type</label>
            <select class="mr-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="type" id="type">
              <option value="Hard">Hard</option>
              <option value="Medium">Medium</option>
              <option selected value="Easy">Easy</option>
            </select>
          </div>
          <div class="form-group w-1/2 mb-4">
            <label class="ml-1 block text-gray-700 font-bold mb-2" for="pgroup">Problem Group</label>
            <input class="ml-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="pgroup" id="pgroup" required>
            <small class="ml-2 block mt-1 text-xs text-gray-500">If it is a contest question then its group is same as contest code.</small>
          </div>
        </div>

        <div class="form-group">
          <label class="block text-gray-700 font-bold mb-2" for="category">Category</label>
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
          <small class="ml-2 block mt-1 text-xs text-gray-500">You can select multiple category.</small>
        </div>
        <div class="flex flex-wrap -mx-2">
          <div class="form-group w-1/2 mb-4">
            <label class="block text-gray-700 font-bold mb-2 mr-1" for="sampleinput">Sample Input File</label>
            <div class="mt-2 mr-1">
            <textarea type="text" name="sampleinput" id="sampleinput" required rows="5" class="block w-full border-gray-300 p-2 rounded-md placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full h-100px text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
          </div>
          </div>
          <div class="form-group w-1/2 mb-4">
            <label class="block text-gray-700 font-bold mb-2 ml-1" for="sampleoutput">Sample Output File</label>
            <div class="mt-2 ml-1">
            <textarea type="text" name="sampleoutput" id="sampleoutput" required rows="5" class="block w-full border-gray-300 p-2 rounded-md placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full h-100px text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea></div>
            
          </div>
        </div>
        <div class="form-group mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="contest">Contest type</label>
          <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="contest" id="contest">
            <option value="contest">Contest</option>
            <option selected value="practice">Practice</option>
          </select>
        </div>
        <div class="flex flex-wrap -mx-2">
          <div class="form-group mb-4 w-1/2">
            <label class="mr-1 block text-gray-700 font-bold mb-2" for="timelimit">Time Limit (s)</label>
            <input class="mr-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="timelimit" id="timelimit" value="1" required>
          </div>
          <div class="form-group mb-4 w-1/2">
            <label class="ml-1 block text-gray-700 font-bold mb-2" for="maxfilesize">Max File size (MB)</label>
            <input class="ml-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="maxfilesize" id="maxfilesize" value="256">
          </div>
        </div>
          <!-- <div class="form-group">
          <label class="block mb-2 text-sm font-medium" for="languages">Languages Allowed</label>
          <input type="hidden" name="languages" id="languages">
          <select class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring        w-full"  name="contest" id="contest">
            <option value="contest">C++</option>
            <option selected value="practice">Python</option>
            <option selected value="practice">Java</option>
          </select>
          </div> -->
        <div class="flex flex-wrap -mx-2">
          <div class="form-group mb-4 w-1/2">
            <label class="mr-1 block text-gray-700 font-bold mb-2" for="status">Status</label>
            <select class="mr-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="status" id="status">
              <option selected value="Active">Active</option>
              <option value="Inactive">Inactive</option>
              <option value="Deleted">Disabled</option>
            </select>
          </div>
          <div class="form-group mb-4 w-1/2">
            <label class="ml-1 block text-gray-700 font-bold mb-2" for="displayio">Display IO</label>
            <select class="ml-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="displayio" id="displayio">
              <option selected value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>
      <div class="flex flex-col items-center justify-center py-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="add_problem" style="transition: all 0.15s ease 0s">
          Add Problem
        </button>
      </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      var quill = new Quill('#editor-container', {
        modules: {
          toolbar: [
            [{
              header: [1, 2, false]
            }],
            [
              'bold',
              'italic',
              'underline',
              'strike',
              'blockquote',
              'formula',
            ],
            [{
              list: 'ordered'
            }, {
              list: 'bullet'
            }],
            ['link', 'video', 'code-block'],
            ['image'],
          ]
        },
        placeholder: 'Problem Statements...',
        theme: 'snow' // or 'bubble'
      });

      var quill_input = new Quill('#editor-container-input', {
        modules: {
          toolbar: [
            [{
              header: [1, 2, false]
            }],
            [
              'bold',
              'italic',
              'underline',
              'strike',
              'blockquote',
              'formula',
            ],
            [{
              list: 'ordered'
            }, {
              list: 'bullet'
            }],
            ['link', 'video', 'code-block'],
            ['image'],
          ]
        },
        placeholder: 'Input...',
        theme: 'snow' // or 'bubble'
      });


      var quill_output = new Quill('#editor-container-output', {
        modules: {
          toolbar: [
            [{
              header: [1, 2, false]
            }],
            [
              'bold',
              'italic',
              'underline',
              'strike',
              'blockquote',
              'formula',
            ],
            [{
              list: 'ordered'
            }, {
              list: 'bullet'
            }],
            ['link', 'video', 'code-block'],
            ['image'],
          ]
        },
        placeholder: 'Output...',
        theme: 'snow' // or 'bubble'
      });

      var quill_note = new Quill('#editor-container-note', {
        modules: {
          toolbar: [
            [{
              header: [1, 2, false]
            }],
            [
              'bold',
              'italic',
              'underline',
              'strike',
              'blockquote',
              'formula',
            ],
            [{
              list: 'ordered'
            }, {
              list: 'bullet'
            }],
            ['link', 'video', 'code-block'],
            ['image'],
          ]
        },
        placeholder: 'Note...',
        theme: 'snow' // or 'bubble'
      });

      var form = document.querySelector("form");
      var statement = document.querySelector('#statement');
      var input_statement = document.querySelector('#input_statement');
      var output_statement = document.querySelector('#output_statement');

      form.addEventListener('submit', function(e) {
        statement.value = quill.root.innerHTML;
        input_statement.value = quill_input.root.innerHTML;
        output_statement.value = quill_output.root.innerHTML;
      });


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