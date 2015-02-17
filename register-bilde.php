<!-- Form used for uploading image -->
<form action="" method="post" enctype="multipart/form-data">
    Velg bilde: <input type="file" name="fileToUpload" id="fileToUpload" > <br>
    Beskrivelse: <input type="text" name="fileDescription" id="fileDescription" > <br>
    <input type="submit" value="Last opp bilde" name="submit" >
</form>

<?php
require_once 'php/ImageManager.php';
require_once 'php/connect.php';

if(isset($_POST["submit"])) {
    $dbConnector = new DatabaseConnector();
    $dbLink = $dbConnector->getConnection();
    $imageManager = new ImageManager($dbLink);

    if($imageManager->addImage($_POST["fileDescription"])) {
        echo 'Upload successfull!';
    } else {
        echo 'Upload failed!';
    }
}
?>