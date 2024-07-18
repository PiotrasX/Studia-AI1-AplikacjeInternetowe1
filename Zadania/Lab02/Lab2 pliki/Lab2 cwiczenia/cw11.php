<?php

/* Ćwiczenie 11 - Drukowanie łańcuchów */

print "Lubię programować!" . PHP_EOL;
echo "Lubię programować!" . PHP_EOL;

$moj_tekst = "PHP";

print "Ten tekst zawiera wiele linii,
które wyświetlane są jedna pod drugą.
Możesz umieszczać wewnątrz tekstu zmienne $moj_tekst." . PHP_EOL;
echo "Przykład umieszczenia \"cudzysłowu\" w tekście." . PHP_EOL . PHP_EOL;

print "To " . "jest " . "przykładowy " . "tekst " . "w " . "języku " . $moj_tekst . "." . PHP_EOL;
echo "To " . "jest " . "przykładowy " . "tekst " . "w " . "języku " . $moj_tekst . "." . PHP_EOL;
echo "To ", "jest ", "przykładowy ", "tekst ", "w ", "języku ", $moj_tekst, ".", PHP_EOL;
echo "To ", "jest ", "przykładowy ", "tekst " . "w " . "języku ", $moj_tekst . "." . PHP_EOL;
