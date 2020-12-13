<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('auth/v1')->group(function () {
    
    Route::post('login', [ApiController::class, 'login']);
    Route::post('register', [ApiController::class, 'store']);
    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('user', [ApiController::class, 'getUser']);
        Route::delete('logout', [ApiController::class, 'logout']);
    });

    // Route::get('/', function(){
    //     return response()->json([
    //         'message'=>'hello from api',
    //     ],403);
    // });

    // Route::post('/tokens/create', [ApiController::class, 'createToken']);
    
    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });     
});