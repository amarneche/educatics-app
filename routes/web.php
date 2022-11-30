<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Central routes : 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
