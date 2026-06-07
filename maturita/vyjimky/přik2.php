<?php

// Vlastní výjimka
class InvalidEmailException extends Exception {
    public function __construct() {
        parent::__construct("Neplatná emailová adresa");
    }
}

// Funkce validace emailu
function validateEmail($email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidEmailException();
    }

    return "Email je platný: " . $email;
}

// Použití
try {
    echo validateEmail("test@example.com") . "<br>"; // OK
    echo validateEmail("spatny-email");             // chyba
} catch (Exception $e) {
    echo "Chyba: " . $e->getMessage();
}

?>