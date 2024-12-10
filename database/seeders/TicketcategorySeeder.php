<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        TicketCategory::create([
            'name' => 'Normal',
            'price' => 50,
            'event_id' => 1,
            'deadline' => $faker->dateTime(), 
            'stock' => 5,
        ]);
        TicketCategory::create([
            'name' => 'vip',
            'price' => 60,
            'event_id' => 1,
            'deadline' => $faker->dateTime(), 
            'stock' => 5,
        ]);
        TicketCategory::create([
            'name' => 'vvip',
            'price' => 70,
            'event_id' => 1,
            'deadline' => $faker->dateTime(), 
            'stock' => 5
        ]);
    }
}
