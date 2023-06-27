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
                            // $shortDescription = $result[''];
                            $description = $result['description'];
                            $addedby = $result['added'];
                            $likesCount = $result['likes'];
                            $dislikesCount = $result['dislikes'];

                            // Output the retrieved blog data
                            echo '<h2 class="text-2xl font-bold"><span id="blog-title">' . $title . '</span></h2>';
                            // echo '<p><span id="blog-short-description">' . $shortDescription . '</span></p>';
                            // echo '</br>';
                            echo '<p><span id="blog-description">' . $description . '</span></p>';
                            echo '</br>';

                            // Add likes and dislikes buttons
                            echo '<div class="flex flex-row justify-between bg-gray-200">';
                            echo '<div class="flex flex-row justify-between w-1/2">';
                            echo '<form class="flex flex-row justify-between w-1/4" method="post" action="' . SITE_URL . '/process.php" enctype="multipart/form-data">';
                            echo '<input type="hidden" name="blogId" value="' . $blogId . '">';
                            echo '<div><button class="text-blue-500 btn-like rounded-full p-2 transition-all transform hover:scale-125" type="submit" name="likes"><i class="fa-solid fa-thumbs-up"></i></button></div>';
                            echo '<div><button class="text-blue-500 btn-dislike rounded-full p-2 transition-all transform hover:scale-125" type="submit" name="dislikes"><i class="fa-solid fa-thumbs-down"></i></button></div>';
                            echo '</form>';

                            echo '<div class="flex items-center ml-4">';
                            echo '<span class=" mr-1">' . $likesCount . '</span>';
                            echo '<i class="fa-solid fa-thumbs-up "></i>';
                            echo '</div>';

                            echo '<div class="flex items-center ml-4">';
                            echo '<span class=" mr-1">' . $dislikesCount . '</span>';
                            echo '<i class="fa-solid fa-thumbs-down "></i>';
                            echo '</div>';

                            echo '</div>';
                            echo '<div class="w-1/2 my-auto pr-2"><p style="text-align: right;"><span id="blog-addedby">This blog is added by <b><i>' . $addedby . '</i></b></span></p></div>';
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

</html>
<?php } ?>