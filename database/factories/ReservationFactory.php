<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkIn = $this->faker->dateTimeBetween('now', '+1 month'); // Date d'arrivée entre aujourd'hui et +1 mois
        $checkOut = (clone $checkIn)->modify('+'.rand(1, 14).' days'); // Séjour entre 1 et 14 jours

        return [
            'hotel_id' => Hotel::factory(), // Génère un hôtel si non existant
            'user_id' => User::factory(),   // Génère un utilisateur si non existant
            'check_in' => $checkIn,
            'check_out' => $checkOut,
        ];
    }
}
