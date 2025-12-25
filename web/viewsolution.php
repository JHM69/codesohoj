<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

require_once "navigation.php";

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

        <script type="text/javascript" src="<?php echo SITE_URL; ?>/syntax-highlighter/shCore.js"></script>
        <!-- Add the rest of the script includes here -->

        <link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>/syntax-highlighter/shCoreDefault.css" />
        <script type="text/javascript">
            SyntaxHighlighter.all();
        </script>

        <?php
        $query = "select code, name, displayio, problems.status as status, contest, input, output, username from problems, Users where pid = $res[pid] and uid = $res[uid]";
        $prob = DB::findOneFromQuery($query);
        $btn = "";
        if ($prob['status'] == 'Active' || (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin' && $prob['contest'] == 'practice')) {
            $btn = "<a class='btn btn-danger' href='" . SITE_URL . "/submit&edit=$res[rid]'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
        }
        $resAttr = array('AC' => 'green', 'RTE' => 'yellow', 'WA' => 'red', 'TLE' => 'yellow', 'CE' => 'yellow', 'DQ' => 'red', 'PE' => 'blue', '...' => 'gray', '' => 'gray'); //Defines label attributes

        echo "<h1 class='text-3xl font-bold mb-4'>Solution<div class='float-right btn-group'>$btn<a class='btn btn-danger' href='" . SITE_URL . "/process.php?rid=$res[rid]&file=code'><i class='glyphicon glyphicon-download'></i> Download</a></div></h1>
            <table class='table w-full mb-8'>
                <thead>
                    <tr>
                        <th class='px-4 py-2'>Run ID</th>
                        <th class='px-4 py-2'>Problem</th>
                        <th class='px-4 py-2'>User Name</th>
                        <th class='px-4 py-2'>Result</th>
                        <th class='px-4 py-2'>Run time</th>
                        <th class='px-4 py-2'>Language</th>
                        <th class='px-4 py-2'>Submission Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='px-4 py-2'>$res[rid]</td>
                        <td class='px-4 py-2'><a href='" . SITE_URL . "/problems/$prob[code]'>$prob[name]</a></td>
                        <td class='px-4 py-2'><a href='" . SITE_URL . "/Users/$prob[username]'>$prob[username]</a></td>
                        <td class='px-4 py-2'><span class='label label-" . $resAttr[$res['result']] . "'>$res[result]</span></td>
                        <td class='px-4 py-2'>$res[time]</td>
                        <td class='px-4 py-2'>$res[language]</td>
                        <td class='px-4 py-2'>" . date("d F Y, l, H:i:s", $res['submittime']) . "</td>
                    </tr>
                </tbody>
            </table>";

        if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
        ?>
            <div class="grid grid-cols-3 gap-4 mb-8">
                <div>
                    <form class="form-inline" method="post" action="<?php echo SITE_URL; ?>/process.php">
                        <input type="hidden" value="<?php echo $res['rid']; ?>" name="rid" />
                        <input type="submit" name="rejudge" value="Rejudge" class="btn btn-primary" />
                    </form>
                </div>
                <div>
                    <form class="form-inline" method="post" action="<?php echo SITE_URL; ?>/process.php">
                        <input type="hidden" value="<?php echo $res['rid']; ?>" name="rid" />
                        <input type="submit" name="dq" value="Disqualify" class="btn btn-primary" />
                    </form>
                </div>
                <div>
                    <form class="form-inline" method="post" action="<?php echo SITE_URL; ?>/process.php">
                        <input type="hidden" value="<?php echo $res['rid']; ?>" name="rid" />
                        <div class="col-md-6">
                            <select class="form-control" name="access">
                                <option value="public" <?php if ($res['access'] == "public") echo "selected='selected' "; ?>>Public</option>
                                <option value="private" <?php if ($res['access'] == "private") echo "selected='selected' "; ?>>Private</option>
                                <option value="deleted" <?php if ($res['access'] == "deleted") echo "selected='selected' "; ?>>Deleted</option>
                            </select>
                        </div>
                        <input type="submit" name="runaccess" value="Update" class="btn btn-primary" />
                    </form>
                </div>
            </div>
            <?php
        }
        echo "<h4 class='text-xl font-bold mb-2'>Code</h4>
            <div class='overflow-x-auto bg-gray-100 rounded-lg p-4 mb-8'>
                <pre class='brush: " . $brush[$res['language']] . "'>" . htmlspecialchars($res['code']) . "</pre>
            </div>";
        if (strlen($res['error']) != 0) {
            $error = explode("||", $res['error']);
            echo "<h4 class='text-xl font-bold mb-2'>Error</h4>
                <div class='overflow-x-auto bg-gray-100 rounded-lg p-4 mb-8'>
                    <pre class='brush: text'>" . ((isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == "Admin") ? ($res['error']) : ($error[0])) . "</pre>
                </div>";
        }
        if (($prob['displayio'] == 1 && ($res['result'] == 'AC' || $res['result'] == 'WA' || $res['result'] == 'PE')) || (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin')) {
            echo "<div class='grid grid-cols-1 md:grid-cols-3 gap-4 mb-8'>
                    <div>
                        <a class='btn btn-primary' target='_blank' href='" . SITE_URL . "/process.php?rid=$_GET[code]&file=input'>Download Input File</a>
                    </div>
                    <div>
                        <a class='btn btn-primary' target='_blank' href='" . SITE_URL . "/process.php?rid=$_GET[code]&file=correct'>Download Correct Output File</a>
                    </div>
                    <div>
                        <a class='btn btn-primary' target='_blank' href='" . SITE_URL . "/process.php?rid=$_GET[code]&file=output'>Download Output File</a>
                    </div>
                </div>";
            if (strlen($prob['input']) <= 102400) {
            ?>
                <div class='overflow-x-auto bg-gray-100 rounded-lg p-4 mb-8'>
                    <h4 class='text-xl font-bold mb-2'>Input</h4>
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
                <div class='grid grid-cols-1 md:grid-cols-2 gap-4 mb-8'>
                    <div class='overflow-x-auto bg-gray-100 rounded-lg p-4'>
                        <h4 class='text-xl font-bold mb-2'>Correct Output</h4>
                        <div class='limit'>
                            <pre class='brush: text'><?php echo $prob['output']; ?></pre>
                        </div>
                    </div>
                    <div class='overflow-x-auto bg-gray-100 rounded-lg p-4'>
                        <h4 class='text-xl font-bold mb-2'>Actual Output</h4>
                        <div class='limit'>
                            <pre class='brush: text;<?php if ($res['result'] != 'AC') echo " highlight: " . $lines; ?>;' id="output"><?php echo ($res['result'] != 'AC') ? (stripslashes($res['output'])) : ($prob['output']); ?></pre>
                        </div>
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
        } else {
            echo "<br/><br/><br/><div style='padding: 10px;'><h1>Solution not Found :(</h1>The solution you are looking for doesn't exist or you are not authorized to view.</div><br/><br/><br/>";
        }
    } else {
        echo "<br/><br/><br/><div style='padding: 10px;'><h1>Solution not Found :(</h1>The solution you are looking for doesn't exist or you are not authorized to view.</div><br/><br/><br/>";
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
    echo "<div class='flex justify-center items-center h-screen'>
        <div>
            <h1 class='text-3xl font-bold mb-4'>Solution</h1>
            <div class='flex'>
                <input id='rid' type='text' placeholder='Run ID' class='border border-gray-400 px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500' />
                <button id='submit' class='bg-blue-500 text-white px-4 py-2 rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500'>Search</button>
            </div>
        </div>
    </div>";
}

?>