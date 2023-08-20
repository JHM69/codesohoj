<!DOCTYPE html>
<html lang="en">
<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

include_once "functions.php";
if (
   1
) { ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog name | CodeSohoj</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/06240e3f53.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="blog-details">
                    <?php
                    if (isset($_SESSION["loggedin"]) && ($_SESSION["Users"]["status"] == "Normal" || $_SESSION["Users"]["status"] == "Admin")) {
                        // Fetch the blog details from the database
                        $blogId = $_GET['blog_id']; // Assuming the blog ID is passed as a query parameter in the URL

                        // Construct the SQL query to retrieve the blog details
                        $query = "SELECT * FROM blogs WHERE id = '$blogId'";

                        // Execute the query and retrieve the blog details
                        $result = DB::findOneFromQuery($query);

                        // Check if the blog exists
                        if ($result) {
                            $title = $result['title'];
                            $description = $result['description'];
                            $addedby = $result['added'];
                            $likesCount = $result['likes'];
                            $dislikesCount = $result['dislikes'];

                            // Output the retrieved blog data
                            echo '<h2 class="text-2xl font-bold"><span id="blog-title">' . $title . '</span></h2>';
                            echo '<p><span id="blog-description">' . $description . '</span></p>';
                            echo '</br>';

                            // Add likes and dislikes buttons
                            echo '<div class="flex flex-row justify-between bg-gray-200 items-center p-2">';

                            echo '<form class="flex items-center" method="post" action="' . SITE_URL . '/process.php" enctype="multipart/form-data">';
                            echo '<input type="hidden" name="blogId" value="' . $blogId . '">';
                            echo '<button class="text-blue-500 btn-like rounded-full p-2 transition-all transform hover:scale-125" type="submit" name="likes"><i class="fa-solid fa-thumbs-up"></i></button>' . '<span class="ml-1">' . $likesCount . '</span>';
                            echo '</form>';

                            echo '<form class="flex items-center ml-4" method="post" action="' . SITE_URL . '/process.php" enctype="multipart/form-data">';
                            echo '<input type="hidden" name="blogId" value="' . $blogId . '">';
                            echo '<button class="text-red-500 btn-dislike rounded-full p-2 transition-all transform hover:scale-125" type="submit" name="dislikes"><i class="fa-solid fa-thumbs-down"></i></button>' . '<span class="ml-1">' . $dislikesCount . '</span>';
                            echo '</form>';

                            echo '<div class="w-1/2 text-right"><p><span id="blog-addedby">This blog is added by <b><i>' . $addedby . '</i></b></span></p></div>';

                            echo '</div>';
                        } else {
                            echo "Blog not found."; // Handle the case when the blog does not exist
                        }
                    } else {
                        echo "Access denied."; // Handle the case when the user is not logged in or does not have sufficient privileges
                    }
                    ?>
                </div>
            </div>
        </div>

    </body>

    <footer class="relative bg-gray-300 pt-8 pb-6">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                    <h5 class="text-lg mt-0 mb-2 text-gray-700">
                        Find us on any of these platforms.
                    </h5>
                    <div class="mt-6">
                        <button class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3" type="button">
                            <i class="flex fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3" type="button">
                            <i class="flex fab fa-dribbble"></i></button><button class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3" type="button">
                            <i class="flex fab fa-github"></i>
                        </button>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-6">
                        <div class="w-full lg:w-4/12 px-4 ml-auto">
                            <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Useful Links</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">About Us</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Blog</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="https://github.com/JHM69/codesohoj">Github</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Free Products</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Other Resources</span>
                            <ul class="list-unstyled">

                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Privacy Policy</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-400" />
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-gray-600 font-semibold py-1">
                        Copyright © 2023 Codesohoj by
                        <a href="https://www.github.com/jhm69" class="text-gray-600 hover:text-gray-900">jhm69</a>

                        and

                        <a href="https://www.github.com/fms-bite" class="text-gray-600 hover:text-gray-900">fms-bite</a>

                    </div>
                </div>
            </div>
        </div>
    </footer>

</html>
<?php } ?>