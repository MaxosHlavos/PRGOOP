<?php
require_once "Database.php";

class Pet {
    protected $id;
    protected $name;
    protected $age;
    protected $type;
    protected $breed;

    public function __construct($name, $age, $type, $breed, $id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->type = $type;
        $this->breed = $breed;
    }

    public function save() {
        $pdo = Database::getInstance()->getConnection();

        $sql = "INSERT INTO pets (name, age, type, breed)
                VALUES (:name, :age, :type, :breed)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "name" => $this->name,
            "age" => $this->age,
            "type" => $this->type,
            "breed" => $this->breed
        ]);
    }

        public static function all() {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->query("SELECT * FROM pets");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pets = [];

        foreach ($rows as $row) {
            $pets[] = new Pet(
                $row["name"],
                $row["age"],
                $row["type"],
                $row["breed"],
                $row["id"]
            );
        }

        return $pets;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getAge() { return $this->age; }
    public function getType() { return $this->type; }
    public function getBreed() { return $this->breed; }
}






