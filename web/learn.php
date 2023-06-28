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
        <title>Learn | CodeSohoj</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>


    <body class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-4">Learn</h1>
            <p class="text-lg text-gray-700 mb-6">
                Learn the fundamentals of computer science with our engaging and practical courses in
                <span class="font-bold">C, C++, Python, Java, SQL</span> and <span class="font-bold">so on.</span>
                Our interactive courses emphasize real-world problem-solving, allowing you to practice your skills and gain confidence.
                Start learning with <span class="font-bold">CodeSohoj</span> today and unlock your potential as a developer!
            </p>


            <!-- Learning resources -->
            <?php
            $query = "SELECT * FROM learn";
            $result = DB::findAllFromQuery($query);
            $topicCount = count($result);
            ?>

            <div class="flex flex-wrap justify-center -mx-4 mt-8">
                <?php
                foreach ($result as $row) {
                    echo '<div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">';
                    echo '<div class="bg-white rounded-lg shadow-lg p-6 hover:bg-blue-100 transition-colors duration-300">';
                    echo '<h2 class="text-xl font-bold mb-2">' . $row['title'] . '</h2>';

                    // Limit the words in the short description
                    $shortDescription = $row['short'];
                    $words = explode(' ', $shortDescription);
                    $limitedDescription = implode(' ', array_slice($words, 0, 15)); // Limit to 15 words

                    echo '<p>' . $limitedDescription . '...</p>';
                    echo '<a href="' . SITE_URL . '/topic_details.php?topic_id=' . $row['id'] . '" class="text-blue-500">View Details</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

            <style>
                /* Center align the topics if there is 1, 4, 7, ... topics */
                <?php if ($topicCount % 3 == 1 || $topicCount % 3 == 2) : ?>.justify-center {
                    justify-content: center;
                }

                <?php endif; ?>
            </style>



            <div class="bg-gray-100 py-4">
                <div class="container mx-auto flex justify-center">
                    <a href="<?php echo SITE_URL; ?>/add_topic.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Topic
                    </a>
                </div>
            </div>
        </div>
    </body>

</html>
<?php } ?>