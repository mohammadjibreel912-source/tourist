<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spot;

class SpotSeeder extends Seeder
{
    public function run(): void
    {
        $spots = [
            [
                'name' => 'البتراء',
                'address' => 'محافظة معان',
                'description' => 'مدينة أثرية مشهورة بالنحت الصخري.',
                'images' => json_encode([
                    'spots/petra1.jpg',
                    'spots/petra2.jpg',
                    'spots/petra3.jpg'
                ]),
                'map_link' => 'https://goo.gl/maps/5oQxg7HqX1p2',
                'open_time' => '08:00:00',
                'close_time' => '18:00:00',
                'contact_numbers' => json_encode(['+962777123456', '+962777654321']),
                'ticket_price' => 50.00,
                'payment_code' => 'PAY-' . rand(100000, 999999)
            ],
            [
                'name' => 'البحر الميت',
                'address' => 'محافظة مادبا',
                'description' => 'أدنى نقطة على سطح الأرض ومياه مالحة.',
                'images' => json_encode([
                    'spots/deadsea1.jpg',
                    'spots/deadsea2.jpg'
                ]),
                'map_link' => 'https://goo.gl/maps/Xv7g3QhF7nF2',
                'open_time' => '07:00:00',
                'close_time' => '20:00:00',
                'contact_numbers' => json_encode(['+962777888999']),
                'ticket_price' => 20.00,
                'payment_code' => 'PAY-' . rand(100000, 999999)
            ],
            [
                'name' => 'جرش',
                'address' => 'محافظة جرش',
                'description' => 'مدينة رومانية قديمة وموقع أثري رائع.',
                'images' => json_encode([
                    'spots/jerash1.jpg',
                    'spots/jerash2.jpg'
                ]),
                'map_link' => 'https://goo.gl/maps/QJ5pD2kM8a72',
                'open_time' => '08:00:00',
                'close_time' => '17:00:00',
                'contact_numbers' => json_encode(['+962777333444']),
                'ticket_price' => 15.00,
                'payment_code' => 'PAY-' . rand(100000, 999999)
            ],
        ];

        foreach ($spots as $spot) {
            Spot::create($spot);
        }
    }
}
