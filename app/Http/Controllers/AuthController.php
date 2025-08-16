<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');  // De Blade file die je eerder maakte
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');  // pas aan naar waar je wilt
        }

        return back()->withErrors([
            'email' => 'De combinatie e-mail/wachtwoord is niet correct.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('register');  // De registratie Blade file
    }


    public function store(Request $request)
    {
        // Validatie van de registratiegegevens
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255',
            'verjaardag' => 'required|date',
            'profielfoto' => 'nullable|image|max:2048',
            'about_me' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Profielfoto uploaden indien aanwezig
        if ($request->hasFile('profielfoto')) {
            $path = $request->file('profielfoto')->store('profielfotos', 'public');
            $validated['profielfoto'] = $path;
        }

        $user = User::create([
            'username' => $validated['username'],
            'voornaam' => $validated['voornaam'],
            'achternaam' => $validated['achternaam'],
            'verjaardag' => $validated['verjaardag'],
            'profielfoto' => $validated['profielfoto'] ?? null,
            'about_me' => $validated['about_me'] ?? null,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->intended('/');  // Pas aan naar waar je wil na registratie
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}

