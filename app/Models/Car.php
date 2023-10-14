<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'registration_date',
        'engine_size',
        'price',
        'is_active'
    ];

    public function tags()
    {

        return $this->belongsToMany(Tag::class, 'car_tags', 'car_id', 'tag_id');
    }
}
