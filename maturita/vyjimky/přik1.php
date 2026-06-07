<?php

// Vlastní výjimka
class DivisionByZeroException extends Exception {
    public function __construct() {
        parent::__construct("Dělení nulou není povoleno");
    }
}

// Funkce pro dělení
function deleni($a, $b) {

    if ($b == 0) {
        throw new DivisionByZeroException();
    }

    return $a / $b;
}

// Použití
try {
    echo deleni(10, 2) . "<br>";  // OK
    echo deleni(10, 0);           // chyba
} catch (Exception $e) {
    echo "Chyba: " . $e->getMessage();
}
?>