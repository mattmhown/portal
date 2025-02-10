<?php
/**
 * test_supabaselogin.php
 *
 * This file provides a simple HTML form and test interface to authenticate a user using the
 * Supabase Auth REST endpoint. It sends the provided email and password as a JSON payload
 * (which Supabase expects) and then displays the JSON response.
 *
 * In production, ensure HTTPS is enabled and error display is turned off.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Supabase Auth endpoint configuration
    $authUrl    = "https://jrtrugxscvrvekldaqdh.supabase.co/auth/v1/token?grant_type=password";
    $supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImpydHJ1Z3hzY3ZydmVrbGRhcWRoIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mzg2NjQ3ODksImV4cCI6MjA1NDI0MDc4OX0.fd0WMUSB8anKxH--gRSQtEWjsdDjn3RHV1Z2uTNVi18";

    // Build the JSON payload. The API expects keys "email" and "password" (lowercase)
    $postData = json_encode([
        'email'    => $email,
        'password' => $password
    ]);

    // Initialize cURL to make the API request.
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
        $error_msg = curl_error($ch);
        echo "<p style='color:red;'>cURL error: $error_msg</p>";
        curl_close($ch);
        exit();
    }
    curl_close($ch);

    // Decode the JSON response from Supabase Auth endpoint
    $result = json_decode($response, true);

    echo "<h2>Supabase Auth API Response</h2>";
    echo "<pre>" . print_r($result, true) . "</pre>";

    if (isset($result['access_token'])) {
        echo "<p style='color:green;'>Login successful!<br>Access Token: " . htmlspecialchars($result['access_token']) . "</p>";
    } else {
        $errorMsg = isset($result['error_description']) ? $result['error_description'] : "Invalid credentials!";
        echo "<p style='color:red;'>Login failed: " . htmlspecialchars($errorMsg) . "</p>";
    }
} else {
    // Display the HTML login form when no POST data is provided.
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Test Supabase Auth Login</title>
      <style>
          body { font-family: Arial, sans-serif; margin: 2rem; }
          label { display: block; margin-bottom: 0.5rem; }
          input { padding: 0.5rem; margin-bottom: 1rem; width: 300px; }
          button { padding: 0.5rem 1rem; }
      </style>
    </head>
    <body>
      <h1>Test Supabase Auth Login</h1>
      <form method="post" action="test_supabaselogin.php">
         <label for="email">Email:</label>
         <input type="email" name="email" id="email" required>
         <label for="password">Password:</label>
         <input type="password" name="password" id="password" required>
         <button type="submit">Login</button>
      </form>
    </body>
    </html>
    <?php
}
?> 