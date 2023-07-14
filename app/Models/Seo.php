<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Seo extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable =  [
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    protected $casts = [
        'meta_title' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array',
    ];
}
