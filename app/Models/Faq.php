<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'question',
        'answer',
    ];

    protected $fillable = [
        'title',
        'question',
        'answer',
        'is_active',
    ];

    protected $casts = [
        'title' => 'array',
        'question' => 'array',
        'answer' => 'array',
        'is_active' => 'boolean',
    ];
}
