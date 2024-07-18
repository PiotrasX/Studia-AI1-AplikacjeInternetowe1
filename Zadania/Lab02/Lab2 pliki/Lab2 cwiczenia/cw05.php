<?php

/* Ćwiczenie 5 - Drukowanie sformatowane */

//    %b          format binarny (dwójkowy)
//    %e          format naukowy
//    %f          format rzeczywisty (zmiennoprzecinkowy)
//    %o          formay ósemkowy
//    %s          format tekstowy
//    %d          format dziesiętny
//    %x, %X      format szesnastkowy (heksadecymalny)

$liczba = 2021;

printf("%%b = '%b'" . PHP_EOL, $liczba);
printf("%%e = '%e'" . PHP_EOL, $liczba);
printf("%%f = '%f'" . PHP_EOL, $liczba);
printf("%%o = '%o'" . PHP_EOL, $liczba);
printf("%%s = '%s'" . PHP_EOL, $liczba);
printf("%%x = '%x'" . PHP_EOL, $liczba);

printf("Rok %d w formacie szesnastkowym to %X.", $liczba, $liczba);
