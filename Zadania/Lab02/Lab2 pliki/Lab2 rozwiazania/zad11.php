<?php
// Zad 2.11

function division($x, $y)
{
    if ($y === 0) throw new InvalidArgumentException("'y' nie może wynosić 0");
    elseif (!is_int($x) && !is_int($y)) throw new TypeError("'x' i 'y' muszą być typu 'int'");
    elseif (!is_int($x)) throw new TypeError("'x' musi być typu 'int'");
    elseif (!is_int($y)) throw new TypeError("'y' musi być typu 'int'");
    return $x / $y;
}

$i = 0;
while ($i < 3) 
{
    $x = konwertujWartosc(readline("Podaj 'x': "));
    $y = konwertujWartosc(readline("Podaj 'y': "));

    try 
    {
        printf("Wynik działania: x \ y = %.2f" . PHP_EOL, division($x, $y));
    } 
    catch (InvalidArgumentException $e) 
    {
        print($e->getMessage() . PHP_EOL);
    } 
    catch (TypeError $e) 
    {
        print($e->getMessage() . PHP_EOL);
    }

    print PHP_EOL;
    $i++;
}

function konwertujWartosc($wartosc)
{
    $wartosc = trim($wartosc);
    if (filter_var($wartosc, FILTER_VALIDATE_INT) !== false) return intval($wartosc);
    elseif (filter_var($wartosc, FILTER_VALIDATE_FLOAT) !== false) return floatval($wartosc);
    else return $wartosc;
}
