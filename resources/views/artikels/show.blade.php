<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $artikel->titel }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
        @if($artikel->afbeelding)
            <img src="{{ asset('storage/' . $artikel->afbeelding) }}" alt="Afbeelding" class="w-full h-64 object-cover rounded mb-4">
        @endif

        <p class="text-sm text-gray-500 mb-2">Gepubliceerd op {{ $artikel->publicatiedatum->format('d-m-Y') }}</p>

        <div class="text-gray-700 dark:text-gray-300">
            {!! nl2br(e($artikel->content)) !!}
        </div>
    </div>
</x-app-layout>
