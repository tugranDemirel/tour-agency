<?php

namespace Database\Seeders;

use App\Models\CityLocation;
use Database\Factories\CityLocationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CityLocation::factory()->count(10)->create();
    }
}
