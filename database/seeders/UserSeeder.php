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

        // Gewone users
        User::factory(8)->create();
    }
}

