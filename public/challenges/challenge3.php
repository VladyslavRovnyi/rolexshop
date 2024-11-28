<?php
session_start();

// Simulate a logged-in user with an email address
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = 'user@example.com';
}

// Simulate a CSRF token stored in the session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16)); // Random token
}

// Handle email update request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the CSRF token (broken implementation)
    $client_token = $_POST['csrf_token'] ?? '';
    if ($client_token !== $_SESSION['csrf_token']) {
        echo "<h2 style='color: red;'>Invalid CSRF token! Request denied.</h2>";
        exit;
    }

    // Validate Content-Type header
    if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
        echo "<h2 style='color: red;'>Invalid Content-Type! Request denied.</h2>";
        exit;
    }

    // Parse the JSON body
    $raw_data = file_get_contents('php://input');
    $data = json_decode($raw_data, true);

    if (isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email'] = $data['email'];
        echo "<h2 style='color: green;'>Challenge Completed: Email updated successfully to {$_SESSION['email']}!</h2>";
    } else {
        echo "<h2 style='color: red;'>Invalid email address! Request denied.</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF Challenge</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .container { max-width: 600px; margin: 50px auto; text-align: center; padding: 20px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; }
        .email { margin: 20px 0; font-size: 18px; color: #444; }
        .form-group input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 10px 20px; border: none; background: #007BFF; color: #fff; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h1>CSRF Challenge</h1>
    <p>Your current email: <strong><?php echo $_SESSION['email']; ?></strong></p>
    <p>Try to change the email by exploiting the CSRF vulnerability!</p>
    <p><strong>CSRF Token:</strong> <?php echo $_SESSION['csrf_token']; ?></p>

    <!-- Hidden form to simulate the POST request -->
    <form id="csrf-form" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    </form>
</div>
</body>
</html>
