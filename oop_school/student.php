<?php

class Student {

    public $name;
    public $age;
    public $grade;

    public function __construct($name, $age, $grade) {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    // metoda navíc
    public function study() {
        echo $this->name . " se učí.<br>";
        $this->grade--;
        if ($this->grade < 1) {
            $this->grade = 1;
        }
    }
}
