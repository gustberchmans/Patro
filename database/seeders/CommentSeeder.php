<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Artikel;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        // Voor elk artikel een paar comments
        $artikels = Artikel::all();

        foreach ($artikels as $artikel) {
            Comment::factory()
                ->count(rand(2, 5))
                ->state(function () use ($artikel) {
                    return [
                        'artikel_id' => $artikel->id,
                        'user_id'    => User::inRandomOrder()->first()->id,
                    ];
                })
                ->create();
        }
    }
}
