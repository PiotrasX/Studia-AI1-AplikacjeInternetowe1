<?php

/* Ćwiczenie 27 - Wyjątki */

// Tabela z rodzajami wyjątków w języku PHP
//
// Wyjątek                 Czego dotyczy?                                Wersja PHP
// --------------------------------------------------------------------------------
// Exception	           podstawowa klasa obsługi wyjątków	         5 – 8
// ErrorException	       rozszerzona wersja klasy Exception	         5.1 – 8
// Error	               wewnętrzny błąd interpretera PHP	             7 – 8
// ArgumentCountError  	   nieoczekiwana liczba argumentów	             7.1 – 8
// ArithmeticError	       błąd w obliczeniu arytmetycznym	             7 – 8
// AssertionError	       błąd wykonania funkcji assert	             7 – 8
// DivisionByZeroError	   błąd dzielenia przez zero	                 7 – 8
// CompileError	           błąd podczas kompilacji kodu	                 7.3 – 8
// ParseError	           błąd w konstrukcji składni	                 7 – 8
// TypeError	           nieprawidłowy typ argumentu	                 7 – 8
// ValueError	           nieprawidłowa wartość argumentu	             8
// UnhandledMatchError	   brak dopasowania w konstrukcji warunkowej	 8

// Tabela z metodami obiektu wyjątku w języku PHP
//
// Metoda	        Co zwraca?	                                        Typ
// ---------------------------------------------------------------------------
// getMessage()	    komunikat wyjątku	                                string
// getCode()	    numer komunikatu wyjątku	                        mixed
// getFile()	    nazwa pliku, w którym wystąpił wyjątek	            string
// getLine()	    numer linii w pliku, w którym wystąpił wyjątek	    int



// Przechwycenie wyjątku

function mojaFunkcja(int $x, int $y): float
{
    // Jeśli coś pójdzie nie tak, zgłoś wyjątek
    if ($y == 0) throw new Exception("Nie wolno dzielić przez zero!");

    print "Funkcja zwraca wynik z dzielenia.\n";
    return (float) $x / $y;
}

try 
{
    print "Wywołuję funkcję z parametrami.\n";
    mojaFunkcja(5, 20);
    mojaFunkcja(5, 0); // Spróbujmy podzielić przez zero
} 
catch (Exception $e) 
{
    print "Funkcja zgłosiła wyjątek i przerwała swoje działanie.\n";
    print $e->getMessage() . PHP_EOL;
} 
finally 
{
    print "Ten kod wykona się zawsze po try-catch.\n";
}



// Własna obsługa wyjątku

print "\n";
define('ERROR_CODE', 4); // Definicja stałej

class MyException extends Exception // Definicja niestandardowej klasy do obsługi wyjątków
{
    public function errorMessage()
    {
        return sprintf("Wystąpił błąd '%s' o numerze %d w linii %d.\n", $this->getMessage(), $this->getCode(), $this->getLine());
    }
}

$kalkulator = function (string $operacja, float $x, float $y): float // Funkcja anonimowa przypisana do zmiennej
{
    if ($operacja == "/" && $y == 0) 
    {
        // Zgłoszenie wyjątku do wcześniejszej zdefuniowanej klasy MyException
        throw new MyException("Nie dziel przez zero!", ERROR_CODE);
    }

    return match ($operacja) 
    {
        "+" => $x + $y,
        "-" => $x - $y,
        "*" => $x * $y,
        "/" => fdiv($x, $y)
    };
};

try 
{
    print $kalkulator("/", 5, 2);
    print "\n";
    print $kalkulator("/", 5, 0);
    print "\n";
} 
catch (MyException $e) 
{
    print $e->errorMessage();
}
