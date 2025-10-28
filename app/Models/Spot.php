<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'images', // JSON array
        'map_link',
        'open_time',
        'close_time',
        'contact_numbers', // JSON array
        'ticket_price',
        'payment_code'
    ];

    protected $casts = [
        'images' => 'array',
        'contact_numbers' => 'array',
    ];
}
