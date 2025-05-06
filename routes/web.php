<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SmartHouseController;
use App\Http\Controllers\FaceDetectionController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\FrameController;

// Homepage
Route::get('/', function () {
    return view('pages.home');
});

// Products
Route::get('/products', [ProductsController::class, 'index'])->name('products');

// Static pages
Route::get('/aboutus', function () {
    return view('pages.aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/productdesc', function () {
    return view('pages.product-detail');
})->name('product.detail');

// Smart house functions
Route::get('/functions', [SmartHouseController::class, 'index'])->name('functions');

// Face detection
Route::get('/face_detection', [FaceDetectionController::class, 'index'])->name('face_detection');

// Login and register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Bundles
Route::get('/bundles', [BundleController::class, 'index'])->name('bundles');

// Camera capture (face signup)
Route::view('/record', 'pages.record')->name('frames.record');
Route::post('/upload-frames', [FrameController::class, 'store'])->name('frames.upload');

// API for labels
Route::get('/api/labels', [LabelController::class, 'index']);
