<?php

$chyby = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $jmeno = trim($_POST["jmeno"]);
    $email = trim($_POST["email"]);
    $vek = trim($_POST["vek"]);

    // Validace jména
    if (strlen($jmeno) < 3) {
        $chyby[] = "Jméno musí mít alespoň 3 znaky.";
    }

    // Validace emailu
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $chyby[] = "Neplatný email.";
    }

    // Validace věku
    if (!is_numeric($vek) || $vek < 1 || $vek > 120) {
        $chyby[] = "Věk musí být číslo od 1 do 120.";
    }

    // Úspěch
    if (empty($chyby)) {
        echo "<h2>Formulář byl úspěšně odeslán.</h2>";
        echo "Jméno: $jmeno <br>";
        echo "Email: $email <br>";
        echo "Věk: $vek <br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrační formulář</title>
</head>
<body>

<h1>Registrační formulář</h1>

<?php
if (!empty($chyby)) {

    echo "<ul>";

    foreach ($chyby as $chyba) {
        echo "<li>$chyba</li>";
    }

    echo "</ul>";
}
?>

<form method="POST">

    <label>Jméno:</label>
    <input type="text" name="jmeno">
    <br><br>

    <label>Email:</label>
    <input type="text" name="email">
    <br><br>

    <label>Věk:</label>
    <input type="number" name="vek">
    <br><br>

    <input type="submit" value="Odeslat">

</form>

</body>
</html>