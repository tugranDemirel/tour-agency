<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'description',
        'type'
    ];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }
}
