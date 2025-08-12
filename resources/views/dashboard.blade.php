<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welkom bij Patro Garçon Enghien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Zoekbalk -->
            <form method="GET" action="{{ route('profile.index') }}" class="mb-6">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Zoek op gebruikersnaam..."
                    class="border rounded-md px-4 py-2 w-full sm:w-1/2 dark:bg-gray-700 dark:text-gray-200"
                />
                <button
                    type="submit"
                    class="mt-2 sm:mt-0 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded"
                >
                    Zoek
                </button>
            </form>

            <!-- Newsfeed -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                    Laatste artikels
                </h3>

                @forelse ($artikels as $artikel)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <!-- Titel -->
                            <h4 class="text-xl font-bold mb-2 text-gray-900 dark:text-gray-100">
                                {{ $artikel->titel }}
                            </h4>

                            <!-- Afbeelding -->
                            @if($artikel->afbeelding)
                                <img src="{{ asset('storage/' . $artikel->afbeelding) }}" 
                                    alt="Artikel afbeelding" 
                                    class="w-full h-64 object-cover rounded mb-4">
                            @endif

                            <!-- Datum -->
                            @if($artikel->publicatiedatum)
                                <p class="text-sm text-gray-500 mb-2">
                                    Gepubliceerd op {{ $artikel->publicatiedatum->format('d-m-Y') }}
                                </p>
                            @endif

                            <!-- Lees meer link -->
                            <a href="{{ route('artikels.show', $artikel->id) }}" 
                               class="text-blue-600 hover:underline mt-3 inline-block">
                               Lees meer
                            </a>
                            
                            <!-- Content -->
                            <p class="text-gray-700 dark:text-gray-300">
                                {{ Str::limit($artikel->content, 200) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">Geen artikels gevonden.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>