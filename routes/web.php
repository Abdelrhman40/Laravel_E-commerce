<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentProviderController;
use App\Http\Controllers\ProductsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group( function ()
{
    Route::get('/home',[ProductsController::class,'home']);
    Route::get('/products',[ProductsController::class,'products']);
    Route::get('/show/{id?}',[ProductsController::class,'show']);
    Route::get('/filter/{id?}',[ProductsController::class,'filter']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/addcart/{id?}',[ProductsController::class,'addcart']);
    Route::get('/gotocart',[ProductsController::class,'gotocart']);
    Route::delete('/deletecart/{id?}',[ProductsController::class,'deletecart']);
    // Route::post('/payment',[PaymentProviderController::class,'pay']);
    Route::get('/callback',function ()
    {
        return "success";
    });
    Route::get('/error',function ()
    {
        return "error";
    });
    Route::middleware('is_admin')->group(function(){
        Route::get('/adminPage',[ProductsController::class,'adminPage']);
        Route::get('/create',[ProductsController::class,'create']);
        Route::post('/store',[ProductsController::class,'store']);
        Route::delete('/delete/{id?}',[ProductsController::class,'delete']);
        Route::get('/showadmin/{id?}',[ProductsController::class,'showadmin']);
        Route::get('/edit/{id?}',[ProductsController::class,'edit']);
        Route::put('/update/{id?}',[ProductsController::class,'update']);
    });
});

Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'loginform']);
    Route::get('/register',[AuthController::class,'register']);
    Route::post('/register',[AuthController::class,'registerform']);
});


