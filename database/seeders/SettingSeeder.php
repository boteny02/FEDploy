<?php

namespace Database\Seeders;

use DB;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        
        $setting = Setting::create([

            'title'=>'The Fedpoly Academic Management System (F-AMS)',
            'meta_title'=>'Fedpoly Academic Management System',
            'logo_path'=>'logo.png',
            'favicon_path'=>'favicon.png',
            'phone'=>'+880123456789',
            'email'=>'example@mail.com',
            'address'=>'Mirpur, Dhaka',
            'date_format'=>'d-m-Y',
            'time_format'=>'h:i A',
            'week_start'=>'1',
            'time_zone'=>'Asia/Dhaka',
            'currency'=>'USD',
            'currency_symbol'=>'$',
            'decimal_place'=>'2',
            'copyright_text'=>'2022 - Fedpoly Academic Management System (F-AMS)',
            'status'=>'1'
            
        ]);
    }
}
