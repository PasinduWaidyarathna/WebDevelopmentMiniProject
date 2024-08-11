<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop</title>
    <link rel="stylesheet" href="css/admin_styles.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <main>
        <section id="view-messages">
        <h2>Show Customer Messages</h2>
        <?php
        include 'db_connection.php'; // Include the database connection file
        
        // Fetch all messages
        $sql = "SELECT * FROM messages";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['message'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No messages found.</p>';
        }

        $conn->close();
        ?>
    </section>
    </main>
    </body>
</html>


