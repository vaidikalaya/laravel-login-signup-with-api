<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{WelcomeController,AuthController};

Route::get('/', function () {
    return view('welcome');
});

Route::controller(WelcomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/register', 'index');
    Route::get('/login', 'index');
    Route::get('/dashboard', 'index');
});

