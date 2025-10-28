<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // اسم المكان
            $table->string('address');             // العنوان
            $table->text('description')->nullable(); // وصف المكان
            $table->json('images')->nullable();    // عدة صور (JSON array)
            $table->string('map_link')->nullable(); // رابط الخريطة
            $table->time('open_time')->nullable();  // وقت الفتح
            $table->time('close_time')->nullable(); // وقت الإغلاق
            $table->json('contact_numbers')->nullable(); // أرقام التواصل (JSON array)
            $table->decimal('ticket_price', 8, 2)->default(0); // سعر التذكرة
            $table->string('payment_code')->nullable(); // رقم الدفع / QR Code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spots');
    }
};
