<?php

use App\Http\Controllers\POS\CartController;
use App\Http\Controllers\POS\InventoryController;
use App\Http\Controllers\POS\ProductController;
use App\Http\Controllers\POS\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/sale', SaleController::class)->middleware(['auth', 'verified'])->name('sale');
Route::get('/products', ProductController::class)->middleware(['auth', 'verified'])->name('products');
Route::resource('/inventory', InventoryController::class)->middleware(['auth', 'verified']);
Route::resource('/cart', CartController::class)->middleware(['auth', 'verified']);

