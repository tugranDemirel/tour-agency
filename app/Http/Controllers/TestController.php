<?php

namespace App\Http\Controllers;

use App\Models\CityLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function createLocation()
    {
        $cityLocations = [
            'Adalar',
            'Arnavutköy',
            'Avcılar',
            'Bağcılar',
            'Bahçelievler',
            'Bakırköy',
            'Başakşehir',
            'Bayrampaşa',
            'Beşiktaş',
            'Beykoz',
            'Büyükçekmece',
            'Çatalca',
            'Çekmeköy',
            'Esenler',
            'Eyüpsultan',
            'Fatih',
            'Gaziosmanpaşa',
            'Güngören',
            'Kadıköy',
            'Kartal',
            'Maltepe',
            'Pendik',
            'Sancaktepe',
            'Sarıyer',
            'Silivri',
            'Sultangazi',
            'Şile',
            'Şişli',
            'Ümraniye',
        ];
        foreach( $cityLocations as $location)
        {
            CityLocation::create([
                'city_id' => 1,
                'name' => $location,
                'slug' => Str::slug($location),
                'description' => $location,
                'is_active' => 1,
                'is_popular' => 0,
                'is_airport' => 0,
                'order' => 0,
            ]);
        }
    }
}
