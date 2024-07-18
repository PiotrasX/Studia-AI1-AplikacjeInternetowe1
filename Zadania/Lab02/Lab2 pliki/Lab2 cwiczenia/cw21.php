<?php

/* Ćwiczenie 21 - Operacje na liczbach */

//   +        dodawanie                       $a + $b
//   -        odejmowanie                     $a - $b
//   *        mnożenie                        $a * $b
//   /        dzielenie                       $a / $b
//   %        modulo (reszta z dzielenia)     $a % $b
//   **       potęgowanie                     $a ** $b
//   ++       inkrementacja                   $a++
//   --       dekrementacja                   $a--

$x = 18;
$y = 32;

printf("Wartości początkowe: x = %d, y = %d" . PHP_EOL, $x, $y);

printf("x + y = %d" . PHP_EOL, $x + $y);
printf("x - y = %d" . PHP_EOL, $x - $y);
printf("x * y = %d" . PHP_EOL, $x * $y);
printf("x / y = %.3f" . PHP_EOL, $x / $y);
printf("x %% y = %d" . PHP_EOL, $x % $y);

printf("x * x = %d" . PHP_EOL, $x ** 2);
printf("x * x * x = %d" . PHP_EOL, $x ** 3);



// W języku PHP można z góry ustalić typ zmiennej - nazywa się to rzutowaniem lub typowaniem.

echo "\n";
$x = (int) 2024;
$y = (float) 2024;

if ($x == $y) print "Zmienne mają taką samą wartość.\n";
else print "Zmienne mają różną wartość.\n";

if ($x === $y) print "Zmienne mają taką samą wartość i typ.\n";
else print "Zmienne mają różną wartość lub różny typ.\n";
