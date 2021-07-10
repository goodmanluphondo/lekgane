<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Staff\ProductSearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', HomeController::class)->middleware(['auth', 'verified'])->name('home');
Route::get('/history', HistoryController::class)->middleware(['auth', 'verified'])->name('history');
Route::resource('/customers', CustomerController::class)->middleware(['auth', 'verified']);
Route::get('/ps', ProductSearchController::class);

require __DIR__.'/auth.php';

include(base_path('routes/pos.php'));
include(base_path('routes/staff.php'));
