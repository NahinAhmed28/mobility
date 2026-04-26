<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        // Safely truncate related tables
        if (Schema::hasTable('project_images') || Schema::hasTable('projects')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            try {
                ProjectImage::truncate();
                Project::truncate();
            } finally {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        }

        $projectsData = [
            'International Projects' => [
                ['title' => 'Hyderabad Pharma City – Integrated Master Plan & Design, India', 'location' => 'India'],
                ['title' => 'Business Case Development and ROF Featherstone Highways Model Option Test, Staffordshire County Council, UK', 'location' => 'UK'],
                ['title' => 'Evesham Highway Model, Worcestershire County Council, UK', 'location' => 'UK'],
                ['title' => 'Dwarka Tunnel Project, India', 'location' => 'India'],
            ],
            'Road Projects' => [
                ['title' => 'Feasibility Study & Detailed Design of N1 Highway Expansion', 'location' => 'Bangladesh'],
                ['title' => 'Consultancy Services for Feasibility Study of 22 Roads under RHD', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility Study on Dhaka Outer Ring Road Project', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility Study and Preliminary design of 4 Lane Marine Drive', 'location' => 'Bangladesh'],
            ],
            'Rail Projects' => [
                ['title' => 'Railway Connectivity Improvement Preparatory Facility (RCIPF)', 'location' => 'Bangladesh'],
                ['title' => 'Dhaka-Chittagong-Cox\'s Bazar Rail Project Preparatory Facility', 'location' => 'Bangladesh'],
                ['title' => 'Detailed Design and Tender Assistance for MRT Line–1', 'location' => 'Dhaka, Bangladesh'],
            ],
            'Bridge & Infrastructure Projects' => [
                ['title' => 'Axle Load Control Station Project, Bangladesh', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility study and detailed design of 8 bridges in Mymensingh', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility Study and detailed design of 2nd Sultana Kamal Bridge', 'location' => 'Bangladesh'],
            ],
        ];

        // Collect all projects first, then assign shuffled display_order values
        $allProjects = [];
        foreach ($projectsData as $catName => $projects) {
            foreach ($projects as $i => $p) {
                $allProjects[] = [
                    'catName' => $catName,
                    'project' => $p,
                    'sortOrder' => $i,
                ];
            }
        }

        // Generate unique random display_order values (1..N shuffled)
        $totalProjects = count($allProjects);
        $displayOrders = range(1, $totalProjects);
        shuffle($displayOrders);

        foreach ($allProjects as $index => $entry) {
            $catName = $entry['catName'];
            $p = $entry['project'];

            // Find or create the service category
            $cat = ServiceCategory::firstOrCreate(
                ['name' => $catName],
                ['slug' => Str::slug($catName), 'sort_order' => 50]
            );

            Project::create([
                'service_category_id' => $cat->id,
                'title' => $p['title'],
                'slug' => Str::slug($p['title']) . '-' . rand(100, 999),
                'location' => $p['location'] ?? null,
                'client' => 'Confidential Client',
                'year' => '2023',
                'description' => 'Detailed consultancy and advisory services for ' . $p['title'],
                'sort_order' => $entry['sortOrder'],
                'display_order' => $displayOrders[$index],
                'is_featured' => ($entry['sortOrder'] < 2),
            ]);
        }
    }
}
