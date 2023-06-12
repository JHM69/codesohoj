<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";
if (
    isset($_SESSION["loggedin"]) &&
    $_SESSION["Users"]["status"] == "Admin"
) { ?>
    <html>

    <head>
        <title>Admin Panel | Contest </title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#000000" />
        <link rel="shortcut icon" href="./assets/img/favicon.ico" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    </head>

    <body class="text-gray-800 antialiased">

        <main>

            <div class="pl-12 rounded w-full flex justify ">

            </div>
            <section class="absolute w-full h-full">
                <div class="absolute top-0 w-full h-full bg-gray-100">
                    <!--<div class='col-md-9 w-full flex m-2' id='mainbar'>
                        
                    </div>-->
                    <div class="flex justify-center">
                        <h2 class="text-2xl font-bold">Contest list</h2>
                    </div>
                    <hr class="border-t-2 border-gray-300 mt-2 mb-4">

                    <div class=" sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Contest name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Start Time
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                                </svg></a>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            End Time
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                                </svg></a>
                                        </div>
                                    </th>

                                    <!--<th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Action</span>
                                    </th>-->
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                //                             $sql = "SELECT problems.*, GROUP_CONCAT(category.name SEPARATOR ', ') AS categories
                                // FROM problems
                                // INNER JOIN problem_category ON problems.pid = problem_category.problem_id
                                // INNER JOIN category ON problem_category.category_id = category.id
                                // GROUP BY problems.pid";

                                $sql = "Select * from contest";
                                $result = DB::findAllFromQuery($sql);

                                foreach ($result as $row) {
                                    $current_time = time(); // Current timestamp

                                    $start_time = strtotime($row['starttime']); // Start time from the row
                                    $end_time = strtotime($row['endtime']); // End time from the row

                                    if ($current_time >= $start_time && $current_time <= $end_time) {
                                        $status = "Running";
                                        $link = "running_contest.php?code=" . $row['code'];
                                    } elseif ($current_time < $start_time && $current_time < $end_time) {
                                        $status = "Participate";
                                        $link = "participate.php?code=" . $row['code'];
                                    } elseif ($current_time > $start_time && $current_time > $end_time) {
                                        $status = "View History";
                                        $link = "contest_history.php?code=" . $row['code'];
                                    }

                                    echo "<tr>";
                                    echo "<td class='px-6 py-4'>" . $row["name"] . "</td>";
                                    echo "<td class='px-6 py-4'>" . date("d-m-Y H:i:s", $row['starttime']) . "</td>";
                                    echo "<td class='px-6 py-4'>" . date("d-m-Y H:i:s", $row['endtime']) . "</td>";
                                    echo "<td class='px-6 py-4'><a href='" . SITE_URL . "/" . $link . "'>" . $status . "</a></td>";
                                    echo "</tr>";
                                }
                                ?>



                            </tbody>
                        </table>
                    </div>



                </div>

            </section>
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <script>
            function toggleNavbar(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("block");
            }
        </script>
    </body>

<?php } ?>