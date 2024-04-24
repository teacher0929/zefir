<?php

use App\Http\Controllers\Client\BrandController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{slug}', 'show')->name('show')->where('slug', '[A-Za-z0-9-]+');
    });

Route::controller(BrandController::class)
    ->prefix('brands')
    ->name('brands.')
    ->group(function () {
        Route::get('', 'index')->name('index');
    });
