<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar al seeder de usuarios
        $this->call(UserSeeder::class);

        // Llamar al seeder de estudiantes
        $this->call(StudentSeeder::class);
    }
}
