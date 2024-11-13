<?php

namespace Database\Seeders;

use App\Models\Recipient;
use Illuminate\Database\Seeder;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipient::create([
            'user_id' => 1,
            'message_id' => 1,
        ]);

        Recipient::create([
            'user_id' => 2,
            'message_id' => 2,
        ]);

        Recipient::create([
            'user_id' => 3,
            'message_id' => 3,
        ]);

        Recipient::create([
            'user_id' => 4,
            'message_id' => 4,
        ]);

    }
}
