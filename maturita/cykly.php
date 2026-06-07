<?php
/// Cykly a Pole ///

/// Příklad 1.
/// Vypočítejte součet čísel od 1 do N pomocí cyklu

function soucetDoN($n) {
    $soucet = 0;

    for ($i = 1; $i <= $n; $i++) {
        $soucet += $i;
    }

    return $soucet;
}

echo "Příklad 1: Součet čísel od 1 do 5 je " . soucetDoN(5) . "<br><br>";


/// Příklad 2.
/// Najděte největší číslo v poli pomocí cyklu

function nejvetsiCislo($pole) {
    $max = $pole[0];

    foreach ($pole as $cislo) {
        if ($cislo > $max) {
            $max = $cislo;
        }
    }

    return $max;
}

echo "Příklad 2: Největší číslo je " . nejvetsiCislo([1, 2, 3, 4, 5]) . "<br><br>";


/// Příklad 3.
/// Obrácení řetězce pomocí cyklu

function obratRetezec($text) {
    $vysledek = "";

    for ($i = strlen($text) - 1; $i >= 0; $i--) {
        $vysledek .= $text[$i];
    }

    return $vysledek;
}

echo "Příklad 3: " . obratRetezec("ahoj") . "<br><br>";


/// Příklad 4.
/// Náhrada funkce explode

function mojeExplode($oddelovac, $text) {
    $pole = [];
    $cast = "";

    for ($i = 0; $i < strlen($text); $i++) {

        if ($text[$i] == $oddelovac) {
            $pole[] = $cast;
            $cast = "";
        } else {
            $cast .= $text[$i];
        }
    }

    $pole[] = $cast;

    return $pole;
}

$vysledek = mojeExplode(",", "ahoj,jak,se,mas");

echo "Příklad 4:<br>";
print_r($vysledek);
echo "<br><br>";


/// Příklad 5.
/// Malá násobilka v HTML tabulce

echo "Příklad 5:<br>";

echo "<table border='1' cellpadding='5'>";

for ($i = 1; $i <= 10; $i++) {

    echo "<tr>";

    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}

echo "</table><br><br>";


/// Příklad 6.
/// Výpis dělitelů čísla

function delitele($n) {
    echo "Příklad 6: Číslo $n dělí čísla: ";

    for ($i = 1; $i <= $n; $i++) {

        if ($n % $i == 0) {
            echo $i . " ";
        }
    }

    echo "<br><br>";
}

delitele(12);


/// Příklad 7.
/// Najděte nejmenší číslo a odstraňte ho

function odstranNejmensi($pole) {

    $min = $pole[0];
    $index = 0;

    for ($i = 1; $i < count($pole); $i++) {

        if ($pole[$i] < $min) {
            $min = $pole[$i];
            $index = $i;
        }
    }

    unset($pole[$index]);

    return array_values($pole);
}

echo "Příklad 7:<br>";
print_r(odstranNejmensi([1, 2, 3, 4, 5]));
echo "<br><br>";


/// Příklad 8.
/// Velikost trojrozměrného vektoru

function velikostVektoru($vektor) {

    $x = $vektor[0];
    $y = $vektor[1];
    $z = $vektor[2];

    return sqrt($x * $x + $y * $y + $z * $z);
}

$vektor = [3, 4, 5];

echo "Příklad 8: Velikost vektoru (3, 4, 5) je rovna "
    . round(velikostVektoru($vektor), 3);
?>