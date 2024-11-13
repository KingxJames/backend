<?php

namespace Database\Seeders;

use App\Models\IncidentType;
use Illuminate\Database\Seeder;

class IncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentType::create([
            'name' => 'Type 1',
            'icon' => '/icon/3',
            'message' => 'This is message 3 content.',
        ]);
        IncidentType::create([
            'name' => 'Type 2',
            'icon' => '/icon/2',
            'message' => 'This is message 3 content.',
        ]);
        IncidentType::create([
            'name' => 'Type 3',
            'icon' => '/icon/1',
            'message' => 'This is message 3 content.',
        ]);
        IncidentType::create([
            'name' => 'Type 4',
            'icon' => '/icon/543',
            'message' => 'This is message 3 content.',
        ]);
    }
}
