<?php

namespace Database\Seeders;

use App\Models\UserCampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCampus::create([
            'user_id' => 1,
            'campus_id' => 1,
            'primary_campus' => true,
        ]);
        

        UserCampus::create([
            'user_id' => 2,
            'campus_id' => 2,
            'primary_campus' => false,
        ]);

        UserCampus::create([
            'user_id' => 3,
            'campus_id' => 3,
            'primary_campus' => true,
        ]);
    }
}
