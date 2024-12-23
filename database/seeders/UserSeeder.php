<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 usuarios
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => 'User ' . $index,
                'email' => 'user' . $index . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Cambia la contraseña por defecto si es necesario
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
