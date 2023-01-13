<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\OnBoarding\RegisterTenantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Central routes : 
Auth::routes();

Route::get('/', function () {
    return redirect('/dashboard');
});



Route::group(['as'=>'onboarding.','middleware' => 'web'  ]  ,function(){
    Route::get('/join',[RegisterTenantController::class,'show'])->name('show');
    Route::post('/join',[RegisterTenantController::class,'store'])->name('store');
} );

//Admin route authenticated 

Route::group(['as'=>'admin.','prefix'=>'/','namespace'=>'App\Http\Controllers\Admin' ,'middleware'=>'auth'] ,function(){
    
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('users',UsersController::class);
    Route::resource('schools',TenantController::class);
    Route::resource('packages',PackageController::class);
    Route::resource('features',FeatureController::class);
    Route::resource('subscriptions',SubscriptionController::class);
    Route::post('media/upload',[MediaController::class,'upload'])->name('media.upload');

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
