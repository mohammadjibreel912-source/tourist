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

            // معلومات أساسية
            $table->string('name');                     // اسم المكان
            $table->string('slug')->unique();           // رابط صديق لمحركات البحث
            $table->string('category')->nullable();     // نوع المكان / التصنيف
            $table->string('address');                  // العنوان
            $table->string('city')->nullable();         // المدينة أو المنطقة
            $table->text('description')->nullable();    // وصف المكان

            // وسائط وتجربة المستخدم
            $table->json('images')->nullable();         // عدة صور (JSON array)
            $table->string('video_link')->nullable();   // رابط فيديو أو جولة افتراضية
            $table->string('map_link')->nullable();     // رابط الخريطة
            $table->string('qr_code_image')->nullable();// صورة QR Code

            // إدارة الأوقات
            $table->time('open_time')->nullable();      // وقت الفتح (عام)
            $table->time('close_time')->nullable();     // وقت الإغلاق (عام)
            $table->json('working_hours')->nullable();  // أوقات العمل حسب اليوم {"Mon":"09:00-17:00"}
            $table->json('holidays')->nullable();       // أيام الإغلاق

            // التذاكر والمال
            $table->decimal('ticket_price', 8, 2)->default(0); // سعر التذكرة
            $table->integer('daily_ticket_limit')->nullable(); // عدد التذاكر المتاحة يوميًا
            $table->decimal('discount', 5, 2)->nullable();     // خصم كنسبة مئوية
            $table->string('payment_code')->nullable();        // رقم الدفع / QR Code

            // التواصل والحالة
            $table->json('contact_numbers')->nullable();      // أرقام التواصل (JSON array)
            $table->boolean('is_active')->default(true);      // حالة المكان (نشط/غير نشط)

            // احصائيات
            $table->integer('views')->default(0);             // عدد المشاهدات
            $table->decimal('rating', 2, 1)->nullable();      // متوسط التقييم

            $table->timestamps(); // created_at & updated_at
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
