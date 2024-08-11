<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Flower Shop</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/contactValidation.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="contact-section">
            <h1>Contact Us</h1>
            <div class="contact-container">
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p>If you have any questions or would like to get in touch with us, please use the contact form below or reach out to us via the contact details provided.</p>
                    <ul>
                        <li><strong>Address:</strong> No.16, Dalugama, Kelaniya, Sri Lanka</li>
                        <li><strong>Phone:</strong> +94 74 567 3278</li>
                        <li><strong>Email:</strong> info@flowershop.com</li>
                    </ul>
                </div>

                <div class="contact-form">
                    <?php

                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'success') {
                            echo '<p class="success-message">Thank you for contacting us! We will get back to you shortly.</p>';
                        } elseif ($_GET['status'] == 'error') {
                            echo '<p class="error-message">There was an error submitting your message. Please try again later.</p>';
                        } elseif ($_GET['status'] == 'validation_error') {
                            echo '<p class="error-message">Please fill out all fields and provide a valid email address.</p>';
                        }
                    }
                    ?>
                    <h2>Contact Form</h2>
                    <form action="process_contact.php" method="post" onsubmit=" return contactFormValidation()">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>

                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
