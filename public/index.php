<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src 'self'; style-src 'self' 'unsafe-inline';">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta name="referrer" content="no-referrer">
    <title>Rolex Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav>
        <?php
        session_start();
        ?>

        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="cart.php">Cart</a>
        <a href="order_history.php">Order History</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php" class="auth-button">Logout</a>
        <?php else: ?>
            <a href="login.php" class="auth-button">Login</a>
            <a href="register.php" class="auth-button">Register</a>
        <?php endif; ?>
    </nav>
</header>
<div class="hero">
    <div class="hero-text">
        <h1>Rolex: Timeless Elegance</h1>
        <p>Discover luxury and precision in every second.</p>
        <a href="products.php" class="cta-button">Shop Now</a>
    </div>
</div>
<div class="container">
    <h2>Featured Collections</h2>
    <div class="featured-products">
        <div class="featured-product">
            <img src="images/president.png" alt="Rolex President">
            <h3>Rolex President</h3>
            <p>$35,000</p>
        </div>
        <div class="featured-product">
            <img src="images/gmt_master.png" alt="Rolex GMT Master">
            <h3>Rolex GMT Master</h3>
            <p>$12,000</p>
        </div>
        <div class="featured-product">
            <img src="images/submariner.png" alt="Rolex Submariner">
            <h3>Rolex Submariner</h3>
            <p>$9,000</p>
        </div>
    </div>
</div>
<footer>
    <p>Rolex Shop Honeypot | All Rights Reserved</p>
</footer>
</body>
</html>
