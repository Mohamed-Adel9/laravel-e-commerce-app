<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about_us');
});


// route example with a closure function

// Route::get('/about', function () {
//     return 'about us page';
// });




// // the two routes below are grouped under the prefix 'product' so that they can be accessed as follows:
// // http://localhost:8000/product/view
// // http://localhost:8000/product/details
// Route::prefix('product')->group(function () {
//     Route::get('view', function () {
//         return 'product view page';
//     });

//     Route::get('details', function () {
//         return 'product details page';
//     });
// });


// Route::get('/vendor/{id}/{name}', function ($id,$name) {
//     return 'contact us page ' . $id . ' ' . $name;
// });

// Route::fallback(function () {
//     return '404 page not found';
// });
