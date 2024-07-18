<?php

/* Ćwiczenie 30 - Dziedziczenie i kompozycja */

// Dziedziczenie - Możliwość wielokrotnego wykorzystania kodu w klasach potomnych.
// Dziedziczenie jest związkiem typu "jest".
// Przykładem dziedziczenia jest klasa Pies i klasa Kot, które dziedziczą po klasie Ssak.

class Ssak
{
    private $kolorOczu;

    public function setKolorOczu(string $kolor)
    {
        $this->kolorOczu = $kolor;
    }

    public function getKolorOczu(): string
    {
        return $this->kolorOczu;
    }
}

class Pies extends Ssak // Definicja klasy z dziedziczeniem.
{
    private $rasa;

    public function setRasa(string $rasa)
    {
        $this->rasa = $rasa;
    }

    public function getRasa(): string
    {
        return $this->rasa;
    }
}

$pies = new Pies();
$pies->setRasa("Szpic pomorski");
$pies->setKolorOczu(kolor: "Brązowe");

print "Mój pies:\n";
print "Rasa: " . $pies->getRasa() . PHP_EOL;
print "Kolor oczu: " . $pies->getKolorOczu() . PHP_EOL;
print PHP_EOL;



// Kompozycja - Możliwość budowania obiektów z pewnej liczby innych obiektów.
// Kompozycja jest związkiem typu "zawiera" / "ma".
// Przykładem kompozycji jest klasa Samochód, która składa się z innych klas, np.: klasa Koło, klasa Silnik, klasa Szyba.

class Silnik
{
    private $moc;
    private $moment;
    private $paliwo;

    public function setMoc(int|float $moc)
    {
        $this->moc = $moc;
    }
    public function getMoc(): int|float
    {
        return $this->moc;
    }
    public function setMoment(int|float $moment)
    {
        $this->moment = $moment;
    }
    public function getMoment(): int|float
    {
        return $this->moment;
    }
    public function setPaliwo(string $paliwo)
    {
        $this->paliwo = $paliwo;
    }
    public function getPaliwo(): string
    {
        return $this->paliwo;
    }
}

class Auto
{
    private $silnik;

    public function __construct(private string $marka, private string $model, int|float $moc, int|float $moment, string $paliwo)
    {
        $this->silnik = new Silnik(); // Tworzenie egzemplarza klasy wewnątrz innej klasy.
        $this->silnik->setMoc($moc);
        $this->silnik->setMoment($moment);
        $this->silnik->setPaliwo($paliwo);
    }

    public function print()
    {
        print "Parametry samochodu:\n";
        print "Marka: " . $this->marka . PHP_EOL;
        print "Model: " . $this->model . PHP_EOL;
        print "Moc: " . $this->silnik->getMoc() . " KM" . PHP_EOL;
        print "Moment: " . $this->silnik->getMoment() . " cm^3" . PHP_EOL;
        print "Paliwo: " . $this->silnik->getPaliwo() . PHP_EOL;
    }
}

$auto = new Auto("Syrena", "S-31", 45, 1.97, "Benzyna");
$auto->print();
