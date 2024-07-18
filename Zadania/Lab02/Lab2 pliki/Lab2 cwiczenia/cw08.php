<?php

/* Ćwiczenie 8 - Definicja stałych */

// Deklaracja stałych:
define('BOOK', 'PHP8 i SQL');
define('YEAR', 2024);
define('PHP', ['3', '4', '5', '6', '7', '8', '9']);
const DAY = "Monday";
const MONTH = 3;

// Wykorzystanie stałych:
print "Książka: " . BOOK . " (" . YEAR . " rok)\n";
print "Wersja PHP: " . PHP[5];
print PHP_EOL;
print "Dzisiaj jest " . DAY . "-" . MONTH . "-" . YEAR . "\n";
echo "Dzisiaj jest ", DAY, "-", MONTH, "-", YEAR;
