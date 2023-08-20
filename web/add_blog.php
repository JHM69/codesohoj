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
                    <label for="editor-container" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Blog's Statement</label>

                    <div class="mb-5" id="editor-container">
                    </div>
                    <input type="hidden" name="description" id="description">

                    <div class="w-full mb-4">
                        <label for="blog_statement_file" class="block text-gray-700 font-bold mb-2">Statement File</label>
                        <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="file" name="blog_statement_file" id="blog_statement_file">
                        <small class="ml-2 block mt-1 text-xs text-gray-500">(If you have any)</small>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="add_blog" style="transition: all 0.15s ease 0s">Add Blog
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

            var form = document.querySelector("form");
            var statement = document.querySelector('#description');
            // var input_statement = document.querySelector('#input_statement');
            // var output_statement = document.querySelector('#output_statement');

            form.addEventListener('submit', function(e) {
                statement.value = quill.root.innerHTML;
                // input_statement.value = quill_input.root.innerHTML;
                // output_statement.value = quill_output.root.innerHTML;
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
    <nav aria-label="Page navigation example" class="flex justify-center">
        <ul class="flex items-center space-x-2">
            <?php if ($page > 1) : ?>
                <li>
                    <a href="?category=<?= $category_id ?>&page=<?= $page - 1 ?>" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li>
                    <a href="?category=<?= $category_id ?>&page=<?= $i ?>" class="px-3 py-2 leading-tight <?= $page == $i ? 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages) : ?>
                <li>
                    <a href="?category=<?= $category_id ?>&page=<?= $page + 1 ?>" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover                                :bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10l-3.293-3.293a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    </html>
<?php } ?>