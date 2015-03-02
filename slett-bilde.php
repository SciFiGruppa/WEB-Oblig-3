<?php require_once 'top.html' ?>

<h3>Slett bilde</h3>

<form method="POST" action="" onsubmit="return bekreft()">
    Velg bilde <?php require_once 'listeboks-bilde.php' ?>
    <input type="submit" name="submit" id="submit" value="Slett" >
    <script>
        function bekreft() {
            return confirm("Er du sikker?");
        }
    </script>
</form>

<?php
require_once 'php/ImageManager.php';
require_once("php/constants.php");
require_once 'php/connect.php';

if(isset($_POST["submit"])) {
    $dbCon = new DatabaseConnector();
    $imageManager = new ImageManager($dbCon->getDBLink());
    $returnVal = $imageManager->deleteImage($_POST["bildenr"]);

    if($returnVal !== true) {
        echo $returnVal->getMessage();
    } else {
        echo 'Deleting successfull!';
        print ("<script type='text/javascript'>
                    window.setTimeout(function () {
                        window.location.href = window.location.href;
                    }, 500);
                </script>");
    }
}
?>

<?php require_once 'footer.html' ?>

