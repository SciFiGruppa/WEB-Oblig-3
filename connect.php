<?php
require_once '../config.php';

$db=mysqli_connect(Config::$DB_HOST_NAME,Config::$DB_USER_NAME,Config::$DB_USER_PASSWORD,Config::$DB_DB_NAME);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>