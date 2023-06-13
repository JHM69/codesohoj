<!DOCTYPE html>

<?php
require_once "config.php";
require_once "components.php";
require_once "navigation.php";

include_once "functions.php";
if (
    isset($_SESSION["loggedin"]) &&
    $_SESSION["Users"]["status"] == "Normal" || $_SESSION["Users"]["status"] == "Admin"
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
        <title>Add Blog | Codesohoj</title>

        <style>
            .ql-editor {
                min-height: 200px;
            }
        </style>


    </head>

    <body class="text-gray-800 antialiased">
        <div class="w-4/5 bg-white rounded-lg shadow-lg p-6 py-4">
            <div class="text-center py-6">
                <h1 class="text-3xl font-bold text-blue-700">Add Blog</h1>
            </div>
            <form class="max-w-4xl mx-auto mt-8" method="post" action="<?php echo SITE_URL; ?>/process.php" enctype='multipart/form-data'>
                <div class="mx-auto bg-white border border-grey-300 rounded rounded-lg shadow-lg p-6 py-4">
                    <div class="mb-4">
                        <label for="blog_title" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Blog's Title</label>
                        <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="blog_title" id="blog_title" required>
                    </div>
                    <div class="mb-4">
                        <label for="blog_short_description" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Short Description</label>
                        <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="blog_short_description" id="blog_short_description" required>
                    </div>

                    <label for="editor-container" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Blog's Statement</label>

                    <div class="mb-5" id="editor-container">
                    </div>
                    <input type="hidden" name="blog_statement" id="blog_statement">
                    
                    <div class="w-full mb-4">
                            <label for="blog_statement_file" class="block text-gray-700 font-bold mb-2">Statement File</label>
                            <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="file" name="blog_statement_file" id="blog_statement_file">
                            <small class="ml-2 block mt-1 text-xs text-gray-500">(If you have any)</small>
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
                </div>
                <div class="flex flex-col items-center justify-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="add_topic" style="transition: all 0.15s ease 0s">Add Blog
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
                placeholder: 'Blog Statements...',
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