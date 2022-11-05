<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\qudangController;
use App\Http\Controllers\Controller;

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
    return view('login');
});

Route::get('/beranda', function () {
    return view('beranda', [
            "tittle" => "Beranda"
    ]);
})->middleware('auth');

Route::get('/barang', function () {
    return view('dataBarang', [
        "tittle" => "Barang"
    ]);
});

Route::get('/supplier', function () {
    return view('Supplier', [
        "tittle" => "Supplier"
    ]);
});

Route::get('/dataBarangSup', function () {
    return view('dataBarangSup');
});

Route::get('/berandaSupplier', function () {
    return view('berandaSupplier');
});

Route::get('logout', [qudangController::class, 'logout']);

Route::post('cekLogin', [qudangController::class, 'cekLogin']);

// TAMBAH DATA ===========================

Route::get('/tambahBarang', function () {
    return view('tambahBarang');
});

Route::get('/tambahSupplier', function () {
    return view('tambahSupplier');
});

Route::get('/permintaanSup', function () {
    return view('permintaanSup');
});

Route::get('/permintaan', function () {
    return view('permintaan');
});

Route::get('/tambahPermintaan', function () {
    return view('tambahPermintaan');
});

Route::post('tambahbarang', [qudangController::class, 'tambahbarang']);

Route::post('tambahPermintaan', [qudangController::class, 'tambahPermintaan']);

Route::post('tambahSupplier', [qudangController::class, 'tambahSupplier']);

// LIHAT DATA =========================

Route::middleware('role:supplier')->get('dataBarang', [qudangController::class, 'lihatDataBarang']);

Route::get('dataBarangSup', [qudangController::class, 'lihatDataBarangSup']);

Route::get('berandaSupplier', [qudangController::class, 'supplier']);

Route::get('supplier', [qudangController::class, 'lihatDataSupplier']);

Route::get('permintaanSup', [qudangController::class, 'lihatDataPermintaanSup']);

Route::get('permintaan', [qudangController::class, 'lihatDataPermintaan']);

// HAPUS DATA ======================

Route::get('hapusBarang/{id}', [qudangController::class, 'hapusBarang']);

Route::get('hapusSupplier/{id}', [qudangController::class, 'hapusSupplier']);

Route::get('hapusPermintaan/{id}', [qudangController::class, 'hapusPermintaan']);

// UBAH DATA ========================

Route::get('formeditBarang/{id}', [qudangController::class, 'updatebarang']);

Route::post('ubahbarang', [qudangController::class, 'ubahbarang']);

Route::get('formeditSupplier/{id}', [qudangController::class, 'updatesupplier']);

Route::post('ubahsupplier', [qudangController::class, 'ubahsupplier']);

Route::get('formeditPermintaan/{id}', [qudangController::class, 'updatePermintaan']);

Route::post('ubahPermintaan', [qudangController::class, 'ubahPermintaan']);



// BARANG MASUK ===========================

Route::get('barangMasuk', [qudangController::class, 'barangMasuk']);

Route::post('tambahbarangmasuk', [qudangController::class, 'tambahbarangmasuk']);

// BARANG KELUAR ============================

Route::get('barangKeluar', [qudangController::class, 'barangKeluar']);

Route::post('tambahbarangkeluar', [qudangController::class, 'tambahbarangkeluar']);
