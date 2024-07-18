<?php
// Zad 2.12

setlocale(LC_TIME, 'pl_PL');
date_default_timezone_set("Europe/Warsaw");

print "Aktualna data: " . date("l, d-m-Y") . PHP_EOL;

print "Aktualna data i godzina: " . date("Y-F-d H:i") . PHP_EOL;

$teraz = new DateTime();
$teraz->setTime(0, 0);
$dataPorownawcza = new DateTime('2024-03-12');
$roznica = $teraz->diff($dataPorownawcza);
print "Liczba dni pomiędzy dniem dzisiejszym a 12 marca 2021 roku: $roznica->days" . PHP_EOL;

$teraz = new DateTime();
$czasPoranny = new DateTime();
$czasPoranny->setTime(7, 0);
$roznicaCzasu = $teraz->diff($czasPoranny);
$roznicaGodzin = (int) $roznicaCzasu->format('%h');
$roznicaMinut = (int) $roznicaCzasu->format('%i');
print "Różnica pomiędzy aktualną godziną a godziną 7:00 dnia dzisiejszego wynosi $roznicaGodzin godzin i $roznicaMinut minut" . PHP_EOL;

$teraz = new DateTime();
$wczesniejsza = new DateTime('2023-04-01');
print "Która data jest wcześniejsza: ";
if ($teraz < $wczesniejsza) print "data dzisiejsza" . PHP_EOL;
else print "1 kwietnia 2023";
