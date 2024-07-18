<?php

/* Ćwiczenie 23 - Funkcje i zwracane wartości */

declare(strict_types = 1); // Wymuszenie na interpreterze PHP dokładne sprawdzanie typów argumentów przekazywanych do funkcji

function calcStatsYears(int $start, int $end, ?bool $print = true): int
{
    $days = ($end - $start) * 365;
    $hours = $days * 24;
    $mins = $hours * 60;
    $secs = $mins * 60;

    if ($print === true) 
    {
        print "Od początku roku $start do końca roku $end jest:" . PHP_EOL;
        print "$days dni, $hours godzin, $mins minut i $secs sekund!" . PHP_EOL . PHP_EOL;
    }

    return (int) $secs;
}

$secs1 = calcStatsYears(1901, 2000);
$secs2 = calcStatsYears(1901, 2000, false);
$secs3 = calcStatsYears(end: 2019, start: 2001, print: true);
$secs4 = calcStatsYears(print: true, end: 2021, start: 2020);



$kalkulator = function (string $operacja, float $x, float $y): float|null 
{
    $result = match ($operacja) 
    {
        "+" => $x + $y,
        "-" => $x - $y,
        "*" => $x * $y,
        "/" => myFdiv($x, $y),
        default => null,
    };

    if ($result !== null) printf("%.2f %s %.2f = %.2f" . PHP_EOL, $x, $operacja, $y, $result);
    else printf("Brak działania dla znaku '%s'" . PHP_EOL, $operacja);

    return $result;
};

function myFdiv(float $x, float $y): float
{
    if ($y == 0 && $x > 0) return INF;
    else if ($y == 0 && $x < 0) return -INF;
    else if ($y == 0 && $x == 0) return NAN;
    else return $x / $y;
}

$x = (float) 12;
$y = (float) 8;

$kalkulator("+", $x, $y);
$kalkulator("-", $x, $y);
$kalkulator("*", $x, $y);
$kalkulator("/", $x, $y);
$kalkulator("**", $x, $y);

echo "\n";
$kalkulator("/", -5, 0);
$kalkulator("/", 5, 0);
$kalkulator("/", 0, 0);
