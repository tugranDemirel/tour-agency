<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>[
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'slug' =>[
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'banner_image' => $this->faker->imageUrl(),
            'banner_title' => [
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'banner_text' => [
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'description' => [
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'content' => [
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'meta_title' => [
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'meta_description' => [
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'meta_keywords' => [
                'tr' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            'is_active' => $this->faker->boolean(),
        ];
    }
}
