<?php

require_once "config.php";

function customhash($str)
{
  return md5($str); // To help change the hashing for password saving if needed.
}

$query = "select value from admin where variable='mode'";

$judge = DB::findOneFromQuery($query);
$query =
  "insert into logs value ('" .
  time() .
  "', '$_SERVER[REMOTE_ADDR]', '" .
  addslashes(print_r($_SESSION, true)) .
  "', '" .
  addslashes(print_r($_REQUEST, true)) .
  "' )";
DB::query($query);
$_SESSION["msg"] = "";
if (
  (isset($_SESSION["loggedin"]) && $_SESSION["Users"]["status"] == "Admin") ||
  isset($_POST["login"])
) {
  // ------------------ LOGIN ------------------- //
  echo '<script>console.log("' . $_POST["username"] . '");</script>';

  if (isset($_POST["login"])) {
    if (!isset($_POST["username"]) || $_POST["username"] == "") {
      $_SESSION["msg"] = "Username missing";
      redirectTo(SITE_URL . $_SESSION["url"]);
    } elseif (!isset($_POST["password"]) || $_POST["password"] == "") {
      $_SESSION["msg"] = "Pssword missing";
      redirectTo(SITE_URL . $_SESSION["url"]);
    } else {
      $_POST["password"] = customhash($_POST["password"]);
      $query = "select * from Users where username  = '$_POST[username]' and pass = '$_POST[password]'";
      $res = DB::findOneFromQuery($query);
      if ($res && ($res["status"] == "Normal" || $res["status"] == "Admin")) {
        $save = $_SESSION;
        session_regenerate_id(true);
        $_SESSION = $save;
        $_SESSION["Users"]["id"] = $res["tid"];
        $_SESSION["Users"]["username"] = $res["username"];
        $_SESSION["loggedin"] = "true";
        $_SESSION["Users"]["status"] = $res["status"];
        $_SESSION["Users"]["time"] = time();
        redirectTo(SITE_URL . $_SESSION["url"]);
      } elseif ($res) {
        $_SESSION[
          "msg"
        ] = "You can not log in as your current status is : $res[status]";
        redirectTo(SITE_URL . $_SESSION["url"]);
      } else {
        $_SESSION["msg"] = "Incorrect Username/Password";
        redirectTo(SITE_URL . $_SESSION["url"]);
      }
    }
    // ---------------------- LOG OUT -------------------------- //
  } elseif (isset($_GET["logout"])) {
    session_destroy();
    redirectTo(SITE_URL . "/");
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
              redirectTo(SITE_URL . $_SESSION["url"]);
            }
          } else {
            $_SESSION["reg"] = $_POST;
            $_SESSION["msg"] = "This username is already registered.";
            redirectTo(SITE_URL . $_SESSION["url"]);
          }
        } else {
          $_SESSION["reg"] = $_POST;
          $_SESSION["msg"] = "Password mismatch.";
          redirectTo(SITE_URL . $_SESSION["url"]);
        }
      } else {
        $_SESSION["reg"] = $_POST;
        $_SESSION["msg"] =
          "username should contain only alphabets numbers @ and _";
        redirectTo(SITE_URL . $_SESSION["url"]);
      }
    }
  }
}

?>
