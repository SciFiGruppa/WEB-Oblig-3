<?php
require_once("config.php");
require_once("IDBLink.php");

class DatabaseConnector implements IDBLink {

  private $dbLink = null;

  /**
   * @return mysqli Returns the database link.
   */
  public function getDBLink() {
    if($this->isLinkValid($this->dbLink)) {
      return $this->dbLink;
    }
    else {
      if(false === $this->dbLink = $this->getNewDBLink()) {
        die("Error in database login. Have you set the correct info in config.php?");
      }
    }
  }

  /**
   * @return mysqli|NULL Returns a mysqli object or NULL.
   */
  private function getNewDBLink() {
    $newLink = mysqli_connect(Config::$DB_HOST_NAME,
                              Config::$DB_USER_NAME,
                              Config::$DB_USER_PASSWORD,
                              Config::$DB_DB_NAME);

    return ($this->isLinkValid($newLink) ? $newLink : NULL);
  }

  /**
   * @param $dbLink mysqli The db link to be validated.
   * @return bool Returns true if the object is an instance of the mysqli class.
   */
  private function isLinkValid($dbLink) {
    $isValid = false;

    if(isset($dbLink) && $dbLink instanceof mysqli && $dbLink->connect_errno === 0) {
      $isValid = true;
    }

    return $isValid;
  }


}


// Lazy "hack" so we dont have to refactor all the .php files.
$dbconnector = new DatabaseConnector();
$db = $dbconnector->getDBLink();
