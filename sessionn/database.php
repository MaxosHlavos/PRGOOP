<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
  $DB = new PDO(
    "mysql:host=$servername;dbname=$dbname;charset=utf8mb4",
    $username,
    $password
  );

  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>