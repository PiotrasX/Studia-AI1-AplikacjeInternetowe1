<?php
// Zad 2.2

$a = 4;
const B = 10;
$c = 4.0;
$d = 5.667;

$suma = $a + B;
print "Dodawanie: a + B = $suma\n";

$dzielenie = $a / B;
print "Dzielenie: a \ B = $dzielenie\n";

$potega = pow($a, B);
print "Potęgowanie: a ^ B = $potega\n";

$reszta = B % $a;
print "Reszta z dzielenia: B % a = $reszta\n" . PHP_EOL;

if ($a == B) print "'a' takie same jak 'B'\n";
else print "'a' nie jest takie same jak 'B'\n";

if ($a > B) print "'a' większe od 'B'\n";
else print "'a' mniejsze bądź równe 'B'\n";

($a > B) ? print "'a' większe od 'B'\n" : print "'a' mniejsze bądź równe 'B'\n";

($a == $c) ? print "'a' takie same jak 'c'\n" : print "'a' nie jest takie same jak 'c'\n";

($a === $c) ? print "'a' takie same jak 'c' (uwzględniając typ)\n" : print "'a' nie jest takie same jak 'c' (uwzględniając typ)\n" . PHP_EOL;

$d_bez_liczb_po_przecinku = (int) $d;
print "Liczba 'd' bez części po przecinku: $d_bez_liczb_po_przecinku\n";

$d_2_liczby_po_przecinku = (int) ($d * 100) / 100;
print "Liczba 'd' zaokrąglona do 2 miejsc po przecinku: $d_2_liczby_po_przecinku";
