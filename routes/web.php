<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangjadiController;
use App\Http\Controllers\BarangmentahController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\trukController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\PengantaranController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/truk', [trukController::class, 'index'])->name('truk.index');
Route::get('/truk/create', [trukController::class, 'create'])->name('truk.create');
Route::post('/truk/store', [trukController::class, 'store'])->name('truk.store');

Route::get('/sopir', [SopirController::class, 'index'])->name('sopir.index');
Route::get('/sopir/create', [SopirController::class, 'create'])->name('sopir.create');
Route::post('/sopir/store', [SopirController::class, 'store'])->name('sopir.store');

Route::get('/barangjadi', [BarangjadiController::class, 'index'])->name('barangjadi.index');
Route::get('/barangjadi/create', [BarangjadiController::class, 'create'])->name('barangjadi.create');
Route::post('/barangjadi/store', [BarangjadiController::class, 'store'])->name('barangjadi.store');
Route::get('/barangjadi/{barangjadi}/edit', [BarangjadiController::class, 'edit'])->name('barangjadi.edit');
Route::patch('/barangjadi/{barangjadi}', [BarangjadiController::class, 'update'])->name('barangjadi.update');

Route::get('/barangmentah', [BarangmentahController::class, 'index'])->name('barangmentah.index');
Route::get('/barangmentah/create', [BarangmentahController::class, 'create'])->name('barangmentah.create');
Route::post('/barangmentah/store', [BarangmentahController::class, 'store'])->name('barangmentah.store');
Route::get('/barangmentah/{barangmentah}/edit', [BarangmentahController::class, 'edit'])->name('barangmentah.edit');
Route::patch('/barangmentah/{barangmentah}', [BarangmentahController::class, 'update'])->name('barangmentah.update');

Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');

Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');

Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli.index');
Route::get('/pembeli/create', [PembeliController::class, 'create'])->name('pembeli.create');
Route::post('/pembeli/store', [PembeliController::class, 'store'])->name('pembeli.store');
Route::get('/pembeli/{pembeli}/edit', [PembeliController::class, 'edit'])->name('pembeli.edit');
Route::patch('/pembeli/{pembeli}', [PembeliController::class, 'update'])->name('pembeli.update');

Route::get('/penjual', [PenjualController::class, 'index'])->name('penjual.index');
Route::get('/penjual/create', [PenjualController::class, 'create'])->name('penjual.create');
Route::post('/penjual/store', [PenjualController::class, 'store'])->name('penjual.store');

Route::get('/pengantaran', [PengantaranController::class, 'index'])->name('pengantaran.index');
Route::get('/pengantaran/create', [PengantaranController::class, 'create'])->name('pengantaran.create');
Route::post('/pengantaran/store', [PengantaranController::class, 'store'])->name('pengantaran.store');





require __DIR__.'/auth.php';
