<?php

// database/seeders/ArtikelSeeder.php
namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        // Een paar “mooie” vaste voorbeelden
        Artikel::create([
            'titel' => 'Start van het nieuwe seizoen!',
            'afbeelding' => 'artikels/default.jpg', // optioneel, zie tip hieronder
            'content' => 'We trappen het seizoen af met een openingsactiviteit voor alle leeftijden...',
            'publicatiedatum' => Carbon::now()->subDays(7),
        ]);

        Artikel::create([
            'titel' => 'Inschrijvingen geopend',
            'afbeelding' => null,
            'content' => 'Je kan je vanaf vandaag inschrijven via de website. Let op: plaatsen zijn beperkt!',
            'publicatiedatum' => Carbon::now()->subDays(3),
        ]);

        // + wat faker-data
        Artikel::factory(15)->create();
    }
}

