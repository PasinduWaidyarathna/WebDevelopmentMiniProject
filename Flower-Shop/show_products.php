<?php
include 'db_connection.php';

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show All Products</title>
    <link rel="stylesheet" href="css/admin_styles.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <main>
        <h1>All Products</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="<?php echo 'uploaded_img/' . $row['image_url']; ?>" alt="<?php echo $row['name']; ?>" class="product-image"></td>

                    <td>
                        <a href="update_product.php?id=<?php echo $row['id']; ?>" class="btn">Update</a>
                        <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>

<?php
mysqli_close($conn);
?>
