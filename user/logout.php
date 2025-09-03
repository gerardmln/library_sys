<?php

session_start();

unset($_SESSION["id"]); // Unset the session variable
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
echo "Logging out ... Please wait ...";
header ("Refresh: 3; url=../index.php"); // Redirect to login page after 2 seconds
exit(); // Exit the script

?>