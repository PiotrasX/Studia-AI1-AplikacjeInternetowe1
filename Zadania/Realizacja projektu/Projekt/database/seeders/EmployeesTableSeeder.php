<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idEmployee1 = DB::table('users')->where('email', 'admin1@example.com')->value('id');
        $idEmployee2 = DB::table('users')->where('email', 'admin2@example.com')->value('id');
        $idEmployee3 = DB::table('users')->where('email', 'pracownik1@example.com')->value('id');
        $idEmployee4 = DB::table('users')->where('email', 'pracownik2@example.com')->value('id');
        $idEmployee5 = DB::table('users')->where('email', 'pracownik3@example.com')->value('id');

        $employees = [
            ['user_id' => $idEmployee1, 'position' => 'Dyrektor'],
            ['user_id' => $idEmployee2, 'position' => 'Wicedyrektor'],
            ['user_id' => $idEmployee3, 'position' => 'Nauczyciel'],
            ['user_id' => $idEmployee4, 'position' => 'Nauczyciel'],
            ['user_id' => $idEmployee5, 'position' => 'Nauczyciel']
        ];

        foreach ($employees as $employee) {
            DB::table('employees')->updateOrInsert(
                [
                    'user_id' => $employee['user_id']
                ],
                [
                    'position' => $employee['position']
                ]
            );
        }
    }
}
