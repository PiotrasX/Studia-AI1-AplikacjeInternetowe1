<?php
// Zad 2.14

require_once __DIR__ . "/../vendor/autoload.php";

use Ramsey\Uuid\Uuid;

class Dog
{
    private string $id;
    private string $nazwa;
    private string $wiek;
    private DateTime $dataPrzyjecia;

    public function __construct(string $nazwa, string $wiek, DateTime $dataPrzyjecia)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->nazwa = $nazwa;
        $this->wiek = $wiek;
        $this->dataPrzyjecia = $dataPrzyjecia;
    }

    public function print()
    {
        print "$this->id: $this->nazwa ($this->wiek l.) przyjęty w dn. " . $this->dataPrzyjecia->format('d-m-Y') . "\n";
    }
}

$psy = [
    new Dog("Burek", 9, new DateTime('10-03-2024')),
    new Dog("Clifford", 9, new DateTime('05-02-2024')),
    new Dog("Azor", 12, new DateTime('15-02-2024 ')),
    new Dog("Szarik", 8, new DateTime('22-02-2024')),
    new Dog("Idefix", 15, new DateTime('26-01-2024'))
];

foreach ($psy as $pies) $pies->print();
