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
        $admin=Role::firstOrCreate(['name'=>'admin']);
        $admin=Role::firstOrCreate(['name'=>'employee']);
        $student=Role::firstOrCreate(['name'=>'student']);
        $student=Role::firstOrCreate(['name'=>'teacher']);


    }
}
