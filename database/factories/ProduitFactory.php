<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name,
            'description' => $this->faker->sentence(),
            'lien_image' => $this->faker->imageUrl(
                'https://picsum.photos/200/300'
            ),
            'prix' => $this->faker->numberBetween(1000, 100000),
            'tva' => $this->faker->numberBetween(1000, 10000)
        ];
    }
}
