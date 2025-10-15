<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{id}/{category?}', 'detail');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'] );