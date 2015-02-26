<?php
    require_once 'top.html';
?>

<h3>Registrer bilde</h3>


<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload" > <br> <br>
    Beskrivelse: <input type="text" name="fileDescription" id="fileDescription" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" > <br> <br>
    <input type="submit" value="Last opp" name="submit" >


<p id="melding"><p>


</form>

<?php
require_once 'php/ImageManager.php';
require_once("php/constants.php");
require_once 'php/connect.php';

if(isset($_POST["submit"])) {
    $dbConnector = new DatabaseConnector();
    $dbLink = $dbConnector->getDBLink();
    $imageManager = new ImageManager($dbLink);

    if($imageManager->addImage($_POST["fileDescription"])) {
        echo 'Upload successfull!';
    } else {
        echo 'Upload failed!';
    }
}
?>

<?php require_once 'footer.html' ?>