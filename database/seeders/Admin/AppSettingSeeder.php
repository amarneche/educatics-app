<?php

namespace Database\Seeders\Admin;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::firstOrCreate(['key'=>'site_name','value'=>'']);
        Setting::firstOrCreate(['key'=>'site_logo_url','value'=>'']);
        Setting::firstOrCreate(['key'=>'favicon_url','value'=>'']);
        Setting::firstOrCreate(['key'=>'business_adress','value'=>'']);
        Setting::firstOrCreate(['key'=>'business_phone','value'=>'']);

        Setting::firstOrCreate(['key'=>'facebook_page','value'=>'']);
        Setting::firstOrCreate(['key'=>'instagram_page','value'=>'']);
        Setting::firstOrCreate(['key'=>'linkedin_page','value'=>'']);

        Setting::firstOrCreate(['key'=>'facebook_pixel_id','value'=>'']);
        Setting::firstOrCreate(['key'=>'google_tag','value'=>'']);
    }
}
