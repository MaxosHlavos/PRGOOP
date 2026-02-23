<?php
$host = 'localhost';
$dbname = 'pets_db';
$user = 'root';      // výchozí XAMPP uživatel
$pass = '';          // výchozí prázdné heslo

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Chyba připojení k DB: " . $e->getMessage());
}
