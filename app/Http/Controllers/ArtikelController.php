<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'afbeelding' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
            'publicatiedatum' => 'nullable|date',
        ]);

        if ($request->hasFile('afbeelding')) {
            $validated['afbeelding'] = $request->file('afbeelding')->store('artikels', 'public');
        }

        Artikel::create($validated);

        return redirect()->back()->with('success', 'Artikel aangemaakt!');
    }

    public function show(Artikel $artikel)
    {
        return view('artikels.show', compact('artikel'));
    }
}
