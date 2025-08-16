<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Veelgestelde vragen (FAQ)') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        @forelse($faqs->groupBy('categorie') as $categorie => $vragen)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">
                    {{ $categorie ?? 'Algemeen' }}
                </h3>

                <div class="space-y-4">
                    @foreach($vragen as $faq)
                        <div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
                            <p class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $faq->vraag }}
                            </p>
                            <p class="mt-2 text-gray-700 dark:text-gray-300">
                                {{ $faq->antwoord }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">Er zijn nog geen vragen toegevoegd.</p>
        @endforelse
    </div>
</x-app-layout>
