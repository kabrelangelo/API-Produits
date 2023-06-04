<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_client' => $this->faker->numberBetween(1, 20),
            'id_produit' => $this->faker->numberBetween(1, 24),
            'quantite' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->dateTime(now())
        ];
    }
}