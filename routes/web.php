<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', function () {
    return view('beranda');
});

Route::get('/', [ProductController::class, 'index']);
Route::get('/product/add', [ProductController::class, 'store']);
Route::get('/product/edit/{id}', [ProductController::class, 'update']);
Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/add', [CategoryController::class, 'store']);
Route::get('/category/edit/{id}', [CategoryController::class, 'update']);
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);

Route::get('/transaction/add', [TransactionController::class, 'store']);
Route::get('/history', [TransactionController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add', [CartController::class, 'store']);
Route::get('/cart/delete/{id}', [CartController::class, 'destroy']);
Route::get('/cart/edit/{id}', [CartController::class, 'update']);


// Route::post('/login', [LoginController::class, 'index']);
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'index']);