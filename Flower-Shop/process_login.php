<?php
include 'db_connection.php'; // Include the database connection file

session_start(); // Start a session to manage login state

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = $conn->real_escape_string(trim($_POST['password']));

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch the user's details
        $user = $result->fetch_assoc();
        
        // Check if the user is an admin
        if ($user['role'] === 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = 'admin'; // Set user role in session

            // Redirect to the admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = 'user'; // Set user role in session

            // Redirect to the home page
            header("Location: home.php");
            exit();
        }
    } else {
        // Authentication failed
        header("Location: login.php?status=error");
        exit();
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
