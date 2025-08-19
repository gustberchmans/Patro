<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 dark:text-gray-300">Naam</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300">E-mail</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300">Onderwerp</label>
                <input type="text" name="subject" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300">Bericht</label>
                <textarea name="message" rows="5" class="w-full border rounded px-3 py-2" required></textarea>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Versturen
            </button>
        </form>
    </div>
</x-app-layout>
