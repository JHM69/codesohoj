<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";
require_once "LiveContestRanking.php";

function timeformating($a)
{
    return gmdate("H:i:s", $a);
}

if (1) {
    if (isset($_GET['code'])) {
        $query = "select * from contest where code = '$_GET[code]'";
        $contest = DB::findOneFromQuery($query);
        if ($contest) {
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Contest is running</title>
                <link rel="shortcut icon" href="./assets/img/favicon.ico" />
                <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
                <style>
                    .timer {
                        color: #fff;
                    }
                </style>
                <script type='text/javascript'>
                    var ctime = <?php echo $contest['starttime'] - time(); ?>;

                    function zeroPad(num, places) {
                        var zero = places - num.toString().length + 1;
                        return Array(+(zero > 0 && zero)).join("0") + num;
                    }

                    function timer() {
                        if (ctime > 0) {
                            document.getElementById("contesttimer").innerHTML = "<h4 class='timer'>Starts in: " + parseInt(ctime / 3600) + ":" + zeroPad(parseInt((ctime / 60)) % 60, 2) + ":" + zeroPad(ctime % 60, 2) + "</h4>";
                            ctime--;
                            window.setTimeout("timer();", 1000);
                        } else {
                            document.getElementById("contesttimer").innerHTML = "<h4 class='timer'>Starts in: N/A</h4>";
                        }
                    }
                    timer();
                </script>
            </head>

            <body>
                <div class="container mx-auto px-4">
                    <div class="py-8">
                        <h1 class="text-3xl text-center"><?php echo $contest['name']; ?></h1>
                        Contest is Ended

                        <div id="contesttimer"></div>

                    </div>
                </div>
                <?php
                $query = "select * from problems where pgroup = '$_GET[code]' and status != 'Deleted' order by score";


                //                 $query = `SELECT p.*, COUNT(r.rid) AS submissions_count
                // FROM problems p
                // LEFT JOIN runs r ON p.pgroup = r.pgroup
                // WHERE p.pgroup = '$_GET[code]' AND p.status != 'Deleted'
                // GROUP BY p.pid
                // ORDER BY p.score;`;


                $prob = DB::findAllFromQuery($query);
                ?>
                <div class="container mx-auto px-4">
                    <table class="table-auto w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Score</th>
                                <th class="px-4 py-2">Code</th>
                                <th class="px-4 py-2">Submissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $row_count = 0;
                            if ($prob) {
                                foreach ($prob as $row) {
                                    $row_count++;
                            ?>
                                    <tr class="<?php echo $row_count % 2 == 0 ? 'bg-gray-100' : 'bg-white'; ?>">
                                        <td class="border px-4 py-2 text-center"><a href="<?php echo SITE_URL . "/view_problem.php?problem_id=$row[code]"; ?>">
                                                <div class="hover:bg-blue-100 transition-colors"><?php echo $row['name']; ?></div>
                                            </a></td>
                                        <td class="border px-4 py-2 text-center"><a href="<?php echo SITE_URL . "/view_problem.php?problem_id=$row[code]"; ?>"><?php echo $row['score']; ?></a></td>
                                        <td class="border px-4 py-2 text-center"><a href="<?php echo SITE_URL . "/submit/$row[code]"; ?>"><?php echo $row['code']; ?></a></td>
                                        <td class="border px-4 py-2 text-center"><a href="<?php echo SITE_URL . "/status/$row[code]"; ?>"><?php echo $row['solved'] . "/" . $row['total']; ?></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <h3 class="mt-8">Announcements</h3>
                    <div class="mt-2"><?php echo $contest['announcement']; ?></div>
                </div>


                <?php
                if (isset($_GET['code'])) {
                    $query = "select * from contest where code = '$_GET[code]'";
                    $contest = DB::findOneFromQuery($query);
                    $query = "select value from admin where variable = 'penalty'";
                    $admin = DB::findOneFromQuery($query);
                    $query = "select * from problems where pgroup = '$_GET[code]' and status != 'Deleted'";
                    $problems = DB::findAllFromQuery($query);
                    $pidToProbCode = array();
                    foreach ($problems as $prob) {
                        $pidToProbCode[$prob['pid']] = $prob['code'];
                    }
                ?>
                    <div class="text-center page-header"><?php if (isset($_SESSION['loggedin'])) { ?><?php } ?><h1>Rankings - <?php echo $contest['name'] ?></h1>
                    </div>
    <?php

                    $query = "SELECT ranktable FROM contest WHERE code = '$_GET[code]'";

                    $result = DB::findOneFromQuery($query);

                    if (!$result) {
                        echo "No results found for code: " . $code;
                        exit;
                    }

                    $rankTable = json_decode($result['ranktable'], true);
                    $limit = 20; // Define limit, replace 10 with your desired limit

                    $table = '<div class="container mb-24 mx-auto mx-4 bg-gray-100 rounded mx-auto flex w-full px-10 justify-center">';
                    $table .= '<table class="w-full table-auto border-collapse">';
                    $table .= '<thead><tr>';
                    $table .= '<th class="px-4 py-2 border text-center">Rank</th><th class="px-4 py-2 border text-center">Username</th><th class="px-4 py-2 border text-center">Score</th><th class="px-4 py-2 border text-center">Solved</th><th class="px-4 py-2 border text-center">Time</th>';
                    $table .= '</tr></thead><tbody>';

                    $rank = 1;
                    if ($rankTable) {
                        foreach ($rankTable as $row) {
                            $solvedCount = count($row['solved_contest']);
                            $time = $row['time'];
                            $table .= '<tr>';
                            $table .= '<td class="px-4 py-2 border text-center">' . $rank . '</td><td class="px-4 py-2 border text-center"><a href="' . SITE_URL . '/profile.php?id=' . $row['username'] . '" class="text-blue-600">' . $row['username'] . '</a></td><td class="px-4 py-2 border text-center">' . $row['score'] . '</td><td class="px-4 py-2 border text-center">' . $solvedCount . '</td><td class="px-4 py-2 border text-center">' . $time . '</td>';
                            $table .= '</tr>';
                            if ($rank >= $limit) break;
                            $rank++;
                        }
                    } else {
                        $table .= "<tr><td class='px-4 py-2 border text-center' colspan='5'>No Data Available.</td></tr>";
                    }
                    $table .= '</tbody></table>';
                    $table .= '</div>';

                    echo $table;
                } else {
                    echo "<div class='container mx-auto px-4 text-center page-header'><h1>Select a Contest</h1></div>
        <div class='row'>";
                    $query = "select * from contest";
                    $res = DB::findAllFromQuery($query);
                    foreach ($res as $row) {
                        echo "<a class='btn btn-default' href='" . SITE_URL . "/rank/$row[code]'>$row[name]</a>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<div class='container mx-auto px-4'>
                <div class='py-24'>
                    <h1 class='text-4xl text-center'>Contest not Found :(</h1>
                    <p class='text-center'>The contest you are looking for is not found. Are you on the wrong website?</p>
                </div>
            </div>";
            }
        } else {
            echo "<div class='container mx-auto px-4'>
        <div class='py-24'>
            <h1 class='text-4xl text-center'>Lockdown Mode :(</h1>
            <p class='text-center'>This feature is now offline as Judge is in Lockdown mode.</p>
        </div>
    </div>";
        }
    } else {
        echo "<div class='container mx-auto px-4'>
            <div class='py-8'>
                <h1 class='text-3xl text-center'>Contests</h1>
            </div>
            <table class='table-auto w-full'>
                <thead>
                    <tr>
                        <th class='px-4 py-2'>Code</th>
                        <th class='px-4 py-2'>Name</th>
                        <th class='px-4 py-2'>Start Time</th>
                        <th class='px-4 py-2'>End Time</th>
                    </tr>
                </thead>
                <tbody>";
        $query = "select * from contest order by starttime desc";
        $result = DB::findAllFromQuery($query);
        foreach ($result as $row) {
            echo "<tr>
                    <td class='border px-4 py-2'><a href='" . SITE_URL . "/contests/$row[code]'>$row[code]</a></td>
                    <td class='border px-4 py-2'><a href='" . SITE_URL . "/contests/$row[code]'>$row[name]</a></td>
                    <td class='border px-4 py-2'><a href='" . SITE_URL . "/contests/$row[code]'>" . date("d-M-Y, h:i:s a", $row['starttime']) . "</a></td>
                    <td class='border px-4 py-2'><a href='" . SITE_URL . "/contests/$row[code]'>" . date("d-M-Y, h:i:s a", $row['endtime']) . "</a></td>
                </tr>";
        }
        echo "</tbody></table>
        </div>";
    }
    ?>
            </body>

            </html>