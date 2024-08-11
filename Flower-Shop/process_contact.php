<?php
include 'db_connection.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $message = $conn->real_escape_string(trim($_POST['message']));

    // Validate inputs (basic validation)
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Prepare and execute SQL query
        $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the contact page with a success message
            header("Location: contact.php?status=success");
            exit();
        } else {
            // Redirect to the contact page with an error message
            header("Location: contact.php?status=error");
            exit();
        }
    } else {
        // Redirect to the contact page with a validation error message
        header("Location: contact.php?status=validation_error");
        exit();
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
