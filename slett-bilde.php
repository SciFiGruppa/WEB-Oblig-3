<?php require_once 'top.html' ?>

<h3>Slett bilde</h3>

<form method="POST" action="">
    Velg bilde <?php require_once 'listeboks-bilde.php' ?>
    <input type="submit" name="submit" id="submit" value="Slett">
</form>

<?php
require_once 'php/ImageManager.php';
require_once 'php/connect.php';

if(isset($_POST["submit"])) {
    $dbCon = new DatabaseConnector();
    $imageManager = new ImageManager($dbCon->getConnection());
    $returnVal = $imageManager->deleteImage($_POST["bildenr"]);

    if($returnVal !== true) {
        echo $returnVal->getMessage();
    } else {
        echo 'Deleting successfull!';
    }
}
?>

<?php require_once 'footer.html' ?>

