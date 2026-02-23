<?php

class Classroom {

    public $className;
    public $capacity;
    public $students; // zde ukládáme objekty Student

    public function __construct($className, $capacity) {
        $this->className = $className;
        $this->capacity = $capacity;
        $this->students = []; // výchozí hodnota
    }

    // metoda pro vložení objektu do objektu
    public function addStudent($student) {
        if (count($this->students) < $this->capacity) {
            $this->students[] = $student;
            echo $student->name . " byl přidán do třídy.<br>";
        } else {
            echo "Třída je plná!<br>";
        }
    }

    // metoda navíc
    public function showStudents() {
        echo "<h3>Seznam studentů:</h3>";
        foreach ($this->students as $s) {
            echo $s->name . " - známka: " . $s->grade . "<br>";
        }
    }
}
