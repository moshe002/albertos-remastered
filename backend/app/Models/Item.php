<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'item_name',
        'item_type',
        'item_ingredients',
        'size',
        'cheese_type',
        'quantity',
        'price',
        'image_path',
        'order_id',
    ];
}
