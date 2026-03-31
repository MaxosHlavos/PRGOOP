<?php
echo "Zadej datum (MM-DD): ";
$input = trim(fgets(STDIN));

$dnes = new DateTime();
$rok = $dnes->format("Y");

$udalost = new DateTime("$rok-$input");

if ($dnes > $udalost) {
    $udalost->modify("+1 year");
}

$rozdil = $dnes->diff($udalost);

echo "Zbývá: ";
echo $rozdil->days . " dní, ";
echo $rozdil->h . " hodin\n";
?>