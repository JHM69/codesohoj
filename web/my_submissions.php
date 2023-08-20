<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";
if (
    isset($_SESSION["loggedin"])
) {


    $uid = $_SESSION["Users"]["uid"];

    $resAttr = array('AC' => 'text-gray-800', 'RTE' => 'text-yellow-600', 'WA' => 'text-red-600', 'TLE' => 'text-yellow-600', 'CE' => 'text-yellow-600', 'DQ' => 'text-red-600', 'PE' => 'text-blue-600', '...' => 'text-gray-600', '' => 'text-gray-600');
    $resAttrBg = array('AC' => ' bg-green-200', 'RTE' => ' bg-yellow-200', 'WA' => ' bg-red-200', 'TLE' => ' bg-yellow-200', 'CE' => ' bg-yellow-200', 'DQ' => ' bg-red-200', 'PE' => ' bg-blue-200', '...' => ' bg-gray-200', '' => ' bg-gray-200');



?>
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

    <style>
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

    <body class="text-gray-800 antialiased">

        <main>

            <div class="pl-12 rounded w-full flex justify ">

            </div>
            <section class="absolute w-full h-full">
                <div class="absolute top-0 w-full h-full bg-gray-100">
                    <!--<div class='col-md-9 w-full flex m-2' id='mainbar'>
                        
                    </div>-->
                    <div class="flex justify-center">
                        <h2 class="text-2xl font-bold">My submissions</h2>
                    </div>
                    <hr class="border-t-2 border-gray-300 mt-2 mb-4">


                    <div class="w-full flex flex-row justify-center sm:rounded-lg">

                        <?php
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
                      LIMIT 20;
                      ";
                        $result = DB::findAllFromQuery($sql);

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
                        foreach ($result as $row) {
                            $row_count++;
                            $current_time = time();



                            echo "<tr class='" . ($row_count % 2 == 0 ? 'bg-gray-100' : 'bg-white') . "'>";
                            echo "<td class='border px-4 py-2'><b><a href=" . $SITE_URL . "/view_problem.php?problem_id=" . $row["problem_code"] . "&code=" . $row["rid"]   . "> " . $row["name"] . "</a></b></td>";
                            echo "<td class='border px-4 py-2'>" . $row["lang"] . "</td>";
                            echo "<td class='border px-4 py-2'>" . date("l g:i A - j F",  $row['s_time']) . "</td>";
                            echo "<td onclick='showDialog(this)' data-scode='" . $row['s_code'] . "' class='border px-4 py-2'>" . ' <span class="px-2 py-1 text-white rounded ' . $resAttr[$row['r_result']] . $resAttrBg[$row['r_result']] . '">' . $row['r_result'] . '</span> ' . "</td>";


                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                        ?>

                    </div>

                    <div id="dialog" class="fixed left-0 top-0" style="display:none;">
                        <div class="bg-white rounded-lg shadow-xl p-6 w-3/4">
                            <h3 class="text-lg font-semibold mb-2">Submitted Code</h3>
                            <pre class="text-xs p-2 bg-gray-100 rounded"><code id="s_code"></code></pre>
                            <button onclick="closeDialog()" class="mt-4 bg-blue-500 text-white px-4 py-2 text-xs rounded hover:bg-blue-600">Close</button>
                        </div>
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
    </body>

<?php } ?>