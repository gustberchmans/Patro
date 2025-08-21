<?php

// database/seeders/UserSeeder.php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::factory()->create([
            'username'   => 'admin',
            'voornaam'   => 'Admin',
            'achternaam' => 'Gebruiker',
            'verjaardag' => '1990-01-01',
            'profielfoto'=> 'profielfotos/default.png',
            'about_me'   => 'Ik ben de admin.',
            'email'      => 'admin@ehb.be',
            'password'   => Hash::make('Password!321'),
            'admin'      => true,
        ]);

        User::factory()->create([
            'username'   => 'test',
            'voornaam'   => 'Test',
            'achternaam' => 'Gebruiker',
            'verjaardag' => '1990-01-01',
            'profielfoto'=> 'profielfotos/default.png',
            'about_me'   => 'Ik ben de test gebruiker.',
            'email'      => 'test@ehb.be',
            'password'   => Hash::make('1a2b3c4d'),
            'admin'      => false,
        ]);

        // Gewone users
        User::factory(18)->create();
    }
}

