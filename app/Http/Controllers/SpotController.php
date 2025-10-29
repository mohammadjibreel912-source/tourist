<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class SpotController extends Controller
{
    public function index()
    {
        $spots = Spot::latest()->paginate(10);
        return view('admim.spots.index', compact('spots'));
    }

    public function create()
    {
        return view('admim.spots.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'open_time' => 'required',
            'close_time' => 'required',
            'ticket_price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        // رفع الصور
       $images = [];
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $filename = time() . '_' . $image->getClientOriginalName();
        $path = $image->storeAs('spots', $filename, 'public'); // explicitly in storage/app/public/spots
        $images[] = $path;
    }
}


        // توليد QR Code للتذكرة بصيغة SVG
        $payment_code = 'SPOT-' . strtoupper(Str::random(8));
        $qrImage = 'qrcodes/' . $payment_code . '.svg';
        $qrCodeContent = QrCode::format('svg')->size(200)->generate($payment_code);
        Storage::disk('public')->put($qrImage, $qrCodeContent);

        // حفظ البيانات
        Spot::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'description' => $request->description,
            'map_link' => $request->map_link,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'contact_numbers' => json_encode(array_filter($request->contact_numbers ?? [])),
            'ticket_price' => $request->ticket_price,
            'images' => json_encode($images),
            'qr_code_image' => $qrImage,
        ]);

        return redirect()->route('spots.index')->with('success', 'Spot created successfully!');
    }

    public function edit(Spot $spot)
    {
        return view('admim.spots.edit', compact('spot'));
    }

    public function update(Request $request, Spot $spot)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'open_time' => 'required',
            'close_time' => 'required',
            'ticket_price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        // رفع الصور الجديدة إذا وجدت
        $images = json_decode($spot->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('spots', 'public');
                $images[] = $path;
            }
        }

        $spot->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'description' => $request->description,
            'map_link' => $request->map_link,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'contact_numbers' => json_encode(array_filter($request->contact_numbers ?? [])),
            'ticket_price' => $request->ticket_price,
            'images' => json_encode($images),
        ]);

        return redirect()->route('spots.index')->with('success', 'Spot updated successfully!');
    }

    public function destroy(Spot $spot)
    {
        // حذف الصور
        if ($spot->images) {
            $images = is_array($spot->images) ? $spot->images : json_decode($spot->images, true);
            if ($images) {
                foreach ($images as $img) {
                    Storage::disk('public')->delete($img);
                }
            }
        }

        // حذف QR Code
        if ($spot->qr_code_image) {
            Storage::disk('public')->delete($spot->qr_code_image);
        }

        $spot->delete();
        return redirect()->route('spots.index')->with('success', 'Spot deleted successfully!');
    }

    // عرض QR Code مباشرة في المتصفح
    public function showQr(Spot $spot)
    {
        $filePath = storage_path('app/public/' . $spot->qr_code_image);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->file($filePath, [
            'Content-Type' => 'image/svg+xml',
        ]);
    }

    public function show360(Spot $spot)
{
    $images = is_array($spot->images) ? $spot->images : json_decode($spot->images, true);
    $firstImage = $images[0] ?? null;

    return view('admim.spots.view360', [
        'imageUrl' => $firstImage ? asset('storage/' . $firstImage) : null,
        'spot' => $spot,
    ]);
}



}
