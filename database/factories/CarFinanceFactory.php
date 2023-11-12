<?php

namespace Database\Factories;

use App\Models\CarFinance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CarFinanceFactory extends Factory
{
    protected $model = CarFinance::class;

    public function definition(): array
    {
        return [
            'car_id' => $this->faker->randomNumber(),
            'type' => $this->faker->word(),
            'amount' => $this->faker->randomNumber(),
            'park_id' => $this->faker->randomNumber(),
            'pay_id' => $this->faker->randomNumber(),
            'watchman_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
