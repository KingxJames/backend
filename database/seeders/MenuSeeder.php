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
        ]);

        Menu::create([
            'name' => 'Menu 2',
            'icon'=>'/icon/2',
            'path' => '/menu2',
        ]);

        Menu::create([
            'name' => 'Menu 3',
            'icon'=>'/icon/3',
            'path' => '/menu3',
        ]);

        Menu::create([
            'name' => 'Menu 4',
            'icon'=>'/icon/4',
            'path' => '/menu4',
        ]);
    }
}
