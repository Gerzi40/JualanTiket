<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i=1; $i<=3; $i++) {
            Event::create([
                'name' => $faker->words(2, true),
                'image' => '/event1.jpg',
                'price' => $i,
                'location' => $faker->state(),
                'date' => $faker->dateTime(),
                'time' => '20.00 - 22.00',
                'description' => $faker->paragraphs(2, true),
                'terms' => 'terms',
                'admin_id' => 1
            ]);
        }
    }
}
