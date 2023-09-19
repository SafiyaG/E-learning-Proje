<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check user's credentials in the database
    $sql = "SELECT id, password FROM users WHERE email=?";
    $stmt = $conn1->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $hashed_password = $row["password"];

        // Verify the provided password against the hashed password from the database
        if (password_verify($password, $hashed_password)) {
            // Start a session and store user information
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $user_id;

            // Redirect to the user's profile page
            header("location: profile.php");
            exit; // Ensure that no code is executed after the redirection
        } else {
            // Passwords do not match, show an error message
            echo "Invalid password. Please try again.";
        }
    } else {
        // No user found with the provided email, show an error message
        echo "Invalid email. Please try again.";
    }

    $stmt->close();
}

$conn1->close();
?>
