<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <title>Rankings | Codesohoj</title>
</head>

<body class="text-gray-100 antialiased">

    <main>
        <section class="absolute w-full h-full">
            <div class="absolute top-0 w-full h-full bg-gray-100">


                <div class="sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Rank
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Score
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Solved
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql = "SELECT * FROM Users ORDER BY score DESC";
                            $result = DB::findAllFromQuery($sql);
                            $rank = 1;

                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4'>" .
                                    $rank .
                                    "</td>";
                                echo "<td class='px-6 py-4'>" .
                                    $row["username"] .
                                    "</td>";
                                echo "<td class='px-6 py-4'>" .
                                    $row["name"] .
                                    "</td>";
                                echo "<td class='px-6 py-4'>" .
                                    $row["score"] .
                                    "</td>";
                                echo "<td class='px-6 py-4'>" .
                                    $row["solved"] .
                                    "</td>";
                                echo "</tr>";
                                $rank++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
</script>

</html>