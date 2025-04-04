<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Frontend
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/detail/{id}', [ProductController::class, 'show'])->name('frontend.detail');
Route::get('/phone-category/{id}',[HomeController::class, 'phoneCategory'])->name('frontend.phoneCategory');
Route::get('/search', [ProductController::class, 'search'])->name('frontend.search');
Route::get('/login', [HomeController::class, 'login'])->name('frontend.login');



//admin
Route::prefix('backend')->group(function () {
    Route::resource('/products', AdminProductController::class);
    Route::resource('/categories', AdminCategoryController::class);
});