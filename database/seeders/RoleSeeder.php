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
        $allPermissions = [
            //dashboard ? 
            'access_dashboard',
            //users : 
            'list_users','create_user','edit_user','delete_user','show_user',
            //courses  : 
            'list_courses','create_course','edit_course','delete_course','show_course',
            //roles : 
            'list_roles','create_role','edit_role','delete_role','show_role',
            //permissions : 
            'list_permissions','create_permission','edit_permission','delete_permission','show_permission',



        ];
        $studentPermissions=[];
        $teacherPermissions=[];
        $employeePermissions=[];
        foreach($allPermissions as $permission){
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin=Role::firstOrCreate(['name'=>Role::ADMIN]);        
        $admin->givePermissionTo($allPermissions);
        
        $employee=Role::firstOrCreate(['name'=>Role::EMPLOYEE]);
        $employee->givePermissionTo($employeePermissions);
        $student=Role::firstOrCreate(['name'=>Role::STUDENT]);
        $student->givePermissionTo($studentPermissions);
        $teacher=Role::firstOrCreate(['name'=>Role::TEACHER]);
        $teacher->givePermissionTo($teacherPermissions);


    }
}
