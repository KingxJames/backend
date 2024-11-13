<?php

namespace Database\Seeders;

use App\Models\IncidentFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IncidentFile::create(['path' => 'path/to/file1', 'comment' => 'Comment for file 1', 'message_id' => 1,]);
        IncidentFile::create(['path' => 'path/to/file2', 'comment' => 'Comment for file 2', 'message_id' => 2,]);
        IncidentFile::create(['path' => 'path/to/file3', 'comment' => 'Comment for file 3', 'message_id' => 3,]);
        IncidentFile::create(['path' => 'path/to/file4', 'comment' => 'Comment for file 4', 'message_id' => 4,]);
    }
}
