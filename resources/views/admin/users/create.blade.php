<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nieuwe gebruiker aanmaken
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
                <input id="username" name="username" type="text" required class="mt-1 block w-full border rounded p-2" value="{{ old('username') }}">
                @error('username')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input id="email" name="email" type="email" required class="mt-1 block w-full border rounded p-2" value="{{ old('email') }}">
                @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Wachtwoord</label>
                <input id="password" name="password" type="password" required class="mt-1 block w-full border rounded p-2">
                @error('password')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Bevestig wachtwoord</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label for="voornaam" class="block font-medium text-sm text-gray-700">Voornaam</label>
                <input id="voornaam" name="voornaam" type="text" required class="mt-1 block w-full border rounded p-2" value="{{ old('voornaam') }}">
                @error('voornaam')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="achternaam" class="block font-medium text-sm text-gray-700">Achternaam</label>
                <input id="achternaam" name="achternaam" type="text" required class="mt-1 block w-full border rounded p-2" value="{{ old('achternaam') }}">
                @error('achternaam')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="verjaardag" class="block font-medium text-sm text-gray-700">Verjaardag</label>
                <input id="verjaardag" name="verjaardag" type="date" required class="mt-1 block w-full border rounded p-2" value="{{ old('verjaardag') }}">
                @error('verjaardag')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="admin" class="form-checkbox">
                    <span class="ml-2">Maak admin?</span>
                </label>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                    Gebruiker aanmaken
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
