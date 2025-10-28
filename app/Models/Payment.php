<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'spot_id',
        'payment_code',
        'amount',
        'status',
    ];

    // علاقة مع Spot
    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
