<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_name',
        'author_email',
        'author_url',
        'city_location_car_price_id',
        'message',
        'is_approved',
        'is_active'
    ];
}
