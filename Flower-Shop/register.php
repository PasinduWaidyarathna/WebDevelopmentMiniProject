<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Flower Shop</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/registerValidation.js" defer></script>
</head>
<body>
    <main>
        <section class="register-section">
            <h1>Register</h1>
            <div class="register-container">
                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'success') {
                        echo '<p class="success-message">Registration successful! You can now log in.</p>';
                    } elseif ($_GET['status'] == 'error') {
                        echo '<p class="error-message">Registration failed. Please try again.</p>';
                    } elseif ($_GET['status'] == 'email_exists') {
                        echo '<p class="error-message">An account with this email already exists.</p>';
                    }
                }
                ?>
                <form action="process_register.php" method="post" onsubmit="return registerFormValidation()">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>

                    <button type="submit" >Register</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
