<?php
$host = 'localhost'; // Your database host
$db = 'your_database'; // Your database name
$user = 'your_username'; // Your database username
$pass = 'user_db'; // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
