<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',              // إضافة slug لتجنب أخطاء SQL
        'address',
        'description',
        'images',
        'map_link',
        'open_time',
        'close_time',
        'contact_numbers',
        'ticket_price',
        'qr_code_image',     // مسار QR Code
        'payment_code',      // كود الدفع أو التذكرة
    ];

    protected $casts = [
        'images' => 'array',           // يحول JSON تلقائيًا إلى array
        'contact_numbers' => 'array',  // يحول JSON تلقائيًا إلى array
    ];
}
