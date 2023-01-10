<?php

namespace Database\Seeders\Admin;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'title'=>'Multiple users users',
            'description'=>'Admin will be able to add new users to the system',
            'status'=>'active',
            'package_id'=>1,
        ]);
    }
}
