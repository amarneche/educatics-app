<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role ;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {

        $admin=Role::firstOrCreate(['name'=>Role::ADMIN]);        
        $employee=Role::firstOrCreate(['name'=>Role::EMPLOYEE]);
        $student=Role::firstOrCreate(['name'=>Role::STUDENT]);
        $teacher=Role::firstOrCreate(['name'=>Role::TEACHER]);

        //Users Permissions.
        Permission::firstOrCreate(['name'=>'Create User']);


    }
}
