<?php

/* Ćwiczenie 16 - Instrukcje warunkowe */

//   ==         czy zmienne są równe co do wartości
//   !=         czy zmienne nie są równe co do wartości
//   ===        czy zmienne są identyczne (co do wartości i typu)
//   !===       czy zmienne nie są identyczne (co do wartości i typu)
//   >          czy zmienna z lewej strony jest większa od zmiennej z prawej strony
//   >=         czy zmienna z lewej strony jest większa bądź równa od zmiennej z prawej strony
//   <          czy zmienna z lewej strony jest mniejsza od zmiennej z prawej strony
//   <=         czy zmienna z lewej strony jest mniejsza bądź równa od zmiennej z prawej strony

print "\n";
function porownywanie_zmiennych($a, $b)
{
    if ($a > $b) print "Zmienna 'a' jest większa od zmiennej 'b'\n\n";
    elseif ($a < $b) print "Zmienna 'a' jest mniejsza od zmiennej 'b'\n\n";
    else print "Zmienna 'a' jest równa zmiennej 'b'\n\n";
}

echo "Dla 'a' = 12 i dla 'b' = 25:\n";
porownywanie_zmiennych(12, 25);

echo "Dla 'a' = 13 i dla 'b' = 9:\n";
porownywanie_zmiennych(13, 9);

echo "Dla 'a' = 7 i dla 'b' = 7:\n";
porownywanie_zmiennych(7, 7);



// Operator trójargumentowy

$wiek = 25;
$status = ($wiek >= 18) ? "pełnoletni" : "niepełnoletni";
print "Marcin jest $status (wiek = $wiek).\n";

$wiek = 17;
$status = ($wiek >= 18) ? "pełnoletni" : "niepełnoletni";
print "Michał jest $status (wiek = $wiek).\n";

$wiek = 18;
$status = ($wiek >= 18) ? "pełnoletni" : "niepełnoletni";
print "Maksymilian jest $status (wiek = $wiek).\n";
