<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spot;
use Illuminate\Support\Str;

class SpotSeeder extends Seeder
{
    public function run(): void
    {
        $spots = [
            [
                'name' => 'Amazing Park',
                'slug' => Str::slug('Amazing Park'),
                'category' => 'Park',
                'address' => '123 Main Street',
                'city' => 'Amman',
                'description' => 'A beautiful park with 360° virtual tour',
                'images' => [
                    'spots/amazing1.jpg',
                    'spots/amazing2.jpg'
                ],
                'ticket_price' => 10.50,
                'daily_ticket_limit' => 500,
                'contact_numbers' => ['+962788888888', '+962799999999'],
            ],
            [
                'name' => 'Historic Museum',
                'slug' => Str::slug('Historic Museum'),
                'category' => 'Museum',
                'address' => '456 Museum Rd',
                'city' => 'Irbid',
                'description' => 'Explore the rich history of Jordan',
                'images' => [
                    'spots/museum1.jpg',
                    'spots/museum2.jpg'
                ],
                'ticket_price' => 15.00,
                'daily_ticket_limit' => 300,
                'contact_numbers' => ['+962777777777'],
            ],
        ];

        foreach ($spots as $spot) {
            Spot::create($spot);
        }
    }
}
