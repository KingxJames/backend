<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'roles' => 'Super Admin',
            'description' => 'Super Administrator role',
        ]);

        Role::create([
            'roles' => 'Admin',
            'description' => 'Admin role',
        ]);

        Role::create([
            'roles' => 'Staff',
            'description' => 'Staff role',
        ]);

        Role::create([
            'roles' => 'Students',
            'description' => 'Students role',
        ]);


    }
}