<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SmartHouseController;
use App\Http\Controllers\FaceDetectionController;
use App\Http\Controllers\RegisterController;
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

Route::get('/functions', [SmartHouseController::class, 'index'])->name('functions');



Route::get('/face_detection', [FaceDetectionController::class, 'index'])
     ->name('face_detection');


     Route::get('/login', [LoginController::class, 'index'])
     ->name('login');
     
     Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register',[RegisterController::class, 'store']);







