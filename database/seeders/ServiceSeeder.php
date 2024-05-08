<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartment_ids = Apartment::pluck('id')->toArray();

        $services = [
            ['label' => 'wi-fi', 'icon' => 'fa-solid fa-wifi'],
            ['label' => 'cucina', 'icon' => 'fa-solid fa-kitchen-set'],
            ['label' => 'piscina', 'icon' => 'fa-solid fa-swimming-pool'],
            ['label' => 'parcheggio', 'icon' => 'fa-solid fa-parking'],
            ['label' => 'palestra', 'icon' => 'fa-solid fa-dumbbell'],
            ['label' => 'lavatrice', 'icon' => 'fa-solid fa-tshirt'],
            ['label' => 'sauna', 'icon' => 'fa-solid fa-spa'],
            ['label' => 'servizio navetta', 'icon' => 'fa-solid fa-shuttle-van'],
            ['label' => 'pet-friendly', 'icon' => 'fa-solid fa-paw'],
            ['label' => 'spiaggia privata', 'icon' => 'fa-solid fa-umbrella-beach'],
            ['label' => 'accesso disabili', 'icon' => 'fa-solid fa-wheelchair'],
            ['label' => 'pulizia stanza', 'icon' => 'fa-solid fa-spray-can'],
            ['label' => 'TV', 'icon' => 'fa-solid fa-tv'],
            ['label' => 'aria condizionata', 'icon' => 'fa-solid fa-wind'],
            ['label' => 'riscaldamento', 'icon' => 'fa-solid fa-thermometer'],
        ];

        foreach ($services as $service) {
            $new_service = new Service();
            $new_service->fill($service);
            $new_service->save();
            $service_apartments = array_filter($apartment_ids, fn () => rand(0, 1));
            $new_service->apartments()->attach($service_apartments);
        }
    }
}
