<?php
require 'db.php';

$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT); // Securely hash the password

try {
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);
    echo "User created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
