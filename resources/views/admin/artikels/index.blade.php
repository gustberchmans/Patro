<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Artikels Beheren') }}
            </h2>

            <div>
                <a href="{{ route('admin.artikels.create') }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Nieuw artikel aanmaken
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6">
        @forelse($artikels as $artikel)
            <div class="bg-white dark:bg-gray-800 p-4 mb-4 rounded shadow">
                <h3 class="text-lg font-semibold">{{ $artikel->titel }}</h3>
                @if($artikel->afbeelding)
                    <img src="{{ asset('storage/' . $artikel->afbeelding) }}" alt="Afbeelding" class="w-32 h-32 object-cover mt-2">
                @endif
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $artikel->content }}</p>
                <p class="mt-1 text-xs text-gray-500">
                    Gepubliceerd op: {{ \Carbon\Carbon::parse($artikel->publicatiedatum)->format('d-m-Y') }}
                </p>

                <!-- Actie knoppen -->
                <div class="mt-3 flex space-x-2">
                    <a href="{{ route('admin.artikels.edit', $artikel->id) }}" 
                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                        Bewerken
                    </a>

                    <form action="{{ route('admin.artikels.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit artikel wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                            Verwijderen
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">Geen artikels gevonden.</p>
        @endforelse
    </div>
</x-app-layout>
