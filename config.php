<?php

/**
 * Class containing configurations/constants for this project.
 */
final class Config {
    // Database login info
    public static $DB_HOST_NAME = "localhost";
    public static $DB_USER_NAME = "root";
    public static $DB_USER_PASSWORD = "";
    public static $DB_DB_NAME = "885666";

    // Image upload constants
    public static $UPLOAD_MAX_FILESIZE_BYTES = 10000000;
    public static $UPLOAD_ALLOWED_FILE_TYPES = array("png", "jpg", "jpeg");
}
