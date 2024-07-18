<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\RecruitmentStatus;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idMat = DB::table('subjects')->where('name', 'Matematyka')->value('id');
        $idInf = DB::table('subjects')->where('name', 'Informatyka')->value('id');
        $idFiz = DB::table('subjects')->where('name', 'Fizyka')->value('id');
        $idChe = DB::table('subjects')->where('name', 'Chemia')->value('id');
        $idBio = DB::table('subjects')->where('name', 'Biologia')->value('id');
        $idGeo = DB::table('subjects')->where('name', 'Geografia')->value('id');
        $idHis = DB::table('subjects')->where('name', 'Historia')->value('id');
        $idWos = DB::table('subjects')->where('name', 'Wiedza o społeczeństwie')->value('id');
        $idAng = DB::table('subjects')->where('name', 'Język angielski')->value('id');
        $idWlo = DB::table('subjects')->where('name', 'Język włoski')->value('id');
        $idNie = DB::table('subjects')->where('name', 'Język niemiecki')->value('id');
        $idPol = DB::table('subjects')->where('name', 'Język polski')->value('id');

        $z = 0.0;

        $profiles = [
            [
                'name' => 'Matematyczno-informatyczny 1',
                'subject_extended1_id' => $idMat, 'hours_subject_extended1' => 45,
                'subject_extended2_id' => $idInf, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idFiz, 'hours_subject_extended3' => 15,
                'number_of_seats' => 5,
                'weight_math' => 0.45, 'weight_polish_language' => 0.10, 'weight_english_language' => 0.15,
                'weight_biology' => $z, 'weight_chemistry' => $z, 'weight_physics' => 0.30, 'weight_geography' => $z, 'weight_history' => $z,
                'entry_fee' => 1300.0,
                'image' => 'matinf1.webp'
            ],
            [
                'name' => 'Matematyczno-informatyczny 2',
                'subject_extended1_id' => $idMat, 'hours_subject_extended1' => 45,
                'subject_extended2_id' => $idInf, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idAng, 'hours_subject_extended3' => 15,
                'number_of_seats' => 5,
                'weight_math' => 0.50, 'weight_polish_language' => 0.15, 'weight_english_language' => 0.35,
                'weight_biology' => $z, 'weight_chemistry' => $z, 'weight_physics' => $z, 'weight_geography' => $z, 'weight_history' => $z,
                'entry_fee' => 1300.0,
                'image' => 'matinf2.webp'
            ],
            [
                'name' => 'Matematyczno-chemiczny 1',
                'subject_extended1_id' => $idMat, 'hours_subject_extended1' => 45,
                'subject_extended2_id' => $idChe, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idFiz, 'hours_subject_extended3' => 15,
                'number_of_seats' => 3,
                'weight_math' => 0.50, 'weight_polish_language' => 0.10, 'weight_english_language' => 0.05,
                'weight_biology' => $z, 'weight_chemistry' => 0.35, 'weight_physics' => 0.35, 'weight_geography' => $z, 'weight_history' => $z,
                'entry_fee' => 1500.0,
                'image' => 'matchem1.webp'
            ],
            [
                'name' => 'Matematyczno-chemiczny 2',
                'subject_extended1_id' => $idMat, 'hours_subject_extended1' => 45,
                'subject_extended2_id' => $idChe, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idAng, 'hours_subject_extended3' => 15,
                'number_of_seats' => 3,
                'weight_math' => 0.40, 'weight_polish_language' => 0.10, 'weight_english_language' => 0.20,
                'weight_biology' => $z, 'weight_chemistry' => 0.30, 'weight_physics' => $z, 'weight_geography' => $z, 'weight_history' => $z,
                'entry_fee' => 1500.0,
                'image' => 'matchem2.webp'
            ],
            [
                'name' => 'Biologiczno-chemiczno-fizyczny',
                'subject_extended1_id' => $idBio, 'hours_subject_extended1' => 30,
                'subject_extended2_id' => $idChe, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idFiz, 'hours_subject_extended3' => 30,
                'number_of_seats' => 4,
                'weight_math' => 0.15, 'weight_polish_language' => 0.10, 'weight_english_language' => $z,
                'weight_biology' => 0.75, 'weight_chemistry' => 0.75, 'weight_physics' => 0.75, 'weight_geography' => $z, 'weight_history' => $z,
                'entry_fee' => 1600.0,
                'image' => 'biolchemfiz.webp'
            ],
            [
                'name' => 'Biologiczno-chemiczno-matematyczny',
                'subject_extended1_id' => $idBio, 'hours_subject_extended1' => 30,
                'subject_extended2_id' => $idChe, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idMat, 'hours_subject_extended3' => 30,
                'number_of_seats' => 4,
                'weight_math' => 0.45, 'weight_polish_language' => 0.10, 'weight_english_language' => $z,
                'weight_biology' => 0.45, 'weight_chemistry' => 0.45, 'weight_physics' => $z, 'weight_geography' => $z, 'weight_history' => $z,
                'entry_fee' => 1600.0,
                'image' => 'biolchemmat.webp'
            ],
            [
                'name' => 'Humanistyczny',
                'subject_extended1_id' => $idPol, 'hours_subject_extended1' => 40,
                'subject_extended2_id' => $idWos, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idHis, 'hours_subject_extended3' => 20,
                'number_of_seats' => 7,
                'weight_math' => $z, 'weight_polish_language' => 0.35, 'weight_english_language' => 0.15,
                'weight_biology' => $z, 'weight_chemistry' => $z, 'weight_physics' => $z, 'weight_geography' => $z, 'weight_history' => 0.50,
                'entry_fee' => 900.0,
                'image' => 'human.webp'
            ],
            [
                'name' => 'Prawniczy 1',
                'subject_extended1_id' => $idWos, 'hours_subject_extended1' => 45,
                'subject_extended2_id' => $idPol, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idGeo, 'hours_subject_extended3' => 15,
                'number_of_seats' => 3,
                'weight_math' => 0.25, 'weight_polish_language' => 0.30, 'weight_english_language' => 0.10,
                'weight_biology' => $z, 'weight_chemistry' => $z, 'weight_physics' => $z, 'weight_geography' => 0.35, 'weight_history' => 0.35,
                'entry_fee' => 2100.0,
                'image' => 'praw1.webp'
            ],
            [
                'name' => 'Prawniczy 2',
                'subject_extended1_id' => $idWos, 'hours_subject_extended1' => 45,
                'subject_extended2_id' => $idPol, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idAng, 'hours_subject_extended3' => 15,
                'number_of_seats' => 3,
                'weight_math' => 0.10, 'weight_polish_language' => 0.30, 'weight_english_language' => 0.25,
                'weight_biology' => $z, 'weight_chemistry' => $z, 'weight_physics' => $z, 'weight_geography' => $z, 'weight_history' => 0.35,
                'entry_fee' => 2100.0,
                'image' => 'praw2.webp'
            ],
            [
                'name' => 'Językowy',
                'subject_extended1_id' => $idAng, 'hours_subject_extended1' => 30,
                'subject_extended2_id' => $idWlo, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idNie, 'hours_subject_extended3' => 30,
                'number_of_seats' => 7,
                'weight_math' => $z, 'weight_polish_language' => 0.35, 'weight_english_language' => 0.50,
                'weight_biology' => $z, 'weight_chemistry' => $z, 'weight_physics' => $z, 'weight_geography' => 0.15, 'weight_history' => $z,
                'entry_fee' => 1050.0,
                'image' => 'jez.webp'
            ],
            [
                'name' => 'Menadżerko-ekonomiczny',
                'subject_extended1_id' => $idMat, 'hours_subject_extended1' => 40,
                'subject_extended2_id' => $idGeo, 'hours_subject_extended2' => 30,
                'subject_extended3_id' => $idAng, 'hours_subject_extended3' => 20,
                'number_of_seats' => 5,
                'weight_math' => 0.35, 'weight_polish_language' => 0.10, 'weight_english_language' => 0.25,
                'weight_biology' => $z, 'weight_chemistry' => $z, 'weight_physics' => $z, 'weight_geography' => 0.30, 'weight_history' => $z,
                'entry_fee' => 950.0,
                'image' => 'meneko.webp'
            ]
        ];

        foreach ($profiles as $profile) {
            DB::table('profiles')->updateOrInsert(
                [
                    'name' => $profile['name']
                ],
                [
                    'subject_extended1_id' => $profile['subject_extended1_id'],
                    'hours_subject_extended1' => $profile['hours_subject_extended1'],
                    'subject_extended2_id' => $profile['subject_extended2_id'],
                    'hours_subject_extended2' => $profile['hours_subject_extended2'],
                    'subject_extended3_id' => $profile['subject_extended3_id'],
                    'hours_subject_extended3' => $profile['hours_subject_extended3'],
                    'number_of_seats' => $profile['number_of_seats'],
                    'weight_math' => $profile['weight_math'],
                    'weight_polish_language' => $profile['weight_polish_language'],
                    'weight_english_language' => $profile['weight_english_language'],
                    'weight_biology' => $profile['weight_biology'],
                    'weight_chemistry' => $profile['weight_chemistry'],
                    'weight_physics' => $profile['weight_physics'],
                    'weight_geography' => $profile['weight_geography'],
                    'weight_history' => $profile['weight_history'],
                    'entry_fee' => $profile['entry_fee'],
                    'image' => $profile['image']
                ]
            );
        }
    }
}
