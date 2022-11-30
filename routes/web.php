<?php

use App\Http\Controllers\OnBoarding\RegisterTenantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Central routes : 

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as'=>'onboarding.','middleware' => 'web'  ]  ,function(){
    Route::get('/join',[RegisterTenantController::class,'show'])->name('show');
    Route::post('/join',[RegisterTenantController::class,'store'])->name('store');
} );


Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
