<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'voornaam' => ['required', 'string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'verjaardag' => ['required', 'date'],
            'profielfoto' => ['nullable', 'image', 'max:2048'], // max 2MB
            'about_me' => ['nullable', 'string', 'max:500'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Upload profielfoto als die aanwezig is
        if ($request->hasFile('profielfoto')) {
            $path = $request->file('profielfoto')->store('profielfotos', 'public');
            $validated['profielfoto'] = $path;
        }

        // Password hashen
        $validated['password'] = Hash::make($validated['password']);

        // User aanmaken
        $user = User::create($validated);

        // Event en automatisch inloggen
        event(new Registered($user));
        Auth::login($user);

        // Redirect naar dashboard (of waar je wilt)
        return redirect()->route('dashboard');
    }
}
