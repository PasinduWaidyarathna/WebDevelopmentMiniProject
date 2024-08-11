<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Flower Shop</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="products-section">
            <h1>Our Products</h1>
            <div class="products-container">
                <?php
                include 'db_connection.php'; // Include the database connection file

                // Fetch products from the database
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="uploaded_img/' . $row["image_url"] . '" alt="' . $row["name"] . '">';
                        echo '<h2>' . $row["name"] . '</h2>';
                        echo '<p>' . $row["description"] . '</p>';
                        echo '<p id="price">LKR' . $row["price"] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </section>
    </main>
</body>
</html>
6