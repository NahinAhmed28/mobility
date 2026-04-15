<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftwareModuleSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate existing data to avoid duplicates
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \App\Models\SoftwareProduct::truncate();
        \App\Models\SoftwareCategory::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $categories = [
            [
                'name' => 'Transport Modelling',
                'description' => 'Advanced software solutions for strategic transport planning, traffic engineering, and pedestrian simulation.',
                'products' => ['Visum', 'Vissim', 'Viswalk', 'Cube', 'TransCAD', 'Aimsun']
            ],
            [
                'name' => 'Economic Analysis',
                'description' => 'Specialized software for highway development management and project appraisal.',
                'products' => ['HDM4', 'TUBA']
            ]
        ];

        foreach ($categories as $catData) {
            $category = \App\Models\SoftwareCategory::create([
                'name' => $catData['name'],
                'slug' => \Illuminate\Support\Str::slug($catData['name']),
                'description' => $catData['description'],
                'is_active' => true,
            ]);

            foreach ($catData['products'] as $pName) {
                $isModelling = $catData['name'] === 'Transport Modelling';
                $description = $isModelling 
                    ? "Industry-standard software for comprehensive transport planning, traffic analysis, and pedestrian simulation."
                    : "Powerful analytical tool for the economic evaluation, appraisal, and management of highway infrastructure projects.";
                
                $details = $isModelling
                    ? "<p>{$pName} is a world-leading software solution for transportation professionals. It provides advanced tools for Modelling multi-modal transport networks, simulating traffic flow at microscopic or macroscopic levels, and analyzing urban mobility patterns with precision.</p><ul><li>Strategic transport planning and forecasting</li><li>Traffic impact assessments</li><li>Public transport network optimization</li></ul>"
                    : "<p>{$pName} is a specialized tool designed for robust economic analysis and appraisal of transport investments. It enables engineers and economists to evaluate project feasibility, prioritize maintenance strategies, and calculate user benefits for complex highway developments.</p><ul><li>Life-cycle cost analysis</li><li>Cost-benefit appraisal (BCR/NPV)</li><li>Investment prioritization and budgeting</li></ul>";

                \App\Models\SoftwareProduct::create([
                    'software_category_id' => $category->id,
                    'title' => $pName,
                    'slug' => \Illuminate\Support\Str::slug($pName),
                    'description' => $description,
                    'details_text' => $details,
                    'is_active' => true,
                ]);
            }
        }
    }
}
