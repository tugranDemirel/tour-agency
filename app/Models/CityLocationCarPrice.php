<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityLocationCarPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_location_id',
        'parent_city_location_id',
        'car_id',
        'person_count',
        'price',
        'is_active',
    ];

    public function cityLocation()
    {
        return $this->belongsTo(CityLocation::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function getSartPoint($id, bool $isRound = false)
    {
        $cityLocationCarPrice = CityLocationCarPrice::find($id);
        if ($isRound === false)
            $cityLocation = CityLocation::find($cityLocationCarPrice->city_location_id);
        else
            $cityLocation = CityLocation::find($cityLocationCarPrice->parent_city_location_id);
        return $cityLocation->name;
    }
}
