<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return route('frontend.home');
});

define('PAGINATE', 15);


include('backend.php');
include('frontend.php');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
