<?php

namespace Database\Seeders;

use App\Models\IncidentStatus;
use Illuminate\Database\Seeder;

class IncidentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentStatus::create(['status' => 'Open']);
        IncidentStatus::create(['status' => 'Closed']);
        IncidentStatus::create(['status' => 'Pending']);
        IncidentStatus::create(['status' => 'Blah']);
    }
}
