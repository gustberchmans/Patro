<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bestel een Pull') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Maat</label>
                <select name="size" class="w-full border-gray-300 rounded">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Kleur</label>
                <select name="color" class="w-full border-gray-300 rounded">
                    <option value="Zwart">Zwart</option>
                    <option value="Wit">Wit</option>
                    <option value="Blauw">Blauw</option>
                    <option value="Rood">Rood</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Naam op Pull (optioneel)</label>
                <input type="text" name="custom_name" class="w-full border-gray-300 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Aantal</label>
                <input type="number" name="quantity" value="1" min="1" class="w-full border-gray-300 rounded">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Bestel nu
            </button>
        </form>
    </div>
</x-app-layout>
