<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuwe FAQ toevoegen') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6">
        <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block">Vraag</label>
                <input type="text" name="vraag" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block">Antwoord</label>
                <textarea name="antwoord" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
            </div>
            <div>
                <label class="block">Categorie</label>
                <input type="text" name="categorie" class="w-full border rounded px-3 py-2">
            </div>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Opslaan
            </button>
        </form>
    </div>
</x-app-layout>
