<?php
$dnes = new DateTime();
$rok = $dnes->format("Y");

$vAnoce = new DateTime("$rok-12-24");

if ($dnes > $vAnoce) {
    $vAnoce->modify("+1 year");
}

$rozdil = $dnes->diff($vAnoce);

echo "Do Vánoc zbývá:\n";
echo $rozdil->days . " dní\n";
echo $rozdil->h . " hodin\n";
echo $rozdil->i . " minut\n";
echo $rozdil->s . " sekund\n";
?>