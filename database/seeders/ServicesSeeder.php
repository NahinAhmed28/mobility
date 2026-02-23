<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use App\Models\ServiceItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks so truncate won't fail when children exist
        if (Schema::hasTable('service_items') || Schema::hasTable('service_categories')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            try {
                ServiceItem::truncate();
                ServiceCategory::truncate();
            } finally {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        }

        // Simple flat Services category
        $cat = ServiceCategory::create(['name' => 'Core Services', 'slug' => 'core-services', 'sort_order' => 1]);

        $items = [
            'Feasibility Studies and Financial Appraisal',
            'Transport Planning & Modelling',
            'Survey Design, Execution, Supervision & Analysis',
            'Traffic Impact Assessment (TIA)',
            'Road Safety, Parking & Traffic Management',
            'Highway, Road, Railway & Pavement Design',
            'Business Case Development & Policy Advisory',
            'Structural Design & BOQ Preparation of Projects',
            'Project Management and Supervision Services',
        ];

        foreach ($items as $i => $title) {
            ServiceItem::create([
                'service_category_id' => $cat->id,
                'title' => $title,
                'details_text' => null,
                'sort_order' => $i,
                'is_featured' => ($i < 4),
            ]);
        }

        // Detailed groups as categories
        $groups = [
            'Feasibility Studies & Financial Analysis' => [
                'Feasibility studies, economic analysis using HDM4, TUBA, Excel',
                'Cost-benefit analysis and financial appraisal for projects'
            ],
            'Transport Planning, Modelling and TIA' => [
                'Intersection analysis, corridor studies, transportation modelling using (VISSIM, VISUM, SUMO, SIDRA)',
                'Traffic Demand forecasting, strategic transport planning',
                'Traffic Impact Assessment (TIA)'
            ],
            'Survey Design, Execution, Supervision & Analysis' => [
                'Design, conduct, supervise, and analyse traffic, socio-economic, environmental, topographic and land use surveys',
                'Analyse survey data and produce detailed survey reports'
            ],
            'Road Safety, Parking & Traffic Management' => [
                'Road safety audits, accident analysis, and safety planning',
                'Parking policy and traffic management strategies'
            ],
            'Highway, Road, Railway & Pavement Design' => [
                'Road alignment, cross-section and pavement design',
                'Railway alignment, gauge conversion, stations, and depots'
            ],
            'Structural Design & BOQ Preparation of Projects' => [
                'Structural design & Bill of Quantities (BOQ) preparation of residential and commercial buildings, roads and bridges'
            ],
        ];

        $order = 10;
        foreach ($groups as $name => $details) {
            $cat = ServiceCategory::create(['name' => $name, 'slug' => \Illuminate\Support\Str::slug($name), 'sort_order' => $order++]);
            foreach ($details as $i => $d) {
                ServiceItem::create([
                    'service_category_id' => $cat->id,
                    'title' => $d,
                    'details_text' => null,
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
