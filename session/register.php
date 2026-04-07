<?php
include_once("database.php");
session_start();

function loginUser($user) {
    $_SESSION["logged_user"] = $user["username"];
    $_SESSION["logged_user_id"] = $user["id"];
}

if (isset($_POST["username"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $stmt = $DB->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        echo "Uživatel už existuje!";
    } else {

        
        $hash = password_hash($password, PASSWORD_DEFAULT);

        
        $stmt = $DB->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hash]);

        
        $stmt = $DB->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

       
        loginUser($user);

        header("Location: index.php");
        exit;
    }
}