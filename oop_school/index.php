<?php

include 'student.php';
include 'classroom.php';

// vytvoření třídy
$classroom = new Classroom("3.A", 3);

// vytvoření studentů
$s1 = new Student("Jan", 17, 3);
$s2 = new Student("Petra", 18, 2);
$s3 = new Student("Karel", 17, 4);

// scénář: studenti se učí
$s1->study();
$s3->study();

// nastupují do třídy
$classroom->addStudent($s1);
$classroom->addStudent($s2);
$classroom->addStudent($s3);

// výpis
$classroom->showStudents();

?>
