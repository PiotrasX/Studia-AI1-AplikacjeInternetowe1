<?php
// Zad 2.9

$fruits = array("banana", "apple", "strawberry", "grape", "orange", "watermelon", "blueberry");

$ile_elementow = count($fruits);
print "Ilość elementów w liście: $ile_elementow\n";

print "\nElementy tablicy:\n";
for ($i = 0; $i < count($fruits); $i++)
    print "$fruits[$i]\n";
print PHP_EOL;

array_push($fruits, "lemon");
$array_string = print_r($fruits, true);
$array_string_space = str_replace("\n", "", $array_string);
print "$array_string_space \n";

array_pop($fruits);
$array_string = print_r($fruits, true);
$array_string_space = str_replace("\n", "", $array_string);
print "$array_string_space \n";

sort($fruits);
$fruits = array_reverse($fruits);
$array_string = print_r($fruits, true);
$array_string_space = str_replace("\n", "", $array_string);
print "$array_string_space";
