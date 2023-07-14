<?php

namespace Database\Seeders;

use App\Models\CityLocationCarPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityLocationCarPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CityLocationCarPrice::factory()->count(10)->create();
    }
}
