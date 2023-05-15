<?php

// Check whether user is logged in or not

// Authorization - Access Control

if(!isset($_SESSION['user'])) { // If user session is not set

    // User is not logged in

    // Redirect to login page with message

    $_SESSION['no-login-message'] = "Please Login to Access Admin Panel";


    // Redirect to login page

    header('location:'.SITEURL.'admin/login.php');

}

?>