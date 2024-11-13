<?php

namespace Database\Seeders;

use App\Models\MenuRole;
use Illuminate\Database\Seeder;

class MenuRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuRole::create([
            'menu_id' => 1,
            'role_id' => 1,
        ]);
        
        MenuRole::create([
            'menu_id' => 2,
            'role_id' => 2,
        ]);

        MenuRole::create([
            'menu_id' => 3,
            'role_id' => 3,
        ]);

        MenuRole::create([
            'menu_id' => 4,
            'role_id' => 4,
        ]);
    }
}
