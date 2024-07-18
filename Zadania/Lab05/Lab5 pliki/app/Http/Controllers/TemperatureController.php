<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    public function ctf(float $c = null)
    {
        if (is_null($c)) return "Nie podano wartości";
        $f = $c * 9 / 5 + 32;
        return "{$c}°C to {$f}°F";

        // dd() - Skrót od "dump and die", służy do wyświetlenia informacji o zmiennej lub wyrażeniu i zatrzymaniu dalszego wykonywania skryptu.
        //        Jest to bardzo przydatne, gdy chcemy zobaczyć wartość zmiennej w konkretnym miejscu wykonania programu i nie chcemy, aby Laravel
        //        kontynuował dalsze przetwarzanie żądania.

        // dump() - Po prostu wyświetla informacje o zmiennej lub wyrażeniu bez zatrzymywania wykonywania skryptu. Można użyć dump() wielokrotnie
        //          w różnych miejscach kodu, aby zobaczyć, jak zmieniają się wartości zmiennych w trakcie wykonania programu.
    }

    public function ctf_helper(float $c = null)
    {
        if (is_null($c)) dd("Nie podano wartości"); // Użycie dd() -> Program zatrzyma się tutaj, jeśli $c jest null.

        dump($c); // Użycie dump() -> Zostanie wyświetlona wartość $c, ale skrypt będzie kontynuowany.

        $f = $c * 9 / 5 + 32;

        dump($f); // Użycie dump() -> Zostanie wyświetlona wartość $f, ale skrypt będzie kontynuowany.

        return "{$c}°C to {$f}°F";
    }
}
