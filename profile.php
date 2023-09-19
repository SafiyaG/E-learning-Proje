<?php
require_once "connect.php";

// Check if the user is logged in
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php"); // Redirect to the login page if not logged in
    exit;
}

// Get the user's ID from the session
$user_id = $_SESSION["id"];

// Retrieve user information from the database
$sql = "SELECT fullname, email FROM users WHERE id=?";
$stmt = $conn1->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$fullname = $row["fullname"];
$email = $row["email"];

$stmt->close();
$conn1->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* styles.css */
body {
    font-family: sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    background-color: #007bff;
    color: #fff;
    padding: 15px 0;
}

.container {
    display: flex;
    justify-content : center;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

p {
    margin-bottom: 20px;
    font-size: 18px;
}

label {
    display: block;
    font-weight: bold;
    font-size: 16px;
}

input[type="text"],
input[type="email"] {
    width: 70%;
    padding: 10
    px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 12px 25px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
   <h2>Student Profile</h2>
    <p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>

    <h3>Update Profile</h3>
    <form action="update_profile.php" method="post">
        <label for="new_fullname">New Full Name:</label>
        <input type="text" name="new_fullname" required><br><br>

        <label for="new_email">New Email:</label>
        <input type="email" name="new_email" required><br><br>
       

        <input type="submit" value="Update">
    </form>
</body>
</html>

