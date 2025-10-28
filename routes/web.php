<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Authenticated routes
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    });
});
Route::view('/', 'user.index')->name('home');
Route::view('/about', 'user.about')->name('about');
Route::view('/blog', 'user.blog')->name('blog');
Route::view('/blog-single', 'user.blog-single')->name('blog.single');
Route::view('/contact', 'user.contact')->name('contact');
Route::view('/destination', 'user.destination')->name('destination');
Route::view('/hotel', 'user.hotel')->name('hotel');
Route::view('/main', 'user.main')->name('main');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admim.index'); // points to resources/views/admin/index.blade.php
    })->name('admin.index');
});
