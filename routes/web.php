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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::resource('product','ProductController');
Route::get('products/delete/{id}',[ProductController::class,'destroy'])->name('pro.delete');
Route::post('products/update/{id}',[ProductController::class,'update'])->name('pro.update');
Route::get('products/show/{id}',[ProductController::class,'show'])->name('pro.show');