<?php
require_once("../php/connect.php");
require_once("../php/ImageManager.php");

class test_ImageUpload {

    public function __construct() {

    }

    public function test_deleteImage($imageNumber) {
        $dbCon = new DatabaseConnector();
        $imageManager = new ImageManager($dbCon->getDBLink());
        $returnedValue = $imageManager->deleteImage($imageNumber);

        if($returnedValue === true) {
            echo 'deleting success!';
        } else {
            echo $returnedValue->getMessage();
        }
    }
}

// Testing
$test = new test_ImageUpload();
$test->test_deleteImage(8);

