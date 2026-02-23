<?php
require_once "Pet.php";

class Dog extends Pet {

    public function __construct($name, $age, $breed, $id = null) {
        parent::__construct($name, $age, "dog", $breed, $id);
    }
}
