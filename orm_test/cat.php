<?php
require_once "Pet.php";

class Cat extends Pet {

    public function __construct($name, $age, $breed, $id = null) {
        parent::__construct($name, $age, "cat", $breed, $id);
    }
}
