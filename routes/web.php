<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('pages.home');
});

Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/aboutus', function () {
    return view('pages.aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/productdesc', function () {
    return view('pages.product-detail');
})->name('product.detail');






