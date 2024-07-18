<?php

/* Ćwiczenie 18 - Logika w instrukcjach warunkowych */

//   && (AND)       koniunkcja (i) lub iloczyn logiczny
//   || (OR)        alternatywa (lub) lub suma logiczna
//   ! (NOT)        negacja lub zaprzeczenie



// AND

echo "\n";
$a = 15;
$b = 7;
if ($a >= 10 && $b < 12) print "'a' jest większe bądź równe 10 i 'b' jest mniejsze od 12.\n";
else print "Niestety, nie są spełnione oba powyższe warunki.\n";

$a = 9;
$b = 7;
if ($a >= 10 && $b < 12) print "'a' jest większe bądź równe 10 i 'b' jest mniejsze od 12.\n";
else print "Niestety, nie są spełnione oba powyższe warunki.\n";



// OR

echo "\n";
$a = 15;
$b = 7;
if ($a >= 10 || $b < 12) print "'a' jest większe bądź równe 10 lub 'b' jest mniejsze od 12.\n";
else print "Niestety, nie jest spełniony przynajmiej jeden powyższy warunek.\n";

$a = 9;
$b = 7;
if ($a >= 10 || $b < 12) print "'a' jest większe bądź równe 10 lub 'b' jest mniejsze od 12.\n";
else print "Niestety, nie jest spełniony przynajmiej jeden powyższy warunek.\n";

$a = 9;
$b = 13;
if ($a >= 10 || $b < 12) print "'a' jest większe bądź równe 10 lub 'b' jest mniejsze od 12.\n";
else print "Niestety, nie jest spełniony przynajmiej jeden powyższy warunek.\n";



// NOT

echo "\n";
$a = 15;
if ($a == 15) print "'a' wynosi 15.\n";
else print "'a' nie wysoni 15.\n";

$a = 15;
if (!($a == 15)) print "'a' nie wynosi 15.\n";
else print "'a' wysoni 15.\n";
echo "\n";
