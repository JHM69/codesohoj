<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";
#$category_id = $_GET["category"];
// Check if the "category" key is present in the $_GET array
if (isset($_GET["category"])) {
    $category_id = $_GET["category"];
} else {
    $category_id = null;
}




// Pagination variables
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$perPage = 10; // Number of items to display per page

// Retrieve categories for navigation
$sql = "SELECT * FROM category LIMIT $perPage";
$categories = DB::findAllFromQuery($sql);

// Retrieve total number of items
$sqlCount = "SELECT COUNT(DISTINCT p.pid) as total FROM problems p
             INNER JOIN category_problem cp ON p.pid = cp.problem_id
             INNER JOIN category c ON cp.category_id = c.id";
if ($category_id) {
    $sqlCount .= " WHERE c.id = $category_id";
}
$resultCount = DB::findOneFromQuery($sqlCount);
$totalItems = $resultCount['total'];

// Calculate total number of pages
$totalPages = ceil($totalItems / $perPage);

// Calculate offset for SQL query
$offset = ($page - 1) * $perPage;

// Retrieve problems based on category and pagination
$sql = "SELECT p.name as pname, p.type as ptype, p.solved as psolve, p.code as pcode, GROUP_CONCAT(c.name) AS categories
        FROM problems p
        INNER JOIN category_problem cp ON p.pid = cp.problem_id
        INNER JOIN category c ON cp.category_id = c.id ";
if ($category_id) {
    $sql .= "WHERE c.id = $category_id ";
}
$sql .= "GROUP BY p.pid
          LIMIT $perPage OFFSET $offset";

$result = DB::findAllFromQuery($sql);
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
    <title>Problems | Codesohoj</title>
</head>

<body class="text-gray-100 antialiased">

    <main>
        <section class="absolute w-full h-full">

            <div class="absolute top-0 w-full h-full bg-gray-100">
                <div class="flex justify-center">
                    <h2 class="text-2xl font-bold text-black">Problem list</h2>
                </div>
                <hr class="border-t-2 border-gray-300 mt-2 mb-4">
                <div class='col-md-9 w-full flex m-2 justify-center' id='mainbar'>
                    <p class="text-md text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mr-2">tag:</p>
                    <?php
                    $colors = ["blue", "green", "yellow", "red", "purple"]; // Define an array of colors
                    $colorIndex = 0; // Initialize color index

                    foreach ($categories as $row) :
                        $color = $colors[$colorIndex % count($colors)]; // Get the color based on the index
                        $colorIndex++;
                    ?>
                        <a href="<?= SITE_URL ?>/problems.php?category=<?= $row["id"] ?>" class="inline-flex items-center px-2 py-1 mr-2 text-xs font-medium text-<?= $color ?>-800 bg-<?= $color ?>-100 rounded-lg dark:bg-<?= $color ?>-900 dark:text-<?= $color ?>-300">
                            <?= $row["name"] ?>
                            <span class="inline-flex items-center justify-center w-3 h-3 ml-2 text-xxs font-semibold text-<?= $color ?>-800 bg-<?= $color ?>-200 rounded-full">
                                <?= $row["count"] ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>


                <div class="sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Problem name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Difficulty
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                                <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Category
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                                <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Solved
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                                <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3288z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Action

                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) : ?>
                                <tr>
                                    <td class='px-6 py-4'><?= $row["pname"] ?></td>
                                    <td class='px-6 py-4'><?= $row["ptype"] ?></td>
                                    <td class='px-6 py-4'><?= $row["categories"] ?></td>
                                    <td class='px-6 py-4'><?= $row["psolve"] ?></td>
                                    <td class='px-6 py-4'><a href='view_problem.php?problem_id=<?= $row["pcode"] ?>'>Solve</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example" class="flex justify-center">
                    <ul class="flex items-center space-x-2">
                        <?php if ($page > 1) : ?>
                            <li>
                                <a href="?category=<?= $category_id ?>&page=<?= $page - 1 ?>" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li>
                                <a href="?category=<?= $category_id ?>&page=<?= $i ?>" class="px-3 py-2 leading-tight <?= $page == $i ? 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages) : ?>
                            <li>
                                <a href="?category=<?= $category_id ?>&page=<?= $page + 1 ?>" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover                                :bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10l-3.293-3.293a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
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