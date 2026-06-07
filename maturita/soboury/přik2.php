<?php

$input = "osoby.txt";
$outputFile = "dospeli.txt";

$content = file_get_contents($input);
$lines = explode("\n", trim($content));

$result = [];

foreach ($lines as $line) {

    list($jmeno, $vek) = explode(",", $line);

    if ((int)$vek >= 18) {
        $result[] = $jmeno . " " . $vek;
    }
}

file_put_contents($outputFile, implode("\r\n", $result));

echo "Hotovo - dospělí uloženi do souboru.";
?>