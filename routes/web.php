<?php

use App\Http\Controllers\MojoController;
use App\Http\Controllers\RazorController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('product');
// });

// This is Instamojo Payment Gateway
// Route::get('/', [MojoController::class, 'index']);
// Route::post('pay', [MojoController::class, 'pay']);
// Route::get('pay-success', [MojoController::class, 'success']);

// RazorPay Integration

Route::get('/', [RazorController::class, 'index']);
Route::post('order', [RazorController::class, 'order']);
Route::post('pay', [RazorController::class, 'pay']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
