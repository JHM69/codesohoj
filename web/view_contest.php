<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

function timeformating($a)
{
    return gmdate("H:i:s", $a);
}

if ((isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin')) {
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
                <title>Admin Panel | Contest</title>
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
                        <div id="contesttimer" class="text-center">
                            <h4 class="timer">Starts in: N/A</h4>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($contest['starttime']) || (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin')) {
                    if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
                        if ($contest['starttime'] > time())
                            echo "<a class='btn btn-default float-right my-4 mr-4' href='" . SITE_URL . "/preparecontest/$_GET[code]'><i class='glyphicon glyphicon-edit'></i> Prepare Contest</a>";
                        $query = "select * from problems where pgroup = '$_GET[code]' order by code";
                        echo "<a class='btn btn-default float-right my-4 mr-4' href='" . SITE_URL . "/admincontest/$_GET[code]'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
                    } else {
                        $query = "select * from problems where pgroup = '$_GET[code]' and status != 'Deleted' order by code";
                    }
                } else {
                    $query = "";
                }
                $prob = DB::findAllFromQuery($query);
                ?>
                <div class="container mx-auto px-4">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Score</th>
                                <th class="px-4 py-2">Code</th>
                                <th class="px-4 py-2">Submissions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($prob) {
                                foreach ($prob as $row) {
                            ?>
                                    <tr>
                                        <td class="border px-4 py-2"><a href="<?php echo SITE_URL . "/view_problem.php?problem_id=$row[code]"; ?>"><?php echo $row['name']; ?></a></td>
                                        <td class="border px-4 py-2"><a href="<?php echo SITE_URL . "/view_problem.php?problem_id=$row[code]"; ?>"><?php echo $row['score']; ?></a></td>
                                        <td class="border px-4 py-2"><a href="<?php echo SITE_URL . "/submit/$row[code]"; ?>"><?php echo $row['code']; ?></a></td>
                                        <td class="border px-4 py-2"><a href="<?php echo SITE_URL . "/status/$row[code]"; ?>"><?php echo $row['solved'] . "/" . $row['total']; ?></a></td>
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
                    <div class="text-center page-header"><?php if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == "Admin") { ?><?php } ?><h1>Rankings - <?php echo $contest['name'] ?></h1>
                    </div>
    <?php
                    if ($contest['ranktable'] != "") {
                        $rank = getrankings($contest['code']);
                    } else {
                        $rank = null;
                    }
                    $i = 1;
                    $probCells = "";
                    foreach ($pidToProbCode as $pid => $code) {
                        $probCells .= "<th><a target='_blank' href='" . SITE_URL . "/problems/$code" . "'>" . $code . "</a></th>";
                    }
                    echo "<table class='table table-hover table-bordered'><thead><tr><th>Rank</th><th>Username</th><th>Score</th>$probCells<th>Final Time</th></tr></thead>";
                    if ($rank) {
                        foreach ($rank as $val) {
                            $finaltime = $val['time'] + $val['penalty'] * $admin['value'] * 60;
                            $val['time'] = timeformating($val['time']);
                            $finaltime = timeformating($finaltime);
                            $probCells = "";
                            foreach ($pidToProbCode as $pid => $code) {
                                $probCells .= "<td style='text-align:center'>" . (array_key_exists($pid, $val['solved']) ? "<span class='glyphicon glyphicon-ok' style='color: green'></span> (<span style='color:" . ($val['solved'][$pid] > 0 ? "red" : "green") . "'>" . $val['solved'][$pid] . "</span>)" : "-") . "</td>";
                            }
                            echo "<tr><td>$i</td><td><a href='" . SITE_URL . "/teams/$val[username]'>$val[username]</a></td><td>$val[score] (<span style='color:" . ($val['penalty'] > 0 ? "red" : "green") . "'>$val[penalty]</span>)</td>" . $probCells . "<td>$finaltime</td></tr>";
                            $i++;
                        }
                    }
                    echo "</table>";
                } else {
                    echo "<div class='text-center page-header'><h1>Select a Contest</h1></div>
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