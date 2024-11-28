<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentesting Challenges</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Additional styling for challenges page */
        .challenge-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .challenge-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .challenge-list {
            list-style-type: none;
            padding: 0;
        }

        .challenge-list li {
            margin: 10px 0;
            text-align: center;
        }

        .challenge-list a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .challenge-list a:hover {
            color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
<div class="challenge-container">
    <h1>Pentesting Challenges</h1>
    <ul class="challenge-list">
        <li><a href="challenges/challenge1.php">Challenge 1: SQL Injection</a></li>
        <li><a href="challenges/challenge2.php">Challenge 2: XSS</a></li>
        <li><a href="challenges/challenge3.php">Challenge 3: CSRF</a></li>
        <li><a href="challenges/challenge4.php">Challenge 4: Directory Traversal</a></li>
        <li><a href="challenges/challenge5.php">Challenge 5: File Inclusion</a></li>
    </ul>
    <div class="footer">
        <p>Complete each challenge to hone your pentesting skills. Logs are being recorded for each attempt.</p>
    </div>
</div>
</body>
</html>
