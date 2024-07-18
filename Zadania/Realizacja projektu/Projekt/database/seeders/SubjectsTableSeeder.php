<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => 'Matematyka'],
            ['name' => 'Informatyka'],
            ['name' => 'Fizyka'],
            ['name' => 'Chemia'],
            ['name' => 'Biologia'],
            ['name' => 'Geografia'],
            ['name' => 'Historia'],
            ['name' => 'Wiedza o społeczeństwie'],
            ['name' => 'Język angielski'],
            ['name' => 'Język włoski'],
            ['name' => 'Język niemiecki'],
            ['name' => 'Język polski'],
        ];

        foreach ($subjects as $subject) {
            DB::table('subjects')->updateOrInsert(
                [
                    'name' => $subject['name']
                ],
                []
            );
        }
    }
}
