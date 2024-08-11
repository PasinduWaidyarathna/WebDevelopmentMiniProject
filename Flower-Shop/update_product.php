<?php
include 'db_connection.php'; // Ensure you include your database connection file

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url']; // New field for image URL

    // Update query to include image_url
    $updateQuery = "UPDATE products SET name='$name', description='$description', price='$price', image_url='$image_url' WHERE id=$id";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: show_products.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="css/admin_styles.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <main>
        <h1>Update Product</h1>
        <form action="update_product.php?id=<?php echo $id; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>" required>

            <button type="submit">Update Product</button>
        </form>
    </main>
</body>
</html>

<?php
mysqli_close($conn);
?>
