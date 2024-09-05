<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
        'name',
        'description',
        'price',
        'image_path',
        'properties',
    ];

    protected $casts = [
        'price' => 'json',
        'properties' => 'json',
    ];
}
