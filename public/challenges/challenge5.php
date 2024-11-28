<?php
$message = "";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include($page); // Vulnerable to file inclusion
    if (strpos($page, '../') !== false || strpos($page, 'http') !== false) {
        $message = "<h2 class='success'>Challenge Completed: File Inclusion Exploited!</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Challenge 5: File Inclusion</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container { max-width: 600px; margin: 50px auto; text-align: center; padding: 20px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; }
        .success { color: green; font-weight: bold; }
        .form-group { margin: 15px 0; }
        .form-group input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 10px 20px; border: none; background: #007BFF; color: #fff; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h1>Challenge 5: File Inclusion</h1>
    <form method="GET">
        <div class="form-group">
            <label for="page">Enter Page:</label>
            <input type="text" id="page" name="page" required>
        </div>
        <button type="submit">Include Page</button>
    </form>
    <div class="message">
        <?php if (isset($message)) echo $message; ?>
    </div>
</div>
</body>
</html>
