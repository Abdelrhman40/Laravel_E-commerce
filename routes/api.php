<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentProviderController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group( function ()
{
    Route::post('/addcart/{id?}',[ApiProductController::class,'addcart']);
    Route::get('/gotocart',[ApiProductController::class,'gotocarts']);
    Route::get('/deletecart/{id?}',[ApiProductController::class,'deletecart']);
    Route::post('/logout',[ApiAuthController::class,'logout']);

    Route::middleware('api_admin')->group( function () {
        Route::post('/create',[ApiProductController::class,'store']);
        Route::post('/update/{id?}',[ApiProductController::class,'update']);
        Route::post('/delete/{id?}',[ApiProductController::class,'delete']);
    });
});

Route::get('/products',[ApiProductController::class,'products']);
Route::get('/categories',[ApiProductController::class,'categories']);
Route::get('/show/{id?}',[ApiProductController::class,'show']);

Route::post('/register',[ApiAuthController::class,'register']);
Route::post('/login',[ApiAuthController::class,'login']);
