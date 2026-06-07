-- Vytvoření databáze
CREATE DATABASE skola;
USE skola;

-- Tabulka studentů
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    age INT
);

-- Tabulka známek
CREATE TABLE grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    subject VARCHAR(100),
    grade INT,

    FOREIGN KEY (student_id) REFERENCES students(id)
);

-- Testovací data
INSERT INTO students (name, surname, age) VALUES
('Jan', 'Novák', 18),
('Petr', 'Svoboda', 17),
('Anna', 'Novotná', 18);

INSERT INTO grades (student_id, subject, grade) VALUES
(1, 'Matematika', 1),
(1, 'Čeština', 2),
(1, 'Angličtina', 3),

(2, 'Matematika', 4),
(2, 'Čeština', 2),

(3, 'Matematika', 1),
(3, 'Angličtina', 1);