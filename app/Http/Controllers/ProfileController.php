<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'birthday' => 'nullable|date',
            'profielfoto' => 'nullable|image|max:2048', // max 2MB
            'about' => 'nullable|string|max:1000',
        ]);

        // Profielfoto uploaden en pad opslaan
        if ($request->hasFile('profielfoto')) {
            $path = $request->file('profielfoto')->store('profielfotos', 'public');
            $validated['profielfoto'] = $path;

            // Optioneel: oude foto verwijderen
            if ($user->profielfoto) {
                Storage::disk('public')->delete($user->profielfoto);
            }
        }

        $user->update($validated);

        return back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, fn($query) => $query->where('username', 'like', "%{$search}%"))
            ->paginate(10);

        return view('profile.index', compact('users'));
    }
}
