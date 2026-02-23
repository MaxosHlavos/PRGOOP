<?php
require_once "Dog.php";
require_once "Cat.php";


$dog = new Dog("Rex", 4, "Labrador");
$dog->save();

$cat = new Cat("Micka", 2, "Siamská");
$cat->save();


$pets = Pet::all();
?>

<h1>Seznam zvířat</h1>

<?php foreach ($pets as $pet): ?>
    <p>
        <?= $pet->name ?> |
        <?= $pet->age ?> |
        <?= $pet->type ?> |
        <?= $pet->breed ?>
    </p>
<?php endforeach; ?>
