<?php

namespace Database\Factories;

use App\Models\CityLocationCarPrice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $cityLocationCarPrice = CityLocationCarPrice::all();
        return [
            'author_name' => $users->random()->name,
            'author_email' => $users->random()->email,
            'author_url' => $this->faker->url,
            'city_location_car_price_id' => $cityLocationCarPrice->random()->id,
            'message' => $this->faker->paragraph(3),
            'is_approved' => $this->faker->boolean,
            'is_active' => $this->faker->boolean
        ];
    }
}
