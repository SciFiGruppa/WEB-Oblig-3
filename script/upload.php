<?php
require_once "../config.php";

/**
 * This script is run by the image upload form.
 * This script checks if the uploaded file is valid,
 * before it saves the image to server and regs. the image in our database.
 */

if (isset($_POST["submit"])) {

    try {

        // $_FILES["fileToUpload"]["error"] should be set, and it
        // should not be an array, indicating that more than one file was uploaded.
        if(! isset($_FILES["fileToUpload"]["error"]) ||
            is_array($_FILES["fileToUpload"]["error"]))
        {
            throw new RuntimeException("Missing error element or it is multiple files.");
        }


        // Check error value
        switch($_FILES["fileToUpload"]["error"]) {
            case UPLOAD_ERR_OK:
                // Success, do nothing!
                break;
            case UPLOAD_ERR_INI_SIZE:
                throw new RuntimeException("Upload failed: File exceeds max file size defined in php.ini!");
                break;
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException("Upload failed: File exceeds max file size defined in the HTML form!");
                break;
            case UPLOAD_ERR_PARTIAL:
                throw new RuntimeException("Uploading failed: Only partial upload complete!");
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException("Upload failed: No file was uploaded!");
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                throw new RuntimeException("Upload failed: No temp dir exists!");
                break;
            case UPLOAD_ERR_CANT_WRITE:
                throw new RuntimeException("Upload failed: Failed to write file to disk!");
                break;
            case UPLOAD_ERR_EXTENSION:
                throw new RuntimeException("Upload failed: An extension stopped the upload!");
                break;
            default:
                throw new RuntimeException("Upload failed: Unknown error code!");
                break;
        }


        // Checking file size (bytes)
        if($_FILES["fileToUpload"]["size"] > Config::$UPLOAD_MAX_FILESIZE_BYTES) {
            throw new RuntimeException("Upload failed: Filesize exceeded!");
        }


        // Checking MIME type
        $filePath = $_FILES["fileToUpload"]["tmp_name"];
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($filePath); // Structure: "image/jpeg"
        if(! array_search($mimeType, Config::$UPLOAD_VALID_MIME_TYPES)) {
            throw new RuntimeException("Update failed: Invalid file type!");
        }


        // Naming and moving the image to it's final location.
        // Name format: '54dca6a5bb73d.jpeg'
        $newFileName = uniqid() . "." . substr($mimeType, 6);
        $isMoveSuccessful = move_uploaded_file($filePath, Config::$UPLOAD_PATH . $newFileName);

        if(! $isMoveSuccessful) {
            throw new RuntimeException("Upload failed: Moving file to permanent storage failed!");
        }
        else {
            echo 'Upload complete!';
        }

    }
    catch (RuntimeException $e) {
        echo $e->getMessage();
    }

}