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
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\File;


Route::view('/', 'pages.home')->name('home');


Route::get('/products', [ProductsController::class, 'index'])
     ->name('products');


Route::view('/certifications', 'pages.certifications')->name('certifications');
Route::view('/aboutus', 'pages.aboutus')->name('aboutus');
Route::view('/contactus', 'pages.contact')->name('contact');
Route::view('/productdesc', 'pages.product-detail')
     ->name('product.detail');


Route::get('/bundles', [BundleController::class, 'index'])->name('bundles');
Route::get('/face_detection', [FaceDetectionController::class, 'index'])
     ->name('face_detection');
Route::get('/functions', [SmartHouseController::class, 'index'])
     ->name('functions');
Route::view('/record', 'pages.record')->name('frames.record');



Route::get('/login', [LoginController::class, 'index'])
     ->name('login.form');
Route::post('/login', [LoginController::class, 'login'])
     ->name('login');

Route::get('/register', [RegisterController::class, 'index'])
     ->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])
     ->name('register');



Route::post('/contact', [ContactController::class, 'store'])
     ->name('contact.store');
Route::post('/newsletter', [NewsletterController::class, 'store'])
     ->name('newsletter.store');


Route::post('/cart/checkout', [CartController::class, 'store'])
     ->name('cart.checkout');


Route::get('/checkout', [CheckoutController::class, 'create'])
     ->name('checkout.create');




Route::get('/checkout', [CheckoutController::class, 'create'])
     ->name('checkout.create');
Route::post('/checkout', [CheckoutController::class, 'store'])
     ->name('checkout.store');


Route::get('/checkout/index', [CheckoutController::class, 'create'])
     ->name('checkout.index');

Route::view('/terms', 'widgets.termsandconditions')
     ->name('terms');

// Camera capture (face signup)
Route::view('/record', 'pages.record')->name('frames.record');
Route::post('/upload-frames', [FrameController::class, 'store'])->name('frames.upload');



Route::get('/api/labels', function() {
    // points to public/labeled_images/*
    $paths = File::directories(public_path('labeled_images'));
    // basename of each folder is your label
    $labels = array_map(fn($p) => basename($p), $paths);
    return response()->json($labels);
});


