<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Car extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'color',
        'description',
    ];

    protected $fillable = [
        'car_model_id',
        'name',
        'slug',
        'color',
        'year',
        'km',
        'image',
        'door',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'color' => 'array',
        'description' => 'array',
    ];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public static function getCarName($id)
    {
        $car = Car::find($id);
        return $car->name;
    }
}
