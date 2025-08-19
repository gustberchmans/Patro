<?php

namespace Database\Factories;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelFactory extends Factory
{
    protected $model = Artikel::class;

    public function definition(): array
    {
        return [
            'titel'           => $this->faker->sentence(4),
            'afbeelding'      => 'artikels/default.jpg', // of soms null
            'content'         => $this->faker->paragraph(6),
            'publicatiedatum' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}