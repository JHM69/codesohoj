<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

include_once "functions.php";


$my_account = false;


if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = $_SESSION["Users"]["username"];
}

if ($_SESSION['loggedin'] &&  $_SESSION["Users"]["username"] == $id) {
    $my_account = true;
}

$sql = "Select * from Users where Users.username= '$id'";

$result = DB::findOneFromQuery($sql);


$uid = $result['uid'];

$_SESSION["Users"]["photo"] =  $result['photo'];

$sql = "SELECT Result, COUNT(*) as Count
from runs where uid=$uid
GROUP BY Result;";

$results = DB::findAllFromQuery($sql);


$sql = "SELECT 
problems.code AS problem_code, 
problems.name AS name, 
runs.rid as rid,
subs_code.code AS s_code, 
runs.result AS r_result, 
runs.language as lang,
runs.submittime AS s_time 
FROM runs
JOIN problems ON problems.pid = runs.pid
JOIN subs_code ON subs_code.rid = runs.rid
WHERE runs.uid = $uid
ORDER BY runs.submittime DESC
LIMIT 5;
";

$submissions = DB::findAllFromQuery($sql);


$sql = "SELECT c.name AS category_name, COUNT(*) AS category_count
FROM runs AS r
JOIN category_problem AS cp ON r.pid = cp.problem_id
JOIN category AS c ON cp.category_id = c.id
WHERE r.uid = $uid AND r.result = 'AC'
GROUP BY cp.category_id, c.name;";

$categories = DB::findAllFromQuery($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Add Tailwind CSS CDN link here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add any additional CSS styles or custom stylesheets here -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        #last_visit {
            color: #06bf40;
        }

        #css:hover {
            border: 2.5px solid;
            border-color: rgba(59, 130, 246, 0.6);
            transform: scale(1.03);
            transition: transform 0.5s ease-in-out;
        }

        #css:not(:hover) {
            transform: scale(1);
            transition: transform 0.5s ease-in-out;
        }

        #dialog {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #000000;
            z-index: 1000;
            /* make sure it's on top of other elements */
        }
    </style>


</head>

<body class="bg-gray-100">
    <div class="p-8">
        <div class="bg-white rounded shadow-lg max-w-7xl mx-auto">
            <h1 class="text-1xl text-center font-bold text-gray-500"><?php echo $result['username']; ?>'s Profile</h1>
            <hr class="border border-blue-300">
        </div>
        <div class="flex flex-col md:flex-row bg-white p-2 rounded shadow-lg max-w-7xl mx-auto">
            <div class="md:w-1/3 p-8 container mx-auto py-8">
                <div class="bg-white px-8 py-4 rounded shadow-lg" id="css">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center pt-4">
                            <img src=<?php if (isset($result['photo'])) {
                                            echo $result['photo'];
                                        } else {
                                            echo "./assets/img/user.png";
                                        } ?> alt="<?php echo $result['username']; ?> . Profile Picture" class="h-20 w-20 rounded-full" id="profile_photo" name="profile_photo">
                            <div class="ml-4">
                                <h1 class="text-2xl font-bold " id="username" name="username"><?php echo $result['username']; ?></h1>
                                <h1 class="mt-2 text-l text-gray-700" id="fullname" name="fullname"><?php echo $result['name']; ?></h1>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($my_account) {
                        echo '<div class="mt-8 pb-4 flex justify-center">
                <a href="' . SITE_URL . '/edit_profile.php">
                    <button class="bg-blue-500 hover:bg-blue-600 text-gray-100 font-bold py-1 px-20 rounded" id="edit_profile" name="edit_profile">
                        Edit Profile
                    </button>
                </a>
              </div>';
                    } else {
                        echo '<div class="mt-8 pb-4 flex justify-center">
                
                    <button class="bg-blue-500 hover:bg-blue-600 text-gray-100 font-bold py-1 px-20 rounded" id="edit_profile" name="edit_profile">
                        Follow
                    </button>
               
              </div>';
                    }
                    ?>
                </div>
                <div class="bg-white px-8 py-4 rounded shadow-lg mt-4" id="css">
                    <h4 class="text-1xl text-center font-bold text-black-500">Information</h4>
                    <hr class="border-t-2 border-gray-300 my-4">

                    <p class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2">
                        <span class="pr-2"><i class="fas fa-university"></i></span>
                        <span class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2" id="university" name="university">
                            <?php echo $result['university']; ?>
                        </span>
                    </p>

                    <p class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2">
                        <span class="pr-2"><i class="fas fa-user-graduate"></i></span>
                        <span class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2" id="dept" name="dept">
                            <?php echo $result['dept']; ?>
                        </span>
                    </p>

                    <p class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2">
                        <span class="pr-2"><i class="fas fa-globe"></i></span>
                        <span class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2" id="country" name="country">
                            <?php echo $result['country']; ?>
                        </span>
                    </p>

                    <p class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2">
                        <span class="pr-2"><i class="fas fa-envelope"></i></span>
                        <span class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2" id="email" name="email">
                            <?php echo $result['email']; ?>
                        </span>
                    </p>

                    <p class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2">
                        <span class="pr-2"><i class="fas fa-clock"></i></span>
                        <span class="px-[13px] text-s font-medium text-label-3 dark:text-dark-label-3 mb-2" id="last_visit" name="last_visit">
                            <?php echo $result['last_visit']; ?>
                        </span>
                    </p>
                </div>

                <div class="bg-white px-8 py-4 rounded shadow-lg mt-4" id="css">
                    <h4 class="text-1xl text-center font-bold text-black-500">Bio</h4>


                    <?php echo $result['skill']; ?>

                </div>
            </div>

            <div class="md:w-2/3 p-6 container mx-auto py-8">
                <div class="flex">
                    <div class="w-8/12 px-4 py-2  bg-white items-center justify-center rounded shadow-lg mx-2 h-72" id="css">
                        <h2 class="text-xl font-bold mb-2">Solved Problems by Category</h2>

                        <!-- Center the canvas using flex and justify-center classes -->
                        <div class="flex justify-center items-center h-full">
                            <canvas class="w-3/4 h-3/4" id="polar-area-chart"></canvas>
                        </div>
                    </div>
                    <div class="w-4/12 bg-white px-2 py-2 rounded shadow-lg mx-2 h-72 relative" id="css">
                        <h2 class="text-xl font-bold mb-2">Runs</h2>

                        <div class="w-full h-56">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="bg-white px-8 py-4 rounded shadow-lg mx-2 h-auto relative mt-4" id="css">
                    <h2 class="text-xl font-bold mb-2">Lasest Submissions</h2>

                    <?php

                    $resAttr = array('AC' => 'text-gray-800', 'RTE' => 'text-yellow-600', 'WA' => 'text-red-600', 'TLE' => 'text-yellow-600', 'CE' => 'text-yellow-600', 'DQ' => 'text-red-600', 'PE' => 'text-blue-600', '...' => 'text-gray-600', '' => 'text-gray-600');
                    $resAttrBg = array('AC' => ' bg-green-200', 'RTE' => ' bg-yellow-200', 'WA' => ' bg-red-200', 'TLE' => ' bg-yellow-200', 'CE' => ' bg-yellow-200', 'DQ' => ' bg-red-200', 'PE' => ' bg-blue-200', '...' => ' bg-gray-200', '' => ' bg-gray-200');



                    echo "<table class='table-auto min-w-full bg-white'>";
                    echo "<thead class='bg-gray-200 text-xs text-gray-700 uppercase'>";
                    echo "<tr>";
                    echo "<th class='px-4 py-2'>Name</th>";
                    echo "<th class='px-4 py-2'>Language</th>";
                    echo "<th class='px-4 py-2'>Time</th>";
                    echo "<th class='px-4 py-2'>Status</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody class='text-gray-700'>";

                    $row_count = 0;
                    foreach ($submissions as $row) {
                        $row_count++;
                        $current_time = time();
                        echo "<tr class='" . ($row_count % 2 == 0 ? 'bg-gray-100' : 'bg-white') . "'>";
                        echo "<td class='border px-4 py-2'><b><a href=" . $SITE_URL . "/view_problem.php?problem_id=" . $row["problem_code"] . "> " . $row["name"] . "</a></b></td>";
                        echo "<td class='border px-4 py-2'>" . $row["lang"] . "</td>";
                        echo "<td class='border px-4 py-2'>" . date("l g:i A - j F",  $row['s_time']) . "</td>";
                        echo "<td onclick='showDialog(this)' data-scode='" . $row['s_code'] . "' class='border px-4 py-2'>" . ' <span class="px-2 py-1 text-white rounded ' . $resAttr[$row['r_result']] . $resAttrBg[$row['r_result']] . '">' . $row['r_result'] . '</span> ' . "</td>";


                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }

    function showDialog(element) {
        // Get the value of s_code from the clicked row
        var s_code = element.getAttribute('data-scode');

        // Set the content of the dialog with s_code value
        document.getElementById('s_code').innerText = s_code;

        // Show the dialog
        document.getElementById('dialog').style.display = 'block';
    }

    function closeDialog() {
        // Hide the dialog
        document.getElementById('dialog').style.display = 'none';
    }
</script>

<script>
    // PHP array data
    <?php echo "const results = " . json_encode($results) . ";"; ?>

    // Extracting labels and data from the PHP array
    const labels = results.map(item => item.Result || 'Unknown');
    const data = results.map(item => item.Count);

    // Colors for the pie chart segments
    const colors = {
        AC: 'lightgreen',
        CE: 'lightyellow',
        WA: 'lightcoral'
        // Add more colors as needed
    };

    const backgroundColors = labels.map(label => colors[label] || 'gray');

    // Creating the pie chart
    const ctx = document.getElementById('myPieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: backgroundColors
            }]
        },
        options: {
            legend: {
                display: false // Hide the legend
            }
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById("polar-area-chart").getContext("2d");

        const categories = <?php echo json_encode($categories); ?>;

        const data = {
            labels: categories.map(category => category.category_name),
            datasets: [{
                data: categories.map(category => category.category_count),
                backgroundColor: [
                    "#FF5733",
                    "#FFC300",
                    "#900C3F",
                    "#4CAF50",
                    "#3498DB",
                    "#E74C3C",
                    "#9B59B6"
                ]
            }]
        };

        const config = {
            type: "polarArea",
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "right"
                    }
                }
            }
        };

        const chart = new Chart(ctx, config);
    });
</script>


</html>