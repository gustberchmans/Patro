<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Artikel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Artikel $artikel)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $artikel->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment geplaatst!');
    }
}
