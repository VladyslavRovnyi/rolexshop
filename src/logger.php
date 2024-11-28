<?php
function logActivity($message) {
    $logFile = '../logs/security.log';
    $time = date('Y-m-d H:i:s');
    $entry = "[$time] $message\n";
    file_put_contents($logFile, $entry, FILE_APPEND);
}

// Example usage
logActivity("Accessed challenge page: " . $_SERVER['REQUEST_URI']);
?>
