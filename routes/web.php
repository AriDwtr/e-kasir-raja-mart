<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\Kategori\KategoriController;
use App\Http\Controllers\Manajement\ManajementController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Transaksi\TransaksiController;
use App\Http\Controllers\Transaksi\TransaksiOutController;
use App\Models\BarangModel;
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

Route::view('/theme', 'theme.theme');

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
    Route::post('/login/post', [AuthController::class, 'Login'])->name('login.post');
});


Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

    Route::post('/transaksi', [TransaksiOutController::class, 'pushTransaksi'])->name('transaksi.push');

    Route::view('/kasir', 'kasir.kasir')->name('kasir');

    Route::get('/barang/{kode_barang}', [BarangController::class, 'getBarangKasir']);

    Route::post('/transaksi/post', [TransaksiController::class, 'Transaksi'])->name('transaksi.post');

    Route::get('/manajemen', [ManajementController::class, 'index'])->name('manajemen');

    Route::get('/manajemen/barang', [BarangController::class, 'listBarang'])->name('barang');
    Route::get('/manajemen/barang/get', [BarangController::class, 'getBarang'])->name('barang.get');
    Route::get('/manajemen/barang/form/{type}/{id?}', [BarangController::class, 'formBarang'])->name('barang.form');
    Route::post('/manajemen/barang/post', [BarangController::class, 'postBarang'])->name('barang.post');
    Route::delete('/manajemen/barang/delete/{kode_barang}', [BarangController::class, 'deleteBarang'])->name('barang.delete');

    Route::get('/manajemen/kategori-produk', [KategoriController::class, 'katBarangIndex'])->name('kategori.produk');
    Route::get('/manajemen/kategori-produk-get', [KategoriController::class, 'getAllKatBarang'])->name('kategori.produk.get');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/{type}', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
});
