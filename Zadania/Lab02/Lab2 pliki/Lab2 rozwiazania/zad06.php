<?php
// Zad 2.6

function ctf(float $c = null): float|null
{
    if ($c === null) 
    {
        print "Nie podano wartości\n";
        return null;
    }
    $fahrenheit = ($c * 9 / 5) + 32;
    return $fahrenheit;
}

$c = readline("Podaj temperature w °C: ");
if ($c != null) 
{
    $f = ctf($c);
    print "$c °C wynosi $f °F\n";
} 
else $f = ctf();
