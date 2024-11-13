<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class, 
            CampusSeeder::class,     
            MessageCategorySeeder::class,
            UserCampusSeeder::class,
            BuildingSeeder::class,
            MessageSeeder::class,
            IncidentFileSeeder::class,
            IncidentStatusSeeder::class,
            IncidentReportSeeder::class,
            UserStatusSeeder::class,
            AccessRightSeeder::class,
            RecipientSeeder::class,
            IncidentTypeSeeder::class,
            DepartmentSeeder::class,
            DepartmentMemberSeeder::class,
            MenuSeeder::class,
            MenuRoleSeeder::class,
        ]);   
     }
}