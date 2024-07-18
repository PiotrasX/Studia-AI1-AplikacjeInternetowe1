<?php

/* Ćwiczenie 28 - Data i czas */

// W PHP podstawową funkcją do formatowania czasu i daty jest 'date'.
// W poniższej tabeli umieszczone są najważniejsze znaczniki, które 
// wykorzystywane są razem z tą funkcją do formatowania czasu.

// Znacznik czasu	  Co funkcja date zwróci na wyjściu?	            Przykład
// -------------------------------------------------------------------------------------------
// G	              godzina w formacie 24-godzinnym (bez zera)	    od 0 do 23
// H	              godzina w formacie 24-godzinnym (z zerem)	        od 00 do 23
// i	              minuty	                                        od 00 do 59
// s	              sekundy	                                        od 00 do 59
// j	              dzień miesiąca (bez zera)	                        od 1 do 31
// d	              dzień miesiąca (z zerem)	                        od 01 do 31
// D	              nazwa dnia tygodnia (3 litery)	                od Mon do Sun
// l (małe L)	      nazwa dnia tygodnia	                            od Sunday do Saturday
// w	              dzień tygodnia (0 — niedziela ... 6 — sobota)	    od 0 do 6
// z	              dzień roku	                                    od 1 do 365
// F	              nazwa miesiąca	                                od January do December
// m	              miesiąc roku (z zerem)	                        od 01 do 12
// N	              miesiąc roku (bez zera)	                        od 1 do 12
// t	              liczba dni w miesiącu	                            od 28 do 31
// Y	              rok (4 cyfry)	                                    np.: 2024
// y	              rok (2 cyfry)	                                    np.: 24



// date_default_timezone_set - Funkcja definiująca strefę czasową dla wszystkich funkcji 
//                             związanych z datą i czasem. Warto zawsze ją definiować w programach.
// time - Funkcja zwraca liczbę 'int', która wskazuje, ile sekund upłyneło od początku 1970 roku do teraz.
// mktime - Funkcja zwraca liczbę 'int', która wskazuje, ile sekund upłyneło od początku 1970 roku do daty
//          podanej przez użytkownika.

date_default_timezone_set("Europe/Warsaw"); // Definicja strefy czasowej.
print "Aktualna data i czas: " . date("Y.m.d H:i.s") . PHP_EOL; // Drukowanie daty i czasu.

$unix_time = time(); // Ile sekund od początku 1970 roku do teraz.
$unix_time_2000 = mktime(0, 0, 0, 1, 1, 2000); // Ile sekund od początku 1970 roku do 2000.

print "Od początku 2000 roku upłynęło " . ($unix_time - $unix_time_2000) . " sekund" . PHP_EOL;



// Weryfikacja daty

$week = [
    'niedziela', 'poniedziałek', 'wtorek',
    'środa', 'czwartek', 'piątek', 'sobota'
];

$month = 6;
$day = 15;
$year = 2003;

if (checkdate($month, $day, $year)) // Sprawdzanie poprawności daty.
{
    $d = date("w", mktime(0, 0, 0, $month, $day, $year));
    print "$year.$month.$day to " . $week[$d] . PHP_EOL;
} 
else print "Data jest błędna" . PHP_EOL;



// strtotime - Zamienia ciąg znaków (date lub czas) na liczbe sekund, które minęły od początku 1970 roku.

echo "\n";
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";
echo "\n";

$start = strtotime("now"); // Bieżący znacznik czasu.
$end = strtotime("next Friday 3pm"); // Najbliższy piątek godzina 15:00.
$count = $end - $start; // Ile sekund do weekendu?

// Funkcja 'floor' zaokrągla liczby w dół.
$days = floor($count / (60 * 60 * 24)); // 60 * 60 * 24 = 86400 sekund, a to 1 dzień.
$hours = floor(($count / (60 * 60)) % 24); // 60 * 60 = 3600 sekund, a to 1 godzina.
$minutes = floor(($count / 60) % 60); // 60 sekund, a to 1 minuta.
$seconds = $count % 60;

printf("Weekend zaczyna się za %d dni, %d godzin, %d minut, %d sekund.\n\n", $days, $hours, $minutes, $seconds);



// Losowanie daty

$tydzien = ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'];
$table = [];
$i = 0;
do 
{
    $day = rand(1, 31);
    $month = rand(1, 12);
    $year = rand(2021, 2024);
    $hour = rand(0, 23);
    $min = rand(0, 59);
    $sec = rand(0, 59);

    if (checkdate($month, $day, $year)) $table[] = strtotime("$year-$month-$day $hour:$min:$sec");
    $i++;
} while ($i < 10);

sort($table);
foreach ($table as $data) 
{
    $dzien = date("w", $data);
    print date("d.m.Y H:i:s ", $data) . "($tydzien[$dzien])" . PHP_EOL;
}
