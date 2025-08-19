<?php

// database/seeders/FaqSeeder.php
namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::create([
            'vraag' => 'Hoe kan ik mij inschrijven?',
            'antwoord' => 'Ga naar de inschrijvingspagina en vul het formulier in.',
            'categorie' => 'Algemeen',
        ]);

        Faq::create([
            'vraag' => 'Waar vind ik de activiteitenkalender?',
            'antwoord' => 'De kalender staat onder het menu “Evenementen”.',
            'categorie' => 'Evenementen',
        ]);

        Faq::factory(6)->create();
    }
}
