<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'number' => $this->faker->randomNumber(5),
            'word' => $this->faker->word(),
            'region_number' => $this->faker->randomNumber(2),
            'balance' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomElement($users),
            'verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
