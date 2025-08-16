<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('FAQ Beheren') }}
            </h2>
            <a href="{{ route('admin.faqs.create') }}" 
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Nieuwe FAQ toevoegen
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6">
        @foreach($faqs as $faq)
            <div class="bg-white dark:bg-gray-800 p-4 mb-4 rounded shadow">
                <h3 class="font-semibold">{{ $faq->vraag }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $faq->antwoord }}</p>
                <p class="text-xs text-gray-500">Categorie: {{ $faq->categorie ?? 'Geen' }}</p>

                <div class="mt-2 flex space-x-2">
                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" 
                       class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                        Bewerken
                    </a>

                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST"
                          onsubmit="return confirm('Weet je zeker dat je dit FAQ-item wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                            Verwijderen
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
