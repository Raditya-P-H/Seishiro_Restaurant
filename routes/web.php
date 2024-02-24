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
Route::post('postlogin', [UserController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
Route::get('/homeuser', [UserController::class, 'homeuser'])->name('homeuser');
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

Route::get('/kelolauser', [AdminController::class, 'kelolauser'])->name('kelolauser');
Route::get('/tampiltambahdatauser', [AdminController::class, 'tampildatauser'])->name('tampiltambahdatauser');
Route::post('/tambahdatauser/{user}', [AdminController::class, 'tambahdatauser'])->name('tambahdatauser');
Route::get('/tampileditdatauser/{user}', [AdminController::class, 'tampileditdatauser'])->name('tampileditdatauser');
Route::post('/editdatauser/{user}', [AdminController::class, 'editdatauser'])->name('editdatauser');
Route::get('/hapususer/{user}', [AdminController::class, 'hapususer'])->name('hapususer');
Route::get('/log', [AdminController::class, 'log'])->name('log');

Route::get('/konfirbayar',[KasirController::class, 'konfirbayar'])->name('konfirbayar');
Route::get('/tampildetailpesanan/{no_meja}',[KasirController::class, 'tampildetailpesanan'])->name('tampildetailpesan');
Route::post('/prosesbayar',[KasirController::class, 'prosesbayar'])->name('prosesbayar');
Route::get('/summary', [KasirController::class, 'summary'])->name('summary');
Route::get('/tampildetailsummary/{transaksi_id}', [KasirController::class, 'tampildetailsummary'])->name('tampildetailsummary');
Route::get('/printstruk/{transaksi_id}', [KasirController::class, 'printstruk'])->name('printstruk');
Route::get('/statusmeja', [KasirController::class, 'statusmeja'])->name('statusmeja');
Route::get('/hapustransaksi/{no_meja}', [KasirController::class, 'hapustransaksi'])->name('hapustransaksi');
Route::get('/konfirselesai/{transaksi_id}', [KasirController::class, 'konfirselesai'])->name('konfirselesai');


Route::get('/cektransaksi', [OwnerController::class, 'cektransaksi'])->name('cektransaksi');
Route::post('/filtering', [OwnerController::class, 'filtering'])->name('filtering');
Route::get('/downloadtransaksi', [OwnerController::class, 'downloadtransaksi'])->name('downloadtransaksi');

});
