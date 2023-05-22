<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\Transaksi\TransaksiController;
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

    Route::get('/barang', [BarangController::class, 'listBarang'])->name('barang');
    Route::get('/barang/get', [BarangController::class, 'getBarang'])->name('barang.get');
    Route::get('/barang/form/{type}/{id?}', [BarangController::class, 'formBarang'])->name('barang.form');
    Route::post('/barang/post', [BarangController::class, 'postBarang'])->name('barang.post');
    Route::delete('/barang/delete/{kode_barang}', [BarangController::class, 'deleteBarang'])->name('barang.delete');

   Route::view('/kasir', 'kasir');

    Route::get('/barang/{kode_barang}', function ($kode_barang) {
        $barang = BarangModel::where('kd_brg', $kode_barang)->firstOrFail();

        return [
          'nama_barang' => $barang->nm_brg,
          'harga_barang' => $barang->hrg_brg,
        ];
    });

   Route::post('/transaksi/post', [TransaksiController::class, 'Transaksi'])->name('transaksi.post');

   Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');

});
