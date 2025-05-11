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

// Homepage
Route::get('/', function () {
    return view('pages.home');
});

// Products
Route::get('/products', [ProductsController::class, 'index'])->name('products');

// Static pages
Route::get('/aboutus', fn() => view('pages.aboutus'))->name('aboutus');
Route::get('/contactus', fn() => view('pages.contact'))->name('contact');
Route::get('/productdesc', fn() => view('pages.product-detail'))->name('product.detail');

// Smart house functions (protected—check session in your controller)
Route::get('/functions', [SmartHouseController::class, 'index'])->name('functions');

// Face detection signup/signin
Route::get('/face_detection', [FaceDetectionController::class, 'index'])->name('face_detection');


Route::get('/login', [LoginController::class, 'index'])->name('login.form');
// Handle the POST
Route::post('/login', [LoginController::class, 'login'])->name('login');


// register page & store
Route::get('/register', [RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Bundles
Route::get('/bundles', [BundleController::class, 'index'])->name('bundles');

// Camera capture (face signup)
Route::view('/record', 'pages.record')->name('frames.record');
Route::post('/upload-frames', [FrameController::class, 'store'])->name('frames.upload');

// API for labels
Route::get('/api/labels', [LabelController::class, 'index']);



Route::get('/checkout', [CheckoutController::class, 'index'])
     ->name('checkout.index');

Route::post('/checkout', [CheckoutController::class, 'store'])
     ->name('checkout.store');
// If you just need to return a view:
Route::view('/terms', 'widgets.termsandconditions')
     ->name('terms');



Route::post('/contact', [ContactController::class, 'store'])
     ->name('contact.store');
Route::post('/newsletter', [NewsletterController::class, 'store'])
     ->name('newsletter.store');

use App\Http\Controllers\CartController;

Route::post('/cart/checkout', [CartController::class, 'store'])
     ->name('cart.checkout');




