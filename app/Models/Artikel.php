<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titel',
        'afbeelding',
        'content',
        'publicatiedatum',
    ];

    protected $casts = [
        'publicatiedatum' => 'date',
    ];
}

