<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    

    <style>
        body {
            background: linear-gradient(135deg, #ffffff, #007F00);
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            max-width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">User Registration</h1>

                <?php
                // Initialize variables
                $fullname = $email = $password = "";
                $registration_error = "";

            
                $mysqli = new mysqli("localhost", "root", "", "registrations");

                // Check if the connection was successful
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Check if the 'fullname', 'email', and 'password' fields are set
                    if (
                        isset($_POST["fullname"]) &&
                        isset($_POST["email"]) &&
                        isset($_POST["password"])
                    ) {
                        // Collect form data
                        $fullname = $_POST["fullname"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];

                        // Hash the password (assuming $password is set)
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                        // Insert data into the database
                        $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
                        $stmt = $mysqli->prepare($sql);

                        if ($stmt) {
                            $stmt->bind_param("sss", $fullname, $email, $hashed_password);
                            if ($stmt->execute()) {
                                // Display a success message
                                echo '<div class="alert alert-success">Registration successful!</div>';
                                
                                // Redirect to the login page after a brief delay (e.g., 2 seconds)
                                    header("refresh:2;url=login.php");
                                    exit;

                            } else {
                                // Registration failed, display error message
                                $registration_error = "Registration failed. Please try again.";
                            }
                        } else {
                            // Handle the case where the SQL statement couldn't be prepared
                            $registration_error = "An error occurred during registration.";
                        }
                    } else {
                        // Handle the case where required fields are not set
                        $registration_error = "All fields are required.";
                    }
                }
                ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   
</body>
</html>
