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

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        loginUser($user);
        header("Location: index.php");
        exit;
    } else {
        echo "Špatné přihlašovací údaje";
    }
}


if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}