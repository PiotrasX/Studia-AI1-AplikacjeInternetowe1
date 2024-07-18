<?php

/* Ćwiczenie 19 - Znajdowanie elementów w tekście */

// mb_strpos - Funkcja zwraca położenie pierwszego wystąpienia ciągu znaków w innym ciągu.
// W tym przypadku wielkość liter ma znaczenie. Jeśli ciąg nie został odnaleziony, funkcja zwróci 'false'.

$myText = "To jest mały krok dla człowieka, ale wielki skok dla ludzkości.";
$searchText = "dla";

$pos = mb_strpos($myText, $searchText);
if ($pos !== false) 
{
    print "Pierwsze wystąpienie ciągu znaków \"$searchText\" ";
    print "zostało odnalezione na pozycji nr $pos.\n";
} else print "Sukany tekst nie został odnaleziony.\n";



// mb_stripos - Funkcja zwraca położenie pierwszego wystąpienia ciągu znaków w innym ciągu, wielkość liter nie ma znaczenia.
// mb_strrpos - Funkcja zwraca położenie ostatniego wystąpienia ciągu znaków w innym ciągu, wielkość liter ma znaczenia.

$myText = "Jak czytać KSIĄŻKI i dlaczego książki warto czytac?";
$searchText1 = "KSIĄŻKI";
$searchText2 = "książki";

$pos1 = mb_stripos($myText, $searchText1);
if ($pos1 !== false) print "Pierwsze wystąpienie ciągu znaków \"$searchText1\" zostało odnalezione na pozycji nr $pos1.\n";
else print "Sukany tekst nie został odnaleziony.\n";

$pos2 = mb_stripos($myText, $searchText2);
if ($pos2 !== false) print "Pierwsze wystąpienie ciągu znaków \"$searchText2\" zostało odnalezione na pozycji nr $pos2.\n";
else print "Sukany tekst nie został odnaleziony.\n";

$pos3 = mb_strrpos($myText, $searchText1);
if ($pos3 !== false) print "Ostatnie wystąpienie ciągu znaków \"$searchText1\" zostało odnalezione na pozycji nr $pos3.\n";
else print "Sukany tekst nie został odnaleziony.\n";

$pos4 = mb_strrpos($myText, $searchText2);
if ($pos4 !== false) print "Ostatnie wystąpienie ciągu znaków \"$searchText2\" zostało odnalezione na pozycji nr $pos4.\n";
else print "Sukany tekst nie został odnaleziony.\n";



// strlen - Funkcja zwraca dlugość łańcucha znaków, ale np.: polskie znaki są liczone podwójnie jako jedno wystąpienie.
// mb_strlen - Funkcja zwraca długość łańcucha znaków.

print "\n";
$myText1 = "Życie jest jak pudełko czekoladek - nigdy nie wiesz, co ci się trafi.";
$myText2 = "Miej serce i patrzaj w serce";

$len1 = strlen($myText1);
print "Długość \$myText1 za pomocą strlen: $len1.\n";

$len2 = mb_strlen($myText1);
print "Długość \$myText1 za pomocą mb_strlen: $len2.\n";

$len3 = strlen($myText2);
print "Długość \$myText2 za pomocą strlen: $len3.\n";

$len4 = mb_strlen($myText2);
print "Długość \$myText2 za pomocą mb_strlen: $len4.\n";



// mb_strstr - Funkcja znajduje pierwsze wystąpienie podciągu w ciągu znaków i zwraca część ciągu od znalezionego podciągu do końca ciągu.
// mb_strrstr - Funkcja znajduje ostatnie wystąpienie podciągu w ciągu znaków i zwraca część ciągu od znalezionego podciągu do końca ciągu.
