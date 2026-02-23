<?php
require_once 'Pet.php';

class Cat extends Pet {
    public function __construct(string $name, int $age, string $favoriteToy) {
        parent::__construct($name, $age, "Kočka", $favoriteToy);
    }

    public function play(): string {
        return "{$this->name} si hraje s {$this->extra}.";
    }
}
