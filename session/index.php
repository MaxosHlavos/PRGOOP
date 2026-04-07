<?php
session_start();
include_once("database.php");
?>

<h1>🍪 Sušenky a Session</h1>

<?php if(isset($_SESSION["logged_user"])): ?>
    <p>Přihlášen: <?= $_SESSION["logged_user"] ?></p>
    <a href="login.php?logout=true">Odhlásit</a>
<?php endif; ?>

<h2>Login</h2>
<form action="login.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="LOGIN">
</form>

<h2>Register</h2>
<form action="register.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="REGISTER">
</form>