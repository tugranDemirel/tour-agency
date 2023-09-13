<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'favicon',
        'contact_image',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'currency'
    ];
}
