<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\QrTestController;

// الصفحة الرئيسية
Route::view('/', 'user.index')->name('home');
Route::view('/about', 'user.about')->name('about');
Route::view('/blog', 'user.blog')->name('blog');
Route::view('/contact', 'user.contact')->name('contact');
Route::view('/destination', 'user.destination')->name('destination');
Route::view('/hotel', 'user.hotel')->name('hotel');

// Authentication routes
Auth::routes();

// Dashboard للمستخدمين المسجلين

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Spots CRUD
    Route::get('/spots', [SpotController::class, 'index'])->name('spots.index');
    Route::get('/spots/create', [SpotController::class, 'create'])->name('spots.create');
    Route::post('/spots', [SpotController::class, 'store'])->name('spots.store');
    Route::get('/spots/{spot}/edit', [SpotController::class, 'edit'])->name('spots.edit');
    Route::put('/spots/{spot}', [SpotController::class, 'update'])->name('spots.update');
    Route::delete('/spots/{spot}', [SpotController::class, 'destroy'])->name('spots.destroy');

    // Payments / QR Codes
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{spot}/generate-qr', [PaymentController::class, 'generateQr'])->name('payments.generateQr');

    // User Management
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('spots/{spot}/qr', [SpotController::class,'showQr'])->name('spots.showQr');
Route::get('/admin/payment', [PaymentController::class, 'index'])->name('payment.index');

});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('users', [UserManagementController::class, 'store'])->name('users.store');
});
Route::get('/qr-test', [QrTestController::class, 'generate']);
Route::get('spots/{spot}/360/{index}', [SpotController::class, 'show360'])->name('spots.show360');
