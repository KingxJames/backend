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
            'sender_id' => 1, // Replace with actual sender ID
            'topic' => 'Message 1',
            'message' => 'This is message 1 content.',
            'location' => 'Location 1',
            'date_sent' => now(),
            'is_archive' => false,
            'is_deleted' => false,
            'is_forwarded' => false,
            'type' => 'email',
        ]);

        Message::create([
            // 'message_category_id' => 2, // Replace with actual category ID
            'sender_id' => 2, // Replace with actual sender ID
            'topic' => 'Message 2',
            'message' => 'This is message 2 content.',
            'location' => 'Location 2',
            'date_sent' => now(),
            'is_archive' => false,
            'is_deleted' => false,
            'is_forwarded' => false,
            'type' => 'sms',
        ]);

        Message::create([
            // 'message_category_id' => 3, // Replace with actual category ID
            'sender_id' => 3, // Replace with actual sender ID
            'topic' => 'Message 3',
            'message' => 'This is message 3 content.',
            'location' => 'Location 3',
            'date_sent' => now(),
            'is_archive' => false,
            'is_deleted' => false,
            'is_forwarded' => false,
            'type' => 'notification',
        ]);

        Message::create([
            // 'message_category_id' => 1, // Replace with actual category ID
            'sender_id' => 1, // Replace with actual sender ID
            'topic' => 'Message 4',
            'message' => 'This is message 4 content.',
            'location' => 'Location 4',
            'date_sent' => now(),
            'is_archive' => false,
            'is_deleted' => false,
            'is_forwarded' => false,
            'type' => 'email',
        ]);
    }
}
