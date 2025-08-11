<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gebruikerslijst') }}
            </h2>

            <div>
                <a href="{{ route('users.create') }}" 
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Nieuwe gebruiker aanmaken
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Username</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->username }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2 text-center">
                            <form method="POST" action="{{ route('users.toggleAdmin', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" name="admin" 
                                    {{ $user->admin ? 'checked' : '' }}
                                    onchange="if(!confirm('Weet je zeker dat je deze gebruiker admin wil maken/verwijderen?')) { this.checked = !this.checked; } else { this.form.submit(); }"
                                >
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
