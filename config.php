<?php

/**
 * Class containing configurations/constants for this project.
 */
final class Config {
    // Database login info
    public static $DB_HOST_NAME = "localhost";
    public static $DB_USER_NAME = "oblig3_user";
    public static $DB_USER_PASSWORD = "oblig3_user_pw";
    public static $DB_DB_NAME = "885666";

    // Image upload constants
    public static $UPLOAD_PATH = "../img/";
    public static $UPLOAD_MAX_FILESIZE_BYTES = 10000000; // 10mb
    public static $UPLOAD_VALID_MIME_TYPES = array( "image/png",
                                                    "image/jpg",
                                                    "image/jpeg" );
}