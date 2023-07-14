<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carModelId = CarModel::all()->random()->id;
        $languages = Language::all();
        $name = $this->faker->name;
        $color =  $this->faker->colorName;
        $desc = $this->faker->text;
        return [
            'car_model_id' => $carModelId,
            'name' => $name,
            'slug' => Str::slug($name),
            'color' => [
                $languages[0]->locale => $color,
                $languages[1]->locale => $color
            ],
            'year' => $this->faker->year,
            'km' => $this->faker->numberBetween(1000, 100000),
            'image' => $this->faker->imageUrl(640, 480, 'cars', true),
            'door' => $this->faker->numberBetween(2, 5),
            'description' => [
                $languages[0]->locale => $desc,
                $languages[1]->locale => $desc,
            ],
            'is_active' => $this->faker->boolean,
        ];
    }
}
