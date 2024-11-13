<?php

namespace Database\Seeders;

use App\Models\AccessRight;
use Illuminate\Database\Seeder;

class AccessRightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessRight::create(['description'=>'blah', 'role_id'=> 1]);
        AccessRight::create(['description'=>'bla', 'role_id'=> 2]);
        AccessRight::create(['description'=>'blh', 'role_id'=> 3]);
        AccessRight::create(['description'=>'bah', 'role_id'=> 4]);

    }
}
