<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketCategory::create([
            'name' => 'normal',
            'price' => 50,
            'event_id' => 1
        ]);
        TicketCategory::create([
            'name' => 'vip',
            'price' => 100,
            'event_id' => 1
        ]);
        TicketCategory::create([
            'name' => 'vvip',
            'price' => 200,
            'event_id' => 1
        ]);
    }
}
