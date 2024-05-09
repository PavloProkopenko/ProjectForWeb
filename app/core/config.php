<?php

/**
 * app info
 */
define ('APP_NAME','Ukranian courses');
define('APP_DESC', 'Free courses for Ukraine response');
/**
 * Database config
 */
if($_SERVER['SERVER_NAME'] == 'localhost')
{
    // database config for local server
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'courses_db');
    define('DB_USERS', 'root');
    define('DB_PASS', '');
    define('DB_DRIVER', 'mysql');
} else {
    // database config for live server
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'courses_db');
    define('DB_USERS', 'root');
    define('DB_PASS', '');
    define('DB_DRIVER', 'localhost');
}