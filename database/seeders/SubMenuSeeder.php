<?php

namespace Database\Seeders;

use App\Models\SubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SubMenu::create([
            'icon' => '/icon/1',
            'name' => 'Chat',
            'path' => 'Message/Chat',
            'menu_id' => 2
        ]);

        SubMenu::create([
            'icon' => '/icon/2',
            'name' => 'Anonymous',
            'path' => 'Message/Anonymous',
            'menu_id' => 2
        ]);

        SubMenu::create([
            'icon' => '/icon/1',
            'name' => 'Chat',
            'path' => 'Message/Emergency',
            'menu_id' => 2
        ]);

        SubMenu::create([
            'icon' => '/icon/1',
            'name' => 'Chat',
            'path' => 'Report/Now',
            'menu_id' => 1
        ]);

        SubMenu::create([
            'icon' => '/icon/1',
            'name' => 'Report',
            'path' => 'Report/Emergency',
            'menu_id' => 1
        ]);
        SubMenu::create([
            'icon' => '/icon/1',
            'name' => 'Report',
            'path' => 'Report/path',
            'menu_id' => 3
        ]);

    }
}
