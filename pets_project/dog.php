<?php
require_once 'Pet.php';

class Dog extends Pet {
    public function __construct(string $name, int $age, string $breed) {
        parent::__construct($name, $age, "Pes", $breed);
    }

    public function bark(): string {
        return "{$this->name} štěká! Je to {$this->extra}.";
    }
}
