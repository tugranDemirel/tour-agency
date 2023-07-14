<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CityLocation>
 */
class CityLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = City::first();
        $cityLocations = [
            'Adalar',
            'Arnavutköy',
            'Ataşehir',
            'Avcılar',
            'Bağcılar',
            'Bahçelievler',
            'Bakırköy',
            'Başakşehir',
            'Bayrampaşa',
            'Beşiktaş',
            'Beykoz',
            'Beylikdüzü',
            'Beyoğlu',
            'Büyükçekmece',
            'Çatalca',
            'Çekmeköy',
            'Esenler',
            'Esenyurt',
            'Eyüpsultan',
            'Fatih',
            'Gaziosmanpaşa',
            'Güngören',
            'Kadıköy',
            'Kağıthane',
            'Kartal',
            'Küçükçekmece',
            'Maltepe',
            'Pendik',
            'Sancaktepe',
            'Sarıyer',
            'Silivri',
            'Sultanbeyli',
            'Sultangazi',
            'Şile',
            'Şişli',
            'Tuzla',
            'Ümraniye',
            'Üsküdar',
            'Zeytinburnu',
        ];

        $loc = array_rand($cityLocations, 1);
        return [
            'city_id' => $city->id,
            'name' => $cityLocations[$loc],
            'slug' => Str::slug($cityLocations[$loc]),
            'description' => $this->faker->sentence,
            'is_active' => $this->faker->boolean(1),
            'is_popular' => $this->faker->boolean(1),
            'is_airport' => $this->faker->boolean(1),
        ];
    }
}
