<?php
// Database connection settings
define('CHALLENGES_DB_HOST', 'localhost');
define('CHALLENGES_DB_NAME', 'challenges_db');
define('CHALLENGES_DB_USER', 'root');
define('CHALLENGES_DB_PASS', 'root');

try {
    // Simple PDO connection without additional security settings
    $conn_challenges = new PDO(
        "mysql:host=" . CHALLENGES_DB_HOST . ";dbname=" . CHALLENGES_DB_NAME,
        CHALLENGES_DB_USER,
        CHALLENGES_DB_PASS
    );
} catch (PDOException $e) {
    // Output error details directly (not recommended for production)
    die("Database connection failed: " . $e->getMessage());
}
?>
