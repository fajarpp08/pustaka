<?php

use App\Http\Middleware\AuthAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/dashboardadmin');
});

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::middleware([authAccess::class . ':Admin'])->group(function () {
        // ROUTE Admin Access only
        Route::get('/dashboardadmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');

        Route::resource('useradm', UserController::class);
        Route::resource('data-kategori', KategoriController::class);
        Route::resource('data-buku', BukuController::class);
        Route::resource('data-pinjam', PeminjamanController::class);
        Route::resource('data-pengembalian', PengembalianController::class);
        // // laporan sewa
        // Route::get('/laporansewa', [SewaController::class, 'laporan'])->name('laporansewa');
        // Route::post('/cetak_laporansewa', [SewaController::class, 'cetakLaporan'])->name('cetak_laporansewa');
        // // laporan pengembalian
        // Route::get('/laporanpengembalian', [PengembalianController::class, 'laporan'])->name('laporanpengembalian');
        // Route::post('/cetak_laporanpengembalian', [PengembalianController::class, 'cetakLaporan'])->name('cetak_laporanpengembalian');
    });

    // ROUTE User / Login Access Only
    Route::get('/dashboarduser', [DashboardController::class, 'dashboardUser'])->name('dashboardUser');
    Route::get('/buku', [DashboardController::class, 'buku'])->name('buku');
    Route::get('/buku/detail/{id}', [DashboardController::class, 'bukuDetail'])->name('buku.detail');
    Route::get('/account', [DashboardController::class, 'account'])->name('account');

    // Peminjaman User
    Route::get('/pinjam/form/{buku_id}', [PeminjamanController::class, 'formPeminjaman'])->name('pinjam.form');
    Route::post('/pinjam/create', [PeminjamanController::class, 'createPeminjaman'])->name('pinjam.create');
    Route::get('/pinjaman', [PeminjamanController::class, 'pinjaman'])->name('pinjaman');
    Route::post('/kembalikan/{pinjam}', [PeminjamanController::class, 'kembalikan'])->name('kembalikan');

    // Route fitur search
    // Route::get('/mobils/search', [MobilController::class, 'searchByName'])->name('mobils.searchname');
    // Route::get('/searchmobil', [MobilController::class, 'searchByDate'])->name('mobils.searchdate');
});

// Route Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'saveRegister'])->name('saveRegister');
