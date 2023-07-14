<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'slug',
        'banner_title',
        'banner_text',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable = [
        'title',
        'slug',
        'banner_image',
        'banner_title',
        'banner_text',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
    ];

    protected $casts = [
        'title' => 'array',
        'slug' => 'array',
        'banner_title' => 'array',
        'banner_text' => 'array',
        'description' => 'array',
        'content' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array',
        'is_active' => 'boolean',
    ];
}
