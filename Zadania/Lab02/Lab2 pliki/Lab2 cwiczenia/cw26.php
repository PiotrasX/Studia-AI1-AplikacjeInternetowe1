<?php

/* Ćwiczenie 26 - Wymiary tablic */

// Pętla foreach

$tablica1 = [
    'Imię' => "Tadeusz",
    'Nazwisko' => "Wrona"
];

foreach ($tablica1 as $klucz => $wartosc) 
{
    // Instrukcje do wykonania na każdym elemencie tablicy
    print $klucz . ": " . $wartosc . "\n";
}
print "\n";



// Tablice dwuwymiarowe

$tablica2 = [   // Tablica dwuwymiarowa
    "klucz_1" => [   // Tablica jednowymiarowa
        "klucz_1a" => "wartosc_1a",
        "klucz_1b" => "wartosc_1b",
        "klucz_1c" => "wartosc_1c"
    ],
    "klucz_2" => [   // Tablica jednowymiarowa
        "klucz_2a" => "wartosc_2a",
        "klucz_2b" => "wartosc_2b",
        "klucz_2c" => "wartosc_2c"
    ],
    "klucz_3" => [   // Tablica jednowymiarowa
        "klucz_3a" => "wartosc_3a",
        "klucz_3b" => "wartosc_3b",
        "klucz_3c" => "wartosc_3c"
    ]
];

$tablica3 = [   // Tablica dwuwymiarowa
    ["wartosc_1a", "wartosc_1b", "wartosc_1c"],   // Tablica jednowymiarowa
    ["wartosc_2a", "wartosc_2b", "wartosc_2c"],   // Tablica jednowymiarowa
    ["wartosc_3a", "wartosc_3b", "wartosc_3c"]    // Tablica jednowymiarowa
]; // Deklaracja dwuwymiarowej tablicy, gdzie klucze nadawane są automatycznie od zera

print_r($tablica3);
print "\n";

for ($i = 0; $i < count($tablica3); $i++) 
{
    for ($j = 0; $j < count($tablica3[$i]); $j++) 
    {
        print $tablica3[$i][$j] . "\t";
    }
    print "\n";
}
print "\n";

foreach ($tablica3 as $wiersz) 
{
    foreach ($wiersz as $element) 
    {
        print $element . "\t";
    }
    print "\n";
}
print "\n\n\n";



// Obliczenia na tablicach

// array_column - Wyodrębnia daną kolumnę do osobnej tabeli
// array_sum - Sumuje elementy w tablicy

$klasa_1a = [   // Tablica dwuwymiarowa
    ["Imię" => "Adam", "Ocena" => 4.5],
    ["Imię" => "Marek", "Ocena" => 5],
    ["Imię" => "Jola", "Ocena" => 5],
    ["Imię" => "Robert", "Ocena" => 4],
    ["Imię" => "Kasia", "Ocena" => 4]
];
$klasa_1b = [   // Tablica dwuwymiarowa
    ["Imię" => "Robert", "Ocena" => 5],
    ["Imię" => "Kasia", "Ocena" => 4],
    ["Imię" => "Jola", "Ocena" => 3.5],
    ["Imię" => "Magda", "Ocena" => 4],
    ["Imię" => "Rafał", "Ocena" => 5]
];
$klasy = [   // Tablica trójwymiarowa
    '1a' => $klasa_1a,
    '1b' => $klasa_1b
];

foreach ($klasy as $klucz_klasa => $klasa) 
{
    print "Klasa: " . $klucz_klasa . "\n" . "-------------\n" . "Imię\tOcena\n" . "-------------\n";
    foreach ($klasa as $uczen) 
    {
        foreach ($uczen as $dane) 
        {
            print $dane . "\t";
        }
        print "\n";
    }

    print "-------------\n";
    $oceny = array_column($klasa, "Ocena");
    $srednia = array_sum($oceny) / count($oceny);
    print "Średnia ocen: " . $srednia . "\n";
    print "\n";
}

// array_merge - Łączy tabele w jedną
// array_unique - Usuwa powtarzające się elementy

$imiona = [];
$wszystkie_klasy = array_merge($klasa_1a, $klasa_1b);
$imiona = array_column($wszystkie_klasy, "Imię");
$imiona = array_unique($imiona);
sort($imiona);

print "Dzieci w klasach mają następujące imiona:\n";
foreach ($imiona as $imie) print $imie . ", ";
