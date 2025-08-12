<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuw Artikel Aanmaken') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6">
        <form action="{{ route('admin.artikels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Titel</label>
                <input type="text" name="titel" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Afbeelding</label>
                <input type="file" name="afbeelding" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Content</label>
                <textarea name="content" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
            </div>

            @php
                $today = \Carbon\Carbon::now()->format('Y-m-d');
            @endphp

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Publicatiedatum</label>
                <input 
                    type="date" 
                    name="publicatiedatum" 
                    class="w-full border rounded px-3 py-2" 
                    required 
                    value="{{ old('publicatiedatum', $today) }}"
                >
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Opslaan
            </button>
        </form>
    </div>
</x-app-layout>
