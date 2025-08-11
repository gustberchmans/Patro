<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(Request $request, User $user)
    {
        // Update de admin status afhankelijk van de checkbox input
        $user->admin = $request->has('admin');
        $user->save();

        return redirect()->back()->with('success', 'Admin status is bijgewerkt.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255',
            'verjaardag' => 'required|date',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'admin'    => 'nullable|boolean',
        ]);

        User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'admin' => $request->has('admin'),
            'voornaam' => $data['voornaam'],
            'achternaam' => $data['achternaam'],
            'verjaardag' => $data['verjaardag'],
        ]);

        return redirect()->route('users.index')->with('success', 'Gebruiker aangemaakt!');
    }
}
