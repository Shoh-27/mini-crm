<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (faqat login bo‘lgan userlar uchun)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth bo‘lganlar uchun routes
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Customers (faqat admin ko‘ra oladi)

    Route::resource('customers', CustomerController::class);


    // Contacts va Tasks (user ham o‘zining customerlariga qo‘sha oladi)
    Route::resource('customers.contacts', ContactController::class);
    Route::resource('customers.tasks', TaskController::class);
});

require __DIR__.'/auth.php';
