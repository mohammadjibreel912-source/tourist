<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spot;       // استيراد نموذج Spot
use App\Models\Payment;    // استيراد نموذج Payment
use Illuminate\Support\Str; // استيراد Str للـ random string


class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spots = Spot::all();

        foreach ($spots as $spot) {
            Payment::create([
                'spot_id' => $spot->id,
                'amount' => rand(50, 500),
                'payment_code' => Str::upper(Str::random(10)),
                'status' => 'pending',
            ]);
        }
    }
}
