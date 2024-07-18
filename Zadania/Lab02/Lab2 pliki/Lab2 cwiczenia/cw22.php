<?php

/* Ćwiczenie 22 - Funkcje */

// Deklaracja prostej funkcji: 
function drukuj()
{
    print "Lubię programować!";
    print PHP_EOL;
}

// Wywołanie 3 razy danej funkcji:
drukuj();
drukuj();
drukuj();



// Deklaracja prostej funkcji z argumentem: 
function drukuj_z_argumentem($tekst)
{
    print $tekst;
    print PHP_EOL;
}

// Wywołanie 3 razy danej funkcji z argumentem:
drukuj_z_argumentem("\nLubię programować!");
drukuj_z_argumentem("Moja pierwsza funkcja!");
drukuj_z_argumentem("Programowanie nie jest trudne!");



// Deklaracja prostej funkcji z argumentem domyślnym: 
function drukuj_z_argumentem_domyslnym(?string $tekst = "", ?bool $nowa_linia = true)
{
    print $tekst;
    if ($nowa_linia === true) print PHP_EOL;
}

// Wywołanie 4 razy danej funkcji z argumentem domyślnym:
drukuj_z_argumentem_domyslnym("\nLubię ");
drukuj_z_argumentem_domyslnym("programować!");
drukuj_z_argumentem_domyslnym();
drukuj_z_argumentem_domyslnym("Ale lubię też wakacje!\n");



// Definicja funkcji anonimowej:
$drukuj = function (string $tekst) 
{
    print $tekst;
    print PHP_EOL;
};

// Wywołanie funkcji anonimowej:
$drukuj("Funkcja \$drukuj po raz pierwszy.");

// Definicja funkcji zwrotnej (funkcja, która może być przekazana jako argument do innej funkcji i wewnątrz niej uruchomiona):
function mojaFunkcja($callback)
{
    // Wywołanie funkcji zwrotnej:
    $callback("Funkcja \$drukuj po raz drugi.");
}

// Wywołanie funkcji zwrotnej:
mojaFunkcja($drukuj);

// Argumenty funkcji anonimowej:
$zmienna = "Funkcja \$drukuj po raz trzeci.";

// Definicja funkcji anonimowej z argumentem:
$drukujWiek = function ($callback) use ($zmienna) 
{
    // Wywołanie funkcji zwrotnej z argumentem:
    $callback($zmienna);
};

// Wywołanie funkcji anonimowej z argumentem:
$drukujWiek($drukuj);
