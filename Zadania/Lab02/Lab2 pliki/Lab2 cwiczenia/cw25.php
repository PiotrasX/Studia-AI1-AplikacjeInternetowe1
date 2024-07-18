<?php

/* Ćwiczenie 25 - Tablice i klucze */

// Deklaracja tablicy w PHP

$array1 = [
    "klucz1" => "wartosc1",
    "klucz2" => "wartosc2",
    "klucz3" => "wartosc3"
];

$array2 = [];
$array2["klucz1"] = "wartosc1";
$array2["klucz2"] = "wartosc2";
$array2["klucz3"] = "wartosc3";

$array3 = ["wartosc1", "wartosc2", "wartosc3"]; // Tutaj klucze są nadawane automatycznie począwszy od zera
$array4 = array("wartosc1", "wartosc2", "wartosc3"); // Tutaj klucze również nadawane są automatycznie począwszy od zera



// array_push - Dodaje element na końcu tablicy
// array_pop - Pobiera i usuwa ostatni element z tablicy
// print_r - Drukuje na konsoli elementy tablicy
// count - Zwraca ilość elementów w tablicy

$owoce = ["jabłko", "banan"];
print_r($owoce);
print PHP_EOL;

array_push($owoce, "arbuz");
array_push($owoce, "gruszka");
print_r($owoce);
print PHP_EOL;

$owoc = array_pop($owoce);
printf("Wybrany owoc: %s\n", $owoc);
print_r($owoce);

$liczba = count($owoce);
printf("Liczba elementów w tablicy: %s\n", $liczba);



// sort - Sortowanie elementów w tablicy
// rsort - Odwrotne sortowanie elementów w tablicy
// asort - Sortowanie elementów w tablicy Z ZACHOWANYMI KLUCZAMI

print "\n\n\n";
$owoce = ["jabłko", "banan", "arbuz"];
$owoce[] = "gruszka"; // Alternatywa dla array_push
print "Przed sortowaniem:" . PHP_EOL;
print_r($owoce);
print PHP_EOL;

sort($owoce);
print "Po sortowaniu:" . PHP_EOL;
print_r($owoce);
print PHP_EOL;

rsort($owoce);
print "Po odwrotnym sortowaniu:" . PHP_EOL;
print_r($owoce);
print PHP_EOL;

$owoce = ["jabłko", "banan", "arbuz", "gruszka"];
print "Przed sortowaniem:" . PHP_EOL;
print_r($owoce);
print PHP_EOL;

asort($owoce);
print "Po sortowaniu z zachowaniem kluczy:" . PHP_EOL;
print_r($owoce);



// ksort - Sortowanie elementów w tablicy według kluczy
// krsort - Odwrotne sortowanie elementów w tablicy według kluczy

print "\n\n\n";
$owoce = [
    "b" => "jabłko",
    "c" => "banan",
    "d" => "arbuz",
    "a" => "gruszka"
];
print "Przed sortowaniem:" . PHP_EOL;
print_r($owoce);
print PHP_EOL;

ksort($owoce);
print "Po sortowaniu według kluczy:" . PHP_EOL;
print_r($owoce);
print PHP_EOL;

krsort($owoce);
print "Po odwrotnym sortowaniu według kluczy:" . PHP_EOL;
print_r($owoce);
