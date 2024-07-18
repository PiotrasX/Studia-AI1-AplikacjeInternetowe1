<?php

/* Ćwiczenie 14 - Dzielenie łańcucha */

// explode - Rozdziela tekst na elementy na podstawie określonego separatora. Elementy są potem umieszczane w tablicy.

$tekst = 'Adam,Ewa,Janusz,Grażyna';
$elementy = explode(',', $tekst);
print $tekst . PHP_EOL;
print_r($elementy);
