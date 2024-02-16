<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/homeuser', [UserController::class, 'homeuser'])->name('homeuser');
Route::post('postlogin', [UserController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/keranjang', [UserController::class, 'keranjang'])->name('keranjang');
Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
Route::get('/detailpesanan/{menu}', [UserController::class, 'detailpesanan'])->name('detailpesanan');
Route::post('/postpesanan/{menu}', [UserController::class, 'postpesanan'])->name('postpesanan');
Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');

Route::get('/homeadmin', [AdminController::class, 'homeadmin'])->name('homeadmin');
Route::get('/tambah', [AdminController::class, 'tambah'])->name('tambah');
Route::post('/posttambah', [AdminController::class, 'posttambah'])->name('posttambah');
Route::get('/edit{menu}', [AdminController::class, 'edit'])->name('edit');
Route::post('/postedit{menu}', [AdminController::class, 'postedit'])->name('postedit');
Route::get('/hapus{menu}', [AdminController::class, 'hapus'])->name('hapus');

Route::get('/konfirbayar', [KasirController::class, 'konfirbayar'])->name('konfirbayar');


