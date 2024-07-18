<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idCandidats = [];
        $candidates = [];
        $subjects = ['Biologia', 'Fizyka', 'Geografia', 'Historia', 'Chemia'];

        for ($i = 1; $i <= 85; $i++) {
            $email = 'login' . $i . '@example.com';
            $idCandidats[$i] = DB::table('users')->where('email', $email)->value('id');
        }

        for ($i = 1; $i <= 85; $i++) {
            $randomSubject = $subjects[array_rand($subjects)];

            $candidates[] = [
                'user_id' => $idCandidats[$i],
                'photo' => 'zdjecie' . $i . '.png',
                'account_balance' => rand(0, 1000),
                'result_math' => rand(30, 100),
                'result_polish_language' => rand(30, 100),
                'result_english_language' => rand(30, 100),
                'name_fourth_subject' => $randomSubject,
                'result_fourth_subject' => rand(30, 100)
            ];
        }

        foreach ($candidates as $candidate) {
            DB::table('candidates')->updateOrInsert(
                [
                    'user_id' => $candidate['user_id']
                ],
                [
                    'photo' => $candidate['photo'],
                    'account_balance' => $candidate['account_balance'],
                    'result_math' => $candidate['result_math'],
                    'result_polish_language' => $candidate['result_polish_language'],
                    'result_english_language' => $candidate['result_english_language'],
                    'name_fourth_subject' => $candidate['name_fourth_subject'],
                    'result_fourth_subject' => $candidate['result_fourth_subject']
                ]
            );
        }
    }
}
