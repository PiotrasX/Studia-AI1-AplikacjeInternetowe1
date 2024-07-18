<?php

/* Ćwiczenie 15 - Przeszukiwanie łańcucha */

// str_contains - Sprawdza, czy dany ciąg znaków znajduje się w łańcuchu.
// str_starts_with - Sprawdza, czy dany ciąg znaków znajduje się na początku łańcucha.
// str_ends_with - Sprawdza, czy dany ciąg znaków znajduje się na końcu łańcucha.

$string = "Jak się masz? Koteczku jak się masz?";
if (str_contains($string, "się")) print "Tekst 'się' zawiera się w \$string.\n"; else print "Tekst 'się' nie zawiera się w \$string.\n";
if (str_contains($string, "jak")) print "Tekst 'jak' zawiera się w \$string.\n"; else print "Tekst 'jak' nie zawiera się w \$string.\n";
if (str_contains($string, "Jak")) print "Tekst 'Jak' zawiera się w \$string.\n"; else print "Tekst 'Jak' nie zawiera się w \$string.\n";
if (str_starts_with($string, "jak")) print "Tekst 'jak' rozpoczyna \$string.\n"; else print "Tekst 'jak' nie rozpoczyna \$string.\n";
if (str_starts_with($string, "Jak")) print "Tekst 'Jak' rozpoczyna \$string.\n"; else print "Tekst 'Jak' nie rozpoczyna \$string.\n";
if (str_contains($string, "?")) print "Tekst '?' zawiera się w \$string.\n"; else print "Tekst '?' nie zawiera się w \$string.\n";
if (str_ends_with($string, "?")) print "Tekst '?' kończy \$string.\n"; else print "Tekst '?' nie kończy \$string.\n";
