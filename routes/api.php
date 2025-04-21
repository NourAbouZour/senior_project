<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabelController;


Route::get('/labels', [LabelController::class, 'index']);
