<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone_number',
        'email',
    ] ;

    public function order()
    {
        return $this->hasOne(Order::class, 'customer_id', 'id');
    }

    public function orderedItem()
    {
        return $this->hasMany(OrderedItem::class, 'customer_id', 'id');
    }
}
