<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mi1 = DB::table('profiles')->where('name', 'Matematyczno-informatyczny 1')->first();
        $mi2 = DB::table('profiles')->where('name', 'Matematyczno-informatyczny 2')->first();
        $mc1 = DB::table('profiles')->where('name', 'Matematyczno-chemiczny 1')->first();
        $mc2 = DB::table('profiles')->where('name', 'Matematyczno-chemiczny 2')->first();
        $bcf = DB::table('profiles')->where('name', 'Biologiczno-chemiczno-fizyczny')->first();
        $bcm = DB::table('profiles')->where('name', 'Biologiczno-chemiczno-matematyczny')->first();
        $hum = DB::table('profiles')->where('name', 'Humanistyczny')->first();
        $pr1 = DB::table('profiles')->where('name', 'Prawniczy 1')->first();
        $pr2 = DB::table('profiles')->where('name', 'Prawniczy 2')->first();
        $jez = DB::table('profiles')->where('name', 'Językowy')->first();
        $mek = DB::table('profiles')->where('name', 'Menadżerko-ekonomiczny')->first();

        $candidats = [];
        $registrations = [];
        $profiles = [$mi1, $mi2, $mc1, $mc2, $bcf, $bcm, $hum, $pr1, $pr2, $jez, $mek];

        for ($i = 1; $i <= 85; $i++) {
            $email = 'login' . $i . '@example.com';
            $candidats[$i] = DB::table('candidates')->join('users', 'candidates.user_id', '=', 'users.id')->where('users.email', $email)->select('candidates.*')->first();
        }

        for ($i = 1; $i <= 85; $i++) {
            $randomProfile = $profiles[array_rand($profiles)];
            $totalPaid = rand(0, 1500);
            if ($totalPaid < 700) {
                $totalPaid = $totalPaid * 2;
            }

            $registrations[] = [
                'candidate_id' => $candidats[$i]->id,
                'date_of_submission' => $this->randomDateBetween('2024-05-01', '2024-05-10'),
                'profile_id' => $randomProfile->id,
                'total_paid' => $totalPaid,
                'point_score' => $this->calculatePointScore($candidats[$i], $randomProfile)
            ];
        }

        usort($registrations, function ($a, $b) {
            return $a['date_of_submission'] <=> $b['date_of_submission'];
        });

        foreach ($registrations as $registration) {
            DB::table('registrations')->updateOrInsert(
                [
                    'candidate_id' => $registration['candidate_id']
                ],
                [
                    'date_of_submission' => $registration['date_of_submission'],
                    'profile_id' => $registration['profile_id'],
                    'total_paid' => $registration['total_paid'],
                    'point_score' => $registration['point_score']
                ]
            );
        }
    }

    private function calculatePointScore($candidate, $profile)
    {
        $score = 0;

        $score += $candidate->result_math * $profile->weight_math;
        $score += $candidate->result_polish_language * $profile->weight_polish_language;
        $score += $candidate->result_english_language * $profile->weight_english_language;

        $weight_fourth_subject = match ($candidate->name_fourth_subject) {
            'Biologia' => $profile->weight_biology,
            'Fizyka' => $profile->weight_physics,
            'Geografia' => $profile->weight_geography,
            'Historia' => $profile->weight_history,
            'Chemia' => $profile->weight_chemistry,
            default => 0
        };

        $score += $candidate->result_fourth_subject * $weight_fourth_subject;

        return $score;
    }

    private function randomDateBetween($startDate, $endDate)
    {
        return Carbon::createFromTimestamp(rand(strtotime($startDate), strtotime($endDate)))->toDateString();
    }
}
