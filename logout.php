<?php
session_start();

// Unset all session variables
$_SESSION = array();
// Destroy the session
session_destroy();

// Display an alert message
echo "<script>alert('Logged Out Successfully');</script>";
echo '<script>window.location.href = "index.php";</script>';

// Redirect to the login page
header("Location: index.php");
exit; 
?>
