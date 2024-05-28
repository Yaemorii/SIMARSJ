<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuanganController;


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
    return view('welcome');
});

Route::get('dashboard', function (){
    return view('dashboard');
})->name('dashboard');

Route::controller(AsetController::class)->prefix('aset')->group(function () {
    Route::get('','index')->name('aset');
    Route::get('tambah','tambah')->name('aset.tambah');
    Route::post('tambah','simpan')->name('aset.tambah.simpan');
    Route::get('edit/{id}','edit')->name('aset.edit');
    Route::put('edit/{id}','update')->name('aset.tambah.update');
    Route::get('hapus/{id}','hapus')->name('aset.hapus');
});

Route::controller(MutasiController::class)->prefix('mutasi')->group(function () {
    Route::get('','index')->name('mutasi');
    Route::get('tambah','tambah')->name('mutasi.tambah');
    Route::post('tambah','simpan')->name('mutasi.tambah.simpan');
    Route::get('edit/{id}','edit')->name('mutasi.edit');
    Route::put('edit/{id}','update')->name('mutasi.tambah.update');
    Route::get('hapus/{id}','hapus')->name('mutasi.hapus');
});

Route::controller(PemeliharaanController::class)->prefix('pemeliharaan')->group(function () {
    Route::get('','index')->name('pemeliharaan');
    Route::get('tambah','tambah')->name('pemeliharaan.tambah');
    Route::post('tambah','simpan')->name('pemeliharaan.tambah.simpan');
    Route::get('edit/{id}','edit')->name('pemeliharaan.edit');
    Route::put('edit/{id}','update')->name('pemeliharaan.tambah.update');
    Route::get('hapus/{id}','hapus')->name('pemeliharaan.hapus');
});

Route::controller(PengadaanController::class)->prefix('pengadaan')->group(function () {
    Route::get('','index')->name('pengadaan');
    Route::get('tambah','tambah')->name('pengadaan.tambah');
    Route::post('tambah','simpan')->name('pengadaan.tambah.simpan');
    Route::get('edit/{id}','edit')->name('pengadaan.edit');
    Route::put('edit/{id}','update')->name('pengadaan.tambah.update');
    Route::get('hapus/{id}','hapus')->name('pengadaan.hapus');
});

Route::controller(PeminjamanController::class)->prefix('peminjaman')->group(function () {
    Route::get('','index')->name('peminjaman');
    Route::get('tambah','tambah')->name('peminjaman.tambah');
    Route::post('tambah','simpan')->name('peminjaman.tambah.simpan');
    Route::get('edit/{id}','edit')->name('peminjaman.edit');
    Route::put('edit/{id}','update')->name('peminjaman.tambah.update');
    Route::get('hapus/{id}','hapus')->name('peminjaman.hapus');
});

Route::controller(RuanganController::class)->prefix('ruangan')->group(function () {
    Route::get('','index')->name('ruangan');
    Route::get('tambah','tambah')->name('ruangan.tambah');
    Route::post('tambah','simpan')->name('ruangan.tambah.simpan');
    Route::get('edit/{id}','edit')->name('ruangan.edit');
    Route::put('edit/{id}','update')->name('ruangan.tambah.update');
    Route::get('hapus/{id}','hapus')->name('ruangan.hapus');
});