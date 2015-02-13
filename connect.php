<?php
require_once 'config.php';

$db=mysqli_connect(/*Config::$DB_HOST_NAME*/ 'localhost', /*Config::$DB_USER_NAME*/ 'root', /*Config::$DB_USER_PASSWORD*/ '', /*Config::$DB_DB_NAME*/ '885666');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>