<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Hotel::count() == 0 || User::count() == 0) {
            $this->command->info('Remplis Hotel Et User Avant de faire le seeder de resevations.');
            return;
        }

        Reservation::factory(30)->create(); // Génère 30 réservations aléatoires
    }
}
