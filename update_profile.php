<?php
require_once "connect.php";

// Check if the user is logged in
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php"); // Redirect to the login page if not logged in
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's ID from the session
    $user_id = $_SESSION["id"];

    // Get the new full name and email from the form
    $new_fullname = $_POST["new_fullname"];
    $new_email = $_POST["new_email"];

    // Update the user's information in the database
    $sql = "UPDATE users SET fullname=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_fullname, $new_email, $user_id);

    if ($stmt->execute()) {
        header("location: profile.php"); // Redirect back to the profile page after successful update
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
