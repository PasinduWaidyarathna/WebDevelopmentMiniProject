<?php
include 'db_connection.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = $conn->real_escape_string(trim($_POST['username']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $conn->real_escape_string(trim($_POST['password']));
    $confirm_password = $conn->real_escape_string(trim($_POST['confirm_password']));

    // Validate inputs
    if ($password === $confirm_password) {
        // Check if the email already exists
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            // Insert new user into the database
            //$hashed_password = sha1($password); // Use a more secure hashing method in production
            $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to the login page with a success message
                header("Location: register.php?status=success");
                exit();
            } else {
                // Redirect to the register page with an error message
                header("Location: register.php?status=error");
                exit();
            }
        } else {
            // Redirect to the register page with an email exists message
            header("Location: register.php?status=email_exists");
            exit();
        }
    } else {
        // Redirect to the register page with a password mismatch message
        header("Location: register.php?status=password_mismatch");
        exit();
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
