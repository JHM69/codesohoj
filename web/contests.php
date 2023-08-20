<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";
if (
    1
) { ?>
    <html>

    <head>
        <title>Contest </title>
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


                    <div class="w-full flex flex-row justify-center sm:rounded-lg">

                        <?php
                        $sql = "Select * from contest limit 50 ";
                        $result = DB::findAllFromQuery($sql);

                        echo "<table class='table-auto min-w-full bg-white'>";
                        echo "<thead class='bg-gray-200 text-xs text-gray-700 uppercase'>";
                        echo "<tr>";
                        echo "<th class='px-4 py-2'>Name</th>";
                        echo "<th class='px-4 py-2'>Start Time</th>";
                        echo "<th class='px-4 py-2'>End Time</th>";
                        echo "<th class='px-4 py-2'>Status</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody class='text-gray-700'>";

                        $row_count = 0;
                        foreach ($result as $row) {
                            $row_count++;
                            $current_time = time();
                            $start_time = $row['starttime'];
                            $end_time = $row['endtime'];

                            $status = "";
                            $link = "";
                            $buttonClass = "";
                            if ($current_time >= $start_time && $current_time <= $end_time) {
                                $status = "Running";
                                $link = "view_contest.php?code=" . $row['code'];
                                $buttonClass = "bg-blue-500 hover:bg-blue-700";
                            } elseif ($current_time < $start_time) {
                                $status = "Participate";
                                $link = "view_contest.php?code=" . $row['code'];
                                $buttonClass = "bg-green-500 hover:bg-green-700";
                            } elseif ($current_time > $end_time) {
                                $status = "View History";
                                $link = "contest_history.php?code=" . $row['code'];
                                $buttonClass = "bg-red-500 hover:bg-red-700";
                            }


                            echo "<tr class='" . ($row_count % 2 == 0 ? 'bg-gray-100' : 'bg-white') . "'>";
                            echo "<td class='border px-4 py-2'><b>" . $row["name"] . "</b></td>";
                            echo "<td class='border px-4 py-2'>" . date("l g:i A - j F", $start_time) . "</td>";
                            echo "<td class='border px-4 py-2'>" . date("l g:i A - j F", $end_time) . "</td>";
                            echo "<td class='border px-4 py-2'><a href='" . SITE_URL . "/" . $link . "' class='text-white font-bold py-2 px-4 text-xs rounded " . $buttonClass . "'>" . $status . "</a></td>";
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                        ?>

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