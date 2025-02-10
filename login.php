<?php
// login.php - Production version using Supabase Auth REST endpoint
// For production, ensure HTTPS is enabled and error display is disabled.

ini_set('display_errors', 0);
error_reporting(0);
session_start();

// Set response header to JSON.
header("Content-Type: application/json");

// Receive JSON payload from the login form.
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(["success" => false, "message" => "No JSON input provided."]);
    exit();
}

$email = trim($data["username"]);
$password = $data["password"];

// Supabase Auth endpoint (grant_type=password).
$authUrl = "https://jrtrugxscvrvekldaqdh.supabase.co/auth/v1/token?grant_type=password";
$supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImpydHJ1Z3hzY3ZydmVrbGRhcWRoIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mzg2NjQ3ODksImV4cCI6MjA1NDI0MDc4OX0.fd0WMUSB8anKxH--gRSQtEWjsdDjn3RHV1Z2uTNVi18";

// Build the JSON payload (the API expects lowercase keys "email" and "password").
$postData = json_encode([
    "email"    => $email,
    "password" => $password
]);

// Initialize cURL to call the Supabase Auth endpoint.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $authUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: $supabaseKey",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    $error = curl_error($ch);
    echo json_encode(["success" => false, "message" => "cURL error: $error"]);
    curl_close($ch);
    exit();
}
curl_close($ch);

// Decode the response from Supabase Auth.
$result = json_decode($response, true);

if (isset($result["access_token"])) {
    // Successful login: store user data and access token in session.
    $_SESSION["user"] = $result["user"];
    $_SESSION["access_token"] = $result["access_token"];
    echo json_encode(["success" => true, "message" => "Login successful!"]);
} else {
    $errorMsg = isset($result["error_description"]) ? $result["error_description"] : "Invalid credentials!";
    echo json_encode(["success" => false, "message" => $errorMsg]);
}
exit();
?>