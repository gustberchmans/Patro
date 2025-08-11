<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-6">
        <div class="mt-6">
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Gebruikers beheren</a>
        </div>
    </div>
</x-app-layout>
