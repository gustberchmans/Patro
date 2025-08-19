<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username'    => $this->faker->unique()->userName(),
            'voornaam'    => $this->faker->firstName(),
            'achternaam'  => $this->faker->lastName(),
            'verjaardag'  => $this->faker->date(),
            'profielfoto' => 'profielfotos/default.png', // zorg dat deze bestaat of laat null toe
            'about_me'    => $this->faker->sentence(8),
            'email'       => $this->faker->unique()->safeEmail(),
            'password'    => Hash::make('password'), // testwachtwoord
            'admin'       => false,
        ];
    }
}
