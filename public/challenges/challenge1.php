<?php
include '../../src/challenges_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable SQL query
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $stmt = $conn_challenges->query($query);
    $result = $stmt->fetchAll();

    if ($result) {
        echo "<h2>Challenge Completed: You successfully logged in!</h2>";
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Challenge 1: SQL Injection</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        .container { max-width: 600px; margin: 50px auto; text-align: center; padding: 20px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; }
        .form-group { margin: 15px 0; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; }
        button { padding: 10px 20px; border: none; background: #007BFF; color: #fff; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h1>Challenge 1: SQL Injection</h1>
    <form method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
