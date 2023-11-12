<?php

namespace Database\Factories;

use App\Models\Watchman;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WatchmanFactory extends Factory
{
    protected $model = Watchman::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'phone' => fake()->phoneNumber(),
            'password' => '$2y$10$WTBucNi602VioN5s.djDY.DwbVHHaxe6qOUWvT/VX9qrQYX0/0WiO', // 123456
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
