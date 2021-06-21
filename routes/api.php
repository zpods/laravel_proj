<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

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


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/cart', [CartController::class, 'checkIfProductsInCartExists']);
    Route::delete('/cart/remove', [CartController::class, 'removeAllProductsFromCart']);
    Route::post('/products', [CartController::class, 'create']);
});

Route::get('/products', [IndexController::class, 'index']);
Route::get('/product/{product_id}', [CategoryController::class, 'getProductDetails']);
Route::get('/category/{cat_id}', [CategoryController::class, 'index']);


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);




