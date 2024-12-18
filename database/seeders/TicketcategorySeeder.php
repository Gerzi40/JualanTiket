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
            'name' => 'Regular',
            'price' => 250000,
            'event_id' => 1, // Java Jazz Festival 2025
            'deadline' => '2025-02-28',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 350000,
            'event_id' => 1, // Java Jazz Festival 2025
            'deadline' => '2025-02-28',
            'stock' => 200,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 500000,
            'event_id' => 2, // We The Fest 2025
            'deadline' => '2025-07-18',
            'stock' => 800,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 750000,
            'event_id' => 2, // We The Fest 2025
            'deadline' => '2025-07-18',
            'stock' => 300,
        ]);
        
        TicketCategory::create([
            'name' => 'Weekday',
            'price' => 30000,
            'event_id' => 3, // Jakarta Fair 2025
            'deadline' => '2025-06-10',
            'stock' => 1000,
        ]);
        
        TicketCategory::create([
            'name' => 'Weekend',
            'price' => 50000,
            'event_id' => 3, // Jakarta Fair 2025
            'deadline' => '2025-06-10',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 400000,
            'event_id' => 4, // Bali Spirit Festival 2025
            'deadline' => '2025-04-02',
            'stock' => 300,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 600000,
            'event_id' => 4, // Bali Spirit Festival 2025
            'deadline' => '2025-04-02',
            'stock' => 150,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 100000,
            'event_id' => 5, // Jakarta Fashion Week 2025
            'deadline' => '2025-05-05',
            'stock' => 1000,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 150000,
            'event_id' => 5, // Jakarta Fashion Week 2025
            'deadline' => '2025-05-05',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'General Admission',
            'price' => 150000,
            'event_id' => 6, // Anime Festival Asia Indonesia 2025
            'deadline' => '2025-09-05',
            'stock' => 1500,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 250000,
            'event_id' => 6, // Anime Festival Asia Indonesia 2025
            'deadline' => '2025-09-05',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'General Admission',
            'price' => 600000,
            'event_id' => 7, // Ultra Music Festival Bali 2025
            'deadline' => '2025-08-20',
            'stock' => 1000,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 900000,
            'event_id' => 7, // Ultra Music Festival Bali 2025
            'deadline' => '2025-08-20',
            'stock' => 300,
        ]);
        
        TicketCategory::create([
            'name' => 'Standard',
            'price' => 50000,
            'event_id' => 8, // Startup Fest Indonesia 2025
            'deadline' => '2025-10-30',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 100000,
            'event_id' => 8, // Startup Fest Indonesia 2025
            'deadline' => '2025-10-30',
            'stock' => 200,
        ]);
        
        TicketCategory::create([
            'name' => 'Day Pass',
            'price' => 180000,
            'event_id' => 9, // Indonesian Comic Con 2025
            'deadline' => '2025-10-04',
            'stock' => 1000,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 250000,
            'event_id' => 9, // Indonesian Comic Con 2025
            'deadline' => '2025-10-04',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 75000,
            'event_id' => 10, // Yogyakarta Gamelan Festival 2025
            'deadline' => '2025-07-10',
            'stock' => 800,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 100000,
            'event_id' => 10, // Yogyakarta Gamelan Festival 2025
            'deadline' => '2025-07-10',
            'stock' => 300,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 200000,
            'event_id' => 11, // Borobudur Marathon 2025
            'deadline' => '2025-11-15',
            'stock' => 1000,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 300000,
            'event_id' => 11, // Borobudur Marathon 2025
            'deadline' => '2025-11-15',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'General',
            'price' => 100000,
            'event_id' => 12, // Art Jakarta 2025
            'deadline' => '2025-08-05',
            'stock' => 800,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 150000,
            'event_id' => 12, // Art Jakarta 2025
            'deadline' => '2025-08-05',
            'stock' => 300,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 300000,
            'event_id' => 13, // Prambanan Jazz Festival 2025
            'deadline' => '2025-06-15',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 400000,
            'event_id' => 13, // Prambanan Jazz Festival 2025
            'deadline' => '2025-06-15',
            'stock' => 200,
        ]);
        
        TicketCategory::create([
            'name' => 'General',
            'price' => 120000,
            'event_id' => 14, // Bali International Film Festival 2025
            'deadline' => '2025-09-28',
            'stock' => 800,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 150000,
            'event_id' => 14, // Bali International Film Festival 2025
            'deadline' => '2025-09-28',
            'stock' => 300,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 50000,
            'event_id' => 15, // Surabaya Coffee Festival 2025
            'deadline' => '2025-09-08',
            'stock' => 1000,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 75000,
            'event_id' => 15, // Surabaya Coffee Festival 2025
            'deadline' => '2025-09-08',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'Regular',
            'price' => 35000,
            'event_id' => 16, // Medan Culinary Festival 2025
            'deadline' => '2025-04-28',
            'stock' => 1000,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 50000,
            'event_id' => 16, // Medan Culinary Festival 2025
            'deadline' => '2025-04-28',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'Standard',
            'price' => 50000,
            'event_id' => 17, // Makassar International Writers Festival 2025
            'deadline' => '2025-06-07',
            'stock' => 500,
        ]);
        
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 75000,
            'event_id' => 17, // Makassar International Writers Festival 2025
            'deadline' => '2025-06-07',
            'stock' => 200,
        ]);
        
    }
}