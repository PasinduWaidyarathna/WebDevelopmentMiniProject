<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Flower Shop</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <main>
        <section class="login-section">
            <h1>Login</h1>
            <div class="login-container">
                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'error') {
                        echo '<p class="error-message">Invalid username or password. Please try again.</p>';
                    } elseif ($_GET['status'] == 'logout') {
                        echo '<p class="success-message">You have been logged out successfully.</p>';
                    }
                }
                ?>
                <form action="process_login.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Login</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
