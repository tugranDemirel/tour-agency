<?php

namespace Database\Factories;

use App\Enum\CarEnum;
use App\Enum\CityLocationEnum;
use App\Models\Car;
use App\Models\CityLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CityLocationCarPrice>
 */
class CityLocationCarPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locations = CityLocation::where('is_active', CityLocationEnum::IS_ACTIVE)->get();
        $cars = Car::where('is_active', CarEnum::IS_ACTIVE)->get();
        return [
            'city_location_id' => $locations->random()->id,
            'parent_city_location_id' => $locations->random()->id,
            'car_id' => $cars->random()->id,
            'person_count' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 1000),
            'is_active' => $this->faker->boolean
        ];
    }
}
