<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

// Pagination settings
$recordsPerPage = 20; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $recordsPerPage;

// Sorting settings
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'score'; // Default sort column
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'DESC'; // Default sort order

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
    <style>
        .sort-icon {
            font-size: 0.75rem;
            vertical-align: middle;
            margin-left: 0.25rem;
        }
    </style>
</head>

<body class="text-gray-100 antialiased">
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl text-white font-semibold mb-4 text-gray-700">Rankings</h1>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <a href="?sort=rank&order=<?php echo $sortColumn === 'rank' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>">
                                Rank <?php if ($sortColumn === 'rank') echo ($sortOrder === 'ASC' ? '<span class="sort-icon">&#9650;</span>' : '<span class="sort-icon">&#9660;</span>'); ?>
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="?sort=username&order=<?php echo $sortColumn === 'username' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>">
                                Username <?php if ($sortColumn === 'username') echo ($sortOrder === 'ASC' ? '<span class="sort-icon">&#9650;</span>' : '<span class="sort-icon">&#9660;</span>'); ?>
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="?sort=name&order=<?php echo $sortColumn === 'name' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>">
                                Name <?php if ($sortColumn === 'name') echo ($sortOrder === 'ASC' ? '<span class="sort-icon">&#9650;</span>' : '<span class="sort-icon">&#9660;</span>'); ?>
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="?sort=score&order=<?php echo $sortColumn === 'score' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>">
                                Score <?php if ($sortColumn === 'score') echo ($sortOrder === 'ASC' ? '<span class="sort-icon">&#9650;</span>' : '<span class="sort-icon">&#9660;</span>'); ?>
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="?sort=solved&order=<?php echo $sortColumn === 'solved' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>">
                                Solved <?php if ($sortColumn === 'solved') echo ($sortOrder === 'ASC' ? '<span class="sort-icon">&#9650;</span>' : '<span class="sort-icon">&#9660;</span>'); ?>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    $sql = "SELECT * FROM Users ORDER BY $sortColumn $sortOrder LIMIT $offset, $recordsPerPage";
                    $result = DB::findAllFromQuery($sql);
                    $rank = $offset + 1;


                    foreach ($result as $row) {
                        $row_count++;
                        $bgColorClass = $row_count % 2 == 0 ? 'bg-gray-100' : 'bg-white';
                        echo "<tr class='" . $bgColorClass . "'>";
                        echo "<td class='border px-6 py-2'>" . $rank . "</td>";
                        echo "<td class='border px-6 py-2'><a href='/profile.php?id=" . $row["username"] . "'><b>" . $row["username"] . "</b></a></td>";
                        echo "<td class='border px-6 py-2'><a href='/profile.php?id=" . $row["username"] . "'><b>" . $row["name"] . "</b></a></td>";

                        echo "<td class='border px-6 py-2'>" . $row["score"] . "</td>";
                        echo "<td class='border px-6 py-2'>" . $row["solved"] . "</td>";
                        echo "</tr>";
                        $rank++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        $totalRecords = 120; // Total number of records in the table
        $totalPages = ceil($totalRecords / $recordsPerPage);
        ?>
        <div class="mt-4">
            <?php if ($page > 1) : ?>
                <a href="?page=<?php echo $page - 1; ?>&sort=<?php echo $sortColumn; ?>&order=<?php echo $sortOrder; ?>" class="text-blue-500 hover:text-blue-700">Previous</a>
            <?php endif; ?>
            <?php if ($page < $totalPages) : ?>
                <a href="?page=<?php echo $page + 1; ?>&sort=<?php echo $sortColumn; ?>&order=<?php echo $sortOrder; ?>" class="ml-2 text-blue-500 hover:text-blue-700">Next</a>
            <?php endif; ?>
        </div>




    </main>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
</script>

</html>