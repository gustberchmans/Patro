<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('FAQ bewerken') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6">
        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block">Vraag</label>
                <input type="text" name="vraag" value="{{ $faq->vraag }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block">Antwoord</label>
                <textarea name="antwoord" class="w-full border rounded px-3 py-2" rows="4" required>{{ $faq->antwoord }}</textarea>
            </div>
            <div>
                <label class="block">Categorie</label>
                <input type="text" name="categorie" value="{{ $faq->categorie }}" class="w-full border rounded px-3 py-2">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Bijwerken
            </button>
        </form>
    </div>
</x-app-layout>
