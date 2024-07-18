<?php

/* Ćwiczenie 17 - Instrukcja warunkowa 'switch' i 'match' */

// Wybierz 'match', gdy potrzebujesz zwrócić wartość na podstawie jednego z wielu możliwych przypadków, 
// szczególnie w nowszych projektach PHP (8.0+), gdzie cenisz ścisłe porównanie i zwięzłość kodu.
// Użyj 'switch', gdy twoja logika decyzyjna wymaga wykonania bardziej złożonych operacji w ramach przypadków 
// lub gdy musisz utrzymać kompatybilność z wersjami PHP starszymi niż 8.0.



// Switch

$city = "Kraków";
echo $city, " - ";
switch ($city) 
{
    case "Londyn":
        print "Stolica Wielkiej Brytanii.";
        break;
    case "Berlin":
    case "Monachium":
        print "Interesujące miasto w Niemczech.";
        break;
    case "Kraków":
    case "Wrocław":
        print "Przepiękne miasto w Polsce.";
        break;
    case "Warszawa":
        print "Stolica Polski.";
        break;
    default:
        print "Pozostałe miasta też są fajne.";
}



// Match

// Sposób 1:
$city = "Londyn";
echo "\n", $city, " - ", match ($city) 
{
    "Londyn" => "Stolica Wielkiej Brytanii.",
    "Berlin", "Monachium" => "Interesujące miasto w Niemczech.",
    "Kraków", "Wrocław" => "Przepiękne miasto w Polsce.",
    "Warszawa" => "Stolica Polski.",
    default => "Pozostałe miasta też są fajne.",
};

// Sposób 2:
$city = "Berlin";
echo "\n", $city, " - ", match (true) 
{
    str_contains($city, "Londyn") => "Stolica Wielkiej Brytanii.",
    str_contains($city, "Berlin") || str_contains($city, "Monachium") => "Interesujące miasto w Niemczech.",
    str_contains($city, "Kraków") || str_contains($city, "Wrocław") => "Przepiękne miasto w Polsce.",
    str_contains($city, "Warszawa") => "Stolica Polski.",
    default => "Pozostałe miasta też są fajne.",
};
