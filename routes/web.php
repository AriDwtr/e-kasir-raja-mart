<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::view('/login', 'login')->name('login');
Route::post('/login/post', [AuthController::class, 'Login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/barang/{kode_barang}', function ($kode_barang) {
        $barang = BarangModel::where('kd_brg', $kode_barang)->firstOrFail();

        return [
          'nama_barang' => $barang->nm_brg,
          'harga_barang' => $barang->hrg_brg,
        ];
    });

   Route::post('/transaksi/post', [TransaksiController::class, 'Transaksi'])->name('transaksi.post');

});
