<?php 
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic Details | CodeSohoj</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="topic-details">
                <?php
                if (isset($_SESSION["loggedin"]) && ($_SESSION["Users"]["status"] == "Normal" || $_SESSION["Users"]["status"] == "Admin")) {
                    // Fetch the topic details from the database
                    $topicId = $_GET['topic_id']; // Assuming the topic ID is passed as a query parameter in the URL

                    // Construct the SQL query to retrieve the topic details
                    $query = "SELECT * FROM learn WHERE id = '$topicId'";

                    // Execute the query and retrieve the topic details
                    $result = DB::findOneFromQuery($query);

                    // Check if the topic exists
                    if ($result) {
                        $title = $result['title'];
                        $shortDescription = $result['short'];
                        $description = $result['description'];

                        // Output the retrieved topic data
                        echo '<h2 class="text-2xl font-bold"><span id="topic-title">' . $title . '</span></h2>';
                        echo '<p><span id="topic-short-description">' . $shortDescription . '</span></p>';
                        echo '</br>';
                        echo '<p><span id="topic-description">' . $description . '</span></p>';
                    } else {
                        echo "Topic not found."; // Handle the case when the topic does not exist
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
