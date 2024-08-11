<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin_styles.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <main>
        <section class="dashboard">
            <div class="dashboard-statistics">
                <?php
                include 'db_connection.php';

                // Get total products count
                $result = $conn->query("SELECT COUNT(*) AS count FROM products");
                $row = $result->fetch_assoc();
                $total_products = $row['count'];

                // Get total messages count
                $result = $conn->query("SELECT COUNT(*) AS count FROM messages");
                $row = $result->fetch_assoc();
                $total_messages = $row['count'];

                // Get total users count
                $result = $conn->query("SELECT COUNT(*) AS count FROM users WHERE role='user'");
                $row = $result->fetch_assoc();
                $total_users = $row['count'];

                // Get total admins count
                $result = $conn->query("SELECT COUNT(*) AS count FROM users WHERE role='admin'");
                $row = $result->fetch_assoc();
                $total_admins = $row['count'];

                $conn->close();
                ?>
                <div class="statistic">
                    <h3>Total Products</h3>
                    <p><?php echo $total_products; ?></p>
                </div>
                <div class="statistic">
                    <h3>Total Messages</h3>
                    <p><?php echo $total_messages; ?></p>
                </div>
                <div class="statistic">
                    <h3>Total Users</h3>
                    <p><?php echo $total_users; ?></p>
                </div>
                <div class="statistic">
                    <h3>Total Admins</h3>
                    <p><?php echo $total_admins; ?></p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
