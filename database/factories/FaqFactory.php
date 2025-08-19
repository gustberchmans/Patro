<?php

// database/factories/FaqFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vraag'     => $this->faker->sentence(),
            'antwoord'  => $this->faker->paragraph(),
            'categorie' => $this->faker->randomElement(['Algemeen','Account','Betaling','Evenementen']),
        ];
    }
}

