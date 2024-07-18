<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TemperatureController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return '<h1>Hello world!<h1>';
});

Route::get('/greetings/{name?}', function (string $name = 'nieznajomy') {
    return "Witaj {$name}!";
});

Route::get('/ctf/{c?}', [TemperatureController::class, 'ctf']);

Route::get('/temperature/ctf/{c?}', [TemperatureController::class, 'ctf']);

Route::get('/ctf_helper/{c?}', [TemperatureController::class, 'ctf_helper']);

Route::get('/temperature/ctf_helper/{c?}', [TemperatureController::class, 'ctf_helper']);

Route::get('/zad9', function (Request $request) {
    $br = "<br>";
    $r = $request->path() . $br . // Zwraca ścieżkę żądania bez adresu URL domeny. Jeśli więc twoje żądanie było do http://example.com/zad9, path() zwróci zad9.
        $request->url() . $br . // Zwraca pełny adres URL bez zapytania (query string). Dla http://example.com/zad9?foo=bar, zwróci http://example.com/zad9.
        $request->fullUrl() . $br . // Zwraca pełny adres URL z zapytaniem (query string). Dla http://example.com/zad9?foo=bar, zwróci pełny adres URL z zapytaniem: http://example.com/zad9?foo=bar
        $request->method() . $br . // Zwraca metodę HTTP używaną dla żądania, np. GET, POST.
        $request->isMethod('post') . $br . // Sprawdza, czy metoda żądania jest taka jak podana, w tym przypadku POST. Zwróci true lub false.
        $request->header('User-Agent') . $br . //  Pobiera wartość konkretnego nagłówka żądania, w tym przykładzie User-Agent, który zwykle zawiera informacje o przeglądarce klienta i systemie operacyjnym.
        $request->ip(); // Zwraca adres IP klienta, który wykonał żądanie.
    return $r;
});

Route::get('/zad10', function (Request $request) {
    $br = "<br>";
    $r = print_r($request->all(), true) . $br . // Zwraca wszystkie parametry zapytania jako tablicę.
        $request->query('a') . $br . // Zwraca wartość parametru zapytania 'a'. Jeśli nie istnieje, zwróci 'null'.
        $request->query('b', 'brak b') . $br . // Zwraca wartość parametru zapytania 'b', a jeśli 'b' nie istnieje, zwróci wartość domyślną 'brak b'.
        print_r($request->query(), true) . $br . // Zwraca wszystkie parametry zapytania jako tablicę.
        $request->a . $br . // Dostęp do wartości parametru zapytania 'a' za pomocą właściwości obiektu.
        $request->has(['a', 'b']) . $br . // Sprawdza, czy oba parametry zapytania 'a' i 'b' istnieją w żądaniu.
        $request->filled(['a']) . $br; // Sprawdza, czy parametr zapytania 'a' istnieje i ma niepustą wartość.
    return $r;
});

Route::get('/zad13', function (Request $request) {
    $name = $request->name;
    $arr = ['a', 'b', 'c', 'd', 'e'];
    return view('zad13', ['name' => $name, 'arr' => $arr]);
});

Route::get('/trips', function () {
    return view('index');
});
