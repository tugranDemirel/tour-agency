<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'city_id',
        'name',
        'slug',
        'description',
        'is_active',
        'is_popular',
        'is_airport',
        'order'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function cityLocationCarPrices()
    {
        return $this->hasMany(CityLocationCarPrice::class);
    }

    public function cityLocationCarPrice()
    {
        return $this->hasOne(CityLocationCarPrice::class);
    }

    static function startPoint($id)
    {
        return CityLocation::where('id', $id)->first()->name;
    }
    static function endPoint($id)
    {
        return CityLocation::where('id', $id)->first()->name;
    }


}
