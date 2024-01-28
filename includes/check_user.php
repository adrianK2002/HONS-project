<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Check if the session has expired
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 360)) {
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage

    // Display a pop-up message using JavaScript
    echo "<script type='text/javascript'>alert('Session has expired! Please log in again.');</script>";

    header("location: login.php");
    exit;
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
