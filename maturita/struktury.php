<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $jmeno = trim($_POST["jmeno"]);
    $prijmeni = trim($_POST["prijmeni"]);

    // Validace
    if ($jmeno == "" || $prijmeni == "") {
        echo "Vyplň jméno i příjmení!";
    } else {

        // ochrana proti HTML injection
        $jmeno = htmlspecialchars($jmeno);
        $prijmeni = htmlspecialchars($prijmeni);

        $radek = $jmeno . " " . $prijmeni . "\n";

        file_put_contents("uzivatele.txt", $radek, FILE_APPEND);

        echo "Uživatel uložen.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Uživatelé</title>
</head>
<body>

<h2>Přidat uživatele</h2>

<form method="POST">
    <input type="text" name="jmeno" placeholder="Jméno">
    <br><br>
    <input type="text" name="prijmeni" placeholder="Příjmení">
    <br><br>
    <input type="submit" value="Uložit">
</form>

</body>
</html>