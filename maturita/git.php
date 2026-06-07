<?php
echo "<h2>Verzování a GIT - simulace postupu</h2>";

echo "<pre>";

echo "1. Inicializace repozitáře\n";
echo "git init\n\n";

echo "2. Vytvoření souboru pozdrav.php\n";
echo "<?php\n";
echo "\$jmeno = 'Jirka';\n";
echo "echo 'Ahoj, ' . \$jmeno . '!';\n";
echo "?>\n\n";

echo "3. Přidání souboru do Gitu\n";
echo "git add pozdrav.php\n\n";

echo "4. První commit\n";
echo "git commit -m 'První commit - pozdrav'\n\n";

echo "5. Vytvoření nové větve\n";
echo "git branch rozlouceni\n\n";

echo "6. Přepnutí na větev\n";
echo "git checkout rozlouceni\n\n";

echo "7. Vytvoření souboru rozlouceni.php\n";
echo "<?php\n";
echo "\$jmeno = 'Jirka';\n";
echo "echo 'Sbohem, ' . \$jmeno . '!';\n";
echo "?>\n\n";

echo "8. Přidání změn\n";
echo "git add rozlouceni.php\n\n";

echo "9. Commit ve větvi\n";
echo "git commit -m 'Přidání rozloučení'\n";

echo "</pre>";
?>