<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('brands')->group(function () {
    Route::get("/",[BrandController::class, 'index'])->name('brands.index');
    Route::view('create', 'brands.add');
    Route::post('add', [BrandController::class, 'create']);
    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
    Route::post('update/{id}', [BrandController::class, 'update'])->name('brands.update');
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