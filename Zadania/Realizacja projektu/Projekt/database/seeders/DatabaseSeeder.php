<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DataTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CandidatesTableSeeder::class,
            EmployeesTableSeeder::class,
            SubjectsTableSeeder::class,
            ProfilesTableSeeder::class,
            RegistrationsTableSeeder::class,
        ]);
    }
}
