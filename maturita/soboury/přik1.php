<?php

$file = "produkty.csv";
$content = file_get_contents($file);

if (trim($content) == "") {
    echo "Soubor je prázdný";
    exit;
}

$lines = explode("\n", trim($content));

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Name</th><th>Type</th><th>Price</th></tr>";

foreach ($lines as $line) {
    $data = explode(";", $line);

    echo "<tr>";
    echo "<td>$data[0]</td>";
    echo "<td>$data[1]</td>";
    echo "<td>$data[2]</td>";
    echo "<td>$data[3]</td>";
    echo "</tr>";
}

echo "</table>";

?>