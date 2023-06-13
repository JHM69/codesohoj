<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

// Extract the problem_id from the URL
$problem_id = $_GET['problem_id'];

// Query the database to fetch the problem
$sql = "SELECT * FROM problems WHERE code = '$problem_id'";
$result = DB::findOneFromQuery($sql);
$user_code = "";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Problem View - Codesohoj</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <div class="w-3/4 p-6">
            <h1 class="text-2xl font-bold text-center text-gray-800"><?php echo $result['name']; ?></h1>
            <div class="bg-white rounded p-4 mt-4">
                <p class="mt-2">
                    <?php echo $result['statement']; ?>
                </p>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <h2 class="text-xl font-bold">Input</h2>
                <p class="mt-2">
                    <?php echo $result['input_statement']; ?>
                </p>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <h2 class="text-xl font-bold">Output</h2>
                <p class="mt-2">
                    <?php echo $result['output_statement']; ?>
                </p>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <div class="mb-2">
                    <h3 class="text-lg font-bold">Sample Input</h3>
                    <pre class="bg-gray-200 p-2"><?php echo $result['sampleinput']; ?></pre>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Sample Output</h3>
                    <pre class="bg-gray-200 p-2"><?php echo $result['sampleoutput']; ?></pre>
                </div>
            </div>
            <div class="bg-white rounded p-4 mt-4">
                <h2 class="text-xl font-bold">Note</h2>
                <p class="mt-2">
                    <?php echo $result['note']; ?>
                </p>
            </div>
            <div class="flex justify-center mt-6">
                <a href="compiler.php">
                    <button class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Solve Now
                    </button>
                </a>
            </div>
        </div>
        <div class="w-1/4 bg-white p-4">
            <div class="mt-20 mb-8">
                <h2 class="text-xl font-bold">Problem Information</h2>
                <p class="mt-2">
                    <strong>Time Limit:</strong> <?php echo $result['timelimit']; ?> second<br>
                    <strong>Memory Limit:</strong> <?php echo $result['memorylimit']; ?> MB
                </p>
            </div>
            <div class="mb-8">
                <h2 class="text-xl font-bold">Problem Category</h2>
                <p class="mt-2"><?php echo $result['category']; ?></p>
            </div>
            <div>
                <h2 class="text-xl font-bold mt-8">Number of Solves</h2>
                <p><?php echo $result['solved']; ?></p>
            </div>
            <div class="mb-8 mt-8">
                <h2 class="text-xl font-bold">Contest Material</h2>
                <ul style="list-style-type: disc;margin-left: 10px">
                    <li class="m-2"><a href="#" class="text-blue-500">Announcement</a></li>
                    <li class="m-2"><a href="#" class="text-blue-500">Editorial</a></li>
                </ul>
            </div>

            <form id='form' action='<?php echo SITE_URL; ?>/process.php' method='post' enctype='multipart/form-data'>
                <table class='table table-striped'>
                    <tr>
                        <th class="px-4 py-2">Language :</th>
                        <td>
                            <select class="form-select mt-1 block w-full" id='lang' name='lang'>
                                <?php
                                $lang = explode(',', $prob['languages']);
                                foreach ($lang as $row) {
                                    if ($row == 'Brain') {
                                        echo "<option value='$row'" . ((isset($_GET['edit']) && $row == $runs['language']) ? "selected='selected'" : "") . ">Brainf**k</option>";
                                    } elseif (isset($_GET['edit']) && $row == $runs['language']) {
                                        echo "<option value='$row' selected='selected'>$row</option>";
                                    } elseif ($row == 'C++' && !isset($_GET['edit'])) {
                                        echo "<option value='$row' selected='selected'>$row</option>";
                                    } else {
                                        echo "<option value='$row'>$row</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <th class="px-4 py-2">File :</th>
                        <td>
                            <input type='file' name='code_file' class="py-2 px-4 border border-gray-300 rounded-lg">
                        </td>
                    </tr>
                    <tr>
                        <td colspan='4' style='padding: 0;'>
                            <textarea id='sub' name='sub' class="form-textarea mt-1 block w-full" rows="8"><?php
                                                                                                            ?></textarea>
                        </td>
                    </tr>
                </table>
                <input type="hidden" value="<?php echo ((isset($_GET['code']) && $_GET['code'] != "") ? ($_GET['code']) : ($prob['code'])); ?>" name="probcode" />
                <input type='submit' value='Submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded' name='submitcode' />
            </form>

        </div>
    </div>
</body>

</html>