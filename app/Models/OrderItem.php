<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty',
        'price',
        'car_id',
        'order_id',
        'brand'
    ];


    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
