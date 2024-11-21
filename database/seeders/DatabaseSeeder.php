<?php

namespace Database\Seeders\vell_ITAcademy\student_grades_apiREST\database\seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\SubjectSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StudentSeeder::class,
            SubjectSeeder::class,
            GradeSeeder::class,
        ]);
    }
}
