<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\TicketCategory;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $users = User::all();
        $events = Event::all();
        $tickets = TicketCategory::all();

        for($i=0; $i<3; $i++) {
            // $total = $faker->randomDigitNot(0);
            Transaction::create([
                'user_id' => $users->random()->id,
                'event_id' => $events->random()->id,
                'ticketcategory_id' => $tickets->random()->id,
                'total_price' => 200,
                'total_ticket' => $faker->randomDigitNot(0),
                'transaction_dateTime' => $faker->dateTime(),
                'snap_token' => '',
                'status' => 'paid',
            ]);
        }

    }
}
