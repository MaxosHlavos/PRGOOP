<?php
class Pet {
    protected string $name;
    protected int $age;
    protected string $type;
    protected string $extra;

    public function __construct(string $name, int $age, string $type, string $extra = '') {
        $this->name = $name;
        $this->age = $age;
        $this->type = $type;
        $this->extra = $extra;
    }

    public function getInfo(): string {
        return "{$this->type} jménem {$this->name}, věk: {$this->age} let, info: {$this->extra}.";
    }

    public function saveToDB(PDO $pdo): void {
        $stmt = $pdo->prepare("INSERT INTO pets (name, age, type, extra) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->name, $this->age, $this->type, $this->extra]);
    }
}
