<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('category',[CategoryController::class,'index']);