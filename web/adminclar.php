<?php

require_once "config.php";
require_once "navigation.php";
include_once "functions.php";

if (isset($_SESSION['loggedin']) && $_SESSION['Users']['status'] == 'Admin') {
    if (isset($_GET['page']))
        $page = $_GET['page'];
    else
        $page = 1;
    $query = 'from clar';
    if (!isset($_GET['group']) || $_GET['group'] == '' || $_GET['group'] == "pending") {
        $tab = 'pending';
        $query .= " where (reply = '' or reply is NULL) and access != 'deleted'";
    } else if ($_GET['group'] == "replied") {
        $tab = 'replied';
        $query .= " where reply != '' and access != 'deleted'";
    } else {
        $tab = 'deleted';
        $query .= " where access = 'deleted'";
    }
    $query .= " order by time desc";
    echo "<h1>Clarifications</h1>
        <ul class='nav nav-tabs'>
            <li " . (($tab == 'pending') ? ("class='active'") : ("")) . "><a href='" . SITE_URL . "/adminclar&group=pending'>Pending</a></li>
            <li " . (($tab == 'replied') ? ("class='active'") : ("")) . "><a href='" . SITE_URL . "/adminclar&group=replied'>Replied</a></li>
            <li " . (($tab == 'deleted') ? ("class='active'") : ("")) . "><a href='" . SITE_URL . "/adminclar&group=deleted'>Deleted</a></li>
        </ul>
        <br/>
        <div class='panel panel-default'><div class='panel-body'>";
    $data = DB::findAllWithCount("select * ", $query, $page, 10);
    $result = $data['data'];
    foreach ($result as $key => $row) {
        $save = $row['reply'];
        $row['query'] = preg_replace("/\n/", "<br>", $row['query']);
        $row['reply'] = preg_replace("/\n/", "<br>", $row['reply']);
        $query = "select username from Users where uid='$row[uid]'";
        $username = DB::findOneFromQuery($query);
        if ($row['pid'] != '0') {
            $query = "select name, code from problems where pid='$row[pid]'";
            $prob = DB::findOneFromQuery($query);
            $prob['code'] = "problems/" . $prob['code'];
        } else {
            $prob['name'] = 'Feedback';
            $prob['code'] = 'contact';
        }
        if ($key != 0) echo "<hr/>";
        echo "<b><a href='" . SITE_URL . "/user.php?username=/$username[username]'>$username[username]</a> (<a href='" . SITE_URL . "/$prob[code]'>$prob[name]</a>):<br/>
                Q. " . htmlspecialchars($row['query']) . "</b><br/>";
        if ($row['reply'] != "") {
            echo "A. " . htmlspecialchars($row['reply']) . "<br/><br/>";
        }
        echo "<form role='form' method='post' action='" . SITE_URL . "/process.php'>";
        echo "<input type='hidden' name='uid' value='$row[uid]' /><input type='hidden' name='pid' value='$row[pid]' /><input type='hidden' name='time' value='$row[time]' />
<textarea class='form-control' name='reply' placeholder='Enter response...'>$save</textarea><br/>
<div class='form-inline'><select class='form-control'  name='access'><option value='public' " . (($row['access'] == "public") ? ("selected='selected' ") : ("")) . ">Public</option><option value='deleted' " . (($row['access'] == "deleted") ? ("selected='selected' ") : ("")) . ">Deleted</option></select>  <input type='submit' class='btn btn-success' name='clarreply' value='Reply / Change Reply'/></div>

</form>";
    }
    echo "</div></div>";
    pagination($data['noofpages'], SITE_URL . "/adminclar" . "&group=$tab", $page, 10);
} else {
    $_SESSION['msg'] = "Access Denied: You need to be administrator to access that page.";
    redirectTo(SITE_URL . "/");
}

?>

<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/logo.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
</head>