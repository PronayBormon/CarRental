<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'carname',
        'slug',
        'cartransmission',
        'carseat',
        'carinterior',
        'carcategory',
        'cartype',
        'carmake',
        'perhour',
        'perday',
        'short_desc',
        'desc',
        'image',
        'status',
    ];

    // Assuming table name is "cars" (plural of the model name)
    protected $table = 'cars';
}
