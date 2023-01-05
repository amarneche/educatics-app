<?php

namespace Database\Seeders\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed initial Central roles and permissions.
        $superAdmin=Role::firstOrCreate(['name'=>Role::SUPER_ADMIN]);
        $tenant=Role::firstOrCreate(['name'=>Role::TENANT]);
        $admin=Role::firstOrCreate(['name'=>Role::RESELLER]);

        //Create their permissions : 
        Permission::firstOrCreate(['name'=>'List User']);
        Permission::firstOrCreate(['name'=>'Create User']);
        Permission::firstOrCreate(['name'=>'Show User']);
        Permission::firstOrCreate(['name'=>'Update User']);
        Permission::firstOrCreate(['name'=>'Delete User']);

        Permission::firstOrCreate(['name'=>'List Tenant']);
        Permission::firstOrCreate(['name'=>'Create Tenant']);
        Permission::firstOrCreate(['name'=>'Show Tenant']);
        Permission::firstOrCreate(['name'=>'Update Tenant']);
        Permission::firstOrCreate(['name'=>'Delete Tenant']);
        
        Permission::firstOrCreate(['name'=>'List Domain']);
        Permission::firstOrCreate(['name'=>'Create Domain']);
        Permission::firstOrCreate(['name'=>'Show Domain']);
        Permission::firstOrCreate(['name'=>'Update Domain']);
        Permission::firstOrCreate(['name'=>'Delete Domain']);
        
        Permission::firstOrCreate(['name'=>'List Package']);
        Permission::firstOrCreate(['name'=>'Create Package']);
        Permission::firstOrCreate(['name'=>'Show Package']);
        Permission::firstOrCreate(['name'=>'Update Package']);
        Permission::firstOrCreate(['name'=>'Delete Package']);
        
        Permission::firstOrCreate(['name'=>'List Feature']);
        Permission::firstOrCreate(['name'=>'Create Feature']);
        Permission::firstOrCreate(['name'=>'Show Feature']);
        Permission::firstOrCreate(['name'=>'Update Feature']);
        Permission::firstOrCreate(['name'=>'Delete Feature']);


        // at the very end  : 
        $superAdmin->givePermissionTo(Permission::all());





    }
} 
