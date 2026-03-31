<?php
echo "Zadej datum narození (YYYY-MM-DD): ";
$narozeni_input = trim(fgets(STDIN));

$narozeni = new DateTime($narozeni_input);
$dnes = new DateTime();

$rozdil = $dnes->diff($narozeni);

echo "Věk: " . $rozdil->y . " let\n";
?>