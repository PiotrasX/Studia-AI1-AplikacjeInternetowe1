<?php
// Zad 2.3

$a = 4;
const B = 10;
print "'a' = $a, 'B' = " . B . "\n";

$a = 7;
// const B = 22; - błąd
print "'a' = $a, 'B' = " . B;

// Nie można do 'B' przypisać nowej wartości, ponieważ 'B' jest STAŁĄ, co oznacza, że raz przypisana wartość do stałej zostaje 
// do końca działania programu. W trakcie działania programu nie można przypisać nowej wartości do stałej, ponieważ wygeneruje to błąd.
