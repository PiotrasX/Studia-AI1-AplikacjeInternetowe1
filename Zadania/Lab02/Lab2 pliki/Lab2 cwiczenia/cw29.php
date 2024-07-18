<?php

/* Ćwiczenie 29 - Programowanie zorientowane obiektowo */

class Person // Definicja klasy.
{
    private $name; // Właściwość klasy.

    public function setName(string $name) // Metoda klasy.
    {
        $this->name = $name; // Przypisanie wartości do właściwości klasy.
    }

    public function getName(): string // Metoda klasy.
    {
        return $this->name; // Pobranie wartości z właściwości klasy.
    }
}

$contact = new Person(); // Tworzenie nowego obiektu na podstawie klasy.
$contact->setName(name: "Robert"); // Wywołanie metody klasy.
print $contact->getName(); // Wydrukowanie wartości właściwości klasy.
print PHP_EOL;



// Konstruktor.

class Kwadrat
{
    private $pole;
    private $obwod;

    public function __construct(int|float $bok)
    {
        $this->pole = $bok * $bok;
        $this->obwod = 4 * $bok;
    }

    public function pole(): int|float
    {
        return $this->pole;
    }

    public function obwod(): int|float
    {
        return $this->obwod;
    }
}

$bok = 12.5;
$kwadrat = new Kwadrat($bok);
$pole = $kwadrat->pole();
$obwod = $kwadrat->obwod();
printf("Pole kwadratu o boku %.2f wynosi %.2f" . PHP_EOL, $bok, $pole);
printf("Obwód kwadratu o boku %.2f wynosi %.2f" . PHP_EOL, $bok, $obwod);
print PHP_EOL;



// Dostęp do właściwości i metod klasy, enkapsulacja danych.

class Produkt
{
    private $netto;   // Właściwość dostępna lokalnie.
    public $vat = 23; // Właściwość dostępna publicznie.

    public function __construct(private string $nazwa, private int|float $brutto)
    {
        // PHP 8 automatycznie utworzy i zdefiniuke właściwości.
        // $this->nazwa = $nazwa;
        // $this->brutto = $brutto;

        $this->netto = $this->setNetto(); // Wywołanie metody lokalnej.
    }

    private function setNetto(): int|float // Metoda dostępna lokalnie.
    {
        return $this->brutto / (1 + ($this->vat / 100));
    }

    public function drukuj() // Metoda dostępna publicznie.
    {
        printf("Produkt: %s\nCena netto: %.2f PLN\nPodatek: %.2f%%\nCena brutto: %.2f PLN\n", $this->nazwa, $this->netto, $this->vat, $this->brutto);
    }
}

// Tworzenie egzemplarza klasy.
$owoc = new Produkt("Gruszka", 4.85);
print $owoc->drukuj();
