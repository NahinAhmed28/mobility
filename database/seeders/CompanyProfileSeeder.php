<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CompanyProfileSeeder extends Seeder
{
    public function run()
    {
        // truncate safely
        if (Schema::hasTable('company_profiles')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            try { CompanyProfile::truncate(); } finally { DB::statement('SET FOREIGN_KEY_CHECKS=1;'); }
        }

        CompanyProfile::create([
            'name' => 'Mobility Unlimited',
            'tagline' => 'Expert Transportation Planning & Engineering Solutions',
            'intro' => 'We provide specialist transport planning, design, and engineering services to deliver sustainable mobility solutions.',
            'about_html' => '<h3>About Mobility Unlimited</h3><p>Mobility Unlimited is a leading transport planning consultancy with over a decade of experience delivering comprehensive feasibility studies, design solutions, and strategic advisory services. We specialize in:</p><ul><li>Feasibility Studies & Financial Analysis</li><li>Transportation Planning & Modeling</li><li>Traffic Impact Assessment</li><li>Road & Railway Design</li><li>Project Management & Supervision</li></ul><p>Our team of experienced professionals has successfully completed projects across multiple countries, delivering sustainable solutions to complex transportation challenges.</p>',
        ]);
    }
}
