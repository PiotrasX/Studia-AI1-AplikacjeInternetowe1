<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Employees/Pracownicy
            [
                'first_name' => 'Grażyna', 'last_name' => 'Kozioł', 'gender' => 'Kobieta', 'date_of_birth' => '1967-05-18',
                'phone_number' => '123456789', 'street' => 'Wesoła', 'house_number' => '15', 'zip_code' => '39-120', 'town' => 'Sędziszów Małopolski',
                'father_name' => null, 'mother_name' => null
            ],
            [
                'first_name' => 'Hubert', 'last_name' => 'Pasieka', 'gender' => 'Mężczyzna', 'date_of_birth' => '1774-07-25',
                'phone_number' => '987654321', 'street' => 'Kolorowa', 'house_number' => '16A', 'zip_code' => '36-071', 'town' => 'Trzciana',
                'father_name' => null, 'mother_name' => null
            ],
            [
                'first_name' => 'Agnieszka', 'last_name' => 'Smolczyk', 'gender' => 'Kobieta', 'date_of_birth' => '1976-01-30',
                'phone_number' => '123123123', 'street' => '3 Maja', 'house_number' => '215', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => null, 'mother_name' => null
            ],
            [
                'first_name' => 'Agnieszka', 'last_name' => 'Pies', 'gender' => 'Kobieta', 'date_of_birth' => '1980-07-04',
                'phone_number' => '456456456', 'street' => 'Strażacka', 'house_number' => '18B', 'zip_code' => '36-071', 'town' => 'Trzciana',
                'father_name' => null, 'mother_name' => null
            ],
            [
                'first_name' => 'Robert', 'last_name' => 'Jastrząb', 'gender' => 'Mężczyzna', 'date_of_birth' => '1968-11-13',
                'phone_number' => '789789789', 'street' => 'aleja Niepodległości', 'house_number' => '39D', 'zip_code' => '35-021', 'town' => 'Rzeszów',
                'father_name' => null, 'mother_name' => null
            ],
            // Candidates/Kandydaci
            [
                'first_name' => 'Michał', 'last_name' => 'Powidło', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-05-07',
                'phone_number' => '111111111', 'street' => 'Józefa Piłsudskiego', 'house_number' => '4', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => 'Józef', 'mother_name' => 'Alina'
            ],
            [
                'first_name' => 'Kamil', 'last_name' => 'Rudy', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-04-01',
                'phone_number' => '222222222', 'street' => 'Sportowa', 'house_number' => '1A', 'zip_code' => '39-127', 'town' => 'Olchowa',
                'father_name' => 'Stanisław', 'mother_name' => 'Monika'
            ],
            [
                'first_name' => 'Monika', 'last_name' => 'Patelnia', 'gender' => 'Kobieta', 'date_of_birth' => '2009-04-13',
                'phone_number' => '333333333', 'street' => 'Lipowa', 'house_number' => '126', 'zip_code' => '39-111', 'town' => 'Mała',
                'father_name' => 'Józef', 'mother_name' => 'Beata'
            ],
            [
                'first_name' => 'Krystian', 'last_name' => 'Maślanka', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-07-24',
                'phone_number' => '444444444', 'street' => 'aleja Niepodległości', 'house_number' => '21C', 'zip_code' => '35-021', 'town' => 'Rzeszów',
                'father_name' => 'Kazimierz', 'mother_name' => 'Jolanta'
            ],
            [
                'first_name' => 'Julia', 'last_name' => 'Grabka', 'gender' => 'Kobieta', 'date_of_birth' => '2010-03-18',
                'phone_number' => '555555555', 'street' => 'Rynek', 'house_number' => '3F', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => 'Benedykt', 'mother_name' => 'Grażyna'
            ],
            [
                'first_name' => 'Maksymilian', 'last_name' => 'Przypadek', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-12-25',
                'phone_number' => '666666666', 'street' => 'Szkolna', 'house_number' => '18', 'zip_code' => '39-120', 'town' => 'Borek Mały',
                'father_name' => 'Janusz', 'mother_name' => 'Barbara'
            ],
            [
                'first_name' => 'Gabriela', 'last_name' => 'Ździebełko', 'gender' => 'Kobieta', 'date_of_birth' => '2009-10-22',
                'phone_number' => '777777777', 'street' => 'Wiejska', 'house_number' => '410', 'zip_code' => '36-072', 'town' => 'Świlcza',
                'father_name' => 'Tadeusz', 'mother_name' => 'Monika'
            ],
            [
                'first_name' => 'Anna', 'last_name' => 'Gawron', 'gender' => 'Kobieta', 'date_of_birth' => '2009-01-15',
                'phone_number' => '888888888', 'street' => 'Krótka', 'house_number' => '2B', 'zip_code' => '39-120', 'town' => 'Sędziszów Małopolski',
                'father_name' => 'Marian', 'mother_name' => 'Krystyna'
            ],
            [
                'first_name' => 'Bartosz', 'last_name' => 'Opar', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-02-20',
                'phone_number' => '999999999', 'street' => 'Wolności', 'house_number' => '22', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Robert', 'mother_name' => 'Aneta'
            ],
            [
                'first_name' => 'Cezary', 'last_name' => 'Nowak', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-03-11',
                'phone_number' => '111222333', 'street' => 'Parkowa', 'house_number' => '5', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Andrzej', 'mother_name' => 'Joanna'
            ],
            [
                'first_name' => 'Dorota', 'last_name' => 'Lis', 'gender' => 'Kobieta', 'date_of_birth' => '2010-04-18',
                'phone_number' => '222333111', 'street' => 'Leśna', 'house_number' => '4G', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Jacek', 'mother_name' => 'Ewa'
            ],
            [
                'first_name' => 'Emilia', 'last_name' => 'Zaręba', 'gender' => 'Kobieta', 'date_of_birth' => '2009-05-22',
                'phone_number' => '333111222', 'street' => 'Słoneczna', 'house_number' => '11', 'zip_code' => '37-450', 'town' => 'Stalowa Wola',
                'father_name' => 'Krzysztof', 'mother_name' => 'Alicja'
            ],
            [
                'first_name' => 'Filip', 'last_name' => 'Górski', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-06-25',
                'phone_number' => '444555666', 'street' => 'Ogrodowa', 'house_number' => '19', 'zip_code' => '39-400', 'town' => 'Tarnobrzeg',
                'father_name' => 'Piotr', 'mother_name' => 'Magdalena'
            ],
            [
                'first_name' => 'Grzegorz', 'last_name' => 'Mazur', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-07-13',
                'phone_number' => '555666444', 'street' => 'Zielona', 'house_number' => '127', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Marek', 'mother_name' => 'Katarzyna'
            ],
            [
                'first_name' => 'Hanna', 'last_name' => 'Wiśniewska', 'gender' => 'Kobieta', 'date_of_birth' => '2009-08-19',
                'phone_number' => '666444555', 'street' => 'Pocztowa', 'house_number' => '8C', 'zip_code' => '37-100', 'town' => 'Łańcut',
                'father_name' => 'Tomasz', 'mother_name' => 'Beata'
            ],
            [
                'first_name' => 'Igor', 'last_name' => 'Wójcik', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-09-23',
                'phone_number' => '777888999', 'street' => 'Kwiatowa', 'house_number' => '12D', 'zip_code' => '37-500', 'town' => 'Jarosław',
                'father_name' => 'Henryk', 'mother_name' => 'Renata'
            ],
            [
                'first_name' => 'Julia', 'last_name' => 'Kaczmarek', 'gender' => 'Kobieta', 'date_of_birth' => '2009-10-27',
                'phone_number' => '888999777', 'street' => 'Łąkowa', 'house_number' => '30F', 'zip_code' => '37-450', 'town' => 'Stalowa Wola',
                'father_name' => 'Lucjan', 'mother_name' => 'Barbara'
            ],
            [
                'first_name' => 'Lucjan', 'last_name' => 'Styrany', 'gender' => 'Kobieta', 'date_of_birth' => '2009-11-03',
                'phone_number' => '999777888', 'street' => 'Strażacka', 'house_number' => '18', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Robert', 'mother_name' => 'Dorota'
            ],
            [
                'first_name' => 'Karol', 'last_name' => 'Szymański', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-11-12',
                'phone_number' => '101010101', 'street' => 'Brzozowa', 'house_number' => '224', 'zip_code' => '38-500', 'town' => 'Sanok',
                'father_name' => 'Adam', 'mother_name' => 'Helena'
            ],
            [
                'first_name' => 'Lena', 'last_name' => 'Dąbrowska', 'gender' => 'Kobieta', 'date_of_birth' => '2010-12-06',
                'phone_number' => '202020202', 'street' => 'Główna', 'house_number' => '303', 'zip_code' => '37-450', 'town' => 'Stalowa Wola',
                'father_name' => 'Stefan', 'mother_name' => 'Maria'
            ],
            [
                'first_name' => 'Mikołaj', 'last_name' => 'Kowalczyk', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-01-12',
                'phone_number' => '303030303', 'street' => 'Młyńska', 'house_number' => '47', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Bogdan', 'mother_name' => 'Irena'
            ],
            [
                'first_name' => 'Natalia', 'last_name' => 'Zawadzka', 'gender' => 'Kobieta', 'date_of_birth' => '2010-02-17',
                'phone_number' => '404040404', 'street' => 'Kolejowa', 'house_number' => '7A', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Jarek', 'mother_name' => 'Dorota'
            ],
            [
                'first_name' => 'Oskar', 'last_name' => 'Kamiński', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-03-24',
                'phone_number' => '505050505', 'street' => 'Polna', 'house_number' => '4B', 'zip_code' => '36-072', 'town' => 'Świlcza',
                'father_name' => 'Norbert', 'mother_name' => 'Agnieszka'
            ],
            [
                'first_name' => 'Patrycja', 'last_name' => 'Włodarczyk', 'gender' => 'Kobieta', 'date_of_birth' => '2010-04-28',
                'phone_number' => '606060606', 'street' => 'Rzeczna', 'house_number' => '89', 'zip_code' => '37-500', 'town' => 'Jarosław',
                'father_name' => 'Daniel', 'mother_name' => 'Justyna'
            ],
            [
                'first_name' => 'Rafał', 'last_name' => 'Zieliński', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-05-31',
                'phone_number' => '707070707', 'street' => 'Słowackiego', 'house_number' => '13', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => 'Grzegorz', 'mother_name' => 'Katarzyna'
            ],
            [
                'first_name' => 'Sandra', 'last_name' => 'Piotrowska', 'gender' => 'Kobieta', 'date_of_birth' => '2010-06-04',
                'phone_number' => '808080808', 'street' => 'Brzozowa', 'house_number' => '31', 'zip_code' => '38-500', 'town' => 'Sanok',
                'father_name' => 'Marcin', 'mother_name' => 'Marta'
            ],
            [
                'first_name' => 'Tomasz', 'last_name' => 'Kozłowski', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-07-09',
                'phone_number' => '909090909', 'street' => 'Wierzbowa', 'house_number' => '10A', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Tadeusz', 'mother_name' => 'Elżbieta'
            ],
            [
                'first_name' => 'Urszula', 'last_name' => 'Kubiak', 'gender' => 'Kobieta', 'date_of_birth' => '2009-08-13',
                'phone_number' => '102030405', 'street' => 'Parkowa', 'house_number' => '2', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Henryk', 'mother_name' => 'Danuta'
            ],
            [
                'first_name' => 'Zygmunt', 'last_name' => 'Wilczek', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-09-23',
                'phone_number' => '203040506', 'street' => 'Poprzeczna', 'house_number' => '5G', 'zip_code' => '36-071', 'town' => 'Trzciana',
                'father_name' => 'Dariusz', 'mother_name' => 'Magdalena'
            ],
            [
                'first_name' => 'Alicja', 'last_name' => 'Baran', 'gender' => 'Kobieta', 'date_of_birth' => '2009-10-27',
                'phone_number' => '304050607', 'street' => 'Spokojna', 'house_number' => '160', 'zip_code' => '35-021', 'town' => 'Rzeszów',
                'father_name' => 'Edward', 'mother_name' => 'Anna'
            ],
            [
                'first_name' => 'Borys', 'last_name' => 'Czarnecki', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-11-06',
                'phone_number' => '405060708', 'street' => 'Wschodnia', 'house_number' => '34', 'zip_code' => '39-127', 'town' => 'Olchowa',
                'father_name' => 'Fryderyk', 'mother_name' => 'Beata'
            ],
            [
                'first_name' => 'Celina', 'last_name' => 'Dudek', 'gender' => 'Kobieta', 'date_of_birth' => '2009-12-07',
                'phone_number' => '506070809', 'street' => 'Łąkowa', 'house_number' => '23D', 'zip_code' => '39-120', 'town' => 'Borek Mały',
                'father_name' => 'Grzegorz', 'mother_name' => 'Celina'
            ],
            [
                'first_name' => 'Emilia', 'last_name' => 'Kowal', 'gender' => 'Kobieta', 'date_of_birth' => '2010-03-12',
                'phone_number' => '908070605', 'street' => 'Krakowska', 'house_number' => '146', 'zip_code' => '37-100', 'town' => 'Łańcut',
                'father_name' => 'Marek', 'mother_name' => 'Irena'
            ],
            [
                'first_name' => 'Julia', 'last_name' => 'Nowak', 'gender' => 'Kobieta', 'date_of_birth' => '2009-06-24',
                'phone_number' => '807060504', 'street' => 'Rzeszowska', 'house_number' => '367', 'zip_code' => '38-500', 'town' => 'Sanok',
                'father_name' => 'Piotr', 'mother_name' => 'Maria'
            ],
            [
                'first_name' => 'Maja', 'last_name' => 'Wiśniewska', 'gender' => 'Kobieta', 'date_of_birth' => '2010-11-30',
                'phone_number' => '706050403', 'street' => 'Zachodnia', 'house_number' => '64B', 'zip_code' => '36-071', 'town' => 'Trzciana',
                'father_name' => 'Tomasz', 'mother_name' => 'Agnieszka'
            ],
            [
                'first_name' => 'Lena', 'last_name' => 'Wójcik', 'gender' => 'Kobieta', 'date_of_birth' => '2009-08-15',
                'phone_number' => '605040302', 'street' => 'Łąkowa', 'house_number' => '17', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Robert', 'mother_name' => 'Elżbieta'
            ],
            [
                'first_name' => 'Zofia', 'last_name' => 'Kamińska', 'gender' => 'Kobieta', 'date_of_birth' => '2009-01-05',
                'phone_number' => '504030201', 'street' => 'Wierzbowa', 'house_number' => '42', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Jakub', 'mother_name' => 'Magdalena'
            ],
            [
                'first_name' => 'Nikodem', 'last_name' => 'Szymczak', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-04-18',
                'phone_number' => '999888777', 'street' => 'Słoneczna', 'house_number' => '42B', 'zip_code' => '39-400', 'town' => 'Tarnobrzeg',
                'father_name' => 'Adam', 'mother_name' => 'Joanna'
            ],
            [
                'first_name' => 'Filip', 'last_name' => 'Jankowski', 'gender' => 'Mężczyzna', 'date_of_birth' => '2010-07-22',
                'phone_number' => '888777999', 'street' => 'Kwiatowa', 'house_number' => '34D', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Krzysztof', 'mother_name' => 'Anna'
            ],
            [
                'first_name' => 'Mikołaj', 'last_name' => 'Kowalczyk', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-11-30',
                'phone_number' => '777999888', 'street' => 'Parkowa', 'house_number' => '68', 'zip_code' => '39-120', 'town' => 'Sędziszów Małopolski',
                'father_name' => 'Marcin', 'mother_name' => 'Aleksandra'
            ],
            [
                'first_name' => 'Martyna', 'last_name' => 'Mazur', 'gender' => 'Kobieta', 'date_of_birth' => '2009-01-15',
                'phone_number' => '666555444', 'street' => 'Brzozowa', 'house_number' => '53', 'zip_code' => '36-072', 'town' => 'Świlcza',
                'father_name' => 'Dawid', 'mother_name' => 'Magdalena'
            ],
            [
                'first_name' => 'Julian', 'last_name' => 'Woźniak', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-08-23',
                'phone_number' => '555444666', 'street' => 'Główna', 'house_number' => '200', 'zip_code' => '39-127', 'town' => 'Olchowa',
                'father_name' => 'Daniel', 'mother_name' => 'Katarzyna'
            ],
            [
                'first_name' => 'Kaja', 'last_name' => 'Kaczmarek', 'gender' => 'Kobieta', 'date_of_birth' => '2009-06-19',
                'phone_number' => '444666555', 'street' => 'Ogrodowa', 'house_number' => '108', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Paweł', 'mother_name' => 'Ewa'
            ],
            [
                'first_name' => 'Igor', 'last_name' => 'Piotrowski', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-09-07',
                'phone_number' => '333222111', 'street' => 'Leśna', 'house_number' => '43A', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => 'Jacek', 'mother_name' => 'Joanna'
            ],
            [
                'first_name' => 'Lena', 'last_name' => 'Baran', 'gender' => 'Kobieta', 'date_of_birth' => '2010-01-26',
                'phone_number' => '222111333', 'street' => 'Topolowa', 'house_number' => '9', 'zip_code' => '37-500', 'town' => 'Jarosław',
                'father_name' => 'Tomasz', 'mother_name' => 'Maria'
            ],
            [
                'first_name' => 'Aleksandra', 'last_name' => 'Brzoza', 'gender' => 'Kobieta', 'date_of_birth' => '2009-03-11',
                'phone_number' => '111333222', 'street' => 'Wrzosowa', 'house_number' => '63B', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Mikołaj', 'mother_name' => 'ALina'
            ],
            [
                'first_name' => 'Bogdan', 'last_name' => 'Mocarny', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-01-02',
                'phone_number' => '100010001', 'street' => 'Józefa Piłsudskiego', 'house_number' => '9', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => 'Józef', 'mother_name' => 'Alina'
            ],
            [
                'first_name' => 'Czesław', 'last_name' => 'Pobożny', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-04-19',
                'phone_number' => '100020001', 'street' => 'Rynek', 'house_number' => '1A', 'zip_code' => '39-127', 'town' => 'Olchowa',
                'father_name' => 'Stanisław', 'mother_name' => 'Monika'
            ],
            [
                'first_name' => 'Monika', 'last_name' => 'Grypa', 'gender' => 'Kobieta', 'date_of_birth' => '2009-06-14',
                'phone_number' => '100030001', 'street' => 'Brzozowa', 'house_number' => '13', 'zip_code' => '39-111', 'town' => 'Mała',
                'father_name' => 'Józef', 'mother_name' => 'Beata'
            ],
            [
                'first_name' => 'Kazimierz', 'last_name' => 'Moskal', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-08-22',
                'phone_number' => '100040001', 'street' => 'Wiejska', 'house_number' => '45', 'zip_code' => '35-021', 'town' => 'Rzeszów',
                'father_name' => 'Kazimierz', 'mother_name' => 'Jolanta'
            ],
            [
                'first_name' => 'Julia', 'last_name' => 'Kiepska', 'gender' => 'Kobieta', 'date_of_birth' => '2009-09-06',
                'phone_number' => '100050001', 'street' => 'Lipowa', 'house_number' => '128', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => 'Benedykt', 'mother_name' => 'Grażyna'
            ],
            [
                'first_name' => 'Wojciech', 'last_name' => 'Frydło', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-11-07',
                'phone_number' => '100060001', 'street' => 'Szkolna', 'house_number' => '28', 'zip_code' => '39-120', 'town' => 'Borek Mały',
                'father_name' => 'Janusz', 'mother_name' => 'Barbara'
            ],
            [
                'first_name' => 'Gabriela', 'last_name' => 'Wolna', 'gender' => 'Kobieta', 'date_of_birth' => '2010-12-29',
                'phone_number' => '100070001', 'street' => 'Strażacka', 'house_number' => '10', 'zip_code' => '36-072', 'town' => 'Świlcza',
                'father_name' => 'Tadeusz', 'mother_name' => 'Monika'
            ],
            [
                'first_name' => 'Amelia', 'last_name' => 'Pawrok', 'gender' => 'Kobieta', 'date_of_birth' => '2009-01-20',
                'phone_number' => '100080001', 'street' => 'Długa', 'house_number' => '52', 'zip_code' => '39-120', 'town' => 'Sędziszów Małopolski',
                'father_name' => 'Marian', 'mother_name' => 'Krystyna'
            ],
            [
                'first_name' => 'Zbigniew', 'last_name' => 'Rudny', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-02-28',
                'phone_number' => '100090001', 'street' => 'Krótka', 'house_number' => '16', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Robert', 'mother_name' => 'Aneta'
            ],
            [
                'first_name' => 'Jarosław', 'last_name' => 'Kaczka', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-03-02',
                'phone_number' => '900090009', 'street' => 'Parkowa', 'house_number' => '34', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Andrzej', 'mother_name' => 'Joanna'
            ],
            [
                'first_name' => 'Dorota', 'last_name' => 'Hamburger', 'gender' => 'Kobieta', 'date_of_birth' => '209-04-09',
                'phone_number' => '900080009', 'street' => 'Kwiatowa', 'house_number' => '6G', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Jacek', 'mother_name' => 'Ewa'
            ],
            [
                'first_name' => 'Emilia', 'last_name' => 'Zięba', 'gender' => 'Kobieta', 'date_of_birth' => '2009-05-08',
                'phone_number' => '900070009', 'street' => 'Słoneczna', 'house_number' => '18', 'zip_code' => '37-450', 'town' => 'Stalowa Wola',
                'father_name' => 'Krzysztof', 'mother_name' => 'Alicja'
            ],
            [
                'first_name' => 'Adrian', 'last_name' => 'Góra', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-06-13',
                'phone_number' => '900060009', 'street' => 'Ogrodowa', 'house_number' => '290', 'zip_code' => '39-400', 'town' => 'Tarnobrzeg',
                'father_name' => 'Piotr', 'mother_name' => 'Magdalena'
            ],
            [
                'first_name' => 'Bogumił', 'last_name' => 'Męski', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-07-16',
                'phone_number' => '900050009', 'street' => 'Zielona', 'house_number' => '76', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Marek', 'mother_name' => 'Katarzyna'
            ],
            [
                'first_name' => 'Alina', 'last_name' => 'Jajko', 'gender' => 'Kobieta', 'date_of_birth' => '2009-08-18',
                'phone_number' => '900040009', 'street' => 'Czerwona', 'house_number' => '9B', 'zip_code' => '37-100', 'town' => 'Łańcut',
                'father_name' => 'Tomasz', 'mother_name' => 'Beata'
            ],
            [
                'first_name' => 'Daniel', 'last_name' => 'Mały', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-09-30',
                'phone_number' => '900030009', 'street' => 'Ruda', 'house_number' => '1', 'zip_code' => '37-500', 'town' => 'Jarosław',
                'father_name' => 'Henryk', 'mother_name' => 'Renata'
            ],
            [
                'first_name' => 'Ewelina', 'last_name' => 'Rower', 'gender' => 'Kobieta', 'date_of_birth' => '2010-10-22',
                'phone_number' => '900020009', 'street' => 'Bordowa', 'house_number' => '3B', 'zip_code' => '37-450', 'town' => 'Stalowa Wola',
                'father_name' => 'Lucjan', 'mother_name' => 'Barbara'
            ],
            [
                'first_name' => 'Hanna', 'last_name' => 'Jasna', 'gender' => 'Kobieta', 'date_of_birth' => '2009-11-04',
                'phone_number' => '900010009', 'street' => 'Zółta', 'house_number' => '87', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Robert', 'mother_name' => 'Dorota'
            ],
            [
                'first_name' => 'Dawid', 'last_name' => 'Lis', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-12-20',
                'phone_number' => '100101001', 'street' => 'Niebieska', 'house_number' => '123', 'zip_code' => '38-500', 'town' => 'Sanok',
                'father_name' => 'Adam', 'mother_name' => 'Helena'
            ],
            [
                'first_name' => 'Iga', 'last_name' => 'Świątek', 'gender' => 'Kobieta', 'date_of_birth' => '2009-12-10',
                'phone_number' => '200202002', 'street' => 'Główna', 'house_number' => '43B', 'zip_code' => '37-450', 'town' => 'Stalowa Wola',
                'father_name' => 'Stefan', 'mother_name' => 'Maria'
            ],
            [
                'first_name' => 'Emanuel', 'last_name' => 'Czuba', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-11-04',
                'phone_number' => '300303003', 'street' => 'Kolejowa', 'house_number' => '48', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Bogdan', 'mother_name' => 'Irena'
            ],
            [
                'first_name' => 'Wiktoria', 'last_name' => 'Liczba', 'gender' => 'Kobieta', 'date_of_birth' => '2009-10-09',
                'phone_number' => '400404004', 'street' => 'Drogowa', 'house_number' => '8A', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Jarek', 'mother_name' => 'Dorota'
            ],
            [
                'first_name' => 'Fabian', 'last_name' => 'Szymański', 'gender' => 'Mężczyzna', 'date_of_birth' => '2010-09-21',
                'phone_number' => '500505005', 'street' => 'Polna', 'house_number' => '19', 'zip_code' => '36-072', 'town' => 'Świlcza',
                'father_name' => 'Norbert', 'mother_name' => 'Agnieszka'
            ],
            [
                'first_name' => 'Weronika', 'last_name' => 'Biegus', 'gender' => 'Kobieta', 'date_of_birth' => '2010-08-27',
                'phone_number' => '600606006', 'street' => 'Rzeczna', 'house_number' => '18', 'zip_code' => '37-500', 'town' => 'Jarosław',
                'father_name' => 'Daniel', 'mother_name' => 'Justyna'
            ],
            [
                'first_name' => 'Gabriel', 'last_name' => 'Morela', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-07-31',
                'phone_number' => '700707007', 'street' => 'Mokra', 'house_number' => '14', 'zip_code' => '39-100', 'town' => 'Ropczyce',
                'father_name' => 'Grzegorz', 'mother_name' => 'Katarzyna'
            ],
            [
                'first_name' => 'Urszula', 'last_name' => 'Jagnie', 'gender' => 'Kobieta', 'date_of_birth' => '2009-06-05',
                'phone_number' => '800808008', 'street' => 'Poprzeczna', 'house_number' => '30C', 'zip_code' => '38-500', 'town' => 'Sanok',
                'father_name' => 'Marcin', 'mother_name' => 'Marta'
            ],
            [
                'first_name' => 'Henryk', 'last_name' => 'Beczka', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-05-18',
                'phone_number' => '900909009', 'street' => 'Mleczna', 'house_number' => '9A', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Tadeusz', 'mother_name' => 'Elżbieta'
            ],
            [
                'first_name' => 'Sabina', 'last_name' => 'Żyto', 'gender' => 'Kobieta', 'date_of_birth' => '2009-04-19',
                'phone_number' => '100111001', 'street' => 'Parkowa', 'house_number' => '5', 'zip_code' => '39-300', 'town' => 'Mielec',
                'father_name' => 'Henryk', 'mother_name' => 'Danuta'
            ],
            [
                'first_name' => 'Igor', 'last_name' => 'Wilk', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-03-24',
                'phone_number' => '200222002', 'street' => 'Spokojna', 'house_number' => '35', 'zip_code' => '36-071', 'town' => 'Trzciana',
                'father_name' => 'Dariusz', 'mother_name' => 'Magdalena'
            ],
            [
                'first_name' => 'Otylia', 'last_name' => 'Jędrzejczak', 'gender' => 'Kobieta', 'date_of_birth' => '2009-02-14',
                'phone_number' => '300333003', 'street' => 'Ruchliwa', 'house_number' => '48', 'zip_code' => '35-021', 'town' => 'Rzeszów',
                'father_name' => 'Edward', 'mother_name' => 'Anna'
            ],
            [
                'first_name' => 'Jerzy', 'last_name' => 'Truskawka', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-01-01',
                'phone_number' => '400444004', 'street' => 'Długa', 'house_number' => '34', 'zip_code' => '39-127', 'town' => 'Olchowa',
                'father_name' => 'Fryderyk', 'mother_name' => 'Beata'
            ],
            [
                'first_name' => 'Natalia', 'last_name' => 'Licho', 'gender' => 'Kobieta', 'date_of_birth' => '2009-05-08',
                'phone_number' => '500555005', 'street' => 'Krótka', 'house_number' => '28C', 'zip_code' => '39-120', 'town' => 'Borek Mały',
                'father_name' => 'Grzegorz', 'mother_name' => 'Celina'
            ],
            [
                'first_name' => 'Łucja', 'last_name' => 'Gerwalna', 'gender' => 'Kobieta', 'date_of_birth' => '2010-07-25',
                'phone_number' => '600666006', 'street' => 'Krakowska', 'house_number' => '207', 'zip_code' => '37-100', 'town' => 'Łańcut',
                'father_name' => 'Marek', 'mother_name' => 'Irena'
            ],
            [
                'first_name' => 'Lucyna', 'last_name' => 'Nowak', 'gender' => 'Kobieta', 'date_of_birth' => '2009-02-22',
                'phone_number' => '700777007', 'street' => 'Rzeszowska', 'house_number' => '354B', 'zip_code' => '38-500', 'town' => 'Sanok',
                'father_name' => 'Piotr', 'mother_name' => 'Maria'
            ],
            [
                'first_name' => 'Kinga', 'last_name' => 'Rusin', 'gender' => 'Kobieta', 'date_of_birth' => '2009-09-09',
                'phone_number' => '800888008', 'street' => 'Zachodnia', 'house_number' => '6B', 'zip_code' => '36-071', 'town' => 'Trzciana',
                'father_name' => 'Tomasz', 'mother_name' => 'Agnieszka'
            ],
            [
                'first_name' => 'Judyta', 'last_name' => 'Zwolińska', 'gender' => 'Kobieta', 'date_of_birth' => '2009-11-08',
                'phone_number' => '900999009', 'street' => 'Wschodnia', 'house_number' => '45', 'zip_code' => '36-100', 'town' => 'Kolbuszowa',
                'father_name' => 'Robert', 'mother_name' => 'Elżbieta'
            ],
            [
                'first_name' => 'Emilia', 'last_name' => 'Kaczmarek', 'gender' => 'Kobieta', 'date_of_birth' => '2009-02-18',
                'phone_number' => '123000321', 'street' => 'Wierzbowa', 'house_number' => '20', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Jakub', 'mother_name' => 'Magdalena'
            ],
            [
                'first_name' => 'Maciej', 'last_name' => 'Łętkowski', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-07-12',
                'phone_number' => '987000789', 'street' => 'Słoneczna', 'house_number' => '34', 'zip_code' => '39-400', 'town' => 'Tarnobrzeg',
                'father_name' => 'Adam', 'mother_name' => 'Joanna'
            ],
            [
                'first_name' => 'Olgierd', 'last_name' => 'Ewerest', 'gender' => 'Mężczyzna', 'date_of_birth' => '2009-08-22',
                'phone_number' => '191919191', 'street' => 'Kwiatowa', 'house_number' => '53', 'zip_code' => '39-200', 'town' => 'Dębica',
                'father_name' => 'Krzysztof', 'mother_name' => 'Anna'
            ]
        ];

        foreach ($data as $person) {
            DB::table('data')->updateOrInsert(
                [
                    'phone_number' => $person['phone_number']
                ],
                [
                    'first_name' => $person['first_name'],
                    'last_name' => $person['last_name'],
                    'gender' => $person['gender'],
                    'date_of_birth' => $person['date_of_birth'],
                    'street' => $person['street'],
                    'house_number' => $person['house_number'],
                    'zip_code' => $person['zip_code'],
                    'town' => $person['town'],
                    'father_name' => $person['father_name'],
                    'mother_name' => $person['mother_name']
                ]
            );
        }
    }
}
