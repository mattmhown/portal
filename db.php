<?php
$servername = "localhost";  // Change if your host is different
$username = "howncoma_admin"; 
$password = "Bitemefear8"; 
$dbname = "howncoma_PartnerPortal"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

