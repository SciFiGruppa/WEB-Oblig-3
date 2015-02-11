<?php

/**
 * This class has methods for validating, uploading and register images.
 */
class ImgUpload {

    private $file = null;

    public function __construct($file) {
        $this->file = $file;
    }

    /**
     * This method checks if the passed image is valid.
     * @param $imageFile $file file to be validated.
     * @return boolean Returns true if the file is valid, false otherwise.
     */
    private function isFileValid($imageFile) {

        // Check if file already exists

        // Check filesize

        // Check filetype

        return false;
    }

}