<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Message::create([
            // 'message_category_id' => 1, // Replace with actual category ID
            'user' => 'James Faber', // Replace with actual sender ID
            // 'topic' => 'Message 1',
            'text' => 'This is message 1 content.',
            'sender' => 'own',
            'timestamp' => now(),

            // // 'location' => 'Location 1',
            // 'date_sent' => now(),
            // 'is_archive' => false,
            // 'is_deleted' => false,
            // 'is_forwarded' => false,
            // 'type' => 'email',
        ]);

        Message::create([
             // 'message_category_id' => 1, // Replace with actual category ID
             'user' => 'david', // Replace with actual sender ID
             // 'topic' => 'Message 1',
             'text' => 'This is message 1 content.',
             'sender' => 'own',
             'timestamp' => now(),

                // // 'location' => 'Location 1',
             // 'date_sent' => now(),
             // 'is_archive' => false,
             // 'is_deleted' => false,
             // 'is_forwarded' => false,
             // 'type' => 'email',
        ]);

        Message::create([
            // 'message_category_id' => 3, // Replace with actual category ID
            'user' => 'dwight', // Replace with actual sender ID
            // 'topic' => 'Message 3',
            'text' => 'This is message 1 content.',
             'sender' => 'own',
             'timestamp' => now(),

            // 'is_archive' => false,
            // 'is_deleted' => false,
            // 'is_forwarded' => false,
            // 'type' => 'notification',
        ]);

        Message::create([
           // 'message_category_id' => 3, // Replace with actual category ID
           'user' => 'Beverly', // Replace with actual sender ID
           // 'topic' => 'Message 3',
           'text' => 'This is message 1 content.',
            'sender' => 'own',
            'timestamp' => now(),

            // 'is_archive' => false,
           // 'is_deleted' => false,
           // 'is_forwarded' => false,
           // 'type' => 'notification',
        ]);
    }
}
