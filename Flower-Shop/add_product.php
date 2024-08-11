<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop</title>
    <link rel="stylesheet" href="css/admin_styles.css">
    <script src="js/productValidation.js" defer></script>
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <main>
<section id="add-product">
        <h2>Add New Product</h2>
        <?php
        session_start();
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        <form action="process_add_product.php" method="post" onsubmit="return productFormValidation()">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>

            <label for="product_description">Product Description:</label>
            <textarea id="product_description" name="product_description" required></textarea>

            <label for="product_price">Product Price:</label>
            <input type="number" id="product_price" name="product_price" step="0.01" required>

            <label for="product_image">Product Image URL:</label>
            <input type="text" id="product_image" name="product_image" required>

            <button type="submit">Add Product</button>
        </form>
    </section>
    </main>
</body>
</html>


