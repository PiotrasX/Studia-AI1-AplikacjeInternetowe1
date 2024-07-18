<?php
// Zad 2.4

$text1 = "   Programuję dobrze  ";
$text2 = "dobrze w PHP.  ";

$dlugosc_text1 = mb_strlen($text1);
print "Długość 'text1': $dlugosc_text1\n";

$text2_od_tylu = strrev($text2);
print "Napis 'text2' w odwrotnej kolejności: $text2_od_tylu\n";

if (mb_strlen($text1) > mb_strlen($text2)) print "Napis 'text1' jest dłuższy.\n";
elseif (mb_strlen($text1) < mb_strlen($text2)) print "Napis 'text2' jest dłuższy.\n";
else print "Oba napisy mają taką samą długość.\n";

$text1_zawiera = strpos($text1, "Programuję");
if ($text1_zawiera !== false) print "Zmienna 'text1' zawiera słowo \"Programuję\".\n";
else print "Zmienna 'text1' nie zawiera słowa \"Programuję\".\n";

$text2_zaczyna = str_starts_with($text2, "dobrze");
if ($text2_zaczyna !== false) print "Zmienna 'text2' zaczyna się słowem \"dobrze\".\n";
else print "Zmienna 'text2' nie zaczyna się słowem \"dobrze\".\n";

$text3 = trim($text1) . " " . trim($text2);
print "Zmienne 'text1' i 'text2' połączone z usuniętymi spacjami: $text3\n";

$tab = explode(" ", $text3);
print_r($tab);

$text1 = str_replace("dobrze", "źle", $text1);
print "Zmienna 'text1' z zamienionym słowem 'dobrze' na 'źle': $text1\n";

$pozycja = mb_strpos($text2, "PHP");
print "Indeks, na którym zaczyna się słowo 'PHP' w 'text2': $pozycja\n";

$text1_duze = mb_strtoupper($text1);
print "Napis 'text1' z zamienionymi literami na duże: $text1_duze\n";

$text2_duza1 = ucfirst($text2);
print "Napis 'text2' z zamienioną pierwszą literą na dużą: $text2_duza1\n";

$text2_substring = mb_substr($text2, 9, 3);
print "Napis 'text2' od pozycji 9 do 11 włącznie: $text2_substring";
