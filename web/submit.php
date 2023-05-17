<?php
require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

// Extract the problem_id from the URL
$problem_id = $_GET['problem_id'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />

    <title>Submit Problem | Codesohoj</title>
</head>

<body class="  ">

    <main>
        <section class="absolute w-full h-full">
            <div class="absolute top-0 w-full h-full bg-gray-100">

                <!-- php code here  -->

                <?php

                $sql = "SELECT * FROM problems WHERE code = '$problem_id'";
                $result = DB::findOneFromQuery($sql);
                if ($result == NULL) {
                    echo errorMessageHTML("<b>Problem not found!</b>");
                } else {
                    if (isAdmin()) {
                        echo "<a class='btn btn-default pull-right' style='margin-top: 10px;' href='" . SITE_URL . "/adminproblem/$problem_id'><i class='glyphicon glyphicon-edit'></i> Edit</a>";
                    }
                    if ($result['contest'] == 'contest') {
                        echo "<a class='btn btn-primary' style='margin-top: 10px;' href='" . SITE_URL . "/contests/$result[pgroup]'><i class='glyphicon glyphicon-edit'></i> Problems</a>";
                    }
                    if ($result['contest'] == 'contest' && !isAdmin()) {
                        $query = "select starttime from contest where code = '$result[pgroup]'";
                        $check = DB::findOneFromQuery($query);
                        if ($check['starttime'] > time()) {
                            echo errorMessageHTML("<b>Contest not yet started!</b>");
                            $flag = 1;
                        } else {
                            $flag = 0;
                        }
                    } else {
                        $flag = 0;
                    }
                    if ($flag == 0) {
                        $statement = stripslashes($result["statement"]);
                        $statement = preg_replace("/\n/", "<br>", $statement);
                        $statement = preg_replace("/<image \/>/", "<img src='data:image/jpeg;base64,$result[image]' />", $statement);
                        echo "<div class='page-header text-center'><h1 class='text-4xl'>$result[name]</h1></div>";
                        echo "<div style='text-align:left'>";
                        if ($result['contest'] == 'contest') {
                            echo "<span class='btn-group'>" .
                                "<a class='btn btn-default' href='" . SITE_URL . "/contests/$result[pgroup]'><span class='glyphicon glyphicon-chevron-left'></span> Problems</a>" .
                                "</span>";
                        }
                        echo "<span class='btn-group float-right'>" . ((isset($_SESSION['loggedin'])) ? ("<a class='btn btn-default' href='" . SITE_URL . "/status/$problem_id" . $_SESSION['Users']['username'] . "'>My Submissions</a>") : ("")) . "<a class='btn btn-default' href='" . SITE_URL . "/status/$problem_id'> All Submissions</a></span></div>
                        <br/><br/>" . $statement . "<br/><br/>";
                        if ($result["sampleinput"] && $result["sampleoutput"]) {
                            echo "<div class='grid grid-cols-2 gap-4'>
                                    <div class='overflow-x-auto'><h4 class='text-2xl'>Sample Input</h4><div class='limit'><pre class='brush: text'>$result[sampleinput]</pre></div></div>
                                    <div class='overflow-x-auto'><h4 class='text-2xl'>Sample Output</h4><div class='limit'><pre class='brush: text'>$result[sampleoutput]</pre></div></div>
                                </div>";
                        }
                        echo " 
                        <div class='grid grid-cols-2'>
                            <div class='col-span-1'>
                                <div class='panel panel-default'>
                                    <div class='panel-body'>
                                        <strong>Time Limit: </strong>$result[timelimit] Second(s)<br/>
                                        <strong>Score: </strong>$result[score] Point(s)<br/>
                                        <strong>Input File Limit: </strong>$result[maxfilesize] Bytes<br/><br/>
                                        " . (($result['status'] == 'Active' || (isset($_SESSION['loggedin']) && $_SESSION['User']['status'] == "Admin")) ? ("<a class='btn btn-block btn-success' href='" . SITE_URL . "/submit/$problem_id'>Submit <span class='glyphicon glyphicon-cloud-upload'></span></a>") : ('')) . "
                                    </div>
                                </div>
                            </div>
                            <div class='col-span-1'>
                                <div class='panel panel-default'>
                                    <div class='panel-body text-center'>";

                        if (isset($_SESSION['loggedin'])) {
                ?>
                            <form action="<?php echo SITE_URL; ?>/process.php" role='form' method="post">
                                <input type="hidden" value="<?php echo $result['pid']; ?>" name="pid" />
                                <textarea class='form-control' style="" name="query" placeholder="Post clarification..."></textarea><br />
                                <input name="clar" type="submit" class="btn btn-default btn-block" value="Send" />
                            </form>
                <?php
                        }
                    }
                }

                ?>


            </div>

        </section>
    </main>

</body>


</html>