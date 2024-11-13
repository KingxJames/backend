<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserStatus::create(['status' => 'Active']);
        UserStatus::create(['status' => 'Inactive']);
        UserStatus::create(['status' => 'Suspended']);   
     }
}
