<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['name'=> 'ICT', 'message_id'=> 1]);
        Department::create(['name'=> 'Quality Insurance', 'message_id'=> 2]);
        Department::create(['name'=> 'Student Affairs', 'message_id'=> 3]);
        Department::create(['name'=> 'Payroll', 'message_id'=> 1]);

    }
}
