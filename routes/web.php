<?php

use App\Http\Controllers\MojoController;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\RazorController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('product');
// });

// This is Instamojo Payment Gateway
// Route::get('/', [MojoController::class, 'index']);
// Route::post('pay', [MojoController::class, 'pay']);
// Route::get('pay-success', [MojoController::class, 'success']);

// RazorPay Integration

// Route::get('/', [RazorController::class, 'index']);
// Route::post('order', [RazorController::class, 'order']);
// Route::post('pay', [RazorController::class, 'pay']);

// Paytm Integration
// Route::get('/', [PaytmController::class, 'index']);
// Route::post('order', [PaytmController::class, 'order']);
// Route::post('/pay', [PaytmController::class, 'paymentCallback']);

// Laravel Socialite
Route::get('/', function(){
    return view('social');
});
Route::get('social/redirect', [SocialController::class, 'socialRedirect']); //First redirect to social oauth page
Route::get('social/callback', [SocialController::class, 'socialCallback']); // Then Callback to app with user creds

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
