<?php
$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$dbname1 = "registrations";

// Create a connection for registrations database
$conn1 = new mysqli($servername1, $username1, $password1, $dbname1);

// Check connection for registrations database
if ($conn1->connect_error) {
    die("Connection to registrations database failed: " . $conn1->connect_error);
}

// Course management connection

$servername2 = "localhost";
$username2 = "root";
$password2 = "";
$dbname2 = "courseManagement";

// Create a connection for course management database
$conn2 = new mysqli($servername2, $username2, $password2, $dbname2);

// Check connection for course management database
if ($conn2->connect_error) {
    die("Connection to course management database failed: " . $conn2->connect_error);
}
?>
