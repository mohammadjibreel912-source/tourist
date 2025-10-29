<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // تأكد من تثبيت package QR

class SpotController extends Controller
{
    public function index()
    {
        $spots = Spot::all();
        return view('admim.spots.index', compact('spots'));
    }

    public function create()
    {
        return view('admim.spots.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'map_link' => 'nullable|string|max:500',
            'open_time' => 'nullable',
            'close_time' => 'nullable',
            'contact_numbers' => 'nullable|array',
            'ticket_price' => 'required|numeric',
        ]);

        // رفع الصور وحفظها كـ JSON
        if($request->hasFile('images')){
            $images = [];
            foreach($request->file('images') as $img){
                $path = $img->store('spots', 'public');
                $images[] = $path;
            }
            $data['images'] = json_encode($images);
        }

        $data['contact_numbers'] = json_encode($request->contact_numbers ?? []);

        // إنشاء Spot
        $spot = Spot::create($data);

        // إنشاء QR Code برقم دفع عشوائي
        $paymentCode = 'PAY-' . rand(100000, 999999);
        $spot->payment_code = $paymentCode;
        $spot->save();

        return redirect()->route('spots.index')->with('success', 'Spot created successfully.');
    }

    public function edit(Spot $spot)
    {
        return view('admim.spots.edit', compact('spot'));
    }

    public function update(Request $request, Spot $spot)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'map_link' => 'nullable|string|max:500',
            'open_time' => 'nullable',
            'close_time' => 'nullable',
            'contact_numbers' => 'nullable|array',
            'ticket_price' => 'required|numeric',
        ]);

        if($request->hasFile('images')){
            $images = [];
            foreach($request->file('images') as $img){
                $path = $img->store('spots', 'public');
                $images[] = $path;
            }
            $data['images'] = json_encode($images);
        }

        $data['contact_numbers'] = json_encode($request->contact_numbers ?? []);

        $spot->update($data);

        return redirect()->route('spots.index')->with('success', 'Spot updated successfully.');
    }

    public function destroy(Spot $spot)
    {
        $spot->delete();
        return redirect()->route('spots.index')->with('success', 'Spot deleted successfully.');
    }

      public function showQr(Spot $spot)
    {
        // Generate QR code for the payment code
        $qr = QrCode::size(200)->generate($spot->payment_code);

        return view('admim.spots.qr', compact('spot', 'qr'));
    }
}
