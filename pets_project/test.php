<?php
require_once 'db.php';
require_once 'Cat.php';
require_once 'Dog.php';


$cat = new Cat("Micka", 3, "míček");
$dog = new Dog("Rex", 5, "Německý ovčák");


$cat->saveToDB($pdo);
$dog->saveToDB($pdo);


echo $cat->getInfo() . "<br>";
echo $cat->play() . "<br>";
echo $dog->getInfo() . "<br>";
echo $dog->bark() . "<br>";


$stmt = $pdo->query("SELECT * FROM pets");
$pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<hr>Všichni mazlíčci z DB:<br>";
foreach ($pets as $p) {
    echo "{$p['type']} {$p['name']}, věk: {$p['age']}, info: {$p['extra']}<br>";
}
