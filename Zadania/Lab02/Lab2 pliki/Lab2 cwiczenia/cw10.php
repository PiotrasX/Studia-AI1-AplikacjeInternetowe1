<?php

/* Ćwiczenie 10 - Ćwiczenia dodatkowe */

const IMIE = "Piotr";
const NAZWISKO = "Rojek";
define('PESEL', '01234567890');

$ulica_numer_domu = '3 Maja, 315';
$kod_pocztowy = "39-100";
$miejscowosc = "Ropczyce";

echo "Jestem ", IMIE . " " . NAZWISKO, ", mój PESEL: ", PESEL, PHP_EOL;
echo "Moje miejsce zamieszkania:\n";
echo "\tUlica i numer domu: " . $ulica_numer_domu . PHP_EOL, "\tKod pocztowy: " . $kod_pocztowy . PHP_EOL, "\tMiejscowość: " . $miejscowosc . PHP_EOL;
