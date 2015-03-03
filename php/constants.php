<?php
/**
 * Class containing configurations/constants for this project.
 */
final class Config {
    // Database login info
    public static $DB_HOST_NAME = "localhost";
    public static $DB_USER_NAME = "106241"; // studentnummer
    public static $DB_USER_PASSWORD = "65141"; // db passord (samme som phpmyadmin)
    public static $DB_DB_NAME = "106241"; // studentnummer

    // Image upload constants
    public static $UPLOAD_IMAGE_PREFIX = "106241"; // studentnummer
    public static $UPLOAD_PATH = "D:\\Sites\\home.hbv.no\\phptemp\\";
    public static $UPLOAD_MAX_FILESIZE_BYTES = 10000000; // 10mb
    public static $UPLOAD_MAX_DESCRIPTION_LENGTH = 200; // character length
    public static $UPLOAD_VALID_MIME_TYPES = array( "image/gif", "image/jpg", "image/png", "image/jpeg" );
}