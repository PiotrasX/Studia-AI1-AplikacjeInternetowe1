<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Employees/Pracownicy
        $idAdmin1 = DB::table('data')->where('phone_number', '123456789')->value('id');
        $idAdmin2 = DB::table('data')->where('phone_number', '987654321')->value('id');
        $idEmployee1 = DB::table('data')->where('phone_number', '123123123')->value('id');
        $idEmployee2 = DB::table('data')->where('phone_number', '456456456')->value('id');
        $idEmployee3 = DB::table('data')->where('phone_number', '789789789')->value('id');

        // Candidates/Kandydaci
        $idCandidat1 = DB::table('data')->where('phone_number', '111111111')->value('id');
        $idCandidat2 = DB::table('data')->where('phone_number', '222222222')->value('id');
        $idCandidat3 = DB::table('data')->where('phone_number', '333333333')->value('id');
        $idCandidat4 = DB::table('data')->where('phone_number', '444444444')->value('id');
        $idCandidat5 = DB::table('data')->where('phone_number', '555555555')->value('id');
        $idCandidat6 = DB::table('data')->where('phone_number', '666666666')->value('id');
        $idCandidat7 = DB::table('data')->where('phone_number', '777777777')->value('id');
        $idCandidat8 = DB::table('data')->where('phone_number', '888888888')->value('id');
        $idCandidat9 = DB::table('data')->where('phone_number', '999999999')->value('id');
        $idCandidat10 = DB::table('data')->where('phone_number', '111222333')->value('id');
        $idCandidat11 = DB::table('data')->where('phone_number', '222333111')->value('id');
        $idCandidat12 = DB::table('data')->where('phone_number', '333111222')->value('id');
        $idCandidat13 = DB::table('data')->where('phone_number', '444555666')->value('id');
        $idCandidat14 = DB::table('data')->where('phone_number', '555666444')->value('id');
        $idCandidat15 = DB::table('data')->where('phone_number', '666444555')->value('id');
        $idCandidat16 = DB::table('data')->where('phone_number', '777888999')->value('id');
        $idCandidat17 = DB::table('data')->where('phone_number', '888999777')->value('id');
        $idCandidat18 = DB::table('data')->where('phone_number', '999777888')->value('id');
        $idCandidat19 = DB::table('data')->where('phone_number', '101010101')->value('id');
        $idCandidat20 = DB::table('data')->where('phone_number', '202020202')->value('id');
        $idCandidat21 = DB::table('data')->where('phone_number', '303030303')->value('id');
        $idCandidat22 = DB::table('data')->where('phone_number', '404040404')->value('id');
        $idCandidat23 = DB::table('data')->where('phone_number', '505050505')->value('id');
        $idCandidat24 = DB::table('data')->where('phone_number', '606060606')->value('id');
        $idCandidat25 = DB::table('data')->where('phone_number', '707070707')->value('id');
        $idCandidat26 = DB::table('data')->where('phone_number', '808080808')->value('id');
        $idCandidat27 = DB::table('data')->where('phone_number', '909090909')->value('id');
        $idCandidat28 = DB::table('data')->where('phone_number', '102030405')->value('id');
        $idCandidat29 = DB::table('data')->where('phone_number', '203040506')->value('id');
        $idCandidat30 = DB::table('data')->where('phone_number', '304050607')->value('id');
        $idCandidat31 = DB::table('data')->where('phone_number', '405060708')->value('id');
        $idCandidat32 = DB::table('data')->where('phone_number', '506070809')->value('id');
        $idCandidat33 = DB::table('data')->where('phone_number', '908070605')->value('id');
        $idCandidat34 = DB::table('data')->where('phone_number', '807060504')->value('id');
        $idCandidat35 = DB::table('data')->where('phone_number', '706050403')->value('id');
        $idCandidat36 = DB::table('data')->where('phone_number', '605040302')->value('id');
        $idCandidat37 = DB::table('data')->where('phone_number', '504030201')->value('id');
        $idCandidat38 = DB::table('data')->where('phone_number', '999888777')->value('id');
        $idCandidat39 = DB::table('data')->where('phone_number', '888777999')->value('id');
        $idCandidat40 = DB::table('data')->where('phone_number', '777999888')->value('id');
        $idCandidat41 = DB::table('data')->where('phone_number', '666555444')->value('id');
        $idCandidat42 = DB::table('data')->where('phone_number', '555444666')->value('id');
        $idCandidat43 = DB::table('data')->where('phone_number', '444666555')->value('id');
        $idCandidat44 = DB::table('data')->where('phone_number', '333222111')->value('id');
        $idCandidat45 = DB::table('data')->where('phone_number', '222111333')->value('id');
        $idCandidat46 = DB::table('data')->where('phone_number', '111333222')->value('id');
        $idCandidat47 = DB::table('data')->where('phone_number', '100010001')->value('id');
        $idCandidat48 = DB::table('data')->where('phone_number', '100020001')->value('id');
        $idCandidat49 = DB::table('data')->where('phone_number', '100030001')->value('id');
        $idCandidat50 = DB::table('data')->where('phone_number', '100040001')->value('id');
        $idCandidat51 = DB::table('data')->where('phone_number', '100050001')->value('id');
        $idCandidat52 = DB::table('data')->where('phone_number', '100060001')->value('id');
        $idCandidat53 = DB::table('data')->where('phone_number', '100070001')->value('id');
        $idCandidat54 = DB::table('data')->where('phone_number', '100080001')->value('id');
        $idCandidat55 = DB::table('data')->where('phone_number', '100090001')->value('id');
        $idCandidat56 = DB::table('data')->where('phone_number', '900090009')->value('id');
        $idCandidat57 = DB::table('data')->where('phone_number', '900080009')->value('id');
        $idCandidat58 = DB::table('data')->where('phone_number', '900070009')->value('id');
        $idCandidat59 = DB::table('data')->where('phone_number', '900060009')->value('id');
        $idCandidat60 = DB::table('data')->where('phone_number', '900050009')->value('id');
        $idCandidat61 = DB::table('data')->where('phone_number', '900040009')->value('id');
        $idCandidat62 = DB::table('data')->where('phone_number', '900030009')->value('id');
        $idCandidat63 = DB::table('data')->where('phone_number', '900020009')->value('id');
        $idCandidat64 = DB::table('data')->where('phone_number', '900010009')->value('id');
        $idCandidat65 = DB::table('data')->where('phone_number', '100101001')->value('id');
        $idCandidat66 = DB::table('data')->where('phone_number', '200202002')->value('id');
        $idCandidat67 = DB::table('data')->where('phone_number', '300303003')->value('id');
        $idCandidat68 = DB::table('data')->where('phone_number', '400404004')->value('id');
        $idCandidat69 = DB::table('data')->where('phone_number', '500505005')->value('id');

        $idCandidat70 = DB::table('data')->where('phone_number', '600606006')->value('id');
        $idCandidat71 = DB::table('data')->where('phone_number', '700707007')->value('id');
        $idCandidat72 = DB::table('data')->where('phone_number', '800808008')->value('id');
        $idCandidat73 = DB::table('data')->where('phone_number', '900909009')->value('id');
        $idCandidat74 = DB::table('data')->where('phone_number', '100111001')->value('id');
        $idCandidat75 = DB::table('data')->where('phone_number', '200222002')->value('id');
        $idCandidat76 = DB::table('data')->where('phone_number', '300333003')->value('id');
        $idCandidat77 = DB::table('data')->where('phone_number', '400444004')->value('id');
        $idCandidat78 = DB::table('data')->where('phone_number', '500555005')->value('id');
        $idCandidat79 = DB::table('data')->where('phone_number', '600666006')->value('id');
        $idCandidat80 = DB::table('data')->where('phone_number', '700777007')->value('id');
        $idCandidat81 = DB::table('data')->where('phone_number', '800888008')->value('id');
        $idCandidat82 = DB::table('data')->where('phone_number', '900999009')->value('id');
        $idCandidat83 = DB::table('data')->where('phone_number', '123000321')->value('id');
        $idCandidat84 = DB::table('data')->where('phone_number', '987000789')->value('id');
        $idCandidat85 = DB::table('data')->where('phone_number', '191919191')->value('id');

        $idAdmin = DB::table('roles')->where('name', 'admin')->value('id');
        $idEmployee = DB::table('roles')->where('name', 'pracownik')->value('id');
        $idCandidat = DB::table('roles')->where('name', 'kandydat')->value('id');

        $users = [
            // Employees/Pracownicy
            ['email' => 'admin1@example.com', 'password' => Hash::make('haslo'), 'data_id' => $idAdmin1, 'role_id' => $idAdmin],
            ['email' => 'admin2@example.com', 'password' => Hash::make('haslo'), 'data_id' => $idAdmin2, 'role_id' => $idAdmin],
            ['email' => 'pracownik1@example.com', 'password' => Hash::make('haslo'), 'data_id' => $idEmployee1, 'role_id' => $idEmployee],
            ['email' => 'pracownik2@example.com', 'password' => Hash::make('haslo'), 'data_id' => $idEmployee2, 'role_id' => $idEmployee],
            ['email' => 'pracownik3@example.com', 'password' => Hash::make('haslo'), 'data_id' => $idEmployee3, 'role_id' => $idEmployee],

            // Candidates/Kandydaci
            ['email' => 'login1@example.com', 'password' => Hash::make('haslo'), 'data_id' => $idCandidat1, 'role_id' => $idCandidat] // Reszta generowana w funkcji
        ];

        for ($i = 2; $i <= 85; $i++) {
            $users[] = [
                'email' => 'login' . $i . '@example.com',
                'password' => Hash::make('haslo'),
                'data_id' => ${'idCandidat' . $i},
                'role_id' => $idCandidat
            ];
        }

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                [
                    'email' => $user['email']
                ],
                [
                    'password' => $user['password'],
                    'data_id' => $user['data_id'],
                    'role_id' => $user['role_id']
                ]
            );
        }
    }
}
