<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController, KategoriBukuController, PengunjungController, PinjamController, UserController, BukuController};

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

Route::group(['prefix' => 'dashboard'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::group(['prefix' => 'buku'], function(){
    Route::group(['prefix' => 'kategori'], function(){
        Route::get('/', [KategoriBukuController::class, 'index'])->name('admin.buku.kategori');
        Route::post('/', [KategoriBukuController::class, 'store'])->name('admin.buku.kategori.store');
        Route::patch('/{id}', [KategoriBukuController::class, 'update'])->name('admin.buku.kategori.update');
        Route::get('/delete/{id}', [KategoriBukuController::class, 'destroy'])->name('admin.buku.kategori.delete');
    });

    Route::group(['prefix' => 'list'], function(){
        Route::get('/', [BukuController::class, 'index'])->name('admin.buku.list');
        Route::post('/', [BukuController::class, 'store'])->name('admin.buku.list.store');
        Route::patch('/{id}', [BukuController::class, 'update'])->name('admin.buku.list.update');
        Route::get('/delete/{id}', [BukuController::class, 'destroy'])->name('admin.buku.list.delete');
    });
});

Route::group(['prefix' => 'pengunjung'], function(){
    Route::get('/', [PengunjungController::class, 'index'])->name('admin.pengunjung');
    Route::post('/', [PengunjungController::class, 'store'])->name('admin.pengunjung.store');
    Route::patch('/{id}', [PengunjungController::class, 'update'])->name('admin.pengunjung.update');
    Route::get('/delete/{id}', [PengunjungController::class, 'destroy'])->name('admin.pengunjung.delete');
});

Route::group(['prefix' => 'pinjam'], function(){
    Route::get('/', [PinjamController::class, 'index'])->name('admin.pinjam');
    Route::post('/', [PinjamController::class, 'store'])->name('admin.pinjam.store');
    Route::patch('/{id}', [PinjamController::class, 'update'])->name('admin.pinjam.update');
    Route::get('/delete/{id}', [PinjamController::class, 'destroy'])->name('admin.pinjam.delete');
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index'])->name('admin.user');
    Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
});