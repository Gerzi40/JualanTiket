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

        for($i=0; $i<3; $i++) {
            Event::create([
                'name' => $faker->words(2, true),
                'image' => 'image',
                'price' => '100000',
                'location' => 'location',
                'date' => $faker->date(),
                'time' => 'time',
                'description' => $faker->paragraphs(2, true),
                'terms' => 'terms'
            ]);
        }
    }
}
