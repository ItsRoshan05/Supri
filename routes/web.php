<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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
    return view('testing');
})->middleware('auth');

Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('transactions', TransactionController::class)->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');  // Pastikan ini sesuai dengan nama view kamu
})->name('login.form');

// Rute POST untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Rute untuk menampilkan halaman register
Route::get('/register', function () {
    return view('auth.register');  // Pastikan ini sesuai dengan nama view kamu
})->name('register.form');

// Rute POST untuk proses register
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Rute logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

