<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StationFactory extends Factory
{
    protected $model = Station::class;

    public function definition(): array
    {
        $cities = City::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'lat' => $this->faker->latitude(),
            'lng' => $this->faker->longitude(),
            'city_id' => $this->faker->randomElement($cities),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
