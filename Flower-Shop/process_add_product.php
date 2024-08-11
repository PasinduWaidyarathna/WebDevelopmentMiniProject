<?php
include 'db_connection.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $product_name, $product_description, $product_price, $product_image);

    if ($stmt->execute()) {
        $message = '<p style="color: green; text-align: center;">New product added successfully!</p>';
    } else {
        $message = '<p style="color: red; text-align: center;">Error: ' . $stmt->error . '</p>';
    }

    $stmt->close();
    $conn->close();
}

if (!empty($message)) {
    session_start();
    $_SESSION['message'] = $message;
    header("Location: add_product.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>
