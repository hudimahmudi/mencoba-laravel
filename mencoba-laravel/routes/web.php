<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']);

Route::get('belajar', [MencobaController::class, 'index']);
// tambah-tambahan
Route::get('tambah', [MencobaController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [MencobaController::class, 'actionTambah'])->name('actionTambah');

Route::post('actionKurang', [MencobaController::class, 'actionKurang'])->name('actionKurang');
Route::get('kurang', [MencobaController::class, 'kurang'])->name('kurang');

Route::get('perkalian', [MencobaController::class, 'kali'])->name('perkalian');
Route::post('actionKali', [MencobaController::class, 'actionKali'])->name('actionKali');

Route::get('bagi', [MencobaController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [MencobaController::class, 'actionBagi'])->name('actionBagi');

//prefix atau awalan
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/actionLogin', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('actionLogin');
    Route::resource('dashboard',\App\Http\Controllers\DashboardController::class);
    Route::resource('user',\App\Http\Controllers\UserController::class);
    Route::resource('category',\App\Http\Controllers\CategoryController::class);

    Route::get('/setting', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings');
    Route::post('/setting', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

    
});
