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

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

// Homepage
Route::view('/', 'pages.home')->name('home');

// Products listing
Route::get('/products', [ProductsController::class, 'index'])
     ->name('products');

// Static pages
Route::view('/aboutus', 'pages.aboutus')->name('aboutus');
Route::view('/contactus', 'pages.contact')->name('contact');
Route::view('/productdesc', 'pages.product-detail')
     ->name('product.detail');

// Bundles, face‐detection, smart‐house, record
Route::get('/bundles', [BundleController::class, 'index'])->name('bundles');
Route::get('/face_detection', [FaceDetectionController::class, 'index'])
     ->name('face_detection');
Route::get('/functions', [SmartHouseController::class, 'index'])
     ->name('functions');
Route::view('/record', 'pages.record')->name('frames.record');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index'])
     ->name('login.form');
Route::post('/login', [LoginController::class, 'login'])
     ->name('login');

Route::get('/register', [RegisterController::class, 'index'])
     ->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])
     ->name('register');

/*
|--------------------------------------------------------------------------
| Contact & Newsletter
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])
     ->name('contact.store');
Route::post('/newsletter', [NewsletterController::class, 'store'])
     ->name('newsletter.store');

/*
|--------------------------------------------------------------------------
| Cart (AJAX) → must be defined BEFORE the /checkout POST
|--------------------------------------------------------------------------
|
| This is the endpoint your JS calls via fetch("{{ route('cart.checkout') }}")
| i.e. POST /cart/checkout → CartController@store
|
*/

// … your other routes …

// 1) Cart save endpoint (will redirect on success)
Route::post('/cart/checkout', [CartController::class, 'store'])
     ->name('cart.checkout');

// 2) Checkout form display
Route::get('/checkout', [CheckoutController::class, 'create'])
     ->name('checkout.create');


/*
|--------------------------------------------------------------------------
| Checkout Form
|--------------------------------------------------------------------------
|
| GET  /checkout        → shows the form (CheckoutController@create)
| POST /checkout        → processes the form (CheckoutController@store)
|
*/

Route::get('/checkout', [CheckoutController::class, 'create'])
     ->name('checkout.create');
Route::post('/checkout', [CheckoutController::class, 'store'])
     ->name('checkout.store');

// (Optional) alias if you really need /checkout/index
Route::get('/checkout/index', [CheckoutController::class, 'create'])
     ->name('checkout.index');

/*
|--------------------------------------------------------------------------
| Misc
|--------------------------------------------------------------------------
*/

Route::view('/terms', 'widgets.termsandconditions')
     ->name('terms');
