<?php
require_once "config.php";
require_once "components.php";
require_once "navigation.php";

include_once "functions.php";

if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
    if (isset($_GET['code'])) {
        $_GET['code'] = $_GET['code'];
        $query = "select * from contest where code = '$_GET[code]'";
        $res = DB::findOneFromQuery($query);
?>
        <div class="flex justify-center">
            <h1 class="text-3xl font-bold">Contest Settings</h1>
        </div>

        <div class="ml-8 mr-8 lg:ml-20 lg:mr-20 mb-10">
            <form class="max-w-md mx-auto space-y-6 mb-20" action="<?php echo SITE_URL; ?>/process.php" method="post">
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                    <input class="rounded form-input mt-1 block w-full" type="text" id="name" name="name" value="<?php echo $res['name']; ?>" required />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="code">Contest Code</label>
                    <input class="rounded form-input mt-1 block w-full" type="text" id="code" name="code" value="<?php echo $res['code']; ?>" required />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="starttime">Start Time</label>
                    <input class="rounded form-input mt-1 block w-full datetimepicker" type="text" id="starttime" name="starttime" value="<?php echo date("d-m-Y H:i:s", $res['starttime']); ?>" required placeholder="Format: DD-MM-YYYY h:m:s" />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="endtime">End Time</label>
                    <input class="rounded form-input mt-1 block w-full datetimepicker" type="text" id="endtime" name="endtime" value="<?php echo date("d-m-Y H:i:s", $res['endtime']); ?>" required placeholder="Format: DD-MM-YYYY h:m:s" />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="announcement">Announcements</label>
                    <input type="hidden" class="rounded form-textarea mt-1 block w-full" id="announcement" name="announcement" value="<?php echo $res['announcement']; ?>" style="height: 300px;"></textarea>
                    <div id="editor-container"></div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" name="updatecontest" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-10">Add Contest</button>
                </div>
            </form>
        </div>

    <?php
    } else {
    ?>
        <div class="flex justify-center">
            <h1 class="text-3xl font-bold">Contest Settings</h1>
        </div>

        <div class="ml-8 mr-8 lg:ml-20 lg:mr-20 mb-10">
            <form class="max-w-md mx-auto space-y-6 mb-20" action="<?php echo SITE_URL; ?>/process.php" method="post">
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                    <input class="rounded form-input mt-1 block w-full" type="text" id="name" name="name" required />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="code">Contest Code</label>
                    <input class="rounded form-input mt-1 block w-full" type="text" id="code" name="code" required />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="starttime">Start Time</label>
                    <input class="rounded form-input mt-1 block w-full datetimepicker" type="text" id="starttime" name="starttime" required placeholder="Format: DD-MM-YYYY h:m:s" />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="endtime">End Time</label>
                    <input class="rounded form-input mt-1 block w-full datetimepicker" type="text" id="endtime" name="endtime" required placeholder="Format: DD-MM-YYYY h:m:s" />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700" for="announcement">Announcements</label>
                    <input type="hidden" class="rounded form-textarea mt-1 block w-full" id="announcement" name="announcement" style="height: 300px;"></textarea>
                    <div id="editor-container">
                    </div>

                </div>
                <div class="flex justify-center">
                    <button type="submit" name="addcontest" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-10">Add Contest</button>

                </div>
            </form>


        </div>






<?php
    }
} else {
    $_SESSION['msg'] = "Access Denied: You need to be administrator to access that page.";
    redirectTo(SITE_URL . "/");
}
?>

<head>
    <meta charset="utf-8" />


    <meta name="description" content="Codesohoj is an online platform that combines the benefits of an online judge and a coding learning platform. It offers programming problems, educational content, and supports multiple programming languages to provide an engaging learning experience for users of all levels.">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Include the Flatpickr JavaScript library -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <title>Codesohoj - Coding made Sohoj</title>

    <style>
        .ql-editor {
            min-height: 10px;
        }
    </style>


</head>

<body>
    <!-- Your existing HTML code -->

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
            placeholder: 'Announcement...',
            theme: 'snow' // or 'bubble'
        });

        var form = document.querySelector("form");
        var announcement = document.querySelector('#announcement');

        form.addEventListener('submit', function(e) {
            announcement.value = quill.root.innerHTML;
        });

        // Initialize Flatpickr datetime picker on input fields with the 'datetimepicker' class
        flatpickr('.datetimepicker', {
            enableTime: true,
            dateFormat: 'd-m-Y H:i:S',
            time_24hr: true
        });
    </script>
</body>