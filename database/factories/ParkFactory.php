<?php

namespace Database\Factories;

use App\Models\Park;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ParkFactory extends Factory
{
    protected $model = Park::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->word(),
            'watchman_id' => $this->faker->word(),
            'place_id' => $this->faker->word(),
            'car_id' => $this->faker->word(),
            'status' => $this->faker->word(),
            'price' => $this->faker->randomNumber(),
            'start' => Carbon::now(),
            'stop' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
