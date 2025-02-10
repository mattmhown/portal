<?php
session_start();

// Secure session settings
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Only use if HTTPS is enabled

// Regenerate session ID to prevent session fixation
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html"); // Redirect to login page if not authenticated
    exit();
}
?>
