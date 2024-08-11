<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <style>
        #prevImageBtn:hover {
            background-color: #555;
        }
        #nextImageBtn:hover {
            background-color: #555;
        }
    </style>
    <main>
        <div class="hero">
            <img id="backgroundImage" src="images/bg.jpg" alt="Flower Shop Background">
            <div class="hero-text">
                <h1>Welcome to Our Flower Shop</h1>
                <p>Your one-stop shop for the freshest flowers.</p>
            </div>
            <button id="prevImageBtn" class="arrow-btn-left" style=" border: none;">❮</button>
            <button id="nextImageBtn" class="arrow-btn-right" style="rotate:180deg; border: none;">❮</button>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>


