<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;


Route::get('belajar', [MencobaController::class, 'index']);
// tambah-tambahan
Route::get('tambah', [MencobaController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [MencobaController::class, 'actionTambah'])->name('actionTambah');
//kurang
Route::post('actionKurang', [MencobaController::class, 'actionKurang'])->name('actionKurang');
Route::get('kurang', [MencobaController::class, 'kurang'])->name('kurang');
//perkalian
Route::get('perkalian', [MencobaController::class, 'kali'])->name('perkalian');
Route::post('actionKali', [MencobaController::class, 'actionKali'])->name('actionKali');
//pembagian
Route::get('bagi', [MencobaController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [MencobaController::class, 'actionBagi'])->name('actionBagi');

//prefix atau awalan
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/actionLogin', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('actionLogin');

    Route::middleware(['auth'])->group(function(){
        Route::resource('dashboard',\App\Http\Controllers\DashboardController::class);
        Route::resource('user',\App\Http\Controllers\UserController::class);
        Route::resource('category',\App\Http\Controllers\CategoryController::class);
        Route::resource('product', \App\Http\Controllers\ProductController::class);
        Route::resource('category_blog', \App\Http\Controllers\CategoryBlogController::class);
        Route::resource('blog', \App\Http\Controllers\BlogController::class);
    
        Route::get('/setting', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings');
        Route::post('/setting', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
        Route::post('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    });


});

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/category/{slug}', [\App\Http\Controllers\CatalogController::class, 'category'])->name('category.show');
Route::get('/product', [\App\Http\Controllers\CatalogController::class, 'listing'])->name('product.index');
Route::get('/product/{slug}', [\App\Http\Controllers\CatalogController::class, 'product'])->name('product.show');

Route::get('faq', [\App\Http\Controllers\PageController::class, 'faq'])->name('faq.index');
Route::get('contact', [\App\Http\Controllers\PageController::class, 'contact'])->name('contact.index');
Route::get('blog', [\App\Http\Controllers\PageController::class, 'blog'])->name('blog.index');

