
<?php

// Start Session

session_start();

// Define constants
define("SITEURL", 'http://localhost/PHP-MySQL-Food-Ordering-App/');
define("LOCALHOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","food-order");

// Database connection
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

// Selecting database
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); 

?>