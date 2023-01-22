<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =[Role::TEACHER,Role::EMPLOYEE,Role::STUDENT];
        User::where('email','!=','admin@educatics.net')->delete();
        User::factory()->count(50)->create()->each(function($user) use($roles){
            $user->addMediaFromUrl('https://i.pravatar.cc/200?u='.$user->id)->toMediaCollection('avatar');
            $user->assignRole([$roles[array_rand($roles)]]);
            
        });


    }
}
