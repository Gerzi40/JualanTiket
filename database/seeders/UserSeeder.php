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
        User::create([
            'name' => 'andi',
            'email' => 'andi@gmail.com',
            'password' => 'andi',
            'phone' => '12345',
            'dob' => '2021-10-10',
            'gender' => 'male'
        ]);

        User::create([
            'name' => 'bunga',
            'email' => 'bunga@gmail.com',
            'password' => 'bunga',
            'phone' => '12345',
            'dob' => '2021-10-10',
            'gender' => 'female'
        ]);
    }
}
