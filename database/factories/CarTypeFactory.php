<?php

namespace Database\Factories;

use App\Models\CarType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarType>
 */
class CarTypeFactory extends Factory
{
    protected $model = CarType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carType = ['Sedan', 'VIP'];
        $car =  $carType[rand(0, 1)];
        return [
            'name' => $car,
            'slug' => Str::slug($car),
            'description' => $car,
            'status' => 1,
        ];
    }
}
