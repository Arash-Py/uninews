<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Car::factory(10)->create();
        \App\Models\User::factory()->create([
            "first_name" => "آرش",
            "last_name" => "پورابراهیمی",
            "national_code" => null,
            "phone" => "9308154312",
            "password" => '$2y$10$WTBucNi602VioN5s.djDY.DwbVHHaxe6qOUWvT/VX9qrQYX0/0WiO'
        ]);
        \App\Models\Province::factory(10)->create();
        \App\Models\City::factory(10)->create();
        \App\Models\Station::factory(10)->create();
        \App\Models\Place::factory(10)->create();
        \App\Models\Watchman::factory()->create([
            "first_name" => "آرش",
            "last_name" => "پورابراهیمی",
            "phone" => "9308154312",
            "password" => '$2y$10$WTBucNi602VioN5s.djDY.DwbVHHaxe6qOUWvT/VX9qrQYX0/0WiO',
            'status' => 'active'
        ]);
    }
}
