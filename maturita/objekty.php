<?php

/// =======================
/// PŘÍKLAD 1 - Film
/// =======================

class Film {
    private $nazev;
    private $rok;
    private $hodnoceni;

    function __construct($nazev, $rok, $hodnoceni) {
        $this->nazev = $nazev;
        $this->rok = $rok;
        $this->hodnoceni = $hodnoceni;
    }

    public function zmenitHodnoceni($novaHodnota) {
        $this->hodnoceni = $novaHodnota;
    }

    public function vypsatInfo() {
        echo "Film: $this->nazev <br>";
        echo "Rok: $this->rok <br>";
        echo "Hodnocení: $this->hodnoceni <br><br>";
    }
}

$f = new Film("Interstellar", 2014, 9);
$f->vypsatInfo();


/// =======================
/// PŘÍKLAD 2 - Student
/// =======================

class Student {
    private $jmeno;
    private $prijmeni;
    private $znamky = [];

    function __construct($jmeno, $prijmeni) {
        $this->jmeno = $jmeno;
        $this->prijmeni = $prijmeni;
    }

    public function pridatZnamku($znamka) {
        $this->znamky[] = $znamka;
    }

    public function vypocitatPrumer() {
        if (count($this->znamky) == 0) return 0;

        return array_sum($this->znamky) / count($this->znamky);
    }
}

$s = new Student("Jan", "Novák");
$s->pridatZnamku(1);
$s->pridatZnamku(2);
$s->pridatZnamku(3);

echo "Průměr: " . $s->vypocitatPrumer() . "<br><br>";


/// =======================
/// PŘÍKLAD 3 - Obdélník
/// =======================

class Obdelnik {
    private $sirka;
    private $vyska;

    function __construct($sirka, $vyska) {
        $this->sirka = $sirka;
        $this->vyska = $vyska;
    }

    public function vypocitatObsah() {
        return $this->sirka * $this->vyska;
    }

    public function vypocitatObvod() {
        return 2 * ($this->sirka + $this->vyska);
    }
}

$o = new Obdelnik(5, 10);

echo "Obsah: " . $o->vypocitatObsah() . "<br>";
echo "Obvod: " . $o->vypocitatObvod() . "<br><br>";


/// =======================
/// PŘÍKLAD 4 - Kalkulačka (static)
/// =======================

class Kalkulacka {
    public static function secti($a, $b) {
        return $a + $b;
    }

    public static function odecti($a, $b) {
        return $a - $b;
    }
}

echo Kalkulacka::secti(5, 3) . "<br>";
echo Kalkulacka::odecti(10, 4) . "<br><br>";


/// =======================
/// PŘÍKLAD 5 - Ukol
/// =======================

class Ukol {
    private $datum;
    private $popis;
    private $vyreseno = false;

    function __construct($datum, $popis) {
        $this->datum = new DateTime($datum);
        $this->popis = $popis;
    }

    public function kolikCasuZbyva() {
        $dnes = new DateTime();
        return $dnes->diff($this->datum)->days;
    }

    public function vypisStatus() {
        if ($this->vyreseno) {
            echo "Vyřešeno - $this->popis <br>";
        } else {
            echo "Zbývá " . $this->kolikCasuZbyva() . " dní - $this->popis <br>";
        }
    }

    public function vratDatumUdalosti() {
        return $this->datum->format("Y-m-d");
    }

    public function nastavitDatum($d, $m, $r) {
        $this->datum = new DateTime("$r-$m-$d");
    }

    public function nastavitVyreseno() {
        $this->vyreseno = true;
    }
}


/// =======================
/// PŘÍKLAD 6 - Ukolovnik
/// =======================

class Ukolovnik {
    private $ukoly = [];

    public function pridatUkol($ukol) {
        $this->ukoly[] = $ukol;
    }

    public function odstranitUkol($index) {
        unset($this->ukoly[$index]);
        $this->ukoly = array_values($this->ukoly);
    }

    public function vypsatUkoly($vyresene) {
        foreach ($this->ukoly as $ukol) {
            if ($vyresene && !$ukol->vyreseno) continue;
            if (!$vyresene && $ukol->vyreseno) continue;

            $ukol->vypisStatus();
        }
    }
}


/// =======================
/// PŘÍKLAD 7 - Dědičnost
/// =======================

class Zamestnanec {
    protected $jmeno;
    protected $prijmeni;
    protected $plat;

    function __construct($jmeno, $prijmeni, $plat) {
        $this->jmeno = $jmeno;
        $this->prijmeni = $prijmeni;
        $this->plat = $plat;
    }

    public function vypisInfo() {
        echo "$this->jmeno $this->prijmeni - $this->plat Kč<br>";
    }
}

class Manazer extends Zamestnanec {
    private $oddeleni;

    function __construct($jmeno, $prijmeni, $plat, $oddeleni) {
        parent::__construct($jmeno, $prijmeni, $plat);
        $this->oddeleni = $oddeleni;
    }

    public function vypisInfo() {
        echo "$this->jmeno $this->prijmeni - $this->plat Kč - $this->oddeleni<br>";
    }
}

$m = new Manazer("Petr", "Svoboda", 50000, "IT");
$m->vypisInfo();

?>