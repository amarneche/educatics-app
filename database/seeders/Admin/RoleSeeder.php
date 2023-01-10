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
        $allPermissions = [
            //dashboard ? 
            'access_dashboard',
            //users : 
            'list_users','create_user','edit_user','delete_user','show_user',
            //tenants  : 
            'list_tenants','create_tenant','edit_tenant','delete_tenant','show_tenant',
            //domains : 
            'list_domains','create_domain','edit_domain','delete_domain','show_domain',
            //packages : 
            'list_packages','create_package','edit_package','delete_package','show_package',
            // features : 
            'list_features','create_feature','edit_feature','delete_feature','show_feature',
             //roles : 
             'list_roles','create_role','edit_role','delete_role','show_role',
             //permissions : 
             'list_permissions','create_permission','edit_permission','delete_permission','show_permission',
             //Subscriptions : 
             'list_subscriptions','create_subscription','edit_subscription','delete_subscription','show_subscription',
 

        ];
        foreach($allPermissions as $permission){
            Permission::firstOrCreate(['name'=>$permission]);
        }
        $tenantPermissions=[
            'access_dashboard',

            'list_tenants',
            'create_tenant',
            'edit_tenant',
            'delete_tenant',            

            'list_domains',
            'create_domain',
            'edit_domain',
            'delete_domain',
            'show_domain',
            
        ];


        // Seed initial Central roles and permissions.
        $superAdmin=Role::firstOrCreate(['name'=>Role::SUPER_ADMIN]);
        $tenant=Role::firstOrCreate(['name'=>Role::TENANT]);
        $admin=Role::firstOrCreate(['name'=>Role::RESELLER]);

        $tenant->givePermissionTo($tenantPermissions);

        // at the very end  : 
        $superAdmin->givePermissionTo(Permission::all());





    }
} 
