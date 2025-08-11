<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
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
        </div>
    </div>
</x-app-layout>
