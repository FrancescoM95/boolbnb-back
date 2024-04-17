<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = [
            [
                "user_id" => 1,
                "title" => "Appartamento moderno vicino al centro",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 80,
                "address" => "Via Garibaldi 10, Milano",
                "latitude" => 45.4654219,
                "longitude" => 9.1859243,
                "cover_image" => "apartment1.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 1,
                "title" => "Stanza luminosa con vista sulla città",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 1,
                "square_meters" => 25,
                "address" => "Corso Magenta 15, Milano",
                "latitude" => 45.465421,
                "longitude" => 9.174911,
                "cover_image" => "apartment2.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 1,
                "title" => "Villa con piscina e giardino",
                "slug" => '',
                "baths" => 3,
                "beds" => 4,
                "rooms" => 5,
                "square_meters" => 200,
                "address" => "Via Roma 1, Monza",
                "latitude" => 45.5848,
                "longitude" => 9.2733,
                "cover_image" => "https://a0.muscache.com/im/pictures/prohost-api/Hosting-957819679097220222/original/53afb9d5-777e-46bf-b657-36cd979bddc8.jpeg?im_w=720",
                "is_visible" => true
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento con vista sul lago",
                "slug" => '',
                "baths" => 2,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 70,
                "address" => "Piazza Cavour 8, Como",
                "latitude" => 45.8101,
                "longitude" => 9.0852,
                "cover_image" => "apartment4.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 1,
                "title" => "Loft nel cuore della città vecchia",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 2,
                "square_meters" => 50,
                "address" => "Via XX Settembre 20, Bergamo",
                "latitude" => 45.697,
                "longitude" => 9.6703,
                "cover_image" => "apartment5.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 1,
                "title" => "Casa vacanze con terrazza panoramica",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 90,
                "address" => "Via Torino 5, Lecco",
                "latitude" => 45.8566,
                "longitude" => 9.3882,
                "cover_image" => "apartment6.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento con vista sulle montagne",
                "slug" => '',
                "baths" => 2,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 75,
                "address" => "Piazza Vittoria 3, Varese",
                "latitude" => 45.818,
                "longitude" => 8.8232,
                "cover_image" => "apartment7.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 1,
                "title" => "Chalet rustico immerso nel verde",
                "slug" => '',
                "baths" => 1,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 60,
                "address" => "Via Monte Rosa 7, Sondrio",
                "latitude" => 46.1692,
                "longitude" => 9.8717,
                "cover_image" => "apartment8.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento elegante nel quartiere storico",
                "slug" => '',
                "baths" => 1,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 70,
                "address" => "Corso Italia 12, Cremona",
                "latitude" => 45.1342,
                "longitude" => 10.0186,
                "cover_image" => "apartment9.jpg",
                "is_visible" => true
            ],
            [
                "user_id" => 3,
                "title" => "Monolocale con terrazza privata",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 1,
                "square_meters" => 35,
                "address" => "Via Po 20, Pavia",
                "latitude" => 45.1865,
                "longitude" => 9.1562,
                "cover_image" => "apartment10.jpg",
                "is_visible" => true
            ]
        ];

        foreach ($apartments as $apartment) {
            $new_apartment = new Apartment();
            $new_apartment->fill($apartment);
            $new_apartment['slug'] = Str::slug($apartment['title']);
            $new_apartment->save();
        }
    }
}
