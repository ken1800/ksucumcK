<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

           'site_name' =>"Ksucu Blog",
           'contact_number' =>'0720589624',
           'contact_email' =>'admin@gmail.com',
           'address' =>'kenneth irungu'


        ]);
    }
}
