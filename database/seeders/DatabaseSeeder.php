<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndAdminSeeder::class,
            CompanyProfileSeeder::class,
            ContactSettingsSeeder::class,
            ServicesSeeder::class,
            ProjectsSeeder::class,
            // Add new seeders here if needed
        ]);
    }
}
