<?php

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
//     return view('welcome');
// });

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\RegisterController;

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::resource('product','ProductController');
Route::get('products/delete/{id}',[ProductController::class,'destroy'])->name('pro.delete');
Route::post('products/update/{id}',[ProductController::class,'update'])->name('pro.update');
Route::get('products/show/{id}',[ProductController::class,'show'])->name('pro.show');

// order
Route::resource('order','OrderController');
Route::get('confirm/{id}',[OrderController::class,'confirm'])->name('order.confirm');
Route::get('pending/{id}',[OrderController::class,'pending'])->name('order.pending');

//user
Route::resource('user','UserController');
Route::get('/',[HomeController::class,'index'])->name('dashboard');
Route::get('/register',[RegisterController::class,'index'])->name('user.register');
Route::post('/register/store',[RegisterController::class,'store'])->name('user.register.store');
