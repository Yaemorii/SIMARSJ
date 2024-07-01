<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JenisPemeliharaanController;
use App\Http\Controllers\JenisMutasiController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\HakAksesController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Group routes that need authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('', 'index')->name('kategori');
        Route::get('tambah', 'tambah')->name('kategori.tambah');
        Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('kategori.edit');
        Route::put('edit/{id}', 'update')->name('kategori.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('kategori.hapus');
    });

    Route::controller(KondisiController::class)->prefix('kondisi')->group(function () {
        Route::get('', 'index')->name('kondisi');
        Route::get('tambah', 'tambah')->name('kondisi.tambah');
        Route::post('tambah', 'simpan')->name('kondisi.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('kondisi.edit');
        Route::put('edit/{id}', 'update')->name('kondisi.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('kondisi.hapus');
    });

    Route::controller(JenisPemeliharaanController::class)->prefix('jenpel')->group(function () {
        Route::get('', 'index')->name('jenpel');
        Route::get('tambah', 'tambah')->name('jenpel.tambah');
        Route::post('tambah', 'simpan')->name('jenpel.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('jenpel.edit');
        Route::put('edit/{id}', 'update')->name('jenpel.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('jenpel.hapus');
    });

    Route::controller(JenisMutasiController::class)->prefix('jenmut')->group(function () {
        Route::get('', 'index')->name('jenmut');
        Route::get('tambah', 'tambah')->name('jenmut.tambah');
        Route::post('tambah', 'simpan')->name('jenmut.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('jenmut.edit');
        Route::put('edit/{id}', 'update')->name('jenmut.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('jenmut.hapus');
    });

    Route::controller(SumberDanaController::class)->prefix('sumberdana')->group(function () {
        Route::get('', 'index')->name('sumberdana');
        Route::get('tambah', 'tambah')->name('sumberdana.tambah');
        Route::post('tambah', 'simpan')->name('sumberdana.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('sumberdana.edit');
        Route::put('edit/{id}', 'update')->name('sumberdana.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('sumberdana.hapus');
    });

    Route::controller(SatuanController::class)->prefix('satuan')->group(function () {
        Route::get('', 'index')->name('satuan');
        Route::get('tambah', 'tambah')->name('satuan.tambah');
        Route::post('tambah', 'simpan')->name('satuan.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('satuan.edit');
        Route::put('edit/{id}', 'update')->name('satuan.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('satuan.hapus');
    });

    Route::controller(AsetController::class)->prefix('aset')->group(function () {
        Route::get('', 'index')->name('aset');
        Route::get('tambah', 'tambah')->name('aset.tambah');
        Route::post('tambah', 'simpan')->name('aset.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('aset.edit');
        Route::put('edit/{id}', 'update')->name('aset.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('aset.hapus');
    });

    Route::controller(MutasiController::class)->prefix('mutasi')->group(function () {
        Route::get('', 'index')->name('mutasi');
        Route::get('tambah', 'tambah')->name('mutasi.tambah');
        Route::post('tambah', 'simpan')->name('mutasi.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('mutasi.edit');
        Route::put('edit/{id}', 'update')->name('mutasi.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('mutasi.hapus');
    });

    Route::get('/mutasi/tambah/{aset}', [MutasiController::class, 'tambahDenganAset'])->name('mutasi.tambah.denganAset');

    Route::controller(PemeliharaanController::class)->prefix('pemeliharaan')->group(function () {
        Route::get('', 'index')->name('pemeliharaan');
        Route::get('tambah', 'tambah')->name('pemeliharaan.tambah');
        Route::post('tambah', 'simpan')->name('pemeliharaan.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('pemeliharaan.edit');
        Route::put('edit/{id}', 'update')->name('pemeliharaan.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('pemeliharaan.hapus');
    });

    Route::get('/pemeliharaan/tambah/{aset}', [PemeliharaanController::class, 'tambahDenganAset'])->name('pemeliharaan.tambah.denganAset');

    Route::controller(PeminjamanController::class)->prefix('peminjaman')->group(function () {
        Route::get('', 'index')->name('peminjaman');
        Route::get('tambah', 'tambah')->name('peminjaman.tambah');
        Route::post('tambah', 'simpan')->name('peminjaman.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('peminjaman.edit');
        Route::put('edit/{id}', 'update')->name('peminjaman.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('peminjaman.hapus');
    });

    Route::controller(RuanganController::class)->prefix('ruangan')->group(function () {
        Route::get('', 'index')->name('ruangan');
        Route::get('tambah', 'tambah')->name('ruangan.tambah');
        Route::post('tambah', 'simpan')->name('ruangan.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('ruangan.edit');
        Route::put('edit/{id}', 'update')->name('ruangan.tambah.update');
        Route::delete('hapus/{id}', 'hapus')->name('ruangan.hapus');
    });

    Route::controller(HakAksesController::class)->group(function () {
        Route::get('/hakakses', [HakAksesController::class, 'index'])->name('hakakses');
        Route::get('/hakakses/create', [HakAksesController::class, 'create'])->name('hakakses.create');
        Route::post('/hakakses/store', [HakAksesController::class, 'store'])->name('hakakses.store');
        Route::get('/hakakses/edit/{id}', [HakAksesController::class, 'edit'])->name('hakakses.edit');
        Route::put('/hakakses/update/{id}', [HakAksesController::class, 'update'])->name('hakakses.update');
        Route::delete('/hakakses/destroy/{id}', [HakAksesController::class, 'destroy'])->name('hakakses.destroy');
    });

});
