<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/product', [ProductController::class, 'update'])->name('update');
Route::delete('/product/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
Route::POST('/product/index', [ProductController::class, 'create'])->name('products.create');