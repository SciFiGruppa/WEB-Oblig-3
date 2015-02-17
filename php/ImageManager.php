<?php
require_once("config.php");

/**
 * Class for managing images.
 * Features:
 * - Upload validated image to server and register it in database.
 * - Returns an array of all registered images.
 * - Method for changing the description of an image.
 * - Delete a picture from the database and server
 * - Fetch an array of images based on class id
 */

class ImageManager {
    private $dbLink = null;

    public function __construct($dbLink) {
        $this->dbLink = $dbLink;
    }

    /**
     * @param $imageNumber integer The image's number in the database.
     * @return bool|RuntimeException Returns true if deleting was successful,
     *                               or a RuntimeException with an error message if not.
     */
    public function deleteImage($imageNumber) {
        try {
            // Getting image name
            $query = "SELECT filnavn FROM bilde WHERE bildenr = $imageNumber;";
            $result = mysqli_query($this->dbLink, $query);

            // Error code should be 0
            if(mysqli_errno($this->dbLink) !== 0) {
                throw new RuntimeException("Error while querying database.
                                            Mysqli error number: " . mysqli_errno($this->dbLink));
            }

            // The row should only have 1 element.
            $row = mysqli_fetch_row($result);
            if(count($row) < 1) {
                throw new RuntimeException("Error while querying database. More than 1 element in result row.");
            }

            $imageName = $row[0];


            // Delete the image from the server
            $filePath = "../" . Config::$UPLOAD_PATH . $imageName;
            if(file_exists($filePath)) {
                unlink($filePath);
            } else {
                throw new RuntimeException("Error while deleting file from server. The file does not exist.");
            }


            // Delete the image from the DB
            $query = "DELETE FROM bilde WHERE bildenr = $imageNumber;";
            $deleteResult = mysqli_query($this->dbLink, $query);

            // There should be no errors and the returned results should be empty.
            if(mysqli_errno($this->dbLink) !== 0 || count($deleteResult) !== 0) {
                throw new RuntimeException("Error while deleting image from database. Returned resultset > 0 or mysqli error code > 0");
            }
        }
        catch(RuntimeException $e) {
            return $e;
        }

        return true;
    }

    /**
     * @param $description
     * @return boolean Returns true if adding the image was successfull, false otherwise.
     */
    public function addImage($description) {
        $regSuccess = false;
        $uploadResult = $this->validateAndUpload();

        // If exception, print error and return.
        if($uploadResult instanceof RuntimeException) {
            echo $uploadResult->getMessage();
            $regSuccess = false;
        }

        // Registering image in DB
        $regSuccess = $this->registerImage($uploadResult, $description);
        return $regSuccess;
    }

    /**
     * Validates and uploads an image in $_FILES.
     * @return RuntimeException|string On successful upload the image's filename string is returned.
     *                                 On faliure, a RuntimeException is returned.
     */
    private function validateAndUpload() {
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
                // Upload successful!
                return $newFileName;
            }
        }
        catch(RuntimeException $e) {
            return $e;
        }
    }

    /**
     * @param $fileName
     * @param $imgDescription
     * @return boolean Returns true if registering was successful, false otherwise.
     */
    private function registerImage($fileName, $imgDescription) {
        // Description must be under max length
        if(count($imgDescription) > Config::$UPLOAD_MAX_DESCRIPTION_LENGTH) {
            return false;
        }

        $today = date("Y-m-d"); // Format: 2015-02-16

        // Registering to database
        $query = "INSERT INTO bilde (dato, filnavn, beskrivelse) VALUES ('$today', '$fileName', '$imgDescription');";
        mysqli_query($this->dbLink, $query);

        if(mysqli_errno($this->dbLink) === 0) {
            return true;
        } else {
            return false;
        }
    }
}

