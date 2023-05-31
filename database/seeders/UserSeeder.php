<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
            'name' => 'admin1',
            'username' => 'admin1',
            'password' => bcrypt('adminjsp'),
            'role' => 1
            ],
            [
            'name' => 'admin2',
            'username' => 'admin2',
            'password' => bcrypt('adminjsp'),
            'role' => 1
            ],
        ];
        foreach($users as $user) {
            User::create($user);
        }
    }
}
