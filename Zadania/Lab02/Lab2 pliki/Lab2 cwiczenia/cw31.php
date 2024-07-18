<?php

/* Ćwiczenie 31 - Pozostałe zagadnienia */

// Modyfikatory dostępu dla właściwości, metod i stałych w klasach:
// public - element jest widoczny wewnątrz klasy, w klasach dziedziczących, jak i na zewnątrz klasy.
// protected - element jest widoczny wewnątrz klasy i w klasach dziedziczących.
// private - element jest widoczny tylko wewnątrz klasy.



// Interfejs

// Wewnątrz interfejsu definiuje się tylko prototypy metod, a w klasie implementującej interfejs definiuje się implementacje tych metod.
// Klasa implementująca dany interfejs MUSI zawierać implementację wszystkich metod ujętych w danym interfejsie. Inaczej zostanie wygenerowany błąd.

interface Information1
{
    public function getID();
    public function getName();
    public function getCode();
}

class Patient1 implements Information1
{
    public function getID()
    {
        // Kod metody
    }
    public function getName()
    {
        // Kod metody
    }
    public function getCode()
    {
        // Kod metody
    }
}



// Klasa abstrakcyjna

// Klasy abstrakcyjne to klasy na podstawie których nie można utworzyć obiektu. Mogą zawierać zwykłe jak i abstrakcyjne metody.
// Abstrakcyjne metody są tylko definiowane i nie zawierają implementacji. Dopiero w klasach dziedziczących implementuje się metody abstrakcyjne.

abstract class Information2
{
    abstract public function getID();
    abstract public function getName();
    abstract public function getCode();
}

class Patient2 extends Information2
{
    public function getID()
    {
        // Kod metody
    }
    public function getName()
    {
        // Kod metody
    }
    public function getCode()
    {
        // Kod metody
    }
}



// final - Oznaczenie, które sprawia, że danej metody nie można już nadpisać w klasach potomnych.
//         Oznaczenie pozwala również, zablokować rozszerzanie danej klasy.
