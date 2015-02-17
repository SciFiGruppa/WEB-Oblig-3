<?php
require_once("config.php");

class DatabaseConnector {

  private $dbLink = null;

  public function __construct() {
      $this->dbLink = mysqli_connect(Config::$DB_HOST_NAME, Config::$DB_USER_NAME,
                              Config::$DB_USER_PASSWORD, Config::$DB_DB_NAME);

    if($this->dbLink->connect_error) {
      die("DB Connection error!");
    }
  }

  public function getConnection() {
    return $this->dbLink;
  }

}

// Lazy "hack" so we dont have to refactor all the .php files.
$dbconnector = new DatabaseConnector();
$db = $dbconnector->getConnection();
