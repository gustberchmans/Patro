<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gebruikers zoeken') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if($users->count())
                <table class="w-full border-collapse border border-gray-300 dark:border-gray-600">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                                <a href="{{ route('profile.show', $user->id) }}" class="text-blue-600 hover:underline">
                                    {{ $user->username }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->withQueryString()->links() }}
                </div>
            @else
                <p>Geen gebruikers gevonden.</p>
            @endif
        </div>
    </div>
</x-app-layout>