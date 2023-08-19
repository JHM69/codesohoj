<?php

require_once "config.php";
include_once "functions.php";
function customhash($str)
{
  return md5($str); // To help change the hashing for password saving if needed.
}

// $query = "select value from admin where variable='mode'";

// $judge = DB::findOneFromQuery($query);
// $query =
//   "insert into logs value ('" .
//   time() .
//   "', '$_SERVER[REMOTE_ADDR]', '" .
//   addslashes(print_r($_SESSION, true)) .
//   "', '" .
//   addslashes(print_r($_REQUEST, true)) .
//   "' )";
// DB::query($query);
$_SESSION["msg"] = "";

writeError("Processing request...");

// ------------------ LOGIN ------------------- //
if (isset($_POST["login"])) {
  if (!isset($_POST["username"]) || $_POST["username"] == "") {
    $_SESSION["msg"] = "Username missing";
    redirectTo(SITE_URL . $_POST["login"] . ".php");
  } elseif (!isset($_POST["password"]) || $_POST["password"] == "") {
    $_SESSION["msg"] = "Pssword missing";
    redirectTo(SITE_URL . $_POST["login"] . ".php");
  } else {
    $_POST["password"] = customhash($_POST["password"]);
    $query = "select * from Users where username  = '$_POST[username]' and pass = '$_POST[password]'";

    $res = DB::findOneFromQuery($query);

    if ($res && ($res["status"] == "Normal" || $res["status"] == "Admin")) {
      $save = $_SESSION;
      session_regenerate_id(true);
      $_SESSION = $save;
      $_SESSION["Users"]["uid"] = $res["uid"];
      $_SESSION["Users"]["username"] = $res["username"];
      $_SESSION["Users"]["name"] = $res["name"];
      $_SESSION["loggedin"] = "true";
      $_SESSION["Users"]["status"] = $res["status"];
      $_SESSION["Users"]["time"] = time();

      // writeError($_SESSION["Users"]["name"]);

      redirectTo(SITE_URL . "/");
    } elseif ($res) {
      $_SESSION["msg"] = "You can not log in as your current status is : $res[status]";
      redirectTo(SITE_URL . "/login.php");
    } else {
      writeError("Incorrect Username/Password");
      writeError(SITE_URL . $_SESSION["url"]);

      $_SESSION["msg"] = "Incorrect Username/Password";
      redirectTo(SITE_URL . "/login.php");
    }
  }
  // ---------------------- LOG OUT -------------------------- //
} elseif (isset($_GET["logout"])) {
  writeError(
    'Action::\n' . "User " . $_SESSION["Users"]["name"] . " logged out."
  );
  session_destroy();
  redirectTo(SITE_URL . "/");
} elseif (isset($_GET["problems"])) {
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
} elseif (isset($_POST["register"])) {
  if (
    isset($_POST["name"]) &&
    $_POST["name"] != "" &&
    (isset($_POST["password"]) && $_POST["password"] != "") &&
    (isset($_POST["repassword"]) && $_POST["repassword"] != "") &&
    (isset($_POST["username"]) && $_POST["username"] != "") &&
    (isset($_POST["email"]) && $_POST["email"] != "") &&
    (isset($_POST["phone"]) && $_POST["phone"] != "")
  ) {
    if (
      preg_match("/^[a-zA-Z0-9_@]+$/", $_POST["username"], $match) &&
      $match[0] == $_POST["username"]
    ) {
      if ($_POST["password"] == $_POST["repassword"]) {
        $query =
          "select * from Users where username='" . $_POST["username"] . "'";
        $res = DB::findOneFromQuery($query);

        writeError(
          'DB Connection::\n' . $_POST["username"] . " + " . $_POST["password"]
        );

        if ($res == null) {
          $query =
            "Insert into Users (name, pass, username, email, phone) 
                        values ('" .
            $_POST["name"] .
            "', '" .
            customhash($_POST["password"]) .
            "', '" .
            $_POST["username"] .
            "', '" .
            $_POST["email"] .
            "','" .
            $_POST["phone"] .
            "')";

          $res = DB::query($query);
          $query =
            "select * from Users where username='" . $_POST["username"] . "'";
          $res = DB::findOneFromQuery($query);
          if ($res) {
            $_SESSION["msg"] = "User successfully registered.";
            redirectTo(SITE_URL . "/");
          } else {
            $_SESSION["reg"] = $_POST;
            $_SESSION["msg"] =
              "Some error occured. Try again. If the problem continues contact admin.";
            redirectTo(SITE_URL . "/register.php");
          }
        } else {
          $_SESSION["reg"] = $_POST;
          $_SESSION["msg"] = "This username is already registered.";
          redirectTo(SITE_URL . "/register.php");
        }
      } else {
        $_SESSION["reg"] = $_POST;
        $_SESSION["msg"] = "Password mismatch.";
        redirectTo(SITE_URL . "/register.php");
      }
    } else {
      $_SESSION["reg"] = $_POST;
      $_SESSION["msg"] =
        "username should contain only alphabets numbers @ and _";
      redirectTo(SITE_URL . "/register.php");
    }
  }
} elseif (isset($_POST["add_problem"])) {
  $query =
    "INSERT INTO problems (" .
    "name , code , score , type , pgroup , contest , timelimit , status , displayio , maxfilesize , statement , input_statement , output_statement , note , input , output , sampleinput , sampleoutput , image" .
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
    $_POST["input_statement"] .
    "', '" .
    $_POST["output_statement"] .
    "', '" .
    $_POST["note"] .
    "', '" .
    addslashes(file_get_contents($_FILES["input"]["tmp_name"])) .
    "', '" .
    addslashes(file_get_contents($_FILES["output"]["tmp_name"])) .
    "', '" .
    $_POST["sampleinput"] .
    "', '" .
    $_POST["sampleoutput"] .
    "', '" .
    "')";
  #addslashes(file_get_contents($_FILES["sampleinput"]["tmp_name"])) .
  #"', '" .
  #addslashes(file_get_contents($_FILES["sampleoutput"]["tmp_name"])) .
  #"')";

  DB::query($query);

  $problemId = DB::findOneFromQuery(
    "SELECT pid FROM problems WHERE code = '" . $_POST["code"] . "'"
  );

  echo "Problem ID: " . $problemId["pid"] . " Code : " . $_POST["code"] . "<br>";

  $problemIdInt = intval($problemId["pid"]);


  $categories = implode(', ', $_POST['category']);
  echo "Selected categories: " . $categories;

  // Insert category IDs into category_problem table
  $categoryIds = $_POST['category'];
  foreach ($categoryIds as $categoryId) {
    $categoryIdInt = intval($categoryId);
    writeError(
      '<br>Category ID: ' . $categoryIdInt . "    PROBLEM ID: " . $problemIdInt . " " . '<br>'
    );

    // echo '<br>Category ID: ' . $categoryIdInt . "    PROBLEM ID: " . $problemId . " " . '<br>';
    $query =
      "INSERT INTO category_problem (category_id, problem_id) VALUES (" .
      $categoryIdInt . ", " .
      $problemIdInt .
      ")";

    DB::query($query);

    // Increment count in category table
    $updateQuery = "UPDATE category SET count = count + 1 WHERE id = " . $categoryIdInt;
    DB::query($updateQuery);
  }
} elseif (isset($_POST['addcontest'])) {
  writeError("addcontest");

  $newcontest = [];

  $newcontest['code'] = $_POST['code'];
  $newcontest['name'] = $_POST['name'];
  $date = new DateTime($_POST['starttime']);
  $newcontest['starttime'] = $date->getTimestamp();
  $date = new DateTime($_POST['endtime']);
  $newcontest['endtime'] = $date->getTimestamp();
  $newcontest['announcement'] = $_POST['announcement'];

  $keys = '';
  $values = '';
  foreach ($newcontest as $key => $value) {
    $keys .= ($keys ? ',' : '') . $key;
    $values .= ($values ? "','" : '') . $value;
  }

  $query = "INSERT INTO contest ($keys) VALUES ('$values')";
  DB::query($query);

  $_SESSION['msg'] = "Contest Added.";

  redirectTo(SITE_URL . "/admin_contests.php");
} else if (isset($_POST['updatecontest'])) {
  $id = $_POST['id'];
  $newcontest['code'] = $_POST['code'];
  $newcontest['name'] = $_POST['name'];
  $date = new DateTime($_POST['starttime']);
  $newcontest['starttime'] = $date->getTimestamp();
  $date = new DateTime($_POST['endtime']);
  $newcontest['endtime'] = $date->getTimestamp();
  $newcontest['announcement'] = $_POST['announcement'];
  foreach ($newcontest as $key => $val) {
    $query = "update contest set $key = '$val' where id=$id";
    DB::query($query);
  }
  $_SESSION['msg'] = "Contest Updated.";
  redirectTo(SITE_URL . $_SESSION['url']);
} else if (isset($_POST['submitcode'])) {
  echo "submitcode";
  $_SESSION['subcode'] = addslashes($_POST['sub']);

  if (isset($_SESSION['loggedin'])) {
    $allowed = array('application/octet-stream', 'text/x-csrc', 'text/x-c++src', 'text/x-csharp', 'text/x-java', 'text/javascript', 'text/x-pascal', 'text/x-perl', 'text/x-php', 'text/x-python', 'text/x-ruby', 'text/plain');
    if ((isset($_POST['lang']) && $_POST['lang'] != "") && ($_FILES['code_file']['size'] > 0 || (isset($_POST['sub']) && $_POST['sub'] != "")) && (isset($_POST['probcode']) && $_POST['probcode'] != "")) {  // Lvl 2
      if ($_FILES['code_file']['size'] > 0 && $_FILES['code']['error'] == 0 && in_array($_FILES['code_file']['type'], $allowed)) {
        $sourcecode = addslashes(file_get_contents($_FILES['code_file']['tmp_name']));
      } else {
        $sourcecode = $_POST['sub'];
      }

      $query = "select * from admin where variable ='mode' or variable ='endtime' or variable='ip' or variable ='port'";
      $check = DB::findAllFromQuery($query);
      $admin = array();
      foreach ($check as $row) {
        $admin[$row['variable']] = $row['value'];
      }





      $query = "select pid, total from problems where code = '$_POST[probcode]'";
      $res = DB::findOneFromQuery($query);


      $submittime = time();
      $query = "INSERT INTO runs (pid,uid,language,access,submittime) VALUES ('$res[pid]', '" . $_SESSION["Users"]["uid"] . "', '$_POST[lang]', 'private', '" . $submittime . "')";
      $res2 = DB::query($query);



      DB::query("update problems set total=" . ($res['total'] + 1) . " where pid = $res[pid]");
      $query = "select rid from runs where uid = " . $_SESSION["Users"]["uid"] . " and pid = $res[pid] and submittime = $submittime";
      $result = DB::findOneFromQuery($query);

      if ($result) {
        echo "pid: " . $res['pid'] . "<br>";
        echo "total: " . $res['total'] . "<br>";
        $rid = $result['rid'];




        $query = "INSERT INTO subs_code (rid, name, code) VALUES ('$rid', 'Main', '$sourcecode')";
        $result = DB::query($query);
        $query = "select rid from subs_code where rid = $rid";
        $result = DB::findOneFromQuery($query);
        if ($result) {
          echo "admin: " . $admin['mode'] . "<br>";
          echo "admin: " . $admin['endtime'] . "<br>";
          echo "admin: " . $admin['ip'] . "<br>";
          echo "admin: " . $admin['port'] . "<br>";
          echo "time : " . $submittime . "<br>";

          unset($_SESSION['subcode']);
          writeError("Submitted");
          echo "Problem submitted successfully. If your problem is not judged then contact admin.";
          $_SESSION['msg'] = "Problem submitted successfully. If your problem is not judged then contact admin.";
          $client = stream_socket_client($admin['ip'] . ":" . $admin['port'], $errno, $errorMessage);
          if ($client === false) {
            $_SESSION["msg"] .= "<br/>Cannot connect to Judge: Contact Admin";
          }
          fwrite($client, $rid);
          fclose($client);
          redirectTo(SITE_URL . "/view_problem.php?" . "problem_id=" . $_POST["probcode"] . "&code=" . $rid);
        } else {
          DB::query("Delete from runs where rid = $rid");
          $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
          redirectTo(SITE_URL . $_SESSION['url']);
        }
      } else {
        $_SESSION['msg'] = "Some error occured during submission. If the problem continues contact Admin";
        redirectTo(SITE_URL . $_SESSION['url']);
      }
    } else {
      $_SESSION['msg'] = "You missed some necessary values.";
      redirectTo(SITE_URL . $_SESSION['url']);
    }
  } else {
    $_SESSION['msg'] = "You should be logged in to make a submission.";
    redirectTo(SITE_URL . $_SESSION['url']);
  }
} elseif (isset($_POST['add_topic'])) {
  // Retrieve the form data
  $title = $_POST['title'];
  $short = $_POST['short'];
  $description = $_POST['statement'];
  $categoryIds = $_POST['category'];
  $userId = $_SESSION['Users']['uid'];

  // Handle the file upload (if applicable)
  $statementFile = null;
  if ($_FILES['statement_file']['error'] === UPLOAD_ERR_OK) {
    $statementFile = file_get_contents($_FILES['statement_file']['tmp_name']);
  }

  // Insert the topic into the database
  $query = "INSERT INTO learn (addedby, title, short, description, statement, category, user_id) VALUES ('" . $_SESSION["Users"]["name"] . "', '$title', '$short', '$description', '$statementFile', '" . implode(',', $categoryIds) . "', '$userId')";

  // Execute the query
  DB::query($query);

  // Redirect or display a success message
  // ...
  redirectTo(SITE_URL . "/learn.php");
} elseif (isset($_POST['add_blog'])) {



  $title = $_POST['blog_title'];
  $description = $_POST['description'];
  $userId = $_SESSION['Users']['uid'];


  // Handle the file upload (if applicable)
  $statementFile = null;
  if ($_FILES['blog_statement_file']['error'] === UPLOAD_ERR_OK) {
    $statementFile = file_get_contents($_FILES['blog_statement_file']['tmp_name']);
  }



  // Insert the topic into the database
  $query = "INSERT INTO blogs (added, title, description, statement, user_id) VALUES ('" . $_SESSION["Users"]["name"] . "', '$title', '$description', '$statementFile', '$userId')";

  // Execute the query
  DB::query($query);

  // Redirect or display a success message
  // ...
  redirectTo(SITE_URL . "/blog.php");
} elseif (isset($_POST['likes'])) {
  $blogId = $_POST['blogId'];
  $query = "UPDATE blogs SET likes = likes + 1 WHERE id = '$blogId'";
  DB::query($query);
  redirectTo(SITE_URL . "/view_blog.php?blog_id=" . $blogId);
} elseif (isset($_POST['dislikes'])) {
  $blogId = $_POST['blogId'];
  $query = "UPDATE blogs SET dislikes = dislikes + 1 WHERE id = '$blogId'";
  DB::query($query);
  redirectTo(SITE_URL . "/view_blog.php?blog_id=" . $blogId);
}
