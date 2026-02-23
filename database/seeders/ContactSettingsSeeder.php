<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ContactSettingsSeeder extends Seeder
{
    public function run()
    {
        // truncate safely
        if (Schema::hasTable('contact_settings')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            try { ContactSetting::truncate(); } finally { DB::statement('SET FOREIGN_KEY_CHECKS=1;'); }
        }

        ContactSetting::create([
            'phone' => '+8801317272900',
            'email' => 'syedmwaliullah@gmail.com',
            'address' => 'House 176 (4th Floor), Road 2, Baridhara DOHS, Dhaka',
        ]);
    }
}
