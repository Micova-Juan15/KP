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
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Models\Barangjadi;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/truk', [trukController::class, 'index'])->name('truk.index');
    Route::get('/truk/create', [trukController::class, 'create'])->name('truk.create');
    Route::post('/truk/store', [trukController::class, 'store'])->name('truk.store');
    Route::get('/truk/{truk}/edit', [trukController::class, 'edit'])->name('truk.edit');
    Route::patch('/truk/{truk}', [trukController::class, 'update'])->name('truk.update');
    Route::delete('/truk/{truk}', [trukController::class, 'destroy'])->name('truk.destroy');

    Route::get('/sopir', [SopirController::class, 'index'])->name('sopir.index');
    Route::get('/sopir/create', [SopirController::class, 'create'])->name('sopir.create');
    Route::post('/sopir/store', [SopirController::class, 'store'])->name('sopir.store');
    Route::get('/sopir/{sopir}/edit', [SopirController::class, 'edit'])->name('sopir.edit');
    Route::patch('/sopir/{sopir}', [SopirController::class, 'update'])->name('sopir.update');
    Route::delete('/sopir/{sopir}', [SopirController::class, 'destroy'])->name('sopir.destroy');

    Route::get('/barangjadi', [BarangjadiController::class, 'index'])->name('barangjadi.index');
    Route::get('/barangjadi/create', [BarangjadiController::class, 'create'])->name('barangjadi.create');
    Route::post('/barangjadi/store', [BarangjadiController::class, 'store'])->name('barangjadi.store');
    Route::get('/barangjadi/{barangjadi}/edit', [BarangjadiController::class, 'edit'])->name('barangjadi.edit');
    Route::patch('/barangjadi/{barangjadi}', [BarangjadiController::class, 'update'])->name('barangjadi.update');
    Route::delete('/barangjadi/{barangjadi}', [BarangjadiController::class, 'destroy'])->name('barangjadi.destroy');
    Route::get('/barangjadi/detail/{barangjadi}', [BarangjadiController::class, 'show'])->name('barangjadi.show');
    Route::get('/barangjadi/convert', [BarangjadiController::class, 'convert'])->name('barangjadi.convert');
    Route::post('/barangjadi/tambahbarangjadi', [BarangjadiController::class, 'tambahbarangjadi'])->name('barangjadi.tambahbarangjadi');

    Route::get('/barangmentah', [BarangmentahController::class, 'index'])->name('barangmentah.index');
    Route::get('/barangmentah/create', [BarangmentahController::class, 'create'])->name('barangmentah.create');
    Route::post('/barangmentah/store', [BarangmentahController::class, 'store'])->name('barangmentah.store');
    Route::get('/barangmentah/{barangmentah}/edit', [BarangmentahController::class, 'edit'])->name('barangmentah.edit');
    Route::patch('/barangmentah/{barangmentah}', [BarangmentahController::class, 'update'])->name('barangmentah.update');
    Route::delete('/barangmentah/{barangmentah}', [BarangmentahController::class, 'destroy'])->name('barangmentah.destroy');

    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('/pembelian/{pembelian}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::patch('/pembelian/{pembelian}', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('/pembelian/{pembelian}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
    Route::get('/pembelian/detail/{pembelian}', [PembelianController::class, 'show'])->name('pembelian.show');


    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/{penjualan}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::delete('/penjualan/{penjualan}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
    Route::patch('/penjualan/{penjualan}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::get('/penjualan/detail/{penjualan}', [PenjualanController::class, 'show'])->name('penjualan.show');


    Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli.index');
    Route::get('/pembeli/create', [PembeliController::class, 'create'])->name('pembeli.create');
    Route::post('/pembeli/store', [PembeliController::class, 'store'])->name('pembeli.store');
    Route::get('/pembeli/{pembeli}/edit', [PembeliController::class, 'edit'])->name('pembeli.edit');
    Route::patch('/pembeli/{pembeli}', [PembeliController::class, 'update'])->name('pembeli.update');
    Route::delete('/pembeli/{pembeli}', [PembeliController::class, 'destroy'])->name('pembeli.destroy');

    Route::get('/penjual', [PenjualController::class, 'index'])->name('penjual.index');
    Route::get('/penjual/create', [PenjualController::class, 'create'])->name('penjual.create');
    Route::post('/penjual/store', [PenjualController::class, 'store'])->name('penjual.store');
    Route::get('/penjual/{penjual}/edit', [PenjualController::class, 'edit'])->name('penjual.edit');
    Route::patch('/penjual/{penjual}', [PenjualController::class, 'update'])->name('penjual.update');
    Route::delete('/penjual/{penjual}', [PenjualController::class, 'destroy'])->name('penjual.destroy');

    Route::get('/pengantaran', [PengantaranController::class, 'index'])->name('pengantaran.index');
    Route::get('/pengantaran/create', [PengantaranController::class, 'create'])->name('pengantaran.create');
    Route::get('/pengantaran/cetak/{pengantaran}', [PengantaranController::class, 'cetak'])->name('pengantaran.cetak');
    Route::get('/pengantaran/{pengantaran}/edit', [PengantaranController::class, 'edit'])->name('pengantaran.edit');
    Route::post('/pengantaran/store', [PengantaranController::class, 'store'])->name('pengantaran.store');
    Route::patch('/pengantaran/{pengantaran}', [PengantaranController::class, 'update'])->name('pengantaran.update');
    Route::delete('/pengantaran/{pengantaran}', [PengantaranController::class, 'destroy'])->name('pengantaran.destroy');
    Route::post('/pengantaran/selesaikan/{pengantaran}', [PengantaranController::class, 'selesaikan'])->name('pengantaran.selesaikan');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    
    


});






require __DIR__ . '/auth.php';
