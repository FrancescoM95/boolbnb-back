<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            ['label' => 'standard', 'duration' => 24, 'fee' => '2.99'],
            ['label' => 'pro', 'duration' => 72, 'fee' => '5.99'],
            ['label' => 'deluxe', 'duration' => 144, 'fee' => '9.99'],
        ];

        foreach ($sponsorships as $sponsorship) {
            $new_spons = new Sponsorship();
            $new_spons->fill($sponsorship);
            $new_spons->save();
        }
    }
}
