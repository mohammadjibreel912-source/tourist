<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaymentController extends Controller
{
    public function index()
    {
        // مثال: رابط الدفع أو أي بيانات تريد تحويلها لQR
        $paymentUrl = 'https://example.com/pay/12345';

        // إنشاء QR Code
        $qrCode = QrCode::size(200)->generate($paymentUrl);

        return view('admim.payment.index',compact('qrCode'));
    }

    public function createPayment(Spot $spot, $amount)
{
    $payment = Payment::create([
        'spot_id' => $spot->id,
        'amount' => $amount,
        'payment_code' => Str::upper(Str::random(10)), // توليد رقم دفع عشوائي
        'status' => 'pending',
    ]);

    return redirect()->route('payments.index')->with('success', 'Payment created');
}
}
