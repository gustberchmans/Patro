<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Alle Bestellingen') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Gebruiker</th>
                    <th class="px-4 py-2 border">Product</th>
                    <th class="px-4 py-2 border">Naam op Pull</th>
                    <th class="px-4 py-2 border">Aantal</th>
                    <th class="px-4 py-2 border">Prijs</th>
                    <th class="px-4 py-2 border">Datum</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="px-4 py-2 border">{{ $order->id }}</td>
                        <td class="px-4 py-2 border">{{ $order->user->username ?? $order->user->name }}</td>
                        <td class="px-4 py-2 border">{{ $order->product }}</td>
                        <td class="px-4 py-2 border">{{ $order->custom_name }}</td>
                        <td class="px-4 py-2 border">{{ $order->quantity }}</td>
                        <td class="px-4 py-2 border">€{{ number_format($order->price, 2, ',', '.') }}</td>
                        <td class="px-4 py-2 border">{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Geen bestellingen gevonden</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
