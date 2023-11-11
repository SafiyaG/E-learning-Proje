<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diuportal";

// Create a connection for registrations database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection for registrations database
if ($conn->connect_error) {
    die("Connection to registrations database failed: " . $conn->connect_error);
}



 
?>
