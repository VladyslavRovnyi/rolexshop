<?php
$message = "";
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $content = @file_get_contents("../uploads/$file"); // Vulnerable to directory traversal
    if ($content) {
        $message = nl2br(htmlspecialchars($content));
        if (strpos($file, '../') !== false) {
            $message .= "<h2 class='success'>Challenge Completed: Directory Traversal Exploited!</h2>";
        }
    } else {
        $message = "File not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Challenge 4: Directory Traversal</title>
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
    <h1>Challenge 4: Directory Traversal</h1>
    <form method="GET">
        <div class="form-group">
            <label for="file">Enter File Name:</label>
            <input type="text" id="file" name="file" required>
        </div>
        <button type="submit">View File</button>
    </form>
    <div class="message">
        <?php if (isset($message)) echo $message; ?>
    </div>
</div>
</body>
</html>
