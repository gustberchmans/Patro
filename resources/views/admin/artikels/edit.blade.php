<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Artikel bewerken
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow mt-6">
        <form action="{{ route('admin.artikels.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Titel -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Titel</label>
                <input type="text" name="titel" 
                       value="{{ old('titel', $artikel->titel) }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <!-- Afbeelding -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Afbeelding</label>
                @if($artikel->afbeelding)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $artikel->afbeelding) }}" 
                             alt="Huidige afbeelding" 
                             class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
                <input type="file" name="afbeelding" class="w-full border rounded px-3 py-2">
                <small class="text-gray-500">Laat leeg om huidige afbeelding te behouden</small>
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Content</label>
                <textarea name="content" rows="6"
                          class="w-full border rounded px-3 py-2"
                          required>{{ old('content', $artikel->content) }}</textarea>
            </div>

            <!-- Publicatiedatum -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Publicatiedatum</label>
                <input type="date" name="publicatiedatum" 
                       value="{{ old('publicatiedatum', $artikel->publicatiedatum->format('Y-m-d')) }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <!-- Knoppen -->
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.artikels.index') }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Annuleren
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
