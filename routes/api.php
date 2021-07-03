<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
    Route::get('/cart', [CartController::class, 'getCart']);
    Route::delete('/cart/remove', [CartController::class, 'removeAllProductsFromCart']);
    Route::post('/cart', [CartController::class, 'createCart']);
    
});

Route::get('/products', [IndexController::class, 'index']);
Route::get('/products/{name}', [IndexController::class, 'searchProducts']);
Route::get('/product/{product_id}', [CategoryController::class, 'getProductDetails']);
Route::get('/category/{cat_id}', [CategoryController::class, 'index']);
Route::get('/home/none-featured-posts', [HomeController::class, 'showPosts']);
Route::get('/home/featured-post', [HomeController::class, 'showSinglePost']);


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logoutUser']);



