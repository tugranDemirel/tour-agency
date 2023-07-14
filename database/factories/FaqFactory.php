<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [
                'en' => $this->faker->sentence(3),
                'tr' => $this->faker->sentence(3),
            ],
            'question' => [
                'en' => $this->faker->sentence(3),
                'tr' => $this->faker->sentence(3),
            ],
            'answer' => [
                'en' => $this->faker->sentence(3),
                'tr' => $this->faker->sentence(3),
            ],
            'is_active' => $this->faker->boolean,
        ];
    }
}
