<?php

/* Ćwiczenie 12 - Usuwanie białych znaków */

// trim - Usuwa spacje z lewej i z prawej strony łańcucha
// ltrim - Usuwa spacje z lewej strony łańcucha
// rtrim - Usuwa spacje z prawej strony łańcucha

$name = "   Robert   ";
print "Oryginalny tekst: >" . $name . "<\n";
print "Funkcja 'trim': >" . trim($name) . "<\n";
print "Funkcja 'ltrim': >" . ltrim($name) . "<\n";
print "Funkcja 'rtrim': >" . rtrim($name) . "<\n";
