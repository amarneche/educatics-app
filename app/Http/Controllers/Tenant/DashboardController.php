<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function dashboard(){
        
        
        $roles = Role::withCount('users')->get();

        return view('tenant.dashboard',compact('roles'));
    }
}
