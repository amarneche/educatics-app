<?php

namespace App\Http\Controllers\OnBoarding;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnBoarding\TenantRegistrationRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterTenantController extends Controller 
{
    //

    public function show(){
        return view('onboarding.show');
    }


    public function store(TenantRegistrationRequest $request){
        //validate form.
        $data= $request->validated();
        //Create new Tenant.
        $tenant= Tenant::create([
            'school_name'=>$data['school_name'],
            'admin_email'=>$data['email'],
            'admin_name'=>$data['first_name'],
            'admin_last_name'=>$data['last_name'],
            'admin_phone'=>$data['phone'],
        ]);
        $domain = implode("."  ,array_filter([$data['domain'],env('MAIN_DOMAIN')]));
        
        //Assign domain to Tenant.
        $tenant->domains()->create(['domain'=>$domain]);

        //Create Admin User  Account.
        $tenant->run(function() use ($data){
            $user =User::create([
                "first_name"=>$data['first_name'],
                "last_name"=>$data['last_name'],
                "email"=>$data['email'],
                "password"=>Hash::make($data['password']),
            ]);
            // assign some roles and permissions to this user :
            $user->assignRoles(['admin']);
        }); 

        //redirect to the domain account.
        return redirect()->route('tenant.dashboard')->domain($domain);


    }
}
