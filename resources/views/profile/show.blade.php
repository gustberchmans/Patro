<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profiel van {{ $user->username ?? 'Gebruiker' }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
        <div class="flex items-center space-x-6">
            @if($user->profielfoto)
                <img src="{{ asset('storage/' . $user->profielfoto) }}" alt="Profielfoto" class="h-24 w-24 rounded-full object-cover">
            @else
                <div class="h-24 w-24 rounded-full bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500">Geen foto</span>
                </div>
            @endif

            <div>
                <p><strong>Username:</strong> {{ $user->username ?? '-' }}</p>
                <p><strong>Verjaardag:</strong> {{ $user->verjaardag ? \Illuminate\Support\Carbon::parse($user->verjaardag)->format('d-m-Y') : '-' }}</p>
                <p><strong>Over mij:</strong></p>
                <p class="whitespace-pre-wrap">{{ $user->about_me ?? 'Nog geen informatie.' }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
