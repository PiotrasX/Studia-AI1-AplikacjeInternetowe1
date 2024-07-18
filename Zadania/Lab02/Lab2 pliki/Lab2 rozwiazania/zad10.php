<?php
// Zad 2.10

$people = [
    "Jan" => 45,
    "Bartosz" => 38,
    "Piotr" => 40
];

print "Elementy tablicy:\n";
foreach ($people as $keys => $values)
    print "$keys ma $values lat\n";
print PHP_EOL;

$liczba = count($people);
print "Liczba osób na liście: $liczba\n" . PHP_EOL;

foreach ($people as $keys => $values) 
{
    if ($keys == "Bartosz")
        print "Wiek pana $keys to $values lat\n" . PHP_EOL;
}

$people["Witold"] = 28;
unset($people["Piotr"]);

arsort($people);
print_r($people);
