<?php

namespace Database\Seeders;

use App\Models\DepartmentMember;
use Illuminate\Database\Seeder;

class DepartmentMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DepartmentMember::create(['department_id' => 1, 'user_id'=>1]);
    }
}
