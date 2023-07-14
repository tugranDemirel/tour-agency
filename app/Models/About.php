<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name',
        'slug',
        'short_desc',
        'premium_text',
        'customer_text',
        'support_text',
        'language_text',
        'accessibility_text',
        'pet_allow_text',
        'mission',
        'vision',
        'banner_title',
        'banner_text',
    ];

    protected $fillable = [
        'image',
        'banner_image',
        'name',
        'slug',
        'short_desc',
        'premium_text',
        'customer_text',
        'support_text',
        'language_text',
        'accessibility_text',
        'pet_allow_text',
        'mission',
        'vision',
        'banner_title',
        'banner_text',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'short_desc' => 'array',
        'premium_text' => 'array',
        'customer_text' => 'array',
        'support_text' => 'array',
        'language_text' => 'array',
        'accessibility_text' => 'array',
        'pet_allow_text' => 'array',
        'mission' => 'array',
        'vision' => 'array',
        'banner_title' => 'array',
        'banner_text' => 'array',
    ];
}
