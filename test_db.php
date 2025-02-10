<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost:3306";  // Correct for your setup
$username = "howncoma_admin";  // Your database username
$password = "Bitemefear8";  // Your database password
$dbname = "howncoma_PartnerPortal";  // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Run a simple query to check if the database works
$sql = "SELECT 1";
$result = $conn->query($sql);

if ($result) {
    echo "✅ Database query executed successfully!";
} else {
    echo "❌ Query failed: " . $conn->error;
}

$conn->close();
?>