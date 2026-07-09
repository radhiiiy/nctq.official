<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KritikSaranController as AdminKritikSaranController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Site Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/kritik-saran', [KritikSaranController::class, 'index'])->name('kritik-saran.index');
Route::post('/kritik-saran', [KritikSaranController::class, 'store'])->name('kritik-saran.store');

Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb.index');
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('activities', ActivityController::class)->except(['show']);

    Route::get('/ppdb', [AdminPpdbController::class, 'index'])->name('ppdb.index');
    Route::get('/ppdb/{ppdb}', [AdminPpdbController::class, 'show'])->name('ppdb.show');
    Route::put('/ppdb/{ppdb}', [AdminPpdbController::class, 'update'])->name('ppdb.update');
    Route::delete('/ppdb/{ppdb}', [AdminPpdbController::class, 'destroy'])->name('ppdb.destroy');

    Route::get('/kritik-saran', [AdminKritikSaranController::class, 'index'])->name('kritik-saran.index');
    Route::get('/kritik-saran/{kritikSaran}', [AdminKritikSaranController::class, 'show'])->name('kritik-saran.show');
    Route::delete('/kritik-saran/{kritikSaran}', [AdminKritikSaranController::class, 'destroy'])->name('kritik-saran.destroy');

    Route::get('/pengaturan', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/pengaturan', [SettingController::class, 'update'])->name('settings.update');
});
