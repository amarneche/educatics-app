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



Route::group([
    'middleware'=>['web',InitializeTenancyByDomainOrSubdomain::class,PreventAccessFromCentralDomains::class],
            ],
    function(){
        // Auth routes & publicly accessible
        Auth::routes(['register'=>false ,'verify'=>true]);
        Route::get('/', function () {
            return redirect('/dashboard');
        });
        //Require auth :

        Route::group(['as'=>'tenant.','prefix' =>'/' ,    
            'middleware'=>['auth',InitializeTenancyByDomainOrSubdomain::class,PreventAccessFromCentralDomains::class],
    ]  ,function(){
            Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
            
        } );


        //Allowed for non verified uses

});


