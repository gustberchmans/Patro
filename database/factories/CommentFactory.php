<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'user_id'    => User::factory(), // maakt automatisch user aan als nodig
            'artikel_id' => Artikel::factory(), // idem voor artikel
            'comment'    => $this->faker->sentence(12),
        ];
    }
}
