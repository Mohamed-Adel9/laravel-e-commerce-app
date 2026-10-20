<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('category',[CategoryController::class,'store']);

Route::get('add_data',[BrandController::class,'addData']);

Route::get("get_data",[BrandController::class,'getData']);

Route::get('delete', [BrandController::class, 'delete']);

Route::get("get_product",[ProductController::class,'index']);

Route::get("det_draft",[ProductController::class,'getDraft']);
