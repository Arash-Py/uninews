<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition(): array
    {
        $provinces = Province::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'province_id' => $this->faker->randomElement($provinces),
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}
