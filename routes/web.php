<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\Kategori\KategoriController;
use App\Http\Controllers\Manajement\ManajementController;
use App\Http\Controllers\Pegawai\PegawaiController;
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

    Route::get('/manajemen/pegawai', [PegawaiController::class, 'listPegawai'])->name('pegawai');
    Route::get('/manajemen/pegawai/get', [PegawaiController::class, 'getPegawai'])->name('pegawai.get');
    Route::get('/manajemen/pegawai/form/{type}/{id?}', [PegawaiController::class, 'formPegawai'])->name('pegawai.form');
    Route::post('/manajemen/pegawai', [PegawaiController::class, 'setPegawai'])->name('pegawai.post');
    Route::delete('/manajemen/pegawai/delete/{id}', [PegawaiController::class, 'deletePegawai'])->name('pegawai.delete');

    Route::get('/manajemen/kategori-produk', [KategoriController::class, 'katBarangIndex'])->name('kategori.produk');
    Route::get('/manajemen/kategori-produk-get', [KategoriController::class, 'getAllKatBarang'])->name('kategori.produk.get');
    Route::post('/manajemen/kategori-produk-get', [KategoriController::class, 'postKatBarang'])->name('kategori.produk.post');
    Route::delete('/manajemen/kategori-produk/delete/{id}', [KategoriController::class, 'delKatBarang'])->name('kategori.produk.delete');

    Route::get('/manajemen/setting-akun', [KategoriController::class, 'settingAkun'])->name('akun.setting');
    Route::post('/manajemen/setting-akun', [KategoriController::class, 'postNewAkun'])->name('akun.setting.post');
    Route::post('/manajemen/setting-akun-update/{type}/{id?}', [KategoriController::class, 'SettingNewAkun'])->name('akun.setting.update');

    Route::get('/manajemen/setting-site', [KategoriController::class, 'SettingSite'])->name('site.setting');
    Route::post('/manajemen/setting-site', [KategoriController::class, 'SettingSiteUpdate'])->name('site.setting.post');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/{type}', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
});
