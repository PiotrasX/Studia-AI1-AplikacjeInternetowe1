<?php

/* Ćwiczenie 20 - Kombinacje z tekstem */

// mb_strtolower - Zamienia wszystkie litery na małe.
// mb_strtoupper - Zamienia wszystkie litery na duże.
// ucfirst - Zamienia pierwszą literę na wielką na początku łańcucha. Nie działa z znakami diakrytycznymi.
// ucwords - Zamienia pierwszą literę każdego wyrazu na wielką. Nie działa z znakami diakrytycznymi.
// mb_convert_case - Posiada wiele opcji, działa z znakami diakrytycznymi.

$myText = "Działaj! Nie jutro, nie za godzinę. Teraz!";

$myTextLower = mb_strtolower($myText);
print $myTextLower . PHP_EOL;

$myTextUpper = mb_strtoupper($myText);
print $myTextUpper . PHP_EOL;

$myNewText = "hej kolego!";
$myTextFirst1 = ucfirst($myNewText);
print $myTextFirst1 . PHP_EOL;

$myNewText = "ładnie wyglądasz!";
$myTextFirst2 = ucfirst($myNewText);
print $myTextFirst2 . PHP_EOL;

$myTextWords1 = ucwords($myText);
print $myTextWords1 . PHP_EOL;

$myTextWords2 = mb_convert_case($myText, MB_CASE_TITLE, 'UTF-8');
print $myTextWords2 . PHP_EOL;



// mb_substr - Funkcja wycina fragment tekstu.

print "\n";
$myText = "Z uśmiechem na twarzy człowiek podwaja swoje możliwości.";

$myTextLen = mb_strlen($myText); // Liczba znaków w tekście
$myCut = 22; // Po którym znaku wycinamy tekst

$newText1 = mb_substr($myText, 0, 21); // Pierwsze 21 znaków
$newText2 = mb_substr($myText, $myCut, $myTextLen - $myCut); // Od 22 znaku do końca
$newText3 = mb_substr($myText, $myCut, 8); // Od 22 znaku, wycinanie 8 znaków

print $newText1 . PHP_EOL;
print $newText2 . PHP_EOL;
print $newText3 . PHP_EOL;



// str_replace - Zamienia fragment tekstu na inny tekst.

print "\n";
$myText = "Oczywiście, że dzik jest najlepszym przyjacielem człowieka!";

$myTextDog = str_replace("dzik", "pies", $myText);
$myTextCat = str_replace("dzik", "kot", $myText);

print $myText . PHP_EOL;
print $myTextDog . PHP_EOL;
print $myTextCat . PHP_EOL;



// strrev - Funkcja, która odwraca tekst.
// str_repait - Funkcja, która powtarza daną ilość razy tekst.

print "\n";
$myText = "PROGRAMOWANIE";

$myTextRev = strrev($myText);

print $myText . PHP_EOL;
print $myTextRev . PHP_EOL;

$myTextRepeat = str_repeat("AS_", 5);

print $myTextRepeat . PHP_EOL;
