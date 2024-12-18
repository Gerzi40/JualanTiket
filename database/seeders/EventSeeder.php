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

        // for($i=1; $i<=3; $i++) {
        //     Event::create([
        //         'name' => $faker->words(2, true),
        //         'image' => 'assets/events/event1.jpg',
        //         'price' => $i,
        //         'location' => $faker->state(),
        //         'date' => $faker->dateTime(),
        //         'time' => '20.00 - 22.00',
        //         'description' => $faker->paragraphs(2, true),
        //         'terms' => 'terms',
        //         'admin_id' => 1
        //     ]);
        // }
        Event::create([
            'name' => 'Java Jazz Festival',
            'image' => 'assets/events/java_jazz.jpg',
            'price' => 250000,
            'location' => 'Jakarta International Expo, Kemayoran',
            'date' => '2025-03-01',
            'time' => '17.00 - 23.00',
            'description' => 'Salah satu festival musik jazz terbesar di Asia yang menghadirkan musisi lokal dan internasional.',
            'terms' => 'Tiket tidak dapat dikembalikan.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'We The Fest',
            'image' => 'assets/events/we_the_fest.jpg',
            'price' => 500000,
            'location' => 'Gelora Bung Karno, Jakarta',
            'date' => '2025-07-20',
            'time' => '15.00 - 23.00',
            'description' => 'Festival musik, seni, dan gaya hidup yang menghadirkan artis pop, rock, dan EDM.',
            'terms' => 'Tiket berlaku untuk satu hari.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Jakarta Fair',
            'image' => 'assets/events/jakarta_fair.jpg',
            'price' => 30000,
            'location' => 'Jakarta International Expo, Kemayoran',
            'date' => '2025-06-12',
            'time' => '10.00 - 22.00',
            'description' => 'Pameran tahunan yang menawarkan berbagai produk mulai dari elektronik hingga kuliner.',
            'terms' => 'Anak-anak di bawah 12 tahun gratis.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Bali Spirit Festival',
            'image' => 'assets/events/bali_spirit.jpg',
            'price' => 400000,
            'location' => 'Ubud, Bali',
            'date' => '2025-04-05',
            'time' => '08.00 - 18.00',
            'description' => 'Festival kesehatan, yoga, dan spiritualitas yang terkenal secara internasional.',
            'terms' => 'Peserta wajib membawa matras yoga.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Jakarta Fashion Week',
            'image' => 'assets/events/jakarta_fashion.jpg',
            'price' => 100000,
            'location' => 'Senayan City, Jakarta',
            'date' => '2025-05-10',
            'time' => '10.00 - 22.00',
            'description' => 'Pameran fashion terbesar di Indonesia, menampilkan karya desainer lokal dan internasional.',
            'terms' => 'Dress code formal diutamakan.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Anime Festival Asia Indonesia',
            'image' => 'assets/events/anime_festival.jpg',
            'price' => 150000,
            'location' => 'Balai Kartini, Jakarta',
            'date' => '2025-09-14',
            'time' => '09.00 - 20.00',
            'description' => 'Festival untuk para penggemar anime, manga, dan budaya Jepang.',
            'terms' => 'Cosplay diperbolehkan dengan syarat tertentu.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Ultra Music Festival Bali',
            'image' => 'assets/events/ultra_bali.jpg',
            'price' => 600000,
            'location' => 'Garuda Wisnu Kencana, Bali',
            'date' => '2025-08-25',
            'time' => '18.00 - 02.00',
            'description' => 'Festival musik EDM dengan DJ internasional dan suasana outdoor Bali.',
            'terms' => 'Usia minimum 18 tahun.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Startup Fest Indonesia',
            'image' => 'assets/events/startup_fest.jpg',
            'price' => 50000,
            'location' => 'ICE BSD, Tangerang',
            'date' => '2025-11-02',
            'time' => '09.00 - 18.00',
            'description' => 'Acara networking dan pameran startup terbesar di Indonesia.',
            'terms' => 'Semua peserta wajib registrasi ulang di lokasi.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Indonesian Comic Con',
            'image' => 'assets/events/comic_con.jpg',
            'price' => 180000,
            'location' => 'Jakarta Convention Center',
            'date' => '2025-10-05',
            'time' => '09.00 - 18.00',
            'description' => 'Acara untuk para pecinta komik, film, dan budaya pop.',
            'terms' => 'Tiket hanya berlaku untuk satu hari.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Yogyakarta Gamelan Festival',
            'image' => 'assets/events/yogyakarta_gamelan.jpg',
            'price' => 75000,
            'location' => 'Taman Budaya Yogyakarta',
            'date' => '2025-07-15',
            'time' => '19.00 - 21.00',
            'description' => 'Festival gamelan tahunan yang menampilkan grup gamelan dari berbagai daerah.',
            'terms' => 'Anak-anak di bawah 10 tahun gratis.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Borobudur Marathon',
            'image' => 'assets/events/borobudur_marathon.jpg',
            'price' => 200000,
            'location' => 'Kompleks Candi Borobudur, Magelang',
            'date' => '2025-11-22',
            'time' => '05.00 - 12.00',
            'description' => 'Ajang olahraga maraton yang mengelilingi kawasan Candi Borobudur.',
            'terms' => 'Peserta wajib membawa bukti registrasi.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Art Jakarta',
            'image' => 'assets/events/art_jakarta.jpg',
            'price' => 100000,
            'location' => 'Jakarta Convention Center',
            'date' => '2025-08-10',
            'time' => '10.00 - 21.00',
            'description' => 'Pameran seni kontemporer terbesar di Indonesia.',
            'terms' => 'Pengunjung dilarang memotret tanpa izin.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Prambanan Jazz Festival',
            'image' => 'assets/events/prambanan_jazz.jpg',
            'price' => 300000,
            'location' => 'Kompleks Candi Prambanan, Yogyakarta',
            'date' => '2025-06-20',
            'time' => '18.00 - 23.00',
            'description' => 'Festival musik jazz dengan latar belakang Candi Prambanan.',
            'terms' => 'Tiket tidak dapat dialihkan.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Bali International Film Festival',
            'image' => 'assets/events/bali_film.jpg',
            'price' => 120000,
            'location' => 'Denpasar, Bali',
            'date' => '2025-10-01',
            'time' => '14.00 - 22.00',
            'description' => 'Festival film internasional yang menampilkan karya dari berbagai negara.',
            'terms' => 'Dilarang membawa makanan atau minuman dari luar.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Surabaya Coffee Festival',
            'image' => 'assets/events/surabaya_coffee.jpg',
            'price' => 50000,
            'location' => 'Grand City Mall, Surabaya',
            'date' => '2025-09-10',
            'time' => '09.00 - 20.00',
            'description' => 'Pameran kopi yang menampilkan berbagai jenis kopi dari seluruh Indonesia.',
            'terms' => 'Tiket berlaku untuk satu hari.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Medan Culinary Festival',
            'image' => 'assets/events/medan_culinary.jpg',
            'price' => 35000,
            'location' => 'Lapangan Merdeka, Medan',
            'date' => '2025-05-01',
            'time' => '10.00 - 22.00',
            'description' => 'Festival kuliner yang menghadirkan makanan khas Medan dan sekitarnya.',
            'terms' => 'Semua transaksi menggunakan kupon.',
            'admin_id' => 1,
        ]);

        Event::create([
            'name' => 'Makassar International Writers Festival',
            'image' => 'assets/events/makassar_writers.jpg',
            'price' => 50000,
            'location' => 'Fort Rotterdam, Makassar',
            'date' => '2025-06-14',
            'time' => '09.00 - 18.00',
            'description' => 'Festival sastra internasional yang diadakan di Makassar.',
            'terms' => 'Peserta wajib registrasi ulang.',
            'admin_id' => 1,
        ]);
    }
}
