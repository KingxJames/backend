<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'James',
            'email' => 'jaafaber@gmail.com',
            'work_email' => 'james@ub.edu.bz',
            'phone_no' => '605-2234',
            'organization' => 'University of Belize',
            'password' => Hash::make('password'), // Hash the password using Bcrypt
            'role_id' => 1
        ]);

         User::create([
            'name'=>'David',
            'email' => 'jaaf@gmail.com',
            'work_email' => 'jamesF@ub.edu.bz',
            'phone_no' => '605-5331',
            'organization' => 'University of Belize',
            'password' => Hash::make('password'), // Hash the password using Bcrypt
            'role_id' => 2
        ]);
        
        User::create([
            'name'=>'Andrew',
            'email' => 'jaber@gmail.com',
            'work_email' => 'jamesFaber@ub.edu.bz',
            'phone_no' => '622-2234',
            'organization' => 'University of Belize',
            'password' => Hash::make('password'), // Hash the password using Bcrypt
            'role_id' => 3
        ]);
        
        User::create([
            'name'=>'Beverly',
            'email' => 'jfabe@gmail.com',
            'work_email' => 'BevFaber@ub.edu.bz',
            'phone_no' => '622-0234',
            'organization' => 'University of Belize',
            'password' => Hash::make('password'), // Hash the password using Bcrypt
            'role_id' => 4
        ]);
    }
}