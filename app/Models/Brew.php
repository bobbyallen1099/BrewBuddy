<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brew extends Model
{
    use HasFactory;
    public $fillable = [
        'external_id',
        'name',
        'tagline',
        'description',
        'since',
        'image_url',
        'volume',
        'abv',
        'ibu',
        'ph',
        'ingredients',
        'food_pairing',
        'brewers_tips',
        'additional_data'
    ];

    public $casts = [
      'ingredients' => 'array',
      'food_pairing' => 'array',
      'additional_data' => 'array',
    ];
}
