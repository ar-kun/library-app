<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', [CobaController::class, 'index']);
Route::redirect('/', '/home', 301);

Route::get('/home', [DashboardController::class, 'home'])->name('home');

Route::resource('/books', BookController::class);