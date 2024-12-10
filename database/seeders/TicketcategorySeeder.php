<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketCategory::create([
            'name' => 'Normal',
            'price' => 50,
            'event_id' => 1
        ]);
        TicketCategory::create([
            'name' => 'VIP',
            'price' => 100,
            'event_id' => 1
        ]);
        TicketCategory::create([
            'name' => 'VVIP',
            'price' => 200,
            'event_id' => 1
        ]);
    }
}
