<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Campus::create(['campus' => 'Business Campus',]);
        Campus::create(['campus' => 'FST Campus']);
        Campus::create(['campus' => 'IT Campus']);
        Campus::create(['campus' => 'Social Studies Campus']);

    }
}
