<?php

namespace Database\Seeders\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a super admin for the App !

        $baseAdmin=User::create([
            'first_name'=>'Amar', 
            'last_name'=>'Neche', 
            'email'=>'admin@educatics.net',
            'password'=>Hash::make("password") ,
            'phone'=>'+213673377481',
        ]);
        Role::firstOrCreate(['name'=>'super-admin']);
        $baseAdmin->assignRole(['super-admin']);

    }
}
