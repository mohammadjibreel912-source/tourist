<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // ← Add this

class QrTestController extends Controller
{
    public function generate($text = null)
    {
        // Generate random text if not provided
        $text = $text ?? 'CODE-' . strtoupper(Str::random(8));

        // QR image file path
        $fileName = 'qrcodes/' . $text . '.svg'; // Use .svg since your QR is SVG

        // Generate QR code as SVG
        $qr = QrCode::format('svg')->size(200)->generate($text);

        // Save QR code to storage/app/public/qrcodes/
        Storage::disk('public')->put($fileName, $qr);

        // Return JSON with the QR URL
        return response()->json([
            'text' => $text,
            'qr_url' => asset('storage/' . $fileName),
        ]);
    }
}
