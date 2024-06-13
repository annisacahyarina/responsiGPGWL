<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create a new user
        // $user = new \App\Models\User();
        // $user->name = 'Admin';
        // $user->phone = '08123457890';
        // $user->email = 'admin@gmail.com';
        // $user->password = bcrypt('admin1234');
        // $user->save();

        //multiple user
        $user = [
            [
                'name' => 'Admin',
                'phone' => '08123456789',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'phone' => '08123456788',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
            ],
        ];

        //insert the user into the database
        DB::table('users')->insert($user);
    }
}
