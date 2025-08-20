<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionFactory extends Factory
{
    public function definition(): array
    {
        $statuts = ['validee', 'en_attente', 'dossier_incomplet'];
        return [
            'nom' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'statut' => $statuts[array_rand($statuts)],
            'prioritaire' => $this->faker->boolean(30),
        ];
    }
}
