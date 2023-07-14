<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainConfig extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'price_description',
        'video_title',
        'video_description',
        'premium_text',
        'customer_text',
        'support_text',
    ];

    protected $fillable = [
        'filter_image',
        'price',
        'price_description',
        'video_title',
        'video_description',
        'video_url',
        'video_image',
        'premium_text',
        'customer_text',
        'support_text',
        'laptop_image',
    ];

    protected $casts = [
        'price_description' => 'array',
        'video_title' => 'array',
        'video_description' => 'array',
        'premium_text' => 'array',
        'customer_text' => 'array',
        'support_text' => 'array',
    ];


}
