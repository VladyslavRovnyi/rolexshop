<?php
session_start();

// Predefined "correct" XSS payload
$correct_payload = '<h1 id=x tabindex=1 onactivate=alert(1)></h1>';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_payload = $_POST['xss_input'];

    // Check if the submitted payload matches the "correct" one
    if ($user_payload === $correct_payload) {
        // If the payload is correct, show a success message
        $_SESSION['message'] = '<h2 style="color: green;">Challenge Completed: XSS attack successful!</h2>';
    } else {
        // If the payload is incorrect, show an error message
        $_SESSION['message'] = '<h2 style="color: red;">Incorrect payload. Try again!</h2>';
    }

    // Reload the page
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Challenge</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        .container { max-width: 600px; margin: 50px auto; text-align: center; padding: 20px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; }
        textarea { width: 100%; height: 100px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 10px 20px; border: none; background: #007BFF; color: #fff; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .message { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>XSS Challenge</h1>
    <p>Enter your XSS payload below. If it is correct, you will pass the challenge.</p>
    <form method="POST">
        <textarea name="xss_input" placeholder="Enter your XSS payload here"></textarea><br>
        <button type="submit">Submit</button>
    </form>

    <div class="message">
        <?php
        // Display the message after form submission
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']); // Clear the message after displaying it
        }
        ?>
    </div>
</div>
</body>
</html>
