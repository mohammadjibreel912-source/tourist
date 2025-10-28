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
        Schema::create('payments', function (Blueprint $table) {
              $table->id();
            $table->foreignId('spot_id')->constrained()->onDelete('cascade'); // العلاقة مع Spot
            $table->string('payment_code')->unique(); // رقم الدفع
            $table->decimal('amount', 10, 2); // المبلغ
            $table->string('status')->default('pending'); // حالة الدفع: pending, paid, failed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
