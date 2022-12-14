<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\OnBoarding\RegisterTenantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Central routes : 
Auth::routes(['register'=>false]);

Route::get('/', function () {
    return redirect('/dashboard');
});



Route::group(['as'=>'onboarding.','middleware' => 'web'  ]  ,function(){
    Route::get('/join',[RegisterTenantController::class,'show'])->name('show');
    Route::post('/join',[RegisterTenantController::class,'store'])->name('store');
} );

//Admin route authenticated 

Route::group(['as'=>'admin.','prefix'=>'/','namespace'=>'App\Http\Controller\Admin' ,'middleware'=>'auth'] ,function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
