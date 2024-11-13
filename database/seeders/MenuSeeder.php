<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Menu 1',
            'icon'=>'/icon/1',
            'path' => '/menu1',
            'parent_id'=> 1,
            'role_id' => 1,
        ]);

        Menu::create([
            'name' => 'Menu 2',
            'icon'=>'/icon/2',
            'path' => '/menu2',
            'parent_id'=> 2,
            'role_id' => 1,
        ]);

        Menu::create([
            'name' => 'Menu 3',
            'icon'=>'/icon/3',
            'path' => '/menu3',
            'parent_id'=> 3,
            'role_id' => 2,
        ]);

        Menu::create([
            'name' => 'Menu 4',
            'icon'=>'/icon/4',
            'path' => '/menu4',
            'parent_id'=> 4,
            'role_id' => 2,
        ]);
    }
}
