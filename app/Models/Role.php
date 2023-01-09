<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    const SUPER_ADMIN = 'super-admin';
    const TENANT='tenant';
    const RESELLER='reseller';
    //these are inside tenant db :
    const ADMIN='admin';
    const TEACHER='teacher';
    const STUDENT='student';
    const EMPLOYEE='employee';

    public static function getDefaultRole(){
        // check where the request is coming from ! 
        if(is_null(tenant())){
            return static::TENANT;
        }
        else {
            return static::STUDENT;
        }
        
    }
    
}
