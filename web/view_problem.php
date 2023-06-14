<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

// Extract the problem_id from the URL
$problem_id = $_GET['problem_id'];

// Query the database to fetch the problem
$sql = "SELECT p.*, GROUP_CONCAT(c.name) AS categories
        FROM problems AS p
        JOIN category_problem AS cp ON p.pid = cp.problem_id
        JOIN category AS c ON cp.category_id = c.id
        WHERE p.code = '$problem_id'";

$result = DB::findOneFromQuery($sql);




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

    <title>Submit Problem | Codesohoj</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-3/4 p-6">
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
                <!-- write php block -->

                <?php

                if (isset($_GET['code'])) {
                    if (!isset($_SESSION['loggedin']) || $_SESSION['Users']['status'] == 'Normal')
                        $query = "select runs.rid as rid, pid, uid, runs.language as language, time, result, access, submittime, name, code, error, output from runs, subs_code where runs.rid = subs_code.rid and runs.rid = $_GET[code] and (access = 'public'" . ((isset($_SESSION['Users']['uid'])) ? (" or uid=" . $_SESSION['Users']['uid']) : ("")) . ")";
                    elseif (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin')
                        $query = "select runs.rid as rid, pid, uid, runs.language as language, time, result, access, submittime, name, code, error, output from runs, subs_code where runs.rid = subs_code.rid and runs.rid = $_GET[code]";
                    else
                        $query = "select * from runs where 1 = 2";
                    $res = DB::findOneFromQuery($query);
                    if ($res) {
                ?>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shCore.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushBash.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushCpp.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushCSharp.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushJava.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushJScript.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushPascal.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushPerl.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushPhp.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushPlain.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushPython.js"></script>
                        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shBrushRuby.js"></script>
                        <link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>/syntax-highlighter/shCoreDefault.css" />
                        <script type="text/javascript">
                            SyntaxHighlighter.all();
                        </script>
                        <?php
                        $query = "select code, name, displayio, problems.status as status, contest, input, output, teamname from problems, Users where pid = $res[pid] and uid = $res[uid]";
                        $prob = DB::findOneFromQuery($query);
                        $btn = "";
                        if ($prob['status'] == 'Active' || (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin' && $prob['contest'] == 'practice')) {
                            $btn = "<a class='btn btn-danger' href='" . SITE_URL . "/submit&edit=$res[rid]'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
                        }
                        $resAttr = array('AC' => 'success', 'RTE' => 'warning', 'WA' => 'danger', 'TLE' => 'warning', 'CE' => 'warning', 'DQ' => 'danger', 'PE' => 'info', '...' => 'default', '' => 'default'); //Defines label attributes
                        echo "<h1>Solution<div class='pull-right btn-group'>$btn<a class='btn btn-danger' href='" . SITE_URL . "/process.php?rid=$res[rid]&file=code'><i class='glyphicon glyphicon-download'></i> Download</a></div></h1>
                <table class='table'><tr><th>Run ID</th><th>Problem</th><th>Team Name</th><th>Result</th><th>Run time</th><th>Language</th><th>Submission Time</th></tr>
                <tr><td>$res[rid]</td><td><a href='" . SITE_URL . "/problems/$prob[code]'>$prob[name]</a></td><td><a href='" . SITE_URL . "/Users/$prob[teamname]'>$prob[teamname]</a></td><td><span class='label label-" . $resAttr[$res['result']] . "'>$res[result]</span></td><td>$res[time]</td><td>$res[language]</td><td>" . date("d F Y, l, H:i:s", $res['submittime']) . "</td></tr>
                </table>";
                        if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
                        ?>
                            <table class="table">
                                <tr>
                                    <th>Rejudge</th>
                                    <th>Disqualify</th>
                                    <th>Access</th>
                                </tr>
                                <tr>
                                    <td>
                                        <form class="form-inline" method="post" action="<?php echo SITE_URL; ?>/process.php">
                                            <input type="hidden" value="<?php echo $res['rid']; ?>" name="rid" />
                                            <input type="submit" name="rejudge" value="Rejudge" class="btn btn-danger" />
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-inline" method="post" action="<?php echo SITE_URL; ?>/process.php">
                                            <input type="hidden" value="<?php echo $res['rid']; ?>" name="rid" />
                                            <input type="submit" name="dq" value="Disqualify" class="btn btn-danger" />
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-inline" method="post" action="<?php echo SITE_URL; ?>/process.php">
                                            <input type="hidden" value="<?php echo $res['rid']; ?>" name="rid" />
                                            <div class="col-md-6">
                                                <select class="form-control" name="access">
                                                    <option value="public" <?php if ($res['access'] == "public") echo "selected='selected' "; ?>>Public</option>
                                                    <option value="private" <?php if ($res['access'] == "private") echo "selected='selected' "; ?>>Private</option>
                                                    <option value="deleted" <?php if ($res['access'] == "deleted") echo "selected='selected' "; ?>>Deleted</option>
                                                </select>
                                            </div>
                                            <input type="submit" name="runaccess" value="Update" class="btn btn-danger" />
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <?php
                        }
                        echo "<h4>Code</h4><div style='overflow-x: auto;' class='limit'><pre class='brush: " . $brush[$res['language']] . "'>" . htmlspecialchars($res['code']) . "</pre></div>";
                        if (strlen($res['error']) != 0) {
                            $error = explode("||", $res['error']);
                            echo "<h4>Error</h4><div style='overflow-x: auto;' class='limit'><pre class='brush: text'>" . ((isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == "Admin") ? ($res['error']) : ($error[0])) . "</pre></div>";
                        }
                        if (($prob['displayio'] == 1 && ($res['result'] == 'AC' || $res['result'] == 'WA' || $res['result'] == 'PE')) || (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin')) {
                            echo "<div class='col-md-4' style='overflow-x: auto;'><a class='btn btn-primary' target='_blank' href='" . SITE_URL . "/process.php?rid=$_GET[code]&file=input'>Download Input File</a></div>";
                            echo "<a class='btn btn-primary' target='_blank' href='" . SITE_URL . "/process.php?rid=$_GET[code]&file=correct'>Download Correct Output File</a>
                            <a class='btn btn-primary' target='_blank' href='" . SITE_URL . "/process.php?rid=$_GET[code]&file=output'>Download Output File</a>";
                            if (strlen($prob['input']) <= 102400) {
                            ?>
                                <div class='col-md-4' style='overflow-x: auto;'>
                                    <h4>Input</h4>
                                    <div class='limit'>
                                        <pre class='brush: text'><?php echo $prob['input']; ?></pre>
                                    </div>
                                </div>
                            <?php
                            }
                            if (strlen($prob['output']) <= 102400 && strlen($res['output']) <= 102400) {
                                $correct = preg_split("/((\r?\n)|(\r\n?))/", $prob['output']);
                                $output = preg_split("/((\r?\n)|(\r\n?))/", $res['output']);
                                $lines = array();
                                for ($i = 0; $i < count($correct) || $i < count($output);) {
                                    //echo bin2hex($correct[$i])." ".bin2hex($output[$i])."<br/>";
                                    if ($i < count($correct) && $i < count($output) && $correct[$i] != $output[$i]) {
                                        array_push($lines, $i + 1);
                                    } else if ($i > count($correct) && $i < count($output)) {
                                        array_push($lines, $i + 1);
                                    }
                                    $i++;
                                }
                                //print_r($lines);
                                $lines = "[" . implode(',', $lines) . "]";
                            ?>
                                <div class='col-md-4' style='overflow-x: auto;'>
                                    <h4>Correct Output</h4>
                                    <div class='limit'>
                                        <pre class='brush: text'><?php echo $prob['output']; ?></pre>
                                    </div>
                                </div>
                                <div class='col-md-4' style='overflow-x: auto;'>
                                    <h4>Actual Output</h4>
                                    <div class='limit'>
                                        <pre class='brush: text;<?php if ($res['result'] != 'AC') echo " highlight: " . $lines; ?>;' id="output"><?php echo ($res['result'] != 'AC') ? (stripslashes($res['output'])) : ($prob['output']); ?></pre>
                                    </div>
                                </div>
                            <?php
                            } else {

                                // First 10 mismatch
                                if (in_array($res['result'], array('WA', 'PE'))) {
                                    echo "<div style='padding: 10px; background: #f7f7f2; overflow-x:auto; margin: 10px;'><h3>First 10 Mismatch</h3>";
                                    ini_set('memory_limit', '-1');
                                    $correct = preg_split("/((\r?\n)|(\r\n?))/", $prob['output']);
                                    $output = preg_split("/((\r?\n)|(\r\n?))/", $res['output']);
                                    echo "<table class='mismatch'><th colspan='2'>Correct Output</th><th colspan='2'>Actual Output</th>";
                                    for ($i = 0, $count = 0; ($i < count($correct) || $i < count($output)) && $count < 10; $i++) {

                                        if ($i < count($correct) && $i < count($output) && $correct[$i] != $output[$i]) {
                                            $count++;
                                            echo "<tr><td class='line'>" . ($i + 1) . "</td><td>$correct[$i]</td><td class='line'>" . ($i + 1) . "</td><td>$output[$i]</td></tr>";
                                        } else if ($i > count($correct) && $i < count($output)) {
                                            $count++;
                                            echo "<tr><td class='line'>" . ($i + 1) . "</td><td>$correct[$i]</td></tr><td class='line'>" . ($i + 1) . "</td><td></td></tr>";
                                        } else if ($i < count($correct) && $i > count($output)) {
                                            $count++;
                                            echo "<tr><td class='line'>" . ($i + 1) . "</td><td></td></tr><td class='line'>" . ($i + 1) . "</td><td>$output[$i]</td></tr>";
                                        }
                                    }
                                    echo "</table></div>";
                                }
                            }
                            ?>
                    <?php
                            // } else {
                            //                    
                            // }
                        }
                    } else {
                        echo "<br/><br/><br/><div style='padding: 10px;'><h1>Solution not Found :(</h1>The solution you are looking for doesn't exsits or you are not authorized to view.</div><br/><br/><br/>";
                    }
                } else {
                    ?>
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('#submit').click(function() {
                                $(location).attr('href', '<?php echo SITE_URL; ?>/viewsolution/' + $('#rid').val());
                            });
                        });
                    </script>
                <?php
                    echo "<center><h1>Solution</h1></center>Run ID : <input id='rid' type='text' /> <input style='margin-top: -10px;' id='submit' value='Search' type='button' class='btn btn-primary' />";
                }



                ?>



            </div>
        </div>
        <div class="md:w-1/4 bg-white p-4 mt-6 md:mt-0">
            <div class="mb-8">
                <h2 class="text-xl font-bold">Problem Information</h2>
                <p class="mt-2">
                    <strong>Time Limit:</strong> <?php echo $result['timelimit']; ?> second<br>
                    <strong>Memory Limit:</strong> <?php echo $result['maxfilesize']; ?> MB
                </p>
            </div>
            <div class="mb-8">
                <h2 class="text-xl font-bold">Problem Category</h2>
                <p class="mt-2"><?php echo $result['categories']; ?></p>
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
                            <select id='lang' name='lang' class="mt-2">
                                <option value="C">C</option>
                                <option value="C++">C++</option>
                                <option value="Java">Java</option>
                                <option value="Python">Python</option>
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
                <input type='hidden' value="<?php echo ((isset($result['code']) && $result['code'] != "") ? ($result['code']) : ($prob['code'])); ?>" name="probcode" />
                <input type='submit' value='Submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded' name='submitcode' />
            </form>

        </div>
    </div>

</body>

</html>