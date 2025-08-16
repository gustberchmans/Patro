<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-6">
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Gebruikers beheren</a>
            <a href="{{ route('admin.artikels.index') }}" class="px-4 py-2 bg-green-500 text-white rounded">Artikels beheren</a>
            <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2 bg-purple-500 text-white rounded">FAQ beheren</a>
        </div>
    </div>
</x-app-layout>
