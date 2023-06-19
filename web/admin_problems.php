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
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
  </head>

  <body class="text-gray-800 antialiased">

    <main>

      <div class="pl-12 rounded w-full flex justify-center items-center">

        <a href='<?php echo SITE_URL; ?>/add_problem.php'><button class="m-10 bg-blue-500 text-white rounded block p-2 m-20 text-lg font-bold" style="margin: 10px auto; margin-bottom: 10px;">Add Problems</button></a>
      </div>
      <section class="absolute w-full h-full">
        <div class="absolute top-0 w-full h-full bg-gray-100">
          <div class='col-md-9 w-full flex m-2 items-center justify-center' id='mainbar'>
            <?php
            $sql = "SELECT * FROM category";
            $result = DB::findAllFromQuery($sql);
            //display the result in chip of tawilwind css

            foreach ($result as $row) {
              echo '

                        <span id="badge-dismiss-default" class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300">
                        ' .
                $row["name"] .
                '
                        <button type="button" class="inline-flex items-center p-0.5 ml-2 mt-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300" data-dismiss-target="#badge-dismiss-default">
                        </button>
                    </span>  ';
            }
            ?>
          </div>

          <div class=" sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Problem name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                      Dificulty
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                          <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                        </svg></a>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                      Solved
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                          <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                        </svg></a>
                    </div>
                  </th>
                  <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Action</span>
                  </th>
                  <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Delete</span>
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

                $sql = "Select * from problems";
                $result = DB::findAllFromQuery($sql);

                foreach ($result as $row) {
                  echo "<tr>";
                  echo "<td class='px-6 py-4'>" .
                    $row["name"] .
                    "</td>";
                  echo "<td class='px-6 py-4'>" .
                    $row["type"] .
                    "</td>";

                  echo "<td class='px-6 py-4'>" .
                    $row["solved"] .
                    "</td>";
                  echo "<td class='px-6 py-4'><a href='code/" . $row['code'] . "'>Edit</a></td>";
                  echo "<td class='px-6 py-4'><a href='delete/" . $row['code'] . "'>Delete</a></td>";
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

  </body>

<?php } ?>