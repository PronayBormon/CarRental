<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'carid',
        'order_id',
        'totalCost',
        'pickup_date',
        'pickup_time',
        'pickup_location',
        'drop_location',
        'return_date',
        'drop_time',
        'rent_type',
        'customer_name',
        'contact_number',
        'approval_status',
        'payment_status',
    ];
}
