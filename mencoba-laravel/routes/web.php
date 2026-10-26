<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('belajar', [MencobaController::class, 'index']);
Route::get('tambah', [MencobaController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [MencobaController::class, 'actionTambah'])->name('actionTambah');
Route::post('actionKurang', [MencobaController::class, 'actionKurang'])->name('actionKurang');
Route::post('actionKali', [MencobaController::class, 'actionKali'])->name('actionKali');
Route::get('kurang', [MencobaController::class, 'kurang'])->name('kurang');
Route::get('bagi', [MencobaController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [MencobaController::class, 'actionBagi'])->name('actionBagi');

Route::get('perkalian', [MencobaController::class, 'kali'])->name('perkalian');