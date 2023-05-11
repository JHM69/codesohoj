<?php

require_once "config.php";
include_once "functions.php";
function customhash($str)
{
    return md5($str); // To help change the hashing for password saving if needed.
}

$_SESSION["msg"] = "";

writeError("Processing request...");

// ------------------ LOGIN ------------------- //
if (isset($_GET["problems"])) {
    writeError(
        'Action::\n' . "Get Problems"
    );
    $query = "select * from problems where status = 'Active' order by id desc limit 50";
    $res = DB::findAllFromQuery($query);
    $data = array();
    foreach ($res as $row) {
        $data[] = array(

            "name" => $row["name"],
            "type" => $row["type"],
            "pgroup" => $row["pgroup"],
        );
    }
} elseif (isset($_POST["add_problem"])) {


    $categories = implode(', ', $_POST['category']);
    echo "Selected categories: " . $categories;

    $query =
        "insert into problems (" .
        "name , code , score , type , pgroup , contest , timelimit , status , displayio , maxfilesize , statement , input , output , sampleinput , sampleoutput" .
        ") values ('" .
        $_POST["name"] .
        "', '" .
        $_POST["code"] .
        "', '" .
        $_POST["score"] .
        "', '" .
        $_POST["type"] .
        "', '" .
        $_POST["pgroup"] .
        "', '" .
        $_POST["contest"] .
        "', '" .
        $_POST["timelimit"] .
        "', '" .
        $_POST["status"] .
        "', '" .
        $_POST["displayio"] .
        "', '" .
        $_POST["maxfilesize"] .
        "', '" .
        $_POST["statement"] .
        "', '" .
        addslashes(file_get_contents($_FILES["input"]["tmp_name"])) .
        "', '" .
        addslashes(file_get_contents($_FILES["output"]["tmp_name"])) .
        "', '" .
        addslashes(file_get_contents($_FILES["sampleinput"]["tmp_name"])) .
        "', '" .
        addslashes(file_get_contents($_FILES["sampleoutput"]["tmp_name"])) .
        "')";

    // Get the ID of the inserted problem
    $problemId = DB::query($query);

    // Insert category IDs into category_problem table
    $categoryIds = $_POST['category'];
    foreach ($categoryIds as $categoryId) {
        $query =
            "INSERT INTO category_problem (category_id, problem_id) VALUES ('" .
            $categoryId . "', '" .
            $problemId .
            "')";
        DB::query($query);
    }

    $_SESSION["msg"] = "Problem Added.";
    redirectTo(SITE_URL . "/add_problem.php");
} elseif (isset($_GET["category"])) {
}
