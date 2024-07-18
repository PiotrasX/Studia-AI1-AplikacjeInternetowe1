<?php
// Zad 2.7

$l = 10;
print "Wartość dla 'l': " . $l . PHP_EOL;

function rd(): int
{
    $random = random_int(1, 50);
    return $random;
}

$l = rd();
print "Nowa wartość dla 'l': " . $l;
