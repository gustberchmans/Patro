<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('publicatiedatum', 'desc')->get();
        return view('admin.artikels.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'afbeelding' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'content' => 'required|string',
            'publicatiedatum' => 'required|date',
        ]);

        if ($request->hasFile('afbeelding')) {
            $validated['afbeelding'] = $request->file('afbeelding')->store('artikels', 'public');
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel toegevoegd!');
    }

    public function show(Artikel $artikel)
    {
        return view('artikels.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikels.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'content' => 'required|string',
            'publicatiedatum' => 'required|date',
            'afbeelding' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('afbeelding')) {
            $path = $request->file('afbeelding')->store('artikels', 'public');
            $validated['afbeelding'] = $path;
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel succesvol bijgewerkt.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel succesvol verwijderd.');
    }

}
