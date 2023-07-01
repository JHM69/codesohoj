<!DOCTYPE html>
<html lang="en">
<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

if (
    isset($_SESSION["loggedin"]) &&
    $_SESSION["Users"]["status"] == "Normal" || $_SESSION["Users"]["status"] == "Admin"
) { ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog | CodeSohoj</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-4">Blogs</h1>

            <!-- Blog posts -->
            <?php
            $query = "SELECT * FROM blogs";
            $result = DB::findAllFromQuery($query);
            $blogCount = count($result);
            ?>
            <style>
                .grid-container {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: stretch;
                    /* Stretch grid items to match height */
                }

                .grid-item {
                    background-color: white;
                    border-radius: 8px;
                    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    width: 30%;
                    margin: 15px;
                    transition: all 0.3s ease;
                    cursor: pointer;
                    overflow: hidden;
                    /* Hide overflowing content */
                }

                .grid-item:hover {
                    transform: scale(1.05);
                    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
                }

                .grid-item h2 {
                    font-size: 24px;
                    margin-bottom: 10px;
                }

                .grid-item p {
                    font-size: 16px;
                    margin-bottom: 20px;
                    max-height: 75px;
                    /* Set a maximum height for the description */
                    overflow: hidden;
                    /* Hide overflowing description */
                }

                .grid-item a {
                    color: #007BFF;
                    text-decoration: none;
                }
                #temp {
                    text-decoration: none;
                    color: black;
                }
            </style>

            <div class="grid-container">
                <?php
                foreach ($result as $row) {
                    echo '<a href="' . SITE_URL . '/view_blog.php?blog_id=' . $row['id'] . '" class="text-gray-500" id="temp">';
                    echo '<div class="grid-item">';
                    echo '<h2 class="text-xl font-bold mb-2">' . $row['title'] . '</h2>';

                    // Limit the words in the short description
                    $shortDescription = $row['description'];
                    $words = explode(' ', $shortDescription);
                    $limitedDescription = implode(' ', array_slice($words, 0, 15)); // Limit to 15 words

                    echo '<p>' . $limitedDescription . '...</p></a>';
                    echo '<a href="' . SITE_URL . '/view_blog.php?blog_id=' . $row['id'] . '" class="text-blue-500">Read More</a>';
                    echo '</div>';
                }
                ?>
            </div>
            
            
            <div class="bg-gray-100 py-4 mt-4">
                <div class="container mx-auto flex justify-center">
                    <a href="<?php echo SITE_URL; ?>/add_blog.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Blog
                    </a>
                </div>
            </div>
        </div>
    </body>

</html>
<?php } ?>