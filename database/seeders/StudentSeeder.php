<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 100) as $index) {
            DB::table('students')->insert([
                'first_name' => 'FirstName ' . $index,
                'last_name' => 'LastName ' . $index,
                'email' => 'student' . $index . '@example.com',
                'phone' => '9' . rand(10000000, 99999999), // Genera un número de teléfono válido
                'birth_date' => Carbon::create(rand(1990, 2000), rand(1, 12), rand(1, 28)), // Fecha de nacimiento aleatoria
                'enrollment_date' => now(),
                'user_id' => rand(1, 10), // Asigna un usuario aleatorio a cada estudiante
                'status' => rand(0, 1), // Estado aleatorio (activo o inactivo) 
            ]);
        }
    }
}
