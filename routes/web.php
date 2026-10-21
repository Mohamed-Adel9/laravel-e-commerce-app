<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('brands')->group(function () {
    Route::get("/",[BrandController::class, 'index'])->name('brands.index');
    Route::view('create', 'brands.add');
    Route::post('add', [BrandController::class, 'create']);
    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('update/{id}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('destroy/{id}',[BrandController::class,'destroy'])->name('brands.destroy');
});


Route::prefix('categories')->group(function () {
    Route::get("/",[CategoryController::class, 'index'])->name('categories.index');
    Route::view('create', 'categories.add');
    Route::post('add', [CategoryController::class, 'create']);
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('destroy/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');
});

Route::prefix('products')->group(function () {
    Route::get("/",[ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class , 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});