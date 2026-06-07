<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Webový design - řešení</title>

    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }

        /* FORMULÁŘ */
        .form-box {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }

        /* LAYOUT */
        header {
            background: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background: #f2f2f2;
            padding: 10px;
        }

        nav a {
            text-decoration: none;
            color: black;
            padding: 8px 15px;
        }

        nav a:hover {
            background: #ddd;
        }

        .container {
            display: flex;
            margin-top: 20px;
        }

        .img {
            width: 30%;
            background: #ccc;
            padding: 20px;
        }

        .text {
            width: 70%;
            padding: 20px;
        }

        footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }

        /* DETAILS */
        details {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
        }

        summary {
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>

<header>
    <h1>Webové cvičení</h1>
</header>

<nav>
    <a href="#">Domů</a>
    <a href="#">O nás</a>
    <a href="#">Kontakt</a>
</nav>

<!-- PŘÍKLAD 1 -->
<div class="form-box">
    <h3>Formulář</h3>

    <form method="POST">
        <input type="text" name="jmeno" placeholder="Jméno">
        <input type="email" name="email" placeholder="E-mail">
        <button type="submit">Odeslat</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>Jméno: " . $_POST["jmeno"] . "</p>";
        echo "<p>Email: " . $_POST["email"] . "</p>";
    }
    ?>
</div>

<!-- PŘÍKLAD 2 -->
<div class="container">
    <div class="img">
        Obrázek (30%)
    </div>

    <div class="text">
        <h2>Hlavní obsah</h2>
        <p>Toto je ukázkový text v 70% části layoutu.</p>
    </div>
</div>

<!-- PŘÍKLAD 3 -->
<h2>Literatura</h2>

<details>
    <summary>Romeo a Julie</summary>
    <ul>
        <li>Autor: William Shakespeare</li>
        <li>Žánr: Drama</li>
        <li>Rok: 1597</li>
        <li>Postavy: Romeo, Julie</li>
        <li>Témata: Láska, nenávist, osud</li>
        <li>Citát: "Láska je jako víno..."</li>
    </ul>
    <p>
        Romeo a Julie je tragédie o dvou milencích...
    </p>
</details>

<details>
    <summary>Harry Potter</summary>
    <ul>
        <li>Autor: J.K. Rowling</li>
        <li>Žánr: Fantasy</li>
        <li>Rok: 1997</li>
    </ul>
    <p>
        Příběh o mladém kouzelníkovi...
    </p>
</details>

<footer>
    © 2026 Webový design
</footer>

</body>
</html>