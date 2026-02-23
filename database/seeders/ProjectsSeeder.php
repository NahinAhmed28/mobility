<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        // Safely truncate related tables (disable FK checks on MySQL)
        if (Schema::hasTable('project_images') || Schema::hasTable('projects') || Schema::hasTable('project_categories')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            try {
                ProjectImage::truncate();
                Project::truncate();
                ProjectCategory::truncate();
            } finally {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        }

        $categories = [
            'International Projects' => [
                ['title' => 'Hyderabad Pharma City – Integrated Master Plan & Design, India', 'location' => 'India'],
                ['title' => 'Business Case Development and ROF Featherstone Highways Model Option Test, Staffordshire County Council, UK', 'location' => 'UK'],
                ['title' => 'Evesham Highway Model, Worcestershire County Council, UK', 'location' => 'UK'],
                ['title' => 'Dwarka Tunnel Project, India', 'location' => 'India'],
            ],
            'Road Projects' => [
                ['title' => 'Feasibility Study & Detailed Design of N1 Highway Expansion', 'location' => ''],
                ['title' => 'Consultancy Services for Feasibility Study of 22 Roads under RHD', 'location' => ''],
                ['title' => 'Feasibility Study on Dhaka Outer Ring Road Project', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility Study and Preliminary design of 4 Lane Marine Drive', 'location' => ''],
                ['title' => 'Feasibility Study of Upgradation of Sylhet Airport Road', 'location' => ''],
                ['title' => 'Narayanganj City Corporation Transport Master Plan', 'location' => 'Narayanganj, Bangladesh'],
            ],
            'Rail Projects' => [
                ['title' => 'Railway Connectivity Improvement Preparatory Facility (RCIPF)', 'location' => ''],
                ['title' => 'Dhaka–Chittagong–Cox’s Bazar Rail Project Preparatory Facility', 'location' => 'Bangladesh'],
                ['title' => 'Detailed Design and Tender Assistance for MRT Line–1', 'location' => 'Dhaka, Bangladesh'],
                ['title' => 'Consultancy Services for Detailed Design of MRT Line–5 South', 'location' => 'Dhaka, Bangladesh'],
                ['title' => 'Pre-feasibility of Shimrail–Panchabati LRT Line A', 'location' => ''],
            ],
            'Bridge & Infrastructure Projects' => [
                ['title' => 'Axle Load Control Station Project, Bangladesh', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility study and detailed design of 8 bridges in Mymensingh', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility and detailed design of 6 important bridges under RHD', 'location' => 'Bangladesh'],
                ['title' => 'Feasibility Study and detailed design of 2nd Sultana Kamal Bridge', 'location' => 'Bangladesh'],
            ],
        ];

        $order = 1;
        foreach ($categories as $catName => $projects) {
            $cat = ProjectCategory::create(['name' => $catName, 'slug' => \Illuminate\Support\Str::slug($catName), 'sort_order' => $order++]);
            foreach ($projects as $i => $p) {
                Project::create([
                    'project_category_id' => $cat->id,
                    'title' => $p['title'],
                    'slug' => \Illuminate\Support\Str::slug($p['title']),
                    'location' => $p['location'] ?? null,
                    'client' => null,
                    'year' => null,
                    'description' => null,
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
