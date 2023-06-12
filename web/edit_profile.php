<!DOCTYPE html>
<html lang="en">
<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

include_once "functions.php";
if (
    isset($_SESSION["loggedin"]) &&
    $_SESSION["Users"]["status"] == "Normal" || $_SESSION["Users"]["status"] == "Admin"
) { ?>




    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <!-- Add Tailwind CSS CDN link here -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
        <!-- Add any additional CSS styles or custom stylesheets here -->
    </head>

    <body class="text-gray-800 antialiased">
        <div class="w-full bg-white rounded-lg shadow-lg pb-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-700">Edit Your Profile</h1>
            </div>
            <form class="max-w-4xl mx-auto mt-8" method="post" action="<?php echo SITE_URL; ?>/process.php" enctype='multipart/form-data'>
                <div class="mx-auto bg-white border border-grey-300 rounded rounded-lg shadow-lg p-6 py-4">
                    <div class="mb-4">
                        <label for="fullname" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Full Name</label>
                        <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="fullname" id="fullname" required>
                    </div>
                    <div class="mb-4">
                        <label for="pro_pic" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Profile Picture</label>
                        <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="file" name="pro_pic" id="pro_pic">
                    </div>
                    <div class="flex flex-wrap">
                        <div class="w-1/2 mb-4">
                            <label for="country" class="block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Country</label>
                            <input class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="country" id="country" required>
                        </div>

                        <div class="w-1/2 mb-4">
                            <label for="email" class="ml-1 block text-gray-700 font-bold mb-2 flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">Email</label>
                            <input class="ml-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="block text-gray-700 font-bold mb-2 mr-1" for="skill">Skills</label>
                        <div class="mt-2 mr-1">
                            <textarea type="text" name="skill" id="skill" required rows="5" class="ml-1 border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"></textarea>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center py-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="update" id="update" style="transition: all 0.15s ease 0s">
                            Update
                        </button>
                    </div>
            </form>
        </div>
    </body>

</html>
<?php } ?>
