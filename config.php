<?php
/**
 * Returns value of environment varialbe, if set.
 * Otherwise returns the default value.
 */
function getEnvVar($key, $default) {
  return getenv($key) ? getenv($key) : $default;
}

/**
 * Checks if the file exists at the path defined by the
 * environment variable. If it exists, then simple return
 * the file contens. Other the fallback value.
 */
function getDockerSecretValue($key, $fallbackValue) {
  $file = getEnvVar($key, null);
  if ($file && file_exists($file)) {
    return trim(file_get_contents($file));
  } else {
    return $fallbackValue;
  }
}

define("SITE_URL", getEnvVar("CODESOHOJ_BASE_URL", "localhost"));
define("SQL_USER", getDockerSecretValue('CODESOHOJ_SQL_USER_FILE', getEnvVar("CODESOHOJ_SQL_USER", "root")));
define("SQL_PASS", getDockerSecretValue('CODESOHOJ_SQL_PASS_FILE', getEnvVar("CODESOHOJ_SQL_PASS", "root")));
define("SQL_DB", getDockerSecretValue('CODESOHOJ_SQL_DB_FILE', getEnvVar("CODESOHOJ_SQL_DB", "codesohoj_main")));
define("SQL_HOST", getDockerSecretValue('CODESOHOJ_SQL_HOST_FILE', getEnvVar("CODESOHOJ_SQL_HOST", "127.0.0.1")));
define("SQL_PORT", getDockerSecretValue('CODESOHOJ_SQL_PORT_FILE', getEnvVar("CODESOHOJ_SQL_PORT", "3306")));
displayErrors(TRUE);                  
date_default_timezone_set("Asia/Dhaka"); 

/* 
 * 
 * NO NEED TO CHANGE THE CODE BELOW
 * 
 */
ini_set("session.gc_maxlifetime", 86400);
session_set_cookie_params(array(
  'lifetime' => 0,
  'path' => SITE_URL,
  'samesite' => 'Lax',
  'httponly' => true
));
session_start();
function displayErrors($option = true) {
  if ($option) {
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', '1');
  }
  else {
    error_reporting(0);
    ini_set('display_errors', '0');
  }
}

define("DEBUG", true);

clearstatcache();

define("JS_URL", SITE_URL . "/js");
define("CSS_URL", SITE_URL . "/css");
define("IMAGE_URL", SITE_URL . "/img");
define("ACCOUNT_URL", SITE_URL . "/account");

define("PHPSCRIPTS_PATH", dirname(__FILE__) . "/php_scripts");

   

define("MAIL_PATH", "Mail.php");
define("MAIL_USER", "");
define("MAIL_PASS", "");
define("MAIL_HOST", "");    // ssl://smtp.gmail.com
define("MAIL_PORT", "");    // 465

define("ERROR_LOG", dirname(__FILE__) . "/errors.txt");


// Sanitizing POST variables
foreach ($_POST as $key => $value) {
  $_POST[$key] = addslashes($value);
}

// Sanitizing GET variables
foreach ($_GET as $key => $value) {
  $_GET[$key] = addslashes($value);
}

require_once 'functions.php';

