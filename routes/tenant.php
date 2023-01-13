<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Tenant\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
Route::group([ 'middleware'=>['web',InitializeTenancyByDomainOrSubdomain::class,PreventAccessFromCentralDomains::class]],function(){
    Auth::routes(['register'=>true ,'verify'=>true]);

});

Route::get('/subscription/expired',function(){
    
    return 'Your subscription expired';
    })->name('tenant.subscription.expired');

Route::group([
    'as'=>'tenant.',
    'middleware'=>['web' ,InitializeTenancyByDomainOrSubdomain::class,PreventAccessFromCentralDomains::class],
            ],
    function(){
        // Auth routes & publicly accessible
       
        Route::get('/', function () {
            return redirect('/dashboard');
        });
        //Require auth :

        Route::group(['prefix' =>'/' ,    
            'middleware'=>['auth',InitializeTenancyByDomainOrSubdomain::class,PreventAccessFromCentralDomains::class],
            'namespace'=>'App\Http\Controllers\Tenant'
    ]  ,function(){
            Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
            Route::resource('users',UserController::class);
            Route::resource('courses',CourseController::class);
            Route::resource('enrollments',EnrollmentController::class);
            Route::post('media/upload',[App\Http\Controllers\Tenant\MediaController::class,'upload'])->name('media.upload');
            Route::resource('media', MediaController::class);

            
        } );


        //Allowed for non verified uses

});


