<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'address' => 'Admin',
            'phone' => '081223334444',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'level' => 'admin'
        ]);

        User::create([
            'position_id' => 1,
            'name' => 'Dayat',
            'address' => 'Jl. Tumaritis',
            'phone' => '081223334444',
            'email' => 'dayat@gmail.com',
            'password' => bcrypt('dayat'),
            'level' => 'user'
        ]);
    }
}
