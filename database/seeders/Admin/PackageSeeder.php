<?php

namespace Database\Seeders\Admin;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'title'=>'Solo',
            'price'=>1000.00,
            'description'=>"Basic usage and access to  basic features",
            'status'=>'active',
        ]);
        Package::create([
            'title'=>'Start up',
            'price'=>2000.00,
            'description'=>"Everything from  with access to multi users",
            'status'=>'active',
        ]);
        Package::create([
            'title'=>'Advanced',
            'price'=>5000.00,
            'description'=>"All Features from start up in addition to a FREE",
            'status'=>'active',
        ]);
    }
}
