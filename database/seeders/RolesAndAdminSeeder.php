<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RolesAndAdminSeeder extends Seeder
{
    public function run()
    {
        // create default super-admin user
        $user = User::firstOrCreate([
            'email' => 'admin@mobility.local'
        ],[
            'name' => 'Mobility Admin',
            'password' => bcrypt('password'),
        ]);

        // If Spatie Permission is installed, create roles and assign role
        if (class_exists(\Spatie\Permission\Models\Role::class)) {
            $roleClass = \Spatie\Permission\Models\Role::class;
            $roleClass::firstOrCreate(['name' => 'super-admin']);
            $roleClass::firstOrCreate(['name' => 'admin']);
            $roleClass::firstOrCreate(['name' => 'editor']);

            if (method_exists($user, 'assignRole')) {
                $user->assignRole('super-admin');
            }
        }
    }
}
